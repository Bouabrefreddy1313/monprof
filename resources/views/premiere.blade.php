<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Orientation Première - Monprofchezmoi-ci.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Orientation Première, Parcours études, Lycée, Bac, Abidjan, Côte d'Ivoire" name="keywords">
    <meta content="Accompagnement personnalisé pour les élèves de Première : exploration des formations, métiers et construction du projet d'études à Abidjan." name="description">

    <link href="asset/img/favicon.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="asset/css/courscss/bootstrap.min.css" rel="stylesheet">
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
    --purple: #7C3AED;
    --purple-light: #A78BFA;
    --green: #10B981;
    --green-light: #34D399;
    --teal: #14B8A6;
    --teal-light: #5EEAD4;
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
    position: fixed; top: 0; left: 0; height: 3px;
    background: linear-gradient(90deg, var(--orange), var(--purple), var(--blue-accent));
    z-index: 10000; width: 0%; transition: width 0.1s;
}


/* Topbar */
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

/* Navbar */
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
    color: var(--blue) !important; display: flex;
    align-items: center; gap: 10px;
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
    height: 3px; background: var(--orange);
    border-radius: 3px 3px 0 0; transform: scaleX(0);
    transition: transform 0.3s ease;
}
.nav-menu-moderne .nav-link-moderne:hover,
.nav-menu-moderne .nav-link-moderne.active { color: var(--orange); }
.nav-menu-moderne .nav-link-moderne:hover::after,
.nav-menu-moderne .nav-link-moderne.active::after { transform: scaleX(1); }
.nav-link-moderne .chevron {
    font-size: 0.6rem; transition: transform 0.3s ease; color: var(--orange);
}
.nav-item-moderne:hover .chevron { transform: rotate(180deg); }

/* Mega Menu */
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
    width: 32px; height: 32px; min-width: 32px;
    border-radius: 8px; background: var(--gray-50);
    display: flex; align-items: center; justify-content: center;
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
   NAVBAR MOBILE — VERSION CORRIGÉE COMPLÈTE
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

    /* ===== MEGA MENU MOBILE — CORRIGÉ ===== */
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
   NAVBAR MOBILE — TRÈS PETITS ÉCRANS
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
   TOPBAR MOBILE — CORRIGÉ
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
   PAGE HERO - ORIENTATION PREMIÈRE
   ============================================ */
.page-hero-premiere {
    min-height: 65vh;
    background: linear-gradient(135deg, var(--blue) 0%, #1a1a3e 40%, var(--blue-light) 100%);
    position: relative; overflow: hidden;
    display: flex; align-items: center; padding: 80px 0;
}
.page-hero-premiere::before {
    content: ''; position: absolute;
    top: -20%; right: -10%; width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(20,184,166,0.15), transparent 70%);
    border-radius: 50%;
    animation: float-hero 8s ease-in-out infinite;
}
.page-hero-premiere::after {
    content: ''; position: absolute;
    bottom: -10%; left: -5%; width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(255,107,53,0.1), transparent 70%);
    border-radius: 50%;
    animation: float-hero 10s ease-in-out infinite reverse;
}
@keyframes float-hero {
    0%, 100% { transform: translate(0, 0); }
    50% { transform: translate(-30px, -20px); }
}

/* Particules animées */
.particles {
    position: absolute; inset: 0; overflow: hidden; pointer-events: none;
}
.particle {
    position: absolute; width: 4px; height: 4px;
    background: rgba(255,107,53,0.3); border-radius: 50%;
    animation: particle-float 15s infinite;
}
.particle:nth-child(1) { left: 10%; top: 20%; animation-delay: 0s; }
.particle:nth-child(2) { left: 30%; top: 60%; animation-delay: 2s; width: 6px; height: 6px; background: rgba(20,184,166,0.3); }
.particle:nth-child(3) { left: 70%; top: 30%; animation-delay: 4s; }
.particle:nth-child(4) { left: 85%; top: 70%; animation-delay: 6s; width: 5px; height: 5px; background: rgba(59,130,246,0.3); }
.particle:nth-child(5) { left: 50%; top: 80%; animation-delay: 8s; }
.particle:nth-child(6) { left: 20%; top: 40%; animation-delay: 10s; width: 3px; height: 3px; background: rgba(255,107,53,0.4); }
@keyframes particle-float {
    0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0; }
    10% { opacity: 1; }
    90% { opacity: 1; }
    100% { transform: translateY(-100vh) rotate(720deg); opacity: 0; }
}

.page-hero-content {
    position: relative; z-index: 2;
    max-width: 1200px; margin: 0 auto;
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 60px; align-items: center;
}
.page-hero-left { text-align: left; }
.page-hero-label {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(20,184,166,0.15);
    border: 1px solid rgba(20,184,166,0.3);
    color: var(--teal-light);
    padding: 8px 18px; border-radius: 50px;
    font-size: 0.82rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: 1px;
    margin-bottom: 20px;
}
.page-hero-title {
    font-size: clamp(2rem, 4vw, 3.2rem);
    font-weight: 800; color: white; line-height: 1.15;
    margin-bottom: 16px;
}
.page-hero-title .highlight-orange { color: var(--orange); position: relative; }
.page-hero-title .highlight-teal { color: var(--teal-light); position: relative; }
.page-hero-subtitle {
    font-size: 1.15rem; color: rgba(255,255,255,0.75);
    line-height: 1.8; margin-bottom: 30px;
}
.page-hero-badges {
    display: flex; gap: 12px; flex-wrap: wrap;
}
.page-hero-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.15);
    color: white; padding: 10px 20px;
    border-radius: 50px; font-size: 0.85rem; font-weight: 600;
    transition: all 0.3s ease;
}
.page-hero-badge:hover {
    background: rgba(20,184,166,0.2);
    border-color: var(--teal);
    transform: translateY(-2px);
}

/* Hero Image */
.hero-image-wrapper {
    position: relative; display: flex; justify-content: center;
}
.hero-image-main {
    width: 100%; max-width: 450px;
    border-radius: 24px;
    box-shadow: 0 32px 64px rgba(0,0,0,0.4);
    transform: perspective(1000px) rotateY(-5deg) rotateX(5deg);
    transition: all 0.6s ease;
    animation: hero-image-float 6s ease-in-out infinite;
}
.hero-image-main:hover {
    transform: perspective(1000px) rotateY(0deg) rotateX(0deg) scale(1.02);
}
@keyframes hero-image-float {
    0%, 100% { transform: perspective(1000px) rotateY(-5deg) rotateX(5deg) translateY(0); }
    50% { transform: perspective(1000px) rotateY(-5deg) rotateX(5deg) translateY(-15px); }
}

/* Floating cards autour de l'image */
.floating-card {
    position: absolute;
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 16px;
    padding: 16px 20px;
    color: white;
    display: flex; align-items: center; gap: 12px;
    animation: float-card 4s ease-in-out infinite;
}
.floating-card i {
    width: 40px; height: 40px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.2rem;
}
.floating-card-1 {
    top: 10%; left: -20px;
    animation-delay: 0s;
}
.floating-card-1 i { background: var(--teal); }
.floating-card-2 {
    bottom: 15%; right: -10px;
    animation-delay: 1.5s;
}
.floating-card-2 i { background: var(--orange); }
.floating-card-3 {
    top: 50%; right: -30px;
    animation-delay: 3s;
}
.floating-card-3 i { background: var(--purple); }
@keyframes float-card {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

@media (max-width: 991px) {
    .page-hero-content { grid-template-columns: 1fr; text-align: center; }
    .page-hero-left { text-align: center; }
    .page-hero-badges { justify-content: center; }
    .hero-image-wrapper { display: none; }
}

/* Breadcrumb */
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

/* Sections */
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
.section-label-teal {
    display: inline-flex; align-items: center; gap: 8px;
    font-size: 0.8rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: 2px; color: var(--teal); margin-bottom: 16px;
}
.section-label-teal::before {
    content: ''; width: 30px; height: 3px;
    background: var(--teal); border-radius: 2px;
}
.section-title-big {
    font-size: clamp(1.8rem, 3.5vw, 2.8rem);
    font-weight: 800; color: var(--blue); line-height: 1.2;
    margin-bottom: 16px;
}
.section-subtitle {
    font-size: 1.05rem; color: var(--gray-600); line-height: 1.8;
}

/* ============================================
   INTRO SECTION
   ============================================ */
.intro-section { background: var(--white); }
.intro-content { max-width: 900px; margin: 0 auto; text-align: center; }
.intro-text {
    font-size: 1.15rem; color: var(--gray-600);
    line-height: 1.9; margin-bottom: 20px;
}
.intro-text strong { color: var(--blue); }
.intro-highlight {
    display: inline-flex; align-items: center; gap: 10px;
    background: linear-gradient(135deg, rgba(20,184,166,0.1), rgba(20,184,166,0.05));
    border: 1px solid rgba(20,184,166,0.2);
    color: var(--teal); padding: 12px 24px;
    border-radius: 50px; font-size: 0.95rem; font-weight: 600;
    margin-top: 20px;
}

/* Checklist intro */
.intro-checklist {
    display: grid; grid-template-columns: repeat(3, 1fr);
    gap: 20px; margin-top: 40px;
}
.intro-check-item {
    display: flex; align-items: center; gap: 12px;
    padding: 16px 20px; background: var(--gray-50);
    border-radius: 12px; border: 1px solid var(--gray-100);
    transition: all 0.3s ease;
}
.intro-check-item:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
    border-color: var(--orange);
}
.intro-check-item i {
    width: 36px; height: 36px; min-width: 36px;
    border-radius: 10px; background: var(--orange);
    color: white; display: flex; align-items: center; justify-content: center;
    font-size: 0.9rem;
}
.intro-check-item span {
    font-weight: 600; color: var(--gray-800); font-size: 0.9rem;
}
@media (max-width: 767px) {
    .intro-checklist { grid-template-columns: 1fr; }
}

/* ============================================
   PUBLIC CONCERNÉ
   ============================================ */
.public-section { background: var(--cream); }
.public-card {
    background: var(--white); border-radius: 20px;
    padding: 40px; border: 1px solid var(--gray-100);
    text-align: center; transition: all 0.4s ease;
    max-width: 600px; margin: 0 auto;
}
.public-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.public-icon {
    width: 80px; height: 80px; border-radius: 20px;
    background: linear-gradient(135deg, rgba(20,184,166,0.1), rgba(20,184,166,0.05));
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px; font-size: 2rem; color: var(--teal);
    transition: all 0.4s ease;
}
.public-card:hover .public-icon {
    background: linear-gradient(135deg, var(--teal), var(--teal-light));
    color: white; transform: scale(1.1) rotate(-5deg);
    box-shadow: 0 8px 32px rgba(20,184,166,0.3);
}
.public-card h3 {
    font-size: 1.3rem; font-weight: 700; color: var(--blue);
    margin-bottom: 12px;
}
.public-card p {
    font-size: 1rem; color: var(--gray-600);
    line-height: 1.7; margin: 0;
}

/* ============================================
   OBJECTIFS SECTION
   ============================================ */
.objectifs-section { background: var(--white); }
.objectifs-grid {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;
}
.objectif-card {
    background: var(--white); border-radius: 20px;
    padding: 35px 28px; border: 1px solid var(--gray-100);
    transition: all 0.4s ease; position: relative; overflow: hidden;
}
.objectif-card::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0;
    height: 4px; background: linear-gradient(90deg, var(--teal), var(--teal-light));
    transform: scaleX(0); transition: transform 0.4s ease;
}
.objectif-card:hover::before { transform: scaleX(1); }
.objectif-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.objectif-number {
    width: 50px; height: 50px; border-radius: 14px;
    background: linear-gradient(135deg, var(--teal), var(--teal-light));
    display: flex; align-items: center; justify-content: center;
    color: white; font-weight: 800; font-size: 1.2rem;
    margin-bottom: 20px; transition: all 0.4s ease;
}
.objectif-card:hover .objectif-number {
    transform: scale(1.1) rotate(-5deg);
    box-shadow: 0 8px 24px rgba(20,184,166,0.3);
}
.objectif-card h4 {
    font-size: 1.1rem; font-weight: 700; color: var(--blue);
    margin-bottom: 10px;
}
.objectif-card p {
    font-size: 0.92rem; color: var(--gray-600);
    line-height: 1.7; margin: 0;
}

@media (max-width: 991px) {
    .objectifs-grid { grid-template-columns: 1fr; }
}

/* ============================================
   PROGRAMME SECTION - TIMELINE
   ============================================ */
.programme-section { background: var(--cream); }
.programme-timeline {
    position: relative; max-width: 900px; margin: 0 auto;
}
.programme-timeline::before {
    content: ''; position: absolute; left: 50%; top: 0; bottom: 0;
    width: 3px; background: linear-gradient(to bottom, var(--teal), var(--teal-light));
    transform: translateX(-50%);
}
.timeline-item {
    display: flex; align-items: center; margin-bottom: 50px;
    position: relative;
}
.timeline-item:nth-child(odd) { flex-direction: row-reverse; }
.timeline-item:nth-child(odd) .timeline-content { text-align: right; padding-right: 60px; padding-left: 0; }
.timeline-item:nth-child(even) .timeline-content { padding-left: 60px; padding-right: 0; }
.timeline-content {
    width: 50%; padding: 0 30px;
}
.timeline-dot {
    position: absolute; left: 50%; transform: translateX(-50%);
    width: 50px; height: 50px; border-radius: 50%;
    background: linear-gradient(135deg, var(--teal), var(--teal-light));
    display: flex; align-items: center; justify-content: center;
    color: white; font-weight: 800; font-size: 1.1rem;
    box-shadow: 0 8px 24px rgba(20,184,166,0.3);
    z-index: 2;
}
.timeline-card {
    background: var(--white); border-radius: 20px;
    padding: 30px; border: 1px solid var(--gray-100);
    transition: all 0.4s ease;
}
.timeline-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
    border-color: var(--teal);
}
.timeline-card h4 {
    font-size: 1.2rem; font-weight: 700; color: var(--blue);
    margin-bottom: 16px; display: flex; align-items: center; gap: 10px;
}
.timeline-card h4 i { color: var(--teal); }
.timeline-card ul {
    list-style: none; padding: 0; margin: 0;
}
.timeline-card ul li {
    display: flex; align-items: flex-start; gap: 10px;
    padding: 8px 0; font-size: 0.95rem;
    color: var(--gray-800); border-bottom: 1px solid var(--gray-100);
}
.timeline-card ul li:last-child { border-bottom: none; }
.timeline-card ul li i {
    color: var(--teal); font-size: 0.85rem;
    margin-top: 4px; min-width: 16px;
}

@media (max-width: 767px) {
    .programme-timeline::before { left: 20px; }
    .timeline-item { flex-direction: column !important; align-items: flex-start; }
    .timeline-item:nth-child(odd) .timeline-content,
    .timeline-item:nth-child(even) .timeline-content {
        text-align: left; padding-left: 60px; padding-right: 0; width: 100%;
    }
    .timeline-dot { left: 20px; transform: none; }
}

/* ============================================
   COMPETENCES & OUTILS
   ============================================ */
.competences-section { background: var(--white); }
.competences-grid {
    display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px;
}
.competence-block {
    background: var(--white); border-radius: 20px;
    padding: 35px; border: 1px solid var(--gray-100);
    transition: all 0.4s ease;
}
.competence-block:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.competence-block-header {
    display: flex; align-items: center; gap: 16px; margin-bottom: 24px;
}
.competence-block-icon {
    width: 60px; height: 60px; border-radius: 16px;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex; align-items: center; justify-content: center;
    color: white; font-size: 1.5rem;
}
.competence-block h4 {
    font-size: 1.2rem; font-weight: 700; color: var(--blue);
    margin: 0;
}
.competence-block ul {
    list-style: none; padding: 0; margin: 0;
}
.competence-block ul li {
    display: flex; align-items: flex-start; gap: 12px;
    padding: 10px 0; font-size: 0.95rem;
    color: var(--gray-800); border-bottom: 1px solid var(--gray-100);
}
.competence-block ul li:last-child { border-bottom: none; }
.competence-block ul li i {
    color: var(--green); font-size: 1rem;
    margin-top: 2px; min-width: 20px;
}

@media (max-width: 767px) {
    .competences-grid { grid-template-columns: 1fr; }
}

/* ============================================
   ORGANISATION
   ============================================ */
.orga-section { background: var(--cream); }
.orga-grid {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;
}
.orga-card {
    background: var(--white); border-radius: 20px;
    padding: 35px 28px; border: 1px solid var(--gray-100);
    text-align: center; transition: all 0.4s ease;
}
.orga-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.orga-icon {
    width: 70px; height: 70px; border-radius: 18px;
    background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px; font-size: 1.8rem; color: var(--orange);
    transition: all 0.4s ease;
}
.orga-card:hover .orga-icon {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    color: white; transform: scale(1.1) rotate(-5deg);
    box-shadow: 0 8px 32px rgba(255,107,53,0.3);
}
.orga-card h4 {
    font-size: 1.15rem; font-weight: 700; color: var(--blue);
    margin-bottom: 10px;
}
.orga-card p {
    font-size: 0.95rem; color: var(--gray-600);
    line-height: 1.7; margin: 0;
}

@media (max-width: 991px) {
    .orga-grid { grid-template-columns: 1fr; }
}

/* ============================================
   TARIFS
   ============================================ */
.tarifs-section { background: var(--white); }
.tarifs-grid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 30px;
    max-width: 900px; margin: 0 auto;
}
.tarif-card {
    background: var(--white); border-radius: 24px;
    overflow: hidden; border: 1px solid var(--gray-100);
    transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
}
.tarif-card:hover {
    transform: translateY(-12px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.tarif-card.featured {
    border: 2px solid var(--orange);
    transform: scale(1.02);
}
.tarif-card.featured:hover {
    transform: scale(1.02) translateY(-12px);
}
.tarif-header {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
    padding: 30px; text-align: center; color: white;
    position: relative; overflow: hidden;
}
.tarif-card.featured .tarif-header {
    background: linear-gradient(135deg, var(--orange) 0%, var(--orange-light) 100%);
}
.tarif-header::before {
    content: ''; position: absolute; top: -30px; right: -30px;
    width: 100px; height: 100px;
    background: radial-gradient(circle, rgba(255,255,255,0.1), transparent 70%);
    border-radius: 50%;
}
.tarif-badge {
    display: inline-block;
    background: rgba(255,255,255,0.2);
    color: white; padding: 6px 16px;
    border-radius: 50px; font-size: 0.8rem; font-weight: 600;
    margin-bottom: 16px;
}
.tarif-header h3 {
    font-size: 1.4rem; font-weight: 800; margin-bottom: 8px;
}
.tarif-price {
    font-size: 2.5rem; font-weight: 800; color: var(--orange);
}
.tarif-card.featured .tarif-price { color: white; }
.tarif-price span {
    font-size: 1rem; font-weight: 600; color: rgba(255,255,255,0.7);
}
.tarif-body {
    padding: 30px;
}
.tarif-body ul {
    list-style: none; padding: 0; margin: 0 0 24px 0;
}
.tarif-body ul li {
    display: flex; align-items: flex-start; gap: 10px;
    padding: 10px 0; font-size: 0.92rem;
    color: var(--gray-800); border-bottom: 1px solid var(--gray-100);
}
.tarif-body ul li:last-child { border-bottom: none; }
.tarif-body ul li i {
    color: var(--green); font-size: 0.9rem;
    margin-top: 3px; min-width: 18px;
}
.contact-btn {
    width: 100%; padding: 14px 24px;
    border-radius: 12px; font-weight: 700; font-size: 0.95rem;
    text-decoration: none; display: inline-flex;
    align-items: center; justify-content: center; gap: 10px;
    transition: all 0.3s ease; background: var(--orange);
    color: white; box-shadow: var(--shadow-orange);
    border: none; cursor: pointer;
}
.contact-btn:hover {
    background: var(--orange-dark); transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(255,107,53,0.4); color: white;
}
.contact-btn i { transition: transform 0.3s ease; }
.contact-btn:hover i { transform: translateX(4px); }

@media (max-width: 767px) {
    .tarifs-grid { grid-template-columns: 1fr; }
    .tarif-card.featured { transform: none; }
    .tarif-card.featured:hover { transform: translateY(-12px); }
}

/* ============================================
   POURQUOI NOUS
   ============================================ */
.pourquoi-section { background: var(--cream); }
.pourquoi-grid {
    display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px;
    max-width: 1000px; margin: 0 auto;
}
.pourquoi-card {
    background: var(--white); border-radius: 20px;
    padding: 35px 28px; border: 1px solid var(--gray-100);
    display: flex; align-items: flex-start; gap: 20px;
    transition: all 0.4s ease;
}
.pourquoi-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.pourquoi-icon {
    width: 60px; height: 60px; min-width: 60px; border-radius: 16px;
    background: linear-gradient(135deg, rgba(20,184,166,0.1), rgba(20,184,166,0.05));
    display: flex; align-items: center; justify-content: center;
    font-size: 1.5rem; color: var(--teal);
    transition: all 0.4s ease;
}
.pourquoi-card:hover .pourquoi-icon {
    background: linear-gradient(135deg, var(--teal), var(--teal-light));
    color: white; transform: scale(1.1) rotate(-5deg);
    box-shadow: 0 8px 32px rgba(20,184,166,0.3);
}
.pourquoi-content h4 {
    font-size: 1.1rem; font-weight: 700; color: var(--blue);
    margin-bottom: 8px;
}
.pourquoi-content p {
    font-size: 0.92rem; color: var(--gray-600);
    line-height: 1.7; margin: 0;
}

@media (max-width: 767px) {
    .pourquoi-grid { grid-template-columns: 1fr; }
}

/* ============================================
   CTA FINAL
   ============================================ */
.cta-section {
    background: var(--blue); position: relative;
    overflow: hidden; text-align: center;
}
.cta-section::before {
    content: ''; position: absolute;
    top: -100px; right: -100px; width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(255,107,53,0.15), transparent 70%);
}
.cta-section .section-title-big { color: white; max-width: 700px; margin: 0 auto 20px; }
.cta-section .section-subtitle { color: rgba(255,255,255,0.7); max-width: 600px; margin: 0 auto 40px; }
.cta-buttons {
    display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;
}
.btn-cta-orange {
    padding: 16px 32px; border-radius: 12px; font-weight: 700;
    font-size: 1rem; text-decoration: none;
    display: inline-flex; align-items: center; gap: 10px;
    transition: all 0.3s ease; background: var(--orange);
    color: white; box-shadow: var(--shadow-orange); border: none; cursor: pointer;
}
.btn-cta-orange:hover {
    background: var(--orange-dark); transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(255,107,53,0.4); color: white;
}
.btn-cta-outline {
    padding: 16px 32px; border-radius: 12px; font-weight: 700;
    font-size: 1rem; text-decoration: none;
    display: inline-flex; align-items: center; gap: 10px;
    transition: all 0.3s ease; background: transparent;
    color: white; border: 2px solid rgba(255,255,255,0.3);
}
.btn-cta-outline:hover {
    background: rgba(255,255,255,0.1); border-color: white; color: white;
}

/* ============================================
   FOOTER
   ============================================ */
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
    content: '›'; color: var(--orange);
    font-weight: 700; font-size: 1.2rem;
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
.footer-bottom-moderne {
    padding: 24px 0; text-align: center;
}
.footer-bottom-moderne p {
    color: rgba(255,255,255,0.5); font-size: 0.88rem; margin: 0;
}
.footer-bottom-moderne a { color: var(--orange); text-decoration: none; }

@media (max-width: 991px) { .footer-grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 767px) { .footer-grid { grid-template-columns: 1fr; } }

/* Back to Top */
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
    from { opacity: 0; transform: translateX(-50px); }
    to { opacity: 1; transform: translateX(0); }
}
@keyframes fadeInRight {
    from { opacity: 0; transform: translateX(50px); }
    to { opacity: 1; transform: translateX(0); }
}
@keyframes scaleIn {
    from { opacity: 0; transform: scale(0.8); }
    to { opacity: 1; transform: scale(1); }
}

.animate-scroll {
    opacity: 0; transform: translateY(40px);
    transition: all 0.9s cubic-bezier(0.4, 0, 0.2, 1);
}
.animate-scroll.visible {
    opacity: 1; transform: translateY(0);
}

.animate-slide-left {
    opacity: 0; transform: translateX(-60px);
    transition: all 0.9s cubic-bezier(0.4, 0, 0.2, 1);
}
.animate-slide-left.visible {
    opacity: 1; transform: translateX(0);
}

.animate-slide-right {
    opacity: 0; transform: translateX(60px);
    transition: all 0.9s cubic-bezier(0.4, 0, 0.2, 1);
}
.animate-slide-right.visible {
    opacity: 1; transform: translateX(0);
}

.animate-scale {
    opacity: 0; transform: scale(0.85);
    transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
}
.animate-scale.visible {
    opacity: 1; transform: scale(1);
}

.animate-delay-1 { transition-delay: 0.1s; }
.animate-delay-2 { transition-delay: 0.2s; }
.animate-delay-3 { transition-delay: 0.3s; }
.animate-delay-4 { transition-delay: 0.4s; }
.animate-delay-5 { transition-delay: 0.5s; }

/* Stagger pour les cards */
.stagger-container .stagger-item {
    opacity: 0; transform: translateY(40px);
    transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
}
.stagger-container .stagger-item.visible {
    opacity: 1; transform: translateY(0);
}

/* ============================================
   MODAL D'INSCRIPTION
   ============================================ */
.modal-inscription-overlay {
    position: fixed; inset: 0;
    background: rgba(10, 22, 40, 0.6);
    backdrop-filter: blur(8px); z-index: 10000;
    display: flex; align-items: center; justify-content: center;
    padding: 20px; opacity: 0; visibility: hidden;
    transition: all 0.3s ease;
}
.modal-inscription-overlay.active {
    opacity: 1; visibility: visible;
}
.modal-inscription {
    background: var(--white); border-radius: 24px;
    width: 100%; max-width: 700px; max-height: 90vh;
    overflow-y: auto; position: relative;
    box-shadow: var(--shadow-xl);
    transform: translateY(30px) scale(0.95);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.modal-inscription-overlay.active .modal-inscription {
    transform: translateY(0) scale(1);
}
.modal-close {
    position: absolute; top: 16px; right: 16px;
    width: 40px; height: 40px; border-radius: 12px;
    background: var(--gray-100); border: none;
    color: var(--gray-600); font-size: 1.1rem;
    cursor: pointer; transition: all 0.2s ease;
    display: flex; align-items: center; justify-content: center;
    z-index: 10;
}
.modal-close:hover {
    background: var(--orange); color: white; transform: rotate(90deg);
}
.modal-header {
    text-align: center; padding: 40px 30px 20px;
    border-bottom: 1px solid var(--gray-100);
}
.modal-icon {
    width: 70px; height: 70px; border-radius: 20px;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 16px; font-size: 1.8rem; color: white;
    box-shadow: var(--shadow-orange);
}
.modal-header h3 {
    font-size: 1.4rem; font-weight: 800; color: var(--blue); margin-bottom: 6px;
}
.modal-header p {
    font-size: 0.9rem; color: var(--gray-600); margin: 0;
}
.modal-section {
    padding: 24px 30px; border-bottom: 1px solid var(--gray-100);
}
.modal-section:last-of-type { border-bottom: none; }
.modal-section h4 {
    font-size: 0.95rem; font-weight: 700; color: var(--blue);
    margin-bottom: 16px; display: flex; align-items: center; gap: 8px;
}
.modal-section h4 i { color: var(--orange); font-size: 1rem; }
.form-row {
    display: grid; grid-template-columns: 1fr 1fr; gap: 16px;
}
.form-group { margin-bottom: 16px; }
.form-group:last-child { margin-bottom: 0; }
.form-group label {
    display: block; font-size: 0.85rem; font-weight: 600;
    color: var(--gray-800); margin-bottom: 6px;
}
.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="tel"],
.form-group input[type="number"],
.form-group input[type="date"],
.form-group select {
    width: 100%; padding: 12px 14px;
    border: 2px solid var(--gray-200); border-radius: 10px;
    font-family: 'Nunito', sans-serif; font-size: 0.9rem;
    color: var(--gray-800); transition: all 0.2s ease; background: var(--white);
}
.form-group input:focus,
.form-group select:focus {
    outline: none; border-color: var(--orange);
    box-shadow: 0 0 0 4px rgba(255, 107, 53, 0.1);
}
.form-group input::placeholder { color: var(--gray-400); }
.form-group input[readonly] {
    background: var(--gray-50); color: var(--orange); font-weight: 700;
}
.radio-group {
    display: flex; flex-wrap: wrap; gap: 10px;
}
.radio-label {
    display: flex; align-items: center; gap: 6px;
    padding: 8px 14px; border: 2px solid var(--gray-200);
    border-radius: 10px; cursor: pointer;
    font-size: 0.85rem; font-weight: 600; color: var(--gray-800);
    transition: all 0.2s ease;
}
.radio-label:hover { border-color: var(--orange-light); }
.radio-label input[type="radio"] {
    accent-color: var(--orange); width: 16px; height: 16px;
}
.radio-label:has(input:checked) {
    border-color: var(--orange);
    background: rgba(255, 107, 53, 0.05); color: var(--orange);
}
.checkbox-days {
    display: flex; flex-wrap: wrap; gap: 8px;
}
.day-checkbox {
    display: flex; align-items: center; gap: 5px;
    padding: 8px 12px; border: 2px solid var(--gray-200);
    border-radius: 8px; cursor: pointer;
    font-size: 0.85rem; font-weight: 600; color: var(--gray-800);
    transition: all 0.2s ease;
}
.day-checkbox:hover { border-color: var(--orange-light); }
.day-checkbox input[type="checkbox"] {
    accent-color: var(--orange); width: 16px; height: 16px;
}
.day-checkbox:has(input:checked) {
    border-color: var(--orange);
    background: rgba(255, 107, 53, 0.05); color: var(--orange);
}
.frais-reservation {
    background: linear-gradient(135deg, rgba(255, 107, 53, 0.08), rgba(255, 107, 53, 0.03));
    border: 2px solid rgba(255, 107, 53, 0.2);
    border-radius: 12px; padding: 16px; margin-bottom: 16px;
}
.checkbox-frais {
    display: flex; align-items: center; gap: 10px; cursor: default;
}
.checkbox-frais input { accent-color: var(--orange); width: 20px; height: 20px; }
.checkbox-frais span { font-size: 0.95rem; color: var(--orange); }
.frais-desc {
    font-size: 0.82rem; color: var(--gray-600);
    margin: 8px 0 0 30px; line-height: 1.5;
}
.recap-section { background: var(--gray-50); }
.recap-box {
    background: var(--white); border-radius: 12px;
    padding: 16px; border: 1px solid var(--gray-200);
}
.recap-line {
    display: flex; justify-content: space-between; align-items: center;
    padding: 10px 0; border-bottom: 1px solid var(--gray-100);
    font-size: 0.9rem;
}
.recap-line:last-child { border-bottom: none; }
.recap-line span { color: var(--gray-600); }
.recap-line strong { color: var(--blue); font-weight: 700; }
.recap-line.highlight {
    background: rgba(255, 107, 53, 0.05);
    margin: 0 -16px; padding: 12px 16px; border-bottom: none;
}
.recap-line.highlight span,
.recap-line.highlight strong { color: var(--orange); }
.status-badge {
    background: var(--gray-200); color: var(--gray-600);
    padding: 4px 12px; border-radius: 20px;
    font-size: 0.8rem; font-weight: 600;
}
.info-importante {
    display: flex; align-items: flex-start; gap: 10px;
    margin-top: 16px; padding: 12px;
    background: rgba(59, 130, 246, 0.05);
    border-radius: 10px; border: 1px solid rgba(59, 130, 246, 0.15);
}
.info-importante i { color: var(--blue-accent); margin-top: 2px; }
.info-importante p {
    font-size: 0.82rem; color: var(--gray-600); margin: 0; line-height: 1.5;
}
.btn-confirm-inscription {
    width: calc(100% - 60px); margin: 0 30px 30px;
    padding: 16px 24px; border-radius: 12px;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    color: white; font-family: 'Nunito', sans-serif;
    font-size: 1rem; font-weight: 700; border: none;
    cursor: pointer; display: flex; align-items: center;
    justify-content: center; gap: 10px;
    box-shadow: var(--shadow-orange); transition: all 0.3s ease;
}
.btn-confirm-inscription:hover {
    background: linear-gradient(135deg, var(--orange-dark), var(--orange));
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(255, 107, 53, 0.4);
}
.modal-success { text-align: center; padding: 60px 30px; }
.modal-success-icon {
    width: 80px; height: 80px; border-radius: 50%;
    background: linear-gradient(135deg, #22c55e, #16a34a);
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px; font-size: 2.5rem; color: white;
    animation: scaleIn 0.5s ease;
}
.modal-success h3 {
    font-size: 1.5rem; font-weight: 800; color: var(--blue); margin-bottom: 10px;
}
.modal-success p {
    font-size: 1rem; color: var(--gray-600); margin-bottom: 24px;
}
.btn-success-close {
    padding: 12px 32px; border-radius: 10px;
    background: var(--orange); color: white;
    font-weight: 700; border: none; cursor: pointer;
    transition: all 0.2s ease;
}
.btn-success-close:hover { background: var(--orange-dark); }

@media (max-width: 767px) {
    .form-row { grid-template-columns: 1fr; }
    .modal-inscription { max-height: 95vh; border-radius: 16px; }
    .modal-section { padding: 20px; }
    .checkbox-days { gap: 6px; }
    .day-checkbox { padding: 6px 10px; font-size: 0.8rem; }
    .btn-confirm-inscription {
        width: calc(100% - 40px); margin: 0 20px 20px;
    }
}

/* Responsive global */
@media (max-width: 767px) {
    .section-padding { padding: 60px 0; }
    .page-hero-premiere { min-height: 50vh; padding: 60px 0; }
}
</style>
</head>
<body>

@include('partials.header')

<!-- Scroll Progress -->
<div class="scroll-progress" id="scrollProgress"></div>

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
                                <a href="{{ url('/terminale') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Orientation</span></a>
                                <a href="{{ url('/coaching') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-graduation-cap"></i></div><span>Coaching scolaire</span></a>
                                <a href="{{ url('/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
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
<a href="{{ url('/seconde') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Orientation en seconde</span></a>
                                <a href="{{ url('/premiere') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Orientation en premiere</span></a>
                                <a href="{{ url('/groupe') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-calculator"></i></div><span>Préparation DCG / DSCG</span></a>

                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/reussir') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-microphone"></i></div><span>Réussir ses oraux</span></a>
                                <a href="{{ url('/terminale') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Orientation en terminal</span></a>

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
                        <div class="mega-body-moderne">
                            <div>
                                <div class="mega-col-title">Nos cours</div>
<a href="{{ url('/seconde') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Orientation en seconde</span></a>
                                <a href="{{ url('/premiere') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Orientation en premiere</span></a>
                                <a href="{{ url('/groupe') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-calculator"></i></div><span>Préparation DCG / DSCG</span></a>
                                <a href="{{ url('/formations') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-chalkboard-teacher"></i></div><span>Toutes les formations professionnelles</span></a>

                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/reussir') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-microphone"></i></div><span>Réussir ses oraux</span></a>
                                <a href="{{ url('/terminale') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Orientation en terminal</span></a>

                                <a href="{{ url('/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item-moderne"><a href="https://mpcmformation-ci.com/" target="_blank" class="nav-link-moderne">Entreprise</a></li>


                
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
     PAGE HERO - ORIENTATION PREMIÈRE
     ============================================ -->
<section class="page-hero-premiere">
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
    <div class="container">
        <div class="page-hero-content">
            <div class="page-hero-left animate-slide-left">
                <div class="page-hero-label"><i class="fas fa-compass"></i> Orientation Première</div>
                <h1 class="page-hero-title">Construire son <span class="highlight-teal">projet d'études</span> et préparer ses choix <span class="highlight-orange">après le Bac</span></h1>
                <p class="page-hero-subtitle">Après la découverte de ses intérêts en Seconde, approfondissez votre réflexion, mieux connaissez les formations possibles et construisez progressivement votre projet d'avenir avec MONPROFCHEZMOI.</p>
                <div class="page-hero-badges">
                    <div class="page-hero-badge"><i class="fas fa-user-graduate"></i> Première</div>
                    <div class="page-hero-badge"><i class="fas fa-university"></i> Formations post-Bac</div>
                    <div class="page-hero-badge"><i class="fas fa-briefcase"></i> Métiers d'avenir</div>
                    <div class="page-hero-badge"><i class="fas fa-chart-line"></i> Projet personnalisé</div>
                </div>
            </div>
            <div class="hero-image-wrapper animate-slide-right">
                <img loading="lazy" decoding="async" src="https://images.unsplash.com/photo-1529390079861-591de354faf5?w=600&h=700&fit=crop" alt="Élève africain de Première réfléchissant à son orientation" class="hero-image-main">
                <div class="floating-card floating-card-1">
                    <i class="fas fa-graduation-cap"></i>
                    <div>
                        <strong style="font-size: 0.9rem;">Études supérieures</strong>
                        <p style="font-size: 0.75rem; margin: 0; opacity: 0.7;">Universités & Grandes écoles</p>
                    </div>
                </div>
                <div class="floating-card floating-card-2">
                    <i class="fas fa-lightbulb"></i>
                    <div>
                        <strong style="font-size: 0.9rem;">Projets</strong>
                        <p style="font-size: 0.75rem; margin: 0; opacity: 0.7;">Construction personnalisée</p>
                    </div>
                </div>
                <div class="floating-card floating-card-3">
                    <i class="fas fa-star"></i>
                    <div>
                        <strong style="font-size: 0.9rem;">Avenir</strong>
                        <p style="font-size: 0.75rem; margin: 0; opacity: 0.7;">Choix éclairés</p>
                    </div>
                </div>
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
        <a href="{{ url('/terminale') }}">Lycée</a>
        <i class="fas fa-chevron-right"></i>
        <span class="current">Orientation Première</span>
    </div>
</div>

<!-- ============================================
     INTRODUCTION
     ============================================ -->
<section class="intro-section section-padding">
    <div class="container">
        <div class="intro-content animate-scroll">
            <div class="section-label-teal">Présentation</div>
            <h2 class="section-title-big">Une étape clé vers le <span style="color: var(--teal);">Bac et au-delà</span></h2>
            <p class="intro-text">
                La classe de Première est une étape importante dans le parcours de l'élève. Après la découverte de ses intérêts en Seconde, l'élève doit maintenant <strong>approfondir sa réflexion</strong>, mieux connaître les formations possibles et construire progressivement son projet d'avenir.
            </p>
            <p class="intro-text">
                <strong>MONPROFCHEZMOI</strong> accompagne les élèves de Première afin de les aider à faire des choix d'orientation cohérents avec leur profil, leurs compétences, leurs ambitions et leurs objectifs futurs.
            </p>
            <div class="intro-highlight animate-scroll">
                <i class="fas fa-star"></i> Un accompagnement sur mesure pour préparer sereinement l'entrée en Terminale
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     PUBLIC CONCERNÉ
     ============================================ -->
<section class="public-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Public visé</div>
            <h2 class="section-title-big">Qui peut bénéficier de cet <span style="color: var(--orange);">accompagnement</span> ?</h2>
        </div>

        <div class="public-card animate-scale">
            <div class="public-icon"><i class="fas fa-user-graduate"></i></div>
            <h3>Élèves de Première générale, technologique ou professionnelle</h3>
            <p>L'accompagnement est adapté aux élèves qui ont déjà une idée de projet ou qui souhaitent encore clarifier leur orientation. Aucun prérequis n'est nécessaire.</p>
        </div>

        <div class="row mt-5 g-4 stagger-container">
            <div class="col-md-4 stagger-item">
                <div class="intro-check-item" style="height: 100%;">
                    <i class="fas fa-check"></i>
                    <span>Aucun prérequis nécessaire</span>
                </div>
            </div>
            <div class="col-md-4 stagger-item">
                <div class="intro-check-item" style="height: 100%;">
                    <i class="fas fa-check"></i>
                    <span>Pour les profils confirmés ou en recherche</span>
                </div>
            </div>
            <div class="col-md-4 stagger-item">
                <div class="intro-check-item" style="height: 100%;">
                    <i class="fas fa-check"></i>
                    <span>Approfondissement du projet entamé en Seconde</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================================
     TARIFS
     ============================================ -->
<section class="tarifs-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Tarifs</div>
            <h2 class="section-title-big">Nos formules <span style="color: var(--orange);">d'accompagnement</span></h2>
            <p class="section-subtitle">Choisissez la formule qui correspond le mieux à vos besoins pour l'orientation de votre enfant.</p>
        </div>

        <div class="tarifs-grid stagger-container">
            <div class="tarif-card featured stagger-item">
                <div class="tarif-header">
                    <span class="tarif-badge"><i class="fas fa-star"></i> Recommandé</span>
                    <h3>Pack Orientation Première</h3>
                    <div class="tarif-price">80 000 <span>FCFA</span></div>
                    <p style="color: rgba(255,255,255,0.8); font-size: 0.9rem; margin: 0;">5 séances complètes</p>
                </div>
                <div class="tarif-body">
                    <ul>
                        <li><i class="fas fa-check"></i> Bilan personnel et scolaire</li>
                        <li><i class="fas fa-check"></i> Analyse du profil</li>
                        <li><i class="fas fa-check"></i> Exploration des formations</li>
                        <li><i class="fas fa-check"></i> Découverte des métiers</li>
                        <li><i class="fas fa-check"></i> Construction du projet d'études</li>
                        <li><i class="fas fa-check"></i> Synthèse personnalisée</li>
                    </ul>
                    <button class="contact-btn" onclick="openInscriptionModal('Pack Orientation Première - 5 séances', '80000', 'Pack complet de 5 séances (1h30 chacune)')">
                        Je m'inscris
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <div class="tarif-card stagger-item">
                <div class="tarif-header">
                    <h3>Séance Individuelle</h3>
                    <div class="tarif-price">20 000 <span>FCFA</span></div>
                    <p style="color: rgba(255,255,255,0.8); font-size: 0.9rem; margin: 0;">Par séance de 1h30</p>
                </div>
                <div class="tarif-body">
                    <ul>
                        <li><i class="fas fa-check"></i> Accompagnement sur mesure</li>
                        <li><i class="fas fa-check"></i> Bilan personnalisé</li>
                        <li><i class="fas fa-check"></i> Conseils d'orientation</li>
                        <li><i class="fas fa-check"></i> Flexibilité des horaires</li>
                        <li><i class="fas fa-check"></i> Suivi individualisé</li>
                    </ul>
                    <button class="contact-btn" onclick="openInscriptionModal('Séance Individuelle Orientation Première', '20000', '1 séance de 1h30')">
                        Je m'inscris
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
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
            <div class="section-label-teal">Objectifs</div>
            <h2 class="section-title-big">Cet accompagnement permet à l'élève de <span style="color: var(--teal);">progresser</span></h2>
            <p class="section-subtitle">Six objectifs clés pour construire un projet d'orientation solide et cohérent.</p>
        </div>

        <div class="objectifs-grid stagger-container">
            <div class="objectif-card stagger-item">
                <div class="objectif-number">1</div>
                <h4>Approfondir la connaissance de son profil</h4>
                <p>Analyse détaillée du parcours, des résultats et des compétences pour mieux se connaître.</p>
            </div>
            <div class="objectif-card stagger-item">
                <div class="objectif-number">2</div>
                <h4>Identifier ses points forts et axes d'amélioration</h4>
                <p>Mettre en lumière ses atouts et les domaines à renforcer pour viser l'excellence.</p>
            </div>
            <div class="objectif-card stagger-item">
                <div class="objectif-number">3</div>
                <h4>Confirmer ou ajuster ses pistes d'orientation</h4>
                <p>Valider les choix envisagés ou explorer de nouvelles voies plus adaptées.</p>
            </div>
            <div class="objectif-card stagger-item">
                <div class="objectif-number">4</div>
                <h4>Découvrir les formations accessibles après le Bac</h4>
                <p>Universités, BTS, BUT, grandes écoles, formations professionnelles et internationales.</p>
            </div>
            <div class="objectif-card stagger-item">
                <div class="objectif-number">5</div>
                <h4>Comprendre les exigences des différentes filières</h4>
                <p>Connaître les prérequis, les attendus et les débouchés de chaque parcours.</p>
            </div>
            <div class="objectif-card stagger-item">
                <div class="objectif-number">6</div>
                <h4>Préparer efficacement son entrée en Terminale</h4>
                <p>Aborder la dernière année du lycée avec un projet clair et des objectifs définis.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     PROGRAMME - TIMELINE
     ============================================ -->
<section class="programme-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Programme</div>
            <h2 class="section-title-big">Le déroulement de <span style="color: var(--orange);">l'accompagnement</span></h2>
            <p class="section-subtitle">Un parcours en 4 étapes pour guider l'élève vers ses choix post-Bac.</p>
        </div>

        <div class="programme-timeline">
            <div class="timeline-item animate-slide-left">
                <div class="timeline-dot">1</div>
                <div class="timeline-content">
                    <div class="timeline-card">
                        <h4><i class="fas fa-clipboard-list"></i> Bilan du profil scolaire et personnel</h4>
                        <ul>
                            <li><i class="fas fa-check"></i> Parcours scolaire</li>
                            <li><i class="fas fa-check"></i> Résultats académiques</li>
                            <li><i class="fas fa-check"></i> Matières fortes et à renforcer</li>
                            <li><i class="fas fa-check"></i> Centres d'intérêt</li>
                            <li><i class="fas fa-check"></i> Compétences et aptitudes</li>
                            <li><i class="fas fa-check"></i> Motivations personnelles</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="timeline-item animate-slide-right">
                <div class="timeline-dot">2</div>
                <div class="timeline-content">
                    <div class="timeline-card">
                        <h4><i class="fas fa-university"></i> Exploration des formations après le Bac</h4>
                        <ul>
                            <li><i class="fas fa-check"></i> Universités</li>
                            <li><i class="fas fa-check"></i> BTS</li>
                            <li><i class="fas fa-check"></i> BUT</li>
                            <li><i class="fas fa-check"></i> Grandes écoles</li>
                            <li><i class="fas fa-check"></i> Écoles spécialisées</li>
                            <li><i class="fas fa-check"></i> Formations professionnelles</li>
                            <li><i class="fas fa-check"></i> Formations internationales</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="timeline-item animate-slide-left">
                <div class="timeline-dot">3</div>
                <div class="timeline-content">
                    <div class="timeline-card">
                        <h4><i class="fas fa-briefcase"></i> Découverte des métiers et secteurs d'avenir</h4>
                        <ul>
                            <li><i class="fas fa-check"></i> Domaines professionnels correspondant au profil</li>
                            <li><i class="fas fa-check"></i> Métiers associés aux formations</li>
                            <li><i class="fas fa-check"></i> Compétences recherchées</li>
                            <li><i class="fas fa-check"></i> Opportunités d'évolution</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="timeline-item animate-slide-right">
                <div class="timeline-dot">4</div>
                <div class="timeline-content">
                    <div class="timeline-card">
                        <h4><i class="fas fa-tasks"></i> Construction du projet d'études</h4>
                        <ul>
                            <li><i class="fas fa-check"></i> Choix des domaines d'études</li>
                            <li><i class="fas fa-check"></i> Identification des formations adaptées</li>
                            <li><i class="fas fa-check"></i> Objectifs scolaires à atteindre</li>
                            <li><i class="fas fa-check"></i> Conseils pour préparer la Terminale</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     COMPÉTENCES & OUTILS
     ============================================ -->
<section class="competences-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-teal">Résultats</div>
            <h2 class="section-title-big">Ce que l'élève va <span style="color: var(--teal);">apprendre</span></h2>
            <p class="section-subtitle">À la fin de l'accompagnement, l'élève sera capable de :</p>
        </div>

        <div class="competences-grid stagger-container">
            <div class="competence-block stagger-item">
                <div class="competence-block-header">
                    <div class="competence-block-icon"><i class="fas fa-brain"></i></div>
                    <h4>Compétences développées</h4>
                </div>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Mieux comprendre son profil</li>
                    <li><i class="fas fa-check-circle"></i> Identifier les formations adaptées à ses objectifs</li>
                    <li><i class="fas fa-check-circle"></i> Comparer différentes possibilités d'études</li>
                    <li><i class="fas fa-check-circle"></i> Faire des choix plus réfléchis</li>
                    <li><i class="fas fa-check-circle"></i> Construire une stratégie pour son avenir</li>
                    <li><i class="fas fa-check-circle"></i> Aborder la Terminale avec un projet plus clair</li>
                </ul>
            </div>

            <div class="competence-block stagger-item">
                <div class="competence-block-header">
                    <div class="competence-block-icon"><i class="fas fa-tools"></i></div>
                    <h4>Outils utilisés</h4>
                </div>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Questionnaire d'intérêts</li>
                    <li><i class="fas fa-check-circle"></i> Analyse du parcours scolaire</li>
                    <li><i class="fas fa-check-circle"></i> Échanges personnalisés</li>
                    <li><i class="fas fa-check-circle"></i> Recherche sur les formations et métiers</li>
                    <li><i class="fas fa-check-circle"></i> Fiche personnalisée de projet d'orientation</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     ORGANISATION
     ============================================ -->
<section class="orga-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Organisation</div>
            <h2 class="section-title-big">Comment se déroulent les <span style="color: var(--orange);">séances</span> ?</h2>
        </div>

        <div class="orga-grid stagger-container">
            <div class="orga-card stagger-item">
                <div class="orga-icon"><i class="fas fa-clock"></i></div>
                <h4>Durée d'une séance</h4>
                <p>1h30 par séance d'accompagnement, temps optimal pour avancer sereinement sur le projet d'orientation et d'études.</p>
            </div>
            <div class="orga-card stagger-item">
                <div class="orga-icon"><i class="fas fa-home"></i></div>
                <h4>À domicile</h4>
                <p>L'accompagnement peut se faire directement chez vous, dans un environnement familier et propice à la réflexion.</p>
            </div>
            <div class="orga-card stagger-item">
                <div class="orga-icon"><i class="fas fa-laptop"></i></div>
                <h4>En ligne</h4>
                <p>Séances à distance via visioconférence, avec les mêmes outils et la même qualité d'accompagnement personnalisé.</p>
            </div>
            <div class="orga-card stagger-item">
                <div class="orga-icon"><i class="fas fa-building"></i></div>
                <h4>Au centre</h4>
                <p>Rendez-vous au centre MONPROFCHEZMOI à Riviera 4 Synacassi 1, Abidjan.</p>
            </div>
        </div>
    </div>
</section>



<!-- ============================================
     POURQUOI NOUS
     ============================================ -->
<section class="pourquoi-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-teal">Pourquoi nous ?</div>
            <h2 class="section-title-big">Les atouts de <span style="color: var(--teal);">MONPROFCHEZMOI</span></h2>
            <p class="section-subtitle">Nous mettons tout en œuvre pour garantir un accompagnement d'orientation de qualité supérieure.</p>
        </div>

        <div class="pourquoi-grid stagger-container">
            <div class="pourquoi-card stagger-item">
                <div class="pourquoi-icon"><i class="fas fa-user-check"></i></div>
                <div class="pourquoi-content">
                    <h4>Accompagnement personnalisé</h4>
                    <p>Chaque élève bénéficie d'un suivi adapté à son profil, ses ambitions et son rythme de progression.</p>
                </div>
            </div>
            <div class="pourquoi-card stagger-item">
                <div class="pourquoi-icon"><i class="fas fa-bullseye"></i></div>
                <div class="pourquoi-content">
                    <h4>Orientation adaptée au profil</h4>
                    <p>Nous prenons en compte les forces, les intérêts et les objectifs de chaque élève pour proposer les meilleures voies.</p>
                </div>
            </div>
            <div class="pourquoi-card stagger-item">
                <div class="pourquoi-icon"><i class="fas fa-eye"></i></div>
                <div class="pourquoi-content">
                    <h4>Meilleure compréhension des possibilités</h4>
                    <p>Découverte exhaustive des formations post-Bac, des métiers émergents et des opportunités à l'international.</p>
                </div>
            </div>
            <div class="pourquoi-card stagger-item">
                <div class="pourquoi-icon"><i class="fas fa-road"></i></div>
                <div class="pourquoi-content">
                    <h4>Préparation progressive des choix</h4>
                    <p>Un accompagnement structuré qui permet d'aborder la Terminale avec un projet clair et des objectifs définis.</p>
                </div>
            </div>
            <div class="pourquoi-card stagger-item">
                <div class="pourquoi-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                <div class="pourquoi-content">
                    <h4>Équipe pédagogique expérimentée</h4>
                    <p>Des professionnels de l'orientation et de l'accompagnement scolaire à votre service.</p>
                </div>
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
            <h2 class="section-title-big">Construire son avenir commence par de <span style="color: var(--orange);">bons choix aujourd'hui</span></h2>
            <p class="section-subtitle">Faites confiance à MONPROFCHEZMOI pour accompagner votre enfant dans la construction de son projet d'études et sa préparation à l'entrée en Terminale.</p>
            <div class="cta-buttons">
                <button class="btn-cta-orange" onclick="openInscriptionModal('Orientation Première - Première prise de contact', '0', 'Demande d\'information')">
                    <i class="fas fa-calendar-check"></i> Réserver un entretien
                </button>
                <a href="tel:+2250153751544" class="btn-cta-outline"><i class="fas fa-phone-alt"></i> Être rappelé gratuitement</a>
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
                        <label>Nom complet de l'élève *</label>
                        <input type="text" name="nom_enfant" required placeholder="Ex: KOUAME Marie">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Âge de l'élève *</label>
                        <input type="number" name="age_enfant" required min="15" max="18" placeholder="Ex: 16">
                    </div>
                    <div class="form-group">
                        <label>Classe *</label>
                        <select name="classe" required>
                            <option value="">Choisir...</option>
                            <option value="1ere">Première</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Téléphone *</label>
                        <input type="tel" name="telephone" required placeholder="Ex: 01 53 75 15 44">
                    </div>
                    <div class="form-group">
                        <label>Email (optionnel)</label>
                        <input type="email" name="email" placeholder="Ex: contact@email.com">
                    </div>
                </div>
            </div>

            <!-- Formule choisie -->
            <div class="modal-section">
                <h4><i class="fas fa-bullseye"></i> Formule choisie</h4>
                <div class="form-group">
                    <label>Nom de la formule *</label>
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
                    </div>
                </div>
                <div class="form-group">
                    <label>Horaire préféré</label>
                    <input type="text" name="horaire" placeholder="Ex: 15h00 - 16h30">
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
                        <label class="radio-label"><input type="radio" name="type_paiement" value="forfait"> <span>Forfait complet</span></label>
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
let currentDetail = '';

function openInscriptionModal(formule, prix, detail) {
    currentFormule = formule;
    currentPrix = prix + ' FCFA';
    currentDetail = detail || '';

    const modalActivite = document.getElementById('modalActivite');
    const recapFormule = document.getElementById('recapFormule');
    const recapPrix = document.getElementById('recapPrix');
    const modal = document.getElementById('modalInscription');

    if (modalActivite) modalActivite.value = formule;
    if (recapFormule) recapFormule.textContent = formule;
    if (recapPrix) recapPrix.textContent = currentPrix + (currentDetail ? ' (' + currentDetail + ')' : '');
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

function getCsrfToken() {
    const metaToken = document.querySelector('meta[name="csrf-token"]');
    if (metaToken) return metaToken.content;
    const inputToken = document.querySelector('input[name="_token"]');
    if (inputToken) return inputToken.value;
    return '';
}

function submitInscription(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const csrfToken = getCsrfToken();

    if (!csrfToken) {
        alert('Erreur : Token de sécurité manquant. Veuillez rafraîchir la page.');
        return;
    }

    if (!formData.has('_token')) {
        formData.append('_token', csrfToken);
    }

    // Récupérer les jours sélectionnés
    const jours = [];
    document.querySelectorAll('input[name="jours[]"]:checked').forEach(cb => {
        jours.push(cb.value);
    });
    formData.delete('jours[]');
    formData.append('jours', JSON.stringify(jours));

    // Ajouter les données supplémentaires
    formData.append('formule', currentFormule);
    formData.append('prix_formule', currentPrix);
    formData.append('frais_reservation', '10000');

    const btn = document.getElementById('btnConfirmInscription');
    const originalText = btn ? btn.innerHTML : '';

    if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement en cours...';
    }

    fetch('/inscription', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'X-Requested-With': 'XMLHttpRequest'
        },
        credentials: 'same-origin',
        body: formData
    })
    .then(async response => {
        if (!response.ok) {
            let errorBody = '';
            const contentType = response.headers.get('content-type');
            try {
                if (contentType && contentType.includes('application/json')) {
                    const jsonError = await response.json();
                    errorBody = jsonError.message || JSON.stringify(jsonError);
                } else {
                    errorBody = await response.text();
                }
            } catch (e) {
                errorBody = 'Impossible de lire la réponse';
            }

            if (response.status === 419) {
                throw new Error('Session expirée (419). Veuillez rafraîchir la page et réessayer.');
            }
            if (response.status === 401) {
                throw new Error('Non authentifié (401). Veuillez vous reconnecter.');
            }
            if (response.status === 404) {
                throw new Error('Route non trouvée (404). Vérifiez que la route /inscription existe.');
            }
            if (response.status === 422) {
                let msg = 'Erreur de validation :\n';
                try {
                    const data = JSON.parse(errorBody);
                    if (data.errors) {
                        Object.values(data.errors).forEach(errs => {
                            errs.forEach(e => msg += '- ' + e + '\n');
                        });
                    }
                } catch {
                    msg += errorBody;
                }
                throw new Error(msg);
            }
            throw new Error('Erreur HTTP ' + response.status + ' : ' + response.statusText);
        }

        const contentType = response.headers.get('content-type');
        if (!contentType || !contentType.includes('application/json')) {
            const text = await response.text();
            throw new Error('Le serveur a répondu avec un format inattendu.');
        }

        return response.json();
    })
    .then(result => {
        if (result.success && result.token) {
            // Redirection vers le paiement
            const paymentForm = document.createElement('form');
            paymentForm.method = 'POST';
            paymentForm.action = '/payment/initiate';

            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = csrfToken;

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

        } else if (result.success) {
            showSuccessMessage();
        } else {
            throw new Error(result.message || 'Une erreur est survenue.');
        }
    })
    .catch(error => {
        alert(error.message || 'Erreur de connexion. Veuillez réessayer.');
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = originalText;
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
                <p>Merci ${parentName}. Notre équipe vous contactera très prochainement au <strong>${phone}</strong>.</p>
                <button class="btn-success-close" onclick="closeInscriptionModal()">Fermer</button>
            </div>
        `;
    }
}

// Fermer le modal en cliquant sur l'overlay
document.addEventListener('DOMContentLoaded', function() {
    const modalOverlay = document.getElementById('modalInscription');
    if (modalOverlay) {
        modalOverlay.addEventListener('click', function(e) {
            if (e.target === this) {
                closeInscriptionModal();
            }
        });
    }
});

// Fermer avec Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeInscriptionModal();
    }
});

// ========== SCROLL PROGRESS & NAVBAR ==========
window.addEventListener('scroll', function() {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const progress = document.getElementById('scrollProgress');
    if (progress && scrollHeight > 0) {
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



// ============================================
// MOBILE MEGA MENU — VERSION CORRIGÉE COMPLÈTE
// ============================================
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

document.querySelectorAll('.animate-scroll, .animate-slide-left, .animate-slide-right, .animate-scale').forEach(el => observer.observe(el));

// Stagger animations pour les cards
const staggerObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
            setTimeout(() => {
                entry.target.classList.add('visible');
            }, index * 150);
            staggerObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('.stagger-item').forEach(el => staggerObserver.observe(el));

// ========== COUNTER ANIMATION ==========
const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const counters = entry.target.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;
                const updateCounter = () => {
                    current += increment;
                    if (current < target) {
                        counter.textContent = Math.floor(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target + (target === 100 ? '%' : '+');
                    }
                };
                updateCounter();
            });
            counterObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.stats-bar').forEach(el => counterObserver.observe(el));

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
