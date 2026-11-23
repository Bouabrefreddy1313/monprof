<?php

return [
    /*
    |--------------------------------------------------------------------------
    | CinetPay API Key
    |--------------------------------------------------------------------------
    |
    | Votre clé API unique pour accéder aux services CinetPay.
    |
    */

    'api_key' => env('CINETPAY_API_KEY', '194588913365f879eca46f08.22219192'),

    /*
    |--------------------------------------------------------------------------
    | CinetPay Site ID
    |--------------------------------------------------------------------------
    |
    | Votre identifiant de site unique obtenu auprès de CinetPay pour votre compte.
    |
    */

    'site_id' => env('CINETPAY_SITE_ID', '5876247'),

    /*
    |--------------------------------------------------------------------------
    | CinetPay Secret Key
    |--------------------------------------------------------------------------
    |
    | Votre clé secrète utilisée pour vérifier les requêtes de CinetPay.
    |
    */

    'secret_key' => env('CINETPAY_SECRET_KEY', '698324225669945fdba74b2.81528093'),

    /*
    |--------------------------------------------------------------------------
    | CinetPay API URL
    |--------------------------------------------------------------------------
    |
    | L'URL de base pour l'API CinetPay.
    |
    */

    'api_url' => env('CINETPAY_API_URL', 'https://api-checkout.cinetpay.com/v2/payment'),

    /*
    |--------------------------------------------------------------------------
    | CinetPay API Endpoints
    |--------------------------------------------------------------------------
    |
    | Points de terminaison pour les services API de CinetPay.
    |
    */
  
    'endpoints' => [
        'initiate' => env('CINETPAY_API_URL') . '/payment',
        'check' => env('CINETPAY_API_URL') . '/check',
    ],

    /*
    |--------------------------------------------------------------------------
    | Notification URL
    |--------------------------------------------------------------------------
    |
    | L'URL que CinetPay utilisera pour vous notifier du statut du paiement.
    |
    */

    'notify_url' => env('CINETPAY_NOTIFY_URL', 'http://127.0.0.1:8000/payment/notify'),

    /*
    |--------------------------------------------------------------------------
    | Return URL
    |--------------------------------------------------------------------------
    |
    | L'URL vers laquelle les utilisateurs seront redirigés après un paiement.
    |
    */

    'return_url' => env('CINETPAY_RETURN_URL', 'http://127.0.0.1:8000/payment/return'),

    /*
    |--------------------------------------------------------------------------
    | Transaction Default Values
    |--------------------------------------------------------------------------
    |
    | Valeurs par défaut pour les données de transaction.
    |
    */

    'transaction' => [
        'currency' => 'XOF',
        'payment_method' => 'MOBILE_MONEY', // Méthode de paiement par défaut
        'description' => 'Transaction Description', // Description de transaction par défaut
    ],
];
