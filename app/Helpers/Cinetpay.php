<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class CinetPay
{
    protected $site_id;
    protected $apikey;

    public function __construct($site_id, $apikey)
    {
        $this->site_id = $site_id;
        $this->apikey = $apikey;
    }

    public function generatePaymentLink($data)
    {
        $response = Http::withHeaders(['Content-Type' => 'application/json'])
            ->post('https://api-checkout.cinetpay.com/v2/payment', array_merge($data, [
                'apikey' => $this->apikey,
                'site_id' => $this->site_id,
            ]));

        return $response->json();
    }

    public function getPayStatus($transaction_id)
    {
        // Implémentez la méthode pour vérifier le statut de paiement
        // Exemple d'API pour récupérer le statut
        $response = Http::withHeaders(['Content-Type' => 'application/json'])
            ->get("https://api-checkout.cinetpay.com/v2/payment/{$transaction_id}", [
                'apikey' => $this->apikey,
                'site_id' => $this->site_id,
            ]);

        return $response->json();
    }
}