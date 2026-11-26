<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Codage & Robotique Collège - Monprofchezmoici.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Codage, Robotique, Python, IA, Collège, Abidjan, Côte d'Ivoire" name="keywords">
    <meta content="Activités numériques pour collégiens : robotique, programmation Python, IA, animation numérique et JavaScript à Abidjan." name="description">

    <link href="/asset/img/favicon.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/asset/css/courscss/bootstrap.min.css" rel="stylesheet">
    <link href="/asset/css/courscss/style.css" rel="stylesheet">
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

/* CTA Navbar */
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

/* User Connected */
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

/* Mobile */
@media (max-width: 991px) {
    .nav-menu-moderne { flex-direction: column; padding: 16px; }
    .nav-menu-moderne .nav-link-moderne { padding: 14px 16px; width: 100%; }
    .mega-menu-moderne {
        position: static; transform: none; min-width: auto;
        box-shadow: none; border: none; opacity: 1;
        visibility: visible; display: none; margin-top: 8px;
    }
    .nav-item-moderne.active .mega-menu-moderne { display: block; }
    .mega-body-moderne { grid-template-columns: 1fr; }
}

/* ============================================
   PAGE HERO - CODAGE
   ============================================ */
.page-hero-codage {
    min-height: 65vh;
    background: linear-gradient(135deg, var(--blue) 0%, #1a1a3e 40%, var(--blue-light) 100%);
    position: relative; overflow: hidden;
    display: flex; align-items: center; padding: 80px 0;
}
.page-hero-codage::before {
    content: ''; position: absolute;
    top: -20%; right: -10%; width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(124,58,237,0.15), transparent 70%);
    border-radius: 50%;
    animation: float-hero 8s ease-in-out infinite;
}
.page-hero-codage::after {
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
.particle:nth-child(2) { left: 30%; top: 60%; animation-delay: 2s; width: 6px; height: 6px; background: rgba(124,58,237,0.3); }
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
    background: rgba(124,58,237,0.15);
    border: 1px solid rgba(124,58,237,0.3);
    color: var(--purple-light);
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
.page-hero-title .highlight-purple { color: var(--purple-light); position: relative; }
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
    background: rgba(255,107,53,0.2);
    border-color: var(--orange);
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
.floating-card-1 i { background: var(--orange); }
.floating-card-2 {
    bottom: 15%; right: -10px;
    animation-delay: 1.5s;
}
.floating-card-2 i { background: var(--purple); }
.floating-card-3 {
    top: 50%; right: -30px;
    animation-delay: 3s;
}
.floating-card-3 i { background: var(--green); }
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
.section-label-purple {
    display: inline-flex; align-items: center; gap: 8px;
    font-size: 0.8rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: 2px; color: var(--purple); margin-bottom: 16px;
}
.section-label-purple::before {
    content: ''; width: 30px; height: 3px;
    background: var(--purple); border-radius: 2px;
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
    background: linear-gradient(135deg, rgba(124,58,237,0.1), rgba(124,58,237,0.05));
    border: 1px solid rgba(124,58,237,0.2);
    color: var(--purple); padding: 12px 24px;
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
   NAV TABS - PROGRAMMES
   ============================================ */
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

/* ============================================
   PROGRAMME HERO
   ============================================ */
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

/* ============================================
   STATS BAR
   ============================================ */
.stats-bar {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
    padding: 60px 0; position: relative; overflow: hidden;
}
.stats-bar::before {
    content: ''; position: absolute; top: -50px; right: -50px;
    width: 200px; height: 200px;
    background: radial-gradient(circle, rgba(255,107,53,0.15), transparent 70%);
    border-radius: 50%;
}
.stats-grid {
    display: grid; grid-template-columns: repeat(4, 1fr);
    gap: 30px; text-align: center;
}
.stat-item { color: white; }
.stat-number {
    font-size: 2.5rem; font-weight: 800; color: var(--orange);
    display: block; margin-bottom: 8px;
}
.stat-label { font-size: 0.9rem; color: rgba(255,255,255,0.7); }
@media (max-width: 767px) {
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
}

/* ============================================
   POURQUOI NOUS
   ============================================ */
.pourquoi-section { background: var(--white); }
.pourquoi-grid {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;
}
.pourquoi-card {
    background: var(--white); border-radius: 20px;
    padding: 35px 28px; border: 1px solid var(--gray-100);
    text-align: center; transition: all 0.4s ease;
}
.pourquoi-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.pourquoi-icon {
    width: 70px; height: 70px; border-radius: 18px;
    background: linear-gradient(135deg, rgba(124,58,237,0.1), rgba(124,58,237,0.05));
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px; font-size: 1.8rem; color: var(--purple);
    transition: all 0.4s ease;
}
.pourquoi-card:hover .pourquoi-icon {
    background: linear-gradient(135deg, var(--purple), var(--purple-light));
    color: white; transform: scale(1.1) rotate(-5deg);
    box-shadow: 0 8px 32px rgba(124,58,237,0.3);
}
.pourquoi-card h4 {
    font-size: 1.15rem; font-weight: 700; color: var(--blue);
    margin-bottom: 10px;
}
.pourquoi-card p {
    font-size: 0.92rem; color: var(--gray-600);
    line-height: 1.7; margin: 0;
}

@media (max-width: 991px) {
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
@keyframes slideInUp {
    from { opacity: 0; transform: translateY(60px) rotateX(10deg); }
    to { opacity: 1; transform: translateY(0) rotateX(0); }
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

/* Responsive global */
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
    .section-padding { padding: 60px 0; }
    .page-hero-codage { min-height: 50vh; padding: 60px 0; }
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
</style>

<body>
@include('partials.header')


<!-- ============================================
     PAGE HERO - CODAGE
     ============================================ -->
<section class="page-hero-codage">
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
                <div class="page-hero-label"><i class="fas fa-robot"></i> Activités numériques</div>
                <h1 class="page-hero-title">Codage & <span class="highlight-orange">Robotique</span> <span class="highlight-purple">Collège</span></h1>
                <p class="page-hero-subtitle">Développer les compétences numériques, la créativité et l'innovation. Des programmes adaptés du collège pour préparer les élèves aux métiers de demain.</p>
                <div class="page-hero-badges">
                    <div class="page-hero-badge"><i class="fas fa-robot"></i> Robotique</div>
                    <div class="page-hero-badge"><i class="fab fa-python"></i> Python</div>
                    <div class="page-hero-badge"><i class="fas fa-brain"></i> Intelligence Artificielle</div>
                    <div class="page-hero-badge"><i class="fab fa-js"></i> JavaScript</div>
                </div>
            </div>
            <div class="hero-image-wrapper animate-slide-right">
                <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?w=600&h=700&fit=crop" alt="Enfant africain apprenant la programmation" class="hero-image-main">
                <div class="floating-card floating-card-1">
                    <i class="fas fa-code"></i>
                    <div>
                        <strong style="font-size: 0.9rem;">Programmation</strong>
                        <p style="font-size: 0.75rem; margin: 0; opacity: 0.7;">Python & JavaScript</p>
                    </div>
                </div>
                <div class="floating-card floating-card-2">
                    <i class="fas fa-robot"></i>
                    <div>
                        <strong style="font-size: 0.9rem;">Robotique</strong>
                        <p style="font-size: 0.75rem; margin: 0; opacity: 0.7;">Projets pratiques</p>
                    </div>
                </div>
                <div class="floating-card floating-card-3">
                    <i class="fas fa-brain"></i>
                    <div>
                        <strong style="font-size: 0.9rem;">IA</strong>
                        <p style="font-size: 0.75rem; margin: 0; opacity: 0.7;">Intelligence Artificielle</p>
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
        <a href="{{ url('/particuliers') }}">Accueil</a>
        <i class="fas fa-chevron-right"></i>
        <a href="{{ url('/particuliers/codage') }}">Collège</a>
        <i class="fas fa-chevron-right"></i>
        <span class="current">Codage & Robotique</span>
    </div>
</div>

<!-- ============================================
     INTRODUCTION
     ============================================ -->
<section class="intro-section section-padding">
    <div class="container">
        <div class="intro-content animate-scroll">
            <div class="section-label-purple">Présentation</div>
            <h2 class="section-title-big">Développer les compétences numériques, la <span style="color: var(--purple);">créativité</span> et l'innovation</h2>
            <p class="intro-text">
                Au collège, les élèves entrent dans une phase d'apprentissage plus approfondie. <strong>MONPROFCHEZMOI</strong> propose des activités numériques permettant aux collégiens de développer leur <strong>logique, leur autonomie et leurs compétences technologiques</strong> à travers des projets concrets.
            </p>
            <div class="intro-checklist">
                <div class="intro-check-item animate-scroll animate-delay-1">
                    <i class="fas fa-check"></i>
                    <span>Comprendre les technologies actuelles</span>
                </div>
                <div class="intro-check-item animate-scroll animate-delay-2">
                    <i class="fas fa-check"></i>
                    <span>Développer leur esprit logique</span>
                </div>
                <div class="intro-check-item animate-scroll animate-delay-3">
                    <i class="fas fa-check"></i>
                    <span>Apprendre à programmer</span>
                </div>
                <div class="intro-check-item animate-scroll animate-delay-1">
                    <i class="fas fa-check"></i>
                    <span>Créer des projets numériques</span>
                </div>
                <div class="intro-check-item animate-scroll animate-delay-2">
                    <i class="fas fa-check"></i>
                    <span>Développer leur autonomie</span>
                </div>
                <div class="intro-check-item animate-scroll animate-delay-3">
                    <i class="fas fa-check"></i>
                    <span>Se préparer aux compétences du futur</span>
                </div>
            </div>
            <div class="intro-highlight animate-scroll">
                <i class="fas fa-star"></i> Des programmes numériques conçus pour les collégiens de la 6ème à la 3ème
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     STATS BAR
     ============================================ -->
<section class="stats-bar">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item animate-scale animate-delay-1">
                <span class="stat-number counter" data-target="5">0</span>
                <span class="stat-label">Activités numériques</span>
            </div>
            <div class="stat-item animate-scale animate-delay-2">
                <span class="stat-number counter" data-target="6">0</span>
                <span class="stat-label">Classes couvertes (6e à 3e)</span>
            </div>
            <div class="stat-item animate-scale animate-delay-3">
                <span class="stat-number counter" data-target="90">0</span>
                <span class="stat-label">Minutes par séance</span>
            </div>
            <div class="stat-item animate-scale animate-delay-4">
                <span class="stat-number counter" data-target="100">0</span>
                <span class="stat-label">% Projets pratiques</span>
            </div>
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
     SECTION: ROBOTIQUE (6e à 3e)
     ============================================ -->
<section id="robotique" class="content-section">
    <div class="section-padding" style="background: var(--cream);">
        <div class="container">

            <div class="programme-hero animate-scroll">
                <div class="programme-image-wrap">
                    <img loading="lazy" decoding="async" src="/asset/img/robo.jpg" alt="Champions de la Robotique Collège">
                    <div class="programme-image-badge"><i class="fas fa-robot"></i> 6e à 3e</div>
                </div>
                <div class="programme-text">
                    <div class="section-label-orange">Activité 1</div>
                    <h2>Champions de la <span>Robotique</span></h2>
                    <p>Concevoir, programmer et relever des défis technologiques. Cette activité permet aux collégiens de découvrir l'univers de la robotique à travers des projets concrets et des défis adaptés à leur niveau.</p>
                    <p><strong>Objectif :</strong> Faire découvrir aux collégiens les bases de la robotique tout en développant leur logique, leur créativité et leur capacité à résoudre des problèmes complexes.</p>
                </div>
            </div>

            <div class="cards-grid-2 animate-scroll">
                <div class="info-card-moderne">
                    <h3><i class="fas fa-bullseye"></i> Ce que l'élève apprendra</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Programmer un robot</li>
                        <li><i class="fas fa-check"></i> Comprendre un système automatisé</li>
                        <li><i class="fas fa-check"></i> Développer son raisonnement logique</li>
                        <li><i class="fas fa-check"></i> Concevoir un projet technique</li>
                        <li><i class="fas fa-check"></i> Travailler en équipe</li>
                    </ul>
                </div>
                <div class="info-card-moderne">
                    <h3><i class="fas fa-dumbbell"></i> Résumé des cours</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Les composants électroniques</li>
                        <li><i class="fas fa-check"></i> Les capteurs et moteurs</li>
                        <li><i class="fas fa-check"></i> La logique de programmation</li>
                        <li><i class="fas fa-check"></i> La conception de robots</li>
                        <li><i class="fas fa-check"></i> Les défis robotiques</li>
                        <li><i class="fas fa-check"></i> Projets collectifs</li>
                    </ul>
                </div>
            </div>

            <div class="info-section-grid animate-scroll">
                <div class="info-block">
                    <h4><i class="fas fa-users"></i> Pour qui ?</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Collège : 6e à 3e</li>
                        <li><i class="fas fa-check"></i> Débutant accepté</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-clock"></i> Organisation</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Durée : 1h30 par séance</li>
                        <li><i class="fas fa-check"></i> Fréquence : 1 séance par semaine</li>
                        <li><i class="fas fa-check"></i> Lieu : En petits groupes au centre</li>
                        <li><i class="fas fa-check"></i> Niveau : Tous niveaux</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-star"></i> Compétences développées</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Robotique</li>
                        <li><i class="fas fa-check"></i> Programmation</li>
                        <li><i class="fas fa-check"></i> Logique</li>
                        <li><i class="fas fa-check"></i> Travail d'équipe</li>
                        <li><i class="fas fa-check"></i> Innovation</li>
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
                        <div class="prix">20 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Champions de la Robotique - Collège', '20000', '1 séance (1h30)'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card featured">
                        <div class="tarif-icon"><i class="fas fa-calendar-week"></i></div>
                        <h4>Forfait 4 séances</h4>
                        <div class="prix">75 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Champions de la Robotique - Collège', '75000', 'Forfait 4 séances'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card">
                        <div class="tarif-icon"><i class="fas fa-rocket"></i></div>
                        <h4>Forfait 8 séances</h4>
                        <div class="prix">140 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Champions de la Robotique - Collège', '140000', 'Forfait 8 séances'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================
     SECTION: ANIMATION NUMÉRIQUE (6e à 3e)
     ============================================ -->
<section id="animation" class="content-section active">
    <div class="section-padding" style="background: var(--cream);">
        <div class="container">

            <div class="programme-hero animate-scroll">
                <div class="programme-image-wrap">
                    <img loading="lazy" decoding="async" src="/asset/img/orp.jpeg" alt="Champion de l'Animation Numérique Collège">
                    <div class="programme-image-badge"><i class="fas fa-palette"></i> 6e à 3e</div>
                </div>
                <div class="programme-text">
                    <div class="section-label-orange">Activité 2</div>
                    <h2>Champion de l'<span>Animation Numérique</span></h2>
                    <p>Créer et maîtriser les outils numériques. Cette activité permet aux collégiens de découvrir la création numérique grâce à des outils adaptés à leur niveau. Ils apprennent à utiliser la technologie comme un outil de création et d'expression.</p>
                    <p><strong>Objectif :</strong> Initier les collégiens aux outils numériques tout en développant leur créativité et leur autonomie.</p>
                </div>
            </div>

            <div class="cards-grid-2 animate-scroll">
                <div class="info-card-moderne">
                    <h3><i class="fas fa-bullseye"></i> Ce que l'élève apprendra</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Créer des contenus numériques</li>
                        <li><i class="fas fa-check"></i> Développer son sens artistique</li>
                        <li><i class="fas fa-check"></i> Présenter un projet</li>
                        <li><i class="fas fa-check"></i> Utiliser les outils numériques</li>
                    </ul>
                </div>
                <div class="info-card-moderne">
                    <h3><i class="fas fa-dumbbell"></i> Résumé des cours</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Création graphique</li>
                        <li><i class="fas fa-check"></i> Montage numérique</li>
                        <li><i class="fas fa-check"></i> Présentation numérique</li>
                        <li><i class="fas fa-check"></i> Contenus multimédias</li>
                        <li><i class="fas fa-check"></i> Organisation projet digital</li>
                    </ul>
                </div>
            </div>

            <div class="info-section-grid animate-scroll">
                <div class="info-block">
                    <h4><i class="fas fa-users"></i> Pour qui ?</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Collège : 6e à 3e</li>
                        <li><i class="fas fa-check"></i> Débutant accepté</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-clock"></i> Organisation</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Durée : 1h30 par séance</li>
                        <li><i class="fas fa-check"></i> Fréquence : 1 séance par semaine</li>
                        <li><i class="fas fa-check"></i> Lieu : En petits groupes au centre</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-star"></i> Compétences développées</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Créativité</li>
                        <li><i class="fas fa-check"></i> Design</li>
                        <li><i class="fas fa-check"></i> Montage</li>
                        <li><i class="fas fa-check"></i> Présentation</li>
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
                        <div class="prix">18 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Champion de l\'Animation Numérique - Collège', '18000', '1 séance (1h30)'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card featured">
                        <div class="tarif-icon"><i class="fas fa-calendar-week"></i></div>
                        <h4>Forfait 4 séances</h4>
                        <div class="prix">65 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Champion de l\'Animation Numérique - Collège', '65000', 'Forfait 4 séances'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card">
                        <div class="tarif-icon"><i class="fas fa-rocket"></i></div>
                        <h4>Forfait 8 séances</h4>
                        <div class="prix">120 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Champion de l\'Animation Numérique - Collège', '120000', 'Forfait 8 séances'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================
     SECTION: PYTHON (6e à 3e)
     ============================================ -->
<section id="python" class="content-section">
    <div class="section-padding" style="background: var(--cream);">
        <div class="container">

            <div class="programme-hero animate-scroll">
                <div class="programme-image-wrap">
                    <img loading="lazy" decoding="async" src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=600&h=400&fit=crop" alt="Génies du Python Collège">
                    <div class="programme-image-badge"><i class="fab fa-python"></i> 6e à 3e</div>
                </div>
                <div class="programme-text">
                    <div class="section-label-orange">Activité 3</div>
                    <h2>Génies du <span>Python</span></h2>
                    <p>Apprendre à programmer et créer ses premières applications. Cette activité initie les collégiens au code informatique avec une approche progressive et adaptée au niveau collège.</p>
                    <p><strong>Objectif :</strong> Faire découvrir aux collégiens les bases de la programmation Python tout en développant leur logique et leur créativité.</p>
                </div>
            </div>

            <div class="cards-grid-2 animate-scroll">
                <div class="info-card-moderne">
                    <h3><i class="fas fa-bullseye"></i> Ce que l'élève apprendra</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Écrire du code</li>
                        <li><i class="fas fa-check"></i> Comprendre la logique informatique</li>
                        <li><i class="fas fa-check"></i> Corriger ses erreurs</li>
                        <li><i class="fas fa-check"></i> Résoudre des problèmes</li>
                    </ul>
                </div>
                <div class="info-card-moderne">
                    <h3><i class="fas fa-dumbbell"></i> Résumé des cours</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Algorithmes</li>
                        <li><i class="fas fa-check"></i> Variables</li>
                        <li><i class="fas fa-check"></i> Conditions</li>
                        <li><i class="fas fa-check"></i> Boucles</li>
                        <li><i class="fas fa-check"></i> Fonctions</li>
                        <li><i class="fas fa-check"></i> Jeux simples</li>
                    </ul>
                </div>
            </div>

            <div class="info-section-grid animate-scroll">
                <div class="info-block">
                    <h4><i class="fas fa-users"></i> Pour qui ?</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Collège : 6e à 3e</li>
                        <li><i class="fas fa-check"></i> Débutant accepté</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-clock"></i> Organisation</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Durée : 1h30 par séance</li>
                        <li><i class="fas fa-check"></i> Fréquence : 1 séance par semaine</li>
                        <li><i class="fas fa-check"></i> Lieu : En petits groupes au centre</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-star"></i> Compétences développées</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Python</li>
                        <li><i class="fas fa-check"></i> Code</li>
                        <li><i class="fas fa-check"></i> Logique</li>
                        <li><i class="fas fa-check"></i> Debugging</li>
                        <li><i class="fas fa-check"></i> Gaming</li>
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
                        <div class="prix">20 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Génies du Python - Collège', '20000', '1 séance (1h30)'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card featured">
                        <div class="tarif-icon"><i class="fas fa-calendar-week"></i></div>
                        <h4>Forfait 4 séances</h4>
                        <div class="prix">75 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Génies du Python - Collège', '75000', 'Forfait 4 séances'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card">
                        <div class="tarif-icon"><i class="fas fa-rocket"></i></div>
                        <h4>Forfait 8 séances</h4>
                        <div class="prix">140 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Génies du Python - Collège', '140000', 'Forfait 8 séances'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================
     SECTION: PIONNIERS DE L'IA (5e à 3e)
     ============================================ -->
<section id="ia" class="content-section">
    <div class="section-padding" style="background: var(--cream);">
        <div class="container">

            <div class="programme-hero animate-scroll">
                <div class="programme-image-wrap">
                    <img loading="lazy" decoding="async" src="https://images.unsplash.com/photo-1677442136019-21780ecad995?w=600&h=400&fit=crop" alt="Pionniers de l'IA Collège">
                    <div class="programme-image-badge"><i class="fas fa-brain"></i> 5e à 3e</div>
                </div>
                <div class="programme-text">
                    <div class="section-label-orange">Activité 4</div>
                    <h2>Pionniers de l'<span>Intelligence Artificielle</span></h2>
                    <p>Comprendre les technologies qui transforment le monde. Une initiation adaptée aux collégiens pour découvrir les nouvelles technologies et comprendre comment les machines peuvent apprendre.</p>
                    <p><strong>Objectif :</strong> Initier les collégiens aux concepts de l'IA de manière ludique et accessible.</p>
                </div>
            </div>

            <div class="cards-grid-2 animate-scroll">
                <div class="info-card-moderne">
                    <h3><i class="fas fa-bullseye"></i> Ce que l'élève apprendra</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Comprendre l'impact de l'IA</li>
                        <li><i class="fas fa-check"></i> Utiliser les outils numériques</li>
                        <li><i class="fas fa-check"></i> Développer son esprit critique</li>
                        <li><i class="fas fa-check"></i> Créer des projets innovants</li>
                    </ul>
                </div>
                <div class="info-card-moderne">
                    <h3><i class="fas fa-dumbbell"></i> Résumé des cours</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Fonctionnement de l'IA</li>
                        <li><i class="fas fa-check"></i> Données et apprentissage</li>
                        <li><i class="fas fa-check"></i> Outils d'IA</li>
                        <li><i class="fas fa-check"></i> Projets assistés par IA</li>
                        <li><i class="fas fa-check"></i> Enjeux éthiques du numérique</li>
                    </ul>
                </div>
            </div>

            <div class="info-section-grid animate-scroll">
                <div class="info-block">
                    <h4><i class="fas fa-users"></i> Pour qui ?</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Collège : 5e à 3e</li>
                        <li><i class="fas fa-check"></i> Intermédiaire</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-clock"></i> Organisation</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Durée : 1h30 par séance</li>
                        <li><i class="fas fa-check"></i> Fréquence : 1 séance par semaine</li>
                        <li><i class="fas fa-check"></i> Lieu : En petits groupes au centre</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-star"></i> Compétences développées</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> IA</li>
                        <li><i class="fas fa-check"></i> Data</li>
                        <li><i class="fas fa-check"></i> Éthique</li>
                        <li><i class="fas fa-check"></i> Innovation</li>
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
                        <div class="tarif-icon"><i class="fas fa-brain"></i></div>
                        <h4>Séance (1h30)</h4>
                        <div class="prix">18 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Pionniers de l\'IA - Collège', '18000', '1 séance (1h30)'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card featured">
                        <div class="tarif-icon"><i class="fas fa-calendar-week"></i></div>
                        <h4>Forfait 4 séances</h4>
                        <div class="prix">65 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Pionniers de l\'IA - Collège', '65000', 'Forfait 4 séances'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card">
                        <div class="tarif-icon"><i class="fas fa-rocket"></i></div>
                        <h4>Forfait 8 séances</h4>
                        <div class="prix">120 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Pionniers de l\'IA - Collège', '120000', 'Forfait 8 séances'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================
     SECTION: JAVASCRIPT (5e à 3e)
     ============================================ -->
<section id="javascript" class="content-section">
    <div class="section-padding" style="background: var(--cream);">
        <div class="container">

            <div class="programme-hero animate-scroll">
                <div class="programme-image-wrap">
                    <img loading="lazy" decoding="async" src="https://images.unsplash.com/photo-1504639725590-34d0984388bd?w=600&h=400&fit=crop" alt="Génies du JavaScript Collège">
                    <div class="programme-image-badge"><i class="fab fa-js"></i> 5e à 3e</div>
                </div>
                <div class="programme-text">
                    <div class="section-label-orange">Activité 5</div>
                    <h2>Génies du <span>JavaScript</span></h2>
                    <p>Créer ses premières pages web interactives. Une immersion dans le développement web recommandée pour les collégiens ayant déjà acquis les bases du numérique.</p>
                    <p><strong>Objectif :</strong> Découvrir la création de pages et d'interactions numériques grâce au code JavaScript.</p>
                </div>
            </div>

            <div class="cards-grid-2 animate-scroll">
                <div class="info-card-moderne">
                    <h3><i class="fas fa-bullseye"></i> Ce que l'élève apprendra</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Créer une page web simple</li>
                        <li><i class="fas fa-check"></i> Comprendre un site internet</li>
                        <li><i class="fas fa-check"></i> Programmer des interactions</li>
                        <li><i class="fas fa-check"></i> Développer un projet numérique</li>
                    </ul>
                </div>
                <div class="info-card-moderne">
                    <h3><i class="fas fa-dumbbell"></i> Résumé des cours</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Structure d'une page web</li>
                        <li><i class="fas fa-check"></i> HTML/CSS</li>
                        <li><i class="fas fa-check"></i> Bases du JavaScript</li>
                        <li><i class="fas fa-check"></i> Interaction utilisateur</li>
                        <li><i class="fas fa-check"></i> Mini-projets web</li>
                    </ul>
                </div>
            </div>

            <div class="info-section-grid animate-scroll">
                <div class="info-block">
                    <h4><i class="fas fa-users"></i> Pour qui ?</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Collège : 5e à 3e</li>
                        <li><i class="fas fa-check"></i> Débutant accepté</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-clock"></i> Organisation</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Durée : 1h30 par séance</li>
                        <li><i class="fas fa-check"></i> Fréquence : 1 séance par semaine</li>
                        <li><i class="fas fa-check"></i> Lieu : En petits groupes au centre</li>
                    </ul>
                </div>
                <div class="info-block">
                    <h4><i class="fas fa-star"></i> Compétences développées</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> HTML</li>
                        <li><i class="fas fa-check"></i> CSS</li>
                        <li><i class="fas fa-check"></i> JavaScript</li>
                        <li><i class="fas fa-check"></i> Web</li>
                        <li><i class="fas fa-check"></i> Création</li>
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
                        <div class="prix">20 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Génies du JavaScript - Collège', '20000', '1 séance (1h30)'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card featured">
                        <div class="tarif-icon"><i class="fas fa-calendar-week"></i></div>
                        <h4>Forfait 4 séances</h4>
                        <div class="prix">75 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Génies du JavaScript - Collège', '75000', 'Forfait 4 séances'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="tarif-card">
                        <div class="tarif-icon"><i class="fas fa-rocket"></i></div>
                        <h4>Forfait 8 séances</h4>
                        <div class="prix">140 000 <span>FCFA</span></div>
                        <a href="#" class="btn-tarif" onclick="openInscriptionModal('Génies du JavaScript - Collège', '140000', 'Forfait 8 séances'); return false;">Je m'inscris <i class="fas fa-arrow-right"></i></a>
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
                        <input type="number" name="age_enfant" required min="10" max="16" placeholder="Ex: 12">
                    </div>
                    <div class="form-group">
                        <label>Classe *</label>
                        <select name="classe" required>
                            <option value="">Choisir...</option>
                            <option value="6e">6ème</option>
                            <option value="5e">5ème</option>
                            <option value="4e">4ème</option>
                            <option value="3e">3ème</option>
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
                            <label class="radio-label"><input type="radio" name="lieu" value="centre" checked> <span>Au centre</span></label>
                            <label class="radio-label"><input type="radio" name="lieu" value="en_ligne"> <span>En ligne</span></label>
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
                        <label class="radio-label"><input type="radio" name="type_paiement" value="seance"> <span>Par séance</span></label>
                        <label class="radio-label"><input type="radio" name="type_paiement" value="forfait"> <span>Forfait</span></label>
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
            <p class="section-subtitle">Nous mettons tout en œuvre pour garantir l'épanouissement numérique de chaque élève.</p>
        </div>

        <div class="pourquoi-grid">
            <div class="pourquoi-card animate-scroll animate-delay-1">
                <div class="pourquoi-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                <h4>Encadrement expert</h4>
                <p>Des formateurs spécialisés en technologies et pédagogie pour un apprentissage de qualité.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-2">
                <div class="pourquoi-icon"><i class="fas fa-laptop-code"></i></div>
                <h4>Projets concrets</h4>
                <p>Chaque élève réalise des projets tangibles : robots, jeux, sites web, applications.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-3">
                <div class="pourquoi-icon"><i class="fas fa-users"></i></div>
                <h4>Petits groupes</h4>
                <p>Des groupes réduits pour un suivi personnalisé et une meilleure interaction.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-1">
                <div class="pourquoi-icon"><i class="fas fa-rocket"></i></div>
                <h4>Compétences du futur</h4>
                <p>Préparation aux métiers de demain : IA, programmation, robotique, data science.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-2">
                <div class="pourquoi-icon"><i class="fas fa-chart-line"></i></div>
                <h4>Suivi de progression</h4>
                <p>Évaluation régulière des acquis et progression adaptée au rythme de chaque élève.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-3">
                <div class="pourquoi-icon"><i class="fas fa-smile"></i></div>
                <h4>Apprentissage ludique</h4>
                <p>Des méthodes pédagogiques innovantes qui rendent le code et la tech accessibles et fun.</p>
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
            <h2 class="section-title-big">Donnez à votre enfant les <span style="color: var(--orange);">clés du numérique</span> dès aujourd'hui</h2>
            <p class="section-subtitle">Faites confiance à MONPROFCHEZMOI pour accompagner le développement technologique et créatif de votre enfant.</p>
            <div class="cta-buttons">
                <a href="{{ url('/particuliers/reponse') }}" class="btn-cta-orange"><i class="fas fa-search"></i> Réserver une séance</a>
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
                <img loading="lazy" decoding="async" src="/asset/img/logo.png" alt="Monprofchezmoi">
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
                    <a href="{{ url('/particuliers') }}">Accueil</a>
                    <a href="{{ url('/particuliers/reponse') }}">Soutien scolaire</a>
                    <a href="{{ url('/particuliers/formations') }}">Formations</a>
                    <a href="{{ url('/particuliers/groupe') }}">DCG & DSCG</a>
                    <a href="{{ url('/particuliers/coaching') }}">Extrascolaire</a>
                </div>
            </div>

            <div>
                <h4 class="footer-col-title">Populaires</h4>
                <div class="footer-links-moderne">
                    <a href="{{ url('/particuliers/formations') }}">Formation Anglais</a>
                    <a href="{{ url('/particuliers/musique') }}">Musique</a>
                    <a href="{{ url('/particuliers/groupe') }}">DCG</a>
                    <a href="{{ url('/particuliers/sportif') }}">Sport</a>
                    <a href="{{ url('/particuliers/codage') }}">Codage</a>
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

    fetch('/particuliers/inscription', {
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
            paymentForm.action = '/particuliers/payment/initiate';

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

// ========== TAB SWITCHING ==========
function switchTab(btn, sectionId) {
    document.querySelectorAll('.tab-btn').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.content-section').forEach(s => s.classList.remove('active'));

    btn.classList.add('active');
    document.getElementById(sectionId).classList.add('active');

    const tabsSection = document.querySelector('.nav-tabs-moderne');
    const offset = tabsSection.offsetTop + tabsSection.offsetHeight;
    window.scrollTo({ top: offset, behavior: 'smooth' });
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


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>


