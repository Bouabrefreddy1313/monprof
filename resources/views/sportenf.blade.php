<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Sport Enfant - Monprofchezmoici.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Sport enfant, activités sportives, Abidjan, boxe enfants, coaching sportif" name="keywords">
    <meta content="Activités sportives pour enfants à domicile en Côte d'Ivoire. Ninja Boxing, Préparation Champion, Team Challenge." name="description">

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

    <!-- Bootstrap -->
    <link href="asset/css/courscss/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/courscss/style.css" rel="stylesheet">
</head>

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


html { scroll-behavior: smooth; }

body {
    font-family: 'Nunito', sans-serif;
    color: var(--gray-800);
    background: var(--white);
    overflow-x: hidden;
    line-height: 1.6;
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

/* User Connected */
.user-connected {
    display: flex;
    align-items: center;
    gap: 10px;
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
.btn-connect-outline {
    color: var(--gray-600);
    text-decoration: none;
    padding: 6px 12px;
    border-radius: 6px;
    transition: all 0.2s;
}
.btn-connect-outline:hover {
    color: var(--orange);
    background: var(--gray-50);
}


/* ============================================
   PAGE HERO - INTERNE
   ============================================ */
.page-hero {
    min-height: 55vh;
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 50%, #1a365d 100%);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    padding: 80px 0;
}
.page-hero::before {
    content: '';
    position: absolute;
    top: -20%; right: -10%;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(255,107,53,0.12), transparent 70%);
    border-radius: 50%;
    animation: float-hero 8s ease-in-out infinite;
}
.page-hero::after {
    content: '';
    position: absolute;
    bottom: -10%; left: -5%;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(59,130,246,0.08), transparent 70%);
    border-radius: 50%;
    animation: float-hero 10s ease-in-out infinite reverse;
}
@keyframes float-hero {
    0%, 100% { transform: translate(0, 0); }
    50% { transform: translate(-30px, -20px); }
}
.page-hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 900px;
    margin: 0 auto;
}
.page-hero-label {
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
    margin-bottom: 20px;
}
.page-hero-title {
    font-size: clamp(2rem, 4vw, 3.2rem);
    font-weight: 800;
    color: white;
    line-height: 1.15;
    margin-bottom: 16px;
}
.page-hero-title .highlight-orange {
    color: var(--orange);
    position: relative;
}
.page-hero-subtitle {
    font-size: 1.15rem;
    color: rgba(255,255,255,0.75);
    line-height: 1.8;
    max-width: 700px;
    margin: 0 auto 30px;
}
.page-hero-badges {
    display: flex;
    justify-content: center;
    gap: 16px;
    flex-wrap: wrap;
}
.page-hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    color: white;
    padding: 10px 20px;
    border-radius: 50px;
    font-size: 0.85rem;
    font-weight: 600;
}

/* ============================================
   BREADCRUMB
   ============================================ */
.breadcrumb-moderne {
    background: var(--cream);
    padding: 16px 0;
    border-bottom: 1px solid var(--gray-100);
}
.breadcrumb-moderne .container {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.85rem;
    color: var(--gray-600);
}
.breadcrumb-moderne a {
    color: var(--gray-600);
    text-decoration: none;
    transition: color 0.2s;
}
.breadcrumb-moderne a:hover {
    color: var(--orange);
}
.breadcrumb-moderne i {
    font-size: 0.7rem;
    color: var(--gray-400);
}
.breadcrumb-moderne .current {
    color: var(--orange);
    font-weight: 600;
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
   INTRO SECTION
   ============================================ */
.intro-section {
    background: var(--white);
}
.intro-content {
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
}
.intro-text {
    font-size: 1.15rem;
    color: var(--gray-600);
    line-height: 1.9;
    margin-bottom: 20px;
}
.intro-text strong {
    color: var(--blue);
}
.intro-highlight {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
    border: 1px solid rgba(255,107,53,0.2);
    color: var(--orange);
    padding: 12px 24px;
    border-radius: 50px;
    font-size: 0.95rem;
    font-weight: 600;
    margin-top: 20px;
}

/* ============================================
   ACTIVITÉS - CARDS GRID
   ============================================ */
.activites-section {
    background: var(--cream);
}
.activite-card {
    background: var(--white);
    border-radius: 24px;
    overflow: hidden;
    border: 1px solid var(--gray-100);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
}
.activite-card:hover {
    transform: translateY(-12px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.activite-header {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
    padding: 30px 35px;
    color: white;
    position: relative;
    overflow: hidden;
}
.activite-header::before {
    content: '';
    position: absolute;
    top: -30px; right: -30px;
    width: 120px; height: 120px;
    background: radial-gradient(circle, rgba(255,107,53,0.2), transparent 70%);
    border-radius: 50%;
}
.activite-header h3 {
    font-size: 1.5rem;
    font-weight: 800;
    margin-bottom: 6px;
    color: white;
    position: relative;
    z-index: 1;
}
.activite-header p {
    font-size: 0.95rem;
    color: rgba(255,255,255,0.75);
    position: relative;
    z-index: 1;
}
.activite-body {
    padding: 35px;
}
.activite-infos {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
    margin-bottom: 30px;
}
.activite-info-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 14px 16px;
    background: var(--cream);
    border-radius: 12px;
    font-size: 0.9rem;
    color: var(--gray-800);
    font-weight: 600;
}
.activite-info-item i {
    color: var(--orange);
    font-size: 1rem;
    min-width: 20px;
}
.activite-section-title {
    font-size: 1rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.activite-section-title i {
    color: var(--orange);
}
.activite-list {
    list-style: none;
    padding: 0;
    margin: 0 0 24px 0;
}
.activite-list li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 8px 0;
    font-size: 0.92rem;
    color: var(--gray-800);
    border-bottom: 1px solid var(--gray-100);
}
.activite-list li:last-child {
    border-bottom: none;
}
.activite-list li i {
    color: var(--orange);
    font-size: 0.85rem;
    margin-top: 4px;
    min-width: 16px;
}
.activite-competences {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 24px;
}
.competence-tag {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: linear-gradient(135deg, rgba(255,107,53,0.08), rgba(255,107,53,0.04));
    border: 1px solid rgba(255,107,53,0.15);
    color: var(--orange);
    padding: 6px 14px;
    border-radius: 50px;
    font-size: 0.82rem;
    font-weight: 600;
}
.activite-tarifs {
    background: linear-gradient(135deg, var(--cream), var(--gray-50));
    border-radius: 16px;
    padding: 24px;
    border: 1px solid var(--gray-100);
}
.activite-tarifs h4 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.activite-tarifs h4 i {
    color: var(--orange);
}
.tarif-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid var(--gray-200);
    font-size: 0.92rem;
}
.tarif-item:last-child {
    border-bottom: none;
}
.tarif-item .label {
    color: var(--gray-600);
    font-weight: 600;
}
.tarif-item .prix {
    color: var(--orange);
    font-weight: 800;
    font-size: 1.05rem;
}

/* ============================================
   BOUTON CONTACT / INSCRIPTION
   ============================================ */
.contact-btn {
    width: 100%;
    margin-top: 18px;
    padding: 14px 24px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 0.95rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: all 0.3s ease;
    background: var(--orange);
    color: white;
    box-shadow: var(--shadow-orange);
    border: none;
    cursor: pointer;
}
.contact-btn:hover {
    background: var(--orange-dark);
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(255,107,53,0.4);
    color: white;
}
.contact-btn i {
    transition: transform 0.3s ease;
}
.contact-btn:hover i {
    transform: translateX(4px);
}

@media (max-width: 767px) {
    .activite-infos {
        grid-template-columns: 1fr;
    }
    .activite-header h3 {
        font-size: 1.2rem;
    }
}

/* ============================================
   POURQUOI NOUS
   ============================================ */
.pourquoi-section {
    background: var(--white);
}
.pourquoi-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}
.pourquoi-card {
    background: var(--white);
    border-radius: 20px;
    padding: 35px 28px;
    border: 1px solid var(--gray-100);
    text-align: center;
    transition: all 0.4s ease;
}
.pourquoi-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.pourquoi-icon {
    width: 70px; height: 70px;
    border-radius: 18px;
    background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 1.8rem;
    color: var(--orange);
    transition: all 0.4s ease;
}
.pourquoi-card:hover .pourquoi-icon {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    color: white;
    transform: scale(1.1) rotate(-5deg);
    box-shadow: var(--shadow-orange);
}
.pourquoi-card h4 {
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 10px;
}
.pourquoi-card p {
    font-size: 0.92rem;
    color: var(--gray-600);
    line-height: 1.7;
    margin: 0;
}

@media (max-width: 991px) {
    .pourquoi-grid {
        grid-template-columns: 1fr;
    }
}

/* ============================================
   CTA FINAL
   ============================================ */
.cta-section {
    background: var(--blue);
    position: relative;
    overflow: hidden;
    text-align: center;
}
.cta-section::before {
    content: '';
    position: absolute;
    top: -100px; right: -100px;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(255,107,53,0.15), transparent 70%);
}
.cta-section .section-title-big {
    color: white;
    max-width: 700px;
    margin: 0 auto 20px;
}
.cta-section .section-subtitle {
    color: rgba(255,255,255,0.7);
    max-width: 600px;
    margin: 0 auto 40px;
}
.cta-buttons {
    display: flex;
    justify-content: center;
    gap: 16px;
    flex-wrap: wrap;
}
.btn-cta-orange {
    padding: 16px 32px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
    background: var(--orange);
    color: white;
    box-shadow: var(--shadow-orange);
    border: none;
    cursor: pointer;
}
.btn-cta-orange:hover {
    background: var(--orange-dark);
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(255,107,53,0.4);
    color: white;
}
.btn-cta-outline {
    padding: 16px 32px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
    background: transparent;
    color: white;
    border: 2px solid rgba(255,255,255,0.3);
}
.btn-cta-outline:hover {
    background: rgba(255,255,255,0.1);
    border-color: white;
    color: white;
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
    .page-hero { min-height: 45vh; padding: 60px 0; }
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
</style>
</head>
<body>

@include('partials.header')

<!-- Scroll Progress -->
<div class="scroll-progress" id="scrollProgress"></div>

<!-- Spinner -->

</div>

<!-- ============================================
     TOPBAR
     ============================================ -->
        <div class="topbar-info-minimal">
            <span><i class="fas fa-map-marker-alt"></i> Riviera 4 Synacassi 1, Abidjan</span>
            <span><i class="fas fa-phone-alt"></i> +225 01 53 75 15 44</span>
            <span><i class="fas fa-envelope"></i> info@monprofchezmoi-ci.com</span>
        </div>
        <div class="topbar-social-minimal">
            <a href="https://lc.cx/bI7TWa" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://lc.cx/bRCp37" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://lc.cx/apXwPN" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://youtube.com/@Monprofchezmoi" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</div>

<!-- ============================================
     NAVBAR
     ============================================ -->
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="asset/img/logo.png" alt="Monprofchezmoi" height="45">
        </a>

        <button class="navbar-toggler navbar-toggler-premium" type="button" data-bs-toggle="collapse" data-bs-target="#navbarModerne">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarModerne">
            <ul class="nav-menu-moderne ms-auto">
                <li class="nav-item-moderne"><a href="{{ url('/') }}" class="nav-link-moderne active">Accueil</a></li>

                <li class="nav-item-moderne">
                    <a href="#" class="nav-link-moderne">Primaire <i class="fas fa-chevron-down chevron"></i></a>
                    <div class="mega-menu-moderne">
                        <div class="mega-header-moderne">
                            <h4><i class="fas fa-child"></i> Primaire</h4>
                            <p>De la maternelle au CM2</p>
                        </div>
                        <div class="mega-body-moderne">
                            <div>
                                <div class="mega-col-title">Nos cours</div>
                                <a href="{{ url('/primaire') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book"></i></div><span>Soutien scolaire toutes matières</span></a>
                                <a href="{{ url('/accompagnement') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-puzzle-piece"></i></div><span>Accompagnement DYS</span></a>
                                <a href="{{ url('/methode') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-tasks"></i></div><span>Méthodologie et organisation</span></a>
                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/minimetier') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-briefcase"></i></div><span>Mini métiers</span></a>
                                <a href="{{ url('/codage') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-robot"></i></div><span>Robotique et ateliers créatifs</span></a>
                                <a href="{{ url('/petit') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-language"></i></div><span>Les petits bilingues</span></a>
                                <a href="{{ url('/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                                <a href="{{ url('/bouge') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-spell-check"></i></div><span>Bouge ta grammaire</span></a>
                                <a href="{{ url('/cabine') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book-reader"></i></div><span>Ma cabine à livres</span></a>
                                <a href="{{ url('/sportenf') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-running"></i></div><span>Sport enfant</span></a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item-moderne">
                    <a href="#" class="nav-link-moderne">Collège <i class="fas fa-chevron-down chevron"></i></a>
                    <div class="mega-menu-moderne">
                        <div class="mega-header-moderne">
                            <h4><i class="fas fa-school"></i> Collège</h4>
                            <p>De la 6ème à la 3ème</p>
                        </div>
                        <div class="mega-body-moderne">
                            <div>
                                <div class="mega-col-title">Nos cours</div>
                                <a href="{{ url('/soutien-collège') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book"></i></div><span>Soutien scolaire toutes matières</span></a>
                                <a href="{{ url('/coaching') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-graduation-cap"></i></div><span>Coaching scolaire</span></a>
                                <a href="{{ url('/college-methode') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-user-graduate"></i></div><span>Méthodologie et autonomie</span></a>
                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                
                                <a href="{{ url('/minimetier') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-briefcase"></i></div><span>Mini métiers</span></a>
                                <a href="{{ url('/college-competence') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-robot"></i></div><span>Robotique et ateliers créatifs</span></a>
                                <a href="{{ url('/petit') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-language"></i></div><span>Les petits bilingues</span></a>
                                                                <a href="{{ url('/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                                <a href="{{ url('/bouge') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-spell-check"></i></div><span>Bouge ta grammaire</span></a>
                                <a href="{{ url('/cabine') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book-reader"></i></div><span>Ma cabine à livres</span></a>
                                                                <a href="{{ url('/sportenf') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-running"></i></div><span>Sport enfant</span></a>

                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item-moderne">
                    <a href="#" class="nav-link-moderne">Lycée <i class="fas fa-chevron-down chevron"></i></a>
                    <div class="mega-menu-moderne">
                        <div class="mega-header-moderne">
                            <h4><i class="fas fa-university"></i> Lycée</h4>
                            <p>De la Seconde à la Terminale</p>
                        </div>
                        <div class="mega-body-moderne">
                            <div>
                                <div class="mega-col-title">Nos cours</div>
                                <a href="{{ url('/lycee-sous') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book"></i></div><span>Soutien scolaire toutes matières</span></a>
                                <a href="{{ url('/lycee-preparation') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-award"></i></div><span>Préparation Bac</span></a>
                                <a href="{{ url('/lycee-coaching') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-star"></i></div><span>Coaching méthodologique</span></a>
                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/minimetier') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-briefcase"></i></div><span>Mini métiers</span></a>
                                <a href="{{ url('/college-competence') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-robot"></i></div><span>Robotique</span></a>
                                <a href="{{ url('/petit') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-language"></i></div><span>Les petits bilingues</span></a>
                                                                <a href="{{ url('/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                                <a href="{{ url('/bouge') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-spell-check"></i></div><span>Bouge ta grammaire</span></a>
                                <a href="{{ url('/cabine') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book-reader"></i></div><span>Ma cabine à livres</span></a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item-moderne">
                    <a href="#" class="nav-link-moderne">Supérieur <i class="fas fa-chevron-down chevron"></i></a>
                    <div class="mega-menu-moderne">
                        <div class="mega-header-moderne">
                            <h4><i class="fas fa-user-graduate"></i> Supérieur</h4>
                            <p>De la licence au master</p>
                        </div>
                        <div class="mega-body-moderne">
                            <div>
                                <div class="mega-col-title">Nos cours</div>
                                <a href="{{ url('/soutien-superieur') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Soutien aux études supérieures</span></a>
                                <a href="{{ url('/orientation-superieur') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Orientation aux études supérieures</span></a>
                                <a href="{{ url('/groupe') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-calculator"></i></div><span>Préparation DCG / DSCG</span></a>
                                <a href="{{ url('/methode-superieur') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-tasks"></i></div><span>Méthodologie et organisation</span></a>

                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/reussir') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Préparation aux oraux</span></a>
                                <a href="{{ url('/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item-moderne">
                    <a href="#" class="nav-link-moderne">Adultes <i class="fas fa-chevron-down chevron"></i></a>
                    <div class="mega-menu-moderne">
                        <div class="mega-header-moderne">
                            <h4><i class="fas fa-user-graduate"></i> Adultes</h4>
                            <p>Formations et activités</p>
                        </div>
                        <div class="    ">
                            <div>
                                <div class="mega-col-title">Nos formations</div>
                                <a href="{{ route('gift-vouchers.index') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-calculator"></i></div><span>Nos bons cadeaux</span></a>
                                <a href="{{ url('/formations') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-chalkboard-teacher"></i></div><span>Toutes les formations professionnelles</span></a>

                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Sports à domicile pour adultes</span></a>
                                <a href="{{ url('/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item-moderne"><a href="https://mpcmformation-ci.com/" target="_blank" class="nav-link-moderne">Entreprise</a></li>


                <li class="nav-item-moderne"><a href="{{ url('/formations') }}" class="nav-link-moderne">Formations</a></li>
                <li class="nav-item-moderne"><a href="/contact" class="nav-link-moderne">Contact</a></li>
            </ul>

            <div class="ms-lg-3 mt-3 mt-lg-0">
                @auth
                    <div class="user-connected">
                        <a href="{{ route('video.dashboard') }}" class="d-flex align-items-center text-decoration-none">
                            <div class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                            <span class="user-name d-none d-lg-block">{{ Auth::user()->name }}</span>
                        </a>
                        <a href="{{ route('logout') }}" class="btn-connect-outline btn-sm"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    </div>
                @else
                    <a href="{{ url('/login') }}" class="btn-nav-cta"><i class="fas fa-user"></i> Connexion</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
<!-- ============================================
     PAGE HERO
     ============================================ -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content animate-scroll">
            <div class="page-hero-label"><i class="fas fa-running"></i> Activités sportives</div>
            <h1 class="page-hero-title">Sport <span class="highlight-orange">Enfant</span></h1>
            <p class="page-hero-subtitle">Bouger, grandir et prendre confiance en soi. Des programmes sportifs adaptés à l'âge et au niveau de chaque enfant.</p>
            <div class="page-hero-badges">
                <div class="page-hero-badge"><i class="fas fa-check-circle"></i> Ninja Boxing</div>
                <div class="page-hero-badge"><i class="fas fa-check-circle"></i> Préparation Champion</div>
                <div class="page-hero-badge"><i class="fas fa-check-circle"></i> Team Challenge</div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     BREADCRUMB
     ============================================ -->
<div class="breadcrumb-moderne">
    <div class="container">
        <a href="{{ url('/') }}">Accueil</a>
        <i class="fas fa-chevron-right"></i>
        <a href="{{ url('/sportenf') }}">Sport</a>
        <i class="fas fa-chevron-right"></i>
        <span class="current">Sport Enfant</span>
    </div>
</div>

<!-- ============================================
     INTRODUCTION
     ============================================ -->
<section class="intro-section section-padding">
    <div class="container">
        <div class="intro-content animate-scroll">
            <div class="section-label-orange">Présentation</div>
            <h2 class="section-title-big">Des activités sportives pour <span style="color: var(--orange);">s'épanouir</span></h2>
            <p class="intro-text">
                Chez <strong>MONPROFCHEZMOI</strong>, le sport est un formidable outil d'épanouissement. Nos activités sportives permettent aux enfants de développer leur <strong>condition physique, leur confiance en eux, leur discipline et leur esprit d'équipe</strong> dans un environnement sécurisé et motivant.
            </p>
            <p class="intro-text">
                Nos programmes sont <strong>adaptés à l'âge, au niveau et aux objectifs</strong> de chaque enfant. Chaque séance est pensée pour allier plaisir, progression et développement personnel.
            </p>
            <div class="intro-highlight">
                <i class="fas fa-star"></i> Un accompagnement sportif sur mesure pour chaque enfant
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     ACTIVITÉS
     ============================================ -->
<section class="activites-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Nos programmes</div>
            <h2 class="section-title-big">Nos <span style="color: var(--orange);">activités</span></h2>
            <p class="section-subtitle">Trois programmes sportifs conçus pour développer le potentiel de chaque enfant.</p>
        </div>

        <div class="row g-4">
            <!-- ACTIVITÉ 1 : NINJA BOXING -->
            <div class="col-12 animate-scroll">
                <div class="activite-card">
                    <div class="activite-header">
                        <h3><i class="fas fa-hand-rock"></i> Ninja Boxing</h3>
                        <p>Développer confiance, coordination et maîtrise de soi</p>
                    </div>
                    <div class="activite-body">
                        <div class="activite-infos">
                            <div class="activite-info-item"><i class="fas fa-child"></i> 6 à 12 ans</div>
                            <div class="activite-info-item"><i class="fas fa-signal"></i> Débutant accepté</div>
                            <div class="activite-info-item"><i class="fas fa-clock"></i> 1 heure / séance</div>
                            <div class="activite-info-item"><i class="fas fa-calendar-alt"></i> 2 à 3 séances / semaine</div>
                            <div class="activite-info-item" style="grid-column: span 2;"><i class="fas fa-map-marker-alt"></i> À domicile</div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="activite-section-title"><i class="fas fa-bullseye"></i> Ce que l'enfant apprendra</h4>
                                <ul class="activite-list">
                                    <li><i class="fas fa-check"></i> Les bases de la boxe éducative</li>
                                    <li><i class="fas fa-check"></i> La coordination des mouvements</li>
                                    <li><i class="fas fa-check"></i> Les réflexes et l'agilité</li>
                                    <li><i class="fas fa-check"></i> La maîtrise de soi</li>
                                    <li><i class="fas fa-check"></i> Le respect des règles</li>
                                    <li><i class="fas fa-check"></i> La confiance en soi</li>
                                    <li><i class="fas fa-check"></i> La discipline</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h4 class="activite-section-title"><i class="fas fa-dumbbell"></i> Activités proposées</h4>
                                <ul class="activite-list">
                                    <li><i class="fas fa-check"></i> Techniques de boxe adaptées aux enfants</li>
                                    <li><i class="fas fa-check"></i> Parcours ninja</li>
                                    <li><i class="fas fa-check"></i> Jeux sportifs</li>
                                    <li><i class="fas fa-check"></i> Défis physiques</li>
                                    <li><i class="fas fa-check"></i> Exercices de coordination</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h4 class="activite-section-title"><i class="fas fa-brain"></i> Compétences développées</h4>
                                <div class="activite-competences">
                                    <span class="competence-tag"><i class="fas fa-brain"></i> Concentration</span>
                                    <span class="competence-tag"><i class="fas fa-balance-scale"></i> Discipline</span>
                                    <span class="competence-tag"><i class="fas fa-running"></i> Coordination</span>
                                    <span class="competence-tag"><i class="fas fa-bolt"></i> Réactivité</span>
                                    <span class="competence-tag"><i class="fas fa-mountain"></i> Persévérance</span>
                                    <span class="competence-tag"><i class="fas fa-heart"></i> Confiance en soi</span>
                                </div>

                                <div class="activite-tarifs">
                                    <h4><i class="fas fa-tag"></i> Tarifs</h4>
                                    <div class="tarif-item">
                                        <span class="label">Séance</span>
                                        <span class="prix">12 000 FCFA</span>
                                    </div>
                                    <div class="tarif-item">
                                        <span class="label">Forfait 8 séances</span>
                                        <span class="prix">80 000 FCFA</span>
                                    </div>
                                    <div class="tarif-item">
                                        <span class="label">Forfait 12 séances</span>
                                        <span class="prix">110 000 FCFA</span>
                                    </div>
                                    <button class="contact-btn" onclick="openInscriptionModal('Ninja Boxing - Sport Enfant', '12000', '1 séance')">
    Je m'inscris
    <i class="fas fa-arrow-right"></i>
</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ACTIVITÉ 2 : PRÉPARATION CHAMPION -->
            <div class="col-12 animate-scroll">
                <div class="activite-card">
                    <div class="activite-header">
                        <h3><i class="fas fa-trophy"></i> Préparation Champion</h3>
                        <p>Développer son potentiel sportif et mental</p>
                    </div>
                    <div class="activite-body">
                        <div class="activite-infos">
                            <div class="activite-info-item"><i class="fas fa-child"></i> 6 à 12 ans</div>
                            <div class="activite-info-item"><i class="fas fa-signal"></i> Tous niveaux</div>
                            <div class="activite-info-item"><i class="fas fa-clock"></i> 1 heure / séance</div>
                            <div class="activite-info-item"><i class="fas fa-calendar-alt"></i> 2 à 3 séances / semaine</div>
                            <div class="activite-info-item" style="grid-column: span 2;"><i class="fas fa-map-marker-alt"></i> À domicile</div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="activite-section-title"><i class="fas fa-bullseye"></i> Ce que l'enfant apprendra</h4>
                                <ul class="activite-list">
                                    <li><i class="fas fa-check"></i> Développer son endurance</li>
                                    <li><i class="fas fa-check"></i> Améliorer sa rapidité</li>
                                    <li><i class="fas fa-check"></i> Renforcer sa coordination</li>
                                    <li><i class="fas fa-check"></i> Développer sa force physique</li>
                                    <li><i class="fas fa-check"></i> Gérer ses émotions</li>
                                    <li><i class="fas fa-check"></i> Développer un mental de gagnant</li>
                                    <li><i class="fas fa-check"></i> Fixer et atteindre des objectifs</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h4 class="activite-section-title"><i class="fas fa-dumbbell"></i> Contenu du programme</h4>
                                <ul class="activite-list">
                                    <li><i class="fas fa-check"></i> Renforcement musculaire adapté</li>
                                    <li><i class="fas fa-check"></i> Exercices cardio</li>
                                    <li><i class="fas fa-check"></i> Jeux sportifs</li>
                                    <li><i class="fas fa-check"></i> Coordination et mobilité</li>
                                    <li><i class="fas fa-check"></i> Préparation mentale</li>
                                    <li><i class="fas fa-check"></i> Suivi personnalisé</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h4 class="activite-section-title"><i class="fas fa-brain"></i> Compétences développées</h4>
                                <div class="activite-competences">
                                    <span class="competence-tag"><i class="fas fa-mountain"></i> Dépassement de soi</span>
                                    <span class="competence-tag"><i class="fas fa-balance-scale"></i> Discipline</span>
                                    <span class="competence-tag"><i class="fas fa-fire"></i> Motivation</span>
                                    <span class="competence-tag"><i class="fas fa-mountain"></i> Persévérance</span>
                                    <span class="competence-tag"><i class="fas fa-medal"></i> Esprit sportif</span>
                                    <span class="competence-tag"><i class="fas fa-heart"></i> Confiance en soi</span>
                                </div>

                                <div class="activite-tarifs">
                                    <h4><i class="fas fa-tag"></i> Tarifs</h4>
                                    <div class="tarif-item">
                                        <span class="label">Séance individuelle</span>
                                        <span class="prix">20 000 FCFA</span>
                                    </div>
                                    <div class="tarif-item">
                                        <span class="label">Forfait 8 séances</span>
                                        <span class="prix">140 000 FCFA</span>
                                    </div>
                                    <div class="tarif-item">
                                        <span class="label">Forfait 12 séances</span>
                                        <span class="prix">200 000 FCFA</span>
                                    </div>
                                    <button class="contact-btn" onclick="openInscriptionModal('Préparation Champion - Sport Enfant', '20000', '1 séance')">
    Je m'inscris
    <i class="fas fa-arrow-right"></i>
</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ACTIVITÉ 3 : TEAM CHALLENGE -->
            <div class="col-12 animate-scroll">
                <div class="activite-card">
                    <div class="activite-header">
                        <h3><i class="fas fa-users"></i> Team Challenge</h3>
                        <p>Apprendre à relever des défis ensemble</p>
                    </div>
                    <div class="activite-body">
                        <div class="activite-infos">
                            <div class="activite-info-item"><i class="fas fa-child"></i> 6 à 12 ans</div>
                            <div class="activite-info-item"><i class="fas fa-signal"></i> Débutant accepté</div>
                            <div class="activite-info-item"><i class="fas fa-clock"></i> 1 heure / séance</div>
                            <div class="activite-info-item"><i class="fas fa-calendar-alt"></i> 2 à 3 séances / semaine</div>
                            <div class="activite-info-item" style="grid-column: span 2;"><i class="fas fa-map-marker-alt"></i> À domicile</div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="activite-section-title"><i class="fas fa-bullseye"></i> Ce que l'enfant apprendra</h4>
                                <ul class="activite-list">
                                    <li><i class="fas fa-check"></i> Travailler en équipe</li>
                                    <li><i class="fas fa-check"></i> Respecter les règles</li>
                                    <li><i class="fas fa-check"></i> Développer sa motivation</li>
                                    <li><i class="fas fa-check"></i> Gérer les défis</li>
                                    <li><i class="fas fa-check"></i> Communiquer avec les autres</li>
                                    <li><i class="fas fa-check"></i> Développer sa confiance</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h4 class="activite-section-title"><i class="fas fa-dumbbell"></i> Activités proposées</h4>
                                <ul class="activite-list">
                                    <li><i class="fas fa-check"></i> Jeux sportifs collectifs</li>
                                    <li><i class="fas fa-check"></i> Parcours sportifs</li>
                                    <li><i class="fas fa-check"></i> Défis physiques</li>
                                    <li><i class="fas fa-check"></i> Mini compétitions</li>
                                    <li><i class="fas fa-check"></i> Circuits training adaptés</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h4 class="activite-section-title"><i class="fas fa-brain"></i> Compétences développées</h4>
                                <div class="activite-competences">
                                    <span class="competence-tag"><i class="fas fa-users"></i> Esprit d'équipe</span>
                                    <span class="competence-tag"><i class="fas fa-chess-king"></i> Leadership</span>
                                    <span class="competence-tag"><i class="fas fa-comments"></i> Communication</span>
                                    <span class="competence-tag"><i class="fas fa-mountain"></i> Persévérance</span>
                                    <span class="competence-tag"><i class="fas fa-mountain"></i> Dépassement de soi</span>
                                    <span class="competence-tag"><i class="fas fa-handshake"></i> Socialisation</span>
                                </div>

                                <div class="activite-tarifs">
                                    <h4><i class="fas fa-tag"></i> Tarifs</h4>
                                    <div class="tarif-item">
                                        <span class="label">Séance</span>
                                        <span class="prix">12 000 FCFA</span>
                                    </div>
                                    <div class="tarif-item">
                                        <span class="label">Forfait 8 séances</span>
                                        <span class="prix">80 000 FCFA</span>
                                    </div>
                                    <div class="tarif-item">
                                        <span class="label">Forfait 12 séances</span>
                                        <span class="prix">110 000 FCFA</span>
                                    </div>
                                    <button class="contact-btn" onclick="openInscriptionModal('Team Challenge - Sport Enfant', '12000', '1 séance')">
    Je m'inscris
    <i class="fas fa-arrow-right"></i>
</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
     POURQUOI NOUS
     ============================================ -->
<section class="pourquoi-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Pourquoi nous ?</div>
            <h2 class="section-title-big">Les atouts de <span style="color: var(--orange);">MONPROFCHEZMOI</span></h2>
            <p class="section-subtitle">Nous mettons tout en œuvre pour garantir l'épanouissement de chaque enfant.</p>
        </div>

        <div class="pourquoi-grid">
            <div class="pourquoi-card animate-scroll">
                <div class="pourquoi-icon"><i class="fas fa-user-shield"></i></div>
                <h4>Environnement sécurisé</h4>
                <p>Des séances encadrées par des professionnels dans un cadre sécurisé et adapté à l'âge de chaque enfant.</p>
            </div>
            <div class="pourquoi-card animate-scroll">
                <div class="pourquoi-icon"><i class="fas fa-sliders-h"></i></div>
                <h4>Programmes adaptés</h4>
                <p>Chaque programme est personnalisé selon l'âge, le niveau et les objectifs de progression de l'enfant.</p>
            </div>
            <div class="pourquoi-card animate-scroll">
                <div class="pourquoi-icon"><i class="fas fa-home"></i></div>
                <h4>À domicile</h4>
                <p>Les séances se déroulent directement à votre domicile pour plus de confort et de flexibilité.</p>
            </div>
            <div class="pourquoi-card animate-scroll">
                <div class="pourquoi-icon"><i class="fas fa-heart"></i></div>
                <h4>Épanouissement</h4>
                <p>Une approche positive centrée sur le plaisirdu sport, la confiance en soi et le développement personnel.</p>
            </div>
            <div class="pourquoi-card animate-scroll">
                <div class="pourquoi-icon"><i class="fas fa-chart-line"></i></div>
                <h4>Suivi de progression</h4>
                <p>Évaluation régulière des progrès physiques et mentaux de chaque enfant pour un accompagnement optimal.</p>
            </div>
            <div class="pourquoi-card animate-scroll">
                <div class="pourquoi-icon"><i class="fas fa-smile"></i></div>
                <h4>Plaisir garanti</h4>
                <p>Des activités variées et ludiques pour que chaque enfant prenne goût au sport et à l'effort.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     CTA FINAL
     ============================================ -->
<section class="cta-section section-padding">
    <div class="container">
        <div class="animate-scroll">
            <h2 class="section-title-big">Donnez à votre enfant le <span style="color: var(--orange);">plaisir du sport</span> dès aujourd'hui</h2>
            <p class="section-subtitle">Faites confiance à MONPROFCHEZMOI pour accompagner le développement sportif et personnel de votre enfant.</p>
            <div class="cta-buttons">
                <a href="{{ url('/reponse') }}" class="btn-cta-orange"><i class="fas fa-search"></i> Réserver une séance</a>
                <a href="tel:+2250153751544" class="btn-cta-outline"><i class="fas fa-phone-alt"></i> Être rappelé gratuitement</a>
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
                <img loading="lazy" decoding="async" src="asset/img/logo.png" alt="Monprofchezmoi">
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
<script>
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
            // ✅ Étape 2 : Redirection vers le nouveau système de paiement
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

    modal.innerHTML = `
        <div class="modal-success">
            <div class="modal-success-icon"><i class="fas fa-check"></i></div>
            <h3>Inscription envoyée !</h3>
            <p>Merci ${parentName}. Notre équipe vous contactera très prochainement au <strong>${phone}</strong> pour finaliser votre inscription.</p>
            <button class="btn-success-close" onclick="closeInscriptionModal()">Fermer</button>
        </div>
    `;
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

// ========== SCROLL PROGRESS & NAVBAR ==========
window.addEventListener('scroll', function() {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const progress = document.getElementById('scrollProgress');
    if (progress) {
        progress.style.width = (scrollTop / scrollHeight * 100) + '%';
    }

    const navbar = document.querySelector('.navbar-moderne');
    if (navbar) {
        if (window.scrollY > 50) navbar.classList.add('scrolled');
        else navbar.classList.remove('scrolled');
    }

    const backToTop = document.getElementById('backToTop');
    if (backToTop) {
        if (window.scrollY > 500) backToTop.classList.add('visible');
        else backToTop.classList.remove('visible');
    }
});



// ========== MOBILE MEGA MENU - CORRIGÉ ==========
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

// ========== SCROLL ANIMATIONS ==========
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

// ========== SMOOTH SCROLL ==========
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
</script>

<!-- Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>


