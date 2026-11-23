<?php

namespace App\Http\Controllers;

use App\Models\FormationVideo;
use App\Models\UserVideoAccess;
use App\Models\PaiementVideo;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Services\GeniusPayService;

class VideoController extends Controller
{
    protected $geniuspay;

    public function __construct(GeniusPayService $geniuspay)
    {
        $this->geniuspay = $geniuspay;
    }

    /**
     * Afficher la liste des vidéos DCG ou DSCG
     */
    public function index(Request $request, $type = null)
    {
        // Si le type n'est pas passé en paramètre, le déterminer depuis l'URL
        if (!$type) {
            $path = $request->path();
            $type = str_contains($path, 'dscg') ? 'dscg' : 'dcg';
        }

        $type = strtolower($type);

        if (!in_array($type, ['dcg', 'dscg'])) {
            abort(404);
        }

        $videos = FormationVideo::where('formation_type', $type)
            ->orderBy('niveau')
            ->orderBy('ordre')
            ->get();

        return view('videos.index', compact('videos', 'type'));
    }

    /**
     * Afficher une vidéo (premier cours gratuit, autres payants)
     */
    public function show($id)
    {
        $video = FormationVideo::findOrFail($id);
        $user = Auth::user();

        // Vérifier si l'utilisateur a accès à cette vidéo
        $hasAccess = $this->checkUserAccess($user, $video);

        // Si ce n'est pas le premier cours et que l'utilisateur n'a pas accès
        $isFirstVideo = FormationVideo::where('formation_type', $video->formation_type)
            ->where('ordre', '<', $video->ordre)
            ->count() === 0;

        if (!$isFirstVideo && !$hasAccess) {
            return redirect()->route('video.payer', $video->id);
        }

        return view('videos.show', compact('video', 'hasAccess'));
    }

    /**
     * Page de paiement pour une vidéo
     */
    public function payer($id)
    {
        $video = FormationVideo::findOrFail($id);
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        return view('videos.payment', compact('video'));
    }

    /**
     * Initialiser le paiement GeniusPay pour une vidéo
     */
    public function initPayment(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $video = FormationVideo::findOrFail($id);
        $user = \App\Models\User::findOrFail($request->user_id);

        // Créer l'enregistrement de paiement
        $paiement = PaiementVideo::create([
            'user_id' => $user->id,
            'video_id' => $video->id,
            'montant' => $video->prix,
            'methode_paiement' => 'geniuspay',
            'statut' => 'en_attente',
        ]);

        $transactionId = 'VID' . time() . $paiement->id;

        $returnUrl = route('video.return', ['video_id' => $video->id, 'token' => $paiement->id]);
        $errorUrl = route('video.cancel', ['video_id' => $video->id, 'token' => $paiement->id]);

        // S'assurer que les URLs sont absolues
        $returnUrl = $this->ensureAbsoluteUrl($returnUrl);
        $errorUrl = $this->ensureAbsoluteUrl($errorUrl);

        $result = $this->geniuspay->initPayment([
            'transaction_id'   => $transactionId,
            'amount'           => (int) $video->prix,
            'currency'         => 'XOF',
            'description'      => 'Vidéo formation - ' . $video->titre,
            'success_url'      => $returnUrl,
            'error_url'        => $errorUrl,
            'customer_name'    => $user->name,
            'customer_email'   => $user->email,
            'customer_phone'   => $user->telephone ?? '0123456789',
            'customer_country' => 'CI',
            'metadata'         => [
                'type'        => 'video',
                'paiement_id' => $paiement->id,
                'video_id'    => $video->id,
            ],
        ]);

        if ($result['success']) {
            // Mettre à jour le transaction_id avec la référence GeniusPay
            $paiement->update(['transaction_id' => $result['reference']]);

            Log::info('Video Payment Redirect', [
                'video_id' => $video->id,
                'reference' => $result['reference'],
                'checkout_url' => $result['checkout_url'],
            ]);

            return redirect()->away($result['checkout_url']);
        }

        return back()->with('error', 'Erreur lors de l\'initialisation du paiement');
    }

    /**
     * Retour après paiement GeniusPay
     */
    public function returnPayment(Request $request)
    {
        $videoId = $request->get('video_id');
        $token = $request->get('token');
        $reference = $request->get('reference') ?? $request->get('transaction_id');

        if (!$token && !$reference) {
            return redirect()->route('video.cancel');
        }

        // Retrouver le paiement par token (id du paiement) ou par référence
        $paiement = $token
            ? PaiementVideo::find($token)
            : PaiementVideo::where('transaction_id', $reference)->first();

        if (!$paiement) {
            return redirect()->route('video.cancel');
        }

        $reference = $reference ?? $paiement->transaction_id;

        $checkResult = $this->geniuspay->checkPaymentStatus($reference);

        if ($checkResult['success'] && $checkResult['status'] === 'completed') {
            // Paiement réussi
            if ($paiement->statut === 'en_attente') {
                $this->grantVideoAccess($paiement);
            }

            return redirect()->route('video.success', ['video_id' => $videoId]);
        }

        return redirect()->route('video.cancel', ['video_id' => $videoId]);
    }

    /**
     * Webhook GeniusPay
     */
    public function notify(Request $request)
    {
        if (!$this->geniuspay->verifyWebhookSignature($request)) {
            return response()->json(['status' => 'invalid_signature'], 401);
        }

        $payload   = $request->all();
        $data      = $payload['data'] ?? [];
        $reference = $data['reference'] ?? null;
        $status    = $data['status'] ?? null;

        if (!$reference) {
            return response()->json(['status' => 'missing_reference'], 400);
        }

        $paiement = PaiementVideo::where('transaction_id', $reference)->first();

        if ($status === 'completed' && $paiement && $paiement->statut === 'en_attente') {
            $this->grantVideoAccess($paiement);
        }

        return response()->json(['status' => 'ok']);
    }

    /**
     * Accorder l'accès à la vidéo après paiement confirmé.
     */
    protected function grantVideoAccess(PaiementVideo $paiement): void
    {
        $paiement->update(['statut' => 'complete', 'date_paiement' => now()]);

        UserVideoAccess::create([
            'user_id' => $paiement->user_id,
            'video_id' => $paiement->video_id,
            'paiement_video_id' => $paiement->id,
            'acces_jusquau' => now()->addYears(2),
        ]);

        // Créer une notification pour l'admin
        $user = User::find($paiement->user_id);
        $video = FormationVideo::find($paiement->video_id);
        if ($user && $video) {
            Notification::create([
                'type' => 'achat_video',
                'message' => "{$user->name} a acheté la vidéo {$video->titre}",
                'data' => [
                    'user_id' => $paiement->user_id,
                    'video_id' => $paiement->video_id,
                    'montant' => $paiement->montant,
                ],
            ]);
        }
    }

    /**
     * Annulation du paiement
     */
    public function cancel(Request $request)
    {
        $token = $request->get('token');
        $reference = $request->get('reference') ?? $request->get('transaction_id');

        $paiement = $token
            ? PaiementVideo::find($token)
            : PaiementVideo::where('transaction_id', $reference)->first();

        if ($paiement) {
            $paiement->update(['statut' => 'echec']);
        }

        return view('videos.payment_cancelled');
    }

    /**
     * Page de succès
     */
    public function success($videoId)
    {
        $video = FormationVideo::findOrFail($videoId);
        return view('videos.success', compact('video'));
    }

    /**
     * Streamer une vidéo (protection anti-téléchargement)
     */
    public function stream($id)
    {
        $user = Auth::user();

        if (!$user) {
            abort(403, 'Vous devez être connecté');
        }

        $video = FormationVideo::findOrFail($id);
        $hasAccess = $this->checkUserAccess($user, $video);

        if (!$hasAccess) {
            abort(403, 'Vous n\'avez pas accès à cette vidéo');
        }

        $videoPath = storage_path('app/public/' . $video->video_path);

        if (!file_exists($videoPath)) {
            abort(404, 'Vidéo non trouvée');
        }

        // Streamer le fichier avec des headers anti-téléchargement
        return response()->file($videoPath, [
            'Content-Type' => 'video/mp4',
            'Content-Disposition' => 'inline; filename="' . basename($videoPath) . '"',
            'X-Content-Type-Options' => 'nosniff',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }

    /**
     * Dashboard utilisateur - Vidéos achetées
     */
    public function dashboard()
    {
        $user = Auth::user();

        $accessList = UserVideoAccess::where('user_id', $user->id)
            ->where('acces_jusquau', '>', now())
            ->with('video')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('videos.dashboard', compact('accessList'));
    }

    /**
     * Vérifier si l'utilisateur a accès à une vidéo
     */
    private function checkUserAccess($user, $video)
    {
        if (!$user) {
            return false;
        }

        return UserVideoAccess::where('user_id', $user->id)
            ->where('video_id', $video->id)
            ->where('acces_jusquau', '>', now())
            ->exists();
    }

    /**
     * S'assurer que l'URL est absolue
     */
    private function ensureAbsoluteUrl($url): string
    {
        if (str_starts_with($url, 'http')) {
            return $url;
        }

        $baseUrl = config('app.url', 'https://monprofchezmoi-ci.com');
        return rtrim($baseUrl, '/') . '/' . ltrim($url, '/');
    }
}
