<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Paiement échoué - Monprofchezmoi</title>
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
            --danger: #EF4444;
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
        .failure-card {
            background: white;
            border-radius: 24px;
            width: 100%;
            max-width: 600px;
            overflow: hidden;
            box-shadow: 0 24px 64px rgba(10,22,40,0.3);
            text-align: center;
        }
        .failure-header {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            padding: 60px 40px;
            color: white;
        }
        .failure-icon {
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
        .failure-header h1 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 12px;
        }
        .failure-header p {
            opacity: 0.9;
            font-size: 1.1rem;
        }
        .failure-body {
            padding: 40px;
        }
        .error-box {
            background: #fef2f2;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
            border: 1px solid #fecaca;
        }
        .error-box p {
            color: #991b1b;
            font-size: 0.95rem;
            line-height: 1.6;
        }
        .btn-retry {
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
            margin-top: 16px;
        }
        .btn-retry:hover {
            background: var(--orange-dark);
            transform: translateY(-2px);
            color: white;
        }
        .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 32px;
            background: transparent;
            color: var(--blue);
            border: 2px solid var(--gray-100);
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            margin-top: 12px;
            margin-left: 12px;
        }
        .btn-home:hover {
            border-color: var(--orange);
            color: var(--orange);
        }
        .info-text {
            margin-top: 24px;
            padding: 16px;
            background: var(--cream);
            border-radius: 12px;
            color: var(--gray-600);
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="failure-card">
        <div class="failure-header">
            <div class="failure-icon"><i class="fas fa-times"></i></div>
            <h1>Paiement échoué</h1>
            <p>Une erreur est survenue lors du traitement de votre paiement.</p>
        </div>
        <div class="failure-body">
            <div class="error-box">
                <p>
                    <i class="fas fa-exclamation-triangle"></i><br>
                    Le paiement n'a pas pu être abouti. Cela peut être dû à un problème de connexion, de solde insuffisant ou d'annulation de votre part.
                </p>
            </div>

            <div class="info-text">
                <i class="fas fa-info-circle"></i> Vous pouvez réessayer le paiement ou nous contacter pour obtenir de l'aide.
            </div>

            <div>
                <a href="{{ url('/') }}" class="btn-retry">
                    <i class="fas fa-redo"></i> Réessayer le paiement
                </a>
                <a href="{{ url('/') }}" class="btn-home">
                    <i class="fas fa-home"></i> Retour à l'accueil
                </a>
            </div>
        </div>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
