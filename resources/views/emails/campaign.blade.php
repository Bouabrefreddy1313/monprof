<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subjectLine }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            background: #FF6B35;
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .body-content {
            padding: 30px 20px;
            font-size: 16px;
        }
        .footer {
            background: #0A1628;
            color: #ccc;
            text-align: center;
            padding: 20px;
            font-size: 12px;
        }
        .footer a {
            color: #FF6B35;
            text-decoration: none;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: #FF6B35;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $subjectLine }}</h1>
        </div>
        <div class="body-content">
            {!! nl2br(e($bodyContent)) !!}
        </div>
        <div class="footer">
            <p>MonProfChezMoi-ci.com</p>
            <p>Vous recevez cet email car vous êtes inscrit à notre newsletter.</p>
            <p>
                <a href="{{ url('/unsubscribe?email=EMAIL') }}">Se désabonner</a>
            </p>
        </div>
    </div>
</body>
</html>
