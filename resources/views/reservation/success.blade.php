<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Paiement confirmé - Monprofchezmoi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --orange: #FF6B35;
            --blue: #0A1628;
            --success: #22C55E;
            --cream: #FAFBFC;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, var(--success) 0%, #16a34a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .success-card {
            background: white;
            border-radius: 24px;
            width: 100%;
            max-width: 600px;
            overflow: hidden;
            box-shadow: 0 24px 64px rgba(0,0,0,0.2);
            text-align: center;
        }
        .success-header {
            padding: 50px 40px;
            background: var(--cream);
        }
        .success-icon {
            width: 100px; height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--success), #16a34a);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 48px;
            color: white;
            animation: scaleIn 0.5s ease;
        }
        @keyframes scaleIn {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }
        .success-header h1 {
            font-size: 1.8rem;
            color: var(--blue);
            font-weight: 800;
        }
        .success-header p {
            color: #666;
            margin-top: 8px;
        }
        .success-body {
            padding: 40px;
        }
        .detail-box {
            background: var(--cream);
            border-radius: 16px;
            padding: 24px;
            text-align: left;
            margin-bottom: 24px;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            font-size: 0.95rem;
            border-bottom: 1px dashed #E8EAED;
        }
        .detail-row:last-child { border-bottom: none; }
        .whatsapp-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            background: #25D366;
            color: white;
            text-decoration: none;
            border-radius: 14px;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .whatsapp-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(37, 211, 102, 0.3);
        }
        .next-steps {
            margin-top: 30px;
            text-align: left;
        }
        .next-steps h3 {
            font-size: 1.1rem;
            color: var(--blue);
            margin-bottom: 16px;
            text-align: center;
        }
        .step-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 12px 0;
        }
        .step-number {
            width: 32px; height: 32px;
            border-radius: 50%;
            background: var(--orange);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
            flex-shrink: 0;
        }
        .step-text {
            font-size: 0.9rem;
            color: #666;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="success-card">
        <div class="success-header">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            <h1>Paiement confirmé !</h1>
            <p>Votre place est définitivement réservée</p>
        </div>
        <div class="success-body">
                <div class="detail-box">
                <div class="detail-row">
                    <span>Formation</span>
                    <strong>{{ $reservation->cours->titre }}</strong>
                </div>
                <div class="detail-row">
                    <span>Référence</span>
                    <strong style="color: var(--orange);">#RES-{{ str_pad($reservation->id, 5, '0', STR_PAD_LEFT) }}</strong>
                </div>
                <div class="detail-row">
                    <span>Montant payé</span>
                    <strong style="color: var(--success);">{{ number_format($reservation->acompte, 0, '', ' ') }} FCFA</strong>
                </div>
                @if($reservation->solde > 0)
                <div class="detail-row">
                    <span>Solde restant</span>
                    <strong>{{ number_format($reservation->solde, 0, '', ' ') }} FCFA</strong>
                </div>
                @endif
            </div>

            <a href="https://wa.me/2250153751544?text=Bonjour,%20j'ai%20effectué%20une%20réservation%20(%23RES-{{ str_pad($reservation->id, 5, '0', STR_PAD_LEFT) }})%20et%20je%20souhaite%20avoir%20plus%20d'informations."
               class="whatsapp-btn" target="_blank">
                <i class="fab fa-whatsapp"></i> Discuter sur WhatsApp
            </a>

            <div class="next-steps">
                <h3><i class="fas fa-road" style="color: var(--orange);"></i> Prochaines étapes</h3>
                @php
                    $isFormation3h = preg_match('/3\s*(h|heure)/i', $reservation->cours->heure);
                @endphp
                <div class="step-item">
                    <div class="step-number">1</div>
                    <div class="step-text">Notre équipe vous contactera sous 24h pour confirmer votre réservation</div>
                </div>
                @if(!$isFormation3h)
                <div class="step-item">
                    <div class="step-number">2</div>
                    <div class="step-text">Pour la formule individuelle : fixation de la date de démarrage</div>
                </div>
                <div class="step-item">
                    <div class="step-number">3</div>
                    <div class="step-text">Pour le petit groupe : communication de la prochaine session disponible</div>
                </div>
                <div class="step-item">
                    <div class="step-number">4</div>
                    <div class="step-text">Le solde de 70% sera à régler avant le début de la formation</div>
                </div>
                @else
                <div class="step-item">
                    <div class="step-number">2</div>
                    <div class="step-text">Votre formation est confirmée ! Notre équipe vous contactera pour les détails logistiques</div>
                </div>
                @endif
            </div>
        </div>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
