<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Confirmation de réservation - Monprofchezmoi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --orange: #FF6B35;
            --orange-dark: #E85A2B;
            --blue: #0A1628;
            --blue-light: #1E3A5F;
            --cream: #FAFBFC;
            --gray-100: #F1F3F4;
            --gray-600: #5F6368;
            --success: #22C55E;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .confirmation-card {
            background: white;
            border-radius: 24px;
            width: 100%;
            max-width: 600px;
            overflow: hidden;
            box-shadow: 0 24px 64px rgba(10,22,40,0.3);
        }
        .confirmation-header {
            background: linear-gradient(135deg, var(--orange) 0%, var(--orange-dark) 100%);
            padding: 40px;
            text-align: center;
            color: white;
        }
        .confirmation-header i {
            font-size: 64px;
            margin-bottom: 16px;
        }
        .confirmation-header h1 {
            font-size: 1.8rem;
            font-weight: 800;
        }
        .confirmation-header p {
            opacity: 0.9;
            margin-top: 8px;
        }
        .confirmation-body {
            padding: 40px;
        }
        .recap-box {
            background: var(--cream);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
            border: 1px solid var(--gray-100);
        }
        .recap-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px dashed #E8EAED;
            font-size: 0.95rem;
        }
        .recap-row:last-child { border-bottom: none; }
        .recap-row.total {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--blue);
            border-top: 2px solid var(--gray-100);
            border-bottom: none;
            margin-top: 8px;
            padding-top: 16px;
        }
        .recap-row.acompte {
            color: var(--orange);
            font-weight: 700;
        }
        .highlight-box {
            background: linear-gradient(135deg, rgba(255,107,53,0.08), rgba(255,107,53,0.04));
            border: 1px solid rgba(255,107,53,0.15);
            border-radius: 14px;
            padding: 24px;
            text-align: center;
            margin-bottom: 24px;
        }
        .highlight-box .label {
            font-size: 0.9rem;
            color: var(--gray-600);
            margin-bottom: 8px;
        }
        .highlight-box .montant {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--orange);
        }
        .btn-payer {
            width: 100%;
            padding: 18px;
            border-radius: 14px;
            font-weight: 800;
            font-size: 1.1rem;
            background: var(--orange);
            color: white;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 32px rgba(255,107,53,0.25);
        }
        .btn-payer:hover {
            background: var(--orange-dark);
            transform: translateY(-2px);
        }
        .info-text {
            text-align: center;
            margin-top: 20px;
            font-size: 0.85rem;
            color: var(--gray-600);
            line-height: 1.7;
        }
        .info-text i { color: var(--orange); }
        .secure-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 16px;
            font-size: 0.8rem;
            color: var(--gray-600);
        }
    </style>
</head>
<body>
    <div class="confirmation-card">
        <div class="confirmation-header">
            <i class="fas fa-calendar-check"></i>
            <h1>Pré-réservation confirmée</h1>
            <p>Votre place est réservée sous réserve de paiement</p>
        </div>
        <div class="confirmation-body">
            <div class="recap-box">
                <div class="recap-row">
                    <span><i class="fas fa-book" style="color: var(--orange); margin-right: 8px;"></i> Formation</span>
                    <strong>{{ $reservation->cours->titre }}</strong>
                </div>
                <div class="recap-row">
                    <span><i class="fas fa-user" style="color: var(--orange); margin-right: 8px;"></i> Participant</span>
                    <strong>{{ $reservation->nom }}</strong>
                </div>
                <div class="recap-row">
                    <span><i class="fas fa-layer-group" style="color: var(--orange); margin-right: 8px;"></i> Formule</span>
                    <strong>{{ $reservation->formule === 'groupe' ? 'Petit groupe' : 'Individuelle' }}</strong>
                </div>
                <div class="recap-row total">
                    <span>Montant total</span>
                    <span>{{ number_format($reservation->montant_total, 0, '', ' ') }} FCFA</span>
                </div>
            </div>

            <div class="highlight-box">
                <div class="label">Acompte à payer maintenant (30%)</div>
                <div class="montant">{{ number_format($reservation->acompte, 0, '', ' ') }} FCFA</div>
            </div>

            <form action="{{ route('particuliers.payment.initiate') }}" method="POST">
    @csrf
    <input type="hidden" name="reservation_token" value="{{ $reservation->token }}">
    <input type="hidden" name="type" value="reservation">
    <button type="submit" class="btn-payer">
        <i class="fas fa-lock"></i> PAYER L'ACOMPTE
    </button>
</form>

            <div class="info-text">
                <p><i class="fas fa-info-circle"></i> <strong>Prochaines étapes :</strong></p>
                <p>Notre équipe vous contactera après validation du paiement pour organiser le démarrage de votre formation.</p>
                @if($reservation->formule === 'groupe')
                    <p style="margin-top: 8px;"><i class="fas fa-users"></i> La session en petit groupe démarrera dès que 8 participants seront réunis.</p>
                @endif
            </div>

            <div class="secure-badge">
                <i class="fas fa-shield-alt"></i>
                Paiement sécurisé - Vos données sont protégées
            </div>
        </div>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
