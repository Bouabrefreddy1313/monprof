<?php

namespace App\Libraries;

class CinetPayDNSException extends \Exception
{
}

class CinetPay
{
    protected $siteId;
    protected $apiKey;

    protected $transId;
    protected $amount;
    protected $currency = 'XOF';
    protected $designation;
    protected $notifyUrl;
    protected $returnUrl;
    protected $cancelUrl;
    protected $custom;
    protected $customerName;
    protected $customerSurname;
    protected $customerEmail;
    protected $customerPhoneNumber;

    protected $paymentUrl;

    public $_cpm_result;
    public $_cpm_trans_status;
    public $_cpm_error_message;

    public function __construct($siteId, $apiKey)
    {
        $this->siteId = $siteId;
        $this->apiKey = $apiKey;
    }

    public function setTransId($transId) { $this->transId = $transId; return $this; }
    public function setAmount($amount) { $this->amount = $amount; return $this; }
    public function setCurrency($currency) { $this->currency = $currency; return $this; }
    public function setDesignation($designation) { $this->designation = $designation; return $this; }
    public function setTransDate($date) { return $this; }
    public function setDebug($debug) { return $this; }
    public function setCustom($custom) { $this->custom = $custom; return $this; }
    public function setCustomerName($name) { $this->customerName = $name; return $this; }
    public function setCustomerSurname($surname) { $this->customerSurname = $surname; return $this; }
    public function setCustomerEmail($email) { $this->customerEmail = $email; return $this; }
    public function setCustomerPhoneNumber($phone) { $this->customerPhoneNumber = $phone; return $this; }
    public function setNotifyUrl($url) { $this->notifyUrl = $url; return $this; }
    public function setReturnUrl($url) { $this->returnUrl = $url; return $this; }
    public function setCancelUrl($url) { $this->cancelUrl = $url; return $this; }

    public function generatePaymentLink()
    {
        $transactionId = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace('_', '-', (string) $this->transId));

        $params = [
            'apikey' => $this->apiKey,
            'site_id' => $this->siteId,
            'transaction_id' => $transactionId,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'description' => $this->designation,
            'channels' => 'ALL',
            'customer_name' => $this->customerName ?: 'Client',
            'customer_surname' => $this->customerSurname ?: 'Monprofchezmoi',
            'customer_email' => $this->customerEmail ?: $this->custom,
            'customer_phone_number' => $this->customerPhoneNumber,
            'notify_url' => $this->notifyUrl,
            'return_url' => $this->returnUrl,
            'cancel_url' => $this->cancelUrl,
        ];

        $result = $this->postJson($this->endpoint('/v1/payment'), $params);

        if (isset($result['data']['payment_url'])) {
            $this->paymentUrl = $result['data']['payment_url'];
            return true;
        }

        $paymentToken = $result['data']['paymentToken']
            ?? $result['data']['payment_token']
            ?? $result['data']['token']
            ?? null;

        if ($paymentToken) {
            $this->paymentUrl = $this->checkoutUrl($paymentToken);
            return true;
        }

        throw new \Exception('Erreur CinetPay: ' . ($result['message'] ?? 'reponse invalide'));
    }

    public function getPaymentUrl()
    {
        return $this->paymentUrl;
    }

    public function getPayStatus()
    {
        $result = $this->postJson($this->endpoint('/v1/payment/check'), [
            'apikey' => $this->apiKey,
            'site_id' => $this->siteId,
            'transaction_id' => $this->transId,
        ]);

        $data = $result['data'] ?? [];

        $this->_cpm_result = $data['status'] ?? $data['cpm_result'] ?? $result['code'] ?? 'UNKNOWN';
        $this->_cpm_trans_status = $data['payment_status'] ?? $data['cpm_trans_status'] ?? $this->_cpm_result;
        $this->_cpm_error_message = $result['message'] ?? null;

        return $this;
    }

    public function isValidPayment()
    {
        return in_array($this->_cpm_result, ['ACCEPTED', '00'], true)
            || in_array($this->_cpm_trans_status, ['ACCEPTED', '00'], true);
    }

    private function endpoint(string $path): string
    {
        $baseUrl = rtrim(config('services.cinetpay.base_url', 'https://api.cinetpay.net'), '/');
        return $baseUrl . '/' . ltrim($path, '/');
    }

    private function checkoutUrl(string $paymentToken): string
    {
        $baseUrl = rtrim(config('services.cinetpay.checkout_url', 'https://secure.cinetpay.net/checkout'), '/');
        return $baseUrl . '/' . ltrim($paymentToken, '/');
    }

    private function postJson(string $url, array $params): array
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            'User-Agent: Monprofchezmoi-CinetPay/1.0',
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        $response = curl_exec($ch);
        $curlError = curl_error($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($curlError) {
            throw new CinetPayDNSException('CinetPay API indisponible: ' . $curlError);
        }

        $result = json_decode($response, true);

        if (!is_array($result)) {
            throw new \Exception('Erreur CinetPay: reponse JSON invalide');
        }

        if ($httpCode >= 400) {
            throw new \Exception('Erreur CinetPay HTTP ' . $httpCode . ': ' . ($result['message'] ?? 'requete refusee'));
        }

        return $result;
    }
}
