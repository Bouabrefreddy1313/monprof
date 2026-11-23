<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Découvrez nos formations MonProfChezMoi</title>
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
        .course-card { background: #ffffff; border-radius: 16px; padding: 24px; margin-bottom: 20px; border: 2px solid #E8EAED; }
        .course-card h3 { color: #0A1628; font-size: 18px; font-weight: 700; margin: 0 0 8px; }
        .course-meta { color: #9AA0A6; font-size: 13px; margin: 0 0 12px; }
        .course-card p { color: #5F6368; font-size: 14px; line-height: 1.6; margin: 0 0 16px; }
        .course-link { display: inline-block; color: #FF6B35; text-decoration: none; font-weight: 600; font-size: 14px; }
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
                <h1>🎓 Nos formations</h1>
                <p>Découvrez les formations qui peuvent transformer votre avenir</p>
            </div>

            <div class="email-body">
                <p class="greeting">Bonjour,</p>

                <p class="intro-text">
                    Merci de votre confiance ! MonProfChezMoi propose des formations adaptées à tous les niveaux et à tous les profils : soutien scolaire, formations professionnelles, sport et loisirs. Découvrez ci-dessous quelques-unes de nos formations phares.
                </p>

                @if(isset($courses) && $courses->isNotEmpty())
                    @foreach($courses as $course)
                        <div class="course-card">
                            <h3>{{ $course->titre }}</h3>
                            <div class="course-meta">
                                @if($course->formation)
                                    {{ $course->formation->titre }}
                                @endif
                                @if($course->prix)
                                    • {{ number_format($course->prix, 0, ',', ' ') }} FCFA
                                @endif
                            </div>
                            <p>{{ Str::limit($course->description ?? $course->objectif ?? 'Formation complète avec un formateur expert.', 150) }}</p>
                            <a href="{{ url('/cours/' . $course->id) }}" class="course-link">Voir la formation →</a>
                        </div>
                    @endforeach
                @else
                    <div class="course-card">
                        <h3>🎓 Un large catalogue de formations</h3>
                        <p>Primaire, collège, lycée, supérieur, diplômes DCG/DSCG, bureautique, développement web, sport et bien plus encore. Des formations en présentiel à Abidjan et en ligne.</p>
                        <a href="{{ url('/formations') }}" class="course-link">Voir toutes les formations →</a>
                    </div>
                @endif

                <div class="cta-section">
                    <a href="{{ url('/formations') }}" class="cta-button">
                        Voir toutes nos formations →
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
