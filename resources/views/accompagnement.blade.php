<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accompagnement DYS Primaire - Monprofchezmoi-ci.com</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="DYS, dyslexie, dyscalculie, soutien scolaire, primaire, Abidjan" name="keywords">
    <meta content="Accompagnement pédagogique adapté aux enfants DYS au primaire en Côte d'Ivoire." name="description">

    <link href="asset/img/favicon.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
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


/* Topbar */
.topbar-minimal {
    background: var(--blue);
    padding: 8px 0;
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

/* Navbar */
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

/* Breadcrumb */
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

/* Sections */
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

/* Intro Section */
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

/* Accompagnements DYS - Cards */
.dys-section {
    background: var(--cream);
}
.dys-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    max-width: 900px;
    margin: 0 auto;
}
.dys-card {
    background: var(--white);
    border-radius: 20px;
    padding: 35px 30px;
    border: 1px solid var(--gray-100);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 20px;
}
.dys-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light));
    transform: scaleX(0);
    transition: transform 0.4s ease;
}
.dys-card:hover::before {
    transform: scaleX(1);
}
.dys-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.dys-icon {
    width: 60px; height: 60px;
    min-width: 60px;
    border-radius: 16px;
    background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.6rem;
    color: var(--orange);
    transition: all 0.4s ease;
}
.dys-card:hover .dys-icon {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    color: white;
    transform: scale(1.1) rotate(-5deg);
    box-shadow: var(--shadow-orange);
}
.dys-card h3 {
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 6px;
}
.dys-card p {
    font-size: 0.92rem;
    color: var(--gray-600);
    margin: 0;
    line-height: 1.6;
}

@media (max-width: 767px) {
    .dys-grid { grid-template-columns: 1fr; }
}

/* Approche Pédagogique - Steps */
.approche-section {
    background: var(--white);
}
.steps-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    position: relative;
}
.steps-grid::before {
    content: '';
    position: absolute;
    top: 50px;
    left: 10%;
    right: 10%;
    height: 2px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light));
    opacity: 0.3;
}
.step-card {
    text-align: center;
    position: relative;
    z-index: 2;
}
.step-number {
    width: 80px; height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 2rem;
    font-weight: 800;
    color: white;
    box-shadow: var(--shadow-orange);
    position: relative;
}
.step-number i {
    font-size: 1.8rem;
}
.step-number::after {
    content: '';
    position: absolute;
    inset: -8px;
    border-radius: 50%;
    border: 2px dashed rgba(255,107,53,0.3);
    animation: rotate-slow 20s linear infinite;
}
@keyframes rotate-slow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
.step-card h3 {
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 10px;
}
.step-card p {
    font-size: 0.92rem;
    color: var(--gray-600);
    line-height: 1.7;
}

@media (max-width: 991px) {
    .steps-grid { grid-template-columns: repeat(2, 1fr); }
    .steps-grid::before { display: none; }
}
@media (max-width: 767px) {
    .steps-grid { grid-template-columns: 1fr; }
}

/* Objectifs - Fond bleu */
.objectifs-section {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
    position: relative;
    overflow: hidden;
}
.objectifs-section::before {
    content: '';
    position: absolute;
    top: -100px; right: -100px;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(255,107,53,0.1), transparent 70%);
}
.objectifs-section .section-title-big,
.objectifs-section .section-subtitle {
    color: white;
}
.objectifs-section .section-label-orange {
    color: var(--orange-light);
}
.objectifs-section .section-label-orange::before {
    background: var(--orange-light);
}
.objectifs-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    max-width: 800px;
    margin: 0 auto;
}
.objectif-item {
    display: flex;
    align-items: center;
    gap: 16px;
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 16px;
    padding: 24px;
    transition: all 0.3s ease;
}
.objectif-item:hover {
    background: rgba(255,255,255,0.12);
    transform: translateX(10px);
    border-color: rgba(255,107,53,0.3);
}
.objectif-check {
    width: 44px; height: 44px;
    min-width: 44px;
    border-radius: 12px;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
    box-shadow: var(--shadow-orange);
}
.objectif-item span {
    font-size: 1.05rem;
    color: white;
    font-weight: 600;
}

@media (max-width: 767px) {
    .objectifs-grid { grid-template-columns: 1fr; }
}

/* ============================================
   TARIFS INTERACTIFS - CSS À AJOUTER DANS <style>
   ============================================ */
.tarif-card-interactif {
    background: var(--white);
    border-radius: 24px;
    overflow: hidden;
    border: 1px solid var(--gray-100);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    height: 100%;
    box-shadow: var(--shadow-md);
}
.tarif-card-interactif:hover {
    transform: translateY(-12px);
    box-shadow: var(--shadow-xl);
    border-color: transparent;
}
.tarif-card-interactif.recommande {
    border: 2px solid #8b5cf6;
    transform: scale(1.02);
}
.tarif-card-interactif.recommande:hover {
    transform: scale(1.02) translateY(-12px);
}
.badge-recommande-tarif {
    position: absolute;
    top: 0;
    right: 0;
    background: #8b5cf6;
    color: white;
    padding: 8px 20px;
    font-size: 0.75rem;
    font-weight: 700;
    border-radius: 0 0 0 16px;
    z-index: 2;
    letter-spacing: 1px;
}
.tarif-card-header {
    padding: 40px 30px;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
}
.tarif-card-header::before {
    content: '';
    position: absolute;
    top: -40px;
    right: -40px;
    width: 150px;
    height: 150px;
    background: radial-gradient(circle, rgba(255,255,255,0.15), transparent 70%);
    border-radius: 50%;
}
.tarif-flag {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    font-size: 1.5rem;
    position: relative;
    z-index: 1;
}
.tarif-card-header h3 {
    font-size: 1.2rem;
    font-weight: 800;
    margin-bottom: 12px;
    position: relative;
    z-index: 1;
}
.tarif-prix {
    font-size: 2.8rem;
    font-weight: 800;
    line-height: 1;
    margin-bottom: 8px;
    position: relative;
    z-index: 1;
}
.tarif-prix span {
    font-size: 0.95rem;
    font-weight: 600;
    opacity: 0.85;
}
.tarif-duree {
    font-size: 0.9rem;
    opacity: 0.8;
    margin: 0;
    position: relative;
    z-index: 1;
}
.tarif-duree i {
    margin-right: 6px;
}
.tarif-card-body {
    padding: 30px;
}
.tarif-features {
    list-style: none;
    padding: 0;
    margin: 0 0 24px 0;
}
.tarif-features li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 10px 0;
    font-size: 0.9rem;
    color: var(--gray-600);
    border-bottom: 1px solid var(--gray-100);
}
.tarif-features li:last-child {
    border-bottom: none;
}
.tarif-features li i {
    color: var(--orange);
    font-size: 0.85rem;
    margin-top: 3px;
    min-width: 16px;
}
.tarif-formule-selector {
    margin-bottom: 20px;
}
.tarif-formule-selector label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.tarif-formule-selector label i {
    color: var(--orange);
}
.formule-select {
    width: 100%;
    padding: 14px 16px;
    border-radius: 12px;
    border: 2px solid var(--gray-200);
    background: var(--white);
    color: var(--gray-800);
    font-size: 0.9rem;
    font-weight: 600;
    font-family: 'Nunito', sans-serif;
    cursor: pointer;
    transition: all 0.3s ease;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23FF6B35' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 16px center;
    padding-right: 40px;
}
.formule-select:focus {
    outline: none;
    border-color: var(--orange);
    box-shadow: 0 0 0 4px rgba(255,107,53,0.1);
}
.formule-select:hover {
    border-color: var(--orange-light);
}
.btn-tarif {
    width: 100%;
    padding: 16px 24px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: all 0.3s ease;
    background: linear-gradient(135deg, var(--orange) 0%, var(--orange-light) 100%);
    color: white;
    box-shadow: var(--shadow-orange);
    border: none;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}
.btn-tarif::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s ease;
}
.btn-tarif:hover::before {
    left: 100%;
}
.btn-tarif:hover {
    background: linear-gradient(135deg, var(--orange-dark) 0%, var(--orange) 100%);
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(255,107,53,0.4);
    color: white;
}
.btn-tarif i {
    transition: transform 0.3s ease;
}
.btn-tarif:hover i {
    transform: translateX(4px);
}

/* Conditions générales */
.tarif-conditions-box {
    background: linear-gradient(135deg, var(--gray-50) 0%, var(--cream) 100%);
    border-radius: 20px;
    padding: 35px 40px;
    border: 1px solid var(--gray-100);
}
.tarif-conditions-box h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.tarif-conditions-list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.tarif-conditions-list li {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 0;
    font-size: 0.92rem;
    color: var(--gray-600);
}
.tarif-conditions-list li i {
    color: var(--orange);
    font-size: 0.9rem;
}

/* Animation pulse */
.pulse-btn {
    animation: pulse-glow 2s infinite;
}
@keyframes pulse-glow {
    0%, 100% { box-shadow: 0 0 0 0 rgba(255,107,53,0.4); }
    50% { box-shadow: 0 0 0 15px rgba(255,107,53,0); }
}

/* Responsive */
@media (max-width: 767px) {
    .tarif-prix { font-size: 2.2rem; }
    .tarif-card-header { padding: 30px 20px; }
    .tarif-card-body { padding: 24px 20px; }
    .tarif-conditions-box { padding: 24px; }
}
/* CTA Final */
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

/* Responsive global */
@media (max-width: 767px) {
    .section-padding { padding: 60px 0; }
    .page-hero { min-height: 45vh; padding: 60px 0; }
}
</style>

<body>
@include('partials.header')



<!-- ============================================
     PAGE HERO
     ============================================ -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content animate-scroll">
            <div class="page-hero-label"><i class="fas fa-puzzle-piece"></i> Accompagnement spécialisé</div>
            <h1 class="page-hero-title">Accompagnement <span class="highlight-orange">DYS</span> au primaire</h1>
            <p class="page-hero-subtitle">Un accompagnement pédagogique adapté aux besoins spécifiques de chaque enfant. Progresser à son rythme, avec confiance.</p>
            <div class="page-hero-badges">
                <div class="page-hero-badge"><i class="fas fa-check-circle"></i> Dyslexie</div>
                <div class="page-hero-badge"><i class="fas fa-check-circle"></i> Dysorthographie</div>
                <div class="page-hero-badge"><i class="fas fa-check-circle"></i> Dyscalculie</div>
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
        <a href="{{ url('/reponse') }}">Primaire</a>
        <i class="fas fa-chevron-right"></i>
        <span class="current">Accompagnement DYS</span>
    </div>
</div>

<!-- ============================================
     INTRODUCTION
     ============================================ -->
<section class="intro-section section-padding">
    <div class="container">
        <div class="intro-content animate-scroll">
            <div class="section-label-orange">Présentation</div>
            <h2 class="section-title-big">Chaque enfant apprend <span style="color: var(--orange);">différemment</span></h2>
            <p class="intro-text">
                Les enfants présentant des <strong>troubles spécifiques des apprentissages (DYS)</strong> ont besoin d'un accompagnement personnalisé, d'une pédagogie adaptée et d'un environnement favorable pour progresser.
            </p>
            <p class="intro-text">
                <strong>MONPROFCHEZMOI</strong> accompagne les élèves du primaire rencontrant des difficultés liées aux apprentissages afin de les aider à <strong>développer leurs compétences, renforcer leur confiance et progresser à leur rythme</strong>.
            </p>
            <div class="intro-highlight">
                <i class="fas fa-heart"></i> Un accompagnement bienveillant et sur mesure
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     ACCOMPAGNEMENTS SPÉCIALISÉS
     ============================================ -->
<section class="dys-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Nos accompagnements</div>
            <h2 class="section-title-big">Accompagnements <span style="color: var(--orange);">spécialisés</span></h2>
            <p class="section-subtitle">Nous proposons un suivi adapté pour les enfants présentant différents besoins.</p>
        </div>

        <div class="dys-grid">
            <div class="dys-card animate-scroll">
                <div class="dys-icon"><i class="fas fa-book-reader"></i></div>
                <div>
                    <h3>Dyslexie</h3>
                    <p>Difficultés liées à la lecture et à la décoding des mots.</p>
                </div>
            </div>
            <div class="dys-card animate-scroll">
                <div class="dys-icon"><i class="fas fa-spell-check"></i></div>
                <div>
                    <h3>Dysorthographie</h3>
                    <p>Difficultés liées à l'orthographe et à l'écriture.</p>
                </div>
            </div>
            <div class="dys-card animate-scroll">
                <div class="dys-icon"><i class="fas fa-calculator"></i></div>
                <div>
                    <h3>Dyscalculie</h3>
                    <p>Difficultés liées aux mathématiques et au raisonnement numérique.</p>
                </div>
            </div>
            <div class="dys-card animate-scroll">
                <div class="dys-icon"><i class="fas fa-brain"></i></div>
                <div>
                    <h3>Concentration & Organisation</h3>
                    <p>Difficultés de focus, de planification et de structuration du travail.</p>
                </div>
            </div>
            <div class="dys-card animate-scroll" style="grid-column: span 2;">
                <div class="dys-icon"><i class="fas fa-chart-line"></i></div>
                <div>
                    <h3>Retards dans les apprentissages fondamentaux</h3>
                    <p>Accompagnement ciblé pour combler les lacunes et reconstruire les bases essentielles en lecture, écriture et calcul.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================================
     TARIFS INTERACTIFS - DYS PRIMAIRE
     ============================================ -->
<section id="tarifs" class="tarifs-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Investissement</div>
            <h2 class="section-title-big">Tarif accompagnement <span style="color: var(--orange);">spécialisé primaire</span></h2>
            <p class="section-subtitle">Choisissez le type d'accompagnement adapté aux besoins de votre enfant et inscrivez-vous en un clic.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- DIFFICULTÉS SCOLAIRES -->
            <div class="col-lg-4 col-md-6 animate-scroll animate-delay-1">
                <div class="tarif-card-interactif">
                    <div class="tarif-card-header" style="background: linear-gradient(135deg, #FF8200 0%, #FF9933 100%);">
                        <div class="tarif-flag"><i class="fas fa-exclamation-circle"></i></div>
                        <h3>Difficultés scolaires</h3>
                        <div class="tarif-prix">15 000 <span>FCFA / séance</span></div>
                        <p class="tarif-duree"><i class="fas fa-clock"></i> 1h30 à 2h par séance</p>
                    </div>
                    <div class="tarif-card-body">
                        <ul class="tarif-features">
                            <li><i class="fas fa-check"></i> Accompagnement personnalisé</li>
                            <li><i class="fas fa-check"></i> Enseignant spécialisé</li>
                            <li><i class="fas fa-check"></i> Méthodes adaptées</li>
                            <li><i class="fas fa-check"></i> Minimum 4 séances / mois</li>
                            <li><i class="fas fa-check"></i> Paiement mensuel à l'avance</li>
                        </ul>
                        <div class="tarif-formule-selector">
                            <label><i class="fas fa-layer-group"></i> Choisir votre formule :</label>
                            <select class="formule-select" id="formule-dys-1" onchange="updateTarifDys1()">
                                <option value="15000|1">1 séance — 15 000 FCFA</option>
                                <option value="60000|4" selected>Formule Essentielle (4 séances) — 60 000 FCFA</option>
                                <option value="120000|8">Formule Recommandée (8 séances) — 120 000 FCFA</option>
                                <option value="180000|12">Formule Renforcée (12 séances) — 180 000 FCFA</option>
                            </select>
                        </div>
                       <button class="btn-tarif pulse-btn" onclick="openInscriptionModal('Accompagnement DYS - Difficultés scolaires', document.getElementById('formule-dys-1').value.split('|')[0], document.getElementById('formule-dys-1').options[document.getElementById('formule-dys-1').selectedIndex].text.split('—')[0].trim())">
    Je m'inscris <i class="fas fa-arrow-right"></i>
</button>
                    </div>
                </div>
            </div>

            <!-- RETARD SCOLAIRE IMPORTANT -->
            <div class="col-lg-4 col-md-6 animate-scroll animate-delay-2">
                <div class="tarif-card-interactif">
                    <div class="tarif-card-header" style="background: linear-gradient(135deg, #E85A2B 0%, #FF6B35 100%);">
                        <div class="tarif-flag"><i class="fas fa-exclamation-triangle"></i></div>
                        <h3>Retard scolaire important</h3>
                        <div class="tarif-prix">18 000 <span>FCFA / séance</span></div>
                        <p class="tarif-duree"><i class="fas fa-clock"></i> 1h30 à 2h par séance</p>
                    </div>
                    <div class="tarif-card-body">
                        <ul class="tarif-features">
                            <li><i class="fas fa-check"></i> Accompagnement intensif</li>
                            <li><i class="fas fa-check"></i> Enseignant spécialisé</li>
                            <li><i class="fas fa-check"></i> Remise à niveau ciblée</li>
                            <li><i class="fas fa-check"></i> Minimum 4 séances / mois</li>
                            <li><i class="fas fa-check"></i> Paiement mensuel à l'avance</li>
                        </ul>
                        <div class="tarif-formule-selector">
                            <label><i class="fas fa-layer-group"></i> Choisir votre formule :</label>
                            <select class="formule-select" id="formule-dys-2" onchange="updateTarifDys2()">
                                <option value="18000|1">1 séance — 18 000 FCFA</option>
                                <option value="72000|4" selected>Formule Essentielle (4 séances) — 72 000 FCFA</option>
                                <option value="144000|8">Formule Recommandée (8 séances) — 144 000 FCFA</option>
                                <option value="216000|12">Formule Renforcée (12 séances) — 216 000 FCFA</option>
                            </select>
                        </div>
                        <button class="btn-tarif pulse-btn" onclick="openInscriptionModal('Accompagnement DYS - Retard scolaire', document.getElementById('formule-dys-2').value.split('|')[0], document.getElementById('formule-dys-2').options[document.getElementById('formule-dys-2').selectedIndex].text.split('—')[0].trim())">
    Je m'inscris <i class="fas fa-arrow-right"></i>
</button>
                    </div>
                </div>
            </div>

            <!-- TROUBLES SPÉCIFIQUES -->
            <div class="col-lg-4 col-md-6 animate-scroll animate-delay-3">
                <div class="tarif-card-interactif recommande">
                    <div class="badge-recommande-tarif"><i class="fas fa-star"></i> SPÉCIALISÉ</div>
                    <div class="tarif-card-header" style="background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%);">
                        <div class="tarif-flag"><i class="fas fa-puzzle-piece"></i></div>
                        <h3>Troubles spécifiques (DYS)</h3>
                        <div class="tarif-prix">20 000 <span>FCFA / séance</span></div>
                        <p class="tarif-duree"><i class="fas fa-clock"></i> 1h30 à 2h par séance</p>
                    </div>
                    <div class="tarif-card-body">
                        <ul class="tarif-features">
                            <li><i class="fas fa-check"></i> Accompagnement DYS expert</li>
                            <li><i class="fas fa-check"></i> Enseignant spécialisé DYS</li>
                            <li><i class="fas fa-check"></i> Pédagogie adaptée</li>
                            <li><i class="fas fa-check"></i> Minimum 4 séances / mois</li>
                            <li><i class="fas fa-check"></i> Paiement mensuel à l'avance</li>
                        </ul>
                        <div class="tarif-formule-selector">
                            <label><i class="fas fa-layer-group"></i> Choisir votre formule :</label>
                            <select class="formule-select" id="formule-dys-3" onchange="updateTarifDys3()">
                                <option value="20000|1">1 séance — 20 000 FCFA</option>
                                <option value="80000|4" selected>Formule Essentielle (4 séances) — 80 000 FCFA</option>
                                <option value="160000|8">Formule Recommandée (8 séances) — 160 000 FCFA</option>
                                <option value="240000|12">Formule Renforcée (12 séances) — 240 000 FCFA</option>
                            </select>
                        </div>
                        <button class="btn-tarif pulse-btn" onclick="openInscriptionModal('Accompagnement DYS - Troubles spécifiques', document.getElementById('formule-dys-3').value.split('|')[0], document.getElementById('formule-dys-3').options[document.getElementById('formule-dys-3').selectedIndex].text.split('—')[0].trim())">
    Je m'inscris <i class="fas fa-arrow-right"></i>
</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- CONDITIONS GÉNÉRALES -->
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
                                <li><i class="fas fa-check-circle"></i> Un enseignant spécialisé selon le besoin</li>
                                <li><i class="fas fa-check-circle"></i> Accompagnement adapté au profil de l'élève</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     APPROCHE PÉDAGOGIQUE
     ============================================ -->
<section class="approche-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Notre méthode</div>
            <h2 class="section-title-big">Notre approche <span style="color: var(--orange);">pédagogique</span></h2>
            <p class="section-subtitle">Un accompagnement structuré et progressif pour des résultats durables.</p>
        </div>

        <div class="steps-grid">
            <div class="step-card animate-scroll">
                <div class="step-number"><i class="fas fa-search"></i></div>
                <h3>Analyse des besoins</h3>
                <p>Identification des difficultés rencontrées et des compétences à renforcer.</p>
            </div>
            <div class="step-card animate-scroll">
                <div class="step-number"><i class="fas fa-bullseye"></i></div>
                <h3>Méthodes adaptées</h3>
                <p>Approches pédagogiques favorisant la compréhension, la mémorisation et la confiance.</p>
            </div>
            <div class="step-card animate-scroll">
                <div class="step-number"><i class="fas fa-book-open"></i></div>
                <h3>Travail progressif</h3>
                <p>Renforcement des bases en lecture, écriture, calcul et méthodologie.</p>
            </div>
            <div class="step-card animate-scroll">
                <div class="step-number"><i class="fas fa-chart-bar"></i></div>
                <h3>Suivi régulier</h3>
                <p>Observation des progrès et adaptation continue de l'accompagnement.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     OBJECTIFS
     ============================================ -->
<section class="objectifs-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Nos objectifs</div>
            <h2 class="section-title-big">Ce que nous visons pour <span style="color: var(--orange-light);">votre enfant</span></h2>
            <p class="section-subtitle">Grâce à un suivi personnalisé, nous aidons l'enfant à progresser sereinement.</p>
        </div>

        <div class="objectifs-grid">
            <div class="objectif-item animate-scroll">
                <div class="objectif-check"><i class="fas fa-check"></i></div>
                <span>Améliorer ses apprentissages fondamentaux</span>
            </div>
            <div class="objectif-item animate-scroll">
                <div class="objectif-check"><i class="fas fa-check"></i></div>
                <span>Développer sa confiance en lui</span>
            </div>
            <div class="objectif-item animate-scroll">
                <div class="objectif-check"><i class="fas fa-check"></i></div>
                <span>Retrouver le plaisir d'apprendre</span>
            </div>
            <div class="objectif-item animate-scroll">
                <div class="objectif-check"><i class="fas fa-check"></i></div>
                <span>Progresser avec des méthodes adaptées</span>
            </div>
            <div class="objectif-item animate-scroll" style="grid-column: span 2; justify-content: center;">
                <div class="objectif-check"><i class="fas fa-check"></i></div>
                <span>Gagner progressivement en autonomie</span>
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

            <button type="submit" class="btn-confirm-inscription" id="btnConfirmInscription">
                <i class="fas fa-check-circle"></i> Confirmer l'inscription
            </button>
        </form>
    </div>
</div>

<!-- ============================================
     CTA FINAL
     ============================================ -->
<section class="cta-section section-padding">
    <div class="container">
        <div class="animate-scroll">
            <h2 class="section-title-big">Votre enfant a besoin d'un accompagnement <span style="color: var(--orange);">adapté</span> ?</h2>
            <p class="section-subtitle">Notre équipe vous accompagne pour identifier la solution pédagogique la plus adaptée à son profil.</p>
            <div class="cta-buttons">
                <a href="{{ url('/reponse') }}" class="btn-cta-orange"><i class="fas fa-clipboard-check"></i> Demander une évaluation</a>
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
</script>
<script>
// ========== MODAL D'INSCRIPTION ==========
let currentFormule = '';
let currentPrix = '';

function openInscriptionModal(formule, prix, detail) {
    currentFormule = formule;
    currentPrix = prix + ' FCFA (' + (detail || '1 séance') + ')';

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

    modal.innerHTML = `
        <div class="modal-success">
            <div class="modal-success-icon"><i class="fas fa-check"></i></div>
            <h3>Inscription envoyée !</h3>
            <p>Merci ${parentName}. Notre équipe vous contactera très prochainement au <strong>${phone}</strong> pour finaliser votre inscription.</p>
            <button class="btn-success-close" onclick="closeInscriptionModal()">Fermer</button>
        </div>
    `;
}

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

function redirectToContact(part, prix = null) {
    console.log('Ancienne redirection désactivée - utiliser openInscriptionModal()');
}
function updateTarifDys1() {
    const select = document.getElementById('formule-dys-1');
    select.style.borderColor = '#FF8200';
    setTimeout(() => { select.style.borderColor = ''; }, 300);
}

function updateTarifDys2() {
    const select = document.getElementById('formule-dys-2');
    select.style.borderColor = '#E85A2B';
    setTimeout(() => { select.style.borderColor = ''; }, 300);
}

function updateTarifDys3() {
    const select = document.getElementById('formule-dys-3');
    select.style.borderColor = '#8b5cf6';
    setTimeout(() => { select.style.borderColor = ''; }, 300);
}
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>

