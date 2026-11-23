<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préparation Bac et orientations lycée</title>
    <style>
        body { font-family: 'Nunito', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .email-wrapper { width: 100%; background: #f4f4f4; padding: 40px 0; }
        .email-container { max-width: 640px; margin: 0 auto; background: #ffffff; border-radius: 20px; overflow: hidden; box-shadow: 0 20px 60px rgba(0,0,0,0.12); }
        .email-header { background: linear-gradient(135deg, #0A1628 0%, #1E3A5F 100%); padding: 48px 40px; text-align: center; position: relative; overflow: hidden; }
        .email-header::before { content: ''; position: absolute; top: -50%; right: -20%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(255,107,53,0.15), transparent 70%); border-radius: 50%; }
        .email-header h1 { color: #FF6B35; font-size: 28px; font-weight: 800; margin: 0 0 12px; position: relative; z-index: 2; }
        .email-header p { color: rgba(255,255,255,0.85); font-size: 16px; margin: 0; position: relative; z-index: 2; }
        .email-body { padding: 48px 40px; }
        .greeting { font-size: 20px; font-weight: 700; color: #0A1628; margin: 0 0 20px; }
        .intro-text { color: #5F6368; font-size: 15px; line-height: 1.7; margin: 0 0 32px; }
        .program-card { background: #ffffff; border-radius: 16px; padding: 24px; margin-bottom: 20px; border: 2px solid #E8EAED; }
        .program-card h3 { color: #0A1628; font-size: 18px; font-weight: 700; margin: 0 0 12px; }
        .program-card p { color: #5F6368; font-size: 14px; line-height: 1.6; margin: 0 0 16px; }
        .program-link { display: inline-block; color: #FF6B35; text-decoration: none; font-weight: 600; font-size: 14px; }
        .cta-section { text-align: center; padding: 32px 0; }
        .cta-button { display: inline-block; padding: 16px 40px; background: linear-gradient(135deg, #FF6B35, #E85A2B); color: #ffffff !important; text-decoration: none; border-radius: 12px; font-weight: 700; font-size: 16px; box-shadow: 0 8px 24px rgba(255,107,53,0.35); }
        .email-footer { background: #F8F9FA; padding: 32px 40px; text-align: center; border-top: 1px solid #E8EAED; }
        .footer-logo { font-size: 18px; font-weight: 800; color: #0A1628; margin-bottom: 12px; }
        .footer-text { color: #9AA0A6; font-size: 13px; line-height: 1.6; margin: 0 0 16px; }
        .footer-links { margin-bottom: 16px; }
        .footer-links a { color: #FF6B35; text-decoration: none; font-size: 13px; margin: 0 8px; font-weight: 600; }
        .footer-copyright { color: #9AA0A6; font-size: 12px; margin: 0; }
        @media (max-width: 640px) { .email-header, .email-body, .email-footer { padding: 32px 24px; } }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-container">
            <div class="email-header">
                <h1>🎓 Lycée - Préparation Bac</h1>
                <p>De la Seconde à la Terminale, visez l'excellence</p>
            </div>

            <div class="email-body">
                <p class="greeting">Bonjour,</p>

                <p class="intro-text">
                    Vous avez visité notre section <strong>lycée</strong>. Nous vous accompagnons dans votre parcours scolaire avec des programmes de préparation au Bac et d'orientation adaptés.
                </p>

                <div class="program-card">
                    <h3>📝 Préparation au Bac</h3>
                    <p>Un programme complet avec des révisions structurées, des annales corrigées et des méthodologies pour maximiser vos résultats.</p>
                    <a href="{{ url('/lycee-preparation') }}" class="program-link">Découvrir →</a>
                </div>

                <div class="program-card">
                    <h3>🧭 Orientation scolaire</h3>
                    <p>Un coaching personnalisé pour vous aider à choisir votre filière et préparer votre post-bac en toute sérénité.</p>
                    <a href="{{ url('/terminale') }}" class="program-link">En savoir plus →</a>
                </div>

                <div class="program-card">
                    <h3>⭐ Coaching méthodologique</h3>
                    <p>Des techniques de travail efficaces pour optimiser vos révisions, gérer le stress et atteindre vos objectifs.</p>
                    <a href="{{ url('/lycee-coaching') }}" class="program-link">Voir plus →</a>
                </div>

                <div class="cta-section">
                    <a href="{{ url('/lycee-preparation') }}" class="cta-button">
                        Voir nos programmes lycée →
                    </a>
                </div>
            </div>

            <div class="email-footer">
                <p class="footer-logo">MonProfChezMoi</p>
                <p class="footer-text">
                    <strong>Adresse :</strong> Riviera 4 Synacassi 1, Abidjan<br>
                    <strong>Téléphone :</strong> +225 01 53 75 15 44<br>
                    <strong>Email :</strong> info@monprofchezmoi-ci.com
                </p>
                <div class="footer-links">
                    <a href="{{ url('/') }}">Accueil</a>
                    <span style="color: #E8EAED;">|</span>
                    <a href="{{ url('/unsubscribe?email=' . urlencode($subscriber->email ?? '')) }}">Se désabonner</a>
                </div>
                <p class="footer-copyright">
                    © {{ date('Y') }} MonProfChezMoi-ci.com. Tous droits réservés.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
