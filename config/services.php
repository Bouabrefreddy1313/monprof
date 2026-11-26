<?php

return [

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'cinetpay' => [
    'api_key'    => env('CINETPAY_API_KEY'),
    'password'   => env('CINETPAY_PASSWORD'),
    'base_url'   => env('CINETPAY_BASE_URL', 'https://api.cinetpay.net'),
    'checkout_url' => env('CINETPAY_CHECKOUT_URL', 'https://secure.cinetpay.net'),
    'return_url' => env('CINETPAY_RETURN_URL', 'https://monprofchezmoi-ci.com/particuliers/payment/return'),
    'notify_url' => env('CINETPAY_NOTIFY_URL', 'https://monprofchezmoi-ci.com/particuliers/payment/notify'),
],

    'geniuspay' => [
        'api_key'    => env('GENIUSPAY_API_KEY'),
        'api_secret' => env('GENIUSPAY_API_SECRET'),
        'base_url'   => env('GENIUSPAY_BASE_URL', 'https://geniuspay.ci/api/v1/merchant'),
        'webhook_secret' => env('GENIUSPAY_WEBHOOK_SECRET', ''),
    ],

    'manual_payment' => [
        'wave' => env('PAYMENT_WAVE_NUMBER', '+225 00 00 00 00 00'),
        'orange_money' => env('PAYMENT_ORANGE_MONEY_NUMBER', '+225 00 00 00 00 00'),
    ],

];
