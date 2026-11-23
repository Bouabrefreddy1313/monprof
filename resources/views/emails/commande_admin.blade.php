<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle commande</title>
    <style>
        body {
            font-family: 'Nunito', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-wrapper {
            width: 100%;
            background: #f4f4f4;
            padding: 40px 0;
        }
        .email-container {
            max-width: 640px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.12);
        }
        .email-header {
            background: linear-gradient(135deg, #0A1628 0%, #1E3A5F 100%);
            padding: 48px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .email-header h1 {
            color: #FF6B35;
            font-size: 28px;
            font-weight: 800;
            margin: 0 0 12px;
            position: relative;
            z-index: 2;
        }
        .email-header p {
            color: rgba(255,255,255,0.85);
            font-size: 16px;
            margin: 0;
            position: relative;
            z-index: 2;
        }
        .email-body {
            padding: 48px 40px;
        }
        .info-box {
            background: #FFF3ED;
            border-left: 4px solid #FF6B35;
            border-radius: 8px;
            padding: 16px 20px;
            margin: 24px 0;
            font-size: 14px;
            color: #5F6368;
            line-height: 1.6;
        }
        .info-box strong {
            color: #0A1628;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        .data-table td {
            padding: 10px 0;
            border-bottom: 1px solid #E8EAED;
            font-size: 14px;
            color: #3C4043;
        }
        .data-table td:first-child {
            font-weight: 700;
            width: 45%;
            color: #0A1628;
        }
        .email-footer {
            background: #F8F9FA;
            padding: 32px 40px;
            text-align: center;
            border-top: 1px solid #E8EAED;
        }
        .footer-text {
            color: #9AA0A6;
            font-size: 13px;
            line-height: 1.6;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-container">
            <div class="email-header">
                <h1>🛒 Nouvelle commande</h1>
                <p>Type : {{ $type }}</p>
            </div>

            <div class="email-body">
                <p style="font-size:18px; font-weight:700; color:#0A1628; margin:0 0 20px;">Bonjour,</p>
                <p style="color:#5F6368; font-size:15px; line-height:1.7; margin:0 0 24px;">
                    Une nouvelle commande a été enregistrée sur <strong>MonProfChezMoi</strong>.
                </p>

                <div class="info-box">
                    <strong>Détails de la commande</strong>
                    <table class="data-table">
                        @foreach($data as $label => $value)
                            <tr>
                                <td>{{ $label }}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <p style="color:#5F6368; font-size:15px; line-height:1.7; margin:24px 0 0;">
                    Merci de traiter cette commande rapidement.
                </p>
            </div>

            <div class="email-footer">
                <p class="footer-text">MonProfChezMoi - Notification automatique</p>
            </div>
        </div>
    </div>
</body>
</html>
