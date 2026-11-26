<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Soutien Scolaire Supérieur - Monprofchezmoi-ci.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Soutien Scolaire, BTS, Licence, Master, Grandes Écoles, Côte d'Ivoire, Abidjan" name="keywords">
    <meta content="Accompagnement personnalisé pour étudiants en BTS, Licence, Master et Grandes Écoles à Abidjan." name="description">

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
    --indigo: #6366F1;
    --indigo-light: #818CF8;
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
   PAGE HERO - SOUTIEN SUPÉRIEUR
   ============================================ */
.page-hero-soutien {
    min-height: 70vh;
    background: linear-gradient(135deg, var(--blue) 0%, #1a1a3e 30%, #1e1b4b 70%, var(--indigo) 100%);
    position: relative; overflow: hidden;
    display: flex; align-items: center; padding: 80px 0;
}
.page-hero-soutien::before {
    content: ''; position: absolute;
    top: -20%; right: -10%; width: 600px; height: 600px;
    background: radial-gradient(circle, rgba(99,102,241,0.12), transparent 70%);
    border-radius: 50%;
    animation: float-hero 8s ease-in-out infinite;
}
.page-hero-soutien::after {
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
.particle:nth-child(2) { left: 25%; top: 55%; animation-delay: 2s; width: 6px; height: 6px; background: rgba(99,102,241,0.25); }
.particle:nth-child(3) { left: 60%; top: 25%; animation-delay: 4s; }
.particle:nth-child(4) { left: 80%; top: 65%; animation-delay: 6s; width: 5px; height: 5px; background: rgba(124,58,237,0.2); }
.particle:nth-child(5) { left: 45%; top: 80%; animation-delay: 8s; }
.particle:nth-child(6) { left: 15%; top: 40%; animation-delay: 10s; width: 3px; height: 3px; background: rgba(255,107,53,0.35); }
.particle:nth-child(7) { left: 70%; top: 10%; animation-delay: 12s; width: 4px; height: 4px; background: rgba(99,102,241,0.3); }
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
    background: rgba(99,102,241,0.15);
    border: 1px solid rgba(99,102,241,0.3);
    color: var(--indigo-light);
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
.page-hero-title .highlight-indigo { color: var(--indigo-light); position: relative; }
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
    background: rgba(99,102,241,0.2);
    border-color: var(--indigo);
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
    background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(124,58,237,0.1));
    border: 2px solid rgba(255,255,255,0.08);
    display: flex; align-items: center; justify-content: center;
    position: relative;
    animation: pulse-circle 4s ease-in-out infinite;
}
@keyframes pulse-circle {
    0%, 100% { transform: scale(1); box-shadow: 0 0 40px rgba(99,102,241,0.1); }
    50% { transform: scale(1.03); box-shadow: 0 0 60px rgba(99,102,241,0.2); }
}
.hero-visual-inner {
    width: 240px; height: 240px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(255,107,53,0.15), rgba(99,102,241,0.15));
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
.orbit-3 i { background: var(--indigo); }
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
.section-label-indigo {
    display: inline-flex; align-items: center; gap: 8px;
    font-size: 0.8rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: 2px; color: var(--indigo); margin-bottom: 16px;
}
.section-label-indigo::before {
    content: ''; width: 30px; height: 3px;
    background: var(--indigo); border-radius: 2px;
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
    background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(99,102,241,0.05));
    border: 1px solid rgba(99,102,241,0.2);
    color: var(--indigo); padding: 12px 24px;
    border-radius: 50px; font-size: 0.95rem; font-weight: 600;
    margin-top: 20px;
}

/* Accompagnement cards */
.accompagnement-grid {
    display: grid; grid-template-columns: repeat(2, 1fr);
    gap: 24px; margin-top: 50px;
}
.accompagnement-card {
    background: var(--white); border-radius: 20px;
    padding: 35px 30px; border: 1px solid var(--gray-100);
    transition: all 0.4s ease; position: relative; overflow: hidden;
}
.accompagnement-card::before {
    content: ''; position: absolute; top: 0; left: 0;
    width: 4px; height: 100%;
    background: linear-gradient(to bottom, var(--indigo), var(--purple));
    border-radius: 20px 0 0 20px;
    opacity: 0;
    transition: opacity 0.3s ease;
}
.accompagnement-card:hover::before { opacity: 1; }
.accompagnement-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.accompagnement-icon {
    width: 60px; height: 60px; border-radius: 16px;
    background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(99,102,241,0.05));
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 20px; font-size: 1.5rem; color: var(--indigo);
    transition: all 0.4s ease;
}
.accompagnement-card:hover .accompagnement-icon {
    background: linear-gradient(135deg, var(--indigo), var(--indigo-light));
    color: white; transform: scale(1.1) rotate(-5deg);
    box-shadow: 0 8px 24px rgba(99,102,241,0.3);
}
.accompagnement-card h4 {
    font-size: 1.15rem; font-weight: 800; color: var(--blue);
    margin-bottom: 12px;
}
.accompagnement-card p {
    font-size: 0.92rem; color: var(--gray-600);
    line-height: 1.7; margin-bottom: 16px;
}
.accompagnement-card ul {
    list-style: none; padding: 0; margin: 0;
}
.accompagnement-card ul li {
    display: flex; align-items: flex-start; gap: 10px;
    padding: 6px 0; font-size: 0.9rem;
    color: var(--gray-800);
}
.accompagnement-card ul li i {
    color: var(--indigo); font-size: 0.85rem;
    margin-top: 4px; min-width: 16px;
}

@media (max-width: 991px) {
    .accompagnement-grid { grid-template-columns: 1fr; }
}

/* ============================================
   MATIÈRES - TABS STYLE
   ============================================ */
.matieres-section { background: var(--cream); }
.matieres-tabs {
    display: flex; justify-content: center; gap: 12px;
    flex-wrap: wrap; margin-bottom: 40px;
}
.matiere-tab {
    padding: 12px 24px; border-radius: 12px;
    background: var(--white); border: 2px solid var(--gray-100);
    font-family: 'Nunito', sans-serif; font-size: 0.9rem;
    font-weight: 700; color: var(--gray-600);
    cursor: pointer; transition: all 0.3s ease;
}
.matiere-tab:hover {
    border-color: var(--indigo); color: var(--indigo);
}
.matiere-tab.active {
    background: linear-gradient(135deg, var(--indigo), var(--indigo-light));
    color: white; border-color: var(--indigo);
    box-shadow: 0 4px 16px rgba(99,102,241,0.3);
}
.matiere-content {
    display: none;
    animation: fadeInUp 0.5s ease;
}
.matiere-content.active { display: block; }
.matiere-grid {
    display: grid; grid-template-columns: repeat(4, 1fr);
    gap: 16px;
}
.matiere-item {
    display: flex; align-items: center; gap: 12px;
    padding: 16px 20px; background: var(--white);
    border-radius: 12px; border: 1px solid var(--gray-100);
    transition: all 0.3s ease;
}
.matiere-item:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
    border-color: var(--indigo);
}
.matiere-item i {
    width: 40px; height: 40px; min-width: 40px;
    border-radius: 10px;
    background: linear-gradient(135deg, var(--indigo), var(--indigo-light));
    color: white; display: flex; align-items: center; justify-content: center;
    font-size: 1rem;
}
.matiere-item span {
    font-weight: 600; color: var(--gray-800); font-size: 0.9rem;
}

@media (max-width: 991px) {
    .matiere-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 575px) {
    .matiere-grid { grid-template-columns: 1fr; }
}

/* ============================================
   FILIÈRES SECTION
   ============================================ */
.filieres-section { background: var(--white); }
.filieres-grid {
    display: grid; grid-template-columns: repeat(4, 1fr);
    gap: 16px;
}
.filiere-tag {
    display: flex; align-items: center; gap: 10px;
    padding: 14px 18px; background: var(--white);
    border-radius: 12px; border: 1px solid var(--gray-100);
    transition: all 0.3s ease;
}
.filiere-tag:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-sm);
    border-color: var(--orange);
    background: linear-gradient(135deg, rgba(255,107,53,0.05), rgba(255,107,53,0.02));
}
.filiere-tag i {
    color: var(--orange); font-size: 1rem;
}
.filiere-tag span {
    font-weight: 600; color: var(--gray-800); font-size: 0.88rem;
}

@media (max-width: 991px) {
    .filieres-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 575px) {
    .filieres-grid { grid-template-columns: 1fr; }
}

/* ============================================
   MÉTHODE SECTION - STEPS
   ============================================ */
.methode-section { background: var(--cream); }
.methode-steps {
    display: grid; grid-template-columns: repeat(5, 1fr);
    gap: 20px; position: relative;
}
.methode-step {
    background: var(--white); border-radius: 20px;
    padding: 30px 24px; border: 1px solid var(--gray-100);
    text-align: center; transition: all 0.4s ease;
    position: relative;
}
.methode-step:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.step-number {
    width: 50px; height: 50px; border-radius: 50%;
    background: linear-gradient(135deg, var(--indigo), var(--indigo-light));
    color: white; display: flex; align-items: center; justify-content: center;
    margin: 0 auto 16px; font-size: 1.2rem; font-weight: 800;
    box-shadow: 0 4px 16px rgba(99,102,241,0.3);
    transition: all 0.4s ease;
}
.methode-step:hover .step-number {
    transform: scale(1.15) rotate(10deg);
}
.methode-step h4 {
    font-size: 1rem; font-weight: 700; color: var(--blue);
    margin-bottom: 8px;
}
.methode-step p {
    font-size: 0.88rem; color: var(--gray-600);
    line-height: 1.6; margin: 0;
}
.step-connector {
    position: absolute; top: 55px;
    width: calc(100% - 40px); height: 3px;
    background: linear-gradient(90deg, var(--indigo), var(--purple));
    left: calc(50% + 25px);
    opacity: 0.3;
}
.methode-step:last-child .step-connector { display: none; }

@media (max-width: 991px) {
    .methode-steps { grid-template-columns: 1fr; }
    .step-connector { display: none; }
}

/* ============================================
   COMPÉTENCES PRO SECTION
   ============================================ */
.competences-pro-section { background: var(--white); }
.competences-grid {
    display: grid; grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}
.competence-pro-card {
    background: var(--white); border-radius: 16px;
    padding: 28px; border: 1px solid var(--gray-100);
    text-align: center; transition: all 0.4s ease;
}
.competence-pro-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-md);
    border-color: var(--green);
}
.competence-pro-icon {
    width: 60px; height: 60px; border-radius: 16px;
    background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(16,185,129,0.05));
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 16px; font-size: 1.5rem; color: var(--green);
    transition: all 0.4s ease;
}
.competence-pro-card:hover .competence-pro-icon {
    background: linear-gradient(135deg, var(--green), var(--green-light));
    color: white; transform: scale(1.1);
    box-shadow: 0 8px 24px rgba(16,185,129,0.3);
}
.competence-pro-card h4 {
    font-size: 1rem; font-weight: 700; color: var(--blue);
    margin-bottom: 6px;
}
.competence-pro-card p {
    font-size: 0.88rem; color: var(--gray-600); margin: 0;
}

@media (max-width: 767px) {
    .competences-grid { grid-template-columns: 1fr; }
}

/* ============================================
   FORMATIONS COMPLÉMENTAIRES
   ============================================ */
.formations-comp-section { background: var(--cream); }
.formations-comp-grid {
    display: grid; grid-template-columns: repeat(4, 1fr);
    gap: 16px;
}
.formation-comp-item {
    display: flex; align-items: center; gap: 12px;
    padding: 16px 18px; background: var(--white);
    border-radius: 12px; border: 1px solid var(--gray-100);
    transition: all 0.3s ease;
}
.formation-comp-item:hover {
    transform: translateX(6px);
    box-shadow: var(--shadow-sm);
    border-color: var(--purple);
}
.formation-comp-item i {
    color: var(--purple); font-size: 1.1rem;
    min-width: 24px;
}
.formation-comp-item span {
    font-weight: 600; color: var(--gray-800); font-size: 0.88rem;
}

@media (max-width: 991px) {
    .formations-comp-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 575px) {
    .formations-comp-grid { grid-template-columns: 1fr; }
}

/* ============================================
   FAQ SECTION
   ============================================ */
.faq-section { background: var(--white); }
.faq-container { max-width: 800px; margin: 0 auto; }
.faq-item {
    background: var(--white); border-radius: 16px;
    border: 1px solid var(--gray-100);
    margin-bottom: 16px; overflow: hidden;
    transition: all 0.3s ease;
}
.faq-item:hover {
    box-shadow: var(--shadow-sm);
}
.faq-question {
    padding: 20px 24px;
    display: flex; justify-content: space-between; align-items: center;
    cursor: pointer; background: var(--white);
    transition: all 0.3s ease;
}
.faq-question h4 {
    font-size: 1rem; font-weight: 700; color: var(--blue);
    margin: 0;
}
.faq-question i {
    color: var(--indigo); font-size: 1rem;
    transition: transform 0.3s ease;
}
.faq-item.active .faq-question i {
    transform: rotate(180deg);
}
.faq-answer {
    max-height: 0; overflow: hidden;
    transition: max-height 0.4s ease, padding 0.4s ease;
}
.faq-item.active .faq-answer {
    max-height: 300px;
    padding: 0 24px 20px;
}
.faq-answer p {
    font-size: 0.92rem; color: var(--gray-600);
    line-height: 1.7; margin: 0;
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
    background: radial-gradient(circle, rgba(99,102,241,0.15), transparent 70%);
    border-radius: 50%;
}
.stats-grid {
    display: grid; grid-template-columns: repeat(4, 1fr);
    gap: 30px; text-align: center;
}
.stat-item { color: white; }
.stat-number {
    font-size: 2.5rem; font-weight: 800; color: var(--indigo-light);
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
    background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(99,102,241,0.05));
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px; font-size: 1.8rem; color: var(--indigo);
    transition: all 0.4s ease;
}
.pourquoi-card:hover .pourquoi-icon {
    background: linear-gradient(135deg, var(--indigo), var(--indigo-light));
    color: white; transform: scale(1.1) rotate(-5deg);
    box-shadow: 0 8px 32px rgba(99,102,241,0.3);
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
    background: radial-gradient(circle, rgba(99,102,241,0.15), transparent 70%);
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
    .page-hero-soutien { min-height: 50vh; padding: 60px 0; }
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
        <a href="{{ url('/particuliers') }}" class="navbar-brand">
            <img src="/asset/img/logo.png" alt="Monprofchezmoi" height="45">
        </a>

        <button class="navbar-toggler navbar-toggler-premium" type="button" data-bs-toggle="collapse" data-bs-target="#navbarModerne">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarModerne">
            <ul class="nav-menu-moderne ms-auto">
                <li class="nav-item-moderne"><a href="{{ url('/particuliers') }}" class="nav-link-moderne active">Accueil</a></li>

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
                                <a href="{{ url('/particuliers/primaire') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book"></i></div><span>Soutien scolaire toutes matières</span></a>
                                <a href="{{ url('/particuliers/accompagnement') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-puzzle-piece"></i></div><span>Accompagnement DYS</span></a>
                                <a href="{{ url('/particuliers/methode') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-tasks"></i></div><span>Méthodologie et organisation</span></a>
                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/particuliers/minimetier') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-briefcase"></i></div><span>Mini métiers</span></a>
                                <a href="{{ url('/particuliers/codage') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-robot"></i></div><span>Robotique et ateliers créatifs</span></a>
                                <a href="{{ url('/particuliers/petit') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-language"></i></div><span>Les petits bilingues</span></a>
                                <a href="{{ url('/particuliers/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                                <a href="{{ url('/particuliers/bouge') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-spell-check"></i></div><span>Bouge ta grammaire</span></a>
                                <a href="{{ url('/particuliers/cabine') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book-reader"></i></div><span>Ma cabine à livres</span></a>
                                <a href="{{ url('/particuliers/sportenf') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-running"></i></div><span>Sport enfant</span></a>
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
                                <a href="{{ url('/particuliers/soutien-collège') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book"></i></div><span>Soutien scolaire toutes matières</span></a>
                                <a href="{{ url('/particuliers/coaching') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-graduation-cap"></i></div><span>Coaching scolaire</span></a>
                                <a href="{{ url('/particuliers/college-methode') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-user-graduate"></i></div><span>Méthodologie et autonomie</span></a>
                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                
                                <a href="{{ url('/particuliers/minimetier') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-briefcase"></i></div><span>Mini métiers</span></a>
                                <a href="{{ url('/particuliers/college-competence') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-robot"></i></div><span>Robotique et ateliers créatifs</span></a>
                                <a href="{{ url('/particuliers/petit') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-language"></i></div><span>Les petits bilingues</span></a>
                                                                <a href="{{ url('/particuliers/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                                <a href="{{ url('/particuliers/bouge') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-spell-check"></i></div><span>Bouge ta grammaire</span></a>
                                <a href="{{ url('/particuliers/cabine') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book-reader"></i></div><span>Ma cabine à livres</span></a>
                                                                <a href="{{ url('/particuliers/sportenf') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-running"></i></div><span>Sport enfant</span></a>

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
                                <a href="{{ url('/particuliers/lycee-sous') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book"></i></div><span>Soutien scolaire toutes matières</span></a>
                                <a href="{{ url('/particuliers/lycee-preparation') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-award"></i></div><span>Préparation Bac</span></a>
                                <a href="{{ url('/particuliers/lycee-coaching') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-star"></i></div><span>Coaching méthodologique</span></a>
                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/particuliers/minimetier') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-briefcase"></i></div><span>Mini métiers</span></a>
                                <a href="{{ url('/particuliers/college-competence') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-robot"></i></div><span>Robotique</span></a>
                                <a href="{{ url('/particuliers/petit') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-language"></i></div><span>Les petits bilingues</span></a>
                                                                <a href="{{ url('/particuliers/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                                <a href="{{ url('/particuliers/bouge') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-spell-check"></i></div><span>Bouge ta grammaire</span></a>
                                <a href="{{ url('/particuliers/cabine') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-book-reader"></i></div><span>Ma cabine à livres</span></a>
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
                                <a href="{{ url('/particuliers/soutien-superieur') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Soutien aux études supérieures</span></a>
                                <a href="{{ url('/particuliers/orientation-superieur') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Orientation aux études supérieures</span></a>
                                <a href="{{ url('/particuliers/groupe') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-calculator"></i></div><span>Préparation DCG / DSCG</span></a>
                                <a href="{{ url('/particuliers/methode-superieur') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-tasks"></i></div><span>Méthodologie et organisation</span></a>

                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/particuliers/reussir') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Préparation aux oraux</span></a>
                                <a href="{{ url('/particuliers/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
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
                                <a href="{{ route('particuliers.gift-vouchers.index') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-calculator"></i></div><span>Nos bons cadeaux</span></a>
                                <a href="{{ url('/particuliers/formations') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-chalkboard-teacher"></i></div><span>Toutes les formations professionnelles</span></a>

                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/particuliers/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Sports à domicile pour adultes</span></a>
                                <a href="{{ url('/particuliers/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item-moderne"><a href="{{ route('profil.choisir', ['profil' => 'entreprise']) }}" class="nav-link-moderne" title="Changer d'espace"><i class="fas fa-exchange-alt" aria-hidden="true"></i> Espace entreprises</a></li>


                
                <li class="nav-item-moderne"><a href="/particuliers/contact" class="nav-link-moderne">Contact</a></li>
            </ul>

            <div class="ms-lg-3 mt-3 mt-lg-0">
                @auth
                    <div class="user-connected">
                        <a href="{{ route('particuliers.video.dashboard') }}" class="d-flex align-items-center text-decoration-none">
                            <div class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                            <span class="user-name d-none d-lg-block">{{ Auth::user()->name }}</span>
                        </a>
                        <a href="{{ route('particuliers.logout') }}" class="btn-connect-outline btn-sm"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                        <form id="logout-form" action="{{ route('particuliers.logout') }}" method="POST" style="display: none;">@csrf</form>
                    </div>
                @else
                    <a href="{{ url('/particuliers/login') }}" class="btn-nav-cta"><i class="fas fa-user"></i> Connexion</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- ============================================
     PAGE HERO - SOUTIEN SUPÉRIEUR
     ============================================ -->
<section class="page-hero-soutien">
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
                <div class="page-hero-label"><i class="fas fa-graduation-cap"></i> Soutien Scolaire Supérieur</div>
                <h1 class="page-hero-title">Réussissez vos études <span class="highlight-orange">supérieures</span> avec <span class="highlight-indigo">MonProfChezMoi</span></h1>
                <p class="page-hero-subtitle">BTS, Licence, Master et Grandes Écoles — des enseignants qualifiés et expérimentés vous accompagnent à domicile, en ligne ou dans un lieu convenu, adaptés à votre niveau et vos objectifs.</p>
                <div class="page-hero-badges">
                    <div class="page-hero-badge"><i class="fas fa-certificate"></i> BTS</div>
                    <div class="page-hero-badge"><i class="fas fa-university"></i> Licence</div>
                    <div class="page-hero-badge"><i class="fas fa-award"></i> Master</div>
                    <div class="page-hero-badge"><i class="fas fa-building"></i> Grandes Écoles</div>
                    <div class="page-hero-badge"><i class="fas fa-laptop-code"></i> Ingénieurs</div>
                </div>
            </div>
            <div class="hero-visual-wrapper animate-slide-right">
                <div class="hero-visual-circle">
                    <div class="hero-visual-inner">
                        <i class="fas fa-user-graduate hero-visual-icon"></i>
                    </div>
                </div>
                <div class="orbit-element orbit-1">
                    <i class="fas fa-book"></i>
                    <div><strong style="font-size: 0.85rem;">Cours</strong></div>
                </div>
                <div class="orbit-element orbit-2">
                    <i class="fas fa-file-alt"></i>
                    <div><strong style="font-size: 0.85rem;">Mémoires</strong></div>
                </div>
                <div class="orbit-element orbit-3">
                    <i class="fas fa-trophy"></i>
                    <div><strong style="font-size: 0.85rem;">Concours</strong></div>
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
        <span class="current">Soutien Scolaire Supérieur</span>
    </div>
</div>

<!-- ============================================
     INTRODUCTION + ACCOMPAGNEMENT
     ============================================ -->
<section class="intro-section section-padding">
    <div class="container">
        <div class="intro-content animate-scroll">
            <div class="section-label-indigo">Présentation</div>
            <h2 class="section-title-big">Un accompagnement universitaire <span style="color: var(--indigo);">adapté à vos besoins</span></h2>
            <p class="intro-text">
                Les études supérieures constituent une étape essentielle pour construire votre <strong>avenir académique et professionnel</strong>. Entre les exigences des cours, les examens, les projets, les mémoires et les concours, de nombreux étudiants ont besoin d'un accompagnement personnalisé pour progresser efficacement.
            </p>
            <p class="intro-text">
                Que vous soyez étudiant en <strong>BTS, Licence, Master, grande école, école d'ingénieurs, école de commerce ou institut supérieur</strong>, MonProfChezMoi vous accompagne avec des enseignants qualifiés et expérimentés.
            </p>
            <div class="intro-highlight animate-scroll">
                <i class="fas fa-star"></i> Cours particuliers à domicile, en ligne ou dans un lieu convenu
            </div>

            <div class="accompagnement-grid stagger-container">
                <div class="accompagnement-card stagger-item">
                    <div class="accompagnement-icon"><i class="fas fa-chart-line"></i></div>
                    <h4>Remise à niveau</h4>
                    <p>Vous rencontrez des difficultés dans certaines matières ? Nos enseignants reprennent les notions fondamentales, expliquent les concepts complexes et vous permettent de retrouver confiance dans votre parcours.</p>
                </div>
                <div class="accompagnement-card stagger-item">
                    <div class="accompagnement-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    <h4>Cours particuliers personnalisés</h4>
                    <p>Chaque étudiant bénéficie d'un accompagnement adapté :</p>
                    <ul>
                        <li><i class="fas fa-check"></i> Explication des cours</li>
                        <li><i class="fas fa-check"></i> Exercices pratiques</li>
                        <li><i class="fas fa-check"></i> Corrections détaillées</li>
                        <li><i class="fas fa-check"></i> Préparation aux devoirs et examens</li>
                        <li><i class="fas fa-check"></i> Suivi de progression</li>
                    </ul>
                </div>
                <div class="accompagnement-card stagger-item">
                    <div class="accompagnement-icon"><i class="fas fa-trophy"></i></div>
                    <h4>Préparation aux examens et concours</h4>
                    <p>Nous vous accompagnons efficacement pour :</p>
                    <ul>
                        <li><i class="fas fa-check"></i> BTS</li>
                        <li><i class="fas fa-check"></i> Licence</li>
                        <li><i class="fas fa-check"></i> Master</li>
                        <li><i class="fas fa-check"></i> Concours d'entrée aux grandes écoles</li>
                        <li><i class="fas fa-check"></i> Examens de rattrapage</li>
                        <li><i class="fas fa-check"></i> Certifications professionnelles</li>
                    </ul>
                </div>
                <div class="accompagnement-card stagger-item">
                    <div class="accompagnement-icon"><i class="fas fa-file-alt"></i></div>
                    <h4>Accompagnement mémoires & projets</h4>
                    <p>Nos enseignants vous assistent dans toutes les étapes de votre travail :</p>
                    <ul>
                        <li><i class="fas fa-check"></i> Recherche et choix du sujet</li>
                        <li><i class="fas fa-check"></i> Définition de la problématique</li>
                        <li><i class="fas fa-check"></i> Méthodologie de recherche</li>
                        <li><i class="fas fa-check"></i> Analyse des données</li>
                        <li><i class="fas fa-check"></i> Rédaction du mémoire</li>
                        <li><i class="fas fa-check"></i> Préparation de la soutenance</li>
                    </ul>
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
                <span class="stat-label">Domaines de matières</span>
            </div>
            <div class="stat-item animate-scale animate-delay-2">
                <span class="stat-number counter" data-target="15">0</span>
                <span class="stat-label">Filières couvertes</span>
            </div>
            <div class="stat-item animate-scale animate-delay-3">
                <span class="stat-number counter" data-target="4">0</span>
                <span class="stat-label">Types d'accompagnement</span>
            </div>
            <div class="stat-item animate-scale animate-delay-4">
                <span class="stat-number counter" data-target="100">0</span>
                <span class="stat-label">% Personnalisé</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     MATIÈRES ENSEIGNÉES - TABS
     ============================================ -->
<section class="matieres-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Matières</div>
            <h2 class="section-title-big">Nos <span style="color: var(--indigo);">domaines d'intervention</span></h2>
            <p class="section-subtitle">Des enseignants spécialisés dans toutes les disciplines du supérieur.</p>
        </div>

        <div class="matieres-tabs animate-scroll">
            <button class="matiere-tab active" onclick="switchTab('sciences')"><i class="fas fa-flask"></i> Sciences & Tech</button>
            <button class="matiere-tab" onclick="switchTab('gestion')"><i class="fas fa-chart-pie"></i> Gestion & Finance</button>
            <button class="matiere-tab" onclick="switchTab('eco')"><i class="fas fa-globe"></i> Sciences Éco</button>
            <button class="matiere-tab" onclick="switchTab('droit')"><i class="fas fa-balance-scale"></i> Droit</button>
            <button class="matiere-tab" onclick="switchTab('langues')"><i class="fas fa-language"></i> Langues</button>
        </div>

        <div id="tab-sciences" class="matiere-content active">
            <div class="matiere-grid stagger-container">
                <div class="matiere-item stagger-item"><i class="fas fa-calculator"></i><span>Mathématiques</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-chart-bar"></i><span>Statistiques</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-atom"></i><span>Physique</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-flask"></i><span>Chimie</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-laptop"></i><span>Informatique</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-code"></i><span>Algorithmique</span></div>
                <div class="matiere-item stagger-item"><i class="fab fa-python"></i><span>Programmation Python</span></div>
                <div class="matiere-item stagger-item"><i class="fab fa-java"></i><span>Java</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-code"></i><span>C / C++</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-database"></i><span>SQL</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-globe"></i><span>Développement web</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-brain"></i><span>Intelligence artificielle</span></div>
            </div>
        </div>

        <div id="tab-gestion" class="matiere-content">
            <div class="matiere-grid stagger-container">
                <div class="matiere-item stagger-item"><i class="fas fa-calculator"></i><span>Comptabilité générale</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-chart-line"></i><span>Comptabilité analytique</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-coins"></i><span>Finance</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-tasks"></i><span>Contrôle de gestion</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-file-invoice-dollar"></i><span>Fiscalité</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-bullhorn"></i><span>Marketing</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-users"></i><span>Gestion des ressources humaines</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-search-dollar"></i><span>Audit</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-university"></i><span>Banque</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-shield-alt"></i><span>Assurance</span></div>
            </div>
        </div>

        <div id="tab-eco" class="matiere-content">
            <div class="matiere-grid stagger-container">
                <div class="matiere-item stagger-item"><i class="fas fa-chart-line"></i><span>Microéconomie</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-globe-americas"></i><span>Macroéconomie</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-chart-bar"></i><span>Économétrie</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-globe"></i><span>Économie internationale</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-seedling"></i><span>Économie du développement</span></div>
            </div>
        </div>

        <div id="tab-droit" class="matiere-content">
            <div class="matiere-grid stagger-container">
                <div class="matiere-item stagger-item"><i class="fas fa-gavel"></i><span>Droit civil</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-briefcase"></i><span>Droit des affaires</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-handshake"></i><span>Droit commercial</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-file-invoice-dollar"></i><span>Droit fiscal</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-landmark"></i><span>Droit administratif</span></div>
            </div>
        </div>

        <div id="tab-langues" class="matiere-content">
            <div class="matiere-grid stagger-container">
                <div class="matiere-item stagger-item"><i class="fas fa-book"></i><span>Français académique</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-language"></i><span>Anglais professionnel</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-microphone"></i><span>Communication orale</span></div>
                <div class="matiere-item stagger-item"><i class="fas fa-presentation"></i><span>Techniques de présentation</span></div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     FILIÈRES D'INTERVENTION
     ============================================ -->
<section class="filieres-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-indigo">Filières</div>
            <h2 class="section-title-big">Nous intervenons dans <span style="color: var(--orange);">toutes les filières</span></h2>
            <p class="section-subtitle">Un accompagnement complet quel que soit votre domaine d'études.</p>
        </div>

        <div class="filieres-grid stagger-container">
            <div class="filiere-tag stagger-item"><i class="fas fa-chart-line"></i><span>Sciences économiques</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-tasks"></i><span>Gestion</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-calculator"></i><span>Comptabilité</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-coins"></i><span>Finance</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-laptop-code"></i><span>Informatique</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-wifi"></i><span>Réseaux et Télécommunications</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-hard-hat"></i><span>Génie civil</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-bolt"></i><span>Génie électrique</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-cogs"></i><span>Génie mécanique</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-shopping-cart"></i><span>Commerce</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-users"></i><span>Ressources humaines</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-bullhorn"></i><span>Marketing</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-university"></i><span>Banque</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-shield-alt"></i><span>Assurance</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-balance-scale"></i><span>Droit</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-heartbeat"></i><span>Santé</span></div>
            <div class="filiere-tag stagger-item"><i class="fas fa-users"></i><span>Sciences sociales</span></div>
        </div>
    </div>
</section>

<!-- ============================================
     COMPÉTENCES PROFESSIONNELLES
     ============================================ -->
<section class="competences-pro-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Employabilité</div>
            <h2 class="section-title-big">Développez vos <span style="color: var(--green);">compétences professionnelles</span></h2>
            <p class="section-subtitle">Au-delà du soutien académique, nous vous préparons à l'insertion professionnelle.</p>
        </div>

        <div class="competences-grid stagger-container">
            <div class="competence-pro-card stagger-item">
                <div class="competence-pro-icon"><i class="fas fa-file-alt"></i></div>
                <h4>Rédaction de CV</h4>
                <p>Créez un CV percutant qui met en valeur votre profil.</p>
            </div>
            <div class="competence-pro-card stagger-item">
                <div class="competence-pro-icon"><i class="fas fa-user-tie"></i></div>
                <h4>Préparation aux entretiens</h4>
                <p>Maîtrisez les techniques pour réussir vos entretiens d'embauche.</p>
            </div>
            <div class="competence-pro-card stagger-item">
                <div class="competence-pro-icon"><i class="fas fa-pen-fancy"></i></div>
                <h4>Rédaction professionnelle</h4>
                <p>Apprenez à rédiger des documents professionnels de qualité.</p>
            </div>
            <div class="competence-pro-card stagger-item">
                <div class="competence-pro-icon"><i class="fas fa-presentation"></i></div>
                <h4>Techniques de présentation</h4>
                <p>Présentez vos idées avec clarté et impact.</p>
            </div>
            <div class="competence-pro-card stagger-item">
                <div class="competence-pro-icon"><i class="fas fa-microphone-alt"></i></div>
                <h4>Prise de parole en public</h4>
                <p>Gagnez en assurance pour vos exposés et soutenances.</p>
            </div>
            <div class="competence-pro-card stagger-item">
                <div class="competence-pro-icon"><i class="fas fa-laptop"></i></div>
                <h4>Maîtrise des outils numériques</h4>
                <p>Excel, PowerPoint, Power BI et bien plus encore.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     MÉTHODE D'ACCOMPAGNEMENT
     ============================================ -->
<section class="methode-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-indigo">Notre méthode</div>
            <h2 class="section-title-big">Notre approche en <span style="color: var(--indigo);">5 étapes</span></h2>
            <p class="section-subtitle">Une méthodologie éprouvée pour garantir votre réussite.</p>
        </div>

        <div class="methode-steps stagger-container">
            <div class="methode-step stagger-item">
                <div class="step-connector"></div>
                <div class="step-number">1</div>
                <h4>Évaluation</h4>
                <p>De vos besoins et objectifs</p>
            </div>
            <div class="methode-step stagger-item">
                <div class="step-connector"></div>
                <div class="step-number">2</div>
                <h4>Programme</h4>
                <p>Personnalisé sur mesure</p>
            </div>
            <div class="methode-step stagger-item">
                <div class="step-connector"></div>
                <div class="step-number">3</div>
                <h4>Enseignant</h4>
                <p>Sélectionné pour votre profil</p>
            </div>
            <div class="methode-step stagger-item">
                <div class="step-connector"></div>
                <div class="step-number">4</div>
                <h4>Suivi</h4>
                <p>Régulier de vos progrès</p>
            </div>
            <div class="methode-step stagger-item">
                <div class="step-number">5</div>
                <h4>Préparation</h4>
                <p>Intensive avant échéances</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     FORMATIONS COMPLÉMENTAIRES
     ============================================ -->
<section class="formations-comp-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Formations complémentaires</div>
            <h2 class="section-title-big">Renforcez votre <span style="color: var(--purple);">employabilité</span></h2>
            <p class="section-subtitle">Des formations pratiques pour booster votre profil professionnel.</p>
        </div>

        <div class="formations-comp-grid stagger-container">
            <div class="formation-comp-item stagger-item"><i class="fas fa-file-excel"></i><span>Microsoft Excel</span></div>
            <div class="formation-comp-item stagger-item"><i class="fas fa-file-word"></i><span>Word</span></div>
            <div class="formation-comp-item stagger-item"><i class="fas fa-file-powerpoint"></i><span>PowerPoint</span></div>
            <div class="formation-comp-item stagger-item"><i class="fas fa-chart-pie"></i><span>Power BI</span></div>
            <div class="formation-comp-item stagger-item"><i class="fas fa-database"></i><span>Analyse de données</span></div>
            <div class="formation-comp-item stagger-item"><i class="fas fa-chart-bar"></i><span>SPSS</span></div>
            <div class="formation-comp-item stagger-item"><i class="fas fa-chart-line"></i><span>Stata</span></div>
            <div class="formation-comp-item stagger-item"><i class="fab fa-r-project"></i><span>R</span></div>
            <div class="formation-comp-item stagger-item"><i class="fab fa-python"></i><span>Python</span></div>
            <div class="formation-comp-item stagger-item"><i class="fas fa-database"></i><span>SQL</span></div>
            <div class="formation-comp-item stagger-item"><i class="fas fa-tasks"></i><span>Gestion de projet</span></div>
            <div class="formation-comp-item stagger-item"><i class="fas fa-pen-fancy"></i><span>Rédaction professionnelle</span></div>
        </div>
    </div>
</section>

<!-- ============================================
     FAQ
     ============================================ -->
<section class="faq-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-indigo">FAQ</div>
            <h2 class="section-title-big">Questions <span style="color: var(--indigo);">fréquentes</span></h2>
            <p class="section-subtitle">Trouvez les réponses à vos interrogations.</p>
        </div>

        <div class="faq-container">
            <div class="faq-item animate-scroll">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <h4>À qui s'adressent vos cours de soutien supérieur ?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Nos cours s'adressent aux étudiants en BTS, Licence, Master, grandes écoles et formations professionnelles.</p>
                </div>
            </div>
            <div class="faq-item animate-scroll">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <h4>Les cours peuvent-ils se dérouler en ligne ?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Oui. Nous proposons des cours en présentiel et à distance selon vos préférences et votre emploi du temps.</p>
                </div>
            </div>
            <div class="faq-item animate-scroll">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <h4>Comment choisissez-vous les enseignants ?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Nous identifions vos besoins puis nous vous proposons un enseignant correspondant à votre filière et à vos objectifs spécifiques.</p>
                </div>
            </div>
            <div class="faq-item animate-scroll">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <h4>Comment commencer les cours ?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Contactez MonProfChezMoi via notre formulaire, téléphone ou WhatsApp. Notre équipe vous accompagnera pour organiser votre premier cours.</p>
                </div>
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
            <p class="section-subtitle">Nous mettons tout en œuvre pour garantir votre réussite académique.</p>
        </div>

        <div class="pourquoi-grid">
            <div class="pourquoi-card animate-scroll animate-delay-1">
                <div class="pourquoi-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                <h4>Enseignants compétents</h4>
                <p>Nos professeurs sont sélectionnés pour leurs connaissances disciplinaires, leur expérience et leur capacité pédagogique.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-2">
                <div class="pourquoi-icon"><i class="fas fa-user-check"></i></div>
                <h4>Accompagnement personnalisé</h4>
                <p>Chaque étudiant bénéficie d'une méthode adaptée à son niveau, ses difficultés et ses objectifs.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-3">
                <div class="pourquoi-icon"><i class="fas fa-clock"></i></div>
                <h4>Grande flexibilité</h4>
                <p>Vous choisissez vos horaires : en semaine, en soirée, le week-end ou pendant les vacances.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-1">
                <div class="pourquoi-icon"><i class="fas fa-laptop-house"></i></div>
                <h4>Cours à domicile ou en ligne</h4>
                <p>Profitez d'un accompagnement efficace où que vous soyez, selon votre convenance.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-2">
                <div class="pourquoi-icon"><i class="fas fa-chart-line"></i></div>
                <h4>Suivi régulier</h4>
                <p>Nous suivons votre progression afin de vous aider à atteindre vos objectifs académiques.</p>
            </div>
            <div class="pourquoi-card animate-scroll animate-delay-3">
                <div class="pourquoi-icon"><i class="fas fa-users"></i></div>
                <h4>Étudiants concernés</h4>
                <p>Universités publiques et privées, grandes écoles, instituts supérieurs, BTS, classes préparatoires, écoles de commerce et d'ingénieurs.</p>
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
            <h2 class="section-title-big">Passez au niveau supérieur avec <span style="color: var(--orange);">MonProfChezMoi</span></h2>
            <p class="section-subtitle">Ne laissez pas les difficultés académiques ralentir votre réussite. Bénéficiez d'un accompagnement personnalisé, de professeurs compétents et d'une méthode adaptée pour réussir vos études et préparer votre avenir professionnel.</p>
            <div class="cta-buttons">
                <a href="{{ url('/particuliers/reponse') }}" class="btn-cta-orange"><i class="fas fa-search"></i> Réserver votre premier cours</a>
                <a href="tel:+2250153751544" class="btn-cta-outline"><i class="fas fa-phone-alt"></i> Être rappelé gratuitement</a>
            </div>
        </div>
    </div>
</section>

<!-- Modal d'inscription -->
@include('partials.modal-inscription', ['cgvType' => 'sc'])

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
<script>
// ========== TABS MATIÈRES ==========
function switchTab(tabId) {
    // Désactiver tous les tabs
    document.querySelectorAll('.matiere-tab').forEach(tab => tab.classList.remove('active'));
    document.querySelectorAll('.matiere-content').forEach(content => content.classList.remove('active'));

    // Activer le tab cliqué
    event.target.closest('.matiere-tab').classList.add('active');
    document.getElementById('tab-' + tabId).classList.add('active');
}

// ========== FAQ TOGGLE ==========
function toggleFaq(element) {
    const faqItem = element.closest('.faq-item');
    const isActive = faqItem.classList.contains('active');

    // Fermer tous les autres
    document.querySelectorAll('.faq-item.active').forEach(item => {
        if (item !== faqItem) item.classList.remove('active');
    });

    // Toggle l'élément cliqué
    faqItem.classList.toggle('active');
}

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
