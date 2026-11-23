<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Confirmation d'inscription</title>
    <style>
        body { font-family: 'Nunito', sans-serif; background: #f8f9fa; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 16px; padding: 30px; text-align: center; }
        .logo { margin-bottom: 20px; }
        .success-icon { width: 80px; height: 80px; background: linear-gradient(135deg, #22c55e, #16a34a); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; color: white; font-size: 2rem; margin-bottom: 20px; }
        h1 { color: #0A1628; font-size: 1.5rem; margin-bottom: 10px; }
        p { color: #5F6368; line-height: 1.7; }
        .details { background: #FAFBFC; border-radius: 12px; padding: 20px; margin: 20px 0; text-align: left; }
        .details h3 { color: #FF6B35; font-size: 1rem; margin-bottom: 15px; }
        .detail-row { padding: 8px 0; border-bottom: 1px solid #E8EAED; font-size: 0.9rem; }
        .detail-row:last-child { border-bottom: none; }
        .highlight { background: rgba(255,107,53,0.1); border-radius: 8px; padding: 15px; margin: 20px 0; }
        .highlight strong { color: #FF6B35; }
        .contact { margin-top: 30px; padding-top: 20px; border-top: 1px solid #E8EAED; }
        .contact p { margin: 5px 0; font-size: 0.9rem; }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">✓</div>
        <h1>Merci pour votre inscription !</h1>
        <p>Bonjour {{ $inscription->nom_parent }},<br>
        Nous avons bien reçu votre inscription pour <strong>{{ $inscription->nom_enfant }}</strong>.</p>

        <div class="details">
            <h3>📋 Récapitulatif de votre inscription</h3>
            <div class="detail-row">
                <strong>Activité :</strong> {{ $inscription->activite }}
            </div>
            <div class="detail-row">
                <strong>Lieu :</strong> {{ $inscription->lieu_label }}
            </div>
            <div class="detail-row">
                <strong>Jours choisis :</strong> {{ implode(', ', $inscription->jours) }}
            </div>
            <div class="detail-row">
                <strong>Type de paiement :</strong> {{ $inscription->type_paiement_label }}
            </div>
        </div>

        <div class="highlight">
            <p><strong>Frais de réservation : 10 000 FCFA</strong></p>
            <p style="font-size: 0.85rem; margin-top: 8px;">Notre équipe vous contactera très prochainement au <strong>{{ $inscription->telephone }}</strong> pour finaliser votre inscription et vous expliquer les modalités de paiement.</p>
        </div>

        <div class="contact">
            <p><strong>Des questions ?</strong></p>
            <p>📞 +225 01 53 75 15 44</p>
            <p>✉️ info@monprofchezmoi-ci.com</p>
        </div>
    </div>
</body>
</html>
