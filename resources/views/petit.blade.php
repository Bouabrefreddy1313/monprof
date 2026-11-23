<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Monprofchezmoi-ci.com - Les Petits Bilingues</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Cours d'anglais pour enfants, bilinguisme, ateliers linguistiques" name="keywords">
    <meta content="Les Petits Bilingues de MONPROFCHEZMOI : ateliers d'anglais immersifs et ludiques pour enfants de 4 à 16 ans, en mini-groupes de 3 à 8 enfants. Hebdomadaire, immersif ou stage de vacances à Abidjan." name="description">

    <!-- Favicon -->
    <link href="asset/img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="asset/css/courscss/bootstrap.min.css" rel="stylesheet">

    <style>
        /* ============================================
           MONPROFCHEZMOI - DESIGN SYSTEM 2024
           Orange #FF6B35 | Bleu #0A1628 | Blanc
           ============================================ */

        :root {
            --orange: #FF6B35;
            --orange-dark: #E85A2B;
            --orange-light: #FF8C5A;
            --blue: #0A1628;
            --blue-light: #1E3A5F;
            --blue-accent: #3B82F6;
            --white: #FFFFFF;
            --cream: #FAFBFC;
            --gray-50: #F8F9FA;
            --gray-100: #F1F3F4;
            --gray-200: #E8EAED;
            --gray-400: #9AA0A6;
            --gray-600: #5F6368;
            --gray-800: #3C4043;
            --shadow-sm: 0 2px 8px rgba(10,22,40,0.06);
            --shadow-md: 0 8px 24px rgba(10,22,40,0.1);
            --shadow-lg: 0 16px 48px rgba(10,22,40,0.12);
            --shadow-xl: 0 24px 64px rgba(10,22,40,0.16);
            --shadow-orange: 0 8px 32px rgba(255,107,53,0.25);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Nunito', sans-serif;
            color: var(--gray-800);
            background: var(--white);
            overflow-x: hidden;
            line-height: 1.6;
        }
/* ============================================
   HAMBURGER TOGGLER
   ============================================ */
.navbar-toggler-premium {
    border: none;
    background: transparent;
    width: 40px;
    height: 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 5px;
    padding: 0;
    cursor: pointer;
}
.navbar-toggler-premium:focus {
    outline: none;
    box-shadow: none;
}
.hamburger-line {
    display: block;
    width: 24px;
    height: 2.5px;
    background: var(--blue);
    border-radius: 2px;
    transition: all 0.3s ease;
}
.navbar-toggler-premium[aria-expanded="true"] .hamburger-line:nth-child(1) {
    transform: rotate(45deg) translate(5px, 5px);
}
.navbar-toggler-premium[aria-expanded="true"] .hamburger-line:nth-child(2) {
    opacity: 0;
}
.navbar-toggler-premium[aria-expanded="true"] .hamburger-line:nth-child(3) {
    transform: rotate(-45deg) translate(5px, -5px);
}
/* ============================================
   NAVBAR MOBILE - VERSION CORRIGÉE COMPLÈTE
   ============================================ */
@media (max-width: 991px) {
    .navbar-moderne {
        position: sticky;
        top: 0;
        z-index: 1030;
    }

    .navbar-moderne .collapse {
        background: var(--white);
        border-top: 1px solid var(--gray-100);
        max-height: none;
        overflow-y: visible;
        overflow-x: hidden;
    }

    .navbar-moderne .collapse.show {
        background: var(--white);
        border-top: 1px solid var(--gray-100);
    }

    .nav-menu-moderne {
        flex-direction: column;
        padding: 0;
        gap: 0;
        width: 100%;
        max-height: none;
        overflow-y: visible;
    }

    .nav-menu-moderne .nav-item-moderne {
        width: 100%;
        border-bottom: 1px solid var(--gray-100);
        position: relative;
    }

    .nav-menu-moderne .nav-item-moderne:last-child {
        border-bottom: none;
    }

    .nav-menu-moderne .nav-link-moderne {
        padding: 14px 16px;
        width: 100%;
        justify-content: space-between;
        color: var(--gray-800);
    }

    .nav-link-moderne .chevron {
        transition: transform 0.3s ease;
        font-size: 0.7rem;
    }

    .nav-item-moderne.active .chevron {
        transform: rotate(180deg);
    }

    /* ===== MEGA MENU MOBILE - CORRIGÉ ===== */
    .mega-menu-moderne {
        position: static !important;
        transform: none !important;
        left: auto !important;
        top: auto !important;
        min-width: 100% !important;
        width: 100% !important;
        box-shadow: none !important;
        border: none !important;
        border-radius: 0 !important;
        opacity: 1 !important;
        visibility: visible !important;
        display: none;
        margin: 0 !important;
        padding: 0 !important;
        background: var(--gray-50) !important;
        z-index: auto !important;
        overflow: visible !important;
    }

    .nav-item-moderne.active .mega-menu-moderne {
        display: block !important;
        animation: slideDownMobile 0.35s ease forwards;
    }

    @keyframes slideDownMobile {
        from {
            opacity: 0;
            max-height: 0;
        }
        to {
            opacity: 1;
            max-height: 3000px;
        }
    }

    .mega-header-moderne {
        padding: 14px 20px;
        border-radius: 0;
    }

    .mega-header-moderne h4 {
        font-size: 1rem;
    }

    .mega-header-moderne p {
        margin: 4px 0 0 26px;
        font-size: 0.8rem;
    }

    .mega-body-moderne {
        display: block !important;
        padding: 14px 20px;
        grid-template-columns: 1fr !important;
        gap: 20px;
    }

    .mega-body-moderne > div {
        margin-bottom: 16px;
    }

    .mega-body-moderne > div:last-child {
        margin-bottom: 0;
    }

    .mega-col-title {
        font-size: 0.75rem;
        margin-bottom: 10px;
        padding-bottom: 6px;
    }

    .mega-link-moderne {
        display: flex !important;
        padding: 10px 0;
        font-size: 0.9rem;
        align-items: center;
    }

    .mega-link-icon {
        width: 36px;
        height: 36px;
        font-size: 0.85rem;
    }

    /* Bouton connexion mobile */
    .ms-lg-3 {
        padding: 12px 16px;
        border-top: 1px solid var(--gray-100);
    }

    .btn-nav-cta {
        width: 100%;
        justify-content: center;
    }
}
/* ============================================
   NAVBAR MOBILE - TRÈS PETITS ÉCRANS
   ============================================ */
@media (max-width: 575px) {
    .navbar-moderne .navbar-brand {
        font-size: 1.1rem;
    }

    .navbar-moderne .navbar-brand img {
        height: 38px;
    }

    .navbar-toggler-premium {
        width: 36px;
        height: 36px;
    }

    .hamburger-line {
        width: 20px;
        height: 2px;
    }

    .nav-menu-moderne .nav-link-moderne {
        padding: 12px 14px;
        font-size: 0.9rem;
    }

    .mega-header-moderne {
        padding: 12px 16px;
    }

    .mega-body-moderne {
        padding: 12px 16px;
    }

    .mega-link-moderne {
        font-size: 0.85rem;
        padding: 8px 0;
    }

    .mega-link-icon {
        width: 32px;
        height: 32px;
        min-width: 32px;
    }
}
/* ============================================
   TOPBAR MOBILE - CORRIGÉ
   ============================================ */
@media (max-width: 767px) {
    .topbar-minimal {
        padding: 6px 0;
    }

    .topbar-minimal .container {
        flex-direction: column;
        gap: 6px;
        align-items: center;
    }

    .topbar-info-minimal {
        flex-wrap: wrap;
        justify-content: center;
        gap: 8px 16px;
        width: 100%;
    }

    .topbar-info-minimal span {
        font-size: 0.72rem;
        gap: 5px;
    }

    .topbar-info-minimal span i {
        font-size: 0.75rem;
    }

    .topbar-social-minimal {
        gap: 8px;
    }

    .topbar-social-minimal a {
        width: 26px;
        height: 26px;
        font-size: 0.7rem;
    }
}

@media (max-width: 575px) {
    .topbar-minimal {
        padding: 5px 0;
    }

    .topbar-minimal .container {
        flex-direction: column;
        gap: 5px;
        padding-left: 12px;
        padding-right: 12px;
    }

    .topbar-info-minimal {
        flex-direction: column;
        align-items: center;
        gap: 4px;
        width: 100%;
    }

    .topbar-info-minimal span {
        font-size: 0.68rem;
        gap: 5px;
        justify-content: center;
        width: 100%;
    }

    .topbar-info-minimal span i {
        font-size: 0.7rem;
    }

    .topbar-social-minimal {
        gap: 6px;
        justify-content: center;
        width: 100%;
        padding-top: 2px;
    }

    .topbar-social-minimal a {
        width: 24px;
        height: 24px;
        font-size: 0.65rem;
        border-radius: 5px;
    }
}

@media (max-width: 360px) {
    .topbar-info-minimal span {
        font-size: 0.62rem;
    }

    .topbar-info-minimal span i {
        font-size: 0.65rem;
    }
}
        /* ============================================
           SCROLL PROGRESS
           ============================================ */
        .scroll-progress {
            position: fixed;
            top: 0; left: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--orange), var(--orange-light), var(--blue-accent));
            z-index: 10000;
            width: 0%;
            transition: width 0.1s;
        }

        /* ============================================
           TOPBAR MINIMAL
           ============================================ */
        .topbar-minimal {
            background: var(--blue);
            padding: 8px 0;
            position: relative;
        }
        .topbar-minimal .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .topbar-info-minimal {
            display: flex;
            gap: 24px;
            align-items: center;
        }
        .topbar-info-minimal span {
            color: rgba(255,255,255,0.7);
            font-size: 0.78rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .topbar-info-minimal span i {
            color: var(--orange);
            font-size: 0.85rem;
        }
        .topbar-social-minimal {
            display: flex;
            gap: 6px;
        }
        .topbar-social-minimal a {
            width: 28px; height: 28px;
            border-radius: 6px;
            background: rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.6);
            font-size: 0.75rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .topbar-social-minimal a:hover {
            background: var(--orange);
            color: white;
            transform: translateY(-2px);
        }

        /* ============================================
           NAVBAR MODERNE
           ============================================ */
        .navbar-moderne {
            background: rgba(255,255,255,0.98);
            backdrop-filter: blur(20px);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1030;
            border-bottom: 1px solid var(--gray-100);
            transition: all 0.3s ease;
        }
        .navbar-moderne.scrolled {
            box-shadow: var(--shadow-md);
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
        .navbar-moderne .navbar-brand img {
            height: 45px;
            width: auto;
        }
        .nav-menu-moderne {
            display: flex;
            align-items: center;
            gap: 4px;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .nav-menu-moderne .nav-item-moderne {
            position: relative;
        }
        .nav-menu-moderne .nav-link-moderne {
            color: var(--gray-800);
            font-weight: 600;
            font-size: 0.88rem;
            padding: 28px 16px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
            position: relative;
        }
        .nav-menu-moderne .nav-link-moderne::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 16px;
            right: 16px;
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
        .nav-link-moderne .chevron {
            font-size: 0.6rem;
            transition: transform 0.3s ease;
            color: var(--orange);
        }
        .nav-item-moderne:hover .chevron {
            transform: rotate(180deg);
        }

        /* Mega Menu Moderne */
        .mega-menu-moderne {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            background: var(--white);
            border-radius: 16px;
            box-shadow: var(--shadow-xl);
            padding: 0;
            min-width: 600px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1029;
            overflow: hidden;
            border: 1px solid var(--gray-100);
        }
        .nav-item-moderne:hover .mega-menu-moderne {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }
        .mega-header-moderne {
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
            padding: 20px 28px;
            color: white;
        }
        .mega-header-moderne h4 {
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .mega-header-moderne h4 i {
            color: var(--orange);
        }
        .mega-header-moderne p {
            font-size: 0.82rem;
            color: rgba(255,255,255,0.7);
            margin: 4px 0 0 30px;
        }
        .mega-body-moderne {
            padding: 20px 28px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }
        .mega-col-title {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--orange);
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--gray-100);
        }
        .mega-link-moderne {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 0;
            color: var(--gray-800);
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .mega-link-moderne:hover {
            color: var(--orange);
            transform: translateX(4px);
        }
        .mega-link-icon {
            width: 32px; height: 32px;
            min-width: 32px;
            border-radius: 8px;
            background: var(--gray-50);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--orange);
            font-size: 0.8rem;
            transition: all 0.2s ease;
        }
        .mega-link-moderne:hover .mega-link-icon {
            background: var(--orange);
            color: white;
        }

        /* Bouton CTA Navbar */
        .btn-nav-cta {
            background: var(--orange);
            color: white !important;
            padding: 10px 22px !important;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-nav-cta:hover {
            background: var(--orange-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-orange);
            color: white !important;
        }

        /* User connected */
        .user-connected {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .user-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--orange), var(--orange-light));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.9rem;
        }
        .user-name {
            font-weight: 600;
            color: var(--gray-800);
            font-size: 0.9rem;
        }

        /* Mobile */
        @media (max-width: 991px) {
            .nav-menu-moderne {
                flex-direction: column;
                padding: 16px;
            }
            .nav-menu-moderne .nav-link-moderne {
                padding: 14px 16px;
                width: 100%;
            }
            .mega-menu-moderne {
                position: static;
                transform: none;
                min-width: auto;
                box-shadow: none;
                border: none;
                opacity: 1;
                visibility: visible;
                display: none;
                margin-top: 8px;
            }
            .nav-item-moderne.active .mega-menu-moderne {
                display: block;
            }
            .mega-body-moderne {
                grid-template-columns: 1fr;
            }
        }

        /* ============================================
           HERO - PAGE SPECIFIQUE
           ============================================ */
        .hero-page {
            min-height: 70vh;
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 50%, #1a365d 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }
        .hero-page::before {
            content: '';
            position: absolute;
            top: -20%; right: -10%;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(255,107,53,0.15), transparent 70%);
            border-radius: 50%;
            animation: float-hero 8s ease-in-out infinite;
        }
        .hero-page::after {
            content: '';
            position: absolute;
            bottom: -10%; left: -5%;
            width: 300px; height: 300px;
            background: radial-gradient(circle, rgba(59,130,246,0.1), transparent 70%);
            border-radius: 50%;
            animation: float-hero 10s ease-in-out infinite reverse;
        }
        @keyframes float-hero {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(-30px, -20px); }
        }
        .hero-page-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 60px;
            align-items: center;
            position: relative;
            z-index: 2;
        }
        .hero-page-content {
            padding: 80px 0;
        }
        .hero-page-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,107,53,0.15);
            border: 1px solid rgba(255,107,53,0.3);
            color: var(--orange-light);
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 0.82rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 24px;
        }
        .hero-page-title {
            font-size: clamp(2.2rem, 4.5vw, 3.5rem);
            font-weight: 800;
            color: white;
            line-height: 1.15;
            margin-bottom: 20px;
        }
        .hero-page-title .highlight-orange {
            color: var(--orange);
            position: relative;
        }
        .hero-page-subtitle {
            font-size: 1.15rem;
            color: rgba(255,255,255,0.75);
            line-height: 1.8;
            margin-bottom: 35px;
            max-width: 520px;
        }
        .hero-page-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 30px;
        }
        .btn-hero-nouveau {
            padding: 14px 28px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.95rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        .btn-hero-nouveau.btn-orange {
            background: var(--orange);
            color: white;
            box-shadow: 0 8px 24px rgba(255,107,53,0.3);
        }
        .btn-hero-nouveau.btn-orange:hover {
            background: var(--orange-dark);
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(255,107,53,0.4);
        }
        .btn-hero-nouveau.btn-outline {
            background: rgba(255,255,255,0.08);
            color: white;
            border: 1.5px solid rgba(255,255,255,0.2);
        }
        .btn-hero-nouveau.btn-outline:hover {
            background: rgba(255,255,255,0.15);
            border-color: rgba(255,255,255,0.4);
        }

        /* Hero Image */
        .hero-page-image {
            position: relative;
            height: 450px;
        }
        .hero-page-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 24px;
            box-shadow: var(--shadow-xl);
            border: 4px solid rgba(255,255,255,0.1);
        }
        .hero-badge-float {
            position: absolute;
            bottom: -20px;
            left: -20px;
            background: var(--orange);
            color: white;
            padding: 16px 28px;
            border-radius: 16px;
            font-weight: 700;
            font-size: 1rem;
            box-shadow: var(--shadow-orange);
            z-index: 5;
            animation: pulse-badge 2s infinite;
        }
        @keyframes pulse-badge {
            0%, 100% { box-shadow: 0 0 0 0 rgba(255,107,53,0.4); }
            50% { box-shadow: 0 0 0 12px rgba(255,107,53,0); }
        }

        @media (max-width: 991px) {
            .hero-page-grid { grid-template-columns: 1fr; }
            .hero-page-image { display: none; }
        }

        /* ============================================
           SECTIONS COMMUNES
           ============================================ */
        .section-padding {
            padding: 100px 0;
        }
        .section-header-center {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 60px;
        }
        .section-label-orange {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--orange);
            margin-bottom: 16px;
        }
        .section-label-orange::before {
            content: '';
            width: 30px; height: 3px;
            background: var(--orange);
            border-radius: 2px;
        }
        .section-title-big {
            font-size: clamp(1.8rem, 3.5vw, 2.8rem);
            font-weight: 800;
            color: var(--blue);
            line-height: 1.2;
            margin-bottom: 16px;
        }
        .section-subtitle {
            font-size: 1.05rem;
            color: var(--gray-600);
            line-height: 1.8;
        }

        /* ============================================
           INTRO BILINGUE
           ============================================ */
        .intro-section {
            background: var(--cream);
        }
        .intro-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }
        .intro-content h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--blue);
            margin-bottom: 20px;
        }
        .intro-content p {
            color: var(--gray-600);
            line-height: 1.8;
            margin-bottom: 20px;
        }
        .benefits-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .benefits-list li {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 12px 0;
            border-bottom: 1px solid var(--gray-100);
            color: var(--gray-800);
            font-size: 1rem;
        }
        .benefits-list li:last-child {
            border-bottom: none;
        }
        .benefits-list li i {
            width: 28px; height: 28px;
            min-width: 28px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--orange), var(--orange-light));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            margin-top: 2px;
        }
        .intro-image-wrap {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
        }
        .intro-image-wrap img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.7s ease;
        }
        .intro-image-wrap:hover img {
            transform: scale(1.05);
        }

        @media (max-width: 991px) {
            .intro-layout { grid-template-columns: 1fr; }
            .intro-image-wrap { order: -1; }
            .intro-image-wrap img { height: 300px; }
        }

        /* ============================================
           TABS AGE - REDESIGN
           ============================================ */
        .tabs-section {
            background: var(--white);
        }
        .age-tabs-container {
            text-align: center;
            margin-bottom: 50px;
        }
        .age-tabs {
            list-style: none;
            display: inline-flex;
            gap: 12px;
            flex-wrap: wrap;
            justify-content: center;
            padding: 8px;
            background: var(--gray-50);
            border-radius: 16px;
        }
        .age-tab {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            background: var(--white);
            color: var(--gray-800);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid transparent;
            border: none;
        }
        .age-tab:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
            color: var(--orange);
        }
        .age-tab.active {
            background: linear-gradient(135deg, var(--orange), var(--orange-light));
            color: white;
            box-shadow: var(--shadow-orange);
            transform: translateY(-3px);
        }
        .age-tab i {
            font-size: 0.85rem;
        }

        /* Age Sections */
        .age-section {
            display: none;
            animation: fadeInSection 0.5s ease-in-out;
        }
        .age-section.active {
            display: block;
        }
        @keyframes fadeInSection {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ============================================
           WORKSHOP CARDS - REDESIGN
           ============================================ */
        .workshops-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }
        .workshop-card-moderne {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid var(--gray-100);
            position: relative;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .workshop-card-moderne::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--orange), var(--orange-light));
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }
        .workshop-card-moderne:hover::before {
            transform: scaleX(1);
        }
        .workshop-card-moderne:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(255,107,53,0.3);
        }
        .workshop-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .workshop-card-moderne:hover .workshop-image {
            transform: scale(1.05);
        }
        .workshop-image-wrap {
            overflow: hidden;
            position: relative;
        }
        .workshop-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            background: var(--orange);
            color: white;
            padding: 6px 14px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.8rem;
            box-shadow: var(--shadow-orange);
            z-index: 2;
        }
        .workshop-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        .workshop-body h4 {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--blue);
            margin-bottom: 14px;
        }
        .workshop-meta {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .workshop-meta-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 8px 0;
            border-bottom: 1px solid var(--gray-100);
        }
        .workshop-meta-item:last-child {
            border-bottom: none;
        }
        .workshop-meta-item i {
            width: 28px; height: 28px;
            min-width: 28px;
            border-radius: 8px;
            background: var(--gray-50);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--orange);
            font-size: 0.8rem;
        }
        .workshop-meta-item strong {
            display: block;
            color: var(--blue);
            font-size: 0.85rem;
            font-weight: 700;
            margin-bottom: 2px;
        }
        .workshop-meta-item span {
            color: var(--gray-600);
            font-size: 0.88rem;
            line-height: 1.45;
        }

        /* ===== TARIFS ET FORMULES INTÉGRÉS DANS LES ATELIERS ===== */
        .workshop-pricing-zone {
            margin-top: 18px;
            padding-top: 16px;
            border-top: 2px dashed var(--gray-200);
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: auto;
        }
        .workshop-pricing-title {
            font-size: 0.82rem;
            font-weight: 800;
            color: var(--blue);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 4px;
        }
        .workshop-pricing-title span {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .workshop-pricing-title i {
            color: var(--orange);
            font-size: 0.9rem;
        }
        .workshop-formula-list {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }
        .workshop-formula-card {
            background: var(--gray-50);
            border: 1.5px solid var(--gray-200);
            border-radius: 12px;
            padding: 10px 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            cursor: pointer;
            transition: all 0.25s ease;
            position: relative;
        }
        .workshop-formula-card:hover {
            background: #ffffff;
            border-color: var(--orange);
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(255,107,53,0.16);
        }
        .workshop-formula-card.featured {
            background: linear-gradient(135deg, rgba(255,107,53,0.06), rgba(255,140,90,0.02));
            border-color: rgba(255,107,53,0.45);
        }
        .workshop-formula-card.featured:hover {
            border-color: var(--orange);
            box-shadow: 0 6px 18px rgba(255,107,53,0.22);
        }
        .formula-badge-star {
            position: absolute;
            top: -9px;
            right: 12px;
            background: linear-gradient(135deg, var(--orange), var(--orange-dark));
            color: white;
            font-size: 0.62rem;
            font-weight: 800;
            padding: 2px 8px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(255,107,53,0.3);
            text-transform: uppercase;
            letter-spacing: 0.3px;
            pointer-events: none;
            z-index: 1;
        }
        .formula-info {
            display: flex;
            flex-direction: column;
            gap: 1px;
            min-width: 85px;
        }
        .formula-name {
            font-weight: 800;
            font-size: 0.88rem;
            color: var(--blue);
            line-height: 1.2;
        }
        .formula-sub {
            font-size: 0.72rem;
            color: var(--gray-600);
            line-height: 1.2;
        }
        .formula-price-col {
            text-align: right;
            margin-left: auto;
        }
        .formula-price {
            font-size: 0.96rem;
            font-weight: 800;
            color: var(--orange);
            white-space: nowrap;
        }
        .formula-price small {
            font-size: 0.7rem;
            color: var(--gray-600);
            font-weight: 600;
        }
        .btn-formula-choose {
            background: var(--blue);
            color: white;
            border: none;
            padding: 6px 11px;
            border-radius: 8px;
            font-size: 0.76rem;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: all 0.2s ease;
            flex-shrink: 0;
            white-space: nowrap;
        }
        .btn-formula-choose:hover {
            background: var(--orange);
            transform: translateX(2px);
            color: white;
        }
        .btn-formula-choose.btn-featured {
            background: linear-gradient(135deg, var(--orange), var(--orange-dark));
            box-shadow: 0 2px 8px rgba(255,107,53,0.25);
        }
        .btn-formula-choose.btn-featured:hover {
            background: linear-gradient(135deg, var(--orange-dark), #c84113);
        }

        /* Stage Single Card Pricing */
        .stage-single-card {
            background: linear-gradient(135deg, rgba(255,107,53,0.05), rgba(10,22,40,0.02));
            border: 1.5px solid rgba(255,107,53,0.35);
            border-radius: 14px;
            padding: 14px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            transition: all 0.25s ease;
            cursor: pointer;
            text-align: center;
            height: 100%;
            justify-content: space-between;
        }
        .stage-single-card:hover {
            border-color: var(--orange);
            box-shadow: 0 6px 20px rgba(255,107,53,0.18);
            transform: translateY(-2px);
            background: #ffffff;
        }
        .stage-single-header {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }
        .stage-single-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            background: rgba(255,107,53,0.12);
            color: var(--orange-dark);
            font-weight: 800;
            font-size: 0.72rem;
            padding: 3px 10px;
            border-radius: 20px;
            margin: 0 auto;
        }
        .stage-single-title {
            font-size: 0.98rem;
            font-weight: 800;
            color: var(--blue);
            margin-top: 2px;
        }
        .stage-single-desc {
            font-size: 0.78rem;
            color: var(--gray-600);
            line-height: 1.35;
        }
        .stage-single-price-box {
            padding: 8px;
            background: white;
            border-radius: 10px;
            border: 1px dashed var(--gray-200);
        }
        .stage-price-amount {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--orange);
            line-height: 1.1;
        }
        .stage-price-amount small {
            font-size: 0.78rem;
            color: var(--gray-600);
        }
        .stage-price-note {
            font-size: 0.7rem;
            color: var(--gray-400);
            margin-top: 2px;
        }
        .btn-stage-choose {
            background: linear-gradient(135deg, var(--orange), var(--orange-dark));
            color: white;
            border: none;
            padding: 9px 14px;
            border-radius: 9px;
            font-size: 0.84rem;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            box-shadow: 0 4px 12px rgba(255,107,53,0.3);
            transition: all 0.2s ease;
            width: 100%;
        }
        .btn-stage-choose:hover {
            background: linear-gradient(135deg, var(--orange-dark), #c84113);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(255,107,53,0.4);
            color: white;
        }

        @media (max-width: 991px) {
            .workshops-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 480px) {
            .workshop-formula-card {
                padding: 9px 10px;
            }
            .formula-name { font-size: 0.84rem; }
            .formula-sub { font-size: 0.68rem; }
            .formula-price { font-size: 0.9rem; }
            .btn-formula-choose { padding: 5px 8px; font-size: 0.72rem; }
        }

        /* ============================================
           PRICING - REDESIGN & FULL RESPONSIVE
           ============================================ */
        .pricing-section-moderne {
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
            position: relative;
            overflow: hidden;
            padding: 80px 0;
        }
        .pricing-section-moderne::before {
            content: '';
            position: absolute;
            top: -50%; left: -10%;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(255,107,53,0.1), transparent 70%);
            pointer-events: none;
        }
        .pricing-section-moderne .section-title-big { color: white; }
        .pricing-section-moderne .section-subtitle { color: rgba(255,255,255,0.7); }
        .pricing-section-moderne .section-label-orange { color: var(--orange-light); }
        .pricing-section-moderne .section-label-orange::before { background: var(--orange-light); }

        .pricing-block-wrapper {
            margin-bottom: 48px;
        }
        .pricing-block-header {
            margin-bottom: 20px;
        }
        .pricing-block-title {
            color: var(--blue);
            font-weight: 800;
            font-size: clamp(1.05rem, 2.4vw, 1.35rem);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .pricing-block-title i {
            color: var(--orange);
            font-size: 1.15rem;
        }
        .pricing-block-title em {
            font-weight: 600;
            color: var(--gray-600);
            font-size: clamp(0.85rem, 1.8vw, 0.98rem);
            font-style: normal;
        }
        .pricing-format-features {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .pricing-format-features li {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.82rem;
            color: var(--gray-800);
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            padding: 6px 12px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .pricing-format-features li:hover {
            background: rgba(255,107,53,0.06);
            border-color: rgba(255,107,53,0.25);
        }
        .pricing-format-features li i {
            color: var(--orange);
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        .pricing-grid-moderne {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            max-width: 1140px;
            width: 100%;
            margin: 0 auto;
        }
        .pricing-grid-moderne.pricing-grid-stage {
            grid-template-columns: 1fr;
            max-width: 420px;
        }

        .pricing-card-moderne {
            background: var(--white);
            border-radius: 20px;
            padding: 32px 24px;
            box-shadow: var(--shadow-md);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            position: relative;
            border: 2px solid var(--gray-100);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
            box-sizing: border-box;
            width: 100%;
        }
        .pricing-card-moderne:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-xl);
            border-color: rgba(255,107,53,0.35);
        }
        .pricing-card-moderne.featured {
            border-color: var(--orange);
            background: #fff;
            box-shadow: 0 12px 36px rgba(255,107,53,0.15);
            position: relative;
        }
        @media (min-width: 992px) {
            .pricing-card-moderne.featured {
                transform: scale(1.03);
            }
            .pricing-card-moderne.featured:hover {
                transform: scale(1.03) translateY(-6px);
            }
        }
        .pricing-ribbon-badge {
            position: absolute;
            top: 16px;
            right: -36px;
            background: linear-gradient(135deg, var(--orange), var(--orange-light));
            color: white;
            padding: 5px 38px;
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.8px;
            transform: rotate(45deg);
            box-shadow: 0 2px 8px rgba(255,107,53,0.35);
            text-transform: uppercase;
            pointer-events: none;
            z-index: 2;
        }

        .pricing-header-moderne {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1.5px solid var(--gray-100);
        }
        .pricing-duration-moderne {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--blue);
            margin-bottom: 6px;
        }
        .pricing-bonus-moderne {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, #dcfce7, #bbf7d0);
            color: #166534;
            padding: 5px 14px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .pricing-bonus-moderne i {
            color: #16a34a;
        }
        .pricing-price-moderne {
            font-size: clamp(1.55rem, 3.2vw, 2.3rem);
            font-weight: 800;
            color: var(--orange);
            line-height: 1.15;
            display: flex;
            align-items: baseline;
            justify-content: center;
            gap: 4px;
            flex-wrap: wrap;
            word-break: normal;
            letter-spacing: -0.5px;
        }
        .pricing-price-moderne span {
            font-size: 0.88rem;
            color: var(--gray-600);
            font-weight: 600;
            letter-spacing: normal;
        }
        .pricing-total-hint {
            font-size: 0.8rem;
            color: var(--gray-600);
            margin-top: 6px;
            font-weight: 500;
        }
        .pricing-features-moderne {
            list-style: none;
            padding: 0;
            margin: 0;
            flex-grow: 1;
        }
        .pricing-features-moderne li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 10px 0;
            border-bottom: 1px solid var(--gray-100);
            color: var(--gray-800);
            font-size: 0.88rem;
            line-height: 1.45;
        }
        .pricing-features-moderne li:last-child {
            border-bottom: none;
        }
        .pricing-features-moderne li i {
            color: var(--orange);
            font-size: 0.95rem;
            margin-top: 2px;
            flex-shrink: 0;
        }
        .pricing-btn-moderne {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 14px 18px;
            margin-top: 20px;
            background: linear-gradient(135deg, var(--orange), var(--orange-light));
            color: white !important;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.92rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 4px 14px rgba(255,107,53,0.25);
        }
        .pricing-btn-moderne:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(255,107,53,0.4);
            color: white !important;
            background: linear-gradient(135deg, var(--orange-dark), var(--orange));
        }
        .pricing-btn-moderne i {
            transition: transform 0.2s ease;
        }
        .pricing-btn-moderne:hover i {
            transform: translateX(4px);
        }

        /* Responsive Breakpoints Pricing */
        @media (max-width: 991px) {
            .pricing-grid-moderne {
                grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)) !important;
                gap: 20px;
                max-width: 720px;
            }
            .pricing-card-moderne.featured {
                transform: none !important;
            }
            .pricing-card-moderne.featured:hover {
                transform: translateY(-5px) !important;
            }
        }
        @media (max-width: 767px) {
            .pricing-grid-moderne {
                grid-template-columns: 1fr !important;
                gap: 18px;
                max-width: 440px;
            }
            .pricing-card-moderne {
                padding: 24px 18px;
                border-radius: 16px;
            }
            .pricing-price-moderne {
                font-size: clamp(1.5rem, 5vw, 2rem);
            }
            .pricing-duration-moderne {
                font-size: 1.25rem;
            }
            .pricing-format-features li {
                font-size: 0.8rem;
                padding: 5px 10px;
            }
        }
        @media (max-width: 480px) {
            .pricing-grid-moderne {
                max-width: 100%;
            }
            .pricing-card-moderne {
                padding: 20px 14px;
            }
            .pricing-price-moderne {
                font-size: 1.5rem;
            }
            .pricing-btn-moderne {
                padding: 12px 14px;
                font-size: 0.88rem;
            }
            .pricing-ribbon-badge {
                right: -40px;
                top: 14px;
                font-size: 0.62rem;
                padding: 4px 38px;
            }
        }

        /* ============================================
           CTA SECTION
           ============================================ */
        .cta-section-moderne {
            background: var(--white);
            border-top: 1px solid var(--gray-100);
            text-align: center;
        }
        .cta-section-moderne .section-title-big {
            max-width: 700px;
            margin: 0 auto 20px;
        }
        .cta-section-moderne .section-subtitle {
            max-width: 600px;
            margin: 0 auto 40px;
        }

        /* ============================================
           FOOTER MODERNE
           ============================================ */
        .footer-moderne {
            background: var(--blue);
            padding-top: 80px;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 50px;
            padding-bottom: 60px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .footer-brand-moderne img {
            height: 50px;
            margin-bottom: 20px;
            filter: brightness(0) invert(1);
            opacity: 0.9;
        }
        .footer-brand-moderne p {
            color: rgba(255,255,255,0.65);
            font-size: 0.92rem;
            line-height: 1.8;
            margin-bottom: 24px;
        }
        .footer-social-moderne {
            display: flex;
            gap: 10px;
        }
        .footer-social-moderne a {
            width: 40px; height: 40px;
            border-radius: 10px;
            background: rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .footer-social-moderne a:hover {
            background: var(--orange);
            color: white;
            transform: translateY(-3px);
        }
        .footer-col-title {
            font-size: 1rem;
            font-weight: 700;
            color: white;
            margin-bottom: 24px;
            padding-bottom: 12px;
            border-bottom: 2px solid var(--orange);
            display: inline-block;
        }
        .footer-links-moderne {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .footer-links-moderne a {
            color: rgba(255,255,255,0.65);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .footer-links-moderne a:hover {
            color: var(--orange);
            transform: translateX(4px);
        }
        .footer-links-moderne a::before {
            content: '›';
            color: var(--orange);
            font-weight: 700;
            font-size: 1.2rem;
        }
        .footer-contact-moderne {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        .footer-contact-item-moderne {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: rgba(255,255,255,0.65);
            font-size: 0.9rem;
        }
        .footer-contact-item-moderne i {
            color: var(--orange);
            margin-top: 4px;
            font-size: 0.9rem;
        }
        .footer-bottom-moderne {
            padding: 24px 0;
            text-align: center;
        }
        .footer-bottom-moderne p {
            color: rgba(255,255,255,0.5);
            font-size: 0.88rem;
            margin: 0;
        }
        .footer-bottom-moderne a {
            color: var(--orange);
            text-decoration: none;
        }

        @media (max-width: 991px) {
            .footer-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 767px) {
            .footer-grid { grid-template-columns: 1fr; }
        }

        /* Back to Top */
        .back-to-top-moderne {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px; height: 50px;
            border-radius: 14px;
            background: var(--orange);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: var(--shadow-orange);
            transition: all 0.4s ease;
            z-index: 999;
            text-decoration: none;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
        }
        .back-to-top-moderne.visible {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .back-to-top-moderne:hover {
            transform: translateY(-5px) scale(1.05);
            background: var(--orange-dark);
        }

        /* ============================================
           ANIMATIONS
           ============================================ */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .animate-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }


        /* Responsive global */
        @media (max-width: 767px) {
            .section-padding { padding: 60px 0; }
            .hero-page { min-height: auto; padding: 60px 0; }
        }

        /* User select none */
        body {
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        /* ============================================
           MODAL D'INSCRIPTION
           ============================================ */
        .modal-inscription-overlay {
            position: fixed;
            inset: 0;
            background: rgba(10, 22, 40, 0.6);
            backdrop-filter: blur(8px);
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        .modal-inscription-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        .modal-inscription {
            background: var(--white);
            border-radius: 24px;
            width: 100%;
            max-width: 700px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            box-shadow: var(--shadow-xl);
            transform: translateY(30px) scale(0.95);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .modal-inscription-overlay.active .modal-inscription {
            transform: translateY(0) scale(1);
        }
        .modal-close {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: var(--gray-100);
            border: none;
            color: var(--gray-600);
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }
        .modal-close:hover {
            background: var(--orange);
            color: white;
            transform: rotate(90deg);
        }
        .modal-header {
            text-align: center;
            padding: 40px 30px 20px;
            border-bottom: 1px solid var(--gray-100);
        }
        .modal-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--orange), var(--orange-light));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 1.8rem;
            color: white;
            box-shadow: var(--shadow-orange);
        }
        .modal-header h3 {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--blue);
            margin-bottom: 6px;
        }
        .modal-header p {
            font-size: 0.9rem;
            color: var(--gray-600);
            margin: 0;
        }
        .modal-section {
            padding: 24px 30px;
            border-bottom: 1px solid var(--gray-100);
        }
        .modal-section:last-of-type {
            border-bottom: none;
        }
        .modal-section h4 {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--blue);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .modal-section h4 i {
            color: var(--orange);
            font-size: 1rem;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        .form-group {
            margin-bottom: 16px;
        }
        .form-group:last-child {
            margin-bottom: 0;
        }
        .form-group label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 6px;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group input[type="number"],
        .form-group input[type="date"],
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            font-family: 'Nunito', sans-serif;
            font-size: 0.9rem;
            color: var(--gray-800);
            transition: all 0.2s ease;
            background: var(--white);
        }
        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--orange);
            box-shadow: 0 0 0 4px rgba(255, 107, 53, 0.1);
        }
        .form-group input::placeholder {
            color: var(--gray-400);
        }
        .form-group input[readonly] {
            background: var(--gray-50);
            color: var(--orange);
            font-weight: 700;
        }
        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .radio-label {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--gray-800);
            transition: all 0.2s ease;
        }
        .radio-label:hover {
            border-color: var(--orange-light);
        }
        .radio-label input[type="radio"] {
            accent-color: var(--orange);
            width: 16px;
            height: 16px;
        }
        .radio-label:has(input:checked) {
            border-color: var(--orange);
            background: rgba(255, 107, 53, 0.05);
            color: var(--orange);
        }
        .checkbox-days {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .day-checkbox {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 8px 12px;
            border: 2px solid var(--gray-200);
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--gray-800);
            transition: all 0.2s ease;
        }
        .day-checkbox:hover {
            border-color: var(--orange-light);
        }
        .day-checkbox input[type="checkbox"] {
            accent-color: var(--orange);
            width: 16px;
            height: 16px;
        }
        .day-checkbox:has(input:checked) {
            border-color: var(--orange);
            background: rgba(255, 107, 53, 0.05);
            color: var(--orange);
        }
        .frais-reservation {
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.08), rgba(255, 107, 53, 0.03));
            border: 2px solid rgba(255, 107, 53, 0.2);
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 16px;
        }
        .checkbox-frais {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: default;
        }
        .checkbox-frais input {
            accent-color: var(--orange);
            width: 20px;
            height: 20px;
        }
        .checkbox-frais span {
            font-size: 0.95rem;
            color: var(--orange);
        }
        .frais-desc {
            font-size: 0.82rem;
            color: var(--gray-600);
            margin: 8px 0 0 30px;
            line-height: 1.5;
        }
        .recap-section {
            background: var(--gray-50);
        }
        .recap-box {
            background: var(--white);
            border-radius: 12px;
            padding: 16px;
            border: 1px solid var(--gray-200);
        }
        .recap-line {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid var(--gray-100);
            font-size: 0.9rem;
        }
        .recap-line:last-child {
            border-bottom: none;
        }
        .recap-line span {
            color: var(--gray-600);
        }
        .recap-line strong {
            color: var(--blue);
            font-weight: 700;
        }
        .recap-line.highlight {
            background: rgba(255, 107, 53, 0.05);
            margin: 0 -16px;
            padding: 12px 16px;
            border-bottom: none;
        }
        .recap-line.highlight span,
        .recap-line.highlight strong {
            color: var(--orange);
        }
        .status-badge {
            background: var(--gray-200);
            color: var(--gray-600);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .info-importante {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 16px;
            padding: 12px;
            background: rgba(59, 130, 246, 0.05);
            border-radius: 10px;
            border: 1px solid rgba(59, 130, 246, 0.15);
        }
        .info-importante i {
            color: var(--blue-accent);
            margin-top: 2px;
        }
        .info-importante p {
            font-size: 0.82rem;
            color: var(--gray-600);
            margin: 0;
            line-height: 1.5;
        }
        .btn-confirm-inscription {
            width: calc(100% - 60px);
            margin: 0 30px 30px;
            padding: 16px 24px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--orange), var(--orange-light));
            color: white;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: var(--shadow-orange);
            transition: all 0.3s ease;
        }
        .btn-confirm-inscription:hover {
            background: linear-gradient(135deg, var(--orange-dark), var(--orange));
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(255, 107, 53, 0.4);
        }
        .modal-success {
            text-align: center;
            padding: 60px 30px;
        }
        .modal-success-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #22c55e, #16a34a);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2.5rem;
            color: white;
            animation: scaleIn 0.5s ease;
        }
        @keyframes scaleIn {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }
        .modal-success h3 {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--blue);
            margin-bottom: 10px;
        }
        .modal-success p {
            font-size: 1rem;
            color: var(--gray-600);
            margin-bottom: 24px;
        }
        .btn-success-close {
            padding: 12px 32px;
            border-radius: 10px;
            background: var(--orange);
            color: white;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .btn-success-close:hover {
            background: var(--orange-dark);
        }
        @media (max-width: 767px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            .modal-inscription {
                max-height: 95vh;
                border-radius: 16px;
            }
            .modal-section {
                padding: 20px;
            }
            .checkbox-days {
                gap: 6px;
            }
            .day-checkbox {
                padding: 6px 10px;
                font-size: 0.8rem;
            }
            .btn-confirm-inscription {
                width: calc(100% - 40px);
                margin: 0 20px 20px;
            }
        }

        /* ============================================
           ENHANCED RESPONSIVE STYLES (ALL SCREENS)
           ============================================ */
        html, body {
            overflow-x: hidden !important;
            max-width: 100vw;
            width: 100%;
        }
        *, *::before, *::after {
            box-sizing: border-box;
        }
        img {
            max-width: 100%;
            height: auto;
        }

        /* Hero Responsive */
        .hero-info-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 50px;
            padding: 8px 20px;
            margin-bottom: 24px;
            max-width: 100%;
            box-sizing: border-box;
        }
        .hero-rappel {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: rgba(255,255,255,0.85);
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .hero-rappel:hover {
            color: white;
        }

        @media (max-width: 991px) {
            .hero-page {
                min-height: auto;
                padding: 50px 0 60px;
            }
            .hero-page-content {
                padding: 20px 0 30px;
                text-align: center;
            }
            .hero-page-title {
                font-size: clamp(1.8rem, 5.5vw, 2.8rem);
                margin: 0 auto 16px;
                word-break: break-word;
            }
            .hero-page-subtitle {
                margin: 0 auto 24px;
                font-size: 1rem;
            }
            .hero-page-buttons {
                justify-content: center;
            }
            .hero-rappel {
                justify-content: center;
                margin: 0 auto;
            }
        }

        @media (max-width: 575px) {
            .hero-info-badge {
                padding: 8px 14px;
                font-size: 0.82rem;
                border-radius: 20px;
                text-align: center;
                justify-content: center;
                flex-wrap: wrap;
                gap: 6px;
            }
            .hero-info-badge span {
                font-size: 0.82rem !important;
            }
            .hero-page-buttons {
                flex-direction: column;
                width: 100%;
                gap: 10px;
            }
            .hero-page-buttons .btn-hero-nouveau {
                width: 100%;
                justify-content: center;
            }
            .section-padding {
                padding: 50px 0;
            }
            .container {
                padding-left: 16px;
                padding-right: 16px;
            }
        }

        /* Age Tabs & Badges Responsive */
        .age-group-badge {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: linear-gradient(135deg, var(--blue), var(--blue-light));
            color: white;
            padding: 14px 26px;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            max-width: 100%;
            box-sizing: border-box;
        }

        @media (max-width: 767px) {
            .age-tabs-container {
                margin-bottom: 28px;
                padding: 0 4px;
            }
            .age-tabs {
                display: flex;
                flex-direction: column;
                width: 100%;
                gap: 8px;
                padding: 6px;
                border-radius: 14px;
            }
            .age-tab {
                width: 100%;
                justify-content: center;
                padding: 12px 16px;
                font-size: 0.9rem;
                border-radius: 10px;
            }
            .age-group-badge {
                padding: 12px 18px;
                border-radius: 12px;
                width: 100%;
                max-width: 380px;
                justify-content: center;
            }
            .workshops-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .workshop-body {
                padding: 20px 16px;
            }
            .workshop-meta-item span {
                word-break: break-word;
                overflow-wrap: break-word;
            }
        }

        /* Modal Responsiveness */
        @media (max-width: 575px) {
            .modal-inscription-overlay {
                padding: 8px;
            }
            .modal-inscription {
                max-height: 94vh;
                border-radius: 16px;
            }
            .modal-header {
                padding: 24px 16px 16px;
            }
            .modal-icon {
                width: 54px;
                height: 54px;
                font-size: 1.35rem;
                margin-bottom: 12px;
            }
            .modal-section {
                padding: 16px;
            }
            .radio-group {
                gap: 6px;
            }
            .radio-label {
                padding: 6px 10px;
                font-size: 0.8rem;
            }
            .btn-confirm-inscription {
                width: calc(100% - 32px);
                margin: 0 16px 20px;
                padding: 13px 18px;
                font-size: 0.92rem;
            }
        }
    </style>
</head>

<body>
@include('partials.header')

<!-- ============================================
     HERO - LES PETITS BILINGUES
     ============================================ -->
<section class="hero-page">
    <div class="container">
        <div class="hero-page-grid">
            <div class="hero-page-content">
                <div class="hero-page-label"><i class="fas fa-language"></i> Extrascolaire</div>
                <h1 class="hero-page-title">Les Petits Bilingues de <span class="highlight-orange">MONPROFCHEZMOI</span></h1>
                <p class="hero-page-subtitle">Apprenez ! Pratiquez ! Aidez votre enfant à parler anglais couramment grâce à nos ateliers immersifs et ludiques conçus pour chaque tranche d'âge.</p>

                <div class="hero-info-badge" style="margin-bottom:28px;">
                    <i class="fas fa-users" style="color:var(--orange);"></i>
                    <span style="color:rgba(255,255,255,0.9);font-size:0.92rem;font-weight:700;">De 4 à 16 ans | Groupes de 3 à 8 enfants</span>
                </div>

                <div class="hero-page-buttons">
                    <a href="#ateliers" class="btn-hero-nouveau btn-orange"><i class="fas fa-book-open"></i> Découvrir les ateliers</a>
                    <a href="#tarifs" onclick="scrollToTarifs(); return false;" class="btn-hero-nouveau btn-outline"><i class="fas fa-tag"></i> Voir les tarifs</a>
                </div>

                <a href="tel:+2250153751544" class="hero-rappel">
                    <i class="fas fa-phone-alt" style="width:40px;height:40px;border-radius:50%;background:rgba(255,107,53,0.2);display:flex;align-items:center;justify-content:center;color:var(--orange);font-size:1rem;flex-shrink:0;"></i>
                    <span>Être rappelé gratuitement</span>
                </a>
            </div>

            <div class="hero-page-image d-none d-lg-block">
                <img src="asset/img/petitseul.jpg" alt="Les Petits Bilingues">
                <div class="hero-badge-float"><i class="fas fa-check-circle"></i> 500+ enfants accompagnés</div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     ATELIERS PAR AGE
     ============================================ -->
<section id="ateliers" class="tabs-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Nos ateliers</div>
            <h2 class="section-title-big">Des programmes adaptés à <span style="color: var(--orange);">chaque âge</span></h2>
            <p class="section-subtitle">Des activités en petits groupes de 3 à 8 enfants, adaptées à chaque âge, pour apprendre l'anglais naturellement, en jouant, en échangeant et en vivant des expériences en anglais.</p>
        </div>

        <!-- Tabs -->
        <div class="age-tabs-container animate-scroll">
            <ul class="age-tabs">
                <li class="age-tab active" id="tab-g1" onclick="showAge('groupe-1', this)"><i class="fas fa-child"></i> Groupe 1 — 4 à 6 ans</li>
                <li class="age-tab" id="tab-g2" onclick="showAge('groupe-2', this)"><i class="fas fa-star"></i> Groupe 2 — 7 à 10 ans</li>
                <li class="age-tab" id="tab-g3" onclick="showAge('groupe-3', this)"><i class="fas fa-user-graduate"></i> Groupe 3 — 11 à 16 ans</li>
            </ul>
        </div>

        <!-- GROUPE 1 — 4 à 6 ans -->
        <section id="groupe-1" class="age-section active">
            <div style="text-align:center;margin-bottom:32px;">
                <div class="age-group-badge">
                    <span style="font-size:1.8rem;">🐣</span>
                    <div style="text-align:left;">
                        <div style="font-weight:800;font-size:1.1rem;">Groupe 1 — 4 à 6 ans</div>
                        <div style="font-size:0.88rem;opacity:0.85;">Little English Explorers</div>
                    </div>
                </div>
            </div>
            <div class="workshops-grid">
                <!-- Hebdomadaire G1 -->
                <div class="workshop-card-moderne animate-scroll">
                    <div class="workshop-image-wrap">
                        <img src="asset/img/hebdopetit.jpg" alt="Atelier hebdomadaire petits" class="workshop-image">
                        <div class="workshop-badge">Hebdo</div>
                    </div>
                    <div class="workshop-body">
                        <h4>Atelier Hebdomadaire — 1h</h4>
                        <div class="workshop-meta">
                            <div class="workshop-meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                <div><strong>Jours & Rythme</strong><span>Mercredi ou samedi • 1h par semaine</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-bullseye"></i>
                                <div><strong>Objectif</strong><span>Découvrir l'anglais en douceur et poser des bases solides grâce à des activités courtes et ludiques.</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-list-ul"></i>
                                <div><strong>Au programme</strong><span>Chansons & comptines • Histoires • Jeux éducatifs • Ateliers créatifs • Premiers mots du quotidien</span></div>
                            </div>
                        </div>

                        <!-- Formules Hebdomadaire G1 -->
                        <div class="workshop-pricing-zone">
                            <div class="workshop-pricing-title">
                                <span><i class="fas fa-tags"></i> Formules Hebdo</span>
                                <span class="workshop-pricing-hint">1h / semaine</span>
                            </div>
                            <div class="workshop-formula-list">
                                <div class="workshop-formula-card" onclick="openInscriptionModal('Petits Bilingues - Groupe 1 (4-6 ans) - Hebdomadaire - 1 mois', '40000', '1 mois', 'Groupe 1 — 4 à 6 ans — Little English Explorers');">
                                    <div class="formula-info">
                                        <span class="formula-name">1 mois</span>
                                        <span class="formula-sub">Sans engagement</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">40 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 1 (4-6 ans) - Hebdomadaire - 1 mois', '40000', '1 mois', 'Groupe 1 — 4 à 6 ans — Little English Explorers');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="workshop-formula-card" onclick="openInscriptionModal('Petits Bilingues - Groupe 1 (4-6 ans) - Hebdomadaire - 6 mois', '210000', '6 mois', 'Groupe 1 — 4 à 6 ans — Little English Explorers');">
                                    <div class="formula-info">
                                        <span class="formula-name">6 mois</span>
                                        <span class="formula-sub">Soit 210 000 FCFA</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">35 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 1 (4-6 ans) - Hebdomadaire - 6 mois', '210000', '6 mois', 'Groupe 1 — 4 à 6 ans — Little English Explorers');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="workshop-formula-card featured" onclick="openInscriptionModal('Petits Bilingues - Groupe 1 (4-6 ans) - Hebdomadaire - 12 mois', '330000', '12 mois dont 1 mois offert', 'Groupe 1 — 4 à 6 ans — Little English Explorers');">
                                    <span class="formula-badge-star"><i class="fas fa-gift"></i> 1 mois offert !</span>
                                    <div class="formula-info">
                                        <span class="formula-name">12 mois</span>
                                        <span class="formula-sub">Soit 330 000 FCFA</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">30 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose btn-featured" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 1 (4-6 ans) - Hebdomadaire - 12 mois', '330000', '12 mois dont 1 mois offert', 'Groupe 1 — 4 à 6 ans — Little English Explorers');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Immersif G1 -->
                <div class="workshop-card-moderne animate-scroll">
                    <div class="workshop-image-wrap">
                        <img src="asset/img/yoga.jpg" alt="Atelier immersif" class="workshop-image">
                        <div class="workshop-badge">Immersif</div>
                    </div>
                    <div class="workshop-body">
                        <h4>Atelier Immersif — 3h</h4>
                        <div class="workshop-meta">
                            <div class="workshop-meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                <div><strong>Jours & Rythme</strong><span>Mercredi ou samedi • 3h par semaine</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-bullseye"></i>
                                <div><strong>Objectif</strong><span>Bain linguistique immersif où l'enfant apprend à comprendre et s'exprimer naturellement à l'oral.</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-list-ul"></i>
                                <div><strong>Au programme</strong><span>Jeux interactifs, contes vivants, motricité, chansons et petites missions orales en anglais.</span></div>
                            </div>
                        </div>

                        <!-- Formules Immersif G1 -->
                        <div class="workshop-pricing-zone">
                            <div class="workshop-pricing-title">
                                <span><i class="fas fa-water"></i> Formules Immersif</span>
                                <span class="workshop-pricing-hint">3h / semaine</span>
                            </div>
                            <div class="workshop-formula-list">
                                <div class="workshop-formula-card" onclick="openInscriptionModal('Petits Bilingues - Groupe 1 (4-6 ans) - Immersif - 1 mois', '45000', '1 mois', 'Groupe 1 — 4 à 6 ans — Little English Explorers');">
                                    <div class="formula-info">
                                        <span class="formula-name">1 mois</span>
                                        <span class="formula-sub">Sans engagement</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">45 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 1 (4-6 ans) - Immersif - 1 mois', '45000', '1 mois', 'Groupe 1 — 4 à 6 ans — Little English Explorers');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="workshop-formula-card" onclick="openInscriptionModal('Petits Bilingues - Groupe 1 (4-6 ans) - Immersif - 6 mois', '240000', '6 mois', 'Groupe 1 — 4 à 6 ans — Little English Explorers');">
                                    <div class="formula-info">
                                        <span class="formula-name">6 mois</span>
                                        <span class="formula-sub">Soit 240 000 FCFA</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">40 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 1 (4-6 ans) - Immersif - 6 mois', '240000', '6 mois', 'Groupe 1 — 4 à 6 ans — Little English Explorers');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="workshop-formula-card featured" onclick="openInscriptionModal('Petits Bilingues - Groupe 1 (4-6 ans) - Immersif - 12 mois', '385000', '12 mois dont 1 mois offert', 'Groupe 1 — 4 à 6 ans — Little English Explorers');">
                                    <span class="formula-badge-star"><i class="fas fa-gift"></i> 1 mois offert !</span>
                                    <div class="formula-info">
                                        <span class="formula-name">12 mois</span>
                                        <span class="formula-sub">Soit 385 000 FCFA</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">35 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose btn-featured" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 1 (4-6 ans) - Immersif - 12 mois', '385000', '12 mois dont 1 mois offert', 'Groupe 1 — 4 à 6 ans — Little English Explorers');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stage G1 -->
                <div class="workshop-card-moderne animate-scroll">
                    <div class="workshop-image-wrap">
                        <img src="asset/img/petitseul.jpg" alt="Stage de vacances" class="workshop-image">
                        <div class="workshop-badge">Stage</div>
                    </div>
                    <div class="workshop-body">
                        <h4>Stages de Vacances — 5 × 3h</h4>
                        <div class="workshop-meta">
                            <div class="workshop-meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                <div><strong>Période</strong><span>5 demi-journées de 3h pendant les vacances scolaires</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-bullseye"></i>
                                <div><strong>Objectif</strong><span>Pratique intensive de l'anglais autour d'un grand projet thématique captivant par semaine.</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-tags"></i>
                                <div><strong>Thèmes populaires</strong><span>Pirate Adventure • Movie Makers • Around the World • Space Mission</span></div>
                            </div>
                        </div>

                        <!-- Formule Stage G1 -->
                        <div class="workshop-pricing-zone">
                            <div class="workshop-pricing-title">
                                <span><i class="fas fa-sun"></i> Formule Vacances</span>
                                <span class="workshop-pricing-hint">Session 5 jours</span>
                            </div>
                            <div class="stage-single-card" onclick="openInscriptionModal('Petits Bilingues - Groupe 1 (4-6 ans) - Stage vacances', '45000', 'Stage 5 × 3h', 'Groupe 1 — 4 à 6 ans — Little English Explorers');">
                                <div class="stage-single-header">
                                    <div class="stage-single-badge"><i class="fas fa-calendar-check"></i> 5 demi-journées (15h)</div>
                                    <div class="stage-single-title">Stage Intensif Vacances</div>
                                    <div class="stage-single-desc">Immersion ludique et projet final présenté aux parents en fin de semaine.</div>
                                </div>
                                <div class="stage-single-price-box">
                                    <div class="stage-price-amount">45 000 <small>FCFA</small></div>
                                    <div class="stage-price-note">Tarif tout compris par stage</div>
                                </div>
                                <button type="button" class="btn-stage-choose" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 1 (4-6 ans) - Stage vacances', '45000', 'Stage 5 × 3h', 'Groupe 1 — 4 à 6 ans — Little English Explorers');">
                                    <i class="fas fa-calendar-plus"></i> Réserver cette formule
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- GROUPE 2 — 7 à 10 ans -->
        <section id="groupe-2" class="age-section">
            <div style="text-align:center;margin-bottom:32px;">
                <div class="age-group-badge">
                    <span style="font-size:1.8rem;">⭐</span>
                    <div style="text-align:left;">
                        <div style="font-weight:800;font-size:1.1rem;">Groupe 2 — 7 à 10 ans</div>
                        <div style="font-size:0.88rem;opacity:0.85;">English Adventurers</div>
                    </div>
                </div>
            </div>
            <div class="workshops-grid">
                <!-- Hebdomadaire G2 -->
                <div class="workshop-card-moderne animate-scroll">
                    <div class="workshop-image-wrap">
                        <img src="asset/img/joueseul.jpg" alt="Atelier hebdomadaire" class="workshop-image">
                        <div class="workshop-badge">Hebdo</div>
                    </div>
                    <div class="workshop-body">
                        <h4>Atelier Hebdomadaire — 1h30</h4>
                        <div class="workshop-meta">
                            <div class="workshop-meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                <div><strong>Jours & Rythme</strong><span>Mercredi ou samedi • 1h30 par semaine</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-bullseye"></i>
                                <div><strong>Objectif</strong><span>Développer l'expression et la spontanéité orale à travers l'interaction et le jeu collectif.</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-list-ul"></i>
                                <div><strong>Au programme</strong><span>Jeux de rôle • Défis en équipe • Jeux de société • Conversations guidées • Énigmes</span></div>
                            </div>
                        </div>

                        <!-- Formules Hebdomadaire G2 -->
                        <div class="workshop-pricing-zone">
                            <div class="workshop-pricing-title">
                                <span><i class="fas fa-tags"></i> Formules Hebdo</span>
                                <span class="workshop-pricing-hint">1h30 / semaine</span>
                            </div>
                            <div class="workshop-formula-list">
                                <div class="workshop-formula-card" onclick="openInscriptionModal('Petits Bilingues - Groupe 2 (7-10 ans) - Hebdomadaire - 1 mois', '45000', '1 mois', 'Groupe 2 — 7 à 10 ans — English Adventurers');">
                                    <div class="formula-info">
                                        <span class="formula-name">1 mois</span>
                                        <span class="formula-sub">Sans engagement</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">45 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 2 (7-10 ans) - Hebdomadaire - 1 mois', '45000', '1 mois', 'Groupe 2 — 7 à 10 ans — English Adventurers');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="workshop-formula-card" onclick="openInscriptionModal('Petits Bilingues - Groupe 2 (7-10 ans) - Hebdomadaire - 6 mois', '240000', '6 mois', 'Groupe 2 — 7 à 10 ans — English Adventurers');">
                                    <div class="formula-info">
                                        <span class="formula-name">6 mois</span>
                                        <span class="formula-sub">Soit 240 000 FCFA</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">40 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 2 (7-10 ans) - Hebdomadaire - 6 mois', '240000', '6 mois', 'Groupe 2 — 7 à 10 ans — English Adventurers');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="workshop-formula-card featured" onclick="openInscriptionModal('Petits Bilingues - Groupe 2 (7-10 ans) - Hebdomadaire - 12 mois', '420000', '12 mois', 'Groupe 2 — 7 à 10 ans — English Adventurers');">
                                    <span class="formula-badge-star"><i class="fas fa-star"></i> Meilleure offre</span>
                                    <div class="formula-info">
                                        <span class="formula-name">12 mois</span>
                                        <span class="formula-sub">Soit 420 000 FCFA</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">35 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose btn-featured" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 2 (7-10 ans) - Hebdomadaire - 12 mois', '420000', '12 mois', 'Groupe 2 — 7 à 10 ans — English Adventurers');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Immersif G2 -->
                <div class="workshop-card-moderne animate-scroll">
                    <div class="workshop-image-wrap">
                        <img src="asset/img/main.jpg" alt="Atelier immersif" class="workshop-image">
                        <div class="workshop-badge">Immersif</div>
                    </div>
                    <div class="workshop-body">
                        <h4>Atelier Immersif — 3h</h4>
                        <div class="workshop-meta">
                            <div class="workshop-meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                <div><strong>Jours & Rythme</strong><span>Mercredi ou samedi • 3h par semaine</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-bullseye"></i>
                                <div><strong>Objectif</strong><span>Plonger dans un univers 100% anglophone où l'enfant collabore, résout des énigmes et s'exprime avec assurance.</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-list-ul"></i>
                                <div><strong>Au programme</strong><span>Grands jeux collaboratifs, ateliers créatifs et scientifiques en anglais, défis oraux.</span></div>
                            </div>
                        </div>

                        <!-- Formules Immersif G2 -->
                        <div class="workshop-pricing-zone">
                            <div class="workshop-pricing-title">
                                <span><i class="fas fa-water"></i> Formules Immersif</span>
                                <span class="workshop-pricing-hint">3h / semaine</span>
                            </div>
                            <div class="workshop-formula-list">
                                <div class="workshop-formula-card" onclick="openInscriptionModal('Petits Bilingues - Groupe 2 (7-10 ans) - Immersif - 1 mois', '50000', '1 mois', 'Groupe 2 — 7 à 10 ans — English Adventurers');">
                                    <div class="formula-info">
                                        <span class="formula-name">1 mois</span>
                                        <span class="formula-sub">Sans engagement</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">50 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 2 (7-10 ans) - Immersif - 1 mois', '50000', '1 mois', 'Groupe 2 — 7 à 10 ans — English Adventurers');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="workshop-formula-card" onclick="openInscriptionModal('Petits Bilingues - Groupe 2 (7-10 ans) - Immersif - 6 mois', '270000', '6 mois', 'Groupe 2 — 7 à 10 ans — English Adventurers');">
                                    <div class="formula-info">
                                        <span class="formula-name">6 mois</span>
                                        <span class="formula-sub">Soit 270 000 FCFA</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">45 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 2 (7-10 ans) - Immersif - 6 mois', '270000', '6 mois', 'Groupe 2 — 7 à 10 ans — English Adventurers');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="workshop-formula-card featured" onclick="openInscriptionModal('Petits Bilingues - Groupe 2 (7-10 ans) - Immersif - 12 mois', '480000', '12 mois', 'Groupe 2 — 7 à 10 ans — English Adventurers');">
                                    <span class="formula-badge-star"><i class="fas fa-star"></i> Meilleure offre</span>
                                    <div class="formula-info">
                                        <span class="formula-name">12 mois</span>
                                        <span class="formula-sub">Soit 480 000 FCFA</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">40 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose btn-featured" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 2 (7-10 ans) - Immersif - 12 mois', '480000', '12 mois', 'Groupe 2 — 7 à 10 ans — English Adventurers');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stage G2 -->
                <div class="workshop-card-moderne animate-scroll">
                    <div class="workshop-image-wrap">
                        <img src="asset/img/activ.jpg" alt="Stage de vacances" class="workshop-image">
                        <div class="workshop-badge">Stage</div>
                    </div>
                    <div class="workshop-body">
                        <h4>Stages de Vacances — 5 × 3h</h4>
                        <div class="workshop-meta">
                            <div class="workshop-meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                <div><strong>Période</strong><span>5 demi-journées de 3h pendant les vacances scolaires</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-bullseye"></i>
                                <div><strong>Objectif</strong><span>Pratique intensive de l'anglais de manière dynamique tout en réalisant un projet collectif.</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-list-ul"></i>
                                <div><strong>Au programme</strong><span>Semaines à thème : mini-théâtre, journalisme junior, création d'univers fantastiques et challenges.</span></div>
                            </div>
                        </div>

                        <!-- Formule Stage G2 -->
                        <div class="workshop-pricing-zone">
                            <div class="workshop-pricing-title">
                                <span><i class="fas fa-sun"></i> Formule Vacances</span>
                                <span class="workshop-pricing-hint">Session 5 jours</span>
                            </div>
                            <div class="stage-single-card" onclick="openInscriptionModal('Petits Bilingues - Groupe 2 (7-10 ans) - Stage vacances', '50000', 'Stage 5 × 3h', 'Groupe 2 — 7 à 10 ans — English Adventurers');">
                                <div class="stage-single-header">
                                    <div class="stage-single-badge"><i class="fas fa-calendar-check"></i> 5 demi-journées (15h)</div>
                                    <div class="stage-single-title">Stage Intensif Vacances</div>
                                    <div class="stage-single-desc">Semaines thématiques dynamiques avec réalisation et présentation d'un projet collectif.</div>
                                </div>
                                <div class="stage-single-price-box">
                                    <div class="stage-price-amount">50 000 <small>FCFA</small></div>
                                    <div class="stage-price-note">Tarif tout compris par stage</div>
                                </div>
                                <button type="button" class="btn-stage-choose" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 2 (7-10 ans) - Stage vacances', '50000', 'Stage 5 × 3h', 'Groupe 2 — 7 à 10 ans — English Adventurers');">
                                    <i class="fas fa-calendar-plus"></i> Réserver cette formule
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- GROUPE 3 — 11 à 16 ans -->
        <section id="groupe-3" class="age-section">
            <div style="text-align:center;margin-bottom:32px;">
                <div class="age-group-badge">
                    <span style="font-size:1.8rem;">🎓</span>
                    <div style="text-align:left;">
                        <div style="font-weight:800;font-size:1.1rem;">Groupe 3 — 11 à 16 ans</div>
                        <div style="font-size:0.88rem;opacity:0.85;">English Challenge</div>
                    </div>
                </div>
            </div>
            <div class="workshops-grid">
                <!-- Hebdomadaire G3 -->
                <div class="workshop-card-moderne animate-scroll">
                    <div class="workshop-image-wrap">
                        <img src="asset/img/beber.jpeg" alt="Atelier hebdomadaire ados" class="workshop-image">
                        <div class="workshop-badge">Hebdo</div>
                    </div>
                    <div class="workshop-body">
                        <h4>Atelier Hebdomadaire — 1h30</h4>
                        <div class="workshop-meta">
                            <div class="workshop-meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                <div><strong>Jours & Rythme</strong><span>Mercredi ou samedi • 1h30 par semaine</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-bullseye"></i>
                                <div><strong>Objectif</strong><span>Donner confiance aux adolescents pour s'exprimer spontanément dans des situations réelles.</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-list-ul"></i>
                                <div><strong>Au programme</strong><span>Débats & discussions • Escape games • Médias & pop culture • Prises de parole en public</span></div>
                            </div>
                        </div>

                        <!-- Formules Hebdomadaire G3 -->
                        <div class="workshop-pricing-zone">
                            <div class="workshop-pricing-title">
                                <span><i class="fas fa-tags"></i> Formules Hebdo</span>
                                <span class="workshop-pricing-hint">1h30 / semaine</span>
                            </div>
                            <div class="workshop-formula-list">
                                <div class="workshop-formula-card" onclick="openInscriptionModal('Petits Bilingues - Groupe 3 (11-16 ans) - Hebdomadaire - 1 mois', '50000', '1 mois', 'Groupe 3 — 11 à 16 ans — English Challenge');">
                                    <div class="formula-info">
                                        <span class="formula-name">1 mois</span>
                                        <span class="formula-sub">Sans engagement</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">50 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 3 (11-16 ans) - Hebdomadaire - 1 mois', '50000', '1 mois', 'Groupe 3 — 11 à 16 ans — English Challenge');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="workshop-formula-card" onclick="openInscriptionModal('Petits Bilingues - Groupe 3 (11-16 ans) - Hebdomadaire - 6 mois', '270000', '6 mois', 'Groupe 3 — 11 à 16 ans — English Challenge');">
                                    <div class="formula-info">
                                        <span class="formula-name">6 mois</span>
                                        <span class="formula-sub">Soit 270 000 FCFA</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">45 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 3 (11-16 ans) - Hebdomadaire - 6 mois', '270000', '6 mois', 'Groupe 3 — 11 à 16 ans — English Challenge');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="workshop-formula-card featured" onclick="openInscriptionModal('Petits Bilingues - Groupe 3 (11-16 ans) - Hebdomadaire - 12 mois', '480000', '12 mois', 'Groupe 3 — 11 à 16 ans — English Challenge');">
                                    <span class="formula-badge-star"><i class="fas fa-star"></i> Meilleure offre</span>
                                    <div class="formula-info">
                                        <span class="formula-name">12 mois</span>
                                        <span class="formula-sub">Soit 480 000 FCFA</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">40 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose btn-featured" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 3 (11-16 ans) - Hebdomadaire - 12 mois', '480000', '12 mois', 'Groupe 3 — 11 à 16 ans — English Challenge');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Immersif G3 -->
                <div class="workshop-card-moderne animate-scroll">
                    <div class="workshop-image-wrap">
                        <img src="asset/img/azaz.jpeg" alt="Atelier immersif ados" class="workshop-image">
                        <div class="workshop-badge">Immersif</div>
                    </div>
                    <div class="workshop-body">
                        <h4>Atelier Immersif — 3h</h4>
                        <div class="workshop-meta">
                            <div class="workshop-meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                <div><strong>Jours & Rythme</strong><span>Mercredi ou samedi • 3h par semaine</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-bullseye"></i>
                                <div><strong>Objectif</strong><span>Expérience intensive en immersion pour faire de l'anglais un vrai réflexe de communication vivante.</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-list-ul"></i>
                                <div><strong>Projets concrets</strong><span>Vidéos & podcasts • Organisation de voyage • Simulations d'échanges • Challenges d'équipe</span></div>
                            </div>
                        </div>

                        <!-- Formules Immersif G3 -->
                        <div class="workshop-pricing-zone">
                            <div class="workshop-pricing-title">
                                <span><i class="fas fa-water"></i> Formules Immersif</span>
                                <span class="workshop-pricing-hint">3h / semaine</span>
                            </div>
                            <div class="workshop-formula-list">
                                <div class="workshop-formula-card" onclick="openInscriptionModal('Petits Bilingues - Groupe 3 (11-16 ans) - Immersif - 1 mois', '55000', '1 mois', 'Groupe 3 — 11 à 16 ans — English Challenge');">
                                    <div class="formula-info">
                                        <span class="formula-name">1 mois</span>
                                        <span class="formula-sub">Sans engagement</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">55 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 3 (11-16 ans) - Immersif - 1 mois', '55000', '1 mois', 'Groupe 3 — 11 à 16 ans — English Challenge');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="workshop-formula-card" onclick="openInscriptionModal('Petits Bilingues - Groupe 3 (11-16 ans) - Immersif - 6 mois', '300000', '6 mois', 'Groupe 3 — 11 à 16 ans — English Challenge');">
                                    <div class="formula-info">
                                        <span class="formula-name">6 mois</span>
                                        <span class="formula-sub">Soit 300 000 FCFA</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">50 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 3 (11-16 ans) - Immersif - 6 mois', '300000', '6 mois', 'Groupe 3 — 11 à 16 ans — English Challenge');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="workshop-formula-card featured" onclick="openInscriptionModal('Petits Bilingues - Groupe 3 (11-16 ans) - Immersif - 12 mois', '540000', '12 mois', 'Groupe 3 — 11 à 16 ans — English Challenge');">
                                    <span class="formula-badge-star"><i class="fas fa-star"></i> Meilleure offre</span>
                                    <div class="formula-info">
                                        <span class="formula-name">12 mois</span>
                                        <span class="formula-sub">Soit 540 000 FCFA</span>
                                    </div>
                                    <div class="formula-price-col">
                                        <span class="formula-price">45 000 <small>FCFA/mois</small></span>
                                    </div>
                                    <button type="button" class="btn-formula-choose btn-featured" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 3 (11-16 ans) - Immersif - 12 mois', '540000', '12 mois', 'Groupe 3 — 11 à 16 ans — English Challenge');">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stage G3 -->
                <div class="workshop-card-moderne animate-scroll">
                    <div class="workshop-image-wrap">
                        <img src="asset/img/beber.jpeg" alt="Stage de vacances ados" class="workshop-image">
                        <div class="workshop-badge">Stage</div>
                    </div>
                    <div class="workshop-body">
                        <h4>Stages de Vacances — 5 × 3h</h4>
                        <div class="workshop-meta">
                            <div class="workshop-meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                <div><strong>Période</strong><span>5 demi-journées de 3h pendant les vacances scolaires</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-bullseye"></i>
                                <div><strong>Objectif</strong><span>Stage immersif intensif pour franchir un palier décisif en fluidité, vocabulaire et aisance.</span></div>
                            </div>
                            <div class="workshop-meta-item">
                                <i class="fas fa-list-ul"></i>
                                <div><strong>Projet final</strong><span>Production d'un podcast, tournage vidéo ou challenge collectif présenté en fin de semaine.</span></div>
                            </div>
                        </div>

                        <!-- Formule Stage G3 -->
                        <div class="workshop-pricing-zone">
                            <div class="workshop-pricing-title">
                                <span><i class="fas fa-sun"></i> Formule Vacances</span>
                                <span class="workshop-pricing-hint">Session 5 jours</span>
                            </div>
                            <div class="stage-single-card" onclick="openInscriptionModal('Petits Bilingues - Groupe 3 (11-16 ans) - Stage vacances', '55000', 'Stage 5 × 3h', 'Groupe 3 — 11 à 16 ans — English Challenge');">
                                <div class="stage-single-header">
                                    <div class="stage-single-badge"><i class="fas fa-calendar-check"></i> 5 demi-journées (15h)</div>
                                    <div class="stage-single-title">Stage Intensif Vacances</div>
                                    <div class="stage-single-desc">Production de podcast, tournage vidéo et grands défis d'éloquence en anglais.</div>
                                </div>
                                <div class="stage-single-price-box">
                                    <div class="stage-price-amount">55 000 <small>FCFA</small></div>
                                    <div class="stage-price-note">Tarif tout compris par stage</div>
                                </div>
                                <button type="button" class="btn-stage-choose" onclick="event.stopPropagation(); openInscriptionModal('Petits Bilingues - Groupe 3 (11-16 ans) - Stage vacances', '55000', 'Stage 5 × 3h', 'Groupe 3 — 11 à 16 ans — English Challenge');">
                                    <i class="fas fa-calendar-plus"></i> Réserver cette formule
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

<!-- (Tarifs intégrés dans chaque onglet — section id="tarifs" conservée pour le scroll) -->
<div id="tarifs"></div>

<!-- ============================================
     POURQUOI LE BILINGUISME ?
     ============================================ -->
<section id="pourquoi-bilinguisme" class="intro-section section-padding">
    <div class="container">
        <div class="intro-layout">
            <div class="intro-content animate-scroll">
                <div class="section-label-orange">Pourquoi Les petits bilingues de Monprofchezmoi ?</div>
                <h2 class="section-title-big">Un atout précieux pour <span style="color: var(--orange);">l'avenir</span> de vos enfants</h2>
                <p>Offrir l'anglais dès le plus jeune âge stimule la curiosité intellectuelle de votre enfant, renforce sa flexibilité cognitive et lui donne une longueur d'avance déterminante pour son parcours scolaire et futur.</p>
                <ul class="benefits-list">
                    <li><i class="fas fa-brain"></i><span><strong>Développement cognitif</strong> — Renforce la concentration, la flexibilité mentale et la mémoire.</span></li>
                    <li><i class="fas fa-seedling"></i><span><strong>Facilité naturelle</strong> — Assimilation spontanée de la prononciation et des réflexes linguistiques.</span></li>
                    <li><i class="fas fa-globe-americas"></i><span><strong>Ouverture culturelle</strong> — Curiosité élargie, aisance relationnelle et ouverture sur le monde.</span></li>
                    <li><i class="fas fa-graduation-cap"></i><span><strong>Opportunités d'avenir</strong> — Un avantage compétitif majeur pour ses études et sa carrière professionnelle.</span></li>
                </ul>
            </div>

            <div class="intro-image-wrap animate-scroll">
                <img src="asset/img/yoga.jpg" alt="Enfants apprenant l'anglais">
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     CTA FINAL
     ============================================ -->
<section class="cta-section-moderne section-padding">
    <div class="container">
        <div class="animate-scroll">
            <div class="section-label-orange">Prêt à commencer ?</div>
            <h2 class="section-title-big">Donnez à votre enfant toutes les chances de <span style="color: var(--orange);">réussir</span></h2>
            <p class="section-subtitle">Inscrivez-le dès maintenant aux Petits Bilingues de MONPROFCHEZMOI et offrez-lui un avenir multilingue.</p>

            <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap; margin-top: 40px;">
                <a href="#" class="btn-hero-nouveau btn-orange" onclick="openInscriptionModal('Petits Bilingues - Demande d\'information', 'à définir', 'Demande d\'information'); return false;">
                    <i class="fas fa-paper-plane"></i> Ça m'intéresse
                </a>
                <a href="tel:+2250153751544" class="btn-hero-nouveau btn-outline" style="background: var(--blue); color: white; border: none;">
                    <i class="fas fa-phone-alt"></i> Nous appeler
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     MODAL D'INSCRIPTION
     ============================================ -->
<div class="modal-inscription-overlay" id="modalInscription">
    <div class="modal-inscription">
        <button class="modal-close" onclick="closeInscriptionModal()"><i class="fas fa-times"></i></button>

        <div class="modal-header">
            <div class="modal-icon"><i class="fas fa-clipboard-check"></i></div>
            <h3>Formulaire d'inscription</h3>
            <p>Remplissez ce formulaire, notre équipe vous contactera rapidement.</p>
        </div>

        <form id="formInscription" onsubmit="submitInscription(event)">
            <!-- Informations du participant -->
            <div class="modal-section">
                <h4><i class="fas fa-user"></i> Informations du participant</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label>Nom complet du parent *</label>
                        <input type="text" name="nom_parent" required placeholder="Ex: KOUAME Jean">
                    </div>
                    <div class="form-group">
                        <label>Nom complet de l'enfant *</label>
                        <input type="text" name="nom_enfant" required placeholder="Ex: KOUAME Marie">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Âge de l'enfant *</label>
                        <input type="number" name="age_enfant" required min="4" max="16" placeholder="Ex: 8">
                    </div>
                    <div class="form-group">
                        <label>Téléphone *</label>
                        <input type="tel" name="telephone" required placeholder="Ex: 01 53 75 15 44">
                    </div>
                </div>
                <div class="form-group">
                    <label>Email (optionnel)</label>
                    <input type="email" name="email" placeholder="Ex: contact@email.com">
                </div>
            </div>

            <!-- Formule choisie -->
            <div class="modal-section">
                <h4><i class="fas fa-bullseye"></i> Formule choisie</h4>
                <div class="form-group">
                    <label>Nom de la formule *</label>
                    <input type="text" name="activite" id="modalActivite" readonly>
                </div>
                <div class="form-group">
                    <label>Groupe</label>
                    <input type="text" name="groupe" id="modalGroupe" readonly>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Date de début souhaitée</label>
                        <input type="date" name="date_debut">
                    </div>
                    <div class="form-group">
                        <label>Lieu préféré *</label>
                        <div class="radio-group">
                            <label class="radio-label"><input type="radio" name="lieu" value="domicile" checked onchange="updateAvailableDays(this.value)"> <span>À domicile</span></label>
                            <label class="radio-label"><input type="radio" name="lieu" value="en_ligne" onchange="updateAvailableDays(this.value)"> <span>En ligne</span></label>
                            <label class="radio-label"><input type="radio" name="lieu" value="centre" onchange="updateAvailableDays(this.value)"> <span>Au centre</span></label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Disponibilités -->
            <div class="modal-section">
                <h4><i class="fas fa-clock"></i> Disponibilités</h4>
                <div class="form-group">
                    <label>Jours disponibles * <small id="joursHint" style="font-weight: 700; color: var(--orange); display: none; margin-left: 6px;">(Au centre : uniquement Mercredi et Samedi)</small></label>
                    <div class="checkbox-days">
                        <label class="day-checkbox" data-day="Lundi"><input type="checkbox" name="jours[]" value="Lundi"> <span>Lundi</span></label>
                        <label class="day-checkbox" data-day="Mardi"><input type="checkbox" name="jours[]" value="Mardi"> <span>Mardi</span></label>
                        <label class="day-checkbox" data-day="Mercredi"><input type="checkbox" name="jours[]" value="Mercredi"> <span>Mercredi</span></label>
                        <label class="day-checkbox" data-day="Jeudi"><input type="checkbox" name="jours[]" value="Jeudi"> <span>Jeudi</span></label>
                        <label class="day-checkbox" data-day="Vendredi"><input type="checkbox" name="jours[]" value="Vendredi"> <span>Vendredi</span></label>
                        <label class="day-checkbox" data-day="Samedi"><input type="checkbox" name="jours[]" value="Samedi"> <span>Samedi</span></label>
                        <label class="day-checkbox" data-day="Dimanche"><input type="checkbox" name="jours[]" value="Dimanche"> <span>Dimanche</span></label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Horaire préféré</label>
                    <input type="text" name="horaire" placeholder="Ex: 16h00 - 18h00">
                </div>
            </div>

            <!-- Paiement -->
            <div class="modal-section">
                <h4><i class="fas fa-credit-card"></i> Paiement</h4>

                <div class="frais-reservation">
                    <label class="checkbox-frais">
                        <input type="checkbox" checked disabled>
                        <span><strong>Frais de réservation obligatoires : 10 000 FCFA</strong></span>
                    </label>
                    <p class="frais-desc">Ces frais servent à réserver votre place. L'inscription est validée après paiement.</p>
                </div>

                <div class="form-group">
                    <label>Type de paiement *</label>
                    <div class="radio-group">
                        <label class="radio-label"><input type="radio" name="type_paiement" value="unique" checked> <span>Paiement unique</span></label>
                        <label class="radio-label"><input type="radio" name="type_paiement" value="seance"> <span>Par séance</span></label>
                        <label class="radio-label"><input type="radio" name="type_paiement" value="abonnement"> <span>Abonnement mensuel</span></label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Mode de paiement préféré *</label>
                    <div class="radio-group">
                        <label class="radio-label"><input type="radio" name="mode_paiement" value="mobile_money" checked> <span>Mobile Money</span></label>
                        <label class="radio-label"><input type="radio" name="mode_paiement" value="virement"> <span>Virement bancaire</span></label>
                    </div>
                </div>
            </div>

            <!-- Récapitulatif -->
            <div class="modal-section recap-section">
                <h4><i class="fas fa-receipt"></i> Récapitulatif</h4>
                <div class="recap-box">
                    <div class="recap-line">
                        <span>Formule choisie :</span>
                        <strong id="recapFormule">-</strong>
                    </div>
                    <div class="recap-line">
                        <span>Prix de la formule :</span>
                        <strong id="recapPrix">-</strong>
                    </div>
                    <div class="recap-line highlight">
                        <span>Frais de réservation (à payer maintenant) :</span>
                        <strong>10 000 FCFA</strong>
                    </div>
                    <div class="recap-line">
                        <span>Statut :</span>
                        <span class="status-badge">En attente de confirmation</span>
                    </div>
                </div>
                <div class="info-importante">
                    <i class="fas fa-info-circle"></i>
                    <p>Un message de confirmation vous sera envoyé après validation de votre inscription par notre équipe.</p>
                </div>
            </div>

            <!-- Conditions Générales de Vente -->
            <div class="modal-section cgv-section" style="padding: 16px 20px; background: #fff8f5; border: 1px solid #ffe2d1; border-radius: 12px; margin-bottom: 20px;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px; flex-wrap: wrap; gap: 8px;">
                    <span style="font-weight: 700; font-size: 13px; color: #1E3A5F; display: flex; align-items: center; gap: 8px;">
                        <i class="fas fa-file-pdf" style="color: #e53e3e; font-size: 18px;"></i> Conditions Générales de Vente - Activités Extrascolaires
                    </span>
                    <a href="{{ asset('asset/fichier/CGVAE.pdf') }}" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; gap: 6px; font-size: 12px; color: #FF6B35; font-weight: 700; text-decoration: none; padding: 5px 12px; border: 1.5px solid #FF6B35; border-radius: 20px; background: #fff; transition: all 0.2s ease;">
                        <i class="fas fa-external-link-alt"></i> Lire le PDF
                    </a>
                </div>
                <label style="display: flex; align-items: flex-start; gap: 10px; font-size: 13px; color: #374151; cursor: pointer; margin: 0; line-height: 1.4;">
                    <input type="checkbox" name="accept_cgv" required style="margin-top: 2px; accent-color: #FF6B35; width: 17px; height: 17px; cursor: pointer; flex-shrink: 0;">
                    <span>J'ai lu et j'accepte les <a href="{{ asset('asset/fichier/CGVAE.pdf') }}" target="_blank" rel="noopener noreferrer" style="color: #FF6B35; font-weight: 700; text-decoration: underline;">Conditions Générales de Vente (CGV)</a>.</span>
                </label>
            </div>

            <button type="submit" class="btn-confirm-inscription" id="btnConfirmInscription">
    <i class="fas fa-check-circle"></i> Confirmer l'inscription
</button>
        </form>
    </div>
</div>

<!-- ============================================
     FOOTER
     ============================================ -->
<footer id="contact" class="footer-moderne">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand-moderne">
                <img src="asset/img/logo.png" alt="Monprofchezmoi">
                <p>Leader de l'accompagnement éducatif en Côte d'Ivoire. Depuis 2019, nous accompagnons près de 500 familles chaque année avec une approche pédagogique personnalisée et innovante.</p>
                <div class="footer-social-moderne">
                    <a href="https://lc.cx/bI7TWa" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://lc.cx/bRCp37" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://lc.cx/apXwPN" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://youtube.com/@Monprofchezmoi" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div>
                <h4 class="footer-col-title">Nos Liens</h4>
                <div class="footer-links-moderne">
                    <a href="{{ url('/') }}">Accueil</a>
                    <a href="{{ url('/reponse') }}">Soutien scolaire</a>
                    <a href="{{ url('/formations') }}">Formations</a>
                    <a href="{{ url('/groupe') }}">DCG & DSCG</a>
                    <a href="{{ url('/coaching') }}">Extrascolaire</a>
                </div>
            </div>

            <div>
                <h4 class="footer-col-title">Populaires</h4>
                <div class="footer-links-moderne">
                    <a href="{{ url('/formations') }}">Formation Anglais</a>
                    <a href="{{ url('/musique') }}">Musique</a>
                    <a href="{{ url('/groupe') }}">DCG</a>
                    <a href="{{ url('/sportif') }}">Sport</a>
                    <a href="{{ url('/codage') }}">Codage</a>
                </div>
            </div>

            <div>
                <h4 class="footer-col-title">Contact</h4>
                <div class="footer-contact-moderne">
                    <div class="footer-contact-item-moderne">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Riviera 4 Synacassi 1, Abidjan, Côte d'Ivoire</span>
                    </div>
                    <div class="footer-contact-item-moderne">
                        <i class="fas fa-envelope"></i>
                        <span>info@monprofchezmoi-ci.com</span>
                    </div>
                    <div class="footer-contact-item-moderne">
                        <i class="fas fa-phone-alt"></i>
                        <span>+225 01 53 75 15 44</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom-moderne">
            <p>&copy; 2024 <a href="#">Monprofchezmoi-ci.com</a>. Tous droits réservés. Designed by <a href="#">FreeLance ADG</a></p>
        </div>
    </div>
</footer>

<!-- Back to Top -->
<a href="#" class="back-to-top-moderne" id="backToTop"><i class="fas fa-arrow-up"></i></a>

<!-- ============================================
     SCRIPTS
     ============================================ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Scroll Progress
window.addEventListener('scroll', function() {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const progress = document.getElementById('scrollProgress');
    if (progress) progress.style.width = (scrollTop / scrollHeight * 100) + '%';

    // Navbar
    const navbar = document.querySelector('.navbar-moderne');
    if (navbar) {
        if (window.scrollY > 50) navbar.classList.add('scrolled');
        else navbar.classList.remove('scrolled');
    }

    // Back to top
    const backToTop = document.getElementById('backToTop');
    if (backToTop) {
        if (window.scrollY > 500) backToTop.classList.add('visible');
        else backToTop.classList.remove('visible');
    }
});

// Spinner
window.addEventListener('load', function() {
    setTimeout(() => {
    }, 500);
});

// Mobile Mega Menu - CORRIGÉ
document.querySelectorAll('.nav-item-moderne').forEach(item => {
    const link = item.querySelector('.nav-link-moderne');
    const megaMenu = item.querySelector('.mega-menu-moderne');

    if (link && megaMenu) {
        link.addEventListener('click', function(e) {
            if (window.innerWidth < 992) {
                e.preventDefault();
                e.stopPropagation();

                // Ferme les autres menus ouverts
                document.querySelectorAll('.nav-item-moderne.active').forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                    }
                });

                // Toggle le menu actuel
                item.classList.toggle('active');
            }
        });
    }
});

// Ferme le menu mobile quand on clique sur un lien SANS mega-menu
document.querySelectorAll('.nav-menu-moderne .nav-link-moderne').forEach(link => {
    const parentItem = link.closest('.nav-item-moderne');
    const hasMegaMenu = parentItem && parentItem.querySelector('.mega-menu-moderne');

    if (!hasMegaMenu) {
        link.addEventListener('click', function() {
            if (window.innerWidth < 992) {
                const navbarCollapse = document.getElementById('navbarModerne');
                const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                if (bsCollapse) {
                    bsCollapse.hide();
                }
            }
        });
    }
});

// Ferme le menu mobile quand on clique sur un lien DANS le mega-menu
document.querySelectorAll('.mega-menu-moderne a').forEach(link => {
    link.addEventListener('click', function() {
        if (window.innerWidth < 992) {
            const navbarCollapse = document.getElementById('navbarModerne');
            const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
            if (bsCollapse) {
                bsCollapse.hide();
            }
        }
    });
});

// Scroll Animations
const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

document.querySelectorAll('.animate-scroll').forEach(el => observer.observe(el));

// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href !== '#') {
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                window.scrollTo({ top: target.offsetTop - 80, behavior: 'smooth' });
            }
        }
    });
});

// ========== DONNÉES TARIFAIRES ==========
const PRICING = {
    g1: {
        label: 'Groupe 1 (4-6 ans)',
        groupe_name: 'Groupe 1 — 4 à 6 ans — Little English Explorers',
        hebdo: { m1: 40000, m6: 35000, m12: 30000, duree: '1h/semaine' },
        immersif: { m1: 45000, m6: 40000, m12: 35000, duree: '3h' },
        stage: { prix: 45000 },
        offre12: true // 1 mois offert
    },
    g2: {
        label: 'Groupe 2 (7-10 ans)',
        groupe_name: 'Groupe 2 — 7 à 10 ans — English Adventurers',
        hebdo: { m1: 45000, m6: 40000, m12: 35000, duree: '1h30/semaine' },
        immersif: { m1: 50000, m6: 45000, m12: 40000, duree: '3h' },
        stage: { prix: 50000 },
        offre12: false
    },
    g3: {
        label: 'Groupe 3 (11-16 ans)',
        groupe_name: 'Groupe 3 — 11 à 16 ans — English Challenge',
        hebdo: { m1: 50000, m6: 45000, m12: 40000, duree: '1h30/semaine' },
        immersif: { m1: 55000, m6: 50000, m12: 45000, duree: '3h' },
        stage: { prix: 55000 },
        offre12: false
    }
};

function formatPrice(n) {
    return n.toLocaleString('fr-FR') + ' FCFA';
}

// Age Tabs
function showAge(ageId, clickedTab) {
    const allSections = document.querySelectorAll('.age-section');
    allSections.forEach(section => section.classList.remove('active'));

    const allTabs = document.querySelectorAll('.age-tab');
    allTabs.forEach(tab => tab.classList.remove('active'));

    const selectedSection = document.getElementById(ageId);
    if (selectedSection) selectedSection.classList.add('active');

    if (clickedTab) clickedTab.classList.add('active');
}

function scrollToTarifs() {
    const activeSection = document.querySelector('.age-section.active');
    const target = activeSection ? (activeSection.querySelector('.workshop-pricing-zone') || activeSection) : document.getElementById('ateliers');
    if (target) {
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

// ========== MODAL D'INSCRIPTION ==========
let currentFormule = '';
let currentPrix = '';
let currentGroupe = '';

function openInscriptionModal(formule, prix, detail, groupe) {
    currentFormule = formule;
    groupe = groupe || '';
    currentGroupe = groupe;
    if (prix === 'à définir') {
        currentPrix = 'à définir';
    } else {
        currentPrix = formatPrice(parseInt(prix)) + ' (' + detail + ')';
    }

    document.getElementById('modalActivite').value = formule;
    if (document.getElementById('modalGroupe')) document.getElementById('modalGroupe').value = groupe;
    document.getElementById('recapFormule').textContent = formule;
    document.getElementById('recapPrix').textContent = currentPrix;

    updateAvailableDays();

    document.getElementById('modalInscription').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeInscriptionModal() {
    document.getElementById('modalInscription').classList.remove('active');
    document.body.style.overflow = '';
    resetForm();
}

function resetForm() {
    document.getElementById('formInscription').reset();
    document.getElementById('modalActivite').value = currentFormule;
    if (document.getElementById('modalGroupe')) document.getElementById('modalGroupe').value = currentGroupe;
    document.getElementById('recapFormule').textContent = currentFormule;
    document.getElementById('recapPrix').textContent = currentPrix;
    updateAvailableDays('domicile');
}

function updateAvailableDays(lieu) {
    if (!lieu) {
        const checkedLieu = document.querySelector('input[name="lieu"]:checked');
        lieu = checkedLieu ? checkedLieu.value : 'domicile';
    }

    const dayLabels = document.querySelectorAll('.checkbox-days .day-checkbox');
    const hint = document.getElementById('joursHint');

    if (lieu === 'centre') {
        if (hint) hint.style.display = 'inline';
        dayLabels.forEach(label => {
            const cb = label.querySelector('input[name="jours[]"]');
            const day = label.getAttribute('data-day') || (cb ? cb.value : '');
            if (day === 'Mercredi' || day === 'Samedi') {
                label.style.display = '';
                if (cb) cb.disabled = false;
            } else {
                label.style.display = 'none';
                if (cb) {
                    cb.checked = false;
                    cb.disabled = true;
                }
            }
        });
    } else {
        if (hint) hint.style.display = 'none';
        dayLabels.forEach(label => {
            label.style.display = '';
            const cb = label.querySelector('input[name="jours[]"]');
            if (cb) cb.disabled = false;
        });
    }
}

function submitInscription(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    // Récupérer les jours cochés
    const jours = [];
    document.querySelectorAll('input[name="jours[]"]:checked').forEach(cb => {
        jours.push(cb.value);
    });

    // Ajouter les champs manquants
    formData.append('jours', JSON.stringify(jours));
    formData.append('formule', currentFormule);
    formData.append('prix_formule', currentPrix);
    formData.append('frais_reservation', '10000');

    // Désactiver le bouton pendant l'envoi
    const btn = document.getElementById('btnConfirmInscription');
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement...';
    }

    // Envoyer l'inscription en AJAX
    fetch('/inscription', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        },
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        if (result.success && result.token) {
            const paymentForm = document.createElement('form');
            paymentForm.method = 'POST';
            paymentForm.action = '/payment/initiate';

            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = document.querySelector('meta[name="csrf-token"]')?.content || '';

            const tokenInput = document.createElement('input');
            tokenInput.type = 'hidden';
            tokenInput.name = 'reservation_token';
            tokenInput.value = result.token;

            const typeInput = document.createElement('input');
            typeInput.type = 'hidden';
            typeInput.name = 'type';
            typeInput.value = 'inscription';

            paymentForm.appendChild(csrfInput);
            paymentForm.appendChild(tokenInput);
            paymentForm.appendChild(typeInput);

            document.body.appendChild(paymentForm);
            paymentForm.submit();

        } else {
            alert(result.message || 'Une erreur est survenue.');
            if (btn) {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-check-circle"></i> Confirmer l\'inscription';
            }
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        alert('Erreur de connexion. Veuillez réessayer.');
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-check-circle"></i> Confirmer l\'inscription';
        }
    });
}

function showSuccessMessage() {
    const modal = document.querySelector('.modal-inscription');
    const parentName = document.querySelector('input[name="nom_parent"]')?.value || '';
    const phone = document.querySelector('input[name="telephone"]')?.value || '';
    if (modal) {
        modal.innerHTML = `
            <div class="modal-success">
                <div class="modal-success-icon"><i class="fas fa-check"></i></div>
                <h3>Inscription envoyée !</h3>
                <p>Merci ${parentName}. Notre équipe vous contactera très prochainement au <strong>${phone}</strong> pour finaliser votre inscription.</p>
                <button class="btn-success-close" onclick="closeInscriptionModal()">Fermer</button>
            </div>
        `;
    }
}
document.addEventListener('DOMContentLoaded', function() {
    const modalInscription = document.getElementById('modalInscription');
    if (modalInscription) modalInscription.addEventListener('click', function(e) {
        if (e.target === this) closeInscriptionModal();
    });

    document.querySelectorAll('input[name="lieu"]').forEach(radio => {
        radio.addEventListener('change', function() {
            updateAvailableDays(this.value);
        });
    });
});
document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeInscriptionModal(); });

function redirectToContact(part) {
    window.location.href = `/contact?part=${part}`;
}
</script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>


