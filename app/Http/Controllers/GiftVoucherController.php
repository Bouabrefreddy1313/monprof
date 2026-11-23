<?php

namespace App\Http\Controllers;

use App\Models\GiftVoucher;
use Illuminate\Http\Request;
use App\Mail\GiftVoucherMail;
use PDF; // barryvdh/laravel-dompdf
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class GiftVoucherController extends Controller
{
    public function index()
    {
        $vouchers = GiftVoucher::latest()->paginate(12);
        return view('bons.index', compact('vouchers'));
    }
    public function voir()
    {
        // Récupère tous les bons actifs pour les clients
        $vouchers = GiftVoucher::where('status', 'active')->orderBy('created_at', 'desc')->get();

        return view('gift-vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        // page avec ton formulaire d'achat
        return view('vouchers.create');
    }

    public function store(Request $request)
    {
        // Validation basique
        $data = $request->validate([
            'amount' => 'required|numeric|min:1',
            'currency' => 'required|string',
            'beneficiary_email' => 'nullable|email',
            'message' => 'nullable|string|max:500',
            'expires_at' => 'nullable|date',
            'deliver_to_beneficiary' => 'nullable|boolean',
        ]);

        // Crée le bon en attente de paiement
        $code = GiftVoucher::generateCode();

        $voucher = GiftVoucher::create([
            'code' => $code,
            'amount' => intval($data['amount']),
            'currency' => $data['currency'],
            'purchaser_id' => Auth::id(),
            'purchaser_email' => Auth::user()->email,
            'beneficiary_email' => $data['beneficiary_email'] ?? null,
            'message' => $data['message'] ?? null,
            'expires_at' => !empty($data['expires_at']) ? Carbon::parse($data['expires_at']) : null,
            'status' => 'active',
        ]);

        // Ici on lance la session de paiement (exemple Stripe Checkout)
        // Tu peux remplacer par ton intégration CinetPay / PayPal
        // Exemple : redirect vers page paiement avec $voucher->id pour callback
        return redirect()->route('bons.show', $voucher)->with('success', 'Bon créé avec succès. Cliquez sur "Acheter" pour payer.');
    }

    // Méthode appelée par ton webhook de paiement -> marquer comme active et envoyer le mail
    public function paymentWebhook(Request $request)
    {
        // Exemple simplifié : on suppose que le webhook fournit voucher_id et status=paid
        $voucherId = $request->input('metadata.voucher_id');
        $status = $request->input('status');

        $voucher = GiftVoucher::find($voucherId);
        if (!$voucher) return response()->json(['error' => 'Voucher not found'], 404);

        if ($status === 'paid') {
            $voucher->status = 'active';
            $voucher->save();

            // Générer PDF
            $pdf = PDF::loadView('vouchers.pdf', compact('voucher'));
            $pdfPath = 'vouchers/' . $voucher->code . '.pdf';
            \Storage::disk('public')->put($pdfPath, $pdf->output());
            $voucher->pdf_path = $pdfPath;
            $voucher->save();

            // Envoyer email (au bénéficiaire si fourni ou à l'acheteur)
            $to = $voucher->beneficiary_email ?? $voucher->purchaser_email;
            Mail::to($to)->send(new GiftVoucherMail($voucher));
        }

        return response()->json(['ok' => true]);
    }

    public function downloadPdf(GiftVoucher $voucher)
    {
        if (!$voucher->pdf_path) abort(404);
        return response()->download(storage_path('app/public/' . $voucher->pdf_path));
    }

    // Redeem: appelé lors de l'inscription / paiement pour une formation
    public function redeem(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string',
            'formation_id' => 'required|integer',
        ]);

        $voucher = GiftVoucher::where('code', $data['code'])->first();
        if (!$voucher) return back()->withErrors(['code' => 'Code invalide.']);

        if (!$voucher->isValid()) {
            return back()->withErrors(['code' => 'Le bon n\'est pas valide (déjà utilisé, expiré ou annulé).']);
        }

        // Logique : appliquer la reduction / prise en charge
        // Ex : marquer comme utilisé et lier à l'utilisateur
        $voucher->markUsed(Auth::id());

        // Ajoute ici la logique pour créditer le compte / appliquer une réduction dans la commande d'inscription à la formation
        // ...
        return back()->with('success', 'Bon appliqué avec succès.');

    }
    public function show(GiftVoucher $voucher)
{
    return view('bons.show', compact('voucher'));
}

    public function purchase(Request $request, GiftVoucher $voucher)
    {
        // Vérifier que le bon est disponible pour l'achat
        if (!in_array($voucher->status, ['active', 'pending_payment'])) {
            return back()->with('error', 'Ce bon n\'est pas disponible à l\'achat.');
        }

        // Créer un token unique pour le paiement (sans changer le statut encore)
        $token = Str::random(64);
        $voucher->token = $token;
        $voucher->save();

        Log::info('Voucher purchase initiated', [
            'voucher_id' => $voucher->id,
            'token' => $token,
        ]);

        // Rediriger vers la page de paiement CinetPay
        return view('bons.redirect-payment', compact('voucher', 'token'));
    }

}
