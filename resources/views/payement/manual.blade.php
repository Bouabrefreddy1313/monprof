<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paiement Manuel - Monprofchezmoi</title>
    <style>
        body { font-family: 'Nunito', sans-serif; background: #f8f9fa; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: white; border-radius: 24px; padding: 40px; max-width: 500px; width: 90%; box-shadow: 0 16px 48px rgba(10,22,40,0.12); text-align: center; }
        .icon { width: 80px; height: 80px; border-radius: 50%; background: #FF6B35; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 2rem; color: white; }
        h1 { color: #0A1628; font-size: 1.5rem; margin-bottom: 10px; }
        p { color: #5F6368; margin-bottom: 20px; }
        .amount { font-size: 2rem; font-weight: 800; color: #FF6B35; margin: 20px 0; }
        .method { background: #f8f9fa; border-radius: 12px; padding: 20px; margin: 15px 0; text-align: left; }
        .method h3 { color: #0A1628; margin: 0 0 10px; font-size: 1rem; }
        .method p { margin: 5px 0; color: #5F6368; }
        .phone { font-size: 1.3rem; font-weight: 700; color: #FF6B35; }
        .reference { background: #FFF3E0; border: 2px dashed #FF6B35; border-radius: 8px; padding: 15px; margin: 20px 0; }
        .reference code { font-size: 0.9rem; color: #0A1628; word-break: break-all; }
        .btn { display: inline-block; background: #FF6B35; color: white; padding: 14px 28px; border-radius: 12px; text-decoration: none; font-weight: 700; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon">💳</div>
        <h1>Paiement Manuel</h1>
        <p>Le service de paiement automatique est temporairement indisponible. Veuillez effectuer un virement manuel.</p>

        <div class="amount">{{ number_format($amount, 0, ',', ' ') }} FCFA</div>

        <div class="reference">
            <strong>Référence à indiquer :</strong><br>
            <code>{{ $transaction_id }}</code>
        </div>

        <div class="method">
            <h3>📱 Wave</h3>
            <p>Envoyer le montant au numéro :</p>
            <p class="phone">{{ $wave }}</p>
        </div>

        <div class="method">
            <h3>📱 Orange Money</h3>
            <p>Envoyer le montant au numéro :</p>
            <p class="phone">{{ $orange_money }}</p>
        </div>

        <p style="font-size: 0.85rem; color: #9AA0A6; margin-top: 20px;">
            Une fois le paiement effectué, notre équipe validera votre inscription sous 24h.
        </p>

        <a href="{{ url('/') }}" class="btn">Retour à l'accueil</a>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
