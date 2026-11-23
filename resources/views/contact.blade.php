<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Contact - Monprofchezmoi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Contact MonProfChezMoi, nous joindre, telephone, email" name="keywords">
    <meta content="Contactez l'equipe de MonProfChezMoi pour toute question, inscription ou formation." name="description">

    <!-- Favicon -->
    <link href="asset/img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="asset/css/courscss/bootstrap.min.css" rel="stylesheet">

    <style>
    :root {
        --orange: #FF6B35;
        --orange-dark: #E85A2B;
        --orange-light: #FF8C5A;
        --blue: #0A1628;
        --blue-light: #1E3A5F;
        --white: #FFFFFF;
        --cream: #FAFBFC;
        --gray-50: #F8F9FA;
        --gray-100: #F1F3F4;
        --gray-200: #E8EAED;
        --gray-500: #80868B;
        --gray-600: #5F6368;
        --gray-700: #444746;
        --gray-800: #3C4043;
        --gray-900: #202124;
        --shadow-sm: 0 2px 8px rgba(10,22,40,0.06);
        --shadow-md: 0 8px 24px rgba(10,22,40,0.1);
        --shadow-lg: 0 16px 48px rgba(10,22,40,0.12);
        --shadow-orange: 0 8px 32px rgba(255,107,53,0.25);
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
        font-family: 'Nunito', sans-serif;
        color: var(--gray-800);
        background: var(--white);
        overflow-x: hidden;
        line-height: 1.7;
        font-size: 16px;
    }

    /* Container unique */
    .container-contact {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* Section padding standard */
    .section-padding {
        padding: 80px 0;
    }

    /* ========== NAVBAR ========== */
    .navbar-moderne {
        background: rgba(255,255,255,0.98);
        backdrop-filter: blur(20px);
        padding: 0;
        position: sticky;
        top: 0;
        z-index: 1030;
        border-bottom: 1px solid var(--gray-100);
        box-shadow: var(--shadow-sm);
    }
    .navbar-moderne .navbar-brand {
        padding: 14px 0;
        font-weight: 800;
        font-size: 1.3rem;
        color: var(--blue) !important;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .navbar-moderne .navbar-brand img { height: 45px; width: auto; }
    .nav-menu-moderne {
        display: flex;
        align-items: center;
        gap: 4px;
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .nav-menu-moderne .nav-link-moderne {
        color: var(--gray-700);
        font-weight: 600;
        font-size: 0.9rem;
        padding: 28px 18px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s ease;
        position: relative;
    }
    .nav-menu-moderne .nav-link-moderne::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 18px;
        right: 18px;
        height: 3px;
        background: var(--orange);
        border-radius: 3px 3px 0 0;
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }
    .nav-menu-moderne .nav-link-moderne:hover,
    .nav-menu-moderne .nav-link-moderne.active {
        color: var(--orange);
    }
    .nav-menu-moderne .nav-link-moderne:hover::after,
    .nav-menu-moderne .nav-link-moderne.active::after {
        transform: scaleX(1);
    }

    /* ========== HERO ========== */
    .contact-hero {
        background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
        color: white;
        padding: 100px 0 140px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .contact-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -5%;
        width: 600px;
        height: 600px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(255,107,53,0.2), transparent 70%);
    }
    .contact-hero::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -10%;
        width: 400px;
        height: 400px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(255,107,53,0.15), transparent 70%);
    }
    .contact-hero .contact-hero-inner {
        position: relative;
        z-index: 1;
        max-width: 800px;
        margin: 0 auto;
    }
    .contact-hero .hero-label {
        display: inline-block;
        background: var(--orange);
        color: white;
        font-size: 0.8rem;
        font-weight: 800;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        padding: 10px 22px;
        border-radius: 30px;
        margin-bottom: 24px;
        box-shadow: 0 4px 16px rgba(255,107,53,0.35);
    }
    .contact-hero h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 20px;
        line-height: 1.2;
        color: white;
        text-shadow: 0 2px 10px rgba(0,0,0,0.15);
    }
    .contact-hero h1 span {
        color: var(--orange);
        position: relative;
    }
    .contact-hero p {
        color: rgba(255,255,255,0.9);
        max-width: 680px;
        margin: 0 auto;
        font-size: 1.1rem;
        line-height: 1.8;
        font-weight: 400;
    }
    .contact-hero p + p {
        margin-top: 16px;
        color: rgba(255,255,255,0.75);
        font-size: 1rem;
    }

    /* ========== INFO CARDS ========== */
    .contact-info-section {
        margin-top: -80px;
        position: relative;
        z-index: 2;
        margin-bottom: 80px;
    }
    .contact-info-card {
        background: var(--white);
        border-radius: 20px;
        padding: 36px 28px;
        text-align: center;
        box-shadow: var(--shadow-lg);
        height: 100%;
        border: 1px solid var(--gray-100);
        transition: all 0.35s ease;
    }
    .contact-info-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-orange);
        border-color: rgba(255,107,53,0.2);
    }
    .contact-info-icon {
        width: 68px;
        height: 68px;
        margin: 0 auto 20px;
        border-radius: 18px;
        background: linear-gradient(135deg, var(--orange), var(--orange-light));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        box-shadow: var(--shadow-orange);
        transition: transform 0.3s ease;
    }
    .contact-info-card:hover .contact-info-icon {
        transform: scale(1.08) rotate(-3deg);
    }
    .contact-info-card h4 {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--blue);
        margin-bottom: 14px;
    }
    .contact-info-card p {
        color: var(--gray-700);
        font-size: 1rem;
        margin: 0;
        line-height: 1.7;
        font-weight: 500;
    }
    .contact-info-card a {
        color: var(--gray-700);
        text-decoration: none;
        transition: all 0.2s;
        font-weight: 600;
    }
    .contact-info-card a:hover {
        color: var(--orange);
    }

    /* ========== HORAIRES ========== */
    .horaires-box {
        background: var(--gray-50);
        border: 1px solid var(--gray-100);
        border-radius: 20px;
        padding: 32px;
        margin-top: 32px;
    }
    .horaires-box h4 {
        color: var(--blue);
        font-weight: 700;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 1.1rem;
    }
    .horaires-box h4 i {
        color: var(--orange);
        font-size: 1.2rem;
    }
    .horaire-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 0;
        border-bottom: 1px dashed var(--gray-200);
        font-size: 1rem;
    }
    .horaire-row:last-child {
        border-bottom: none;
    }
    .horaire-row .day {
        color: var(--gray-800);
        font-weight: 700;
    }
    .horaire-row .hours {
        color: var(--gray-700);
        font-weight: 600;
    }
    .horaire-row .closed {
        color: var(--orange);
        font-weight: 800;
        background: rgba(255,107,53,0.08);
        padding: 4px 14px;
        border-radius: 20px;
        font-size: 0.9rem;
    }

    /* ========== FORMULAIRE ========== */
    .contact-form-section {
        background: var(--cream);
        padding: 80px 0;
    }
    .contact-form-wrap {
        background: var(--white);
        border-radius: 20px;
        padding: 44px;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--gray-100);
    }
    .contact-form-wrap .form-label {
        font-weight: 700;
        color: var(--gray-800);
        font-size: 0.95rem;
        margin-bottom: 8px;
    }
    .contact-form-wrap .form-control {
        border-radius: 12px;
        padding: 14px 18px;
        border: 2px solid var(--gray-200);
        font-size: 1rem;
        transition: all 0.25s;
        color: var(--gray-900);
        background: var(--white);
    }
    .contact-form-wrap .form-control::placeholder {
        color: var(--gray-500);
        font-size: 0.95rem;
    }
    .contact-form-wrap .form-control:focus {
        border-color: var(--orange);
        box-shadow: 0 0 0 4px rgba(255,107,53,0.1);
        background: var(--white);
    }
    .contact-form-wrap select.form-control {
        cursor: pointer;
        appearance: auto;
    }
    textarea.form-control {
        resize: vertical;
        min-height: 150px;
    }
    .btn-submit {
        background: linear-gradient(135deg, var(--orange), var(--orange-dark));
        color: white;
        border: none;
        padding: 16px 36px;
        border-radius: 14px;
        font-weight: 700;
        font-size: 1.05rem;
        box-shadow: var(--shadow-orange);
        transition: all 0.3s ease;
        width: 100%;
        letter-spacing: 0.3px;
    }
    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 42px rgba(255,107,53,0.45);
        color: white;
        background: linear-gradient(135deg, var(--orange-light), var(--orange));
    }
    .btn-submit:active {
        transform: translateY(-1px);
    }

    /* ========== MAP ========== */
    .contact-map {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--gray-100);
        height: 100%;
        min-height: 480px;
        background: var(--gray-100);
    }
    .contact-map iframe {
        width: 100%;
        height: 100%;
        min-height: 480px;
        border: 0;
        display: block;
    }

    /* ========== RAISONS ========== */
    .reasons-section {
        padding: 80px 0;
        background: var(--white);
    }
    .reasons-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .reasons-list li {
        display: flex;
        align-items: flex-start;
        gap: 18px;
        padding: 20px 0;
        border-bottom: 1px solid var(--gray-100);
        font-size: 1rem;
    }
    .reasons-list li:last-child {
        border-bottom: none;
    }
    .reasons-list .reason-icon {
        width: 48px;
        height: 48px;
        min-width: 48px;
        border-radius: 14px;
        background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
        color: var(--orange);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        margin-top: 2px;
    }
    .reasons-list .reason-text strong {
        color: var(--blue);
        display: block;
        font-size: 1.05rem;
        margin-bottom: 4px;
        font-weight: 700;
    }
    .reasons-list .reason-text span {
        color: var(--gray-600);
        font-size: 0.95rem;
        line-height: 1.6;
    }

    /* ========== SECTION LABELS ========== */
    .section-label {
        display: inline-block;
        color: var(--orange);
        font-weight: 800;
        font-size: 0.8rem;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        margin-bottom: 14px;
    }
    .section-title-big {
        color: var(--blue);
        font-weight: 800;
        font-size: 2.2rem;
        margin-bottom: 20px;
        line-height: 1.25;
    }
    .section-subtitle {
        color: var(--gray-600);
        font-size: 1.05rem;
        line-height: 1.7;
        margin-bottom: 32px;
    }

    /* ========== ALERTS ========== */
    .alert-success-custom {
        background: #e8f8ef;
        border: 1px solid #b7ebcc;
        color: #1a7f4c;
        border-radius: 14px;
        padding: 18px 22px;
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 28px;
        font-weight: 600;
        font-size: 0.95rem;
    }
    .alert-success-custom i {
        font-size: 1.5rem;
        flex-shrink: 0;
    }
    .alert-danger {
        border-radius: 14px !important;
        padding: 18px 22px !important;
        font-size: 0.95rem;
    }
    .alert-danger ul {
        padding-left: 20px;
    }
    .alert-danger ul li {
        margin-bottom: 4px;
        color: #842029;
    }

    /* ========== FOOTER ========== */
    .footer-moderne {
        background: var(--blue);
        color: rgba(255,255,255,0.75);
        padding: 70px 0 0;
    }
    .footer-moderne a {
        color: rgba(255,255,255,0.75);
        text-decoration: none;
        transition: all 0.2s;
    }
    .footer-moderne a:hover {
        color: var(--orange);
    }
    .footer-brand {
        color: white;
        font-size: 1.5rem;
        font-weight: 800;
        text-decoration: none;
        display: inline-block;
    }
    .footer-col-title {
        color: white;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 24px;
        padding-bottom: 12px;
        border-bottom: 2px solid rgba(255,255,255,0.1);
        position: relative;
    }
    .footer-col-title::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 45px;
        height: 2px;
        background: var(--orange);
    }
    .footer-moderne p {
        color: rgba(255,255,255,0.7);
        line-height: 1.8;
        font-size: 0.95rem;
    }
    .footer-moderne .nav-link-footer {
        display: block;
        padding: 6px 0;
        font-size: 0.95rem;
        color: rgba(255,255,255,0.75);
        transition: all 0.2s;
    }
    .footer-moderne .nav-link-footer:hover {
        color: var(--orange);
        padding-left: 6px;
    }
    .footer-contact-item-moderne {
        display: flex;
        gap: 14px;
        margin-bottom: 16px;
        font-size: 0.95rem;
        align-items: flex-start;
    }
    .footer-contact-item-moderne i {
        color: var(--orange);
        margin-top: 4px;
        font-size: 1rem;
        width: 18px;
        text-align: center;
        flex-shrink: 0;
    }
    .footer-contact-item-moderne span {
        line-height: 1.6;
        color: rgba(255,255,255,0.75);
    }
    .footer-bottom {
        border-top: 1px solid rgba(255,255,255,0.08);
        padding: 24px 0;
        margin-top: 50px;
        font-size: 0.9rem;
        text-align: center;
        color: rgba(255,255,255,0.5);
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 991px) {
        .contact-hero {
            padding: 70px 0 110px;
        }
        .contact-hero h1 {
            font-size: 2.2rem;
        }
        .contact-hero p {
            font-size: 1rem;
            padding: 0 16px;
        }
        .contact-info-section {
            margin-top: -60px;
            margin-bottom: 60px;
        }
        .contact-map {
            margin-top: 40px;
            min-height: 350px;
        }
        .contact-map iframe {
            min-height: 350px;
        }
        .contact-form-wrap {
            padding: 32px 24px;
        }
        .section-padding,
        .contact-form-section,
        .reasons-section {
            padding: 60px 0;
        }
        .section-title-big {
            font-size: 1.8rem;
        }
        .footer-moderne {
            padding-top: 50px;
        }
    }

    @media (max-width: 576px) {
        .contact-hero h1 {
            font-size: 1.8rem;
        }
        .contact-info-card {
            padding: 28px 20px;
        }
        .contact-form-wrap {
            padding: 28px 20px;
        }
        .section-title-big {
            font-size: 1.6rem;
        }
        .reasons-list li {
            gap: 14px;
        }
        .horaires-box {
            padding: 24px;
        }
    }
    </style>
</head>

<body>
@include('partials.header')


<!-- HERO -->
<section class="contact-hero">
    <div class="container-contact contact-hero-inner">
        <span class="hero-label">Contact</span>
        <h1>Nous sommes à <span>votre écoute</span></h1>
        <p>Vous avez une question, souhaitez inscrire un élève ou recherchez une formation ? L'équipe de MonProfChezMoi est disponible pour vous accompagner et répondre à toutes vos demandes.</p>
        <p>N'hésitez pas à nous contacter par téléphone, par e-mail ou en remplissant le formulaire ci-dessous. Nous nous engageons à vous répondre dans les meilleurs délais.</p>
    </div>
</section>

<!-- INFO CARDS -->
<section class="contact-info-section">
    <div class="container-contact">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="contact-info-card">
                    <div class="contact-info-icon"><i class="fas fa-phone-alt"></i></div>
                    <h4>Téléphone</h4>
                    <p>
                        <a href="tel:+2250153751544">+225 01 53 75 15 44</a><br>
                        <a href="tel:+2250171343899">+225 01 71 34 38 99</a>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info-card">
                    <div class="contact-info-icon"><i class="fas fa-envelope"></i></div>
                    <h4>E-mail</h4>
                    <p><a href="mailto:info@monprofchezmoi-ci.com">info@monprofchezmoi-ci.com</a></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-info-card">
                    <div class="contact-info-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <h4>Adresse</h4>
                    <p>Riviera 4 Synacassi 1<br>Abidjan, Côte d'Ivoire</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FORM + MAP -->
<section class="contact-form-section">
    <div class="container-contact">
        <div class="row g-5 align-items-start">
            <div class="col-lg-6">
                <span class="section-label">Formulaire de contact</span>
                <h2 class="section-title-big">Envoyez-nous un message</h2>
                <p class="section-subtitle">Remplissez le formulaire ci-dessous en indiquant votre nom et prénom, votre adresse e-mail, votre numéro de téléphone, l'objet de votre demande et votre message. Notre équipe vous répondra dans les plus brefs délais.</p>

                @if(session('success'))
                    <div class="alert-success-custom">
                        <i class="fas fa-check-circle"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="contact-form-wrap">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nom et prénom</label>
                                <input type="text" class="form-control" name="nom" placeholder="Votre nom et prénom" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Numéro de téléphone</label>
                                <input type="tel" class="form-control" name="numero" placeholder="+225 01 23 45 67 89" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Adresse e-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="exemple@email.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Objet de votre demande</label>
                                <select class="form-control" name="objet">
                                    <option value="">-- Choisissez un objet --</option>
                                    <option>Demande d'informations sur nos services</option>
                                    <option>Inscription d'un élève</option>
                                    <option>Recrutement d'enseignants</option>
                                    <option>Demande de devis</option>
                                    <option>Assistance et suivi pédagogique</option>
                                    <option>Partenariats et collaborations</option>
                                    <option>Autre demande</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Votre message</label>
                                <textarea class="form-control" name="message" placeholder="Décrivez votre demande ici..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-submit">
                                    <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6">
                <span class="section-label">Localisation</span>
                <h2 class="section-title-big">Retrouvez-nous</h2>
                <div class="contact-map">
                    <iframe
                        src="https://www.google.com/maps?q=Riviera+4+Synacassi+1,+Abidjan,+Cote+d'Ivoire&output=embed"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Localisation MonProfChezMoi">
                    </iframe>
                </div>

                <div class="horaires-box">
                    <h4><i class="fas fa-clock"></i> Horaires d'ouverture</h4>
                    <div class="horaire-row">
                        <span class="day">Lundi au vendredi</span>
                        <span class="hours">8h00 - 18h00</span>
                    </div>
                    <div class="horaire-row">
                        <span class="day">Samedi</span>
                        <span class="closed">Fermé</span>
                    </div>
                    <div class="horaire-row">
                        <span class="day">Dimanche</span>
                        <span class="closed">Fermé</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- RAISONS -->
<section class="reasons-section">
    <div class="container-contact">
        <div class="text-center mb-5">
            <span class="section-label">Pourquoi nous contacter ?</span>
            <h2 class="section-title-big" style="margin-bottom: 12px;">Nous sommes là pour vous aider</h2>
            <p class="section-subtitle" style="max-width: 600px; margin: 0 auto 40px;">Notre équipe est à votre disposition pour répondre à toutes vos questions et vous accompagner dans vos projets.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="contact-form-wrap" style="box-shadow: var(--shadow-md); padding: 36px;">
                    <ul class="reasons-list">
                        <li>
                            <div class="reason-icon"><i class="fas fa-info-circle"></i></div>
                            <div class="reason-text">
                                <strong>Demande d'informations sur nos services</strong>
                                <span>Vos questions sur nos formations et accompagnements personnalisés.</span>
                            </div>
                        </li>
                        <li>
                            <div class="reason-icon"><i class="fas fa-user-graduate"></i></div>
                            <div class="reason-text">
                                <strong>Inscription d'un élève</strong>
                                <span>Inscrivez votre enfant ou vous-même à nos programmes éducatifs.</span>
                            </div>
                        </li>
                        <li>
                            <div class="reason-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                            <div class="reason-text">
                                <strong>Recrutement d'enseignants</strong>
                                <span>Rejoignez notre équipe d'enseignants qualifiés et passionnés.</span>
                            </div>
                        </li>
                        <li>
                            <div class="reason-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                            <div class="reason-text">
                                <strong>Demande de devis</strong>
                                <span>Obtenez un devis adapté à vos besoins spécifiques.</span>
                            </div>
                        </li>
                        <li>
                            <div class="reason-icon"><i class="fas fa-handshake"></i></div>
                            <div class="reason-text">
                                <strong>Assistance et suivi pédagogique</strong>
                                <span>Un accompagnement personnalisé et continu pour chaque élève.</span>
                            </div>
                        </li>
                        <li>
                            <div class="reason-icon"><i class="fas fa-users"></i></div>
                            <div class="reason-text">
                                <strong>Partenariats et collaborations</strong>
                                <span>Construisons ensemble des projets éducatifs innovants.</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center mt-5" style="color: var(--gray-600); font-size: 1.1rem; line-height: 1.8; max-width: 700px; margin-left: auto; margin-right: auto;">
            <strong style="color: var(--blue);">MonProfChezMoi</strong>, votre partenaire de confiance pour un accompagnement scolaire personnalisé à domicile, en ligne ou au centre.
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer-moderne">
    <div class="container-contact">
        <div class="row g-5">
            <div class="col-lg-4">
                <a href="{{ route('home') }}" class="footer-brand">MonProfChezMoi</a>
                <p class="mt-3">Leader de l'accompagnement éducatif en Côte d'Ivoire. Un groupe éducatif expérimenté et innovant au service de la réussite de chaque élève depuis 2019.</p>
            </div>
            <div class="col-lg-4">
                <h4 class="footer-col-title">Navigation</h4>
                <a href="{{ route('home') }}" class="nav-link-footer">Accueil</a>
                <a href="{{ route('formations') }}" class="nav-link-footer">Formations</a>
                <a href="{{ route('contact.form') }}" class="nav-link-footer">Contact</a>
            </div>
            <div class="col-lg-4">
                <h4 class="footer-col-title">Contact</h4>
                <div class="footer-contact-item-moderne">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Riviera 4 Synacassi 1, Abidjan, Côte d'Ivoire</span>
                </div>
                <div class="footer-contact-item-moderne">
                    <i class="fas fa-phone-alt"></i>
                    <span>+225 01 53 75 15 44 / 01 71 34 38 99</span>
                </div>
                <div class="footer-contact-item-moderne">
                    <i class="fas fa-envelope"></i>
                    <span>info@monprofchezmoi-ci.com</span>
                </div>
                <div class="footer-contact-item-moderne">
                    <i class="fas fa-clock"></i>
                    <span>Lun - Ven : 8h00 - 18h00</span>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; {{ date('Y') }} MonProfChezMoi. Tous droits réservés.
    </div>
</footer>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>

