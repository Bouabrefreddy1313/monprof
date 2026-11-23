<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Redirection vers le paiement...</title>
</head>
<body style="font-family: 'Nunito', sans-serif; background: #f8f9fa; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0;">
    <div style="text-align: center; padding: 40px;">
        <div style="width: 50px; height: 50px; border: 4px solid rgba(102,126,234,0.2); border-top-color: #667eea; border-radius: 50%; animation: spin 0.8s linear infinite; margin: 0 auto 24px;"></div>
        <style>
            @keyframes spin { to { transform: rotate(360deg); } }
        </style>
        <h2 style="color: #2c3e50; font-weight: 700; margin-bottom: 12px;">Préparation du paiement sécurisé</h2>
        <p style="color: #5F6368; font-size: 0.95rem; margin-bottom: 24px;">Vous allez être redirigé vers GeniusPay pour acheter votre bon...</p>
        <div id="error-message" style="color: #EF4444; display: none;"></div>
        <a href="{{ route('bons.show', $voucher) }}" style="color: #667eea; text-decoration: none; font-weight: 600;">Cliquez ici si la redirection ne fonctionne pas</a>
    </div>

    <form id="payment-form" action="{{ route('payment.initiate') }}" method="POST">
        @csrf
        <input type="hidden" name="reservation_token" value="{{ $token }}">
        <input type="hidden" name="type" value="voucher">
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Soumettre automatiquement le formulaire
            document.getElementById('payment-form').submit();
        });
    </script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
