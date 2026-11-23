<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Bon Cadeau</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f4f7fb;
            color: #2d3748;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(10, 22, 40, 0.08);
        }
        .header {
            background: linear-gradient(135deg, #0A1628 0%, #1E3A5F 100%);
            padding: 35px 30px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }
        .header p {
            margin: 8px 0 0;
            color: #FF8C5A;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .content {
            padding: 35px 30px;
        }
        .welcome-text {
            font-size: 16px;
            line-height: 1.6;
            color: #4a5568;
            margin-bottom: 25px;
        }
        .voucher-box {
            background: linear-gradient(135deg, #FFF6F2 0%, #FFEDE5 100%);
            border: 2px dashed #FF6B35;
            border-radius: 14px;
            padding: 25px 20px;
            text-align: center;
            margin: 25px 0;
        }
        .voucher-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #E85A2B;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .voucher-code {
            font-family: 'Courier New', monospace;
            font-size: 28px;
            font-weight: 800;
            color: #0A1628;
            letter-spacing: 3px;
            background: #ffffff;
            padding: 10px 20px;
            display: inline-block;
            border-radius: 8px;
            border: 1px solid #fed7aa;
            margin: 8px 0;
        }
        .voucher-amount {
            font-size: 20px;
            font-weight: 800;
            color: #FF6B35;
            margin-top: 10px;
        }
        .steps-box {
            background: #f8fafc;
            border-radius: 12px;
            padding: 20px;
            margin-top: 25px;
            border-left: 4px solid #3B82F6;
        }
        .steps-title {
            font-size: 15px;
            font-weight: 700;
            color: #0A1628;
            margin-bottom: 12px;
        }
        .steps-list {
            margin: 0;
            padding-left: 20px;
            font-size: 14px;
            color: #4a5568;
            line-height: 1.8;
        }
        .footer {
            background: #FAFBFC;
            padding: 20px 30px;
            text-align: center;
            font-size: 13px;
            color: #718096;
            border-top: 1px solid #edf2f7;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <p>🎁 Félicitations !</p>
            <h1>Votre Bon Cadeau de Formation</h1>
        </div>
        <div class="content">
            <p class="welcome-text">
                Bonjour,<br><br>
                Merci pour votre commande ! Votre bon cadeau a bien été enregistré. Voici votre <strong>code unique</strong> de bon de formation :
            </p>

            <div class="voucher-box">
                <div class="voucher-label">Votre Code Unique</div>
                <div class="voucher-code">{{ $order->code }}</div>
                <div class="voucher-amount">Valeur : {{ number_format($order->amount_paid, 0, ',', ' ') }} FCFA</div>
                @if($voucher && $voucher->title)
                    <div style="font-size: 13px; color: #718096; margin-top: 5px;">{{ $voucher->title }}</div>
                @endif
            </div>

            <div class="steps-box">
                <div class="steps-title">📌 Comment utiliser votre bon ?</div>
                <ol class="steps-list">
                    <li>Conservez précieusement ce code unique <strong>{{ $order->code }}</strong>.</li>
                    <li>Contactez notre conseillère ou l'équipe commerciale de <strong>Monprofchezmoi</strong>.</li>
                    <li>Communiquez simplement ce code : elle l'activera instantanément et vous inscrira à la formation de votre choix !</li>
                </ol>
            </div>

            <p style="font-size: 14px; color: #718096; margin-top: 25px;">
                Numéro associé à la commande : <strong>{{ $order->phone }}</strong><br>
                Date d'achat : <strong>{{ $order->created_at ? $order->created_at->format('d/m/Y H:i') : date('d/m/Y') }}</strong>
            </p>
        </div>
        <div class="footer">
            © {{ date('Y') }} Monprofchezmoi. Tous droits réservés.<br>
            Cet email contient un code confidentiel à usage unique.
        </div>
    </div>
</body>
</html>
