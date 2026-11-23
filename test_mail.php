<?php
echo "Test SMTP Connection\n";

$host = 'smtp.hostinger.com';
$port = 587;

$fp = @fsockopen($host, $port, $errno, $errstr, 10);
if ($fp) {
    echo "CONNEXION SMTP OK sur $host:$port\n";
    fclose($fp);
} else {
    echo "ERREUR CONNEXION: $errstr ($errno)\n";
}

echo "\n--- Mail config from Laravel ---\n";
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo 'MAIL_MAILER: ' . env('MAIL_MAILER') . "\n";
echo 'MAIL_HOST: ' . env('MAIL_HOST') . "\n";
echo 'MAIL_PORT: ' . env('MAIL_PORT') . "\n";
echo 'MAIL_USERNAME: ' . env('MAIL_USERNAME') . "\n";
echo 'MAIL_FROM_ADDRESS: ' . env('MAIL_FROM_ADDRESS') . "\n";
echo 'MAIL_ENCRYPTION: ' . env('MAIL_ENCRYPTION') . "\n";
echo 'NOTIFICATION_EMAIL_FORMATION: ' . env('NOTIFICATION_EMAIL_FORMATION') . "\n";
echo 'NOTIFICATION_EMAIL_INSCRIPTION: ' . env('NOTIFICATION_EMAIL_INSCRIPTION') . "\n";

echo "\n--- Test email sending ---\n";
try {
    \Illuminate\Support\Facades\Mail::raw('Test email from MonProfChezMoi - ' . date('Y-m-d H:i:s'), function($msg) {
        $msg->to('freddyescobar13013@gmail.com')->subject('Test SMTP MonProfChezMoi');
    });
    echo "EMAIL ENVOYE AVEC SUCCES\n";
} catch (Exception $e) {
    echo "ERREUR: " . $e->getMessage() . "\n";
    echo "CLASSE: " . get_class($e) . "\n";
}
