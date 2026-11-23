<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Coaching Sportif à Domicile - Monprofchezmoi-ci.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Coaching sportif, Fitness, Perte de poids, Remise en forme, Abidjan, Côte d'Ivoire" name="keywords">
    <meta content="Accompagnement sportif personnalisé à domicile en Côte d'Ivoire. Coachs diplômés pour tous niveaux et objectifs." name="description">

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
    --red: #EF4444;
    --red-light: #FCA5A5;
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
   PAGE HERO - COACHING SPORTIF
   ============================================ */
.page-hero-sport {
    min-height: 70vh;
    background: linear-gradient(135deg, var(--blue) 0%, #1a1a3e 30%, #0f3460 70%, var(--green) 100%);
    position: relative; overflow: hidden;
    display: flex; align-items: center; padding: 80px 0;
}
.page-hero-sport::before {
    content: ''; position: absolute;
    top: -20%; right: -10%; width: 600px; height: 600px;
    background: radial-gradient(circle, rgba(16,185,129,0.12), transparent 70%);
    border-radius: 50%;
    animation: float-hero 8s ease-in-out infinite;
}
.page-hero-sport::after {
    content: ''; position: absolute;
    bottom: -15%; left: -10%; width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(255,107,53,0.08), transparent 70%);
    border-radius: 50%;
    animation: float-hero 12s ease-in-out infinite reverse;
}
@keyframes float-hero {
    0%, 100% { transform: translate(0, 0) scale(1); }
    50% { transform: translate(-30px, -20px) scale(1.05); }
}

/* Particules animées */
.particles {
    position: absolute; inset: 0; overflow: hidden; pointer-events: none;
}
.particle {
    position: absolute; width: 4px; height: 4px;
    background: rgba(255,107,53,0.25); border-radius: 50%;
    animation: particle-float 18s infinite;
}
.particle:nth-child(1) { left: 10%; top: 20%; animation-delay: 0s; }
.particle:nth-child(2) { left: 25%; top: 55%; animation-delay: 2s; width: 6px; height: 6px; background: rgba(16,185,129,0.25); }
.particle:nth-child(3) { left: 60%; top: 25%; animation-delay: 4s; }
.particle:nth-child(4) { left: 80%; top: 65%; animation-delay: 6s; width: 5px; height: 5px; background: rgba(20,184,166,0.2); }
.particle:nth-child(5) { left: 45%; top: 80%; animation-delay: 8s; }
.particle:nth-child(6) { left: 15%; top: 40%; animation-delay: 10s; width: 3px; height: 3px; background: rgba(255,107,53,0.35); }
.particle:nth-child(7) { left: 70%; top: 10%; animation-delay: 12s; width: 4px; height: 4px; background: rgba(16,185,129,0.3); }
.particle:nth-child(8) { left: 35%; top: 75%; animation-delay: 14s; width: 5px; height: 5px; background: rgba(20,184,166,0.25); }
@keyframes particle-float {
    0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0; }
    10% { opacity: 1; }
    90% { opacity: 1; }
    100% { transform: translateY(-100vh) rotate(720deg); opacity: 0; }
}

/* Grid flottant décoratif */
.hero-grid-bg {
    position: absolute; inset: 0;
    background-image:
        linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
    background-size: 60px 60px;
    pointer-events: none;
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
    background: rgba(16,185,129,0.15);
    border: 1px solid rgba(16,185,129,0.3);
    color: var(--green-light);
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
.page-hero-title .highlight-green { color: var(--green-light); position: relative; }
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
    background: rgba(16,185,129,0.2);
    border-color: var(--green);
    transform: translateY(-2px);
}

/* Hero Right - Visual */
.hero-visual-wrapper {
    position: relative; display: flex; justify-content: center; align-items: center;
    min-height: 400px;
}
.hero-visual-circle {
    width: 320px; height: 320px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(20,184,166,0.1));
    border: 2px solid rgba(255,255,255,0.08);
    display: flex; align-items: center; justify-content: center;
    position: relative;
    animation: pulse-circle 4s ease-in-out infinite;
}
@keyframes pulse-circle {
    0%, 100% { transform: scale(1); box-shadow: 0 0 40px rgba(16,185,129,0.1); }
    50% { transform: scale(1.03); box-shadow: 0 0 60px rgba(16,185,129,0.2); }
}
.hero-visual-inner {
    width: 240px; height: 240px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(255,107,53,0.15), rgba(16,185,129,0.15));
    display: flex; align-items: center; justify-content: center;
    font-size: 5rem; color: white;
    animation: rotate-inner 20s linear infinite;
}
@keyframes rotate-inner {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
.hero-visual-icon {
    font-size: 4rem;
    animation: bounce-icon 2s ease-in-out infinite;
}
@keyframes bounce-icon {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Orbit elements */
.orbit-element {
    position: absolute;
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 16px;
    padding: 12px 18px;
    color: white;
    display: flex; align-items: center; gap: 10px;
    font-size: 0.85rem; font-weight: 600;
    animation: orbit-float 5s ease-in-out infinite;
}
.orbit-element i {
    width: 36px; height: 36px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1rem;
}
.orbit-1 {
    top: 5%; right: 10%;
    animation-delay: 0s;
}
.orbit-1 i { background: var(--orange); }
.orbit-2 {
    bottom: 15%; left: 0;
    animation-delay: 1.5s;
}
.orbit-2 i { background: var(--green); }
.orbit-3 {
    top: 50%; right: -10px;
    animation-delay: 3s;
}
.orbit-3 i { background: var(--teal); }
@keyframes orbit-float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(2deg); }
}

@media (max-width: 991px) {
    .page-hero-content { grid-template-columns: 1fr; text-align: center; }
    .page-hero-left { text-align: center; }
    .page-hero-badges { justify-content: center; }
    .hero-visual-wrapper { display: none; }
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
.section-label-green {
    display: inline-flex; align-items: center; gap: 8px;
    font-size: 0.8rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: 2px; color: var(--green); margin-bottom: 16px;
}
.section-label-green::before {
    content: ''; width: 30px; height: 3px;
    background: var(--green); border-radius: 2px;
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
    background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(16,185,129,0.05));
    border: 1px solid rgba(16,185,129,0.2);
    color: var(--green); padding: 12px 24px;
    border-radius: 50px; font-size: 0.95rem; font-weight: 600;
    margin-top: 20px;
}

/* Public concerné cards */
.public-grid {
    display: grid; grid-template-columns: repeat(4, 1fr);
    gap: 16px; margin-top: 40px;
}
.public-card {
    display: flex; align-items: center; gap: 12px;
    padding: 18px 20px; background: var(--white);
    border-radius: 14px; border: 1px solid var(--gray-100);
    transition: all 0.3s ease;
    box-shadow: var(--shadow-sm);
}
.public-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
    border-color: var(--green);
}
.public-card i {
    width: 44px; height: 44px; min-width: 44px;
    border-radius: 12px; background: linear-gradient(135deg, var(--green), var(--green-light));
    color: white; display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem;
}
.public-card span {
    font-weight: 700; color: var(--blue); font-size: 0.9rem;
}
@media (max-width: 991px) {
    .public-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 575px) {
    .public-grid { grid-template-columns: 1fr; }
}

/* ============================================
   PROGRAMMES - CARDS
   ============================================ */
.programmes-section { background: var(--cream); }
.programmes-grid {
    display: grid; grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}
.programme-card {
    background: var(--white); border-radius: 20px;
    padding: 35px; border: 1px solid var(--gray-100);
    transition: all 0.4s ease; position: relative; overflow: hidden;
    text-align: center;
}
.programme-card::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--green), var(--orange));
    border-radius: 20px 20px 0 0;
    transform: scaleX(0);
    transition: transform 0.4s ease;
}
.programme-card:hover::before {
    transform: scaleX(1);
}
.programme-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.programme-icon {
    width: 60px; height: 60px; border-radius: 16px;
    background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(16,185,129,0.05));
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px; font-size: 1.5rem; color: var(--green);
    transition: all 0.4s ease;
}
.programme-card:hover .programme-icon {
    background: linear-gradient(135deg, var(--green), var(--green-light));
    color: white; transform: scale(1.1) rotate(-5deg);
    box-shadow: 0 8px 24px rgba(16,185,129,0.3);
}
.programme-card h4 {
    font-size: 1.15rem; font-weight: 800; color: var(--blue);
    margin-bottom: 12px;
}
.programme-card p {
    font-size: 0.9rem; color: var(--gray-600);
    line-height: 1.6; margin: 0;
}

@media (max-width: 991px) {
    .programmes-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 575px) {
    .programmes-grid { grid-template-columns: 1fr; }
}

/* ============================================
   ENGAGEMENTS - CHECK CARDS
   ============================================ */
.engagements-section { background: var(--white); }
.engagements-grid {
    display: grid; grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}
.engagement-card {
    background: var(--white); border-radius: 16px;
    padding: 28px; border: 1px solid var(--gray-100);
    transition: all 0.4s ease;
    position: relative; overflow: hidden;
}
.engagement-card::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--green), var(--orange));
    border-radius: 16px 16px 0 0;
    transform: scaleX(0);
    transition: transform 0.4s ease;
}
.engagement-card:hover::before {
    transform: scaleX(1);
}
.engagement-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.engagement-icon {
    width: 56px; height: 56px; border-radius: 14px;
    background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(16,185,129,0.05));
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 16px; font-size: 1.4rem; color: var(--green);
    transition: all 0.4s ease;
}
.engagement-card:hover .engagement-icon {
    background: linear-gradient(135deg, var(--green), var(--green-light));
    color: white; transform: scale(1.1) rotate(-5deg);
    box-shadow: 0 8px 24px rgba(16,185,129,0.3);
}
.engagement-card h4 {
    font-size: 1.05rem; font-weight: 700; color: var(--blue);
    margin-bottom: 8px;
}
.engagement-card p {
    font-size: 0.9rem; color: var(--gray-600);
    line-height: 1.6; margin: 0;
}

@media (max-width: 991px) {
    .engagements-grid { grid-template-columns: 1fr; }
}

/* ============================================
   MÉTHODOLOGIE - TIMELINE STYLE
   ============================================ */
.methodo-section { background: var(--cream); }
.timeline-container {
    position: relative; max-width: 900px; margin: 0 auto;
}
.timeline-line {
    position: absolute; left: 30px; top: 0; bottom: 0;
    width: 3px;
    background: linear-gradient(to bottom, var(--green), var(--orange), var(--teal));
    border-radius: 3px;
}
.timeline-item {
    display: flex; gap: 30px; margin-bottom: 40px;
    position: relative;
}
.timeline-item:last-child { margin-bottom: 0; }
.timeline-dot {
    width: 60px; height: 60px; min-width: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--green), var(--green-light));
    display: flex; align-items: center; justify-content: center;
    color: white; font-size: 1.3rem; font-weight: 800;
    box-shadow: 0 4px 20px rgba(16,185,129,0.3);
    position: relative; z-index: 2;
    transition: all 0.4s ease;
}
.timeline-item:hover .timeline-dot {
    transform: scale(1.1) rotate(10deg);
    box-shadow: 0 8px 30px rgba(16,185,129,0.4);
}
.timeline-content {
    background: var(--white);
    border-radius: 20px;
    padding: 28px 32px;
    border: 1px solid var(--gray-100);
    flex: 1;
    transition: all 0.4s ease;
    box-shadow: var(--shadow-sm);
}
.timeline-content:hover {
    transform: translateX(8px);
    box-shadow: var(--shadow-md);
    border-color: var(--green);
}
.timeline-content h4 {
    font-size: 1.15rem; font-weight: 800; color: var(--blue);
    margin-bottom: 12px; display: flex; align-items: center; gap: 10px;
}
.timeline-content h4 i { color: var(--green); }
.timeline-content ul {
    list-style: none; padding: 0; margin: 0;
}
.timeline-content ul li {
    display: flex; align-items: flex-start; gap: 10px;
    padding: 6px 0; font-size: 0.92rem;
    color: var(--gray-600);
}
.timeline-content ul li i {
    color: var(--green); font-size: 0.85rem;
    margin-top: 4px; min-width: 16px;
}

@media (max-width: 767px) {
    .timeline-line { left: 20px; }
    .timeline-dot { width: 44px; height: 44px; min-width: 44px; font-size: 1rem; }
    .timeline-item { gap: 16px; }
    .timeline-content { padding: 20px; }
}

/* ============================================
   RÉSULTATS - CARDS
   ============================================ */
.resultats-section { background: var(--white); }
.resultats-grid {
    display: grid; grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}
.resultat-card {
    background: var(--white); border-radius: 16px;
    padding: 28px; border: 1px solid var(--gray-100);
    text-align: center; transition: all 0.4s ease;
}
.resultat-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-md);
    border-color: var(--green);
}
.resultat-icon {
    width: 60px; height: 60px; border-radius: 16px;
    background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(16,185,129,0.05));
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 16px; font-size: 1.5rem; color: var(--green);
    transition: all 0.4s ease;
}
.resultat-card:hover .resultat-icon {
    background: linear-gradient(135deg, var(--green), var(--green-light));
    color: white; transform: scale(1.1);
    box-shadow: 0 8px 24px rgba(16,185,129,0.3);
}
.resultat-card h4 {
    font-size: 1rem; font-weight: 700; color: var(--blue);
    margin-bottom: 8px;
}
.resultat-card p {
    font-size: 0.88rem; color: var(--gray-600); margin: 0;
}

@media (max-width: 991px) {
    .resultats-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 575px) {
    .resultats-grid { grid-template-columns: 1fr; }
}

/* ============================================
   TÉMOIGNAGES - CARDS
   ============================================ */
.temoignages-section { background: var(--cream); }
.temoignages-grid {
    display: grid; grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}
.temoignage-card {
    background: var(--white); border-radius: 20px;
    padding: 35px; border: 1px solid var(--gray-100);
    transition: all 0.4s ease; position: relative;
}
.temoignage-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.stars {
    color: #FBBF24; font-size: 1rem; margin-bottom: 16px;
}
.temoignage-text {
    font-size: 0.95rem; color: var(--gray-600);
    line-height: 1.8; margin-bottom: 20px; font-style: italic;
}
.temoignage-author {
    display: flex; align-items: center; gap: 12px;
}
.temoignage-avatar {
    width: 48px; height: 48px; border-radius: 50%;
    background: linear-gradient(135deg, var(--green), var(--green-light));
    display: flex; align-items: center; justify-content: center;
    color: white; font-weight: 700; font-size: 1.1rem;
}
.temoignage-info h5 {
    font-size: 0.95rem; font-weight: 700; color: var(--blue);
    margin: 0;
}
.temoignage-info span {
    font-size: 0.82rem; color: var(--gray-400);
}

@media (max-width: 991px) {
    .temoignages-grid { grid-template-columns: 1fr; }
}

/* ============================================
   TARIFS - PRICING CARDS
   ============================================ */
.tarifs-section { background: var(--white); }
.tarifs-grid {
    display: grid; grid-template-columns: repeat(3, 1fr);
    gap: 30px; align-items: stretch;
}
.tarif-card {
    background: var(--white); border-radius: 24px;
    overflow: hidden; border: 1px solid var(--gray-100);
    transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    display: flex; flex-direction: column;
}
.tarif-card:hover {
    transform: translateY(-12px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.tarif-card.popular {
    border: 2px solid var(--green);
    transform: scale(1.02);
}
.tarif-card.popular:hover {
    transform: scale(1.02) translateY(-12px);
}
.popular-badge {
    position: absolute; top: 0; left: 50%; transform: translateX(-50%);
    background: linear-gradient(135deg, var(--green), var(--green-light));
    color: white; padding: 8px 24px;
    border-radius: 0 0 16px 16px;
    font-size: 0.8rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: 1px;
    box-shadow: 0 4px 16px rgba(16,185,129,0.3);
}
.tarif-header {
    padding: 40px 30px 24px; text-align: center;
    background: linear-gradient(135deg, var(--gray-50), var(--white));
}
.tarif-card.popular .tarif-header {
    background: linear-gradient(135deg, rgba(16,185,129,0.05), rgba(16,185,129,0.02));
}
.tarif-icon {
    width: 70px; height: 70px; border-radius: 20px;
    background: linear-gradient(135deg, var(--green), var(--green-light));
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 16px; font-size: 1.8rem; color: white;
    box-shadow: 0 8px 24px rgba(16,185,129,0.3);
}
.tarif-card.popular .tarif-icon {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    box-shadow: 0 8px 24px rgba(255,107,53,0.3);
}
.tarif-header h3 {
    font-size: 1.3rem; font-weight: 800; color: var(--blue);
    margin-bottom: 4px;
}
.tarif-header p {
    font-size: 0.85rem; color: var(--gray-600); margin: 0;
}
.tarif-prix {
    font-size: 2.2rem; font-weight: 800; color: var(--green);
    margin: 16px 0 0;
}
.tarif-card.popular .tarif-prix { color: var(--orange); }
.tarif-prix span {
    font-size: 0.9rem; font-weight: 600; color: var(--gray-400);
}
.tarif-body {
    padding: 24px 30px; flex: 1;
    display: flex; flex-direction: column;
}
.tarif-features {
    list-style: none; padding: 0; margin: 0 0 24px 0; flex: 1;
}
.tarif-features li {
    display: flex; align-items: flex-start; gap: 10px;
    padding: 10px 0; font-size: 0.92rem;
    color: var(--gray-800); border-bottom: 1px solid var(--gray-100);
}
.tarif-features li:last-child { border-bottom: none; }
.tarif-features li i {
    color: var(--green); font-size: 0.9rem;
    margin-top: 3px; min-width: 18px;
}
.tarif-card.popular .tarif-features li i { color: var(--orange); }
.tarif-btn {
    width: 100%; padding: 14px 24px;
    border-radius: 12px; font-weight: 700; font-size: 0.95rem;
    text-decoration: none; display: inline-flex;
    align-items: center; justify-content: center; gap: 10px;
    transition: all 0.3s ease; background: var(--green);
    color: white; border: none; cursor: pointer;
}
.tarif-btn:hover {
    background: #059669; transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(16,185,129,0.4); color: white;
}
.tarif-card.popular .tarif-btn {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    box-shadow: var(--shadow-orange);
}
.tarif-card.popular .tarif-btn:hover {
    background: linear-gradient(135deg, var(--orange-dark), var(--orange));
    box-shadow: 0 12px 32px rgba(255,107,53,0.4);
}

@media (max-width: 991px) {
    .tarifs-grid { grid-template-columns: 1fr; max-width: 500px; margin: 0 auto; }
    .tarif-card.popular { transform: none; }
    .tarif-card.popular:hover { transform: translateY(-12px); }
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
    background: radial-gradient(circle, rgba(16,185,129,0.15), transparent 70%);
    border-radius: 50%;
}
.stats-grid {
    display: grid; grid-template-columns: repeat(4, 1fr);
    gap: 30px; text-align: center;
}
.stat-item { color: white; }
.stat-number {
    font-size: 2.5rem; font-weight: 800; color: var(--green-light);
    display: block; margin-bottom: 8px;
}
.stat-label { font-size: 0.9rem; color: rgba(255,255,255,0.7); }
@media (max-width: 767px) {
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
}

/* ============================================
   OFFRE SPÉCIALE
   ============================================ */
.offre-section {
    background: linear-gradient(135deg, var(--orange) 0%, var(--orange-dark) 100%);
    padding: 60px 0; position: relative; overflow: hidden;
    text-align: center;
}
.offre-section::before {
    content: ''; position: absolute;
    top: -50px; left: -50px; width: 200px; height: 200px;
    background: radial-gradient(circle, rgba(255,255,255,0.1), transparent 70%);
    border-radius: 50%;
}
.offre-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(255,255,255,0.2);
    border: 1px solid rgba(255,255,255,0.3);
    color: white; padding: 8px 20px;
    border-radius: 50px; font-size: 0.85rem; font-weight: 600;
    margin-bottom: 20px;
}
.offre-section h2 {
    font-size: 2rem; font-weight: 800; color: white;
    margin-bottom: 12px;
}
.offre-section p {
    font-size: 1.1rem; color: rgba(255,255,255,0.9);
    margin-bottom: 24px;
}
.offre-prix {
    font-size: 3rem; font-weight: 800; color: white;
}
.offre-prix span {
    font-size: 1rem; font-weight: 600; color: rgba(255,255,255,0.8);
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
    background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(16,185,129,0.05));
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px; font-size: 1.8rem; color: var(--green);
    transition: all 0.4s ease;
}
.pourquoi-card:hover .pourquoi-icon {
    background: linear-gradient(135deg, var(--green), var(--green-light));
    color: white; transform: scale(1.1) rotate(-5deg);
    box-shadow: 0 8px 32px rgba(16,185,129,0.3);
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
    background: radial-gradient(circle, rgba(16,185,129,0.15), transparent 70%);
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
.form-group select,
.form-group textarea {
    width: 100%; padding: 12px 14px;
    border: 2px solid var(--gray-200); border-radius: 10px;
    font-family: 'Nunito', sans-serif; font-size: 0.9rem;
    color: var(--gray-800); transition: all 0.2s ease; background: var(--white);
}
.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none; border-color: var(--orange);
    box-shadow: 0 0 0 4px rgba(255, 107, 53, 0.1);
}
.form-group input::placeholder,
.form-group textarea::placeholder { color: var(--gray-400); }
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
    .page-hero-sport { min-height: 50vh; padding: 60px 0; }
}
</style>

<body>

@include('partials.header')

<!-- Scroll Progress -->
<div class="scroll-progress" id="scrollProgress"></div>

<section class="page-hero-sport">
    <div class="hero-grid-bg"></div>
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
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
                <div class="page-hero-label"><i class="fas fa-dumbbell"></i> Coaching Sportif à Domicile</div>
                <h1 class="page-hero-title">Transformez votre <span class="highlight-orange">corps</span>, améliorez votre <span class="highlight-green">santé</span> et retrouvez votre énergie</h1>
                <p class="page-hero-subtitle">Un accompagnement sportif personnalisé à domicile, adapté à votre niveau, votre emploi du temps et vos objectifs. Nos coachs sportifs diplômés vous guident pas à pas pour des résultats durables.</p>
                <div class="page-hero-badges">
                    <div class="page-hero-badge"><i class="fas fa-fire"></i> Perte de poids</div>
                    <div class="page-hero-badge"><i class="fas fa-heartbeat"></i> Remise en forme</div>
                    <div class="page-hero-badge"><i class="fas fa-fist-raised"></i> Renforcement</div>
                    <div class="page-hero-badge"><i class="fas fa-home"></i> À domicile</div>
                </div>
            </div>
            <div class="hero-visual-wrapper animate-slide-right">
                <div class="hero-visual-circle">
                    <div class="hero-visual-inner">
                        <i class="fas fa-running hero-visual-icon"></i>
                    </div>
                </div>
                <div class="orbit-element orbit-1">
                    <i class="fas fa-fire-alt"></i>
                    <div>
                        <strong style="font-size: 0.85rem;">Énergie</strong>
                    </div>
                </div>
                <div class="orbit-element orbit-2">
                    <i class="fas fa-medal"></i>
                    <div>
                        <strong style="font-size: 0.85rem;">Résultats</strong>
                    </div>
                </div>
                <div class="orbit-element orbit-3">
                    <i class="fas fa-heart"></i>
                    <div>
                        <strong style="font-size: 0.85rem;">Bien-être</strong>
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
        <a href="{{ url('/formations') }}">Formations</a>
        <i class="fas fa-chevron-right"></i>
        <span class="current">Coaching Sportif à Domicile</span>
    </div>
</div>

<!-- ============================================
     INTRODUCTION + PUBLIC CONCERNÉ
     ============================================ -->
<section class="intro-section section-padding">
    <div class="container">
        <div class="intro-content animate-scroll">
            <div class="section-label-green">Présentation</div>
            <h2 class="section-title-big">Un accompagnement sportif <span style="color: var(--green);">sur mesure</span> pour atteindre vos objectifs</h2>
            <p class="intro-text">
                Vous souhaitez <strong>perdre du poids, gagner en tonicité, développer votre masse musculaire</strong> ou simplement retrouver une meilleure condition physique ?
            </p>
            <p class="intro-text">
                <strong>MONPROFCHEZMOI</strong> vous propose un accompagnement sportif personnalisé à domicile, adapté à votre niveau, votre emploi du temps et vos objectifs. Nos <strong>coachs sportifs diplômés</strong> vous guident pas à pas pour obtenir des résultats durables dans un environnement confortable, motivant et sécurisé.
            </p>
            <div class="intro-highlight animate-scroll">
                <i class="fas fa-star"></i> Un encadrement professionnel pour tous les niveaux en Côte d'Ivoire
            </div>

            <div class="public-grid stagger-container">
                <div class="public-card stagger-item">
                    <i class="fas fa-user"></i>
                    <span>Adultes tous âges</span>
                </div>
                <div class="public-card stagger-item">
                    <i class="fas fa-baby"></i>
                    <span>Coaching post-grossesse</span>
                </div>
                <div class="public-card stagger-item">
                    <i class="fas fa-user-friends"></i>
                    <span>Seniors actifs</span>
                </div>
                <div class="public-card stagger-item">
                    <i class="fas fa-building"></i>
                    <span>Entreprises</span>
                </div>
                <div class="public-card stagger-item">
                    <i class="fas fa-trophy"></i>
                    <span>Sportifs compétition</span>
                </div>
                <div class="public-card stagger-item">
                    <i class="fas fa-heartbeat"></i>
                    <span>Rééducation sportive</span>
                </div>
                <div class="public-card stagger-item">
                    <i class="fas fa-user-check"></i>
                    <span>Aucun prérequis</span>
                </div>
                <div class="public-card stagger-item">
                    <i class="fas fa-home"></i>
                    <span>À domicile ou extérieur</span>
                </div>
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
                <span class="stat-number counter" data-target="90">0</span>
                <span class="stat-label">% Clients satisfaits</span>
            </div>
            <div class="stat-item animate-scale animate-delay-2">
                <span class="stat-number counter" data-target="500">0</span>
                <span class="stat-label">Séances réalisées</span>
            </div>
            <div class="stat-item animate-scale animate-delay-3">
                <span class="stat-number counter" data-target="15">0</span>
                <span class="stat-label">Programmes spécialisés</span>
            </div>
            <div class="stat-item animate-scale animate-delay-4">
                <span class="stat-number counter" data-target="100">0</span>
                <span class="stat-label">% Personnalisé</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     POURQUOI CHOISIR NOTRE COACHING
     ============================================ -->
<section class="engagements-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-green">Nos engagements</div>
            <h2 class="section-title-big">Pourquoi choisir notre <span style="color: var(--green);">coaching sportif</span> ?</h2>
            <p class="section-subtitle">Des avantages concrets pour une expérience sportive optimale et des résultats durables.</p>
        </div>

        <div class="engagements-grid stagger-container">
            <div class="engagement-card stagger-item animate-delay-1">
                <div class="engagement-icon"><i class="fas fa-user-cog"></i></div>
                <h4>Un programme 100% personnalisé</h4>
                <p>Chaque personne est unique. Après une évaluation initiale, votre coach construit un programme adapté à votre condition physique, vos contraintes et vos objectifs.</p>
            </div>
            <div class="engagement-card stagger-item animate-delay-2">
                <div class="engagement-icon"><i class="fas fa-clock"></i></div>
                <h4>Un gain de temps considérable</h4>
                <p>Plus besoin de vous déplacer en salle de sport. Votre coach intervient directement à votre domicile ou dans un espace extérieur adapté.</p>
            </div>
            <div class="engagement-card stagger-item animate-delay-3">
                <div class="engagement-icon"><i class="fas fa-chart-line"></i></div>
                <h4>Un suivi régulier et motivant</h4>
                <p>Votre progression est suivie à chaque séance afin d'ajuster les exercices et garantir des résultats concrets.</p>
            </div>
            <div class="engagement-card stagger-item animate-delay-1">
                <div class="engagement-icon"><i class="fas fa-shield-alt"></i></div>
                <h4>Une pratique en toute sécurité</h4>
                <p>Les exercices sont réalisés sous la supervision d'un professionnel qualifié afin de prévenir les blessures et optimiser vos performances.</p>
            </div>
            <div class="engagement-card stagger-item animate-delay-2">
                <div class="engagement-icon"><i class="fas fa-bullseye"></i></div>
                <h4>Une approche orientée résultats</h4>
                <p>Nous vous aidons à atteindre des objectifs précis grâce à une méthode progressive, efficace et adaptée à votre rythme.</p>
            </div>
            <div class="engagement-card stagger-item animate-delay-3">
                <div class="engagement-icon"><i class="fas fa-apple-alt"></i></div>
                <h4>Conseils nutritionnels de base</h4>
                <p>Des recommandations alimentaires complémentaires pour maximiser l'efficacité de votre entraînement.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     NOS PROGRAMMES
     ============================================ -->
<section class="programmes-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Programmes</div>
            <h2 class="section-title-big">Nos <span style="color: var(--orange);">programmes</span> sportifs</h2>
            <p class="section-subtitle">Une variété de programmes adaptés à tous les objectifs et tous les niveaux.</p>
        </div>

        <div class="programmes-grid stagger-container">
            <div class="programme-card stagger-item">
                <div class="programme-icon"><i class="fas fa-fire-alt"></i></div>
                <h4>Remise en forme</h4>
                <p>Retrouvez votre condition physique et votre vitalité avec un programme progressif et adapté.</p>
            </div>
            <div class="programme-card stagger-item animate-delay-1">
                <div class="programme-icon"><i class="fas fa-weight"></i></div>
                <h4>Perte de poids</h4>
                <p>Un accompagnement ciblé pour brûler les graisses et atteindre votre poids idéal durablement.</p>
            </div>
            <div class="programme-card stagger-item animate-delay-2">
                <div class="programme-icon"><i class="fas fa-fist-raised"></i></div>
                <h4>Renforcement musculaire</h4>
                <p>Développez votre force et votre tonicité musculaire avec des exercices ciblés et efficaces.</p>
            </div>
            <div class="programme-card stagger-item">
                <div class="programme-icon"><i class="fas fa-dumbbell"></i></div>
                <h4>Prise de masse musculaire</h4>
                <p>Un programme spécifique pour gagner en volume musculaire de manière saine et structurée.</p>
            </div>
            <div class="programme-card stagger-item animate-delay-1">
                <div class="programme-icon"><i class="fas fa-heartbeat"></i></div>
                <h4>Cardio-training et fitness</h4>
                <p>Améliorez votre endurance cardiovasculaire et votre condition physique générale.</p>
            </div>
            <div class="programme-card stagger-item animate-delay-2">
                <div class="programme-icon"><i class="fas fa-bolt"></i></div>
                <h4>HIIT</h4>
                <p>Entraînement à haute intensité pour des résultats rapides et un métabolisme boosté.</p>
            </div>
            <div class="programme-card stagger-item">
                <div class="programme-icon"><i class="fas fa-spa"></i></div>
                <h4>Gym douce</h4>
                <p>Des mouvements doux et contrôlés pour améliorer votre souplesse et votre bien-être.</p>
            </div>
            <div class="programme-card stagger-item animate-delay-1">
                <div class="programme-icon"><i class="fas fa-child"></i></div>
                <h4>Pilates et stretching</h4>
                <p>Renforcement du centre du corps, amélioration de la posture et de la flexibilité.</p>
            </div>
            <div class="programme-card stagger-item animate-delay-2">
                <div class="programme-icon"><i class="fas fa-female"></i></div>
                <h4>Cuisses – Abdos – Fessiers</h4>
                <p>Un programme ciblé pour sculpter et tonifier les zones stratégiques du corps.</p>
            </div>
            <div class="programme-card stagger-item">
                <div class="programme-icon"><i class="fas fa-baby"></i></div>
                <h4>Coaching post-grossesse</h4>
                <p>Retrouvez votre forme en douceur après l'accouchement avec un accompagnement adapté.</p>
            </div>
            <div class="programme-card stagger-item animate-delay-1">
                <div class="programme-icon"><i class="fas fa-band-aid"></i></div>
                <h4>Rééducation sportive légère</h4>
                <p>Reprise d'activité physique après blessure sous supervision professionnelle.</p>
            </div>
            <div class="programme-card stagger-item animate-delay-2">
                <div class="programme-icon"><i class="fas fa-trophy"></i></div>
                <h4>Préparation physique compétitions</h4>
                <p>Un entraînement spécifique pour performer lors de vos compétitions sportives.</p>
            </div>
            <div class="programme-card stagger-item">
                <div class="programme-icon"><i class="fas fa-hand-rock"></i></div>
                <h4>Sports de combat et self-défense</h4>
                <p>Apprenez les techniques de combat et de défense personnelle avec un coach spécialisé.</p>
            </div>
            <div class="programme-card stagger-item animate-delay-1">
                <div class="programme-icon"><i class="fas fa-leaf"></i></div>
                <h4>Coaching santé et bien-être</h4>
                <p>Un accompagnement holistique alliant sport, relaxation et hygiène de vie.</p>
            </div>
            <div class="programme-card stagger-item animate-delay-2">
                <div class="programme-icon"><i class="fas fa-user-friends"></i></div>
                <h4>Programme spécial seniors</h4>
                <p>Des exercices adaptés pour maintenir la mobilité, l'équilibre et la santé des seniors.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     NOTRE MÉTHODE - TIMELINE
     ============================================ -->
<section class="methodo-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Méthode</div>
            <h2 class="section-title-big">Notre méthode d'<span style="color: var(--orange);">accompagnement</span></h2>
            <p class="section-subtitle">Un processus structuré en 4 étapes pour des résultats optimaux et durables.</p>
        </div>

        <div class="timeline-container">
            <div class="timeline-line"></div>

            <div class="timeline-item animate-scroll">
                <div class="timeline-dot"><i class="fas fa-clipboard-list"></i></div>
                <div class="timeline-content">
                    <h4><i class="fas fa-search"></i> Étape 1 : Bilan initial</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Analyse de votre condition physique actuelle</li>
                        <li><i class="fas fa-check"></i> Évaluation de vos habitudes de vie</li>
                        <li><i class="fas fa-check"></i> Définition précise de vos objectifs</li>
                        <li><i class="fas fa-check"></i> Identification des contraintes et motivations</li>
                    </ul>
                </div>
            </div>

            <div class="timeline-item animate-scroll">
                <div class="timeline-dot"><i class="fas fa-file-alt"></i></div>
                <div class="timeline-content">
                    <h4><i class="fas fa-drafting-compass"></i> Étape 2 : Programme personnalisé</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Création d'un plan d'entraînement sur mesure</li>
                        <li><i class="fas fa-check"></i> Adaptation à votre profil et votre niveau</li>
                        <li><i class="fas fa-check"></i> Sélection des exercices les plus efficaces</li>
                        <li><i class="fas fa-check"></i> Planification de la fréquence et de l'intensité</li>
                    </ul>
                </div>
            </div>

            <div class="timeline-item animate-scroll">
                <div class="timeline-dot"><i class="fas fa-running"></i></div>
                <div class="timeline-content">
                    <h4><i class="fas fa-user-friends"></i> Étape 3 : Coaching et suivi</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Séances encadrées par un coach diplômé</li>
                        <li><i class="fas fa-check"></i> Conseils nutritionnels de base</li>
                        <li><i class="fas fa-check"></i> Motivation et accompagnement régulier</li>
                        <li><i class="fas fa-check"></i> Ajustements en temps réel</li>
                    </ul>
                </div>
            </div>

            <div class="timeline-item animate-scroll">
                <div class="timeline-dot"><i class="fas fa-chart-bar"></i></div>
                <div class="timeline-content">
                    <h4><i class="fas fa-trophy"></i> Étape 4 : Évaluation des progrès</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Mesure régulière des performances</li>
                        <li><i class="fas fa-check"></i> Ajustement du programme selon les résultats</li>
                        <li><i class="fas fa-check"></i> Célébration des milestones atteints</li>
                        <li><i class="fas fa-check"></i> Définition de nouveaux objectifs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     RÉSULTATS ATTENDUS
     ============================================ -->
<section class="resultats-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-green">Résultats</div>
            <h2 class="section-title-big">Les <span style="color: var(--green);">résultats</span> que vous obtiendrez</h2>
            <p class="section-subtitle">Des transformations concrètes et mesurables pour votre corps et votre esprit.</p>
        </div>

        <div class="resultats-grid stagger-container">
            <div class="resultat-card stagger-item">
                <div class="resultat-icon"><i class="fas fa-weight"></i></div>
                <h4>Perte de poids durable</h4>
                <p>Atteignez et maintenez votre poids idéal grâce à un programme équilibré.</p>
            </div>
            <div class="resultat-card stagger-item animate-delay-1">
                <div class="resultat-icon"><i class="fas fa-heartbeat"></i></div>
                <h4>Amélioration de la condition physique</h4>
                <p>Retrouvez votre vitalité et votre endurance au quotidien.</p>
            </div>
            <div class="resultat-card stagger-item animate-delay-2">
                <div class="resultat-icon"><i class="fas fa-dumbbell"></i></div>
                <h4>Développement musculaire</h4>
                <p>Gagnez en force et en tonicité de manière ciblée.</p>
            </div>
            <div class="resultat-card stagger-item animate-delay-3">
                <div class="resultat-icon"><i class="fas fa-wind"></i></div>
                <h4>Augmentation de l'endurance</h4>
                <p>Tenez plus longtemps et récupérez plus vite.</p>
            </div>
            <div class="resultat-card stagger-item">
                <div class="resultat-icon"><i class="fas fa-spa"></i></div>
                <h4>Réduction du stress</h4>
                <p>Libérez les tensions et améliorez votre bien-être mental.</p>
            </div>
            <div class="resultat-card stagger-item animate-delay-1">
                <div class="resultat-icon"><i class="fas fa-user-check"></i></div>
                <h4>Amélioration de la posture</h4>
                <p>Corrigez vos défauts de posture et prévenez les douleurs.</p>
            </div>
            <div class="resultat-card stagger-item animate-delay-2">
                <div class="resultat-icon"><i class="fas fa-smile"></i></div>
                <h4>Renforcement de la confiance en soi</h4>
                <p>Sentez-vous bien dans votre corps et dans votre tête.</p>
            </div>
            <div class="resultat-card stagger-item animate-delay-3">
                <div class="resultat-icon"><i class="fas fa-seedling"></i></div>
                <h4>Adoption d'un mode de vie sain</h4>
                <p>Intégrez durablement le sport dans votre quotidien.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     TÉMOIGNAGES
     ============================================ -->
<section class="temoignages-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Témoignages</div>
            <h2 class="section-title-big">Ce que disent nos <span style="color: var(--orange);">clients</span></h2>
            <p class="section-subtitle">Des retours d'expérience authentiques de nos sportifs accompagnés.</p>
        </div>

        <div class="temoignages-grid stagger-container">
            <div class="temoignage-card stagger-item">
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="temoignage-text">"Grâce à l'accompagnement de mon coach, j'ai perdu 12 kg en 5 mois. Les séances à domicile sont pratiques et les résultats sont impressionnants."</p>
                <div class="temoignage-author">
                    <div class="temoignage-avatar">MK</div>
                    <div class="temoignage-info">
                        <h5>Marie K.</h5>
                        <span>42 ans – Perte de poids</span>
                    </div>
                </div>
            </div>
            <div class="temoignage-card stagger-item animate-delay-1">
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="temoignage-text">"Je n'avais pas le temps d'aller en salle de sport. Avec ce coaching personnalisé, j'ai retrouvé une excellente condition physique en quelques mois."</p>
                <div class="temoignage-author">
                    <div class="temoignage-avatar">SD</div>
                    <div class="temoignage-info">
                        <h5>Serge D.</h5>
                        <span>38 ans – Remise en forme</span>
                    </div>
                </div>
            </div>
            <div class="temoignage-card stagger-item animate-delay-2">
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="temoignage-text">"Le programme était parfaitement adapté à ma situation. J'ai retrouvé ma forme et ma confiance plus rapidement que prévu."</p>
                <div class="temoignage-author">
                    <div class="temoignage-avatar">AT</div>
                    <div class="temoignage-info">
                        <h5>Aïcha T.</h5>
                        <span>35 ans – Coaching post-grossesse</span>
                    </div>
                </div>
            </div>
            <div class="temoignage-card stagger-item">
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="temoignage-text">"Un coach professionnel, motivant et à l'écoute. Les progrès sont visibles dès les premières semaines."</p>
                <div class="temoignage-author">
                    <div class="temoignage-avatar">JB</div>
                    <div class="temoignage-info">
                        <h5>Jean-Marc B.</h5>
                        <span>47 ans – Renforcement musculaire</span>
                    </div>
                </div>
            </div>
            <div class="temoignage-card stagger-item animate-delay-1">
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="temoignage-text">"Mes douleurs lombaires ont considérablement diminué grâce aux exercices ciblés. Je recommande vivement."</p>
                <div class="temoignage-author">
                    <div class="temoignage-avatar">CN</div>
                    <div class="temoignage-info">
                        <h5>Clarisse N.</h5>
                        <span>51 ans – Bien-être et santé</span>
                    </div>
                </div>
            </div>
            <div class="temoignage-card stagger-item animate-delay-2">
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="temoignage-text">"Excellent accompagnement avant ma compétition. J'ai amélioré mon endurance et mes performances significativement."</p>
                <div class="temoignage-author">
                    <div class="temoignage-avatar">KA</div>
                    <div class="temoignage-info">
                        <h5>Karim A.</h5>
                        <span>29 ans – Préparation physique</span>
                    </div>
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
            <div class="section-label-green">Tarifs</div>
            <h2 class="section-title-big">Nos <span style="color: var(--green);">tarifs</span> de coaching</h2>
            <p class="section-subtitle">Des formules adaptées à votre budget et à vos objectifs sportifs.</p>
        </div>

        <div class="tarifs-grid stagger-container">
            <!-- Tarif 1 -->
            <div class="tarif-card stagger-item">
                <div class="tarif-header">
                    <div class="tarif-icon"><i class="fas fa-user"></i></div>
                    <h3>Coaching Individuel</h3>
                    <p>Accompagnement personnalisé en face-à-face</p>
                    <div class="tarif-prix">25 000 <span>FCFA / séance</span></div>
                </div>
                <div class="tarif-body">
                    <ul class="tarif-features">
                        <li><i class="fas fa-check"></i> Programme 100% personnalisé</li>
                        <li><i class="fas fa-check"></i> Bilan initial inclus</li>
                        <li><i class="fas fa-check"></i> Encadrement professionnel</li>
                        <li><i class="fas fa-check"></i> Suivi des progrès</li>
                        <li><i class="fas fa-check"></i> Conseils pratiques</li>
                        <li><i class="fas fa-check"></i> Assistance entre les séances</li>
                        <li><i class="fas fa-check"></i> À domicile ou extérieur</li>
                    </ul>
                    <button class="tarif-btn" onclick="openInscriptionModal('Coaching Individuel', '25000', 'Par séance')">
                        Je m'inscris <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Tarif 2 - POPULAIRE -->
            <div class="tarif-card popular stagger-item animate-delay-1">
                <div class="popular-badge"><i class="fas fa-star"></i> Le plus demandé</div>
                <div class="tarif-header">
                    <div class="tarif-icon"><i class="fas fa-calendar-alt"></i></div>
                    <h3>Forfait Mensuel</h3>
                    <p>8 séances personnalisées par mois</p>
                    <div class="tarif-prix">180 000 <span>FCFA / mois</span></div>
                </div>
                <div class="tarif-body">
                    <ul class="tarif-features">
                        <li><i class="fas fa-check"></i> 8 séances d'1h ou 1h30</li>
                        <li><i class="fas fa-check"></i> Bilan initial et suivi continu</li>
                        <li><i class="fas fa-check"></i> Programme évolutif mensuel</li>
                        <li><i class="fas fa-check"></i> Conseils nutritionnels</li>
                        <li><i class="fas fa-check"></i> Suivi des progrès détaillé</li>
                        <li><i class="fas fa-check"></i> Assistance entre les séances</li>
                        <li><i class="fas fa-check"></i> À domicile ou extérieur</li>
                        <li><i class="fas fa-check"></i> Économie par rapport au tarif unitaire</li>
                    </ul>
                    <button class="tarif-btn" onclick="openInscriptionModal('Forfait Mensuel - 8 séances', '180000', '8 séances / mois')">
                        Je m'inscris <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Tarif 3 -->
            <div class="tarif-card stagger-item animate-delay-2">
                <div class="tarif-header">
                    <div class="tarif-icon"><i class="fas fa-fire"></i></div>
                    <h3>Forfait Intensif</h3>
                    <p>12 séances pour des résultats rapides</p>
                    <div class="tarif-prix">250 000 <span>FCFA</span></div>
                </div>
                <div class="tarif-body">
                    <ul class="tarif-features">
                        <li><i class="fas fa-check"></i> 12 séances personnalisées</li>
                        <li><i class="fas fa-check"></i> Bilan initial approfondi</li>
                        <li><i class="fas fa-check"></i> Programme intensif sur mesure</li>
                        <li><i class="fas fa-check"></i> Conseils nutritionnels complets</li>
                        <li><i class="fas fa-check"></i> Suivi hebdomadaire des progrès</li>
                        <li><i class="fas fa-check"></i> Support prioritaire 7j/7</li>
                        <li><i class="fas fa-check"></i> À domicile ou extérieur</li>
                        <li><i class="fas fa-check"></i> Meilleur rapport qualité-prix</li>
                    </ul>
                    <button class="tarif-btn" onclick="openInscriptionModal('Forfait Intensif - 12 séances', '250000', '12 séances')">
                        Je m'inscris <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="text-center mt-5 animate-scroll">
            <div class="intro-highlight" style="display: inline-flex;">
                <i class="fas fa-map-marker-alt"></i>
                <span><strong>Lieu :</strong> À domicile, en extérieur, en entreprise ou en ligne &nbsp;|&nbsp; <strong>Durée :</strong> 1h ou 1h30 par séance</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     OFFRE SPÉCIALE
     ============================================ -->
<section class="offre-section section-padding">
    <div class="container">
        <div class="animate-scroll">
            <div class="offre-badge"><i class="fas fa-gift"></i> Offre de bienvenue</div>
            <h2>Première séance d'évaluation et de découverte offerte !</h2>
            <p>Profitez d'une séance gratuite pour découvrir notre méthode et définir ensemble vos objectifs.</p>
            <div class="offre-prix">0 <span>FCFA</span></div>
            <div class="cta-buttons mt-4">
                <button class="btn-cta-orange" onclick="openInscriptionModal('Séance découverte OFFERTE', '0', 'Séance d\'évaluation gratuite')">
                    <i class="fas fa-calendar-check"></i> Réserver ma séance gratuite
                </button>
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
            <div class="section-label-orange">Pourquoi nous ?</div>
            <h2 class="section-title-big">Les atouts de <span style="color: var(--orange);">MONPROFCHEZMOI</span></h2>
            <p class="section-subtitle">Nous mettons tout en œuvre pour garantir votre réussite sportive et votre bien-être.</p>
        </div>

        <div class="pourquoi-grid">
            <div class="pourquoi-card animate-scroll animate-delay-1">
                <div class="pourquoi-icon"><i class="fas fa-certificate"></i></div>
                <h4>Coachs diplômés et expérimentés</h4>
                <p>Des professionnels certifiés avec une solide expérience dans l'accompagnement sportif personnalisé.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-2">
                <div class="pourquoi-icon"><i class="fas fa-user-cog"></i></div>
                <h4>Programme adapté à chaque participant</h4>
                <p>Aucun programme standardisé : chaque séance est conçue spécifiquement pour vous et vos objectifs.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-3">
                <div class="pourquoi-icon"><i class="fas fa-chart-line"></i></div>
                <h4>Suivi régulier des performances</h4>
                <p>Mesures, évaluations et ajustements continus pour optimiser votre progression.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-1">
                <div class="pourquoi-icon"><i class="fas fa-lightbulb"></i></div>
                <h4>Conseils personnalisés</h4>
                <p>Des recommandations nutritionnelles et lifestyle pour maximiser l'efficacité de votre entraînement.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-2">
                <div class="pourquoi-icon"><i class="fas fa-heart"></i></div>
                <h4>Respect du rythme de progression</h4>
                <p>Une approche progressive qui protège votre corps et prévient les blessures.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-3">
                <div class="pourquoi-icon"><i class="fas fa-lock"></i></div>
                <h4>Confidentialité et professionnalisme</h4>
                <p>Un cadre sécurisé et respectueux pour pratiquer en toute sérénité.</p>
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
            <h2 class="section-title-big">Prenez soin de votre santé et atteignez vos objectifs avec un accompagnement <span style="color: var(--orange);">professionnel</span></h2>
            <p class="section-subtitle">Places limitées chaque mois. Réservez votre séance dès maintenant et commencez votre transformation.</p>
            <div class="cta-buttons">
                <button class="btn-cta-orange" onclick="openInscriptionModal('Coaching Sportif - Première réservation', '25000', 'Séance de 1h')">
                    <i class="fas fa-calendar-check"></i> Réserver ma séance
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
                        <label>Nom et Prénoms *</label>
                        <input type="text" name="nom" required placeholder="Ex: KOUAME Jean">
                    </div>
                    <div class="form-group">
                        <label>Téléphone *</label>
                        <input type="tel" name="telephone" required placeholder="Ex: 01 53 75 15 44">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" required placeholder="Ex: contact@email.com">
                    </div>
                    <div class="form-group">
                        <label>Ville / Commune *</label>
                        <input type="text" name="ville" required placeholder="Ex: Cocody, Abidjan">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Objectif sportif *</label>
                        <select name="objectif" required>
                            <option value="">Choisir...</option>
                            <option value="perte_poids">Perte de poids</option>
                            <option value="remise_forme">Remise en forme</option>
                            <option value="renforcement">Renforcement musculaire</option>
                            <option value="prise_masse">Prise de masse</option>
                            <option value="cardio">Cardio-training</option>
                            <option value="hiit">HIIT</option>
                            <option value="gym_douce">Gym douce / Pilates</option>
                            <option value="caf">Cuisses-Abdos-Fessiers</option>
                            <option value="post_grossesse">Coaching post-grossesse</option>
                            <option value="reeducation">Rééducation sportive</option>
                            <option value="competition">Préparation compétition</option>
                            <option value="combat">Sports de combat</option>
                            <option value="bien_etre">Santé et bien-être</option>
                            <option value="seniors">Programme seniors</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Âge</label>
                        <input type="number" name="age" placeholder="Ex: 35" min="18" max="99">
                    </div>
                </div>
                <div class="form-group">
                    <label>Message (facultatif)</label>
                    <textarea name="message" rows="3" placeholder="Décrivez vos besoins spécifiques..."></textarea>
                </div>
            </div>

            <!-- Formule choisie -->
            <div class="modal-section">
                <h4><i class="fas fa-bullseye"></i> Formule choisie</h4>
                <div class="form-group">
                    <label>Formule *</label>
                    <input type="text" name="formule" id="modalActivite" readonly>
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
                            <label class="radio-label"><input type="radio" name="lieu" value="exterieur"> <span>Extérieur</span></label>
                            <label class="radio-label"><input type="radio" name="lieu" value="entreprise"> <span>En entreprise</span></label>
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
                        <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Dimanche"> <span>Dimanche</span></label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Horaire préféré</label>
                    <input type="text" name="horaire" placeholder="Ex: 06h00 - 08h00 ou 18h00 - 20h00">
                </div>
                <div class="form-group">
                    <label>Fréquence souhaitée</label>
                    <div class="radio-group">
                        <label class="radio-label"><input type="radio" name="frequence" value="1" checked> <span>1x / semaine</span></label>
                        <label class="radio-label"><input type="radio" name="frequence" value="2"> <span>2x / semaine</span></label>
                        <label class="radio-label"><input type="radio" name="frequence" value="3"> <span>3x / semaine</span></label>
                        <label class="radio-label"><input type="radio" name="frequence" value="4"> <span>4x / semaine</span></label>
                    </div>
                </div>
            </div>

            <!-- Conditions -->
            <div class="modal-section">
                <div class="form-group">
                    <label class="checkbox-frais" style="cursor: pointer;">
                        <input type="checkbox" name="conditions" required>
                        <span>J'accepte les conditions d'inscription *</span>
                    </label>
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
    const parentName = document.querySelector('input[name="nom"]')?.value || '';
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

<!-- Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chatbot Widget -->
@include('components.chatbot')

<!-- Newsletter Popup -->
@include('components.newsletter-popup')

</body>
</html>
