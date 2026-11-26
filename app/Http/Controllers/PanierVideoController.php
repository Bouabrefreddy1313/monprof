<?php

namespace App\Http\Controllers;

use App\Models\FormationVideo;
use App\Models\PanierVideo;
use App\Models\PaiementVideo;
use App\Models\UserVideoAccess;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Services\GeniusPayService;

class PanierVideoController extends Controller
{
    protected $geniuspay;

    public function __construct(GeniusPayService $geniuspay)
    {
        $this->geniuspay = $geniuspay;
    }

    /**
     * Ajouter une vidéo au panier
     */
    public function add($videoId)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Connectez-vous'], 401);
        }

        // Vérifier si déjà dans le panier
        $exists = PanierVideo::where('user_id', $user->id)
            ->where('video_id', $videoId)
            ->exists();

        if ($exists) {
            return response()->json(['info' => 'Déjà dans le panier']);
        }

        PanierVideo::create([
            'user_id' => $user->id,
            'video_id' => $videoId,
        ]);

        $count = PanierVideo::where('user_id', $user->id)->count();

        return response()->json([
            'success' => 'Ajoutée au panier',
            'count' => $count
        ]);
    }

    /**
     * Retirer une vidéo du panier
     */
    public function remove($videoId)
    {
        $user = Auth::user();
        if (!$user) return redirect()->route('particuliers.login');

        PanierVideo::where('user_id', $user->id)
            ->where('video_id', $videoId)
            ->delete();

        return back()->with('success', 'Vidéo retirée du panier');
    }

    /**
     * Afficher le panier
     */
    public function index()
    {
        $user = Auth::user();
        if (!$user) return redirect()->route('particuliers.login');

        $items = PanierVideo::where('user_id', $user->id)
            ->with('video')
            ->get();

        $total = $items->sum(fn($item) => $item->video->prix);

        return view('videos.panier', compact('items', 'total'));
    }

    /**
     * Payer les vidéos du panier (paiement groupé GeniusPay)
     */
    public function checkout(Request $request)
    {
        $user = Auth::user();
        if (!$user) return redirect()->route('particuliers.login');

        $items = PanierVideo::where('user_id', $user->id)->with('video')->get();

        if ($items->isEmpty()) {
            return back()->with('error', 'Votre panier est vide');
        }

        $total = $items->sum(fn($item) => $item->video->prix);
        $videoIds = $items->pluck('video_id')->toArray();
        $videoTitles = $items->pluck('video.titre')->toArray();

        // Créer le paiement groupé (un seul paiement pour toutes les vidéos)
        $groupTransactionId = 'PAN' . time() . $user->id;

        $returnUrl = route('particuliers.panier.return');
        $errorUrl = route('particuliers.panier.cancel');

        $returnUrl = $this->ensureAbsoluteUrl($returnUrl);
        $errorUrl = $this->ensureAbsoluteUrl($errorUrl);

        $result = $this->geniuspay->initPayment([
            'transaction_id'   => $groupTransactionId,
            'amount'           => (int) $total,
            'currency'         => 'XOF',
            'description'      => 'Achat groupé: ' . implode(', ', array_slice($videoTitles, 0, 3)),
            'success_url'      => $returnUrl,
            'error_url'        => $errorUrl,
            'customer_name'    => $user->name,
            'customer_email'   => $user->email,
            'customer_phone'   => $user->telephone ?? '0123456789',
            'customer_country' => 'CI',
            'metadata'         => [
                'type'      => 'panier',
                'user_id'   => $user->id,
                'video_ids' => $videoIds,
            ],
        ]);

        if ($result['success']) {
            // Stocker la référence GeniusPay et les vidéos liées en session
            session(['panier_payment_reference' => $result['reference']]);
            session(['panier_payment_video_ids' => $videoIds]);

            return redirect()->away($result['checkout_url']);
        }

        return back()->with('error', 'Erreur lors du paiement groupé');
    }

    /**
     * Retour après paiement groupé
     */
    public function returnPayment(Request $request)
    {
        $reference = $request->get('reference') ?? session('panier_payment_reference');

        if (!$reference) {
            return redirect()->route('particuliers.panier.cancel');
        }

        $checkResult = $this->geniuspay->checkPaymentStatus($reference);

        if ($checkResult['success'] && $checkResult['status'] === 'completed') {
            $user = Auth::user();
            $videoIds = session('panier_payment_video_ids', []);

            if ($user && !empty($videoIds)) {
                $videoNames = [];

                // Créer un paiement pour chaque vidéo
                foreach ($videoIds as $videoId) {
                    $video = FormationVideo::find($videoId);
                    if (!$video) continue;

                    $videoNames[] = $video->titre;

                    $paiement = PaiementVideo::create([
                        'user_id' => $user->id,
                        'video_id' => $videoId,
                        'transaction_id' => $reference . '-' . $videoId,
                        'montant' => $video->prix,
                        'methode_paiement' => 'geniuspay',
                        'statut' => 'complete',
                        'date_paiement' => now(),
                    ]);

                    // Donner accès
                    UserVideoAccess::create([
                        'user_id' => $user->id,
                        'video_id' => $videoId,
                        'paiement_video_id' => $paiement->id,
                        'acces_jusquau' => now()->addYears(2),
                    ]);
                }

                // Créer une notification pour l'admin (achat groupé)
                if (!empty($videoNames)) {
                    $totalMontant = collect($videoIds)->sum(function($id) {
                        $v = FormationVideo::find($id);
                        return $v ? $v->prix : 0;
                    });

                    Notification::create([
                        'type' => 'achat_video',
                        'message' => "{$user->name} a effectué un achat groupé (" . count($videoIds) . " vidéos)",
                        'data' => [
                            'user_id' => $user->id,
                            'video_ids' => $videoIds,
                            'montant' => $totalMontant,
                            'videos' => implode(', ', $videoNames),
                        ],
                    ]);
                }

                // Vider le panier et la session
                PanierVideo::where('user_id', $user->id)->delete();
                session()->forget(['panier_payment_reference', 'panier_payment_video_ids']);
            }

            return redirect()->route('particuliers.video.dashboard')
                ->with('success', 'Achat effectué avec succès !');
        }

        return redirect()->route('particuliers.panier.cancel');
    }

    /**
     * Webhook paiement groupé
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
        $metadata  = $data['metadata'] ?? [];

        if (!$reference) {
            return response()->json(['status' => 'missing_reference'], 400);
        }

        // Le webhook n'a pas accès à la session : le traitement se fait
        // dans le flux returnPayment (retour utilisateur). On confirme simplement
        // la réception du webhook.
        if ($status === 'completed' && !empty($metadata['video_ids'])) {
            Log::info('Panier payment completed via webhook', [
                'reference' => $reference,
                'video_ids' => $metadata['video_ids'],
                'user_id'   => $metadata['user_id'] ?? null,
            ]);
        }

        return response()->json(['status' => 'ok']);
    }

    /**
     * Annulation du paiement
     */
    public function cancel(Request $request)
    {
        $transactionId = $request->get('transaction_id');

        session()->forget(['panier_payment_video_ids', 'panier_payment_reference']);

        return redirect()->route('particuliers.panier.index')
            ->with('error', 'Paiement annulé. Réessayez.');
    }

    private function ensureAbsoluteUrl($url): string
    {
        if (str_starts_with($url, 'http')) {
            return $url;
        }
        $baseUrl = config('app.url', 'https://monprofchezmoi-ci.com');
        return rtrim($baseUrl, '/') . '/' . ltrim($url, '/');
    }
}
