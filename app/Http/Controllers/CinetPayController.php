<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Inscription;
use App\Services\CinetPayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CinetPayController extends Controller
{
    protected $cinetpay;

    public function __construct(CinetPayService $cinetpay)
    {
        $this->cinetpay = $cinetpay;
    }

    /**
     * Initier un paiement CinetPay
     */
    public function initiate(Request $request)
    {
        $request->validate([
            'reservation_token' => 'required|string',
            'type' => 'required|in:reservation,inscription',
        ]);

        $type = $request->type;

        if ($type === 'reservation') {
            $reservation = Reservation::where('token', $request->reservation_token)->firstOrFail();

            $amount = $reservation->acompte;
            $description = 'Acompte formation - ' . ($reservation->cours->titre ?? 'Formation');
            $customerName = $reservation->nom;
            $customerSurname = '';
            $customerEmail = $reservation->email;
            $customerPhone = $reservation->telephone;
            $transactionId = 'RES_' . $reservation->id . '_' . time();

            $returnUrl = route('particuliers.cinetpay.return', ['type' => 'reservation', 'token' => $reservation->token]);
            $cancelUrl = route('particuliers.cinetpay.cancel', ['transaction_id' => $transactionId]);
            $notifyUrl = route('particuliers.cinetpay.notify');

        } else {
            $inscription = Inscription::where('token', $request->reservation_token)->firstOrFail();

            $amount = $inscription->frais_reservation ?? 10000;
            $description = 'Frais inscription - ' . $inscription->activite;
            $customerName = $inscription->nom_parent;
            $customerSurname = $inscription->nom_enfant ?? '';
            $customerEmail = $inscription->email ?? '';
            $customerPhone = $inscription->telephone;
            $transactionId = 'INS_' . $inscription->id . '_' . time();

            $returnUrl = route('particuliers.cinetpay.return', ['type' => 'inscription', 'token' => $inscription->token]);
            $cancelUrl = route('particuliers.cinetpay.cancel', ['transaction_id' => $transactionId]);
            $notifyUrl = route('particuliers.cinetpay.notify');
        }

        // S'assurer que les URLs sont absolues
        $returnUrl = $this->ensureAbsoluteUrl($returnUrl);
        $cancelUrl = $this->ensureAbsoluteUrl($cancelUrl);
        $notifyUrl = $this->ensureAbsoluteUrl($notifyUrl);

        Log::info('CinetPay Initiate', [
            'type' => $type,
            'transaction_id' => $transactionId,
            'amount' => $amount,
            'return_url' => $returnUrl,
            'cancel_url' => $cancelUrl,
            'notify_url' => $notifyUrl,
        ]);

        $result = $this->cinetpay->initPayment([
            'transaction_id' => $transactionId,
            'amount' => $amount,
            'currency' => 'XOF',
            'description' => $description,
            'return_url' => $returnUrl,
            'cancel_url' => $cancelUrl,
            'notify_url' => $notifyUrl,
            'customer_name' => substr($customerName, 0, 50),
            'customer_surname' => substr($customerSurname, 0, 50),
            'customer_email' => $customerEmail,
            'customer_phone_number' => $this->formatPhoneNumber($customerPhone),
        ]);

        if ($result['success'] && isset($result['payment_url'])) {
            $this->saveTransactionId($type, $reservation ?? null, $inscription ?? null, $transactionId);

            Log::info('CinetPay Redirect', ['payment_url' => $result['payment_url']]);

            return redirect()->away($result['payment_url']);
        }

        if (!empty($result['manual_fallback'])) {
            $this->saveTransactionId($type, $reservation ?? null, $inscription ?? null, $transactionId);

            return redirect()->route('particuliers.cinetpay.manual', [
                'transaction_id' => $transactionId,
                'type' => $type,
                'token' => $request->reservation_token,
            ])->with('warning', $result['message']);
        }

        Log::error('CinetPay Init Failed', ['result' => $result]);

        return back()->with('error', $result['message'] ?? 'Erreur lors de l\'initialisation du paiement');
    }

    /**
     * Webhook CinetPay (notification de paiement)
     */
    public function notify(Request $request)
    {
        Log::info('CinetPay webhook received', $request->all());

        $transactionId = $request->input('cpm_trans_id') ?? $request->input('transaction_id');

        if (!$transactionId) {
            Log::warning('CinetPay webhook: no transaction_id');
            return response()->json(['status' => 'missing_transaction_id'], 400);
        }

        // Vérifier le statut via l'API
        $checkResult = $this->cinetpay->checkPaymentStatus($transactionId);
        $isSuccess = $checkResult['success'] && $checkResult['status'] === 'ACCEPTED';

        if (str_starts_with($transactionId, 'RES_')) {
            $parts = explode('_', $transactionId);
            $reservationId = $parts[1] ?? null;

            if ($reservationId) {
                $reservation = Reservation::find($reservationId);
                if ($reservation) {
                    if ($isSuccess) {
                        $reservation->update([
                            'statut' => 'acompte_paye',
                            'date_paiement_acompte' => now(),
                        ]);

                        try {
                            Mail::to($reservation->email)->send(new \App\Mail\PaiementRecu($reservation));
                        } catch (\Exception $e) {
                            Log::error('Erreur envoi email paiement: ' . $e->getMessage());
                        }
                    } else {
                        $reservation->update(['statut' => 'annule']);
                    }
                }
            }

        } elseif (str_starts_with($transactionId, 'INS_')) {
            $parts = explode('_', $transactionId);
            $inscriptionId = $parts[1] ?? null;

            if ($inscriptionId) {
                $inscription = Inscription::find($inscriptionId);
                if ($inscription) {
                    if ($isSuccess) {
                        $inscription->update([
                            'statut' => 'confirme',
                            'mode_paiement_final' => 'cinetpay',
                            'date_paiement' => now(),
                        ]);
                    } else {
                        $inscription->update(['statut' => 'annule']);
                    }
                }
            }
        }

        return response()->json(['status' => 'ok']);
    }

    /**
     * Retour après paiement (utilisateur redirigé par CinetPay)
     */
    public function returnPayment(Request $request)
    {
        $transactionId = $request->input('transaction_id') ?? $request->input('cpm_trans_id');
        $status = $request->input('status') ?? $request->input('cpm_result');

        Log::info('CinetPay Return', [
            'transaction_id' => $transactionId,
            'status' => $status,
            'all_params' => $request->all(),
        ]);

        if ($status == 'ACCEPTED' || $status == '00') {
            // Vérifier le statut réel via l'API pour plus de sécurité
            $checkResult = $this->cinetpay->checkPaymentStatus($transactionId);

            if ($checkResult['success'] && $checkResult['status'] === 'ACCEPTED') {
                return redirect()->route('particuliers.cinetpay.success', [
                    'transaction_id' => $transactionId,
                    'type' => $request->get('type', 'unknown'),
                    'token' => $request->get('token'),
                ]);
            }
        }

        return redirect()->route('particuliers.cinetpay.cancel', ['transaction_id' => $transactionId]);
    }

    /**
     * Page de succès
     */
    public function success(Request $request)
    {
        $transactionId = $request->get('transaction_id');
        $type = $request->get('type');
        $token = $request->get('token');

        $amount = 0;
        $date = now()->format('d/m/Y H:i');

        if (str_starts_with($transactionId, 'RES_')) {
            $parts = explode('_', $transactionId);
            $reservation = Reservation::find($parts[1] ?? null);
            if ($reservation) {
                $type = 'reservation';
                $amount = $reservation->acompte;
                $token = $reservation->token;
            }
        } elseif (str_starts_with($transactionId, 'INS_')) {
            $parts = explode('_', $transactionId);
            $inscription = Inscription::find($parts[1] ?? null);
            if ($inscription) {
                $type = 'inscription';
                $amount = $inscription->frais_reservation;
                $token = $inscription->token;
            }
        }

        $transaction_id = $transactionId;

        return view('payement.success', compact('transaction_id', 'type', 'amount', 'date', 'token'));
    }

    /**
     * Page d'échec
     */
    public function cancel(Request $request)
    {
        $transactionId = $request->get('transaction_id');

        $transaction_id = $transactionId;

        return view('payement.failure', compact('transaction_id'));
    }

    /**
     * Page de paiement manuel quand CinetPay est indisponible.
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

        $wave = config('services.manual_payment.wave', '+225 00 00 00 00 00');
        $orange_money = config('services.manual_payment.orange_money', '+225 00 00 00 00 00');

        return view('payement.manual', compact('transaction_id', 'amount', 'wave', 'orange_money'));
    }

    private function saveTransactionId($type, ?Reservation $reservation, ?Inscription $inscription, string $transactionId): void
    {
        if ($type === 'reservation' && $reservation) {
            $reservation->update(['transaction_id' => $transactionId]);
            return;
        }

        if ($type === 'inscription' && $inscription) {
            $inscription->update(['transaction_id' => $transactionId]);
        }
    }

    /**
     * Helper : S'assurer que l'URL est absolue
     */
    private function ensureAbsoluteUrl($url)
    {
        if (str_starts_with($url, 'http')) {
            return $url;
        }

        $baseUrl = config('app.url', 'https://monprofchezmoi-ci.com');
        return rtrim($baseUrl, '/') . '/' . ltrim($url, '/');
    }

    /**
     * Helper : Formater le numéro de téléphone
     */
    private function formatPhoneNumber($phone)
    {
        $phone = preg_replace('/\s+/', '', $phone);
        $phone = ltrim($phone, '+');

        if (!str_starts_with($phone, '225') && strlen($phone) == 10) {
            $phone = '225' . $phone;
        }

        return $phone;
    }
}
