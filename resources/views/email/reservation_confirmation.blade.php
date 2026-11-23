<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'Nunito', sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #0A1628; padding: 30px; text-align: center; border-radius: 16px 16px 0 0; }
        .header h1 { color: #FF6B35; margin: 0; font-size: 24px; }
        .content { background: #FAFBFC; padding: 30px; border-radius: 0 0 16px 16px; }
        .btn { display: inline-block; padding: 14px 28px; background: #FF6B35; color: white; text-decoration: none; border-radius: 10px; font-weight: 700; }
        .recap { background: white; padding: 20px; border-radius: 12px; margin: 20px 0; border: 1px solid #E8EAED; }
        .recap-row { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px dashed #E8EAED; }
        .footer { text-align: center; margin-top: 30px; color: #9AA0A6; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Monprofchezmoi</h1>
        </div>
        <div class="content">
            <h2>Bonjour {{ $reservation->nom }},</h2>
            <p>Merci pour votre pré-réservation ! Voici le récapitulatif :</p>

            <div class="recap">
                <div class="recap-row">
                    <span>Formation</span>
                    <strong>{{ $reservation->cours->titre }}</strong>
                </div>
                <div class="recap-row">
                    <span>Formule</span>
                    <strong>{{ $reservation->formule === 'groupe' ? 'Petit groupe' : 'Individuelle' }}</strong>
                </div>
                <div class="recap-row">
                    <span>Montant total</span>
                    <strong>{{ number_format($reservation->montant_total, 0, '', ' ') }} FCFA</strong>
                </div>
                <div class="recap-row">
                    <span>Acompte (30%)</span>
                    <strong style="color: #FF6B35;">{{ number_format($reservation->acompte, 0, '', ' ') }} FCFA</strong>
                </div>
            </div>

            <p style="text-align: center;">
                <a href="{{ $url }}" class="btn">Payer mon acompte</a>
            </p>

            <p style="font-size: 14px; color: #666; margin-top: 20px;">
                <strong>Prochaines étapes :</strong><br>
                1. Payez l'acompte de 30% pour confirmer votre place<br>
                2. Notre équipe vous contactera pour organiser le démarrage<br>
                3. Pour les groupes, la session démarre dès que 8 participants sont réunis
            </p>
        </div>
        <div class="footer">
            <p>Monprofchezmoi - Riviera 4 Synacassi 1, Abidjan</p>
            <p>+225 01 53 75 15 44 | info@monprofchezmoi-ci.com</p>
        </div>
    </div>
</body>
</html>
