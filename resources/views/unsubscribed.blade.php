<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Désabonnement - MonProfChezMoi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background: #f4f4f4;
        }
        .card {
            background: white;
            padding: 50px 40px;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px;
        }
        .icon { font-size: 64px; margin-bottom: 20px; }
        h1 { color: #0A1628; font-size: 24px; margin-bottom: 10px; }
        p { color: #666; font-size: 16px; line-height: 1.5; }
        a { color: #FF6B35; text-decoration: none; font-weight: 600; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
@include('partials.header')

    <div class="card">
        <div class="icon">😢</div>
        <h1>Vous êtes désabonné</h1>
        <p>Vous ne recevrez plus nos emails. Si vous changez d'avis, vous pouvez vous réinscrire à tout moment.</p>
        <p><a href="{{ url('/') }}">Retour à l'accueil</a></p>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>

