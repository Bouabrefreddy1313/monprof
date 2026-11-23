<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeniusPayService
{
    protected string $apiKey;
    protected string $apiSecret;
    protected string $baseUrl;
    protected string $webhookSecret;

    public function __construct()
    {
        $this->apiKey        = config('services.geniuspay.api_key', '');
        $this->apiSecret     = config('services.geniuspay.api_secret', '');
        $this->baseUrl       = rtrim(config('services.geniuspay.base_url', 'https://geniuspay.ci/api/v1/merchant'), '/');
        $this->webhookSecret = config('services.geniuspay.webhook_secret', '');
    }

    /**
     * Headers d'authentification GeniusPay
     */
    protected function headers(): array
    {
        return [
            'X-API-Key'    => $this->apiKey,
            'X-API-Secret' => $this->apiSecret,
            'Content-Type' => 'application/json',
            'Accept'       => 'application/json',
        ];
    }

    /**
     * Initialiser un paiement GeniusPay.
     *
     * @param array $data [
     *   'transaction_id'   => identifiant interne (optionnel, mis dans metadata)
     *   'amount'           => montant en XOF (min 200)
     *   'currency'         => XOF, EUR, USD (défaut XOF)
     *   'description'      => description (max 500)
     *   'success_url'      => URL de redirection après succès
     *   'error_url'        => URL de redirection après échec
     *   'customer_name'    => nom du client
     *   'customer_email'   => email du client
     *   'customer_phone'   => téléphone international
     *   'customer_country' => code pays ISO2
     *   'metadata'         => données personnalisées
     * ]
     */
    public function initPayment(array $data): array
    {
        $payload = [
            'amount'      => (int) $data['amount'],
            'currency'    => $data['currency'] ?? 'XOF',
            'description' => substr($data['description'] ?? 'Paiement', 0, 500),
            'customer'    => [
                'name'    => substr($data['customer_name'] ?? 'Client', 0, 100),
                'email'   => $data['customer_email'] ?? '',
                'phone'   => $data['customer_phone'] ?? '',
                'country' => $data['customer_country'] ?? 'CI',
            ],
            'success_url' => $data['success_url'] ?? '',
            'error_url'   => $data['error_url'] ?? '',
            'metadata'    => array_merge($data['metadata'] ?? [], [
                'app_transaction_id' => $data['transaction_id'] ?? null,
            ]),
        ];

        try {
            $response = Http::withHeaders($this->headers())
                ->post("{$this->baseUrl}/payments", $payload);

            $result = $response->json();

            Log::info('GeniusPay - Init Payment Response', [
                'status' => $response->status(),
                'body'   => $result,
            ]);

            if (($result['success'] ?? false) && isset($result['data']['checkout_url'])) {
                return [
                    'success'       => true,
                    'reference'     => $result['data']['reference'],
                    'checkout_url'  => $result['data']['checkout_url'],
                    'payment_url'   => $result['data']['checkout_url'],
                    'data'          => $result['data'],
                    'message'       => 'Paiement initialisé avec succès',
                ];
            }

            return [
                'success' => false,
                'message' => $result['error']['message'] ?? 'Erreur lors de l\'initialisation du paiement',
                'raw'     => $result,
            ];
        } catch (\Exception $e) {
            Log::error('GeniusPay - Init Payment Error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Erreur technique: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Récupérer le statut d'un paiement via sa référence (MTX-XXXXXXXXXX)
     */
    public function checkPaymentStatus(string $reference): array
    {
        try {
            $response = Http::withHeaders($this->headers())
                ->get("{$this->baseUrl}/payments/{$reference}");

            $result = $response->json();

            Log::info('GeniusPay - Check Status Response', [
                'reference' => $reference,
                'status'    => $response->status(),
                'body'      => $result,
            ]);

            if (($result['success'] ?? false) && isset($result['data']['status'])) {
                return [
                    'success' => true,
                    'status'  => $result['data']['status'],
                    'data'    => $result['data'],
                    'message' => 'Vérification effectuée',
                ];
            }

            return [
                'success' => false,
                'message' => $result['error']['message'] ?? 'Erreur de vérification du paiement',
                'raw'     => $result,
            ];
        } catch (\Exception $e) {
            Log::error('GeniusPay - Check Status Error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Erreur de vérification: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Vérifier la signature d'un webhook GeniusPay.
     * signature = HMAC-SHA256(timestamp + "." + json_payload, secret)
     */
    public function verifyWebhookSignature(Request $request): bool
    {
        if (empty($this->webhookSecret)) {
            Log::warning('GeniusPay - webhook secret non configuré, signature non vérifiée');
            return true;
        }

        $signature = $request->header('X-Webhook-Signature');
        $timestamp = $request->header('X-Webhook-Timestamp');

        if (!$signature || !$timestamp) {
            return false;
        }

        $payload  = $request->getContent();
        $expected = hash_hmac('sha256', $timestamp . '.' . $payload, $this->webhookSecret);

        return hash_equals($expected, $signature);
    }

    /**
     * Normaliser un numéro de téléphone au format international.
     */
    public function formatPhone(?string $phone): string
    {
        $phone = preg_replace('/[\s\-\.]/', '', (string) $phone);

        if (empty($phone)) {
            return '';
        }

        if (!str_starts_with($phone, '+')) {
            if (strlen($phone) == 10 && str_starts_with($phone, '0')) {
                $phone = '225' . ltrim($phone, '0');
            }
            $phone = '+' . $phone;
        }

        return $phone;
    }
}
