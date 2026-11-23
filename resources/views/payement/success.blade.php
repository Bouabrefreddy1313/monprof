<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Paiement réussi - Monprofchezmoi</title>
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
        .success-card {
            background: white;
            border-radius: 24px;
            width: 100%;
            max-width: 600px;
            overflow: hidden;
            box-shadow: 0 24px 64px rgba(10,22,40,0.3);
            text-align: center;
        }
        .success-header {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            padding: 60px 40px;
            color: white;
        }
        .success-icon {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 3rem;
            animation: scaleIn 0.6s ease;
        }
        @keyframes scaleIn {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }
        .success-header h1 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 12px;
        }
        .success-header p {
            opacity: 0.9;
            font-size: 1.1rem;
        }
        .success-body {
            padding: 40px;
        }
        .recap-box {
            background: var(--cream);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
            border: 1px solid var(--gray-100);
        }
        .recap-line {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px dashed #E8EAED;
            font-size: 0.95rem;
        }
        .recap-line:last-child { border-bottom: none; }
        .recap-line strong { color: var(--blue); }
        .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 32px;
            background: var(--orange);
            color: white;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 8px 24px rgba(255,107,53,0.3);
        }
        .btn-home:hover {
            background: var(--orange-dark);
            transform: translateY(-2px);
            color: white;
        }
        .info-text {
            margin-top: 24px;
            padding: 16px;
            background: rgba(34,197,94,0.1);
            border-radius: 12px;
            color: var(--success);
            font-size: 0.9rem;
        }

        .session-box {
            background: #fff;
            border: 2px solid var(--gray-100);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
            text-align: left;
        }
        .session-box h2 {
            font-size: 1.25rem;
            color: var(--blue);
            margin-bottom: 6px;
        }
        .session-box h2 i { color: var(--orange); }
        .session-sub {
            color: var(--gray-600);
            font-size: 0.9rem;
            margin-bottom: 16px;
        }
        .session-options {
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px;
        }
        .session-option { position: relative; display: block; }
        .session-option input { position: absolute; opacity: 0; pointer-events: none; }
        .session-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 2px solid var(--gray-100);
            border-radius: 12px;
            padding: 14px 18px;
            cursor: pointer;
            transition: all 0.2s ease;
            background: var(--cream);
        }
        .session-card:hover { border-color: var(--orange); }
        .session-option input:checked + .session-card {
            border-color: var(--orange);
            background: rgba(255,107,53,0.08);
            box-shadow: 0 4px 16px rgba(255,107,53,0.15);
        }
        .session-card .day { font-weight: 800; color: var(--blue); }
        .session-card .hint { font-size: 0.8rem; color: var(--gray-600); }
        .session-card .check { color: var(--orange); opacity: 0; transition: opacity 0.2s ease; }
        .session-option input:checked + .session-card .check { opacity: 1; }
        .btn-session {
            width: 100%;
            margin-top: 16px;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background: var(--orange);
            color: white;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Nunito', sans-serif;
        }
        .btn-session:hover {
            background: var(--orange-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255,107,53,0.3);
        }
        .session-error {
            margin-top: 12px;
            padding: 10px 14px;
            background: rgba(239,68,68,0.1);
            border-radius: 10px;
            color: #DC2626;
            font-size: 0.85rem;
        }
        .session-confirmed {
            margin: 16px 0 24px;
            padding: 16px;
            background: rgba(34,197,94,0.1);
            border-radius: 12px;
            color: var(--success);
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
    <div class="success-card">
        <div class="success-header">
            <div class="success-icon"><i class="fas fa-check"></i></div>
            <h1>Paiement réussi !</h1>
            <p>Votre inscription a été confirmée avec succès.</p>
        </div>
        <div class="success-body">
            <div class="recap-box">
                <div class="recap-line">
                    <span>Type</span>
                    <strong>{{ ucfirst($type) }}</strong>
                </div>
                <div class="recap-line">
                    <span>Transaction ID</span>
                    <strong>{{ $transaction_id }}</strong>
                </div>
                <div class="recap-line">
                    <span>Montant payé</span>
                    <strong>{{ number_format($amount, 0, '', ' ') }} FCFA</strong>
                </div>
                @if($reservation && $reservation->session)
                <div class="recap-line">
                    <span>Session choisie</span>
                    <strong style="color: var(--orange);">{{ $reservation->session }}</strong>
                </div>
                @endif
                <div class="recap-line">
                    <span>Date</span>
                    <strong>{{ $date }}</strong>
                </div>
            </div>

            @if($reservation)
                @php
                    $isFormationFlash = preg_match('/\b3\s*(h|heures?)\b/i', $reservation->cours->heure ?? '')
                        || preg_match('/chrono/i', $reservation->cours->titre ?? '')
                        || preg_match('/flash/i', $reservation->cours->titre ?? '');
                @endphp

                @if($reservation->session)
                    <div class="session-confirmed">
                        <i class="fas fa-calendar-check"></i> Votre session est confirmée : <strong>{{ $reservation->session }}</strong>
                    </div>
                @elseif($isFormationFlash)
                    <div class="session-box">
                        <h2><i class="fas fa-calendar-check"></i> Choisissez votre session</h2>
                        <p class="session-sub">
                            Cette formation est disponible en session de 3h. Choisissez le jour auquel vous souhaitez participer.
                        </p>
                        <form action="{{ route('reservation.session', ['token' => $reservation->token]) }}" method="POST">
                            @csrf
                            <div class="session-options">
                                <label class="session-option">
                                    <input type="radio" name="session" value="Mardi" required>
                                    <div class="session-card">
                                        <div>
                                            <div class="day">Mardi</div>
                                            <div class="hint">Session du mardi</div>
                                        </div>
                                        <i class="fas fa-check-circle check"></i>
                                    </div>
                                </label>
                                <label class="session-option">
                                    <input type="radio" name="session" value="Jeudi" required>
                                    <div class="session-card">
                                        <div>
                                            <div class="day">Jeudi</div>
                                            <div class="hint">Session du jeudi</div>
                                        </div>
                                        <i class="fas fa-check-circle check"></i>
                                    </div>
                                </label>
                                <label class="session-option">
                                    <input type="radio" name="session" value="Samedi" required>
                                    <div class="session-card">
                                        <div>
                                            <div class="day">Samedi</div>
                                            <div class="hint">Session du samedi</div>
                                        </div>
                                        <i class="fas fa-check-circle check"></i>
                                    </div>
                                </label>
                            </div>
                            <button type="submit" class="btn-session">
                                <i class="fas fa-check"></i> Confirmer ma session
                            </button>
                            @if(isset($errors) && $errors->any())
                                <div class="session-error">
                                    @foreach($errors->all() as $error)
                                        <div><i class="fas fa-exclamation-circle"></i> {{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                        </form>
                    </div>
                @endif
            @endif

            <div class="info-text">
                <i class="fas fa-envelope"></i> Un email de confirmation vous a été envoyé.
            </div>

            <a href="{{ url('/') }}" class="btn-home" style="margin-top: 24px;">
                <i class="fas fa-home"></i> Retour à l'accueil
            </a>
        </div>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
