<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Monprofchezmoi-ci.com - Cours de Musique</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Cours de musique, piano, guitare, chant, solfège" name="keywords">
    <meta content="Cours de musique pour enfants et adultes - Piano, Guitare, Chant, Solfège" name="description">

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
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
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

        /* Mega Menu */
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

        @media (max-width: 991px) {
            .nav-menu-moderne { flex-direction: column; padding: 16px; }
            .nav-menu-moderne .nav-link-moderne { padding: 14px 16px; width: 100%; }
            .mega-menu-moderne {
                position: static; transform: none; min-width: auto;
                box-shadow: none; border: none; opacity: 1; visibility: visible;
                display: none; margin-top: 8px;
            }
            .nav-item-moderne.active .mega-menu-moderne { display: block; }
            .mega-body-moderne { grid-template-columns: 1fr; }
        }

        /* ============================================
           HERO - PAGE MUSIQUE
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
           INTRO MUSIQUE
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
        .intro-content p {
            color: var(--gray-600);
            line-height: 1.8;
            margin-bottom: 20px;
            font-size: 1.05rem;
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
           OBJECTIFS - CARDS
           ============================================ */
        .objectifs-section {
            background: var(--white);
        }
        .objectifs-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }
        .objectif-card-moderne {
            background: var(--white);
            border-radius: 20px;
            padding: 35px;
            box-shadow: var(--shadow-sm);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid var(--gray-100);
            position: relative;
            overflow: hidden;
        }
        .objectif-card-moderne::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--orange), var(--orange-light));
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }
        .objectif-card-moderne:hover::before {
            transform: scaleX(1);
        }
        .objectif-card-moderne:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
            border-color: transparent;
        }
        .objectif-icon {
            width: 60px; height: 60px;
            border-radius: 16px;
            background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: var(--orange);
            transition: all 0.4s ease;
        }
        .objectif-card-moderne:hover .objectif-icon {
            background: linear-gradient(135deg, var(--orange), var(--orange-light));
            color: white;
            transform: scale(1.1) rotate(-5deg);
            box-shadow: var(--shadow-orange);
        }
        .objectif-card-moderne h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--blue);
            margin-bottom: 16px;
        }
        .objectif-list-moderne {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .objectif-list-moderne li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid var(--gray-100);
            color: var(--gray-600);
            font-size: 0.95rem;
        }
        .objectif-list-moderne li:last-child {
            border-bottom: none;
        }
        .objectif-list-moderne li i {
            color: var(--orange);
            font-size: 1rem;
            margin-top: 3px;
        }

        @media (max-width: 767px) {
            .objectifs-grid { grid-template-columns: 1fr; }
        }

        /* ============================================
           INSTRUMENTS - GRID
           ============================================ */
        .instruments-section {
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
            position: relative;
            overflow: hidden;
        }
        .instruments-section::before {
            content: '';
            position: absolute;
            top: -100px; right: -100px;
            width: 300px; height: 300px;
            background: radial-gradient(circle, rgba(255,107,53,0.1), transparent 70%);
        }
        .instruments-section .section-title-big { color: white; }
        .instruments-section .section-subtitle { color: rgba(255,255,255,0.7); }
        .instruments-section .section-label-orange { color: var(--orange-light); }
        .instruments-section .section-label-orange::before { background: var(--orange-light); }

        .instruments-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        .instrument-card {
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            padding: 35px 24px;
            text-align: center;
            transition: all 0.4s ease;
        }
        .instrument-card:hover {
            background: rgba(255,255,255,0.12);
            transform: translateY(-8px);
            border-color: rgba(255,107,53,0.3);
        }
        .instrument-icon {
            width: 65px; height: 65px;
            border-radius: 18px;
            background: linear-gradient(135deg, var(--orange), var(--orange-light));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            font-size: 1.6rem;
            color: white;
            box-shadow: 0 10px 25px rgba(255,107,53,0.3);
            transition: all 0.4s ease;
        }
        .instrument-card:hover .instrument-icon {
            transform: rotate(10deg) scale(1.1);
        }
        .instrument-card h4 {
            font-size: 1.05rem;
            font-weight: 700;
            color: white;
            margin: 0;
        }

        @media (max-width: 991px) {
            .instruments-grid { grid-template-columns: repeat(2, 1fr); }
        }

        /* ============================================
           ORGANISATION
           ============================================ */
        .org-section {
            background: var(--cream);
        }
        .org-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        .org-card {
            background: var(--white);
            border-radius: 20px;
            padding: 35px 24px;
            text-align: center;
            box-shadow: var(--shadow-sm);
            transition: all 0.4s ease;
            border: 1px solid var(--gray-100);
        }
        .org-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-md);
            border-color: rgba(255,107,53,0.2);
        }
        .org-icon {
            width: 60px; height: 60px;
            border-radius: 16px;
            background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 1.5rem;
            color: var(--orange);
            transition: all 0.3s ease;
        }
        .org-card:hover .org-icon {
            background: var(--orange);
            color: white;
        }
        .org-card h4 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--blue);
            margin-bottom: 8px;
        }
        .org-card p {
            font-size: 0.9rem;
            color: var(--gray-600);
            margin: 0;
        }

        @media (max-width: 991px) {
            .org-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 767px) {
            .org-grid { grid-template-columns: 1fr; }
        }

        /* ============================================
           TARIFS - PRICING
           ============================================ */
        .pricing-section-moderne {
            background: var(--white);
        }
        .pricing-grid-moderne {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            max-width: 900px;
            margin: 0 auto;
        }
        .pricing-card-moderne {
            background: var(--white);
            border-radius: 24px;
            padding: 40px;
            box-shadow: var(--shadow-lg);
            transition: all 0.4s ease;
            position: relative;
            border: 2px solid transparent;
            overflow: hidden;
            text-align: center;
        }
        .pricing-card-moderne:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }
        .pricing-card-moderne.featured {
            border-color: var(--orange);
            transform: scale(1.03);
        }
        .pricing-card-moderne.featured:hover {
            transform: scale(1.03) translateY(-10px);
        }
        .pricing-icon {
            width: 80px; height: 80px;
            border-radius: 20px;
            background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 2rem;
            color: var(--orange);
        }
        .pricing-card-moderne.featured .pricing-icon {
            background: linear-gradient(135deg, var(--orange), var(--orange-light));
            color: white;
            box-shadow: var(--shadow-orange);
        }
        .pricing-duration-moderne {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--blue);
            margin-bottom: 8px;
        }
        .pricing-price-moderne {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--orange);
            line-height: 1;
            margin: 16px 0;
        }
        .pricing-price-moderne span {
            font-size: 1rem;
            color: var(--gray-600);
            font-weight: 500;
        }
        .pricing-features-moderne {
            list-style: none;
            padding: 0;
            margin: 0 0 24px 0;
            text-align: left;
        }
        .pricing-features-moderne li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid var(--gray-100);
            color: var(--gray-600);
            font-size: 0.95rem;
        }
        .pricing-features-moderne li:last-child {
            border-bottom: none;
        }
        .pricing-features-moderne li i {
            color: var(--orange);
            font-size: 1rem;
            margin-top: 3px;
        }
        .pricing-btn-moderne {
            display: block;
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--orange), var(--orange-light));
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.05rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
        }
        .pricing-btn-moderne:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-orange);
            color: white;
        }

        @media (max-width: 767px) {
            .pricing-grid-moderne { grid-template-columns: 1fr; }
            .pricing-card-moderne.featured { transform: scale(1); }
            .pricing-card-moderne.featured:hover { transform: scale(1) translateY(-10px); }
        }

        /* ============================================
           POURQUOI NOUS
           ============================================ */
        .pourquoi-section {
            background: var(--cream);
        }
        .pourquoi-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .pourquoi-card {
            background: var(--white);
            padding: 28px;
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            border: 1px solid transparent;
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }
        .pourquoi-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
            border-color: rgba(255,107,53,0.2);
        }
        .pourquoi-card i {
            width: 45px; height: 45px;
            min-width: 45px;
            border-radius: 12px;
            background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--orange);
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        .pourquoi-card:hover i {
            background: var(--orange);
            color: white;
        }
        .pourquoi-card h4 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--blue);
            margin-bottom: 6px;
        }
        .pourquoi-card p {
            font-size: 0.9rem;
            color: var(--gray-600);
            line-height: 1.6;
            margin: 0;
        }

        @media (max-width: 767px) {
            .pourquoi-grid { grid-template-columns: 1fr; }
        }

        /* ============================================
           CTA FINAL
           ============================================ */
        .cta-final {
            background: var(--blue);
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        .cta-final::before {
            content: '';
            position: absolute;
            top: -100px; right: -100px;
            width: 300px; height: 300px;
            background: radial-gradient(circle, rgba(255,107,53,0.15), transparent 70%);
        }
        .cta-final .section-title-big {
            color: white;
            max-width: 700px;
            margin: 0 auto 20px;
        }
        .cta-final .section-subtitle {
            color: rgba(255,255,255,0.7);
            max-width: 600px;
            margin: 0 auto 40px;
        }
        .cta-buttons-final {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }
        .btn-cta-final {
            padding: 16px 32px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }
        .btn-cta-final.btn-orange {
            background: var(--orange);
            color: white;
            box-shadow: 0 8px 24px rgba(255,107,53,0.3);
        }
        .btn-cta-final.btn-orange:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(255,107,53,0.4);
        }
        .btn-cta-final.btn-outline-light {
            background: transparent;
            color: white;
            border: 2px solid rgba(255,255,255,0.3);
        }
        .btn-cta-final.btn-outline-light:hover {
            background: rgba(255,255,255,0.1);
            border-color: white;
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

        .modal-inscription-overlay {
            position: fixed; inset: 0;
            background: rgba(10, 22, 40, 0.6);
            backdrop-filter: blur(8px);
            z-index: 10000;
            display: flex; align-items: center; justify-content: center;
            padding: 20px;
            opacity: 0; visibility: hidden;
            transition: all 0.3s ease;
        }
        .modal-inscription-overlay.active { opacity: 1; visibility: visible; }
        .modal-inscription {
            background: var(--white);
            border-radius: 24px; width: 100%;
            max-width: 700px; max-height: 90vh;
            overflow-y: auto; position: relative;
            box-shadow: var(--shadow-xl);
            transform: translateY(30px) scale(0.95);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .modal-inscription-overlay.active .modal-inscription { transform: translateY(0) scale(1); }
        .modal-close {
            position: absolute; top: 16px; right: 16px;
            width: 40px; height: 40px; border-radius: 12px;
            background: var(--gray-100); border: none; color: var(--gray-600);
            font-size: 1.1rem; cursor: pointer;
            transition: all 0.2s ease; display: flex;
            align-items: center; justify-content: center; z-index: 10;
        }
        .modal-close:hover { background: var(--orange); color: white; transform: rotate(90deg); }
        .modal-header { text-align: center; padding: 40px 30px 20px; border-bottom: 1px solid var(--gray-100); }
        .modal-icon {
            width: 70px; height: 70px; border-radius: 20px;
            background: linear-gradient(135deg, var(--orange), var(--orange-light));
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 16px; font-size: 1.8rem; color: white;
            box-shadow: var(--shadow-orange);
        }
        .modal-header h3 { font-size: 1.4rem; font-weight: 800; color: var(--blue); margin-bottom: 6px; }
        .modal-header p { font-size: 0.9rem; color: var(--gray-600); margin: 0; }
        .modal-section { padding: 24px 30px; border-bottom: 1px solid var(--gray-100); }
        .modal-section:last-of-type { border-bottom: none; }
        .modal-section h4 { font-size: 0.95rem; font-weight: 700; color: var(--blue); margin-bottom: 16px; display: flex; align-items: center; gap: 8px; }
        .modal-section h4 i { color: var(--orange); font-size: 1rem; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .form-group { margin-bottom: 16px; }
        .form-group:last-child { margin-bottom: 0; }
        .form-group label { display: block; font-size: 0.85rem; font-weight: 600; color: var(--gray-800); margin-bottom: 6px; }
        .form-group input[type="text"], .form-group input[type="email"], .form-group input[type="tel"],
        .form-group input[type="number"], .form-group input[type="date"], .form-group select {
            width: 100%; padding: 12px 14px; border: 2px solid var(--gray-200); border-radius: 10px;
            font-family: 'Nunito', sans-serif; font-size: 0.9rem; color: var(--gray-800);
            transition: all 0.2s ease; background: var(--white);
        }
        .form-group input:focus, .form-group select:focus { outline: none; border-color: var(--orange); box-shadow: 0 0 0 4px rgba(255,107,53,0.1); }
        .form-group input::placeholder { color: var(--gray-400); }
        .form-group input[readonly] { background: var(--gray-50); color: var(--orange); font-weight: 700; }
        .radio-group { display: flex; flex-wrap: wrap; gap: 10px; }
        .radio-label {
            display: flex; align-items: center; gap: 6px; padding: 8px 14px;
            border: 2px solid var(--gray-200); border-radius: 10px; cursor: pointer;
            font-size: 0.85rem; font-weight: 600; color: var(--gray-800); transition: all 0.2s ease;
        }
        .radio-label input[type="radio"] { accent-color: var(--orange); width: 16px; height: 16px; }
        .radio-label:has(input:checked) { border-color: var(--orange); background: rgba(255,107,53,0.05); color: var(--orange); }
        .checkbox-days { display: flex; flex-wrap: wrap; gap: 8px; }
        .day-checkbox {
            display: flex; align-items: center; gap: 5px; padding: 8px 12px;
            border: 2px solid var(--gray-200); border-radius: 8px; cursor: pointer;
            font-size: 0.85rem; font-weight: 600; color: var(--gray-800); transition: all 0.2s ease;
        }
        .day-checkbox input[type="checkbox"] { accent-color: var(--orange); width: 16px; height: 16px; }
        .day-checkbox:has(input:checked) { border-color: var(--orange); background: rgba(255,107,53,0.05); color: var(--orange); }
        .frais-reservation {
            background: linear-gradient(135deg, rgba(255,107,53,0.08), rgba(255,107,53,0.03));
            border: 2px solid rgba(255,107,53,0.2); border-radius: 12px; padding: 16px; margin-bottom: 16px;
        }
        .checkbox-frais { display: flex; align-items: center; gap: 10px; cursor: default; }
        .checkbox-frais input { accent-color: var(--orange); width: 20px; height: 20px; }
        .checkbox-frais span { font-size: 0.95rem; color: var(--orange); }
        .frais-desc { font-size: 0.82rem; color: var(--gray-600); margin: 8px 0 0 30px; line-height: 1.5; }
        .recap-section { background: var(--gray-50); }
        .recap-box { background: var(--white); border-radius: 12px; padding: 16px; border: 1px solid var(--gray-200); }
        .recap-line { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid var(--gray-100); font-size: 0.9rem; }
        .recap-line:last-child { border-bottom: none; }
        .recap-line span { color: var(--gray-600); }
        .recap-line strong { color: var(--blue); font-weight: 700; }
        .recap-line.highlight { background: rgba(255,107,53,0.05); margin: 0 -16px; padding: 12px 16px; border-bottom: none; }
        .recap-line.highlight span, .recap-line.highlight strong { color: var(--orange); }
        .status-badge { background: var(--gray-200); color: var(--gray-600); padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; }
        .info-importante { display: flex; align-items: flex-start; gap: 10px; margin-top: 16px; padding: 12px; background: rgba(59,130,246,0.05); border-radius: 10px; border: 1px solid rgba(59,130,246,0.15); }
        .info-importante i { color: var(--blue-accent); margin-top: 2px; }
        .info-importante p { font-size: 0.82rem; color: var(--gray-600); margin: 0; line-height: 1.5; }
        .btn-confirm-inscription {
            width: calc(100% - 60px); margin: 0 30px 30px; padding: 16px 24px;
            border-radius: 12px; background: linear-gradient(135deg, var(--orange), var(--orange-light));
            color: white; font-family: 'Nunito', sans-serif; font-size: 1rem; font-weight: 700;
            border: none; cursor: pointer; display: flex; align-items: center; justify-content: center;
            gap: 10px; box-shadow: var(--shadow-orange); transition: all 0.3s ease;
        }
        .btn-confirm-inscription:hover { background: linear-gradient(135deg, var(--orange-dark), var(--orange)); transform: translateY(-2px); }
        .modal-success { text-align: center; padding: 60px 30px; }
        .modal-success-icon { width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, #22c55e, #16a34a); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 2.5rem; color: white; }
        .modal-success h3 { font-size: 1.5rem; font-weight: 800; color: var(--blue); margin-bottom: 10px; }
        .modal-success p { font-size: 1rem; color: var(--gray-600); margin-bottom: 24px; }
        .btn-success-close { padding: 12px 32px; border-radius: 10px; background: var(--orange); color: white; font-weight: 700; border: none; cursor: pointer; }
        .btn-success-close:hover { background: var(--orange-dark); }
        @media (max-width: 767px) { .form-row { grid-template-columns: 1fr; } .modal-inscription { max-height: 95vh; border-radius: 16px; } .modal-section { padding: 20px; } }
    </style>
</head>

<body>
@include('partials.header')

<!-- ============================================
     HERO - COURS DE MUSIQUE
     ============================================ -->
<section class="hero-page">
    <div class="container">
        <div class="hero-page-grid">
            <div class="hero-page-content">
                <div class="hero-page-label"><i class="fas fa-music"></i> Extrascolaire</div>
                <h1 class="hero-page-title">Cours de <span class="highlight-orange">Musique</span> et de Chant</h1>
                <p class="hero-page-subtitle">Êtes-vous passionné par la musique ? MONPROFCHEZMOI vous accompagne dans cette démarche avec des cours adaptés pour enfants et adultes.</p>

                <div class="hero-page-buttons">
                    <a href="#objectifs" class="btn-hero-nouveau btn-orange"><i class="fas fa-book-open"></i> Découvrir les cours</a>
                    <a href="#tarifs" class="btn-hero-nouveau btn-outline"><i class="fas fa-tag"></i> Voir les tarifs</a>
                </div>

                <a href="tel:+2250153751544" class="hero-rappel" style="display:inline-flex;align-items:center;gap:10px;color:rgba(255,255,255,0.8);font-size:0.95rem;text-decoration:none;transition:all 0.3s ease;">
                    <i class="fas fa-phone-alt" style="width:40px;height:40px;border-radius:50%;background:rgba(255,107,53,0.2);display:flex;align-items:center;justify-content:center;color:var(--orange);font-size:1rem;"></i>
                    <span>Être rappelé gratuitement</span>
                </a>
            </div>

            <div class="hero-page-image d-none d-lg-block">
                <img src="asset/img/mus.jpg" alt="Cours de musique">
                <div class="hero-badge-float"><i class="fas fa-music"></i> Piano, Guitare, Chant & plus</div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     INTRO MUSIQUE
     ============================================ -->
<section class="intro-section section-padding">
    <div class="container">
        <div class="intro-layout">
            <div class="intro-content animate-scroll">
                <div class="section-label-orange">Pourquoi la musique ?</div>
                <h2 class="section-title-big">Découvrez le plaisir de la <span style="color: var(--orange);">musique</span>, quel que soit votre âge</h2>
                <p>La musique est un merveilleux moyen d'expression, de créativité et de développement personnel. Que vous soyez débutant ou déjà initié, nos cours de musique sont conçus pour vous accompagner dans votre apprentissage et vous permettre de progresser à votre rythme.</p>
                <p>Nos cours s'adressent aussi bien aux enfants qu'aux adultes, dans une atmosphère conviviale, motivante et adaptée à chaque élève. Il n'est jamais trop tard pour apprendre la musique !</p>
            </div>

            <div class="intro-image-wrap animate-scroll">
                <img src="asset/img/mus.jpg" alt="Cours de musique">
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     OBJECTIFS
     ============================================ -->
<section id="objectifs" class="objectifs-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Nos objectifs</div>
            <h2 class="section-title-big">Ce que vous allez <span style="color: var(--orange);">apprendre</span></h2>
            <p class="section-subtitle">Des objectifs clairs pour une progression mesurable et motivante.</p>
        </div>

        <div class="objectifs-grid">
            <div class="objectif-card-moderne animate-scroll">
                <div class="objectif-icon"><i class="fas fa-bullseye"></i></div>
                <h4>Objectifs des cours de musique</h4>
                <ul class="objectif-list-moderne">
                    <li><i class="fas fa-check"></i><span>Développer l'écoute musicale et le sens du rythme</span></li>
                    <li><i class="fas fa-check"></i><span>Apprendre les bases du langage musical</span></li>
                    <li><i class="fas fa-check"></i><span>Maîtriser progressivement un instrument</span></li>
                    <li><i class="fas fa-check"></i><span>Développer la créativité et la confiance en soi</span></li>
                    <li><i class="fas fa-check"></i><span>Prendre plaisir à jouer de la musique</span></li>
                </ul>
            </div>

            <div class="objectif-card-moderne animate-scroll">
                <div class="objectif-icon"><i class="fas fa-child"></i></div>
                <h4>Pour les enfants</h4>
                <p style="color: var(--gray-600); margin-bottom: 16px;">L'apprentissage musical contribue au développement de nombreuses compétences :</p>
                <ul class="objectif-list-moderne">
                    <li><i class="fas fa-check"></i><span>Concentration</span></li>
                    <li><i class="fas fa-check"></i><span>Mémoire</span></li>
                    <li><i class="fas fa-check"></i><span>Coordination</span></li>
                    <li><i class="fas fa-check"></i><span>Créativité</span></li>
                    <li><i class="fas fa-check"></i><span>Discipline</span></li>
                </ul>
                <p style="color: var(--gray-600); margin-top: 16px; font-style: italic;">Les enfants apprennent à écouter, comprendre et jouer de la musique tout en développant leur sens artistique.</p>
            </div>

            <div class="objectif-card-moderne animate-scroll">
                <div class="objectif-icon"><i class="fas fa-user"></i></div>
                <h4>Pour les adultes</h4>
                <p style="color: var(--gray-600); margin-bottom: 16px;">Nos cours pour adultes s'adressent aux personnes qui souhaitent :</p>
                <ul class="objectif-list-moderne">
                    <li><i class="fas fa-check"></i><span>Apprendre un instrument</span></li>
                    <li><i class="fas fa-check"></i><span>Reprendre la musique après une pause</span></li>
                    <li><i class="fas fa-check"></i><span>Développer leur culture musicale</span></li>
                    <li><i class="fas fa-check"></i><span>Pratiquer la musique pour le plaisir</span></li>
                </ul>
                <p style="color: var(--gray-600); margin-top: 16px; font-style: italic;">Les cours sont adaptés au niveau et aux objectifs de chaque élève.</p>
            </div>

            <div class="objectif-card-moderne animate-scroll">
                <div class="objectif-icon"><i class="fas fa-guitar"></i></div>
                <h4>Instruments proposés</h4>
                <ul class="objectif-list-moderne">
                    <li><i class="fas fa-music"></i><span>Piano</span></li>
                    <li><i class="fas fa-music"></i><span>Guitare</span></li>
                    <li><i class="fas fa-music"></i><span>Chant</span></li>
                    <li><i class="fas fa-music"></i><span>Batterie</span></li>
                    <li><i class="fas fa-music"></i><span>Flûte à bec</span></li>
                    <li><i class="fas fa-music"></i><span>Violon</span></li>
                    <li><i class="fas fa-music"></i><span>Solfège</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     INSTRUMENTS
     ============================================ -->
<section class="instruments-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Nos instruments</div>
            <h2 class="section-title-big">Une large gamme <span style="color: var(--orange-light);">d'instruments</span></h2>
            <p class="section-subtitle">Choisissez l'instrument qui vous inspire et commencez votre parcours musical.</p>
        </div>

        <div class="instruments-grid">
            <div class="instrument-card animate-scroll">
                <div class="instrument-icon"><i class="fas fa-keyboard"></i></div>
                <h4>Piano</h4>
            </div>
            <div class="instrument-card animate-scroll">
                <div class="instrument-icon"><i class="fas fa-guitar"></i></div>
                <h4>Guitare</h4>
            </div>
            <div class="instrument-card animate-scroll">
                <div class="instrument-icon"><i class="fas fa-microphone-alt"></i></div>
                <h4>Chant</h4>
            </div>
            <div class="instrument-card animate-scroll">
                <div class="instrument-icon"><i class="fas fa-drum"></i></div>
                <h4>Batterie</h4>
            </div>
            <div class="instrument-card animate-scroll">
                <div class="instrument-icon"><i class="fas fa-music"></i></div>
                <h4>Flûte à bec</h4>
            </div>
            <div class="instrument-card animate-scroll">
                <div class="instrument-icon"><i class="fas fa-violin"></i></div>
                <h4>Violon</h4>
            </div>
            <div class="instrument-card animate-scroll">
                <div class="instrument-icon"><i class="fas fa-book-open"></i></div>
                <h4>Solfège</h4>
            </div>
            <div class="instrument-card animate-scroll">
                <div class="instrument-icon"><i class="fas fa-plus"></i></div>
                <h4>Et plus...</h4>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     ORGANISATION
     ============================================ -->
<section class="org-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Organisation</div>
            <h2 class="section-title-big">Comment se déroulent les <span style="color: var(--orange);">cours</span> ?</h2>
            <p class="section-subtitle">Une organisation claire pour un apprentissage efficace et agréable.</p>
        </div>

        <div class="org-grid">
            <div class="org-card animate-scroll">
                <div class="org-icon"><i class="fas fa-clock"></i></div>
                <h4>Durée</h4>
                <p>1 heure par séance</p>
            </div>
            <div class="org-card animate-scroll">
                <div class="org-icon"><i class="fas fa-calendar-alt"></i></div>
                <h4>Fréquence</h4>
                <p>1 à 2 fois par semaine</p>
            </div>
            <div class="org-card animate-scroll">
                <div class="org-icon"><i class="fas fa-users"></i></div>
                <h4>Public</h4>
                <p>Enfants et adultes, débutants ou intermédiaires</p>
            </div>
            <div class="org-card animate-scroll">
                <div class="org-icon"><i class="fas fa-map-marker-alt"></i></div>
                <h4>Lieu</h4>
                <p>À domicile ou dans notre centre</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     TARIFS
     ============================================ -->
<section id="tarifs" class="pricing-section-moderne section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Nos tarifs</div>
            <h2 class="section-title-big">Des tarifs <span style="color: var(--orange);">adaptés</span> à tous</h2>
                        <p class="section-subtitle">Choisissez la formule qui correspond le mieux à vos besoins et à votre budget.</p>
        </div>

        <div class="pricing-grid-moderne">
            <!-- Cours individuel -->
            <div class="pricing-card-moderne animate-scroll">
                <div class="pricing-icon"><i class="fas fa-user"></i></div>
                <div class="pricing-duration-moderne">Cours individuel</div>
                <p style="color: var(--gray-600); margin-bottom: 16px;">1 heure de cours particulier</p>
                <div class="pricing-price-moderne">20 000 FCFA</div>
                <ul class="pricing-features-moderne">
                    <li><i class="fas fa-check-circle"></i><span>Cours personnalisé et sur mesure</span></li>
                    <li><i class="fas fa-check-circle"></i><span>Professeur expérimenté</span></li>
                    <li><i class="fas fa-check-circle"></i><span>Progression à votre rythme</span></li>
                    <li><i class="fas fa-check-circle"></i><span>Tous instruments disponibles</span></li>
                </ul>
                <a href="#" class="pricing-btn-moderne" onclick="openInscriptionModal('Musique - Cours Individuel 1h', '20000', '1 séance'); return false;">
                    <i class="fas fa-arrow-right"></i> Je m'inscris
                </a>
            </div>

            <!-- Forfait mensuel -->
            <div class="pricing-card-moderne featured animate-scroll">
                <div class="pricing-icon"><i class="fas fa-calendar-check"></i></div>
                <div class="pricing-duration-moderne">Forfait mensuel</div>
                <p style="color: var(--gray-600); margin-bottom: 16px;">4 cours par mois</p>
                <div class="pricing-price-moderne">70 000 FCFA</div>
                <ul class="pricing-features-moderne">
                    <li><i class="fas fa-check-circle"></i><span>4 cours de 1 heure chacun</span></li>
                    <li><i class="fas fa-check-circle"></i><span>Suivi régulier et progressif</span></li>
                    <li><i class="fas fa-check-circle"></i><span>Professeur dédié</span></li>
                    <li><i class="fas fa-check-circle"></i><span>Économisez 10 000 FCFA</span></li>
                </ul>
                <a href="#" class="pricing-btn-moderne" onclick="openInscriptionModal('Musique - Forfait Mensuel 4 cours', '70000', '4 séances/mois'); return false;">
                    <i class="fas fa-arrow-right"></i> Je m'inscris
                </a>
            </div>
        </div>

        <p class="text-center animate-scroll" style="margin-top: 40px; color: var(--gray-600); font-style: italic;">
            <i class="fas fa-info-circle" style="color: var(--orange);"></i> Tarifs spéciaux possibles pour les enfants ou les inscriptions sur plusieurs mois.
        </p>
    </div>
</section>

<!-- ============================================
     POURQUOI NOUS
     ============================================ -->
<section class="pourquoi-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Nos atouts</div>
            <h2 class="section-title-big">Pourquoi choisir nos <span style="color: var(--orange);">cours</span> ?</h2>
            <p class="section-subtitle">Une approche pédagogique unique pour des résultats exceptionnels.</p>
        </div>

        <div class="pourquoi-grid">
            <div class="pourquoi-card animate-scroll">
                <i class="fas fa-chalkboard-teacher"></i>
                <div>
                    <h4>Professeurs expérimentés</h4>
                    <p>Des musiciens professionnels passionnés par l'enseignement.</p>
                </div>
            </div>
            <div class="pourquoi-card animate-scroll">
                <i class="fas fa-sliders-h"></i>
                <div>
                    <h4>Méthode adaptée</h4>
                    <p>Chaque élève a un programme sur mesure selon ses objectifs.</p>
                </div>
            </div>
            <div class="pourquoi-card animate-scroll">
                <i class="fas fa-chart-line"></i>
                <div>
                    <h4>Apprentissage progressif</h4>
                    <p>Une progression motivante et bienveillante étape par étape.</p>
                </div>
            </div>
            <div class="pourquoi-card animate-scroll">
                <i class="fas fa-heart"></i>
                <div>
                    <h4>Environnement bienveillant</h4>
                    <p>Un cadre stimulant où il fait bon apprendre et progresser.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     CTA FINAL
     ============================================ -->
<section class="cta-final section-padding">
    <div class="container">
        <div class="animate-scroll">
            <h2 class="section-title-big">Prêt à faire de la musique votre <span style="color: var(--orange);">passion</span> ?</h2>
            <p class="section-subtitle">Inscrivez-vous dès maintenant et commencez votre parcours musical avec MONPROFCHEZMOI.</p>

            <div class="cta-buttons-final">
                <a href="#" class="btn-cta-final btn-orange" onclick="openInscriptionModal('Musique - Cours de musique', '20000', '1 séance'); return false;">
                    <i class="fas fa-paper-plane"></i> Je m'inscris
                </a>
                <a href="tel:+2250153751544" class="btn-cta-final btn-outline-light">
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
                        <input type="number" name="age_enfant" required min="3" max="18" placeholder="Ex: 8">
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

            <!-- Activité choisie -->
            <div class="modal-section">
                <h4><i class="fas fa-bullseye"></i> Activité choisie</h4>
                <div class="form-group">
                    <label>Nom de l'activité *</label>
                    <input type="text" name="activite" id="modalActivite" readonly>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Date de début souhaitée</label>
                        <input type="date" name="date_debut">
                    </div>
                    <div class="form-group">
                        <label>Lieu préféré *</label>
                        <div class="radio-group">
                            <label class="radio-label"><input type="radio" name="lieu" value="domicile" checked> <span>À domicile</span></label>
                            <label class="radio-label"><input type="radio" name="lieu" value="en_ligne"> <span>En ligne</span></label>
                            <label class="radio-label"><input type="radio" name="lieu" value="centre"> <span>Au centre</span></label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Disponibilités -->
            <div class="modal-section">
                <h4><i class="fas fa-clock"></i> Disponibilités</h4>
                <div class="form-group">
                    <label>Jours disponibles *</label>
                    <div class="checkbox-days">
                        <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Lundi"> <span>Lundi</span></label>
                        <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Mardi"> <span>Mardi</span></label>
                        <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Mercredi"> <span>Mercredi</span></label>
                        <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Jeudi"> <span>Jeudi</span></label>
                        <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Vendredi"> <span>Vendredi</span></label>
                        <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Samedi"> <span>Samedi</span></label>
                        <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Dimanche"> <span>Dimanche</span></label>
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

// ========== MODAL D'INSCRIPTION ==========
let currentFormule = '';
let currentPrix = '';

function openInscriptionModal(formule, prix, detail) {
    currentFormule = formule;
    currentPrix = prix + ' FCFA (' + detail + ')';

    document.getElementById('modalActivite').value = formule;
    document.getElementById('recapFormule').textContent = formule;
    document.getElementById('recapPrix').textContent = currentPrix;

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
    document.getElementById('recapFormule').textContent = currentFormule;
    document.getElementById('recapPrix').textContent = currentPrix;
}

function submitInscription(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    // Récupérer les jours sélectionnés
    const jours = [];
    document.querySelectorAll('input[name="jours[]"]:checked').forEach(cb => {
        jours.push(cb.value);
    });

    formData.append('jours', JSON.stringify(jours));
    formData.append('formule', currentFormule);
    formData.append('prix_formule', currentPrix);
    formData.append('frais_reservation', '10000');

    const btn = document.getElementById('btnConfirmInscription');
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement...';
    }

    // Étape 1 : Créer l'inscription
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
            // ✅ Étape 2 : Redirection vers le système de paiement
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

// Fermer le modal en cliquant sur l'overlay
document.getElementById('modalInscription').addEventListener('click', function(e) {
    if (e.target === this) {
        closeInscriptionModal();
    }
});

// Fermer avec Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeInscriptionModal();
    }
});

// ========== ANCIENNE FONCTION (gardée pour compatibilité) ==========
function redirectToContact(part, prix = null) {
    console.log('Ancienne redirection désactivée - utiliser openInscriptionModal()');
}
</script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>

