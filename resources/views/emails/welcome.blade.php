<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue à la newsletter MonProfChezMoi</title>
    <style>
        body {
            font-family: 'Nunito', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
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
        .email-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255,107,53,0.15), transparent 70%);
            border-radius: 50%;
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
        .greeting {
            font-size: 20px;
            font-weight: 700;
            color: #0A1628;
            margin: 0 0 20px;
        }
        .intro-text {
            color: #5F6368;
            font-size: 15px;
            line-height: 1.7;
            margin: 0 0 32px;
        }
        .benefits-card {
            background: linear-gradient(135deg, #F8F9FA 0%, #FFFFFF 100%);
            border-radius: 16px;
            padding: 32px;
            margin-bottom: 32px;
            border: 1px solid #E8EAED;
        }
        .benefits-card h2 {
            color: #0A1628;
            font-size: 18px;
            font-weight: 700;
            margin: 0 0 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .benefit-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 12px 0;
            border-bottom: 1px solid #E8EAED;
        }
        .benefit-item:last-child {
            border-bottom: none;
        }
        .benefit-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
            background: linear-gradient(135deg, rgba(255,107,53,0.15), rgba(255,107,53,0.05));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }
        .benefit-text {
            flex: 1;
            color: #3C4043;
            font-size: 15px;
            line-height: 1.6;
            padding-top: 4px;
        }
        .cta-section {
            text-align: center;
            padding: 32px 0;
        }
        .cta-button {
            display: inline-block;
            padding: 16px 40px;
            background: linear-gradient(135deg, #FF6B35, #E85A2B);
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 8px 24px rgba(255,107,53,0.35);
            transition: all 0.3s ease;
        }
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(255,107,53,0.45);
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
        .email-footer {
            background: #F8F9FA;
            padding: 32px 40px;
            text-align: center;
            border-top: 1px solid #E8EAED;
        }
        .footer-logo {
            font-size: 18px;
            font-weight: 800;
            color: #0A1628;
            margin-bottom: 12px;
        }
        .footer-text {
            color: #9AA0A6;
            font-size: 13px;
            line-height: 1.6;
            margin: 0 0 16px;
        }
        .footer-links {
            margin-bottom: 16px;
        }
        .footer-links a {
            color: #FF6B35;
            text-decoration: none;
            font-size: 13px;
            margin: 0 8px;
            font-weight: 600;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }
        .footer-copyright {
            color: #9AA0A6;
            font-size: 12px;
            margin: 0;
        }
        .social-links {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 20px;
        }
        .social-link {
            width: 36px;
            height: 36px;
            background: #ffffff;
            border: 1px solid #E8EAED;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #5F6368;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .social-link:hover {
            background: #FF6B35;
            color: white;
            border-color: #FF6B35;
            transform: translateY(-2px);
        }
        @media (max-width: 640px) {
            .email-header, .email-body, .email-footer {
                padding: 32px 24px;
            }
            .email-header h1 {
                font-size: 24px;
            }
            .benefits-card {
                padding: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-container">
            <!-- Header -->
            <div class="email-header">
                <h1>🎉 Bienvenue chez MonProfChezMoi !</h1>
                <p>Votre inscription à la newsletter a été confirmée</p>
            </div>

            <!-- Body -->
            <div class="email-body">
                <p class="greeting">Bonjour,</p>

                <p class="intro-text">
                    Merci de vous être abonné à la newsletter <strong>MonProfChezMoi</strong> ! Nous sommes ravis de vous compter parmi nos abonnés.
                </p>

                <p class="intro-text">
                    En tant que leader de l'accompagnement éducatif en Côte d'Ivoire, nous mettons à votre disposition les meilleurs conseils, offres exclusives et actualités pour accompagner votre enfant vers la réussite.
                </p>

                <!-- Avantages -->
                <div class="benefits-card">
                    <h2>
                        <span>📬</span>
                        Ce que vous allez recevoir
                    </h2>

                    <div class="benefit-item">
                        <div class="benefit-icon">📚</div>
                        <div class="benefit-text">
                            <strong>Conseils pédagogiques</strong><br>
                            Des articles et astuces pour optimiser le travail scolaire à la maison.
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">🎯</div>
                        <div class="benefit-text">
                            <strong>Offres exclusives</strong><br>
                            Des promotions spéciales réservées à nos abonnés newsletter.
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">💡</div>
                        <div class="benefit-text">
                            <strong>Guides pratiques</strong><br>
                            Méthodologie, organisation et techniques de révision éprouvées.
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">📅</div>
                        <div class="benefit-text">
                            <strong>Actualités et nouveautés</strong><br>
                            Informations sur nos nouveaux programmes, ateliers et événements.
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">🎓</div>
                        <div class="benefit-text">
                            <strong>Témoignages et réussites</strong><br>
                            Découvrez comment nos élèves progressent et réussissent.
                        </div>
                    </div>
                </div>

                <!-- Call to Action -->
                <div class="cta-section">
                    <a href="{{ url('/') }}" class="cta-button">
                        Découvrir nos formations →
                    </a>
                </div>

                <div class="info-box">
                    <strong>Pourquoi nous faire confiance ?</strong><br>
                    Depuis 2019, nous avons accompagné plus de 500 familles en Côte d'Ivoire avec une approche pédagogique personnalisée et innovante. Nos coachs scolaires sont sélectionnés rigoureusement pour leur expertise et leur passion pour l'éducation.

                    <br><br>

                    <strong>Suivi personnalisé :</strong> Chaque élève bénéficie d'un accompagnement adapté à son niveau et ses objectifs.
                </div>
            </div>

            <!-- Footer -->
            <div class="email-footer">
                <div class="social-links">
                    <a href="https://lc.cx/bI7TWa" class="social-link" target="_blank">FB</a>
                    <a href="https://lc.cx/bRCp37" class="social-link" target="_blank">IN</a>
                    <a href="https://lc.cx/apXwPN" class="social-link" target="_blank">IG</a>
                    <a href="https://youtube.com/@Monprofchezmoi" class="social-link" target="_blank">YT</a>
                </div>

                <p class="footer-logo">MonProfChezMoi</p>

                <p class="footer-text">
                    <strong>Adresse :</strong> Riviera 4 Synacassi 1, Abidjan, Côte d'Ivoire<br>
                    <strong>Téléphone :</strong> +225 01 53 75 15 44<br>
                    <strong>Email :</strong> info@monprofchezmoi-ci.com<br><br>

                    Abonné avec l'adresse : <strong>{{ $email }}</strong>
                </p>

                <div class="footer-links">
                    <a href="{{ url('/') }}">Accueil</a>
                    <span style="color: #E8EAED;">|</span>
                    <a href="https://lc.cx/bI7TWa" target="_blank">Facebook</a>
                    <span style="color: #E8EAED;">|</span>
                    <a href="{{ url('/unsubscribe?email=' . urlencode($email)) }}">Se désabonner</a>
                </div>

                <p class="footer-copyright">
                    © {{ date('Y') }} MonProfChezMoi-ci.com. Tous droits réservés.<br>
                    Ce message a été envoyé à {{ $email }} car vous vous êtes inscrit sur notre site.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
