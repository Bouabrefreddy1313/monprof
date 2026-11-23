<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Soutien scolaire lycée - Monprofchezmoi-ci.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Soutien scolaire lycée, BAC, programme ivoirien, français, bilingue" name="keywords">
    <meta content="Accompagnement par matière pour les lycéens de la Seconde à la Terminale. Préparation au BAC." name="description">

    <link href="asset/img/favicon.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="asset/css/courscss/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/courscss/style.css" rel="stylesheet">
</head>

<style>
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
.scroll-progress {
    position: fixed; top: 0; left: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light), var(--blue-accent));
    z-index: 10000; width: 0%;
    transition: width 0.1s;
}

.topbar-minimal {
    background: var(--blue); padding: 8px 0; position: relative;
}
.topbar-minimal .container {
    display: flex; justify-content: space-between; align-items: center;
}
.topbar-info-minimal {
    display: flex; gap: 24px; align-items: center;
}
.topbar-info-minimal span {
    color: rgba(255,255,255,0.7); font-size: 0.78rem;
    display: flex; align-items: center; gap: 6px;
}
.topbar-info-minimal span i { color: var(--orange); font-size: 0.85rem; }
.topbar-social-minimal { display: flex; gap: 6px; }
.topbar-social-minimal a {
    width: 28px; height: 28px; border-radius: 6px;
    background: rgba(255,255,255,0.08);
    display: flex; align-items: center; justify-content: center;
    color: rgba(255,255,255,0.6); font-size: 0.75rem;
    transition: all 0.3s ease; text-decoration: none;
}
.topbar-social-minimal a:hover {
    background: var(--orange); color: white; transform: translateY(-2px);
}

.navbar-moderne {
    background: rgba(255,255,255,0.98);
    backdrop-filter: blur(20px); padding: 0;
    position: sticky; top: 0; z-index: 1030;
    border-bottom: 1px solid var(--gray-100);
    transition: all 0.3s ease;
}
.navbar-moderne.scrolled { box-shadow: var(--shadow-md); }
.navbar-moderne .navbar-brand {
    padding: 14px 0; font-weight: 800; font-size: 1.3rem;
    color: var(--blue) !important;
    display: flex; align-items: center; gap: 10px;
}
.navbar-moderne .navbar-brand img { height: 45px; width: auto; }
.nav-menu-moderne {
    display: flex; align-items: center; gap: 4px;
    list-style: none; margin: 0; padding: 0;
}
.nav-menu-moderne .nav-item-moderne { position: relative; }
.nav-menu-moderne .nav-link-moderne {
    color: var(--gray-800); font-weight: 600; font-size: 0.88rem;
    padding: 28px 16px; text-decoration: none;
    display: flex; align-items: center; gap: 5px;
    transition: all 0.3s ease; position: relative;
}
.nav-menu-moderne .nav-link-moderne::after {
    content: ''; position: absolute; bottom: 0; left: 16px; right: 16px;
    height: 3px; background: var(--orange); border-radius: 3px 3px 0 0;
    transform: scaleX(0); transition: transform 0.3s ease;
}
.nav-menu-moderne .nav-link-moderne:hover,
.nav-menu-moderne .nav-link-moderne.active { color: var(--orange); }
.nav-menu-moderne .nav-link-moderne:hover::after,
.nav-menu-moderne .nav-link-moderne.active::after { transform: scaleX(1); }
.nav-link-moderne .chevron {
    font-size: 0.6rem; transition: transform 0.3s ease; color: var(--orange);
}
.nav-item-moderne:hover .chevron { transform: rotate(180deg); }

.mega-menu-moderne {
    position: absolute; top: 100%; left: 50%;
    transform: translateX(-50%) translateY(10px);
    background: var(--white); border-radius: 16px;
    box-shadow: var(--shadow-xl); padding: 0; min-width: 600px;
    opacity: 0; visibility: hidden; transition: all 0.3s ease;
    z-index: 1029; overflow: hidden; border: 1px solid var(--gray-100);
}
.nav-item-moderne:hover .mega-menu-moderne {
    opacity: 1; visibility: visible;
    transform: translateX(-50%) translateY(0);
}
.mega-header-moderne {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
    padding: 20px 28px; color: white;
}
.mega-header-moderne h4 {
    font-size: 1.1rem; font-weight: 700; margin: 0;
    display: flex; align-items: center; gap: 10px;
}
.mega-header-moderne h4 i { color: var(--orange); }
.mega-header-moderne p {
    font-size: 0.82rem; color: rgba(255,255,255,0.7);
    margin: 4px 0 0 30px;
}
.mega-body-moderne {
    padding: 20px 28px; display: grid;
    grid-template-columns: 1fr 1fr; gap: 24px;
}
.mega-col-title {
    font-size: 0.7rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: 1.5px; color: var(--orange); margin-bottom: 12px;
    padding-bottom: 8px; border-bottom: 1px solid var(--gray-100);
}
.mega-link-moderne {
    display: flex; align-items: center; gap: 10px;
    padding: 8px 0; color: var(--gray-800);
    text-decoration: none; font-size: 0.88rem; font-weight: 500;
    transition: all 0.2s ease;
}
.mega-link-moderne:hover { color: var(--orange); transform: translateX(4px); }
.mega-link-icon {
    width: 32px; height: 32px; min-width: 32px; border-radius: 8px;
    background: var(--gray-50); display: flex;
    align-items: center; justify-content: center;
    color: var(--orange); font-size: 0.8rem; transition: all 0.2s ease;
}
.mega-link-moderne:hover .mega-link-icon {
    background: var(--orange); color: white;
}

.btn-nav-cta {
    background: var(--orange); color: white !important;
    padding: 10px 22px !important; border-radius: 8px;
    font-weight: 700; font-size: 0.85rem; text-decoration: none;
    transition: all 0.3s ease; border: none;
    display: inline-flex; align-items: center; gap: 6px;
}
.btn-nav-cta:hover {
    background: var(--orange-dark); transform: translateY(-2px);
    box-shadow: var(--shadow-orange); color: white !important;
}

.user-connected { display: flex; align-items: center; gap: 10px; }
.user-avatar {
    width: 36px; height: 36px; border-radius: 50%;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex; align-items: center; justify-content: center;
    color: white; font-weight: 700; font-size: 0.9rem;
}
.user-name { font-weight: 600; color: var(--gray-800); font-size: 0.9rem; }
.btn-connect-outline {
    color: var(--gray-600); text-decoration: none;
    padding: 6px 12px; border-radius: 6px; transition: all 0.2s;
}
.btn-connect-outline:hover { color: var(--orange); background: var(--gray-50); }

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

.page-hero {
    min-height: 50vh;
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 50%, #1a365d 100%);
    position: relative; overflow: hidden;
    display: flex; align-items: center; padding: 80px 0;
}
.page-hero::before {
    content: ''; position: absolute; top: -20%; right: -10%;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(255,107,53,0.12), transparent 70%);
    border-radius: 50%; animation: float-hero 8s ease-in-out infinite;
}
.page-hero::after {
    content: ''; position: absolute; bottom: -10%; left: -5%;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(59,130,246,0.08), transparent 70%);
    border-radius: 50%; animation: float-hero 10s ease-in-out infinite reverse;
}
@keyframes float-hero {
    0%, 100% { transform: translate(0, 0); }
    50% { transform: translate(-30px, -20px); }
}
.page-hero-content {
    position: relative; z-index: 2; text-align: center;
    max-width: 800px; margin: 0 auto;
}
.page-hero-label {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(255,107,53,0.15); border: 1px solid rgba(255,107,53,0.3);
    color: var(--orange-light); padding: 8px 18px;
    border-radius: 50px; font-size: 0.82rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px;
}
.page-hero-title {
    font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 800;
    color: white; line-height: 1.15; margin-bottom: 16px;
}
.page-hero-title .highlight-orange { color: var(--orange); position: relative; }
.page-hero-subtitle {
    font-size: 1.1rem; color: rgba(255,255,255,0.75);
    line-height: 1.8; max-width: 600px; margin: 0 auto;
}

.breadcrumb-moderne {
    background: var(--cream); padding: 16px 0;
    border-bottom: 1px solid var(--gray-100);
}
.breadcrumb-moderne .container {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.85rem; color: var(--gray-600);
}
.breadcrumb-moderne a {
    color: var(--gray-600); text-decoration: none; transition: color 0.2s;
}
.breadcrumb-moderne a:hover { color: var(--orange); }
.breadcrumb-moderne i { font-size: 0.7rem; color: var(--gray-400); }
.breadcrumb-moderne .current { color: var(--orange); font-weight: 600; }

.section-padding { padding: 100px 0; }
.section-header-center {
    text-align: center; max-width: 700px; margin: 0 auto 60px;
}
.section-label-orange {
    display: inline-flex; align-items: center; gap: 8px;
    font-size: 0.8rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: 2px; color: var(--orange); margin-bottom: 16px;
}
.section-label-orange::before {
    content: ''; width: 30px; height: 3px;
    background: var(--orange); border-radius: 2px;
}
.section-title-big {
    font-size: clamp(1.8rem, 3.5vw, 2.8rem); font-weight: 800;
    color: var(--blue); line-height: 1.2; margin-bottom: 16px;
}
.section-subtitle {
    font-size: 1.05rem; color: var(--gray-600); line-height: 1.8;
}

.presentation-section { background: var(--white); }
.presentation-layout {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 60px; align-items: center;
}
.presentation-image-wrap {
    position: relative; border-radius: 24px;
    overflow: hidden; box-shadow: var(--shadow-xl);
}
.presentation-image-wrap img {
    width: 100%; height: 500px; object-fit: cover;
    transition: transform 0.7s ease;
}
.presentation-image-wrap:hover img { transform: scale(1.05); }
.presentation-image-badge {
    position: absolute; bottom: 30px; left: 30px;
    background: var(--orange); color: white;
    padding: 14px 28px; border-radius: 14px;
    font-weight: 700; font-size: 1rem;
    box-shadow: var(--shadow-orange);
    display: flex; align-items: center; gap: 10px;
}
.presentation-content { padding: 20px 0; }
.presentation-content h2 {
    font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 800;
    color: var(--blue); line-height: 1.2; margin-bottom: 20px;
}
.presentation-content h2 span { color: var(--orange); }
.presentation-text {
    font-size: 1.05rem; color: var(--gray-600);
    line-height: 1.9; margin-bottom: 20px;
}
.presentation-highlight {
    display: inline-flex; align-items: center; gap: 8px;
    background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
    border: 1px solid rgba(255,107,53,0.2); color: var(--orange);
    padding: 10px 20px; border-radius: 50px;
    font-size: 0.9rem; font-weight: 600; margin-bottom: 24px;
}

@media (max-width: 991px) {
    .presentation-layout { grid-template-columns: 1fr; gap: 40px; }
    .presentation-image-wrap { order: -1; }
    .presentation-image-wrap img { height: 350px; }
}

.info-cards-section { background: var(--cream); }
.info-cards-grid {
    display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px;
}
.info-card-moderne {
    background: var(--white); border-radius: 20px;
    padding: 35px 30px; border: 1px solid var(--gray-100);
    transition: all 0.4s ease; position: relative; overflow: hidden;
}
.info-card-moderne::before {
    content: ''; position: absolute; top: 0; left: 0;
    width: 4px; height: 100%;
    background: linear-gradient(180deg, var(--orange), var(--orange-light));
    transition: width 0.4s ease;
}
.info-card-moderne:hover::before { width: 100%; opacity: 0.04; }
.info-card-moderne:hover {
    transform: translateY(-8px); box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.info-card-header {
    display: flex; align-items: center; gap: 14px; margin-bottom: 20px;
}
.info-card-icon {
    width: 50px; height: 50px; border-radius: 14px;
    background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
    display: flex; align-items: center; justify-content: center;
    color: var(--orange); font-size: 1.3rem; transition: all 0.3s ease;
}
.info-card-moderne:hover .info-card-icon {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    color: white; box-shadow: var(--shadow-orange);
}
.info-card-moderne h3 {
    font-size: 1.2rem; font-weight: 700; color: var(--blue); margin: 0;
}
.info-card-moderne p {
    font-size: 0.95rem; color: var(--gray-600); line-height: 1.7; margin-bottom: 16px;
}
.info-card-list { list-style: none; padding: 0; margin: 0; }
.info-card-list li {
    display: flex; align-items: center; gap: 10px;
    padding: 8px 0; font-size: 0.92rem; color: var(--gray-800);
    border-bottom: 1px solid var(--gray-100);
}
.info-card-list li:last-child { border-bottom: none; }
.info-card-list li i { color: var(--orange); font-size: 1rem; }
/* ============================================
   PAGE HERO - INTERNE
   ============================================ */
.page-hero {
    min-height: 55vh;
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 50%, #1a365d 100%);
    position: relative; overflow: hidden;
    display: flex; align-items: center; padding: 80px 0;
}
.page-hero::before {
    content: ''; position: absolute; top: -20%; right: -10%;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(255,107,53,0.12), transparent 70%);
    border-radius: 50%; animation: float-hero 8s ease-in-out infinite;
}
.page-hero::after {
    content: ''; position: absolute; bottom: -10%; left: -5%;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(59,130,246,0.08), transparent 70%);
    border-radius: 50%; animation: float-hero 10s ease-in-out infinite reverse;
}
@keyframes float-hero {
    0%, 100% { transform: translate(0, 0); }
    50% { transform: translate(-30px, -20px); }
}
.page-hero-content {
    position: relative; z-index: 2;
    text-align: center; max-width: 900px; margin: 0 auto;
}
.page-hero-label {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(255,107,53,0.15); border: 1px solid rgba(255,107,53,0.3);
    color: var(--orange-light); padding: 8px 18px;
    border-radius: 50px; font-size: 0.82rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px;
}
.page-hero-title {
    font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 800;
    color: white; line-height: 1.15; margin-bottom: 16px;
}
.page-hero-title .highlight-orange { color: var(--orange); position: relative; }
.page-hero-subtitle {
    font-size: 1.15rem; color: rgba(255,255,255,0.75);
    line-height: 1.8; max-width: 700px; margin: 0 auto 30px;
}
.page-hero-badges {
    display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;
}
.page-hero-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);
    color: white; padding: 10px 20px; border-radius: 50px;
    font-size: 0.85rem; font-weight: 600;
}


@media (max-width: 767px) { .info-cards-grid { grid-template-columns: 1fr; } }

.method-section { background: var(--white); }
.method-grid {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;
}
.method-card {
    background: var(--white); padding: 35px 28px;
    border-radius: 20px; border: 1px solid var(--gray-100);
    text-align: center; transition: all 0.4s ease;
    position: relative; overflow: hidden;
}
.method-card::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0;
    height: 4px; background: linear-gradient(90deg, var(--orange), var(--orange-light));
    transform: scaleX(0); transition: transform 0.4s ease;
}
.method-card:hover::before { transform: scaleX(1); }
.method-card:hover {
    transform: translateY(-8px); box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.method-step {
    width: 50px; height: 50px; border-radius: 50%;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px; font-size: 1.2rem; font-weight: 800; color: white;
    box-shadow: var(--shadow-orange);
}
.method-card h4 {
    font-size: 1.15rem; font-weight: 700; color: var(--blue); margin-bottom: 10px;
}
.method-card p {
    font-size: 0.9rem; color: var(--gray-600); line-height: 1.7; margin: 0;
}

@media (max-width: 991px) { .method-grid { grid-template-columns: 1fr; } }

/* ============================================
   TARIFS INTERACTIFS
   ============================================ */
.tarifs-section { background: var(--cream); }

.tarif-card-interactif {
    background: var(--white); border-radius: 24px; overflow: hidden;
    border: 1px solid var(--gray-100); position: relative; height: 100%;
    box-shadow: var(--shadow-md);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.tarif-card-interactif:hover {
    transform: translateY(-12px); box-shadow: var(--shadow-xl); border-color: transparent;
}
.tarif-card-interactif.recommande { border: 2px solid var(--orange); transform: scale(1.02); }
.tarif-card-interactif.recommande:hover { transform: scale(1.02) translateY(-12px); }

.badge-recommande-tarif {
    position: absolute; top: 0; right: 0; z-index: 2;
    background: var(--orange); color: white; padding: 8px 20px;
    font-size: 0.75rem; font-weight: 700; letter-spacing: 1px;
    border-radius: 0 0 0 16px;
}
.tarif-card-header {
    padding: 40px 30px; text-align: center; color: white;
    position: relative; overflow: hidden;
}
.tarif-card-header::before {
    content: ''; position: absolute; top: -40px; right: -40px;
    width: 150px; height: 150px; border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,0.15), transparent 70%);
}
.tarif-flag {
    width: 60px; height: 60px; border-radius: 16px;
    background: rgba(255,255,255,0.2); backdrop-filter: blur(10px);
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 16px; font-size: 1.5rem; position: relative; z-index: 1;
}
.tarif-card-header h3 {
    font-size: 1.3rem; font-weight: 800; margin-bottom: 12px;
    position: relative; z-index: 1; color: white;
}
.tarif-prix {
    font-size: 2.8rem; font-weight: 800; line-height: 1;
    margin-bottom: 8px; position: relative; z-index: 1;
}
.tarif-prix span { font-size: 0.95rem; font-weight: 600; opacity: 0.85; }
.tarif-duree { font-size: 0.9rem; opacity: 0.8; margin: 0; position: relative; z-index: 1; }
.tarif-duree i { margin-right: 6px; }

.tarif-card-body { padding: 30px; }
.tarif-features { list-style: none; padding: 0; margin: 0 0 24px 0; text-align: left; }
.tarif-features li {
    display: flex; align-items: flex-start; gap: 10px;
    padding: 10px 0; font-size: 0.9rem; color: var(--gray-600);
    border-bottom: 1px solid var(--gray-100);
}
.tarif-features li:last-child { border-bottom: none; }
.tarif-features li i { color: var(--orange); font-size: 0.85rem; margin-top: 3px; min-width: 16px; }

.tarif-formule-selector { margin-bottom: 20px; }
.tarif-formule-selector label {
    display: flex; align-items: center; gap: 8px; margin-bottom: 10px;
    font-size: 0.85rem; font-weight: 700; color: var(--blue);
    text-transform: uppercase; letter-spacing: 0.5px;
}
.tarif-formule-selector label i { color: var(--orange); }
.formule-select {
    width: 100%; padding: 14px 40px 14px 16px; border-radius: 12px;
    border: 2px solid var(--gray-200); background-color: var(--white);
    color: var(--gray-800); font-size: 0.85rem; font-weight: 600;
    font-family: 'Nunito', sans-serif; cursor: pointer;
    transition: all 0.3s ease; appearance: none; text-overflow: ellipsis;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23FF6B35' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 16px center;
}
.formule-select:hover { border-color: var(--orange-light); }
.formule-select:focus { outline: none; border-color: var(--orange); box-shadow: 0 0 0 4px rgba(255,107,53,0.1); }

.btn-tarif {
    width: 100%; padding: 16px 24px; border-radius: 12px;
    font-weight: 700; font-size: 1rem; text-decoration: none;
    display: inline-flex; align-items: center; justify-content: center; gap: 10px;
    background: linear-gradient(135deg, var(--orange) 0%, var(--orange-light) 100%);
    color: white; border: none; cursor: pointer; position: relative; overflow: hidden;
    box-shadow: var(--shadow-orange); transition: all 0.3s ease;
}
.btn-tarif::before {
    content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s ease;
}
.btn-tarif:hover::before { left: 100%; }
.btn-tarif:hover {
    background: linear-gradient(135deg, var(--orange-dark) 0%, var(--orange) 100%);
    transform: translateY(-3px); box-shadow: 0 12px 32px rgba(255,107,53,0.4); color: white;
}
.btn-tarif i { transition: transform 0.3s ease; }
.btn-tarif:hover i { transform: translateX(4px); }

@keyframes pulse-glow {
    0%, 100% { box-shadow: 0 0 0 0 rgba(255,107,53,0.4); }
    50% { box-shadow: 0 0 0 15px rgba(255,107,53,0); }
}
.pulse-btn { animation: pulse-glow 2s infinite; }

.tarif-conditions-box {
    background: linear-gradient(135deg, var(--gray-50) 0%, var(--cream) 100%);
    border-radius: 20px; padding: 35px 40px; border: 1px solid var(--gray-100);
}
.tarif-conditions-box h4 {
    font-size: 1.1rem; font-weight: 700; color: var(--blue);
    margin-bottom: 20px; display: flex; align-items: center; gap: 10px;
}
.tarif-conditions-list { list-style: none; padding: 0; margin: 0; }
.tarif-conditions-list li {
    display: flex; align-items: center; gap: 10px;
    padding: 8px 0; font-size: 0.92rem; color: var(--gray-600);
}
.tarif-conditions-list li i { color: var(--orange); font-size: 0.9rem; }

@media (max-width: 767px) {
    .tarif-prix { font-size: 2.2rem; }
    .tarif-card-header { padding: 30px 20px; }
    .tarif-card-body { padding: 24px 20px; }
    .tarif-conditions-box { padding: 24px; }
}

.why-section { background: var(--white); }
.why-grid {
    display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;
    max-width: 800px; margin: 0 auto;
}
.why-item {
    display: flex; align-items: flex-start; gap: 16px;
    padding: 24px; background: var(--cream);
    border-radius: 16px; border: 1px solid var(--gray-100);
    transition: all 0.3s ease;
}
.why-item:hover {
    transform: translateX(8px); box-shadow: var(--shadow-md);
    border-color: transparent;
}
.why-icon {
    width: 48px; height: 48px; min-width: 48px; border-radius: 12px;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex; align-items: center; justify-content: center;
    color: white; font-size: 1.2rem;
    box-shadow: var(--shadow-orange);
}
.why-item h4 {
    font-size: 1.05rem; font-weight: 700; color: var(--blue); margin-bottom: 4px;
}
.why-item p {
    font-size: 0.9rem; color: var(--gray-600); margin: 0; line-height: 1.6;
}

@media (max-width: 767px) { .why-grid { grid-template-columns: 1fr; } }

.cta-section {
    background: var(--blue); position: relative; overflow: hidden; text-align: center;
}
.cta-section::before {
    content: ''; position: absolute; top: -100px; right: -100px;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(255,107,53,0.15), transparent 70%);
}
.cta-section .section-title-big {
    color: white; max-width: 700px; margin: 0 auto 20px;
}
.cta-section .section-subtitle {
    color: rgba(255,255,255,0.7); max-width: 600px; margin: 0 auto 40px;
}
.cta-buttons {
    display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;
}
.btn-cta-orange {
    padding: 16px 32px; border-radius: 12px; font-weight: 700;
    font-size: 1rem; text-decoration: none;
    display: inline-flex; align-items: center; gap: 10px;
    transition: all 0.3s ease;
    background: var(--orange); color: white; box-shadow: var(--shadow-orange);
}
.btn-cta-orange:hover {
    background: var(--orange-dark); transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(255,107,53,0.4); color: white;
}
.btn-cta-outline {
    padding: 16px 32px; border-radius: 12px; font-weight: 700;
    font-size: 1rem; text-decoration: none;
    display: inline-flex; align-items: center; gap: 10px;
    transition: all 0.3s ease;
    background: transparent; color: white;
    border: 2px solid rgba(255,255,255,0.3);
}
.btn-cta-outline:hover {
    background: rgba(255,255,255,0.1); border-color: white; color: white;
}

.footer-moderne {
    background: var(--blue); padding-top: 80px;
}
.footer-grid {
    display: grid; grid-template-columns: 1.5fr 1fr 1fr 1fr;
    gap: 50px; padding-bottom: 60px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}
.footer-brand-moderne img {
    height: 50px; margin-bottom: 20px;
    filter: brightness(0) invert(1); opacity: 0.9;
}
.footer-brand-moderne p {
    color: rgba(255,255,255,0.65); font-size: 0.92rem;
    line-height: 1.8; margin-bottom: 24px;
}
.footer-social-moderne { display: flex; gap: 10px; }
.footer-social-moderne a {
    width: 40px; height: 40px; border-radius: 10px;
    background: rgba(255,255,255,0.08);
    display: flex; align-items: center; justify-content: center;
    color: rgba(255,255,255,0.7); font-size: 0.9rem;
    transition: all 0.3s ease; text-decoration: none;
}
.footer-social-moderne a:hover {
    background: var(--orange); color: white; transform: translateY(-3px);
}
.footer-col-title {
    font-size: 1rem; font-weight: 700; color: white;
    margin-bottom: 24px; padding-bottom: 12px;
    border-bottom: 2px solid var(--orange); display: inline-block;
}
.footer-links-moderne {
    display: flex; flex-direction: column; gap: 12px;
}
.footer-links-moderne a {
    color: rgba(255,255,255,0.65); text-decoration: none;
    font-size: 0.9rem; transition: all 0.2s ease;
    display: flex; align-items: center; gap: 8px;
}
.footer-links-moderne a:hover {
    color: var(--orange); transform: translateX(4px);
}
.footer-links-moderne a::before {
    content: '›'; color: var(--orange); font-weight: 700; font-size: 1.2rem;
}
.footer-contact-moderne {
    display: flex; flex-direction: column; gap: 14px;
}
.footer-contact-item-moderne {
    display: flex; align-items: flex-start; gap: 12px;
    color: rgba(255,255,255,0.65); font-size: 0.9rem;
}
.footer-contact-item-moderne i {
    color: var(--orange); margin-top: 4px; font-size: 0.9rem;
}
.footer-bottom-moderne { padding: 24px 0; text-align: center; }
.footer-bottom-moderne p {
    color: rgba(255,255,255,0.5); font-size: 0.88rem; margin: 0;
}
.footer-bottom-moderne a { color: var(--orange); text-decoration: none; }

@media (max-width: 991px) { .footer-grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 767px) { .footer-grid { grid-template-columns: 1fr; } }

.back-to-top-moderne {
    position: fixed; bottom: 30px; right: 30px;
    width: 50px; height: 50px; border-radius: 14px;
    background: var(--orange); color: white;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; box-shadow: var(--shadow-orange);
    transition: all 0.4s ease; z-index: 999;
    text-decoration: none; opacity: 0; visibility: hidden;
    transform: translateY(20px);
}
.back-to-top-moderne.visible {
    opacity: 1; visibility: visible; transform: translateY(0);
}
.back-to-top-moderne:hover {
    transform: translateY(-5px) scale(1.05); background: var(--orange-dark);
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-scroll {
    opacity: 0; transform: translateY(30px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}
.animate-scroll.visible { opacity: 1; transform: translateY(0); }
.animate-slide-left {
    opacity: 0; transform: translateX(-50px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}
.animate-slide-left.visible { opacity: 1; transform: translateX(0); }
.animate-slide-right {
    opacity: 0; transform: translateX(50px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}
.animate-slide-right.visible { opacity: 1; transform: translateX(0); }
.animate-scale {
    opacity: 0; transform: scale(0.8);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}
.animate-scale.visible { opacity: 1; transform: scale(1); }

@media (max-width: 767px) {
    .section-padding { padding: 60px 0; }
    .page-hero { min-height: 40vh; padding: 60px 0; }
}

/* Modal */
.modal-inscription-overlay {
    position: fixed; inset: 0;
    background: rgba(10, 22, 40, 0.6); backdrop-filter: blur(8px);
    z-index: 10000; display: flex; align-items: center; justify-content: center;
    padding: 20px; opacity: 0; visibility: hidden; transition: all 0.3s ease;
}
.modal-inscription-overlay.active { opacity: 1; visibility: visible; }
.modal-inscription {
    background: var(--white); border-radius: 24px; width: 100%;
    max-width: 700px; max-height: 90vh; overflow-y: auto; position: relative;
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
.form-group input, .form-group select {
    width: 100%; padding: 12px 14px; border: 2px solid var(--gray-200);
    border-radius: 10px; font-family: 'Nunito', sans-serif;
    font-size: 0.9rem; color: var(--gray-800);
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

<body>
@include('partials.header')


<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content animate-scroll">
            <div class="page-hero-label"><i class="fas fa-university"></i> Soutien Scolaire</div>
            <h1 class="page-hero-title">Soutien scolaire <span class="highlight-orange">lycée</span></h1>
            <p class="page-hero-subtitle">Un accompagnement par matière pour réussir au lycée et préparer son avenir. De la Seconde à la Terminale.</p>
            <div class="page-hero-badges">
                <div class="page-hero-badge"><i class="fas fa-check-circle"></i> Système Français</div>
                <div class="page-hero-badge"><i class="fas fa-check-circle"></i> Système Ivoirien</div>
                <div class="page-hero-badge"><i class="fas fa-check-circle"></i> Système Americain</div>
                <div class="page-hero-badge"><i class="fas fa-check-circle"></i> Système IB</div>
                <div class="page-hero-badge"><i class="fas fa-check-circle"></i> Système Bilingue</div>
            </div>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
<div class="breadcrumb-moderne">
    <div class="container">
        <a href="{{ url('/') }}">Accueil</a>
        <i class="fas fa-chevron-right"></i>
        <a href="{{ url('/reponse') }}">Lycée</a>
        <i class="fas fa-chevron-right"></i>
        <span class="current">Soutien scolaire</span>
    </div>
</div>

<!-- Presentation -->
<section class="presentation-section section-padding">
    <div class="container">
        <div class="presentation-layout">
            <div class="presentation-image-wrap animate-slide-left">
                <img src="asset/img/SUP.jpg" alt="Lycéens africains en cours">
                <div class="presentation-image-badge">
                    <i class="fas fa-graduation-cap"></i> 2nde à Terminale
                </div>
            </div>
            <div class="presentation-content animate-slide-right">
                <div class="section-label-orange">Présentation</div>
                <h2>Réussir au <span>lycée</span> et préparer son avenir</h2>
                <div class="presentation-highlight"><i class="fas fa-globe"></i> Programme ivoirien, français & bilingue</div>
                <p class="presentation-text">
                    <strong>Le lycée représente une étape décisive</strong> dans le parcours scolaire. Les programmes deviennent plus exigeants, les méthodes de travail évoluent et les résultats scolaires jouent un rôle important dans la poursuite des études.
                </p>
                <p class="presentation-text">
                    <strong>MONPROFCHEZMOI</strong> accompagne les lycéens de la Seconde à la Terminale avec des cours de soutien par matière, dispensés par des enseignants spécialisés dans chaque discipline.
                </p>
                <p class="presentation-text">
                    Nos accompagnements s'adaptent à tous les programmes scolaires : <strong>ivoirien 🇨🇮, français 🇫🇷 et bilingue 🌍</strong>. Notre objectif est d'aider chaque élève à renforcer ses connaissances, améliorer ses performances et préparer efficacement ses examens.
                </p>
                <a href="#tarifs" class="btn-cta-orange" style="margin-top: 10px;"><i class="fas fa-tag"></i> Voir les tarifs</a>
            </div>
        </div>
    </div>
</section>

<!-- Matières -->
<section class="info-cards-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Programme</div>
            <h2 class="section-title-big">Matières proposées au <span style="color: var(--orange);">lycée</span></h2>
            <p class="section-subtitle">Des cours de soutien dans toutes les disciplines du lycée.</p>
        </div>
        <div class="info-cards-grid">
            <div class="info-card-moderne animate-scroll">
                <div class="info-card-header">
                    <div class="info-card-icon"><i class="fas fa-book"></i></div>
                    <h3>Langues & Littérature</h3>
                </div>
                <p>Maîtrise des langues et expression :</p>
                <ul class="info-card-list">
                    <li><i class="fas fa-check-circle"></i> Français — grammaire, rédaction, analyse</li>
                    <li><i class="fas fa-check-circle"></i> Anglais — compréhension, expression, vocabulaire</li>
                    <li><i class="fas fa-check-circle"></i> Espagnol — niveaux débutant à avancé</li>
                    <li><i class="fas fa-check-circle"></i> Allemand — cours adaptés au programme</li>
                    <li><i class="fas fa-check-circle"></i> Philosophie — méthodologie dissertation</li>
                </ul>
            </div>
            <div class="info-card-moderne animate-scroll">
                <div class="info-card-header">
                    <div class="info-card-icon"><i class="fas fa-calculator"></i></div>
                    <h3>Sciences & Sciences humaines</h3>
                </div>
                <p>Renforcement des compétences scientifiques et sociales :</p>
                <ul class="info-card-list">
                    <li><i class="fas fa-check-circle"></i> Mathématiques — algèbre, analyse, géométrie</li>
                    <li><i class="fas fa-check-circle"></i> Physique-Chimie — méthodes et exercices</li>
                    <li><i class="fas fa-check-circle"></i> SVT — sciences de la vie et de la Terre</li>
                    <li><i class="fas fa-check-circle"></i> Histoire-Géographie</li>
                    <li><i class="fas fa-check-circle"></i> Économie</li>
                    <li><i class="fas fa-check-circle"></i> Informatique</li>
                </ul>
            </div>
            <div class="info-card-moderne animate-scroll">
                <div class="info-card-header">
                    <div class="info-card-icon"><i class="fas fa-bullseye"></i></div>
                    <h3>Pour quels besoins ?</h3>
                </div>
                <p>Nos accompagnements répondent à tous les objectifs :</p>
                <ul class="info-card-list">
                    <li><i class="fas fa-check-circle"></i> Renforcer une matière difficile</li>
                    <li><i class="fas fa-check-circle"></i> Améliorer les résultats scolaires</li>
                    <li><i class="fas fa-check-circle"></i> Combler des lacunes</li>
                    <li><i class="fas fa-check-circle"></i> Préparer les devoirs et contrôles</li>
                    <li><i class="fas fa-check-circle"></i> Préparer les examens (BAC)</li>
                    <li><i class="fas fa-check-circle"></i> Se préparer aux études supérieures</li>
                </ul>
            </div>
            <div class="info-card-moderne animate-scroll">
                <div class="info-card-header">
                    <div class="info-card-icon"><i class="fas fa-award"></i></div>
                    <h3>Préparation au BAC</h3>
                </div>
                <p>Accompagnement complet pour l'examen :</p>
                <ul class="info-card-list">
                    <li><i class="fas fa-check-circle"></i> Révision des notions essentielles</li>
                    <li><i class="fas fa-check-circle"></i> Entraînement sur des sujets d'examen</li>
                    <li><i class="fas fa-check-circle"></i> Méthodes de rédaction et de résolution</li>
                    <li><i class="fas fa-check-circle"></i> Organisation des révisions</li>
                    <li><i class="fas fa-check-circle"></i> Gestion du temps et préparation mentale</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Méthode -->
<section class="method-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Notre méthode</div>
            <h2 class="section-title-big">Notre méthode d'<span style="color: var(--orange);">accompagnement</span></h2>
            <p class="section-subtitle">Un processus structuré en 3 étapes pour une progression optimale.</p>
        </div>
        <div class="method-grid">
            <div class="method-card animate-scale">
                <div class="method-step">1</div>
                <h4>Analyse des besoins</h4>
                <p>Nous identifions les matières prioritaires, le niveau actuel de l'élève, ses difficultés rencontrées et ses objectifs scolaires pour établir un plan de travail personnalisé.</p>
            </div>
            <div class="method-card animate-scale">
                <div class="method-step">2</div>
                <h4>Enseignant spécialisé</h4>
                <p>Nous proposons un professeur adapté selon la matière choisie, le niveau scolaire, le programme suivi et les objectifs de progression de l'élève.</p>
            </div>
            <div class="method-card animate-scale">
                                <div class="method-step">3</div>
                <h4>Suivi pédagogique</h4>
                <p>L'accompagnement comprend la reprise des cours incompris, des explications adaptées, des exercices d'application, la préparation aux évaluations et un suivi régulier des progrès.</p>
            </div>
        </div>
    </div>
</section>

<!-- Formats de cours -->
<section class="info-cards-section section-padding" style="background: var(--white);">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Formats</div>
            <h2 class="section-title-big">Nos formats de <span style="color: var(--orange);">cours</span></h2>
            <p class="section-subtitle">Choisissez le mode d'accompagnement qui convient le mieux à votre enfant.</p>
        </div>
        <div class="info-cards-grid">
            <div class="info-card-moderne animate-slide-left">
                <div class="info-card-header">
                    <div class="info-card-icon"><i class="fas fa-home"></i></div>
                    <h3>Cours à domicile</h3>
                </div>
                <p>Un accompagnement personnalisé dans l'environnement familier de l'élève :</p>
                <ul class="info-card-list">
                    <li><i class="fas fa-check-circle"></i> Enseignant à votre domicile</li>
                    <li><i class="fas fa-check-circle"></i> Cadre confortable et familier</li>
                    <li><i class="fas fa-check-circle"></i> Horaires flexibles</li>
                    <li><i class="fas fa-check-circle"></i> Suivi personnalisé</li>
                </ul>
            </div>
            <div class="info-card-moderne animate-slide-right">
                <div class="info-card-header">
                    <div class="info-card-icon"><i class="fas fa-laptop"></i></div>
                    <h3>Cours en ligne</h3>
                </div>
                <p>Une solution flexible et accessible depuis n'importe où :</p>
                <ul class="info-card-list">
                    <li><i class="fas fa-check-circle"></i> Visioconférence interactive</li>
                    <li><i class="fas fa-check-circle"></i> Partage d'écran et documents</li>
                    <li><i class="fas fa-check-circle"></i> Accessible partout en Côte d'Ivoire</li>
                    <li><i class="fas fa-check-circle"></i> Replay des séances disponible</li>
                </ul>
            </div>
            <div class="info-card-moderne animate-slide-left">
                <div class="info-card-header">
                    <div class="info-card-icon"><i class="fas fa-school"></i></div>
                    <h3>Cours au centre</h3>
                </div>
                <p>Un cadre adapté pour favoriser les apprentissages en groupe :</p>
                <ul class="info-card-list">
                    <li><i class="fas fa-check-circle"></i> Salle équipée et studieuse</li>
                    <li><i class="fas fa-check-circle"></i> Interaction avec d'autres élèves</li>
                    <li><i class="fas fa-check-circle"></i> Matériel pédagogique complet</li>
                    <li><i class="fas fa-check-circle"></i> Ambiance de travail motivante</li>
                </ul>
            </div>
            <div class="info-card-moderne animate-slide-right">
                <div class="info-card-header">
                    <div class="info-card-icon"><i class="fas fa-calendar-alt"></i></div>
                    <h3>Fréquence recommandée</h3>
                </div>
                <p>Des formules adaptées à chaque besoin :</p>
                <ul class="info-card-list">
                    <li><i class="fas fa-check-circle"></i> <strong>4 séances/mois</strong> — Accompagnement ponctuel</li>
                    <li><i class="fas fa-check-circle"></i> <strong>8 séances/mois ⭐</strong> — Progression régulière</li>
                    <li><i class="fas fa-check-circle"></i> <strong>12 séances/mois</strong> — Accompagnement renforcé</li>
                    <li><i class="fas fa-check-circle"></i> Durée : 2 heures par séance</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     TARIFS INTERACTIFS
     ============================================ -->
@php
    $formules = [
        ['n' => 1,  'label' => '1 séance'],
        ['n' => 4,  'label' => 'Formule Essentielle (4 séances)'],
        ['n' => 8,  'label' => 'Formule Recommandée (8 séances)'],
        ['n' => 12, 'label' => 'Formule Renforcée (12 séances)'],
    ];

    $programmes = [
        [
            'id' => 'iv', 'nom' => 'Programme Ivoirien', 'prix' => 18000,
            'icone' => 'fa-flag', 'populaire' => false,
            'gradient' => 'linear-gradient(135deg, #FF8200 0%, #FF9933 100%)',
            'features' => ['Toutes matières du programme ivoirien', 'Enseignant spécialisé', 'Suivi personnalisé'],
        ],
        [
            'id' => 'fr', 'nom' => 'Programme Français', 'prix' => 30000,
            'icone' => 'fa-flag', 'populaire' => false,
            'gradient' => 'linear-gradient(135deg, #0055A4 0%, #3B82F6 100%)',
            'features' => ['Toutes matières du programme français', 'Enseignant spécialisé', 'Suivi personnalisé'],
        ],
        [
            'id' => 'bi', 'nom' => 'Programme Bilingue', 'prix' => 30000,
            'icone' => 'fa-globe', 'populaire' => true,
            'gradient' => 'linear-gradient(135deg, var(--orange) 0%, var(--orange-light) 100%)',
            'features' => ['Programme bilingue complet', 'Enseignant spécialisé bilingue', 'Suivi personnalisé renforcé'],
        ],
        [
            'id' => 'us', 'nom' => 'Programme Américain', 'prix' => 30000,
            'icone' => 'fa-flag-usa', 'populaire' => false,
            'gradient' => 'linear-gradient(135deg, #B22234 0%, #3C3B6E 100%)',
            'features' => ['Toutes matières du programme américain', 'Enseignant spécialisé programme américain', 'Suivi personnalisé renforcé'],
        ],
        [
            'id' => 'ib', 'nom' => 'Programme IB', 'prix' => 30000,
            'icone' => 'fa-globe-europe', 'populaire' => false,
            'gradient' => 'linear-gradient(135deg, #0F766E 0%, #14B8A6 100%)',
            'features' => ['Programme International Baccalaureate (IB)', 'Enseignant spécialisé IB', 'Suivi personnalisé renforcé'],
        ],
    ];
@endphp

<section id="tarifs" class="tarifs-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Tarification</div>
            <h2 class="section-title-big">Nos <span style="color: var(--orange);">tarifs</span></h2>
            <p class="section-subtitle">Cours à domicile, en ligne ou au centre — Durée d'une séance : 2 heures. Choisissez votre programme et inscrivez-vous.</p>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach ($programmes as $p)
                <div class="col-lg-4 col-md-6 animate-scroll">
                    <div class="tarif-card-interactif {{ $p['populaire'] ? 'recommande' : '' }}">
                        @if ($p['populaire'])
                            <div class="badge-recommande-tarif"><i class="fas fa-star"></i> POPULAIRE</div>
                        @endif

                        <div class="tarif-card-header" style="background: {{ $p['gradient'] }};">
                            <div class="tarif-flag"><i class="fas {{ $p['icone'] }}"></i></div>
                            <h3>{{ $p['nom'] }}</h3>
                            <div class="tarif-prix">{{ number_format($p['prix'], 0, ',', ' ') }} <span>FCFA / séance</span></div>
                            <p class="tarif-duree"><i class="fas fa-clock"></i> 2 heures par séance</p>
                        </div>

                        <div class="tarif-card-body">
                            <ul class="tarif-features">
                                @foreach ($p['features'] as $feature)
                                    <li><i class="fas fa-check"></i> {{ $feature }}</li>
                                @endforeach
                                <li><i class="fas fa-check"></i> Minimum 4 séances / mois</li>
                                <li><i class="fas fa-check"></i> Paiement mensuel à l'avance</li>
                            </ul>

                            <div class="tarif-formule-selector">
                                <label for="formule-{{ $p['id'] }}"><i class="fas fa-layer-group"></i> Choisir votre formule :</label>
                                <select class="formule-select" id="formule-{{ $p['id'] }}">
                                    @foreach ($formules as $f)
                                        <option value="{{ $p['prix'] * $f['n'] }}|{{ $f['n'] }}" {{ $f['n'] === 4 ? 'selected' : '' }}>
                                            {{ $f['label'] }} — {{ number_format($p['prix'] * $f['n'], 0, ',', ' ') }} FCFA
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="button" class="btn-tarif pulse-btn"
                                onclick="openInscriptionModal('Soutien scolaire lycée - {{ $p['nom'] }}', '{{ $p['prix'] * 4 }}', '4 séances')">
                                Je m'inscris <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Conditions générales -->
        <div class="row justify-content-center mt-5">
            <div class="col-lg-10 animate-scroll">
                <div class="tarif-conditions-box">
                    <h4><i class="fas fa-info-circle" style="color: var(--orange);"></i> Conditions générales</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="tarif-conditions-list">
                                <li><i class="fas fa-check-circle"></i> Minimum obligatoire : 4 séances par mois</li>
                                <li><i class="fas fa-check-circle"></i> Paiement mensuel à l'avance</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="tarif-conditions-list">
                                <li><i class="fas fa-check-circle"></i> Un enseignant spécialisé selon la matière choisie</li>
                                <li><i class="fas fa-check-circle"></i> Accompagnement adapté aux objectifs de l'élève</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <p class="text-center" style="margin-top: 30px; color: var(--gray-600); font-style: italic;">
                    <i class="fas fa-info-circle" style="color: var(--orange);"></i> Réduction possible pour fratrie ou inscription sur plusieurs mois.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Pourquoi choisir -->
<section class="why-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Avantages</div>
            <h2 class="section-title-big">Pourquoi choisir <span style="color: var(--orange);">MONPROFCHEZMOI</span> ?</h2>
            <p class="section-subtitle">Les atouts qui font la différence dans l'accompagnement des lycéens.</p>
        </div>
        <div class="why-grid">
            <div class="why-item animate-slide-left">
                <div class="why-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                <div>
                    <h4>Enseignants spécialisés</h4>
                    <p>Des professeurs qualifiés par matière avec une expertise sur les programmes ivoirien, français et bilingue.</p>
                </div>
            </div>
            <div class="why-item animate-slide-right">
                <div class="why-icon"><i class="fas fa-user-check"></i></div>
                <div>
                    <h4>Pédagogie adaptée</h4>
                    <p>Une approche personnalisée aux exigences du lycée et aux objectifs de chaque élève.</p>
                </div>
            </div>
            <div class="why-item animate-slide-left">
                <div class="why-icon"><i class="fas fa-chart-line"></i></div>
                <div>
                    <h4>Suivi personnalisé</h4>
                    <p>Un bilan régulier des progrès et des ajustements continus pour optimiser l'apprentissage.</p>
                </div>
            </div>
            <div class="why-item animate-slide-right">
                <div class="why-icon"><i class="fas fa-file-alt"></i></div>
                <div>
                    <h4>Préparation examens</h4>
                    <p>Entraînement ciblé sur les annales et les exigences réelles du BAC.</p>
                </div>
            </div>
            <div class="why-item animate-slide-left">
                <div class="why-icon"><i class="fas fa-comments"></i></div>
                <div>
                    <h4>Communication parents</h4>
                    <p>Des retours réguliers pour suivre l'évolution de votre enfant et ajuster l'accompagnement.</p>
                </div>
            </div>
            <div class="why-item animate-slide-right">
                <div class="why-icon"><i class="fas fa-trophy"></i></div>
                <div>
                    <h4>Approche résultats</h4>
                    <p>Un objectif clair : l'amélioration des performances scolaires et la réussite aux examens.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section section-padding">
    <div class="container">
        <div class="animate-scroll">
            <h2 class="section-title-big">Donnez à votre enfant les moyens de <span style="color: var(--orange);">réussir au lycée</span></h2>
            <p class="section-subtitle">Choisissez un accompagnement adapté à ses besoins et à ses ambitions.</p>
            <div class="cta-buttons">
               <button class="btn-cta-orange" onclick="openInscriptionModal('Soutien scolaire lycée - Choix matière', 'Sur devis', 'À définir')"><i class="fas fa-clipboard-list"></i> Choisir une matière</button>
<button class="btn-cta-outline" onclick="openInscriptionModal('Soutien scolaire lycée - Trouver un professeur', 'Sur devis', 'À définir')"><i class="fas fa-search"></i> Trouver un professeur</button>
                <a href="tel:+2250153751544" class="btn-cta-outline"><i class="fas fa-phone-alt"></i> Être rappelé gratuitement</a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     MODAL D'INSCRIPTION — COMPATIBLE LARAVEL
     ============================================ -->
<div class="modal-inscription-overlay" id="modalInscription">
    <div class="modal-inscription">
        <button class="modal-close" onclick="closeInscriptionModal()"><i class="fas fa-times"></i></button>

        <div class="modal-header">
            <div class="modal-icon"><i class="fas fa-clipboard-check"></i></div>
            <h3>Inscription — Soutien scolaire lycée</h3>
            <p>Remplissez le formulaire ci-dessous. Notre équipe vous contactera sous 24h.</p>
        </div>

        <form id="formInscription" onsubmit="submitInscription(event)">
            <!-- Section Activité -->
            <div class="modal-section">
                <h4><i class="fas fa-book"></i> Activité choisie</h4>
                <div class="form-group">
                    <label>Formule sélectionnée</label>
                    <input type="text" id="modalActivite" name="activite" readonly value="">
                </div>
            </div>

            <!-- Section Enfant -->
            <div class="modal-section">
                <h4><i class="fas fa-child"></i> Informations de l'élève</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label>Nom de l'élève *</label>
                        <input type="text" name="nom_enfant" placeholder="Nom et prénom" required>
                    </div>
                    <div class="form-group">
                        <label>Âge de l'élève *</label>
                        <input type="number" name="age_enfant" placeholder="Ex: 16" min="14" max="20" required>
                    </div>
                </div>


            </div>

            <!-- Section Parent -->
            <div class="modal-section">
                <h4><i class="fas fa-user"></i> Informations du parent</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label>Nom du parent *</label>
                        <input type="text" name="nom_parent" placeholder="Nom et prénom" required>
                    </div>
                    <div class="form-group">
                        <label>Téléphone *</label>
                        <input type="tel" name="telephone" placeholder="+225 XX XX XX XX" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="email@exemple.com">
                    </div>
                    <div class="form-group">
                        <label>Date de début souhaitée</label>
                        <input type="date" name="date_debut">
                    </div>
                </div>
            </div>

            <!-- Section Format -->
            <div class="modal-section">
                <h4><i class="fas fa-cogs"></i> Format et planning</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label>Lieu *</label>
                        <div class="radio-group">
                            <label class="radio-label">
                                <input type="radio" name="lieu" value="domicile" checked> À domicile
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="lieu" value="en_ligne"> En ligne
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="lieu" value="centre"> Au centre
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jours disponibles *</label>
                        <div class="checkbox-days">
                            <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Lundi"> Lun</label>
                            <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Mardi"> Mar</label>
                            <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Mercredi"> Mer</label>
                            <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Jeudi"> Jeu</label>
                            <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Vendredi"> Ven</label>
                            <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Samedi"> Sam</label>
                            <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Dimanche"> Dim</label>
                        </div>
                    </div>
                </div>
                <div class="form-row" style="margin-top: 16px;">
                    <div class="form-group">
                        <label>Horaire préféré</label>
                        <input type="text" name="horaire" placeholder="Ex: 16h00 - 18h00">
                    </div>
                    <div class="form-group">
                        <label>Type de paiement *</label>
                        <div class="radio-group">
                            <label class="radio-label">
                                <input type="radio" name="type_paiement" value="unique" checked> Paiement unique
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="type_paiement" value="seance"> Par séance
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="type_paiement" value="abonnement"> Abonnement mensuel
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-row" style="margin-top: 16px;">
                    <div class="form-group">
                        <label>Mode de paiement *</label>
                        <div class="radio-group">
                            <label class="radio-label">
                                <input type="radio" name="mode_paiement" value="mobile_money" checked> Mobile Money
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="mode_paiement" value="virement"> Virement bancaire
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Frais -->
            <div class="modal-section">
                <div class="frais-reservation">
                    <label class="checkbox-frais">
                        <input type="checkbox" name="frais_reservation_check" checked disabled>
                        <span>Frais de réservation : 10 000 FCFA</span>
                    </label>
                    <input type="hidden" name="frais_reservation" value="10000">
                    <p class="frais-desc">Cette somme sera déduite de votre première facture. Elle garantit votre place et permet de planifier l'emploi du temps de l'enseignant.</p>
                </div>
            </div>

            <!-- Récapitulatif -->
            <div class="modal-section recap-section">
                <h4><i class="fas fa-receipt"></i> Récapitulatif</h4>
                <div class="recap-box">
                    <div class="recap-line">
                        <span>Formule</span>
                        <strong id="recapFormule">—</strong>
                    </div>
                    <div class="recap-line">
                        <span>Prix</span>
                        <strong id="recapPrix">—</strong>
                    </div>
                    <div class="recap-line">
                        <span>Frais de réservation</span>
                        <strong>10 000 FCFA</strong>
                    </div>
                    <div class="recap-line highlight">
                        <span>Total à régler</span>
                        <strong id="recapTotal">10 000 FCFA</strong>
                    </div>
                </div>
                <div class="info-importante">
                    <i class="fas fa-info-circle"></i>
                    <p>Le solde sera réglé directement à l'enseignant lors de la première séance. Vous recevrez un appel de confirmation sous 24 heures.</p>
                </div>
            </div>

            <!-- Conditions Générales de Vente -->
            <div class="modal-section cgv-section" style="padding: 16px 20px; background: #fff8f5; border: 1px solid #ffe2d1; border-radius: 12px; margin-bottom: 20px;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px; flex-wrap: wrap; gap: 8px;">
                    <span style="font-weight: 700; font-size: 13px; color: #1E3A5F; display: flex; align-items: center; gap: 8px;">
                        <i class="fas fa-file-pdf" style="color: #e53e3e; font-size: 18px;"></i> Conditions Générales de Vente - Soutien Scolaire
                    </span>
                    <a href="{{ asset('asset/fichier/CGVSC.pdf') }}" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; gap: 6px; font-size: 12px; color: #FF6B35; font-weight: 700; text-decoration: none; padding: 5px 12px; border: 1.5px solid #FF6B35; border-radius: 20px; background: #fff; transition: all 0.2s ease;">
                        <i class="fas fa-external-link-alt"></i> Lire le PDF
                    </a>
                </div>
                <label style="display: flex; align-items: flex-start; gap: 10px; font-size: 13px; color: #374151; cursor: pointer; margin: 0; line-height: 1.4;">
                    <input type="checkbox" name="accept_cgv" required style="margin-top: 2px; accent-color: #FF6B35; width: 17px; height: 17px; cursor: pointer; flex-shrink: 0;">
                    <span>J'ai lu et j'accepte les <a href="{{ asset('asset/fichier/CGVSC.pdf') }}" target="_blank" rel="noopener noreferrer" style="color: #FF6B35; font-weight: 700; text-decoration: underline;">Conditions Générales de Vente (CGV)</a>.</span>
                </label>
            </div>

            <button type="submit" class="btn-confirm-inscription">
                <i class="fas fa-paper-plane"></i> Confirmer mon inscription
            </button>
        </form>
    </div>
</div>

<!-- Footer -->
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

<!-- Scripts -->
<script>
// Scroll Progress
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

document.querySelectorAll('.animate-scroll, .animate-slide-left, .animate-slide-right, .animate-scale').forEach(el => observer.observe(el));

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
let currentPrixRaw = '';

function openInscriptionModal(formule, prix, detail) {
    currentFormule = formule;
    currentPrixRaw = prix + ' FCFA (' + detail + ')';

    const modalActivite = document.getElementById('modalActivite');
    const recapFormule = document.getElementById('recapFormule');
    const recapPrix = document.getElementById('recapPrix');
    const recapTotal = document.getElementById('recapTotal');
    const modal = document.getElementById('modalInscription');

    if (modalActivite) modalActivite.value = formule;
    if (recapFormule) recapFormule.textContent = formule;
    if (recapPrix) recapPrix.textContent = currentPrixRaw;

    if (prix !== 'Sur devis') {
        const prixNum = parseInt(prix.replace(/\s/g, '')) || 0;
        const total = prixNum + 10000;
        if (recapTotal) recapTotal.textContent = total.toLocaleString('fr-FR') + ' FCFA';
    } else {
        if (recapTotal) recapTotal.textContent = 'Sur devis';
    }

    if (modal) {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}
function closeInscriptionModal() {
    const modal = document.getElementById('modalInscription');
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
    const form = document.getElementById('formInscription');
    if (form) form.reset();
}
// ========== TARIFS : le bouton suit la formule choisie ==========
function initTarifButtons() {
    document.querySelectorAll('.formule-select').forEach(select => {
        const card = select.closest('.tarif-card-interactif');
        const btn = card ? card.querySelector('.btn-tarif') : null;
        if (!btn) return;

        const nomProgramme = card.querySelector('.tarif-card-header h3').textContent.trim();

        function updateButton() {
            const [prix, nbSeances] = select.value.split('|');
            const detail = nbSeances + ' séance' + (parseInt(nbSeances) > 1 ? 's' : '');
            btn.onclick = function () {
                openInscriptionModal('Soutien scolaire lycée - ' + nomProgramme, prix, detail);
            };
        }

        select.addEventListener('change', updateButton);
        updateButton();
    });
}
document.addEventListener('DOMContentLoaded', initTarifButtons);
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
    formData.append('prix_formule', currentPrixRaw);
    formData.append('frais_reservation', '10000');

    const btn = document.querySelector('.btn-confirm-inscription');
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
            // Étape 2 : Redirection vers le système de paiement
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
                btn.innerHTML = '<i class="fas fa-paper-plane"></i> Confirmer mon inscription';
            }
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        alert('Erreur de connexion. Veuillez réessayer.');
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-paper-plane"></i> Confirmer mon inscription';
        }
    });
}
function showSuccessMessage() {
    const modalContent = document.querySelector('.modal-inscription');
    const parentName = document.querySelector('input[name="nom_parent"]')?.value || '';
    const phone = document.querySelector('input[name="telephone"]')?.value || '';

    if (modalContent) {
        modalContent.innerHTML = `
            <div class="modal-success">
                <div class="modal-success-icon"><i class="fas fa-check"></i></div>
                <h3>Inscription envoyée !</h3>
                <p>Merci <strong>${parentName}</strong>. Notre équipe vous contactera au <strong>${phone}</strong> sous 24 heures pour confirmer votre inscription.</p>
                <button class="btn-success-close" onclick="closeInscriptionModal()">Fermer</button>
            </div>
        `;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const modalInscription = document.getElementById('modalInscription');
    if (modalInscription) {
        modalInscription.addEventListener('click', function(e) {
            if (e.target === this) closeInscriptionModal();
        });
    }
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeInscriptionModal();
});
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>

