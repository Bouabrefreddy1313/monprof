<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Monprofchezmoi-ci.com - Codage & Robotique</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Cours de codage, robotique, programmation" name="keywords">
    <meta content="Programmation informatique pour enfants et adolescents - Animation numérique, JavaScript, Python, IA et Robotique" name="description">

    <link href="asset/img/favicon.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="asset/css/courscss/bootstrap.min.css" rel="stylesheet">
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

/* Topbar Minimal */
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

/* Navbar Moderne */
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
    color: var(--blue);
    font-size: 0.9rem;
}
.btn-connect-outline {
    background: transparent;
    border: 1.5px solid var(--orange);
    color: var(--orange);
    padding: 6px 14px;
    border-radius: 6px;
    font-size: 0.8rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}
.btn-connect-outline:hover {
    background: var(--orange);
    color: white;
}

@media (max-width: 991px) {
    .nav-menu-moderne { flex-direction: column; padding: 16px; }
    .nav-menu-moderne .nav-link-moderne { padding: 14px 16px; width: 100%; }
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
    .nav-item-moderne.active .mega-menu-moderne { display: block; }
    .mega-body-moderne { grid-template-columns: 1fr; }
}

/* Page Hero */
.page-hero {
    min-height: 50vh;
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 50%, #1a365d 100%);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
}
.page-hero::before {
    content: '';
    position: absolute;
    top: -20%; right: -10%;
    width: 500px; height: 500px;
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
    padding: 60px 0;
    text-align: center;
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
    font-size: 1.1rem;
    color: rgba(255,255,255,0.75);
    line-height: 1.8;
    max-width: 600px;
    margin: 0 auto;
}

/* Nav Tabs */
.nav-tabs-moderne {
    background: var(--cream);
    padding: 30px 0;
    position: sticky;
    top: 72px;
    z-index: 1020;
    border-bottom: 1px solid var(--gray-100);
}
.tabs-container {
    display: flex;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
}
.tab-btn {
    position: relative;
    padding: 14px 28px;
    border: 2px solid var(--gray-200);
    background: var(--white);
    color: var(--gray-600);
    font-weight: 600;
    font-size: 0.95rem;
    cursor: pointer;
    border-radius: 12px;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.tab-btn:hover {
    border-color: var(--orange);
    color: var(--orange);
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
}
.tab-btn.active {
    background: var(--orange);
    border-color: var(--orange);
    color: white;
    box-shadow: var(--shadow-orange);
    transform: translateY(-2px);
}
.tab-btn i {
    font-size: 1rem;
}

/* Sections */
.section-padding {
    padding: 80px 0;
}
.section-header-center {
    text-align: center;
    max-width: 700px;
    margin: 0 auto 50px;
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
    font-size: clamp(1.8rem, 3.5vw, 2.6rem);
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

/* Programme Hero */
.programme-hero {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
    margin-bottom: 60px;
}
.programme-image-wrap {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: var(--shadow-xl);
}
.programme-image-wrap img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    transition: transform 0.7s ease;
}
.programme-image-wrap:hover img {
    transform: scale(1.05);
}
.programme-image-badge {
    position: absolute;
    bottom: 24px;
    left: 24px;
    background: var(--orange);
    color: white;
    padding: 10px 20px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 0.9rem;
    box-shadow: var(--shadow-orange);
}
.programme-text h2 {
    font-size: clamp(1.6rem, 3vw, 2.2rem);
    font-weight: 800;
    color: var(--blue);
    margin-bottom: 20px;
    line-height: 1.2;
}
.programme-text h2 span {
    color: var(--orange);
}
.programme-text p {
    font-size: 1rem;
    color: var(--gray-600);
    line-height: 1.8;
    margin-bottom: 16px;
}

/* Cards */
.cards-grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    margin-bottom: 40px;
}
.info-card-moderne {
    background: var(--white);
    border-radius: 20px;
    padding: 35px 30px;
    border: 1px solid var(--gray-100);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}
.info-card-moderne::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 4px; height: 100%;
    background: linear-gradient(180deg, var(--orange), var(--orange-light));
    transition: width 0.3s ease;
}
.info-card-moderne:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.info-card-moderne:hover::before {
    width: 6px;
}
.info-card-moderne h3 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.info-card-moderne h3 i {
    color: var(--orange);
    font-size: 1.3rem;
}
.info-card-moderne ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.info-card-moderne ul li {
    padding: 10px 0;
    color: var(--gray-600);
    font-size: 0.95rem;
    display: flex;
    align-items: flex-start;
    gap: 10px;
    border-bottom: 1px solid var(--gray-100);
}
.info-card-moderne ul li:last-child {
    border-bottom: none;
}
.info-card-moderne ul li i {
    color: var(--orange);
    margin-top: 3px;
    font-size: 0.9rem;
}
.info-card-moderne p {
    color: var(--gray-600);
    font-size: 0.95rem;
    line-height: 1.7;
    margin-bottom: 12px;
}
.info-card-moderne p em {
    color: var(--gray-400);
    font-style: italic;
}

/* Tarifs */
.tarifs-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-top: 40px;
}
.tarif-card {
    background: var(--white);
    border-radius: 20px;
    padding: 35px 28px;
    text-align: center;
    border: 2px solid var(--gray-100);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
}
.tarif-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light));
    transform: scaleX(0);
    transition: transform 0.4s ease;
}
.tarif-card:hover::before {
    transform: scaleX(1);
}
.tarif-card:hover {
    transform: translateY(-12px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.tarif-card.featured {
    border-color: var(--orange);
    transform: scale(1.02);
}
.tarif-card.featured::before {
    transform: scaleX(1);
}
.tarif-card.featured:hover {
    transform: translateY(-12px) scale(1.02);
}
.tarif-icon {
    width: 60px; height: 60px;
    border-radius: 16px;
    background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 1.6rem;
    color: var(--orange);
    transition: all 0.4s ease;
}
.tarif-card:hover .tarif-icon {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    color: white;
    transform: scale(1.1) rotate(-5deg);
    box-shadow: var(--shadow-orange);
}
.tarif-card h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 8px;
}
.tarif-card .prix {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--orange);
    margin-bottom: 20px;
    line-height: 1;
}
.tarif-card .prix span {
    font-size: 0.9rem;
    color: var(--gray-400);
    font-weight: 500;
}
.btn-tarif {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 28px;
    background: var(--orange);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 700;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    width: 100%;
    justify-content: center;
}
.btn-tarif:hover {
    background: var(--orange-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-orange);
    color: white;
}
.btn-tarif i {
    transition: transform 0.3s ease;
}
.btn-tarif:hover i {
    transform: translateX(4px);
}

/* Info Sections */
.info-section-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin: 40px 0;
}
.info-block {
    background: var(--white);
    border-radius: 16px;
    padding: 30px;
    border: 1px solid var(--gray-100);
    transition: all 0.3s ease;
}
.info-block:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-md);
    border-color: rgba(255,107,53,0.2);
}
.info-block h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.info-block h4 i {
    color: var(--orange);
}
.info-block ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.info-block ul li {
    padding: 8px 0;
    color: var(--gray-600);
    font-size: 0.92rem;
    display: flex;
    align-items: flex-start;
    gap: 10px;
}
.info-block ul li i {
    color: var(--orange);
    margin-top: 4px;
    font-size: 0.85rem;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
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
}
.cta-section .section-subtitle {
    color: rgba(255,255,255,0.7);
}
.cta-buttons {
    display: flex;
    justify-content: center;
    gap: 16px;
    flex-wrap: wrap;
    margin-top: 30px;
}
.btn-cta-orange {
    padding: 14px 32px;
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
}
.btn-cta-orange:hover {
    background: var(--orange-dark);
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(255,107,53,0.4);
    color: white;
}
.btn-cta-outline {
    padding: 14px 32px;
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

/* Footer */
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

/* Animations */
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


/* Content sections */
.content-section {
    display: none;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.5s ease-out;
}
.content-section.active {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

/* Responsive */
@media (max-width: 1199px) {
    .tarifs-grid { grid-template-columns: 1fr; max-width: 400px; margin: 40px auto 0; }
}
@media (max-width: 991px) {
    .programme-hero { grid-template-columns: 1fr; }
    .cards-grid-2 { grid-template-columns: 1fr; }
    .info-section-grid { grid-template-columns: 1fr; }
    .footer-grid { grid-template-columns: 1fr 1fr; }
    .section-padding { padding: 60px 0; }
}
@media (max-width: 767px) {
    .footer-grid { grid-template-columns: 1fr; }
    .tabs-container { flex-direction: column; padding: 0 20px; }
    .tab-btn { width: 100%; justify-content: center; }
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
.modal-inscription-overlay.active { opacity: 1; visibility: visible; }
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
.modal-inscription-overlay.active .modal-inscription { transform: translateY(0) scale(1); }
.modal-close {
    position: absolute; top: 16px; right: 16px; width: 40px; height: 40px;
    border-radius: 12px; background: var(--gray-100); border: none; color: var(--gray-600);
    font-size: 1.1rem; cursor: pointer; transition: all 0.2s ease; display: flex;
    align-items: center; justify-content: center; z-index: 10;
}
.modal-close:hover { background: var(--orange); color: white; transform: rotate(90deg); }
.modal-header { text-align: center; padding: 40px 30px 20px; border-bottom: 1px solid var(--gray-100); }
.modal-icon {
    width: 70px; height: 70px; border-radius: 20px;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;
    font-size: 1.8rem; color: white; box-shadow: var(--shadow-orange);
}
.modal-header h3 { font-size: 1.4rem; font-weight: 800; color: var(--blue); margin-bottom: 6px; }
.modal-header p { font-size: 0.9rem; color: var(--gray-600); margin: 0; }
.modal-section { padding: 24px 30px; border-bottom: 1px solid var(--gray-100); }
.modal-section:last-of-type { border-bottom: none; }
.modal-section h4 {
    font-size: 0.95rem; font-weight: 700; color: var(--blue);
    margin-bottom: 16px; display: flex; align-items: center; gap: 8px;
}
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
.form-group input:focus, .form-group select:focus {
    outline: none; border-color: var(--orange); box-shadow: 0 0 0 4px rgba(255, 107, 53, 0.1);
}
.form-group input::placeholder { color: var(--gray-400); }
.form-group input[readonly] { background: var(--gray-50); color: var(--orange); font-weight: 700; }
.radio-group { display: flex; flex-wrap: wrap; gap: 10px; }
.radio-label {
    display: flex; align-items: center; gap: 6px; padding: 8px 14px;
    border: 2px solid var(--gray-200); border-radius: 10px; cursor: pointer;
    font-size: 0.85rem; font-weight: 600; color: var(--gray-800); transition: all 0.2s ease;
}
.radio-label input[type="radio"] { accent-color: var(--orange); width: 16px; height: 16px; }
.radio-label:has(input:checked) { border-color: var(--orange); background: rgba(255, 107, 53, 0.05); color: var(--orange); }
.checkbox-days { display: flex; flex-wrap: wrap; gap: 8px; }
.day-checkbox {
    display: flex; align-items: center; gap: 5px; padding: 8px 12px;
    border: 2px solid var(--gray-200); border-radius: 8px; cursor: pointer;
    font-size: 0.85rem; font-weight: 600; color: var(--gray-800); transition: all 0.2s ease;
}
.day-checkbox input[type="checkbox"] { accent-color: var(--orange); width: 16px; height: 16px; }
.day-checkbox:has(input:checked) { border-color: var(--orange); background: rgba(255, 107, 53, 0.05); color: var(--orange); }
.frais-reservation {
    background: linear-gradient(135deg, rgba(255, 107, 53, 0.08), rgba(255, 107, 53, 0.03));
    border: 2px solid rgba(255, 107, 53, 0.2); border-radius: 12px; padding: 16px; margin-bottom: 16px;
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
.recap-line.highlight {
    background: rgba(255, 107, 53, 0.05); margin: 0 -16px; padding: 12px 16px; border-bottom: none;
}
.recap-line.highlight span, .recap-line.highlight strong { color: var(--orange); }
.status-badge { background: var(--gray-200); color: var(--gray-600); padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; }
.info-importante { display: flex; align-items: flex-start; gap: 10px; margin-top: 16px; padding: 12px; background: rgba(59, 130, 246, 0.05); border-radius: 10px; border: 1px solid rgba(59, 130, 246, 0.15); }
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

<body>
@include('partials.header')



<!-- ============================================
     PAGE HERO
     ============================================ -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content animate-scroll">
            <div class="page-hero-label"><i class="fas fa-robot"></i> Robotique & Création Numérique</div>
            <h1 class="page-hero-title">Développer la <span class="highlight-orange">créativité</span>, la logique et l'esprit d'innovation</h1>
            <p class="page-hero-subtitle">Des activités éducatives innovantes autour de la robotique, du numérique et de la programmation pour préparer les enfants aux défis de demain.</p>
        </div>
    </div>
</section>

<!-- ============================================
     NAV TABS - PROGRAMMES
     ============================================ -->
<div class="nav-tabs-moderne">
    <div class="container">
        <div class="tabs-container">
            <button class="tab-btn" data-section="robotique" onclick="switchTab(this, 'robotique')">
                <i class="fas fa-robot"></i> Robotique
            </button>
            <button class="tab-btn active" data-section="animation" onclick="switchTab(this, 'animation')">
                <i class="fas fa-palette"></i> Animation Numérique
            </button>
            <button class="tab-btn" data-section="python" onclick="switchTab(this, 'python')">
                <i class="fab fa-python"></i> Python
            </button>
            <button class="tab-btn" data-section="ia" onclick="switchTab(this, 'ia')">
                <i class="fas fa-brain"></i> Pionniers de l'IA
            </button>
            <button class="tab-btn" data-section="javascript" onclick="switchTab(this, 'javascript')">
                <i class="fab fa-js"></i> JavaScript
            </button>
        </div>
    </div>
</div>

<!-- ============================================
     SECTION: ROBOTIQUE (CP à CM2)
     ============================================ -->
<section id="robotique" class="content-section">
    <div class="section-padding" style="background: var(--cream);">
        <div class="container">

            <div class="programme-hero animate-scroll">
                <div class="programme-image-wrap">
                    <img src="asset/img/robo.jpg" alt="Champions de la Robotique">
                    <div class="programme-image-badge"><i class="fas fa-robot"></i> CP à CM2</div>
                </div>
                <div class="programme-text">
                    <div class="section-label-orange">Activité 1</div>
                    <h2>Champions de la <span>Robotique</span></h2>
                    <p>Découvrir la technologie en construisant et en créant. Champions de la robotique permet aux enfants de découvrir l'univers des robots à travers des activités pratiques, des manipulations et des défis adaptés à leur âge.</p>
                    <p><strong>Objectif :</strong> Faire découvrir aux enfants les bases de la robotique tout en développant leur logique, leur créativité et leur capacité à résoudre des problèmes.</p>
                </div>
            </div>

            <div class="cards-grid-2 animate-scroll">
                <div class="info-card-moderne">
                    <h3><i class="fas fa-bullseye"></i> Résumé des cours</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Le fonctionnement des robots</li>
                        <li><i class="fas fa-check"></i> L'assemblage de modèles simples</li>
                        <li><i class="fas fa-check"></i> La manipulation de composants</li>
                        <li><i class="fas fa-check"></i> Les mécanismes de base</li>
                        <li><i class="fas fa-check"></i> Les défis robotiques</li>
                        <li><i class="fas fa-check"></i> Le travail en équipe autour de projets</li>
                    </ul>
                </div>
                <div class="info-card-moderne">
                    <h3><i class="fas fa-laptop-code"></i> Ce que l'enfant apprendra</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Comprendre le fonctionnement d'un robot</li>
                        <li><i class="fas fa-check"></i> Développer son raisonnement logique</li>
                        <li><i class="fas fa-check"></i> Résoudre des problèmes de manière créative</li>
                        <li><i class="fas fa-check"></i> Développer sa concentration</li>
                        <li><i class="fas fa-check"></i> Travailler en équipe</li>
                        <li><i class="fas fa-check"></i> Prendre confiance en ses capacités scientifiques</li>
                    </ul>
                </div>
            </div>

            <div class="info-section-grid animate-scroll">
                <div class="info-block">
                    <h4><i class="fas fa-layer-group"></i> Programme</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> <strong>Niveau 1 - Découverte :</strong> Comprendre les bases, manipuler les outils</li>
                        <li><i class="fas fa-check"></i> <strong>Niveau 2 - Exploration :</strong> Réaliser des petits projets, relever des défis</li>
                        <li><i class="fas fa-check"></i> <strong>Niveau 3 - Création :</strong> Concevoir ses propres réalisations, présenter ses projets</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-clock"></i> Organisation</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Durée : 1h30 par séance</li>
                        <li><i class="fas fa-check"></i> Fréquence : 1 séance par semaine</li>
                        <li><i class="fas fa-check"></i> Lieu : En petits groupes au centre</li>
                        <li><i class="fas fa-check"></i> Niveau : Débutant accepté</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-star"></i> Compétences développées</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Créativité</li>
                        <li><i class="fas fa-check"></i> Logique</li>
                        <li><i class="fas fa-check"></i> Résolution de problèmes</li>
                        <li><i class="fas fa-check"></i> Communication & Collaboration</li>
                        <li><i class="fas fa-check"></i> Persévérance</li>
                    </ul>
                </div>
            </div>

            <div class="animate-scroll" style="margin-top: 60px;">
                <div class="section-header-center">
                    <div class="section-label-orange">Tarifs</div>
                    <h2 class="section-title-big">Choisissez votre <span style="color: var(--orange);">formule</span></h2>
                </div>
                <div class="tarifs-grid">
                    <div class="tarif-card">
                        <div class="tarif-icon"><i class="fas fa-robot"></i></div>
                        <h4>Séance (1h30)</h4>
                        <div class="prix">18 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Robotique_Seance_1h30', '18000'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card featured">
                        <div class="tarif-icon"><i class="fas fa-calendar-week"></i></div>
                        <h4>4 séances</h4>
                        <div class="prix">65 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Robotique_4seances', '65000'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card">
                        <div class="tarif-icon"><i class="fas fa-rocket"></i></div>
                        <h4>8 séances</h4>
                        <div class="prix">120 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Robotique_8seances', '120000'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================
     SECTION: ANIMATION NUMÉRIQUE (CP à CM2)
     ============================================ -->
<section id="animation" class="content-section active">
    <div class="section-padding" style="background: var(--cream);">
        <div class="container">

            <div class="programme-hero animate-scroll">
                <div class="programme-image-wrap">
                    <img src="asset/img/orp.jpeg" alt="Champion de l'Animation Numérique">
                    <div class="programme-image-badge"><i class="fas fa-child"></i> CP à CM2</div>
                </div>
                <div class="programme-text">
                    <div class="section-label-orange">Activité 2</div>
                    <h2>Champion de l'<span>Animation Numérique</span></h2>
                    <p>Créer, imaginer et découvrir le monde numérique. Cette activité permet aux enfants de découvrir la création numérique grâce à des outils adaptés à leur âge. Ils apprennent à utiliser la technologie comme un outil de création et d'expression.</p>
                    <p><strong>Objectif :</strong> Initier les enfants aux outils numériques tout en développant leur créativité et leur autonomie.</p>
                </div>
            </div>

            <div class="cards-grid-2 animate-scroll">
                <div class="info-card-moderne">
                    <h3><i class="fas fa-bullseye"></i> Résumé des cours</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Les bases du numérique</li>
                        <li><i class="fas fa-check"></i> La création d'images</li>
                        <li><i class="fas fa-check"></i> Les contenus numériques</li>
                        <li><i class="fas fa-check"></i> L'animation simple</li>
                        <li><i class="fas fa-check"></i> Les histoires numériques</li>
                        <li><i class="fas fa-check"></i> Les outils créatifs adaptés</li>
                    </ul>
                </div>
                <div class="info-card-moderne">
                    <h3><i class="fas fa-laptop-code"></i> Ce que l'enfant apprendra</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Utiliser des outils numériques adaptés</li>
                        <li><i class="fas fa-check"></i> Créer ses premiers contenus</li>
                        <li><i class="fas fa-check"></i> Développer son imagination</li>
                        <li><i class="fas fa-check"></i> Réaliser un projet numérique</li>
                        <li><i class="fas fa-check"></i> Utiliser la technologie de façon responsable</li>
                    </ul>
                </div>
            </div>

            <div class="info-section-grid animate-scroll">
                <div class="info-block">
                    <h4><i class="fas fa-users"></i> Pour qui ?</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Primaire : CP à CM2</li>
                        <li><i class="fas fa-check"></i> Débutant accepté</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-clock"></i> Organisation</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Durée : 1h30 par semaine</li>
                        <li><i class="fas fa-check"></i> Lieu : En petits groupes au centre</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-star"></i> Bénéfices</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Créativité numérique</li>
                        <li><i class="fas fa-check"></i> Autonomie</li>
                        <li><i class="fas fa-check"></i> Expression créative</li>
                    </ul>
                </div>
            </div>

            <div class="animate-scroll" style="margin-top: 60px;">
                <div class="section-header-center">
                    <div class="section-label-orange">Tarifs</div>
                    <h2 class="section-title-big">Choisissez votre <span style="color: var(--orange);">formule</span></h2>
                </div>
                <div class="tarifs-grid">
                    <div class="tarif-card">
                        <div class="tarif-icon"><i class="fas fa-laptop"></i></div>
                        <h4>Séance (1h30)</h4>
                        <div class="prix">15 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Animation_Seance_1h30', '15000'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card featured">
                        <div class="tarif-icon"><i class="fas fa-calendar-week"></i></div>
                        <h4>4 séances</h4>
                        <div class="prix">55 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Animation_4seances', '55000'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card">
                        <div class="tarif-icon"><i class="fas fa-rocket"></i></div>
                        <h4>8 séances</h4>
                        <div class="prix">100 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Animation_8seances', '100000'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================
     SECTION: PYTHON (CM1 – CM2)
     ============================================ -->
<section id="python" class="content-section">
    <div class="section-padding" style="background: var(--cream);">
        <div class="container">

            <div class="programme-hero animate-scroll">
                <div class="programme-image-wrap">
                    <img src="asset/img/js.jpg" alt="Génies du Python">
                    <div class="programme-image-badge"><i class="fab fa-python"></i> CM1 – CM2</div>
                </div>
                <div class="programme-text">
                    <div class="section-label-orange">Activité 3</div>
                    <h2>Génies du <span>Python</span></h2>
                    <p>Découvrir la programmation en créant ses premiers programmes. Cette activité initie les enfants au code informatique avec une approche progressive et adaptée.</p>
                    <p><strong>Objectif :</strong> Faire découvrir aux enfants les bases de la programmation tout en développant leur logique et leur créativité.</p>
                </div>
            </div>

            <div class="cards-grid-2 animate-scroll">
                <div class="info-card-moderne">
                    <h3><i class="fas fa-bullseye"></i> Programme</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Le fonctionnement d'un programme</li>
                        <li><i class="fas fa-check"></i> Les instructions simples</li>
                        <li><i class="fas fa-check"></i> Les variables</li>
                        <li><i class="fas fa-check"></i> Les conditions</li>
                        <li><i class="fas fa-check"></i> Les petits projets informatiques</li>
                        <li><i class="fas fa-check"></i> La logique algorithmique</li>
                    </ul>
                </div>
                <div class="info-card-moderne">
                    <h3><i class="fas fa-laptop-code"></i> Ce que l'enfant apprendra</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Les bases du codage</li>
                        <li><i class="fas fa-check"></i> La création de programmes simples</li>
                        <li><i class="fas fa-check"></i> La résolution de problèmes</li>
                        <li><i class="fas fa-check"></i> La correction des erreurs</li>
                        <li><i class="fas fa-check"></i> La pensée informatique</li>
                    </ul>
                </div>
            </div>

            <div class="info-section-grid animate-scroll">
                <div class="info-block">
                    <h4><i class="fas fa-users"></i> Pour qui ?</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Primaire avancé : CM1 – CM2</li>
                        <li><i class="fas fa-check"></i> Débutant accepté</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-clock"></i> Organisation</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Durée : 1h30 par semaine</li>
                        <li><i class="fas fa-check"></i> Lieu : En petits groupes au centre</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-star"></i> Bénéfices</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Logique algorithmique</li>
                        <li><i class="fas fa-check"></i> Résolution de problèmes</li>
                        <li><i class="fas fa-check"></i> Pensée informatique</li>
                    </ul>
                </div>
            </div>

            <div class="animate-scroll" style="margin-top: 60px;">
                <div class="section-header-center">
                    <div class="section-label-orange">Tarifs</div>
                    <h2 class="section-title-big">Choisissez votre <span style="color: var(--orange);">formule</span></h2>
                </div>
                <div class="tarifs-grid">
                    <div class="tarif-card">
                        <div class="tarif-icon"><i class="fab fa-python"></i></div>
                        <h4>Séance (1h30)</h4>
                        <div class="prix">18 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Python_Seance_1h30', '18000'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card featured">
                        <div class="tarif-icon"><i class="fas fa-calendar-week"></i></div>
                        <h4>4 séances</h4>
                        <div class="prix">65 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Python_4seances', '65000'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card">
                        <div class="tarif-icon"><i class="fas fa-rocket"></i></div>
                        <h4>8 séances</h4>
                        <div class="prix">120 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Python_8seances', '120000'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================
     SECTION: PIONNIERS DE L'IA (CM1 – CM2)
     ============================================ -->
<section id="ia" class="content-section">
    <div class="section-padding" style="background: var(--cream);">
        <div class="container">

            <div class="programme-hero animate-scroll">
                <div class="programme-image-wrap">
                    <img src="asset/img/vir.jpeg" alt="Pionniers de l'IA">
                    <div class="programme-image-badge"><i class="fas fa-brain"></i> CM1 – CM2</div>
                </div>
                <div class="programme-text">
                    <div class="section-label-orange">Activité 4</div>
                    <h2>Pionniers de l'<span>Intelligence Artificielle</span></h2>
                    <p>Comprendre l'intelligence artificielle en s'amusant. Une initiation adaptée aux enfants pour découvrir les nouvelles technologies et comprendre comment les machines peuvent apprendre.</p>
                    <p><strong>Objectif :</strong> Initier les enfants aux concepts de l'IA de manière ludique et accessible.</p>
                </div>
            </div>

            <div class="cards-grid-2 animate-scroll">
                <div class="info-card-moderne">
                    <h3><i class="fas fa-bullseye"></i> Résumé des cours</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Qu'est-ce que l'intelligence artificielle ?</li>
                        <li><i class="fas fa-check"></i> Comment les machines apprennent</li>
                        <li><i class="fas fa-check"></i> Les usages de l'IA au quotidien</li>
                        <li><i class="fas fa-check"></i> Des projets simples avec des outils adaptés</li>
                        <li><i class="fas fa-check"></i> L'utilisation responsable de la technologie</li>
                    </ul>
                </div>
                <div class="info-card-moderne">
                    <h3><i class="fas fa-laptop-code"></i> Ce que l'enfant apprendra</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Comprendre les bases de l'IA</li>
                        <li><i class="fas fa-check"></i> Développer sa curiosité scientifique</li>
                        <li><i class="fas fa-check"></i> Découvrir les technologies du futur</li>
                        <li><i class="fas fa-check"></i> Créer des projets numériques simples</li>
                    </ul>
                </div>
            </div>

            <div class="info-section-grid animate-scroll">
                <div class="info-block">
                    <h4><i class="fas fa-users"></i> Pour qui ?</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Primaire avancé : CM1 – CM2</li>
                        <li><i class="fas fa-check"></i> Débutant accepté</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-clock"></i> Organisation</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Durée : 1h30 par semaine</li>
                        <li><i class="fas fa-check"></i> Lieu : En petits groupes au centre</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-star"></i> Bénéfices</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Curiosité scientifique</li>
                        <li><i class="fas fa-check"></i> Compréhension des technologies</li>
                        <li><i class="fas fa-check"></i> Création de projets numériques</li>
                    </ul>
                </div>
            </div>

            <div class="animate-scroll" style="margin-top: 60px;">
                <div class="section-header-center">
                    <div class="section-label-orange">Tarifs</div>
                    <h2 class="section-title-big">Choisissez votre <span style="color: var(--orange);">formule</span></h2>
                </div>
                <div class="tarifs-grid">
                    <div class="tarif-card">
                        <div class="tarif-icon"><i class="fas fa-robot"></i></div>
                        <h4>Séance (1h30)</h4>
                        <div class="prix">15 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('IA_Seance_1h30', '15000'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card featured">
                        <div class="tarif-icon"><i class="fas fa-calendar-week"></i></div>
                        <h4>4 séances</h4>
                        <div class="prix">55 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('IA_4seances', '55000'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card">
                        <div class="tarif-icon"><i class="fas fa-rocket"></i></div>
                        <h4>8 séances</h4>
                        <div class="prix">100 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('IA_8seances', '100000'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================
     SECTION: JAVASCRIPT (CM2 avancé – Collège)
     ============================================ -->
<section id="javascript" class="content-section">
    <div class="section-padding" style="background: var(--cream);">
        <div class="container">

            <div class="programme-hero animate-scroll">
                <div class="programme-image-wrap">
                    <img src="asset/img/js.jpeg" alt="Génies du JavaScript">
                    <div class="programme-image-badge"><i class="fab fa-js"></i> CM2 avancé – Collège</div>
                </div>
                <div class="programme-text">
                    <div class="section-label-orange">Activité 5</div>
                    <h2>Génies du <span>JavaScript</span></h2>
                    <p>Une première immersion dans le développement web. Activité recommandée pour les enfants ayant déjà acquis les bases du numérique.</p>
                    <p><strong>Objectif :</strong> Découvrir la création de pages et d'interactions numériques grâce au code.</p>
                </div>
            </div>

            <div class="cards-grid-2 animate-scroll">
                <div class="info-card-moderne">
                    <h3><i class="fas fa-bullseye"></i> Niveau requis</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Débutant accepté avec bases numériques recommandées</li>
                        <li><i class="fas fa-check"></i> CM2 avancé – Collège</li>
                    </ul>
                </div>
                <div class="info-card-moderne">
                    <h3><i class="fas fa-laptop-code"></i> Ce que l'enfant apprendra</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Découvrir la création de pages web</li>
                        <li><i class="fas fa-check"></i> Créer des interactions numériques</li>
                        <li><i class="fas fa-check"></i> Comprendre les bases du développement web</li>
                    </ul>
                               </div>
            </div>

            <div class="info-section-grid animate-scroll">
                <div class="info-block">
                    <h4><i class="fas fa-users"></i> Pour qui ?</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> CM2 avancé – Collège</li>
                        <li><i class="fas fa-check"></i> Bases numériques recommandées</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-clock"></i> Organisation</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Durée : 1h30 par séance</li>
                        <li><i class="fas fa-check"></i> Lieu : En petits groupes au centre</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-star"></i> Bénéfices</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Première immersion dans le développement web</li>
                        <li><i class="fas fa-check"></i> Création d'interactions numériques</li>
                        <li><i class="fas fa-check"></i> Compréhension du code web</li>
                    </ul>
                </div>
            </div>

            <div class="animate-scroll" style="margin-top: 60px;">
                <div class="section-header-center">
                    <div class="section-label-orange">Tarifs</div>
                    <h2 class="section-title-big">Choisissez votre <span style="color: var(--orange);">formule</span></h2>
                </div>
                <div class="tarifs-grid">
                    <div class="tarif-card">
                        <div class="tarif-icon"><i class="fab fa-js"></i></div>
                        <h4>Séance (1h30)</h4>
                        <div class="prix">18 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('JS_Seance_1h30', '18000'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card featured">
                        <div class="tarif-icon"><i class="fas fa-calendar-week"></i></div>
                        <h4>4 séances</h4>
                        <div class="prix">65 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('JS_4seances', '65000'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card">
                        <div class="tarif-icon"><i class="fas fa-rocket"></i></div>
                        <h4>8 séances</h4>
                        <div class="prix">120 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('JS_8seances', '120000'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================
     POURQUOI CHOISIR NOS ACTIVITÉS
     ============================================ -->
<section class="section-padding" style="background: var(--white);">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Nos atouts</div>
            <h2 class="section-title-big">Pourquoi choisir nos <span style="color: var(--orange);">activités</span> ?</h2>
        </div>

        <div class="info-section-grid animate-scroll">
            <div class="info-block">
                <h4><i class="fas fa-child"></i> Activités adaptées aux enfants</h4>
                <p style="color: var(--gray-600); font-size: 0.92rem; line-height: 1.7;">Des contenus pédagogiques conçus spécialement pour chaque tranche d'âge, avec une progression adaptée.</p>
            </div>
            <div class="info-block">
                <h4><i class="fas fa-hands"></i> Apprentissage par la pratique</h4>
                <p style="color: var(--gray-600); font-size: 0.92rem; line-height: 1.7;">Les enfants apprennent en manipulant, en expérimentant et en réalisant leurs propres projets concrets.</p>
            </div>
            <div class="info-block">
                <h4><i class="fas fa-users"></i> Petits groupes</h4>
                <p style="color: var(--gray-600); font-size: 0.92rem; line-height: 1.7;">Un encadrement personnalisé dans des groupes restreints pour un suivi optimal de chaque enfant.</p>
            </div>
            <div class="info-block">
                <h4><i class="fas fa-chalkboard-teacher"></i> Encadrement pédagogique</h4>
                <p style="color: var(--gray-600); font-size: 0.92rem; line-height: 1.7;">Des animateurs qualifiés et passionnés qui accompagnent chaque enfant dans sa progression.</p>
            </div>
            <div class="info-block">
                <h4><i class="fas fa-rocket"></i> Compétences du futur</h4>
                <p style="color: var(--gray-600); font-size: 0.92rem; line-height: 1.7;">Développer la créativité, la logique, l'autonomie et la résolution de problèmes dès le plus jeune âge.</p>
            </div>
            <div class="info-block">
                <h4><i class="fas fa-chart-line"></i> Progression adaptée</h4>
                <p style="color: var(--gray-600); font-size: 0.92rem; line-height: 1.7;">Une progression selon l'âge et le niveau de chaque enfant, avec des programmes sur plusieurs niveaux.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     CTA SECTION
     ============================================ -->
<section class="cta-section section-padding">
    <div class="container">
        <div class="animate-scroll">
            <div class="section-label-orange" style="color: white;">Inscrivez votre enfant</div>
            <h2 class="section-title-big">Faites-lui découvrir le plaisir d'apprendre <span style="color: var(--orange);">autrement</span></h2>
            <p class="section-subtitle">Développer la créativité, la logique et l'esprit d'innovation dès le plus jeune âge avec nos activités numériques et technologiques.</p>

            <div class="cta-buttons">
                <a href="tel:+2250153751544" class="btn-cta-orange"><i class="fas fa-phone-alt"></i> Être rappelé gratuitement</a>
                <a href="{{ url('/reponse') }}" class="btn-cta-outline"><i class="fas fa-search"></i> Explorer nos autres activités</a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     MODAL D'INSCRIPTION
     ============================================ -->
@include('partials.modal-inscription')

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
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

// Spinner
window.addEventListener('load', function() {
    setTimeout(() => {
});

// Tab Switching
function switchTab(btn, sectionId) {
    document.querySelectorAll('.tab-btn').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.content-section').forEach(s => s.classList.remove('active'));

    btn.classList.add('active');
    document.getElementById(sectionId).classList.add('active');

    const tabsSection = document.querySelector('.nav-tabs-moderne');
    const offset = tabsSection.offsetTop + tabsSection.offsetHeight;
    window.scrollTo({ top: offset, behavior: 'smooth' });
}

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

function openInscriptionModal(formule, prix) {
    currentFormule = formule;
    currentPrix = prix + ' FCFA';
    const modalActivite = document.getElementById('modalActivite');
    const recapFormule = document.getElementById('recapFormule');
    const recapPrix = document.getElementById('recapPrix');
    const modal = document.getElementById('modalInscription');
    if (modalActivite) modalActivite.value = formule;
    if (recapFormule) recapFormule.textContent = formule;
    if (recapPrix) recapPrix.textContent = currentPrix;
    if (modal) { modal.classList.add('active'); document.body.style.overflow = 'hidden'; }
}

function closeInscriptionModal() {
    const modal = document.getElementById('modalInscription');
    if (modal) { modal.classList.remove('active'); document.body.style.overflow = ''; }
    const form = document.getElementById('formInscription');
    if (form) form.reset();
}

function submitInscription(e) {
    e.preventDefault();
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData);
    const jours = [];
    document.querySelectorAll('input[name="jours[]"]:checked').forEach(cb => { jours.push(cb.value); });
    data.jours = jours;
    data.formule = currentFormule;
    data.prix_formule = currentPrix;
    data.frais_reservation = '10000';
    fetch('/inscription', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '' },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        if (result.success && result.redirect_url) {
            window.location.href = result.redirect_url;
        } else if (result.success) {
            showSuccessMessage();
        } else {
            alert('Une erreur est survenue.');
        }
    })
    .catch(error => { console.error('Erreur:', error); showSuccessMessage(); });
}

function showSuccessMessage() {
    const modal = document.querySelector('.modal-inscription');
    const parentName = document.querySelector('input[name="nom_parent"]')?.value || '';
    const phone = document.querySelector('input[name="telephone"]')?.value || '';
    if (modal) {
        modal.innerHTML = `<div class="modal-success"><div class="modal-success-icon"><i class="fas fa-check"></i></div><h3>Inscription envoyée !</h3><p>Merci ${parentName}. Notre équipe vous contactera au <strong>${phone}</strong>.</p><button class="btn-success-close" onclick="closeInscriptionModal()">Fermer</button></div>`;
    }
}
document.addEventListener('DOMContentLoaded', function() {
    const modalInscription = document.getElementById('modalInscription');
    if (modalInscription) modalInscription.addEventListener('click', function(e) { if (e.target === this) closeInscriptionModal(); });
});
document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeInscriptionModal(); });

function redirectToContact(part, prix = null) {
    let url = `/contact?part=${encodeURIComponent(part)}`;
    if (prix) {
        url += `&prix=${encodeURIComponent(prix)}`;
    }
    window.location.href = url;
}
</script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>

