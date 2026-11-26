<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Orientation Supérieur - Monprofchezmoi-ci.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Orientation Supérieur, Projet Professionnel, Réorientation, Études, Côte d'Ivoire, Abidjan" name="keywords">
    <meta content="Accompagnement personnalisé pour les étudiants : orientation, réorientation et construction de projet professionnel à Abidjan." name="description">

    <link href="/asset/img/favicon.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/asset/css/courscss/bootstrap.min.css" rel="stylesheet">
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
   PAGE HERO - ORIENTATION SUPÉRIEUR
   ============================================ */
.page-hero-orientation {
    min-height: 70vh;
    background: linear-gradient(135deg, var(--blue) 0%, #1a1a3e 30%, #0f3460 70%, var(--teal) 100%);
    position: relative; overflow: hidden;
    display: flex; align-items: center; padding: 80px 0;
}
.page-hero-orientation::before {
    content: ''; position: absolute;
    top: -20%; right: -10%; width: 600px; height: 600px;
    background: radial-gradient(circle, rgba(20,184,166,0.12), transparent 70%);
    border-radius: 50%;
    animation: float-hero 8s ease-in-out infinite;
}
.page-hero-orientation::after {
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
.particle:nth-child(2) { left: 25%; top: 55%; animation-delay: 2s; width: 6px; height: 6px; background: rgba(20,184,166,0.25); }
.particle:nth-child(3) { left: 60%; top: 25%; animation-delay: 4s; }
.particle:nth-child(4) { left: 80%; top: 65%; animation-delay: 6s; width: 5px; height: 5px; background: rgba(124,58,237,0.2); }
.particle:nth-child(5) { left: 45%; top: 80%; animation-delay: 8s; }
.particle:nth-child(6) { left: 15%; top: 40%; animation-delay: 10s; width: 3px; height: 3px; background: rgba(255,107,53,0.35); }
.particle:nth-child(7) { left: 70%; top: 10%; animation-delay: 12s; width: 4px; height: 4px; background: rgba(20,184,166,0.3); }
.particle:nth-child(8) { left: 35%; top: 75%; animation-delay: 14s; width: 5px; height: 5px; background: rgba(124,58,237,0.25); }
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

/* Hero Right - Visual */
.hero-visual-wrapper {
    position: relative; display: flex; justify-content: center; align-items: center;
    min-height: 400px;
}
.hero-visual-circle {
    width: 320px; height: 320px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(20,184,166,0.1), rgba(124,58,237,0.1));
    border: 2px solid rgba(255,255,255,0.08);
    display: flex; align-items: center; justify-content: center;
    position: relative;
    animation: pulse-circle 4s ease-in-out infinite;
}
@keyframes pulse-circle {
    0%, 100% { transform: scale(1); box-shadow: 0 0 40px rgba(20,184,166,0.1); }
    50% { transform: scale(1.03); box-shadow: 0 0 60px rgba(20,184,166,0.2); }
}
.hero-visual-inner {
    width: 240px; height: 240px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(255,107,53,0.15), rgba(20,184,166,0.15));
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
.orbit-2 i { background: var(--purple); }
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
    border-color: var(--teal);
}
.public-card i {
    width: 44px; height: 44px; min-width: 44px;
    border-radius: 12px; background: linear-gradient(135deg, var(--teal), var(--teal-light));
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
   PROGRAMME - TIMELINE STYLE
   ============================================ */
.programme-section { background: var(--cream); }
.timeline-container {
    position: relative; max-width: 900px; margin: 0 auto;
}
.timeline-line {
    position: absolute; left: 30px; top: 0; bottom: 0;
    width: 3px;
    background: linear-gradient(to bottom, var(--teal), var(--purple), var(--orange));
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
    background: linear-gradient(135deg, var(--teal), var(--teal-light));
    display: flex; align-items: center; justify-content: center;
    color: white; font-size: 1.3rem; font-weight: 800;
    box-shadow: 0 4px 20px rgba(20,184,166,0.3);
    position: relative; z-index: 2;
    transition: all 0.4s ease;
}
.timeline-item:hover .timeline-dot {
    transform: scale(1.1) rotate(10deg);
    box-shadow: 0 8px 30px rgba(20,184,166,0.4);
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
    border-color: var(--teal);
}
.timeline-content h4 {
    font-size: 1.15rem; font-weight: 800; color: var(--blue);
    margin-bottom: 12px; display: flex; align-items: center; gap: 10px;
}
.timeline-content h4 i { color: var(--teal); }
.timeline-content ul {
    list-style: none; padding: 0; margin: 0;
}
.timeline-content ul li {
    display: flex; align-items: flex-start; gap: 10px;
    padding: 6px 0; font-size: 0.92rem;
    color: var(--gray-600);
}
.timeline-content ul li i {
    color: var(--teal); font-size: 0.85rem;
    margin-top: 4px; min-width: 16px;
}

@media (max-width: 767px) {
    .timeline-line { left: 20px; }
    .timeline-dot { width: 44px; height: 44px; min-width: 44px; font-size: 1rem; }
    .timeline-item { gap: 16px; }
    .timeline-content { padding: 20px; }
}

/* ============================================
   OBJECTIFS - CHECK CARDS
   ============================================ */
.objectifs-section { background: var(--white); }
.objectifs-grid {
    display: grid; grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}
.objectif-card {
    background: var(--white); border-radius: 16px;
    padding: 28px; border: 1px solid var(--gray-100);
    transition: all 0.4s ease;
    position: relative; overflow: hidden;
}
.objectif-card::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--teal), var(--purple));
    border-radius: 16px 16px 0 0;
    transform: scaleX(0);
    transition: transform 0.4s ease;
}
.objectif-card:hover::before {
    transform: scaleX(1);
}
.objectif-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.objectif-icon {
    width: 56px; height: 56px; border-radius: 14px;
    background: linear-gradient(135deg, rgba(20,184,166,0.1), rgba(20,184,166,0.05));
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 16px; font-size: 1.4rem; color: var(--teal);
    transition: all 0.4s ease;
}
.objectif-card:hover .objectif-icon {
    background: linear-gradient(135deg, var(--teal), var(--teal-light));
    color: white; transform: scale(1.1) rotate(-5deg);
    box-shadow: 0 8px 24px rgba(20,184,166,0.3);
}
.objectif-card h4 {
    font-size: 1.05rem; font-weight: 700; color: var(--blue);
    margin-bottom: 8px;
}
.objectif-card p {
    font-size: 0.9rem; color: var(--gray-600);
    line-height: 1.6; margin: 0;
}

@media (max-width: 991px) {
    .objectifs-grid { grid-template-columns: 1fr; }
}

/* ============================================
   FORMULES - PRICING CARDS
   ============================================ */
.formules-section { background: var(--cream); }
.formules-grid {
    display: grid; grid-template-columns: repeat(3, 1fr);
    gap: 30px; align-items: stretch;
}
.formule-card {
    background: var(--white); border-radius: 24px;
    overflow: hidden; border: 1px solid var(--gray-100);
    transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    display: flex; flex-direction: column;
}
.formule-card:hover {
    transform: translateY(-12px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.formule-card.popular {
    border: 2px solid var(--teal);
    transform: scale(1.02);
}
.formule-card.popular:hover {
    transform: scale(1.02) translateY(-12px);
}
.popular-badge {
    position: absolute; top: 0; left: 50%; transform: translateX(-50%);
    background: linear-gradient(135deg, var(--teal), var(--teal-light));
    color: white; padding: 8px 24px;
    border-radius: 0 0 16px 16px;
    font-size: 0.8rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: 1px;
    box-shadow: 0 4px 16px rgba(20,184,166,0.3);
}
.formule-header {
    padding: 40px 30px 24px; text-align: center;
    background: linear-gradient(135deg, var(--gray-50), var(--white));
}
.formule-card.popular .formule-header {
    background: linear-gradient(135deg, rgba(20,184,166,0.05), rgba(20,184,166,0.02));
}
.formule-icon {
    width: 70px; height: 70px; border-radius: 20px;
    background: linear-gradient(135deg, var(--teal), var(--teal-light));
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 16px; font-size: 1.8rem; color: white;
    box-shadow: 0 8px 24px rgba(20,184,166,0.3);
}
.formule-card.popular .formule-icon {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    box-shadow: 0 8px 24px rgba(255,107,53,0.3);
}
.formule-header h3 {
    font-size: 1.3rem; font-weight: 800; color: var(--blue);
    margin-bottom: 4px;
}
.formule-header p {
    font-size: 0.85rem; color: var(--gray-600); margin: 0;
}
.formule-prix {
    font-size: 2.2rem; font-weight: 800; color: var(--teal);
    margin: 16px 0 0;
}
.formule-card.popular .formule-prix { color: var(--orange); }
.formule-prix span {
    font-size: 0.9rem; font-weight: 600; color: var(--gray-400);
}
.formule-body {
    padding: 24px 30px; flex: 1;
    display: flex; flex-direction: column;
}
.formule-features {
    list-style: none; padding: 0; margin: 0 0 24px 0; flex: 1;
}
.formule-features li {
    display: flex; align-items: flex-start; gap: 10px;
    padding: 10px 0; font-size: 0.92rem;
    color: var(--gray-800); border-bottom: 1px solid var(--gray-100);
}
.formule-features li:last-child { border-bottom: none; }
.formule-features li i {
    color: var(--teal); font-size: 0.9rem;
    margin-top: 3px; min-width: 18px;
}
.formule-card.popular .formule-features li i { color: var(--orange); }
.formule-btn {
    width: 100%; padding: 14px 24px;
    border-radius: 12px; font-weight: 700; font-size: 0.95rem;
    text-decoration: none; display: inline-flex;
    align-items: center; justify-content: center; gap: 10px;
    transition: all 0.3s ease; background: var(--teal);
    color: white; border: none; cursor: pointer;
}
.formule-btn:hover {
    background: #0D9488; transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(20,184,166,0.4); color: white;
}
.formule-card.popular .formule-btn {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    box-shadow: var(--shadow-orange);
}
.formule-card.popular .formule-btn:hover {
    background: linear-gradient(135deg, var(--orange-dark), var(--orange));
    box-shadow: 0 12px 32px rgba(255,107,53,0.4);
}

@media (max-width: 991px) {
    .formules-grid { grid-template-columns: 1fr; max-width: 500px; margin: 0 auto; }
    .formule-card.popular { transform: none; }
    .formule-card.popular:hover { transform: translateY(-12px); }
}

/* ============================================
   OUTILS SECTION
   ============================================ */
.outils-section { background: var(--white); }
.outils-grid {
    display: grid; grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}
.outil-card {
    background: var(--white); border-radius: 16px;
    padding: 28px; border: 1px solid var(--gray-100);
    text-align: center; transition: all 0.4s ease;
}
.outil-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-md);
    border-color: var(--purple);
}
.outil-icon {
    width: 60px; height: 60px; border-radius: 16px;
    background: linear-gradient(135deg, rgba(124,58,237,0.1), rgba(124,58,237,0.05));
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 16px; font-size: 1.5rem; color: var(--purple);
    transition: all 0.4s ease;
}
.outil-card:hover .outil-icon {
    background: linear-gradient(135deg, var(--purple), var(--purple-light));
    color: white; transform: scale(1.1);
    box-shadow: 0 8px 24px rgba(124,58,237,0.3);
}
.outil-card h4 {
    font-size: 1rem; font-weight: 700; color: var(--blue);
    margin-bottom: 8px;
}
.outil-card p {
    font-size: 0.88rem; color: var(--gray-600); margin: 0;
}

@media (max-width: 767px) {
    .outils-grid { grid-template-columns: 1fr; }
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
    background: radial-gradient(circle, rgba(20,184,166,0.15), transparent 70%);
    border-radius: 50%;
}
.stats-grid {
    display: grid; grid-template-columns: repeat(4, 1fr);
    gap: 30px; text-align: center;
}
.stat-item { color: white; }
.stat-number {
    font-size: 2.5rem; font-weight: 800; color: var(--teal-light);
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
    background: linear-gradient(135deg, rgba(20,184,166,0.1), rgba(20,184,166,0.05));
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px; font-size: 1.8rem; color: var(--teal);
    transition: all 0.4s ease;
}
.pourquoi-card:hover .pourquoi-icon {
    background: linear-gradient(135deg, var(--teal), var(--teal-light));
    color: white; transform: scale(1.1) rotate(-5deg);
    box-shadow: 0 8px 32px rgba(20,184,166,0.3);
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
    background: radial-gradient(circle, rgba(20,184,166,0.15), transparent 70%);
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
    .page-hero-orientation { min-height: 50vh; padding: 60px 0; }
}
</style>

<body>
@include('partials.header')


<!-- ============================================
     PAGE HERO - ORIENTATION SUPÉRIEUR
     ============================================ -->
<section class="page-hero-orientation">
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
                <div class="page-hero-label"><i class="fas fa-compass"></i> Orientation Supérieur</div>
                <h1 class="page-hero-title">Construire son <span class="highlight-orange">projet professionnel</span> et réussir ses choix d'<span class="highlight-teal">études</span></h1>
                <p class="page-hero-subtitle">L'enseignement supérieur est une période de spécialisation et de découverte. MONPROFCHEZMOI accompagne les étudiants dans leurs choix académiques et professionnels pour bâtir un avenir cohérent et ambitieux.</p>
                <div class="page-hero-badges">
                    <div class="page-hero-badge"><i class="fas fa-user-graduate"></i> Licence</div>
                    <div class="page-hero-badge"><i class="fas fa-award"></i> Master</div>
                    <div class="page-hero-badge"><i class="fas fa-building"></i> Grandes écoles</div>
                    <div class="page-hero-badge"><i class="fas fa-sync-alt"></i> Réorientation</div>
                    <div class="page-hero-badge"><i class="fas fa-briefcase"></i> Insertion pro</div>
                    <div class="page-hero-badge"><i class="fas fa-briefcase"></i> Terminal</div>
                </div>
            </div>
            <div class="hero-visual-wrapper animate-slide-right">
                <div class="hero-visual-circle">
                    <div class="hero-visual-inner">
                        <i class="fas fa-compass hero-visual-icon"></i>
                    </div>
                </div>
                <div class="orbit-element orbit-1">
                    <i class="fas fa-route"></i>
                    <div>
                        <strong style="font-size: 0.85rem;">Projet pro</strong>
                    </div>
                </div>
                <div class="orbit-element orbit-2">
                    <i class="fas fa-graduation-cap"></i>
                    <div>
                        <strong style="font-size: 0.85rem;">Spécialisation</strong>
                    </div>
                </div>
                <div class="orbit-element orbit-3">
                    <i class="fas fa-chart-line"></i>
                    <div>
                        <strong style="font-size: 0.85rem;">Carrière</strong>
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
        <a href="{{ url('/particuliers/formations') }}">Formations</a>
        <i class="fas fa-chevron-right"></i>
        <span class="current">Orientation Supérieur</span>
    </div>
</div>

<!-- ============================================
     INTRODUCTION + PUBLIC CONCERNÉ
     ============================================ -->
<section class="intro-section section-padding">
    <div class="container">
        <div class="intro-content animate-scroll">
            <div class="section-label-teal">Présentation</div>
            <h2 class="section-title-big">Développer son <span style="color: var(--teal);">projet professionnel</span> avec confiance</h2>
            <p class="intro-text">
                L'enseignement supérieur est une période de <strong>spécialisation, de découverte et de préparation à l'insertion professionnelle</strong>. Pourtant, de nombreux étudiants hésitent sur leur parcours, envisagent une réorientation ou souhaitent mieux préparer leur avenir.
            </p>
            <p class="intro-text">
                <strong>MONPROFCHEZMOI</strong> accompagne les étudiants dans leurs choix académiques et professionnels afin de les aider à construire un projet <strong>cohérent, réaliste et adapté à leurs ambitions</strong>.
            </p>
            <div class="intro-highlight animate-scroll">
                <i class="fas fa-star"></i> Un accompagnement personnalisé pour tous les niveaux d'études supérieures
            </div>

            <div class="public-grid stagger-container">
                <div class="public-card stagger-item">
                    <i class="fas fa-certificate"></i>
                    <span>BTS</span>
                </div>
                <div class="public-card stagger-item">
                    <i class="fas fa-university"></i>
                    <span>DUT / BUT</span>
                </div>
                <div class="public-card stagger-item">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Licence</span>
                </div>
                <div class="public-card stagger-item">
                    <i class="fas fa-award"></i>
                    <span>Master</span>
                </div>
                <div class="public-card stagger-item">
                    <i class="fas fa-building"></i>
                    <span>Grandes écoles</span>
                </div>
                <div class="public-card stagger-item">
                    <i class="fas fa-school"></i>
                    <span>Écoles spécialisées</span>
                </div>
                <div class="public-card stagger-item">
                    <i class="fas fa-sync-alt"></i>
                    <span>Étudiants en réorientation</span>
                </div>
                <div class="public-card stagger-item">
                    <i class="fas fa-user-check"></i>
                    <span>Terminal</span>
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
                <span class="stat-number counter" data-target="5">0</span>
                <span class="stat-label">Modules du programme</span>
            </div>
            <div class="stat-item animate-scale animate-delay-2">
                <span class="stat-number counter" data-target="90">0</span>
                <span class="stat-label">Minutes par séance</span>
            </div>
            <div class="stat-item animate-scale animate-delay-3">
                <span class="stat-number counter" data-target="3">0</span>
                <span class="stat-label">Formules disponibles</span>
            </div>
            <div class="stat-item animate-scale animate-delay-4">
                <span class="stat-number counter" data-target="100">0</span>
                <span class="stat-label">% Personnalisé</span>
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
            <h2 class="section-title-big">Ce que vous <span style="color: var(--teal);">accomplirez</span></h2>
            <p class="section-subtitle">Cet accompagnement permet à l'étudiant de développer ses compétences et de clarifier son parcours.</p>
        </div>

        <div class="objectifs-grid stagger-container">
            <div class="objectif-card stagger-item animate-delay-1">
                <div class="objectif-icon"><i class="fas fa-clipboard-check"></i></div>
                <h4>Faire le point sur son parcours</h4>
                <p>Analyse complète du parcours académique et identification des forces.</p>
            </div>
            <div class="objectif-card stagger-item animate-delay-2">
                <div class="objectif-icon"><i class="fas fa-search"></i></div>
                <h4>Identifier ses compétences</h4>
                <p>Découverte des centres d'intérêt et des compétences clés.</p>
            </div>
            <div class="objectif-card stagger-item animate-delay-3">
                <div class="objectif-icon"><i class="fas fa-bullseye"></i></div>
                <h4>Définir un projet réaliste</h4>
                <p>Construction d'un projet professionnel adapté au profil de l'étudiant.</p>
            </div>
            <div class="objectif-card stagger-item animate-delay-1">
                <div class="objectif-icon"><i class="fas fa-route"></i></div>
                <h4>Choisir une spécialisation</h4>
                <p>Sélection de la filière ou du master le plus pertinent.</p>
            </div>
            <div class="objectif-card stagger-item animate-delay-2">
                <div class="objectif-icon"><i class="fas fa-exchange-alt"></i></div>
                <h4>Préparer une réorientation</h4>
                <p>Accompagnement dans le changement de parcours si nécessaire.</p>
            </div>
            <div class="objectif-card stagger-item animate-delay-3">
                <div class="objectif-icon"><i class="fas fa-chart-line"></i></div>
                <h4>Développer l'employabilité</h4>
                <p>Stratégie de carrière et préparation à l'insertion professionnelle.</p>
            </div>
            <div class="objectif-card stagger-item animate-delay-1">
                <div class="objectif-icon"><i class="fas fa-brain"></i></div>
                <h4>Mieux comprendre son profil</h4>
                <p>Auto-évaluation et connaissance approfondie de ses potentialités.</p>
            </div>
            <div class="objectif-card stagger-item animate-delay-2">
                <div class="objectif-icon"><i class="fas fa-handshake"></i></div>
                <h4>Prendre des décisions sereines</h4>
                <p>Confiance et sérénité dans les choix d'orientation.</p>
            </div>
            <div class="objectif-card stagger-item animate-delay-3">
                <div class="objectif-icon"><i class="fas fa-trophy"></i></div>
                <h4>Construire sa feuille de route</h4>
                <p>Plan d'action concret pour atteindre ses objectifs professionnels.</p>
            </div>
        </div>
    </div>
</section>
<!-- ============================================
     FORMULES & TARIFS
     ============================================ -->
<section class="formules-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-teal">Tarifs</div>
            <h2 class="section-title-big">Nos <span style="color: var(--teal);">formules</span> d'accompagnement</h2>
            <p class="section-subtitle">Choisissez la formule qui correspond le mieux à vos besoins.</p>
        </div>

        <div class="formules-grid stagger-container">
            <!-- Formule 1 -->
            <div class="formule-card stagger-item">
                <div class="formule-header">
                    <div class="formule-icon"><i class="fas fa-clipboard-check"></i></div>
                    <h3>Pack Orientation Supérieur</h3>
                    <p>4 séances d'accompagnement complet</p>
                    <div class="formule-prix">80 000 <span>FCFA</span></div>
                </div>
                <div class="formule-body">
                    <ul class="formule-features">
                        <li><i class="fas fa-check"></i> Bilan du parcours académique</li>
                        <li><i class="fas fa-check"></i> Analyse du projet professionnel</li>
                        <li><i class="fas fa-check"></i> Étude des formations et spécialisations</li>
                        <li><i class="fas fa-check"></i> Construction du plan d'orientation</li>
                        <li><i class="fas fa-check"></i> Synthèse personnalisée</li>
                    </ul>
                    <button class="formule-btn" onclick="openInscriptionModal('Pack Orientation Supérieur - 4 séances', '80000', '4 séances (1h30 chacune)')">
                        Choisir cette formule <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Formule 2 - POPULAIRE -->
            <div class="formule-card popular stagger-item animate-delay-1">
                <div class="popular-badge"><i class="fas fa-star"></i> Le plus complet</div>
                <div class="formule-header">
                    <div class="formule-icon"><i class="fas fa-sync-alt"></i></div>
                    <h3>Réorientation Supérieur</h3>
                    <p>6 séances pour un changement de cap réussi</p>
                    <div class="formule-prix">130 000 <span>FCFA</span></div>
                </div>
                <div class="formule-body">
                    <ul class="formule-features">
                        <li><i class="fas fa-check"></i> Analyse approfondie du parcours</li>
                        <li><i class="fas fa-check"></i> Identification des nouvelles pistes</li>
                        <li><i class="fas fa-check"></i> Étude des possibilités de réorientation</li>
                        <li><i class="fas fa-check"></i> Construction du nouveau projet académique</li>
                        <li><i class="fas fa-check"></i> Plan d'action personnalisé</li>
                        <li><i class="fas fa-check"></i> Suivi renforcé post-réorientation</li>
                    </ul>
                    <button class="formule-btn" onclick="openInscriptionModal('Réorientation Supérieur - 6 séances', '130000', '6 séances (1h30 chacune)')">
                        Choisir cette formule <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Formule 3 -->
            <div class="formule-card stagger-item animate-delay-2">
                <div class="formule-header">
                    <div class="formule-icon"><i class="fas fa-user"></i></div>
                    <h3>Séance Individuelle</h3>
                    <p>Flexibilité selon vos besoins</p>
                    <div class="formule-prix">25 000 <span>FCFA</span></div>
                </div>
                <div class="formule-body">
                    <ul class="formule-features">
                        <li><i class="fas fa-check"></i> 1 séance de 1h30</li>
                        <li><i class="fas fa-check"></i> Thématique au choix</li>
                        <li><i class="fas fa-check"></i> Conseil personnalisé</li>
                        <li><i class="fas fa-check"></i> Recommandations sur mesure</li>
                        <li><i class="fas fa-check"></i> Possibilité de compléter par un pack</li>
                    </ul>
                    <button class="formule-btn" onclick="openInscriptionModal('Séance Individuelle Orientation', '25000', '1 séance (1h30)')">
                        Choisir cette formule <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="text-center mt-5 animate-scroll">
            <div class="intro-highlight" style="display: inline-flex;">
                <i class="fas fa-map-marker-alt"></i>
                <span><strong>Lieu :</strong> À domicile, en ligne ou au centre MONPROFCHEZMOI &nbsp;|&nbsp; <strong>Durée :</strong> 1h30 par séance</span>
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
            <h2 class="section-title-big">Les <span style="color: var(--orange);">5 étapes</span> de l'accompagnement</h2>
            <p class="section-subtitle">Un parcours structuré et progressif pour construire votre avenir.</p>
        </div>

        <div class="timeline-container">
            <div class="timeline-line"></div>

            <div class="timeline-item animate-scroll">
                <div class="timeline-dot">1</div>
                <div class="timeline-content">
                    <h4><i class="fas fa-clipboard-list"></i> Bilan académique et personnel</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Analyse du parcours universitaire</li>
                        <li><i class="fas fa-check"></i> Évaluation des résultats académiques</li>
                        <li><i class="fas fa-check"></i> Recensement des expériences personnelles</li>
                        <li><i class="fas fa-check"></i> Identification des centres d'intérêt</li>
                        <li><i class="fas fa-check"></i> Inventaire des compétences acquises</li>
                        <li><i class="fas fa-check"></i> Définition des objectifs professionnels</li>
                    </ul>
                </div>
            </div>

            <div class="timeline-item animate-scroll">
                <div class="timeline-dot">2</div>
                <div class="timeline-content">
                    <h4><i class="fas fa-search"></i> Analyse du projet professionnel</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Exploration des aspirations professionnelles</li>
                        <li><i class="fas fa-check"></i> Étude des secteurs d'activité envisagés</li>
                        <li><i class="fas fa-check"></i> Identification des métiers ciblés</li>
                        <li><i class="fas fa-check"></i> Analyse des compétences recherchées sur le marché</li>
                    </ul>
                </div>
            </div>

            <div class="timeline-item animate-scroll">
                <div class="timeline-dot">3</div>
                <div class="timeline-content">
                    <h4><i class="fas fa-route"></i> Choix de spécialisation ou poursuite d'études</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Présentation des licences professionnelles</li>
                        <li><i class="fas fa-check"></i> Étude des masters pertinents</li>
                        <li><i class="fas fa-check"></i> Informations sur les grandes écoles</li>
                        <li><i class="fas fa-check"></i> Formations certifiantes et spécialisées</li>
                        <li><i class="fas fa-check"></i> Possibilités d'études à l'international</li>
                    </ul>
                </div>
            </div>

            <div class="timeline-item animate-scroll">
                <div class="timeline-dot">4</div>
                <div class="timeline-content">
                    <h4><i class="fas fa-sync-alt"></i> Réorientation académique</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Analyse approfondie des motivations</li>
                        <li><i class="fas fa-check"></i> Identification des alternatives viables</li>
                        <li><i class="fas fa-check"></i> Étude de faisabilité du changement</li>
                        <li><i class="fas fa-check"></i> Construction d'un nouveau projet cohérent</li>
                    </ul>
                </div>
            </div>

            <div class="timeline-item animate-scroll">
                <div class="timeline-dot">5</div>
                <div class="timeline-content">
                    <h4><i class="fas fa-briefcase"></i> Préparation à l'insertion professionnelle</h4>
                    <ul>
                        <li><i class="fas fa-check"></i> Construction du projet de carrière</li>
                        <li><i class="fas fa-check"></i> Valorisation des compétences</li>
                        <li><i class="fas fa-check"></i> Préparation aux stages</li>
                        <li><i class="fas fa-check"></i> Préparation aux entretiens d'embauche</li>
                        <li><i class="fas fa-check"></i> Développement du réseau professionnel</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     OUTILS UTILISÉS
     ============================================ -->
<section class="outils-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Méthodologie</div>
            <h2 class="section-title-big">Les <span style="color: var(--purple);">outils</span> de l'accompagnement</h2>
            <p class="section-subtitle">Des méthodes éprouvées pour un accompagnement efficace et personnalisé.</p>
        </div>

        <div class="outils-grid stagger-container">
            <div class="outil-card stagger-item">
                <div class="outil-icon"><i class="fas fa-question-circle"></i></div>
                <h4>Questionnaire d'orientation</h4>
                <p>Évaluation complète du profil et des aspirations.</p>
            </div>
            <div class="outil-card stagger-item">
                <div class="outil-icon"><i class="fas fa-chart-bar"></i></div>
                <h4>Analyse du parcours</h4>
                <p>Revue détaillée de l'historique académique.</p>
            </div>
            <div class="outil-card stagger-item">
                <div class="outil-icon"><i class="fas fa-user-check"></i></div>
                <h4>Bilan de compétences</h4>
                <p>Identification des forces et axes de développement.</p>
            </div>
            <div class="outil-card stagger-item">
                <div class="outil-icon"><i class="fas fa-industry"></i></div>
                <h4>Étude des métiers</h4>
                <p>Veille sur les secteurs et débouchés professionnels.</p>
            </div>
            <div class="outil-card stagger-item">
                <div class="outil-icon"><i class="fas fa-file-alt"></i></div>
                <h4>Fiche projet personnalisée</h4>
                <p>Document de synthèse du projet professionnel.</p>
            </div>
            <div class="outil-card stagger-item">
                <div class="outil-icon"><i class="fas fa-tasks"></i></div>
                <h4>Plan d'action individualisé</h4>
                <p>Feuille de route concrète pour atteindre ses objectifs.</p>
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
                        <label>Nom complet *</label>
                        <input type="text" name="nom" required placeholder="Ex: KOUAME Jean">
                    </div>
                    <div class="form-group">
                        <label>Niveau d'études actuel *</label>
                        <select name="niveau" required>
                            <option value="">Choisir...</option>
                            <option value="bts">BTS</option>
                            <option value="dut">DUT / BUT</option>
                            <option value="licence">Licence</option>
                            <option value="master">Master</option>
                            <option value="grande_ecole">Grande école</option>
                            <option value="reorientation">En réorientation</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Téléphone *</label>
                        <input type="tel" name="telephone" required placeholder="Ex: 01 53 75 15 44">
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" name="email" required placeholder="Ex: contact@email.com">
                    </div>
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
                            <label class="radio-label"><input type="radio" name="lieu" value="centre" checked> <span>Au centre</span></label>
                            <label class="radio-label"><input type="radio" name="lieu" value="domicile"> <span>À domicile</span></label>
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
                        <label class="radio-label"><input type="radio" name="type_paiement" value="echelonne"> <span>Échelonné</span></label>
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
     POURQUOI NOUS
     ============================================ -->
<section class="pourquoi-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Pourquoi nous ?</div>
            <h2 class="section-title-big">Les atouts de <span style="color: var(--orange);">MONPROFCHEZMOI</span></h2>
            <p class="section-subtitle">Nous mettons tout en œuvre pour garantir la réussite de votre orientation.</p>
        </div>

        <div class="pourquoi-grid">
            <div class="pourquoi-card animate-scroll animate-delay-1">
                <div class="pourquoi-icon"><i class="fas fa-user-check"></i></div>
                <h4>Accompagnement personnalisé</h4>
                <p>Chaque étudiant bénéficie d'un suivi sur mesure adapté à son profil et ses ambitions.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-2">
                <div class="pourquoi-icon"><i class="fas fa-bullseye"></i></div>
                <h4>Approche projet professionnel</h4>
                <p>Centré sur la construction d'un projet cohérent et réaliste pour l'avenir.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-3">
                <div class="pourquoi-icon"><i class="fas fa-book-open"></i></div>
                <h4>Connaissance des formations</h4>
                <p>Maîtrise approfondie des formations et débouchés du marché ivoirien et international.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-1">
                <div class="pourquoi-icon"><i class="fas fa-sync-alt"></i></div>
                <h4>Réorientation accompagnée</h4>
                <p>Support complet pour les étudiants souhaitant changer de voie académique.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-2">
                <div class="pourquoi-icon"><i class="fas fa-briefcase"></i></div>
                <h4>Préparation insertion pro</h4>
                <p>Accompagnement concret vers l'emploi : stages, entretiens, réseau professionnel.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-3">
                <div class="pourquoi-icon"><i class="fas fa-chart-line"></i></div>
                <h4>Conseils marché de l'emploi</h4>
                <p>Recommandations basées sur les réalités actuelles du marché ivoirien.</p>
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
            <h2 class="section-title-big">Choisissez votre avenir avec <span style="color: var(--orange);">confiance</span> et construisez un parcours qui vous ressemble</h2>
            <p class="section-subtitle">Faites confiance à MONPROFCHEZMOI pour accompagner votre orientation et votre réussite professionnelle.</p>
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
                <img src="/asset/img/logo.png" alt="Monprofchezmoi">
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


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>

