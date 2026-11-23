<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Inscription;
use App\Models\GiftVoucher;
use App\Services\GeniusPayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use PDF;

class PaymentController extends Controller
{
    protected GeniusPayService $geniuspay;

    public function __construct(GeniusPayService $geniuspay)
    {
        $this->geniuspay = $geniuspay;
    }

    /**
     * 🔥 INITIER UN PAIEMENT (appelé depuis le formulaire)
     * Route: POST /payment/initiate
     */
    public function initiate(Request $request)
    {
        $request->validate([
            'reservation_token' => 'required|string',
            'type' => 'required|in:reservation,inscription,voucher',
        ]);

        $type = $request->type;

        if ($type === 'reservation') {
            $item = Reservation::where('token', $request->reservation_token)->firstOrFail();

            $amount = (int) $item->acompte;
            $description = 'Acompte formation - ' . ($item->cours->titre ?? 'Formation');
            $customerName = $item->nom;
            $customerEmail = $item->email;
            $customerPhone = $this->formatPhone($item->telephone);

        } elseif ($type === 'inscription') {
            $item = Inscription::where('token', $request->reservation_token)->firstOrFail();

            $amount = (int) ($item->frais_reservation ?? 10000);
            $description = 'Frais inscription - ' . $item->activite;
            $customerName = $item->nom_parent;
            $customerEmail = $item->email ?? '';
            $customerPhone = $this->formatPhone($item->telephone);

        } else { // voucher
            $item = GiftVoucher::where('token', $request->reservation_token)->firstOrFail();

            $amount = (int) $item->amount;
            $description = 'Bon cadeau - ' . ($item->title ?? 'Bon de formation');
            $customerName = $item->purchaser_email ?? 'Client';
            $customerEmail = $item->purchaser_email ?? $item->beneficiary_email ?? 'client@example.com';
            $customerPhone = $this->formatPhone($item->purchaser_phone ?? '');
        }

        $transactionId = 'TXN' . time();

        $successUrl = $this->ensureAbsoluteUrl(route('payment.return', ['type' => $type, 'token' => $item->token]));
        $errorUrl   = $this->ensureAbsoluteUrl(route('payment.cancel', ['type' => $type, 'token' => $item->token]));

        Log::info('Payment Initiate', [
            'type'           => $type,
            'transaction_id' => $transactionId,
            'amount'         => $amount,
        ]);

        $result = $this->geniuspay->initPayment([
            'transaction_id'   => $transactionId,
            'amount'           => $amount,
            'currency'         => 'XOF',
            'description'      => $description,
            'success_url'      => $successUrl,
            'error_url'        => $errorUrl,
            'customer_name'    => substr($customerName, 0, 100),
            'customer_email'   => $customerEmail,
            'customer_phone'   => $customerPhone,
            'customer_country' => 'CI',
            'metadata'         => [
                'type'  => $type,
                'token' => $item->token,
                'id'    => $item->id,
            ],
        ]);

        if ($result['success']) {
            // Stocker la référence GeniusPay comme transaction_id de l'item
            $item->update(['transaction_id' => $result['reference']]);

            Log::info('Payment Redirect', [
                'reference'    => $result['reference'],
                'checkout_url' => $result['checkout_url'],
            ]);

            // Si la requête est AJAX (formulaire de redirection), renvoyer l'URL en JSON
            if ($request->expectsJson()) {
                return response()->json([
                    'success'     => true,
                    'payment_url' => $result['checkout_url'],
                    'reference'   => $result['reference'],
                ]);
            }

            return redirect()->away($result['checkout_url']);
        }

        Log::error('Payment Init Failed', ['result' => $result]);

        return back()->with('error', $result['message'] ?? 'Erreur lors de l\'initialisation du paiement');
    }

    /**
     * 🔥 WEBHOOK GeniusPay (notification serveur-à-serveur)
     * Route: POST /payment/notify
     */
    public function notify(Request $request)
    {
        Log::info('GeniusPay webhook received', [
            'headers' => $request->headers->all(),
            'body'    => $request->all(),
        ]);

        if (!$this->geniuspay->verifyWebhookSignature($request)) {
            Log::warning('GeniusPay webhook: signature invalide');
            return response()->json(['status' => 'invalid_signature'], 401);
        }

        $payload   = $request->all();
        $event     = $payload['event'] ?? $request->header('X-Webhook-Event');
        $data      = $payload['data'] ?? [];
        $reference = $data['reference'] ?? null;
        $status    = $data['status'] ?? null;
        $metadata  = $data['metadata'] ?? [];

        if (!$reference) {
            Log::warning('GeniusPay webhook: pas de référence');
            return response()->json(['status' => 'missing_reference'], 400);
        }

        $isSuccess = $status === 'completed' || in_array($event, ['payment.success']);

        $item = $this->findPaymentItem($reference, $metadata);
        if ($item) {
            $this->handlePaymentStatus($item, $metadata['type'] ?? null, $isSuccess);
        } else {
            Log::warning('GeniusPay webhook: item introuvable', compact('reference', 'metadata'));
        }

        return response()->json(['status' => 'ok']);
    }

    /**
     * 🔥 RETOUR UTILISATEUR (après paiement sur GeniusPay)
     * Route: GET /payment/return
     */
    public function returnPayment(Request $request)
    {
        $type      = $request->get('type');
        $token     = $request->get('token');
        $reference = $request->get('reference') ?? $request->get('transaction_id');

        Log::info('Payment Return', compact('type', 'token', 'reference'));

        // Si la référence n'est pas dans l'URL, on la retrouve via le token
        if (!$reference && $token) {
            $item = $this->findByToken($type, $token);
            $reference = $item?->transaction_id;
        }

        if (!$reference) {
            return redirect()->route('payment.cancel')->with('error', 'Transaction invalide');
        }

        $checkResult = $this->geniuspay->checkPaymentStatus($reference);

        if ($checkResult['success'] && $checkResult['status'] === 'completed') {
            return redirect()->route('payment.success', [
                'type'      => $type,
                'token'     => $token,
                'reference' => $reference,
            ]);
        }

        return redirect()->route('payment.cancel', ['type' => $type, 'token' => $token])
            ->with('error', 'Le paiement a échoué ou a été annulé.');
    }

    /**
     * ✅ PAGE DE SUCCÈS
     * Route: GET /payment/success
     */
    public function success(Request $request)
    {
        $type      = $request->get('type');
        $token     = $request->get('token');
        $reference = $request->get('reference') ?? $request->get('transaction_id');

        $amount = 0;
        $date   = now()->format('d/m/Y H:i');

        $item = $this->findByToken($type, $token);
        if ($item) {
            $amount = match ($type) {
                'reservation' => (float) $item->acompte,
                'inscription' => (float) $item->frais_reservation,
                'voucher'     => (float) $item->amount,
                default       => 0,
            };
            $reference = $reference ?? $item->transaction_id;
        }

        $transaction_id = $reference ?? '';

        $reservation = ($type === 'reservation' && $item instanceof Reservation) ? $item : null;

        return view('payement.success', compact('transaction_id', 'type', 'amount', 'date', 'token', 'reservation'));
    }

    /**
     * ❌ PAGE D'ÉCHEC
     * Route: GET /payment/cancel
     */
    public function cancel(Request $request)
    {
        $type  = $request->get('type');
        $token = $request->get('token');

        $item = $this->findByToken($type, $token);
        if ($item) {
            match ($type) {
                'reservation' => $item->update(['statut' => 'annule']),
                'inscription' => $item->update(['statut' => 'annule']),
                'voucher'     => $item->update(['status' => 'active', 'transaction_id' => null]),
                default       => null,
            };
        }

        $transactionId = $request->get('reference') ?? $request->get('transaction_id');

        return view('payement.failure', compact('transactionId'));
    }

    /**
     * 💳 PAIEMENT MANUEL (fallback si GeniusPay down)
     * Route: GET /payment/manual
     */
    public function manual(Request $request)
    {
        $transaction_id = $request->get('transaction_id');
        $type = $request->get('type');
        $token = $request->get('token');
        $amount = 10000;

        if ($type === 'reservation') {
            $reservation = Reservation::where('token', $token)->first();
            $amount = $reservation?->acompte ?? $amount;
        } elseif ($type === 'inscription') {
            $inscription = Inscription::where('token', $token)->first();
            $amount = $inscription?->frais_reservation ?? $amount;
        }

        $wave = config('services.manual_payment.wave', '+225 01 53 75 15 44');
        $orange_money = config('services.manual_payment.orange_money', '+225 01 53 75 15 44');

        return view('payement.manual', compact('transaction_id', 'amount', 'wave', 'orange_money'));
    }

    // ==================== HELPERS ====================

    private function findPaymentItem(?string $reference, array $metadata = [])
    {
        $type = $metadata['type'] ?? null;
        $id   = $metadata['id'] ?? null;
        $token = $metadata['token'] ?? null;

        if ($type && $id) {
            return match ($type) {
                'reservation' => Reservation::find($id),
                'inscription' => Inscription::find($id),
                'voucher'     => GiftVoucher::find($id),
                default       => null,
            };
        }

        if ($reference) {
            $item = Reservation::where('transaction_id', $reference)->first();
            if ($item) return $item;

            $item = Inscription::where('transaction_id', $reference)->first();
            if ($item) return $item;

            $item = GiftVoucher::where('transaction_id', $reference)->first();
            if ($item) return $item;
        }

        return null;
    }

    private function findByToken(?string $type, ?string $token)
    {
        if (!$token) return null;

        return match ($type) {
            'reservation' => Reservation::where('token', $token)->first(),
            'inscription' => Inscription::where('token', $token)->first(),
            'voucher'     => GiftVoucher::where('token', $token)->first(),
            default       => null,
        };
    }

    private function handlePaymentStatus($item, ?string $type, bool $isSuccess): void
    {
        if ($type === 'reservation' && $item instanceof Reservation) {
            $this->handleReservationPayment($item, $isSuccess);
        } elseif ($type === 'inscription' && $item instanceof Inscription) {
            $this->handleInscriptionPayment($item, $isSuccess);
        } elseif ($type === 'voucher' && $item instanceof GiftVoucher) {
            $this->handleVoucherPayment($item, $isSuccess);
        }
    }

    private function handleReservationPayment(Reservation $reservation, bool $isSuccess): void
    {
        if ($isSuccess) {
            $reservation->update([
                'statut' => 'acompte_paye',
                'date_paiement_acompte' => now(),
            ]);

            try {
                Mail::to($reservation->email)->send(new \App\Mail\PaiementRecu($reservation));
            } catch (\Exception $e) {
                Log::error('Erreur envoi email: ' . $e->getMessage());
            }
        } else {
            $reservation->update(['statut' => 'annule']);
        }
    }

    private function handleInscriptionPayment(Inscription $inscription, bool $isSuccess): void
    {
        if ($isSuccess) {
            $inscription->update([
                'statut' => 'confirme',
                'mode_paiement_final' => 'geniuspay',
                'date_paiement' => now(),
            ]);
        } else {
            $inscription->update(['statut' => 'annule']);
        }
    }

    private function handleVoucherPayment(GiftVoucher $voucher, bool $isSuccess): void
    {
        if ($isSuccess) {
            $voucher->update([
                'status' => 'active',
                'date_paiement' => now(),
            ]);

            try {
                $pdf = PDF::loadView('vouchers.pdf', ['voucher' => $voucher]);
                $pdfPath = 'vouchers/' . $voucher->code . '.pdf';
                \Storage::disk('public')->put($pdfPath, $pdf->output());
                $voucher->pdf_path = $pdfPath;
                $voucher->save();

                $to = $voucher->beneficiary_email ?? $voucher->purchaser_email;
                Mail::to($to)->send(new \App\Mail\GiftVoucherMail($voucher));
            } catch (\Exception $e) {
                Log::error('Erreur voucher payment: ' . $e->getMessage());
            }
        } else {
            $voucher->update(['status' => 'pending_payment']);
        }
    }

    private function formatPhone(?string $phone): string
    {
        return (new GeniusPayService())->formatPhone($phone);
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
