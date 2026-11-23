<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CinetPayV2Service
{
    protected string $apiKey;
    protected string $apiPassword;
    protected string $baseUrl;
    protected ?string $accessToken = null;

    public function __construct()
    {
        $this->apiKey      = config('services.cinetpay.api_key');
        $this->apiPassword = config('services.cinetpay.password');
        $this->baseUrl     = rtrim(config('services.cinetpay.base_url', 'https://api-checkout.cinetpay.com/v2'), '/');
    }

    /**
     * Étape 1 : Authentification OAuth 2.0
     */
    public function authenticate(): bool
    {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post("{$this->baseUrl}/v1/oauth/login", [
                'api_key'      => $this->apiKey,
                'api_password' => $this->apiPassword,
            ]);

            $result = $response->json();

            if (isset($result['access_token'])) {
                $this->accessToken = $result['access_token'];
                Log::info('CinetPay OAuth success');
                return true;
            }

            Log::error('CinetPay OAuth failed', $result);
            return false;

        } catch (\Exception $e) {
            Log::error('CinetPay OAuth error: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Étape 2 : Initialiser un paiement (obtenir un paymentToken)
     */
    public function initPayment(array $data): array
    {
        // S'assurer qu'on est authentifié
        if (!$this->accessToken && !$this->authenticate()) {
            return [
                'success' => false,
                'message' => 'Impossible de s\'authentifier à CinetPay',
            ];
        }

        try {
            $payload = [
                'currency'                => $data['currency'] ?? 'XOF',
                'merchant_transaction_id' => 'TXN' . time(),
                'amount'                  => (int) $data['amount'],
                'lang'                    => $data['lang'] ?? 'fr',
                'designation'             => substr($data['description'] ?? 'Paiement', 0, 100),
                'client_first_name'       => substr($data['customer_name'] ?? 'Client', 0, 50),
                'client_last_name'        => substr($data['customer_surname'] ?? '', 0, 50),
                'client_email'            => $data['customer_email'] ?? '',
                'client_phone_number'     => $this->formatPhone($data['customer_phone_number'] ?? ''),
                'client_address'          => $data['customer_address'] ?? 'Abidjan',
                'client_city'             => $data['customer_city'] ?? 'Abidjan',
                'client_country'          => $data['customer_country'] ?? 'CI',
                'client_state'            => $data['customer_state'] ?? 'Abidjan',
                'client_zip_code'         => $data['customer_zip_code'] ?? '00225',
                'success_url'             => $data['return_url'],
                'failed_url'              => $data['cancel_url'] ?? $data['return_url'],
                'notify_url'              => $data['notify_url'],
                'channel'                 => $data['channel'] ?? 'PUSH',
            ];

            Log::info('CinetPay V2 - Init Payment Request', [
                'transaction_id' => $payload['merchant_transaction_id'],
                'amount' => $payload['amount'],
            ]);

            $response = Http::withHeaders([
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->accessToken,
            ])->post("{$this->baseUrl}/v1/payment", $payload);

            $result = $response->json();

            Log::info('CinetPay V2 - Init Payment Response', $result);

            // La nouvelle API retourne un paymentToken
            if (isset($result['payment_token'])) {
                return [
                    'success'       => true,
                    'payment_token' => $result['payment_token'],
                    'payment_url'   => $result['payment_url'] ?? (rtrim(config('services.cinetpay.checkout_url', 'https://secure.cinetpay.net'), '/') . '/' . $result['payment_token']),
                    'transaction_id'=> $payload['merchant_transaction_id'],
                    'message'       => 'Paiement initialisé avec succès',
                ];
            }

            // Si token expiré, réessayer une fois
            if (isset($result['code']) && $result['code'] === 'TOKEN_EXPIRED') {
                $this->accessToken = null;
                return $this->initPayment($data);
            }

            return [
                'success' => false,
                'message' => $result['message'] ?? $result['description'] ?? 'Erreur lors de l\'initialisation',
                'raw'     => $result,
            ];

        } catch (\Exception $e) {
            Log::error('CinetPay V2 - Init Payment Error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Erreur technique: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Étape 3 : Vérifier le statut d'un paiement
     */
    public function checkPaymentStatus(string $transactionId): array
    {
        if (!$this->accessToken && !$this->authenticate()) {
            return [
                'success' => false,
                'message' => 'Impossible de s\'authentifier à CinetPay',
            ];
        }

        try {
            $response = Http::withHeaders([
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->accessToken,
            ])->get("{$this->baseUrl}/v1/payment/{$transactionId}");

            $result = $response->json();

            Log::info('CinetPay V2 - Check Status Response', $result);

            if (isset($result['status'])) {
                return [
                    'success' => true,
                    'status'  => $result['status'], // ACCEPTED, REFUSED, PENDING, EXPIRED
                    'data'    => $result,
                    'message' => 'Vérification effectuée',
                ];
            }

            return [
                'success' => false,
                'message' => $result['message'] ?? 'Erreur de vérification',
            ];

        } catch (\Exception $e) {
            Log::error('CinetPay V2 - Check Status Error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Erreur de vérification: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Formater le numéro de téléphone
     */
    private function formatPhone(string $phone): string
    {
        $phone = preg_replace('/\s+/', '', $phone);
        $phone = ltrim($phone, '+');

        if (!str_starts_with($phone, '225') && strlen($phone) == 10) {
            $phone = '225' . $phone;
        }

        return $phone;
    }
}
