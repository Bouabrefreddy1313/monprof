<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Formations - Monprofchezmoi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Formations professionnelles, Cours en ligne" name="keywords">
    <meta content="Formations professionnelles et certifiantes pour adultes" name="description">

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
</head>

<style>
/* ============================================
   MONPROFCHEZMOI - DESIGN FORMATIONS 2024
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

/* Scroll Progress */
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



/* Hamburger Toggler */
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
   HERO FORMATIONS
   ============================================ */
.hero-formations {
    min-height: 70vh;
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 50%, #1a365d 100%);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
}
.hero-formations::before {
    content: '';
    position: absolute;
    top: -20%; right: -10%;
    width: 600px; height: 600px;
    background: radial-gradient(circle, rgba(255,107,53,0.15), transparent 70%);
    border-radius: 50%;
    animation: float-hero 8s ease-in-out infinite;
}
.hero-formations::after {
    content: '';
    position: absolute;
    bottom: -10%; left: -5%;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(59,130,246,0.1), transparent 70%);
    border-radius: 50%;
    animation: float-hero 10s ease-in-out infinite reverse;
}
@keyframes float-hero {
    0%, 100% { transform: translate(0, 0); }
    50% { transform: translate(-30px, -20px); }
}
.hero-formations-grid {
    display: grid;
    grid-template-columns: 1.1fr 0.9fr;
    gap: 60px;
    align-items: center;
    position: relative;
    z-index: 2;
}
.hero-formations-content {
    padding: 80px 0;
}
.hero-label {
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
    animation: fadeInUp 0.6s ease;
}
.hero-title-nouveau {
    font-size: clamp(2.2rem, 4.5vw, 3.8rem);
    font-weight: 800;
    color: white;
    line-height: 1.15;
    margin-bottom: 20px;
    animation: fadeInUp 0.8s ease 0.1s both;
}
.hero-title-nouveau .highlight-orange {
    color: var(--orange);
    position: relative;
}
.hero-title-nouveau .highlight-orange::after {
    content: '';
    position: absolute;
    bottom: -4px; left: 0;
    width: 100%; height: 4px;
    background: var(--orange);
    border-radius: 2px;
    opacity: 0.6;
}
.hero-subtitle-nouveau {
    font-size: 1.15rem;
    color: rgba(255,255,255,0.75);
    line-height: 1.8;
    margin-bottom: 35px;
    max-width: 520px;
    animation: fadeInUp 0.8s ease 0.2s both;
}

/* Search Bar Hero */
.hero-search-bar {
    display: flex;
    max-width: 500px;
    animation: fadeInUp 0.8s ease 0.3s both;
}
.hero-search-bar input {
    flex: 1;
    height: 56px;
    border: none;
    border-radius: 14px 0 0 14px;
    padding: 0 24px;
    font-size: 1rem;
    background: rgba(255,255,255,0.95);
    color: var(--gray-800);
    outline: none;
}
.hero-search-bar input::placeholder {
    color: var(--gray-400);
}
.hero-search-bar button {
    height: 56px;
    padding: 0 28px;
    border: none;
    border-radius: 0 14px 14px 0;
    background: var(--orange);
    color: white;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}
.hero-search-bar button:hover {
    background: var(--orange-dark);
}

/* Hero Image */
.hero-formations-image {
    position: relative;
    height: 450px;
}
.hero-formations-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 24px;
    box-shadow: var(--shadow-xl);
    border: 4px solid white;
    animation: fadeInRight 0.8s ease 0.4s both;
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
    font-size: 0.95rem;
    box-shadow: var(--shadow-orange);
    z-index: 5;
    animation: pulse-badge 2s infinite, fadeInUp 0.8s ease 0.6s both;
}
@keyframes pulse-badge {
    0%, 100% { box-shadow: 0 0 0 0 rgba(255,107,53,0.4); }
    50% { box-shadow: 0 0 0 12px rgba(255,107,53,0); }
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
   GRID DES FORMATIONS - STYLE CAPTURE D'ÉCRAN
   ============================================ */
.formations-grid-section {
    background: var(--cream);
}
.formations-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}
.formation-card-moderne {
    background: var(--white);
    border-radius: 10px;
    border: 1px solid #E5E7EB;
    padding: 16px 20px;
    display: flex;
    align-items: center;
    gap: 14px;
    text-decoration: none;
    transition: all 0.25s ease;
    position: relative;
    overflow: hidden;
}
.formation-card-moderne:hover {
    border-color: var(--orange);
    box-shadow: 0 4px 16px rgba(10, 22, 40, 0.06);
    transform: translateY(-2px);
}
.formation-icon-wrap {
    width: 32px;
    height: 32px;
    min-width: 32px;
    border-radius: 50%;
    border: 2px solid #7C3AED;
    background: transparent;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #7C3AED;
    font-size: 0.7rem;
    transition: all 0.25s ease;
    margin-bottom: 0;
}
.formation-card-moderne:hover .formation-icon-wrap {
    background: #7C3AED;
    color: white;
    transform: scale(1.1);
}
.formation-card-moderne h3 {
    font-size: 0.92rem;
    font-weight: 600;
    color: var(--blue);
    margin: 0;
    line-height: 1.4;
    transition: color 0.25s ease;
}
.formation-card-moderne:hover h3 {
    color: var(--orange);
}
.formation-card-moderne p,
.formation-arrow,
.formation-card-header {
    display: none;
}
.formation-cours-count {
    margin-left: auto;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(255, 107, 53, 0.12);
    color: var(--gray-600);
    font-size: 0.72rem;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 20px;
    white-space: nowrap;
    transition: background 0.25s ease, color 0.25s ease;
    flex-shrink: 0;
}
.formation-card-moderne:hover .formation-cours-count {
    background: var(--orange);
    color: var(--white);
}

/* ============================================
   SLIDER HERO FORMATIONS
   ============================================ */
.slider-hero-formations {
    position: relative;
    width: 100%;
    height: 500px;
    overflow: hidden;
    border-radius: 24px;
    box-shadow: var(--shadow-xl);
}
.slider-hero-formations .slide {
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1s ease-in-out;
}
.slider-hero-formations .slide.active {
    opacity: 1;
    z-index: 1;
}
.slider-hero-formations .slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transform: scale(1.1);
    transition: transform 5s ease-in-out;
}
.slider-hero-formations .slide.active img {
    transform: scale(1);
}
.slider-caption {
    position: absolute;
    bottom: 40px;
    left: 40px;
    color: #fff;
    background: rgba(10, 22, 40, 0.75);
    backdrop-filter: blur(10px);
    padding: 24px 32px;
    border-radius: 16px;
    max-width: 450px;
    z-index: 2;
}
.slider-caption h3 {
    margin: 0 0 8px;
    font-size: 1.5rem;
    font-weight: 700;
    color: white;
}
.slider-caption p {
    margin: 0;
    font-size: 1rem;
    color: rgba(255,255,255,0.8);
}

/* ============================================
   SECTION AVANTAGES - SPLIT DESIGN
   ============================================ */
.avantages-section {
    background: var(--white);
}
.avantages-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 80px;
    align-items: center;
}
.avantages-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}
.avantage-item {
    display: flex;
    align-items: flex-start;
    gap: 18px;
    padding: 24px 28px;
    background: var(--cream);
    border-radius: 16px;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    cursor: default;
}
.avantage-item:hover {
    background: var(--white);
    border-color: var(--orange);
    transform: translateX(10px);
    box-shadow: var(--shadow-md);
}
.avantage-check {
    width: 48px;
    height: 48px;
    min-width: 48px;
    border-radius: 14px;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.1rem;
    box-shadow: var(--shadow-orange);
}
.avantage-item h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 6px;
}
.avantage-item p {
    font-size: 0.9rem;
    color: var(--gray-600);
    line-height: 1.6;
    margin: 0;
}
.avantages-image-wrap {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: var(--shadow-xl);
    height: 500px;
}
.avantages-image-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s ease;
}
.avantages-image-wrap:hover img {
    transform: scale(1.05);
}
.avantages-badge {
    position: absolute;
    bottom: 30px;
    left: 30px;
    background: var(--orange);
    color: white;
    padding: 14px 28px;
    border-radius: 14px;
    font-weight: 700;
    font-size: 1.1rem;
    box-shadow: var(--shadow-orange);
}

/* ============================================
   CHIFFRES CLÉS
   ============================================ */
.chiffres-section {
    background: linear-gradient(135deg, var(--orange) 0%, var(--orange-dark) 100%);
    position: relative;
    overflow: hidden;
}
.chiffres-section::before {
    content: '';
    position: absolute;
    top: -50%; left: -10%;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(255,255,255,0.1), transparent 70%);
}
.chiffres-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
    text-align: center;
    position: relative;
    z-index: 2;
}
.chiffre-item .icon {
    width: 60px; height: 60px;
    border-radius: 16px;
    background: rgba(255,255,255,0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    color: white;
    font-size: 1.5rem;
}
.chiffre-item .number {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    color: white;
    line-height: 1;
    margin-bottom: 8px;
}
.chiffre-item .label {
    font-size: 0.95rem;
    color: rgba(255,255,255,0.85);
    font-weight: 500;
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
@keyframes fadeInLeft {
    from { opacity: 0; transform: translateX(-30px); }
    to { opacity: 1; transform: translateX(0); }
}
@keyframes fadeInRight {
    from { opacity: 0; transform: translateX(30px); }
    to { opacity: 1; transform: translateX(0); }
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
@media (max-width: 1199px) {
    .formations-grid { grid-template-columns: repeat(3, 1fr); }
}
@media (max-width: 991px) {
    .hero-formations-grid { grid-template-columns: 1fr; }
    .hero-formations-image { display: none; }
    .avantages-layout { grid-template-columns: 1fr; gap: 40px; }
    .footer-grid { grid-template-columns: 1fr 1fr; }
    .chiffres-grid { grid-template-columns: repeat(2, 1fr); }
    .formations-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 767px) {
    .section-padding { padding: 60px 0; }
    .formations-grid { grid-template-columns: 1fr; }
    .footer-grid { grid-template-columns: 1fr; }
    .chiffres-grid { grid-template-columns: 1fr 1fr; }
    .hero-search-bar { flex-direction: column; }
    .hero-search-bar input { border-radius: 14px; margin-bottom: 10px; }
    .hero-search-bar button { border-radius: 14px; }
    .slider-hero-formations { height: 300px; }
    .slider-caption { left: 20px; bottom: 20px; padding: 16px 20px; }
    .slider-caption h3 { font-size: 1.1rem; }
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
   BOUTON BON CADEAU - HERO FORMATIONS
   ============================================ */
.hero-bonus-cta {
    margin-top: 25px;
    animation: fadeInUp 0.8s ease 0.5s both;
}

.btn-bon-cadeau {
    display: inline-flex;
    align-items: center;
    gap: 14px;
    background: linear-gradient(135deg, #fff 0%, var(--cream) 100%);
    border: 2px solid var(--orange);
    border-radius: 16px;
    padding: 14px 24px;
    text-decoration: none;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(255,107,53,0.12);
}

.btn-bon-cadeau::before {
    content: '';
    position: absolute;
    top: 0; left: -100%;
    width: 100%; height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,107,53,0.08), transparent);
    transition: left 0.6s ease;
}

.btn-bon-cadeau:hover::before {
    left: 100%;
}

.btn-bon-cadeau:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: var(--shadow-orange);
    border-color: var(--orange-dark);
    text-decoration: none;
}

.bon-icon {
    width: 48px; height: 48px;
    border-radius: 14px;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.3rem;
    box-shadow: 0 6px 16px rgba(255,107,53,0.3);
    transition: all 0.3s ease;
    flex-shrink: 0;
}

.btn-bon-cadeau:hover .bon-icon {
    transform: rotate(10deg) scale(1.1);
}

.bon-text {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.bon-label {
    font-size: 1rem;
    font-weight: 700;
    color: var(--blue);
    line-height: 1.2;
}

.bon-sublabel {
    font-size: 0.82rem;
    color: var(--gray-600);
    font-weight: 500;
}

.bon-arrow {
    margin-left: 8px;
    color: var(--orange);
    font-size: 0.9rem;
    transition: all 0.3s ease;
    opacity: 0.7;
}

.btn-bon-cadeau:hover .bon-arrow {
    transform: translateX(6px);
    opacity: 1;
}

/* Animation pulse subtile sur l'icône cadeau */
@keyframes gift-pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.08); }
}

.btn-bon-cadeau .bon-icon i {
    animation: gift-pulse 2s ease-in-out infinite;
}

/* Responsive */
@media (max-width: 576px) {
    .btn-bon-cadeau {
        width: 100%;
        justify-content: flex-start;
        padding: 12px 18px;
    }
    .bon-sublabel {
        font-size: 0.75rem;
    }
    .bon-label {
        font-size: 0.9rem;
    }
}

/* ============================================
   GROUPES DE FORMATIONS - CARTES TRANSVERSALES / MÉTIERS
   ============================================ */
.groupes-formation-section {
    background: var(--white);
}
.groupes-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    max-width: 1050px;
    margin: 0 auto;
}
.groupe-card {
    position: relative;
    display: flex;
    flex-direction: column;
    text-decoration: none;
    background: var(--white);
    border: 2px solid var(--gray-100);
    border-radius: 24px;
    padding: 36px 32px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.groupe-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 5px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light));
    transform: scaleX(0);
    transition: transform 0.4s ease;
    transform-origin: left;
}
.groupe-card:hover::before,
.groupe-card.active::before {
    transform: scaleX(1);
}
.groupe-card:hover,
.groupe-card.active {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.groupe-card.active {
    border-color: var(--orange);
}
.groupe-card-top {
    display: flex;
    align-items: center;
    gap: 18px;
    margin-bottom: 16px;
}
.groupe-icon {
    width: 62px; height: 62px; min-width: 62px;
    border-radius: 18px;
    background: linear-gradient(135deg, rgba(255,107,53,0.12), rgba(255,107,53,0.05));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--orange);
    font-size: 1.6rem;
    transition: all 0.4s ease;
}
.groupe-card:hover .groupe-icon,
.groupe-card.active .groupe-icon {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    color: white;
    transform: scale(1.08) rotate(-6deg);
    box-shadow: var(--shadow-orange);
}
.groupe-card-title {
    font-size: 1.4rem;
    font-weight: 800;
    color: var(--blue);
    line-height: 1.25;
}
.groupe-card-title span {
    color: var(--orange);
}
.groupe-card-desc {
    color: var(--gray-600);
    font-size: 0.98rem;
    line-height: 1.7;
    margin-bottom: 18px;
}
.groupe-count {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(255, 107, 53, 0.12);
    color: var(--gray-600);
    font-size: 0.75rem;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 20px;
    white-space: nowrap;
    margin-bottom: 16px;
}
.groupe-card:hover .groupe-count,
.groupe-card.active .groupe-count {
    background: var(--orange);
    color: white;
}
.groupe-themes {
    list-style: none;
    margin: 0 0 24px;
    padding: 0;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px 18px;
}
.groupe-themes li {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.88rem;
    color: var(--gray-800);
    font-weight: 600;
}
.groupe-themes li::before {
    content: '✓';
    color: var(--orange);
    font-weight: 800;
    font-size: 0.8rem;
}
.groupe-card-cta {
    margin-top: auto;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--orange);
    color: white;
    padding: 13px 24px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}
.groupe-card-cta i {
    transition: transform 0.3s ease;
}
.groupe-card:hover .groupe-card-cta,
.groupe-card.active .groupe-card-cta {
    background: var(--orange-dark);
    box-shadow: var(--shadow-orange);
}
.groupe-card:hover .groupe-card-cta i,
.groupe-card.active .groupe-card-cta i {
    transform: translateX(5px);
}
.groupe-badge-selected {
    position: absolute;
    top: 20px; right: 20px;
    background: var(--orange);
    color: white;
    font-size: 0.7rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 6px 14px;
    border-radius: 30px;
}
.btn-link-reset {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--orange);
    font-weight: 700;
    font-size: 0.9rem;
    text-decoration: none;
    margin-top: 16px;
    transition: all 0.3s ease;
}
.btn-link-reset:hover {
    color: var(--orange-dark);
    gap: 12px;
}
@media (max-width: 991px) {
    .groupes-grid { grid-template-columns: 1fr; max-width: 560px; }
}
@media (max-width: 767px) {
    .groupe-card { padding: 26px 22px; }
    .groupe-card-title { font-size: 1.15rem; }
    .groupe-themes { grid-template-columns: 1fr; }
}
</style>

<body>
@include('partials.header')


<!-- ============================================
     HERO FORMATIONS
     ============================================ -->
<section class="hero-formations">
    <div class="container">
        <div class="hero-formations-grid">
            <div class="hero-formations-content">
                <div class="hero-label"><i class="fas fa-graduation-cap"></i> Formations Professionnelles</div>
                <h1 class="hero-title-nouveau">Trouvez votre formation et <span class="highlight-orange">enrichissez vos compétences</span></h1>
                <p class="hero-subtitle-nouveau">Des formations pratiques et certifiantes pour booster votre carrière, évoluer professionnellement et répondre aux exigences du marché.</p>

                <form action="{{ route('search.formations') }}" method="GET" class="hero-search-bar">
                    <input type="text" name="query" placeholder="Recherchez par mot-clé (ex: Comptabilité, Marketing...)" required>
                    <button type="submit"><i class="fas fa-search"></i> Rechercher</button>
                </form>

                <!-- Bouton Bons de Formation -->
                <div class="hero-bonus-cta">
                    <a href="{{ route('gift-vouchers.index') }}" class="btn-bon-cadeau">
                        <span class="bon-icon"><i class="fas fa-gift"></i></span>
                        <span class="bon-text">
                            <span class="bon-label">🎁 Offrir une formation</span>
                            <span class="bon-sublabel">Achetez un bon cadeau</span>
                        </span>
                        <span class="bon-arrow"><i class="fas fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>

            <div class="hero-formations-image d-none d-lg-block">
                <img src="asset/img/idee.jpeg" alt="Formations professionnelles">
                <div class="hero-badge-float"><i class="fas fa-check-circle"></i> 500+ formateurs experts</div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     GROUPES DE FORMATIONS - 2 CARTES AU CHOIX
     ============================================ -->
@php
    $transPreview = $allFormations->filter(fn($f) => $f->inCategory('transversale'))->take(4);
    $metierPreview = $allFormations->filter(fn($f) => $f->inCategory('metier'))->take(4);
@endphp
<section class="groupes-formation-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Deux familles de compétences</div>
            <h2 class="section-title-big">Choisissez votre <span style="color: var(--orange);">groupe de formations</span></h2>
            <p class="section-subtitle">Sélectionnez un groupe pour découvrir la liste de ses thématiques de formation.</p>
        </div>

        <div class="groupes-grid">
            <a href="{{ route('formations', ['groupe' => 'transversale']) }}" class="groupe-card {{ $groupe === 'transversale' ? 'active' : '' }} animate-scroll">
                @if($groupe === 'transversale')
                    <span class="groupe-badge-selected">Sélectionné</span>
                @endif
                <div class="groupe-card-top">
                    <div class="groupe-icon"><i class="fas fa-layer-group"></i></div>
                    <div class="groupe-card-title">Nos Formations <span>Transversales</span></div>
                </div>
                <p class="groupe-card-desc">Développez des compétences essentielles, utiles dans tous les métiers.</p>
                <span class="groupe-count"><i class="fas fa-book-open"></i> {{ $countTransversale }} thématiques</span>
                <ul class="groupe-themes">
                    @foreach($transPreview as $theme)
                        <li>{{ $theme->titre }}</li>
                    @endforeach
                </ul>
                <span class="groupe-card-cta"><i class="fas fa-arrow-right"></i> Voir les thématiques</span>
            </a>

            <a href="{{ route('formations', ['groupe' => 'metier']) }}" class="groupe-card {{ $groupe === 'metier' ? 'active' : '' }} animate-scroll">
                @if($groupe === 'metier')
                    <span class="groupe-badge-selected">Sélectionné</span>
                @endif
                <div class="groupe-card-top">
                    <div class="groupe-icon"><i class="fas fa-briefcase"></i></div>
                    <div class="groupe-card-title">Nos Formations <span>Métiers et Techniques</span></div>
                </div>
                <p class="groupe-card-desc">Développez des compétences techniques pour exercer votre métier avec expertise.</p>
                <span class="groupe-count"><i class="fas fa-book-open"></i> {{ $countMetier }} thématiques</span>
                <ul class="groupe-themes">
                    @foreach($metierPreview as $theme)
                        <li>{{ $theme->titre }}</li>
                    @endforeach
                </ul>
                <span class="groupe-card-cta"><i class="fas fa-arrow-right"></i> Voir les thématiques</span>
            </a>
        </div>
    </div>
</section>

<!-- ============================================
     NOS FORMATIONS - GRID STYLE CAPTURE
     ============================================ -->
<section id="formations-grid-section" class="formations-grid-section section-padding">
    <div class="container">
        @if($groupe === 'transversale' || $groupe === 'metier')
            <div class="section-header-center animate-scroll">
                <div class="section-label-orange">Nos formations</div>
                <h2 class="section-title-big">
                    @if($groupe === 'transversale')
                        Formations <span style="color: var(--orange);">Transversales</span>
                    @else
                        Formations <span style="color: var(--orange);">Métiers et Techniques</span>
                    @endif
                </h2>
                <p class="section-subtitle">
                    @if($groupe === 'transversale')
                        Des compétences essentielles, utiles dans tous les métiers.
                    @else
                        Des compétences techniques pour exercer votre métier avec expertise.
                    @endif
                </p>
                <a href="{{ route('formations') }}" class="btn-link-reset"><i class="fas fa-arrow-left"></i> Choisir un autre groupe</a>
            </div>

            <div class="formations-grid">
                @forelse($formations as $formation)
                    <a href="{{ route('sous_formations', ['id' => $formation->id]) }}" class="formation-card-moderne animate-scroll" style="transition-delay: {{ $loop->index * 50 }}ms">
                        <div class="formation-icon-wrap">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <h3>{{ $formation->titre }}</h3>
                        <span class="formation-cours-count">
                            {{ $formation->total_cours_count }}
                        </span>
                    </a>
                @empty
                    <div class="col-12 text-center">
                        <p style="color: var(--gray-600);">Aucune thématique dans ce groupe pour le moment.</p>
                    </div>
                @endforelse
            </div>
        @else
            <div class="section-header-center animate-scroll">
                <div class="section-label-orange">À vous de choisir</div>
                <h2 class="section-title-big">Sélectionnez un <span style="color: var(--orange);">groupe</span> pour voir ses formations</h2>
                <p class="section-subtitle">Cliquez sur l'une des deux cartes ci-dessus pour afficher la liste de ses thématiques de formation.</p>
            </div>
        @endif
    </div>
</section>

<!-- ============================================
     SLIDER INSPIRANT
     ============================================ -->
<section class="section-padding" style="background: var(--white);">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Nos objectifs</div>
            <h2 class="section-title-big">Des formations pour <span style="color: var(--orange);">tous vos projets</span></h2>
        </div>

        <div class="slider-hero-formations animate-scroll">
            <div class="slide active">
                <img src="/asset/img/ok1.jpeg" alt="Créer son entreprise">
                <div class="slider-caption">
                    <h3>Créer son entreprise</h3>
                    <p>Acquérez les compétences essentielles à l'entrepreneuriat</p>
                </div>
            </div>
            <div class="slide">
                <img src="/asset/img/ok4.jpeg" alt="Marché">
                <div class="slider-caption">
                    <h3>Rester en adéquation avec le marché</h3>
                    <p>Maintenez vos compétences à jour</p>
                </div>
            </div>
            <div class="slide">
                <img src="/asset/img/ok3.jpeg" alt="Trouver un job">
                <div class="slider-caption">
                    <h3>Trouver un job</h3>
                    <p>Développez les compétences recherchées par les employeurs</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     AVANTAGES - SPLIT DESIGN
     ============================================ -->
<section class="avantages-section section-padding">
    <div class="container">
        <div class="avantages-layout">
            <div class="animate-scroll">
                <div class="section-label-orange">Pourquoi nous choisir ?</div>
                <h2 class="section-title-big" style="margin-bottom: 35px;">Une approche <span style="color: var(--orange);">sur-mesure</span> et efficace</h2>

                <div class="avantages-list">
                    <div class="avantage-item">
                        <div class="avantage-check"><i class="fas fa-chalkboard-teacher"></i></div>
                        <div>
                            <h4>Des formateurs experts</h4>
                            <p>Compétences techniques et pédagogiques pour adultes</p>
                        </div>
                    </div>
                    <div class="avantage-item">
                        <div class="avantage-check"><i class="fas fa-clipboard-list"></i></div>
                        <div>
                            <h4>Accompagnement complet</h4>
                            <p>De la conception du programme jusqu'à l'évaluation finale</p>
                        </div>
                    </div>
                    <div class="avantage-item">
                        <div class="avantage-check"><i class="fas fa-smile"></i></div>
                        <div>
                            <h4>Approche ludique et interactive</h4>
                            <p>Facilite l'assimilation des connaissances</p>
                        </div>
                    </div>
                    <div class="avantage-item">
                        <div class="avantage-check"><i class="fas fa-hands-helping"></i></div>
                        <div>
                            <h4>Mise en situation et pratique</h4>
                            <p>Jeux de rôle, partage d'expériences, apprentissage actif</p>
                        </div>
                    </div>
                    <div class="avantage-item">
                        <div class="avantage-check"><i class="fas fa-user-cog"></i></div>
                        <div>
                            <h4>Personnalisation totale</h4>
                            <p>Programme ajusté à votre niveau et vos besoins spécifiques</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="avantages-image-wrap animate-scroll">
                <img src="asset/img/formata.jpeg" alt="Formations pratiques">
                <div class="avantages-badge"><i class="fas fa-star"></i> 100% personnalisé</div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     NOS AVANTAGES DÉTAILLÉS
     ============================================ -->
<section class="section-padding" style="background: var(--cream);">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Nos atouts</div>
            <h2 class="section-title-big">Nos formations présentent de <span style="color: var(--orange);">nombreux avantages</span></h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6 animate-scroll">
                <div class="avantage-item" style="height: 100%;">
                    <div class="avantage-check"><i class="fas fa-clock"></i></div>
                    <div>
                        <h4>Gain de temps</h4>
                        <p>Votre formation peut être organisée dans les trois jours suivant votre demande.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 animate-scroll">
                <div class="avantage-item" style="height: 100%;">
                    <div class="avantage-check"><i class="fas fa-calendar-check"></i></div>
                    <div>
                        <h4>Horaires flexibles</h4>
                        <p>Le rythme et les horaires sont convenus avec vous pour s'adapter à vos contraintes.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 animate-scroll">
                <div class="avantage-item" style="height: 100%;">
                    <div class="avantage-check"><i class="fas fa-chart-line"></i></div>
                    <div>
                        <h4>Efficacité prouvée</h4>
                        <p>Formations pratiques, concrètes, participatives et adaptées à votre contexte.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 animate-scroll">
                <div class="avantage-item" style="height: 100%;">
                    <div class="avantage-check"><i class="fas fa-network-wired"></i></div>
                    <div>
                        <h4>Expertise territoriale</h4>
                        <p>Notre réseau de formateurs sur tout le territoire offre un large éventail de compétences.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 animate-scroll">
                <div class="avantage-item" style="height: 100%;">
                    <div class="avantage-check"><i class="fas fa-sliders-h"></i></div>
                    <div>
                        <h4>Sur-mesure garanti</h4>
                        <p>Aucune formation standardisée. Le programme est systématiquement ajusté à votre niveau et vos besoins.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     CHIFFRES CLÉS
     ============================================ -->
<section class="chiffres-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll" style="margin-bottom: 50px;">
            <div class="section-label-orange" style="color: white;">Chiffres clés</div>
            <h2 class="section-title-big" style="color: white;">Notre impact en <span style="color: #FFD700;">quelques chiffres</span></h2>
        </div>

        <div class="chiffres-grid">
            <div class="chiffre-item animate-scroll">
                <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                <div class="number">7+</div>
                <div class="label">Années d'expérience</div>
            </div>
            <div class="chiffre-item animate-scroll">
                <div class="icon"><i class="fas fa-users"></i></div>
                <div class="number">5000+</div>
                <div class="label">Apprenants accompagnés</div>
            </div>
            <div class="chiffre-item animate-scroll">
                <div class="icon"><i class="fas fa-chalkboard-teacher"></i></div>
                <div class="number">500+</div>
                <div class="label">Enseignants et formateurs</div>
            </div>
            <div class="chiffre-item animate-scroll">
                <div class="icon"><i class="fas fa-smile"></i></div>
                <div class="number">98%</div>
                <div class="label">Satisfaction des clients</div>
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
            <h2 class="section-title-big">Prêt à <span style="color: var(--orange);">développer vos compétences</span> ?</h2>
            <p class="section-subtitle">Recherchez votre formation idéale et commencez votre parcours vers la réussite professionnelle dès aujourd'hui.</p>

            <div class="cta-buttons-final">
                <a href="{{ url('/reponse') }}" class="btn-cta-final btn-orange"><i class="fas fa-search"></i> Faire une demande</a>
                <a href="tel:+2250153751544" class="btn-cta-final btn-outline-light"><i class="fas fa-phone-alt"></i> Nous contacter</a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     FOOTER
     ============================================ -->
<footer id="contact" class="footer-moderne">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand-moderne">
                <img src="asset/img/logo.png" alt="Monprofchezmoi">
                <p>Chez MONPROFCHEZMOI CI, nous croyons que chaque personne possède un potentiel unique. Notre mission est de révéler ce potentiel grâce à un accompagnement personnalisé, des enseignants qualifiés et des solutions adaptées à chaque étape de la vie.</p>
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
            <p>MONPROFCHEZMOI CI — Révéler les talents. Construire les réussites.</p>
            <p style="margin-top: 8px;">&copy; 2024 <a href="#">Monprofchezmoi-ci.com</a>. Tous droits réservés. Designed by <a href="#">FreeLance ADG</a></p>
        </div>
    </div>
</footer>

<!-- Back to Top -->
<a href="#" class="back-to-top-moderne" id="backToTop"><i class="fas fa-arrow-up"></i></a>

<!-- ============================================
     SCRIPTS
     ============================================ -->
<script>
// Scroll Progress + Navbar + Back to Top
window.addEventListener('scroll', function() {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    document.getElementById('scrollProgress').style.width = (scrollTop / scrollHeight * 100) + '%';

    const navbar = document.querySelector('.navbar-moderne');
    if (window.scrollY > 50) navbar.classList.add('scrolled');
    else navbar.classList.remove('scrolled');

    const backToTop = document.getElementById('backToTop');
    if (window.scrollY > 500) backToTop.classList.add('visible');
    else backToTop.classList.remove('visible');
});

// Spinner
window.addEventListener('load', function() {
    setTimeout(() => {

    // Si un groupe est sélectionné, descendre doucement vers la liste des formations
    const params = new URLSearchParams(window.location.search);
    if (params.get('groupe')) {
        const grid = document.getElementById('formations-grid-section');
        if (grid) {
            setTimeout(() => {
                window.scrollTo({ top: grid.offsetTop - 80, behavior: 'smooth' });
            }, 300);
        }
    }
});

// Scroll Animations (IntersectionObserver)
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
// Slider Hero Formations
const slides = document.querySelectorAll('.slider-hero-formations .slide');
let currentIndex = 0;
function showSlide(index) {
    slides.forEach(slide => slide.classList.remove('active'));
    slides[index].classList.add('active');
}
function nextSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    showSlide(currentIndex);
}
setInterval(nextSlide, 5000);
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>

