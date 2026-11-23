<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Monprofchezmoi-ci.com</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Cours en ligne" name="keywords">
    <meta content="Soutien Scolaire" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="asset/img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/custom-styles.css">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
<!-- À ajouter dans le <head> de votre HTML -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="asset/css/courscss/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="asset/css/courscss/style.css" rel="stylesheet">
</head>
<style>
/* ============================================
   MONPROFCHEZMOI - NOUVEAU DESIGN 2024
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
   MODAL RAPPEL - STYLES MANQUANTS
   ============================================ */
.rappel-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(10, 22, 40, 0.6);
    backdrop-filter: blur(8px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.4s ease;
    padding: 20px;
}

.rappel-modal-overlay.active {
    opacity: 1;
    visibility: visible;
}

.rappel-modal-box {
    background: var(--white);
    border-radius: 24px;
    padding: 40px;
    max-width: 480px;
    width: 100%;
    position: relative;
    box-shadow: var(--shadow-xl);
    transform: translateY(30px) scale(0.95);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.rappel-modal-overlay.active .rappel-modal-box {
    transform: translateY(0) scale(1);
}

.rappel-close {
    position: absolute;
    top: 16px;
    right: 20px;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--gray-100);
    border: none;
    color: var(--gray-600);
    font-size: 22px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    line-height: 1;
    padding: 0;
}

.rappel-close:hover {
    background: var(--orange);
    color: white;
    transform: rotate(90deg);
}

.rappel-modal-header {
    text-align: center;
    margin-bottom: 30px;
}

.rappel-icon {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    color: white;
    font-size: 28px;
    box-shadow: var(--shadow-orange);
}

.rappel-modal-header h3 {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--blue);
    margin-bottom: 8px;
}

.rappel-modal-header p {
    font-size: 0.95rem;
    color: var(--gray-600);
    line-height: 1.6;
}

.rappel-form-group {
    margin-bottom: 20px;
}

.rappel-form-group label {
    display: block;
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.rappel-form-group input {
    width: 100%;
    height: 52px;
    border: 2px solid var(--gray-200);
    border-radius: 12px;
    padding: 0 18px;
    font-size: 1rem;
    font-family: 'Nunito', sans-serif;
    color: var(--gray-800);
    transition: all 0.3s ease;
    background: var(--gray-50);
}

.rappel-form-group input:focus {
    outline: none;
    border-color: var(--orange);
    background: var(--white);
    box-shadow: 0 0 0 4px rgba(255, 107, 53, 0.1);
}

.rappel-form-group input::placeholder {
    color: var(--gray-400);
}

.error-text {
    display: block;
    color: #EF4444;
    font-size: 0.82rem;
    margin-top: 6px;
    font-weight: 600;
}

.rappel-submit-btn {
    width: 100%;
    height: 54px;
    background: linear-gradient(135deg, var(--orange), var(--orange-dark));
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 1rem;
    font-weight: 700;
    font-family: 'Nunito', sans-serif;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: var(--shadow-orange);
    margin-top: 10px;
}

.rappel-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(255, 107, 53, 0.4);
}

.rappel-submit-btn.loading {
    opacity: 0.7;
    pointer-events: none;
}

.rappel-success-message {
    text-align: center;
    margin-top: 16px;
    font-weight: 700;
    font-size: 0.95rem;
    color: #10B981;
    min-height: 24px;
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
        max-height: calc(100vh - 70px);
        overflow-y: auto;
        overflow-x: hidden;
        -webkit-overflow-scrolling: touch;
    }

    .nav-menu-moderne {
        flex-direction: column;
        padding: 0;
        gap: 0;
        width: 100%;
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
   HERO - NOUVELLE DISPOSITION
   ============================================ */
.hero-nouveau {
    min-height: 100vh;
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 50%, #1a365d 100%);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
}
.hero-nouveau::before {
    content: '';
    position: absolute;
    top: -20%; right: -10%;
    width: 600px; height: 600px;
    background: radial-gradient(circle, rgba(255,107,53,0.15), transparent 70%);
    border-radius: 50%;
    animation: float-hero 8s ease-in-out infinite;
}
.hero-nouveau::after {
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
.hero-grid {
    display: grid;
    grid-template-columns: 1.1fr 0.9fr;
    gap: 60px;
    align-items: center;
    position: relative;
    z-index: 2;
}
.hero-content-nouveau {
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
.hero-buttons-nouveau {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 30px;
    animation: fadeInUp 0.8s ease 0.3s both;
}
.btn-hero-nouveau {
    padding: 14px 28px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 0.95rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}
.btn-hero-nouveau.btn-orange {
    background: var(--orange);
    color: white;
    box-shadow: 0 8px 24px rgba(255,107,53,0.3);
}
.btn-hero-nouveau.btn-orange:hover {
    background: var(--orange-dark);
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(255,107,53,0.4);
}
.btn-hero-nouveau.btn-outline {
    background: rgba(255,255,255,0.08);
    color: white;
    border: 1.5px solid rgba(255,255,255,0.2);
}
.btn-hero-nouveau.btn-outline:hover {
    background: rgba(255,255,255,0.15);
    border-color: rgba(255,255,255,0.4);
}
.hero-rappel {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: rgba(255,255,255,0.8);
    font-size: 0.95rem;
    text-decoration: none;
    transition: all 0.3s ease;
    animation: fadeInUp 0.8s ease 0.4s both;
    cursor: pointer;
    border: none;
    background: none;
    font-family: inherit;
}
.hero-rappel i {
    width: 40px; height: 40px;
    border-radius: 50%;
    background: rgba(255,107,53,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--orange);
    font-size: 1rem;
    transition: all 0.3s ease;
}
.hero-rappel:hover {
    color: var(--orange);
}
.hero-rappel:hover i {
    background: var(--orange);
    color: white;
    transform: scale(1.1);
}

/* Hero Image Collage */
.hero-image-collage {
    position: relative;
    height: 500px;
}
.collage-main {
    position: absolute;
    width: 55%;
    height: 70%;
    top: 5%;
    left: 5%;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow-xl);
    transform: rotate(-3deg);
    transition: all 0.5s ease;
    border: 4px solid white;
}
.collage-main:hover {
    transform: rotate(0deg) scale(1.02);
    z-index: 10;
}
.collage-main img {
    width: 100%; height: 100%;
    object-fit: cover;
}
.collage-secondary {
    position: absolute;
    width: 45%;
    height: 50%;
    bottom: 5%;
    right: 5%;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    transform: rotate(3deg);
    transition: all 0.5s ease;
    border: 4px solid white;
    z-index: 2;
}
.collage-secondary:hover {
    transform: rotate(0deg) scale(1.02);
    z-index: 10;
}
.collage-secondary img {
    width: 100%; height: 100%;
    object-fit: cover;
}
.collage-tertiary {
    position: absolute;
    width: 35%;
    height: 35%;
    top: 20%;
    right: 0;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transform: rotate(5deg);
    transition: all 0.5s ease;
    border: 3px solid white;
    z-index: 3;
}
.collage-tertiary:hover {
    transform: rotate(0deg) scale(1.05);
    z-index: 10;
}
.collage-tertiary img {
    width: 100%; height: 100%;
    object-fit: cover;
}
.collage-badge {
    position: absolute;
    bottom: 15%;
    left: 0;
    background: var(--orange);
    color: white;
    padding: 12px 24px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 0.9rem;
    box-shadow: var(--shadow-orange);
    z-index: 5;
    animation: pulse-badge 2s infinite;
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
   NOS SOLUTIONS - CARDS HORIZONTALES
   ============================================ */
.solutions-section {
    background: var(--cream);
}
.solutions-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
}
.solution-card {
    background: var(--white);
    border-radius: 20px;
    padding: 35px 24px;
    text-align: center;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: 1px solid var(--gray-100);
    position: relative;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
}
.solution-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light));
    transform: scaleX(0);
    transition: transform 0.4s ease;
}
.solution-card:hover::before {
    transform: scaleX(1);
}
.solution-card:hover {
    background: var(--white);
    border-color: transparent;

    box-shadow: 0 20px 40px rgba(0,0,0,0.12);
     opacity: 1;
    transform: translateY(0);
}
.solution-cta span {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #ff6b35;
    font-weight: 600;
    font-size: 0.95rem;
}
.solution-cta span i {
    transition: transform 0.3s ease;
}
.solution-card::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.5s ease;
}

.solution-card:hover::after {
    left: 100%;
}

.solution-icon-wrap {
    width: 70px; height: 70px;
    border-radius: 18px;
    background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 1.8rem;
    transition: all 0.4s ease;
}
.solution-card:hover .solution-icon-wrap {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    color: white;
    transform: scale(1.1) rotate(-5deg);
    box-shadow: var(--shadow-orange);
}
.solution-card h3 {
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 10px;
}
.solution-card p {
    font-size: 0.88rem;
    color: var(--gray-600);
    line-height: 1.7;
    margin: 0;
}
.solution-cta {
    text-align: center;
    margin-top: 15px;
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.3s ease;
}

@media (max-width: 1199px) {
    .solutions-grid { grid-template-columns: repeat(3, 1fr); }
}
@media (max-width: 767px) {
    .solutions-grid { grid-template-columns: repeat(2, 1fr); }
    .hero-grid { grid-template-columns: 1fr; }
    .hero-image-collage { display: none; }
}

/* ============================================
   NOS COURS - LISTE VISUELLE
   ============================================ */
.cours-section {
    background: var(--white);
    position: relative;
    overflow: hidden;
}

.cours-slider-global {
    position: relative;
    min-height: 620px;
}

.cours-slide-item {
    position: absolute;
    inset: 0;
    width: 100%;
    opacity: 0;
    visibility: hidden;
    transform: translateY(25px);
    transition: opacity 0.8s ease, transform 0.8s ease, visibility 0.8s ease;
}

.cours-slide-item.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    position: relative;
}

.cours-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.cours-text-content {
    animation: fadeInLeft 0.8s ease;
}

.cours-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.cours-item {
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 20px 24px;
    background: var(--cream);
    border-radius: 14px;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.cours-item:hover {
    background: var(--white);
    border-color: var(--orange);
    transform: translateX(10px);
    box-shadow: var(--shadow-md);
}

.cours-check {
    width: 44px;
    height: 44px;
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

.cours-item span {
    font-size: 1.05rem;
    font-weight: 600;
    color: var(--blue);
}

.cours-image-wrap {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: var(--shadow-xl);
    height: 450px;
    animation: fadeInRight 0.8s ease;
}

.cours-image-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s ease;
}

.cours-slide-item.active .cours-image-wrap img {
    animation: zoomImage 5s linear;
}

.cours-image-wrap:hover img {
    transform: scale(1.05);
}

.cours-image-badge {
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

.cours-cta {
    margin-top: 40px;
}

/* DOTS */
.cours-slider-dots {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: 30px;
}

.cours-dot {
    width: 14px;
    height: 14px;
    border-radius: 50%;
    border: none;
    background: #d1d5db;
    cursor: pointer;
    transition: all 0.3s ease;
}

.cours-dot.active {
    background: var(--orange);
    transform: scale(1.2);
    box-shadow: 0 0 0 6px rgba(255, 140, 0, 0.15);
}

/* ANIMATIONS */
@keyframes fadeInLeft {
    from {
        opacity: 0;
        transform: translateX(-35px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(35px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes zoomImage {
    from {
        transform: scale(1);
    }
    to {
        transform: scale(1.08);
    }
}

@media (max-width: 991px) {
    .cours-slider-global {
        min-height: auto;
    }

    .cours-layout {
        grid-template-columns: 1fr;
    }

    .cours-slide-item,
    .cours-slide-item.active {
        position: relative;
        opacity: 1;
        visibility: visible;
        transform: none;
        display: none;
    }

    .cours-slide-item.active {
        display: block;
    }

    .cours-image-wrap {
        order: -1;
        height: 300px;
        margin-bottom: 25px;
    }

    .cours-image-badge {
        left: 20px;
        bottom: 20px;
        font-size: 0.95rem;
        padding: 12px 18px;
    }
}
/* ============================================
   NOS ACTIVITÉS - GRID VISUEL
   ============================================ */
.activites-section {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
    position: relative;
    overflow: hidden;
}
.activites-section::before {
    content: '';
    position: absolute;
    top: -100px; right: -100px;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(255,107,53,0.1), transparent 70%);
}
.activites-section .section-title-big { color: white; }
.activites-section .section-subtitle { color: rgba(255,255,255,0.7); }
.activites-section .section-label-orange { color: var(--orange-light); }
.activites-section .section-label-orange::before { background: var(--orange-light); }

.activites-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}
.activite-card {
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 20px;
    padding: 35px 24px;
    text-align: center;
    transition: all 0.4s ease;
}
.activite-card:hover {
    background: rgba(255,255,255,0.12);
    transform: translateY(-8px);
    border-color: rgba(255,107,53,0.3);
}
.activite-icon {
    width: 65px; height: 65px;
    border-radius: 18px;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
    font-size: 1.6rem;
    color: white;
    box-shadow: 0 10px 25px rgba(255,107,53,0.3);
    transition: all 0.4s ease;
}
.activite-card:hover .activite-icon {
    transform: rotate(10deg) scale(1.1);
}
.activite-card h4 {
    font-size: 1.05rem;
    font-weight: 700;
    color: white;
    margin: 0;
}
.activite-cta {
    text-align: center;
    margin-top: 50px;
}

@media (max-width: 991px) {
    .activites-grid { grid-template-columns: repeat(2, 1fr); }
}

/* ============================================
   POURQUOI NOUS - FEATURES SPLIT
   ============================================ */
.pourquoi-section {
    background: var(--cream);
}
.pourquoi-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 80px;
    align-items: center;
}
.pourquoi-features {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}
.pourquoi-feature {
    background: var(--white);
    padding: 28px;
    border-radius: 16px;
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
    border: 1px solid transparent;
}
.pourquoi-feature:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-md);
    border-color: rgba(255,107,53,0.2);
}
.pourquoi-feature i {
    width: 45px; height: 45px;
    border-radius: 12px;
    background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--orange);
    font-size: 1.1rem;
    margin-bottom: 14px;
    transition: all 0.3s ease;
}
.pourquoi-feature:hover i {
    background: var(--orange);
    color: white;
}
.pourquoi-feature h4 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 8px;
}
.pourquoi-feature p {
    font-size: 0.88rem;
    color: var(--gray-600);
    line-height: 1.6;
    margin: 0;
}
.pourquoi-image {
    position: relative;
}
.pourquoi-image img {
    width: 100%;
    border-radius: 24px;
    box-shadow: var(--shadow-xl);
}
.pourquoi-stats-float {
    position: absolute;
    bottom: -20px;
    left: -20px;
    background: var(--orange);
    color: white;
    padding: 20px 28px;
    border-radius: 16px;
    box-shadow: var(--shadow-orange);
}
.pourquoi-stats-float .number {
    font-size: 2rem;
    font-weight: 800;
    line-height: 1;
}
.pourquoi-stats-float .label {
    font-size: 0.85rem;
    opacity: 0.9;
}

@media (max-width: 991px) {
    .pourquoi-layout { grid-template-columns: 1fr; gap: 40px; }
    .pourquoi-features { grid-template-columns: 1fr; }
}

/* ============================================
   COMMENT ÇA MARCHE - STEPS
   ============================================ */
.steps-section {
    background: var(--white);
}
.steps-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 40px;
    position: relative;
}
.steps-grid::before {
    content: '';
    position: absolute;
    top: 50px;
    left: 20%;
    right: 20%;
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
    width: 100px; height: 100px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    font-size: 2.5rem;
    font-weight: 800;
    color: white;
    box-shadow: var(--shadow-orange);
    position: relative;
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
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 10px;
}
.step-card p {
    font-size: 0.95rem;
    color: var(--gray-600);
    line-height: 1.7;
}
.step-cta {
    text-align: center;
    margin-top: 60px;
}

@media (max-width: 767px) {
    .steps-grid { grid-template-columns: 1fr; }
    .steps-grid::before { display: none; }
}

/* ============================================
   TÉMOIGNAGES - CARDS MODERNES
   ============================================ */
.testimonials-nouveau {
    background: var(--cream);
}
.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}
.testimonial-card-nouveau {
    background: var(--white);
    border-radius: 20px;
    padding: 35px;
    box-shadow: var(--shadow-sm);
    transition: all 0.4s ease;
    position: relative;
    border: 1px solid var(--gray-100);
}
.testimonial-card-nouveau:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
}
.testimonial-card-nouveau::before {
    content: '\201C';
    position: absolute;
    top: 20px; right: 25px;
    font-size: 5rem;
    color: rgba(255,107,53,0.08);
    font-family: Georgia, serif;
    line-height: 1;
}
.testimonial-stars {
    display: flex;
    gap: 4px;
    margin-bottom: 18px;
}
.testimonial-stars i {
    color: #FBBF24;
    font-size: 0.95rem;
}
.testimonial-text-nouveau {
    font-size: 1rem;
    color: var(--gray-600);
    line-height: 1.8;
    font-style: italic;
    margin-bottom: 24px;
}
.testimonial-author-nouveau {
    display: flex;
    align-items: center;
    gap: 14px;
}
.testimonial-avatar-nouveau {
    width: 50px; height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
}
.testimonial-author-nouveau .name {
    font-weight: 700;
    color: var(--blue);
    font-size: 0.95rem;
}
.testimonial-author-nouveau .role {
    font-size: 0.82rem;
    color: var(--gray-400);
}

@media (max-width: 991px) {
    .testimonials-grid { grid-template-columns: 1fr; }
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

@media (max-width: 767px) {
    .chiffres-grid { grid-template-columns: repeat(2, 1fr); }
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
.btn-cta-final.btn-green {
    background: #10B981;
    color: white;
    box-shadow: 0 8px 24px rgba(16,185,129,0.3);
}
.btn-cta-final.btn-green:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(16,185,129,0.4);
}
.btn-cta-final.btn-blue {
    background: var(--blue-accent);
    color: white;
    box-shadow: 0 8px 24px rgba(59,130,246,0.3);
}
.btn-cta-final.btn-blue:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(59,130,246,0.4);
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
@media (max-width: 767px) {
    .section-padding { padding: 60px 0; }
}

/* ============================================
   FIX MOBILE RESPONSIVE - LARGES AMÉLIORATIONS
   ============================================ */

/*
 - masquer texte sur très petits écrans */
@media (max-width: 575px) {
    .topbar-minimal .container {
        flex-direction: column;
        gap: 6px;
    }
    .topbar-info-minimal {
        flex-wrap: wrap;
        justify-content: center;
        gap: 8px;
    }
    .topbar-info-minimal span {
        font-size: 0.7rem;
    }
    .topbar-info-minimal span i {
        font-size: 0.7rem;
    }
}

/* Hero mobile */
@media (max-width: 991px) {
    .hero-nouveau {
        min-height: auto;
        padding: 60px 0 40px;
    }
    .hero-content-nouveau {
        padding: 0;
        text-align: center;
    }
    .hero-grid {
        gap: 30px;
    }
    .hero-title-nouveau {
        font-size: 1.8rem;
    }
    .hero-subtitle-nouveau {
        font-size: 0.95rem;
        max-width: 100%;
    }
    .hero-buttons-nouveau {
        justify-content: center;
    }
    .btn-hero-nouveau {
        font-size: 0.85rem;
        padding: 12px 20px;
    }
    .hero-label {
        font-size: 0.7rem;
        padding: 6px 12px;
    }
    .hero-rappel {
        justify-content: center;
        font-size: 0.85rem;
    }
}

@media (max-width: 575px) {
    .hero-title-nouveau {
        font-size: 1.5rem;
    }
    .hero-buttons-nouveau {
        flex-direction: column;
        align-items: stretch;
    }
    .btn-hero-nouveau {
        justify-content: center;
    }
}

/* Solutions mobile */
@media (max-width: 575px) {
    .solutions-grid {
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }
    .solution-card {
        padding: 20px 14px;
    }
    .solution-icon-wrap {
        width: 50px; height: 50px;
        font-size: 1.3rem;
        margin-bottom: 12px;
    }
    .solution-card h3 {
        font-size: 0.9rem;
    }
    .solution-card p {
        font-size: 0.78rem;
    }
}

/* Section header mobile */
@media (max-width: 575px) {
    .section-header-center {
        margin-bottom: 30px;
    }
    .section-title-big {
        font-size: 1.5rem;
    }
    .section-subtitle {
        font-size: 0.9rem;
    }
}

/* Cours slider mobile */
@media (max-width: 575px) {
    .cours-item {
        padding: 14px 16px;
        gap: 12px;
    }
    .cours-check {
        width: 36px;
        height: 36px;
        min-width: 36px;
        font-size: 0.8rem;
    }
    .cours-item span {
        font-size: 0.85rem;
    }
    .cours-image-wrap {
        height: 220px !important;
    }
}

/* Activités mobile */
@media (max-width: 575px) {
    .activites-grid {
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }
    .activite-card {
        padding: 20px 12px;
    }
    .activite-icon {
        width: 50px; height: 50px;
        font-size: 1.2rem;
        margin-bottom: 12px;
    }
    .activite-card h4 {
        font-size: 0.85rem;
    }
}

/* Pourquoi mobile */
@media (max-width: 575px) {
    .pourquoi-features {
        grid-template-columns: 1fr;
    }
    .pourquoi-feature {
        padding: 20px;
    }
    .pourquoi-feature h4 {
        font-size: 0.9rem;
    }
    .pourquoi-feature p {
        font-size: 0.82rem;
    }
    .pourquoi-stats-float {
        position: relative;
        bottom: auto;
        left: auto;
        margin-top: 20px;
        text-align: center;
    }
}

/* Steps mobile */
@media (max-width: 575px) {
    .step-number {
        width: 70px;
        height: 70px;
        font-size: 1.8rem;
        margin-bottom: 16px;
    }
    .step-card h3 {
        font-size: 1rem;
    }
    .step-card p {
        font-size: 0.85rem;
    }
}

/* Testimonials mobile */
@media (max-width: 575px) {
    .testimonial-card-nouveau {
        padding: 24px;
    }
    .testimonial-text-nouveau {
        font-size: 0.9rem;
    }
}

/* Chiffres mobile */
@media (max-width: 575px) {
    .chiffres-grid {
        gap: 20px;
    }
    .chiffre-item .number {
        font-size: 2rem;
    }
    .chiffre-item .label {
        font-size: 0.8rem;
    }
    .chiffre-item .icon {
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
        margin-bottom: 10px;
    }
}

/* CTA mobile */
@media (max-width: 575px) {
    .cta-buttons-final {
        flex-direction: column;
        align-items: stretch;
    }
    .btn-cta-final {
        justify-content: center;
        font-size: 0.9rem;
        padding: 14px 24px;
    }
}

/* Footer mobile */
@media (max-width: 575px) {
    .footer-grid {
        gap: 30px;
    }
    .footer-brand-moderne p {
        font-size: 0.85rem;
    }
    .footer-col-title {
        font-size: 0.9rem;
    }
    .footer-links-moderne a {
        font-size: 0.82rem;
    }
}

/* Back to top mobile */
@media (max-width: 575px) {
    .back-to-top-moderne {
        width: 40px;
        height: 40px;
        font-size: 0.9rem;
        bottom: 20px;
        right: 20px;
    }
}

/* Modal mobile - centré avec taille adaptée */
@media (max-width: 575px) {
    .rappel-modal-overlay {
        padding: 16px;
        align-items: flex-end;
    }
    .rappel-modal-box {
        padding: 28px 20px;
        border-radius: 20px 20px 0 0;
        max-width: 100%;
        transform: translateY(100%) scale(1);
    }
    .rappel-modal-overlay.active .rappel-modal-box {
        transform: translateY(0) scale(1);
    }
    .rappel-modal-header {
        margin-bottom: 20px;
    }
    .rappel-modal-header h3 {
        font-size: 1.2rem;
    }
    .rappel-modal-header p {
        font-size: 0.85rem;
    }
    .rappel-form-group {
        margin-bottom: 16px;
    }
    .rappel-form-group input {
        height: 48px;
        font-size: 0.95rem;
        padding: 0 14px;
    }
    .rappel-submit-btn {
        height: 50px;
        font-size: 0.95rem;
    }
    .rappel-close {
        width: 32px;
        height: 32px;
        font-size: 20px;
        top: 10px;
        right: 12px;
    }
    .rappel-icon {
        width: 55px;
        height: 55px;
        font-size: 22px;
    }
}
/* --- Overlay du modal --- */
.modal-niveau-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(8px);
    z-index: 9999;
    justify-content: center;
    align-items: center;
    padding: 20px;
    animation: fadeInOverlay 0.3s ease;
}

.modal-niveau-overlay.active {
    display: flex;
}

@keyframes fadeInOverlay {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* --- Container du modal --- */
.modal-niveau-container {
    background: #fff;
    border-radius: 24px;
    width: 100%;
    max-width: 600px;
    max-height: 90vh;
    overflow-y: auto;
    position: relative;
    box-shadow: 0 25px 80px rgba(0,0,0,0.25);
    animation: slideUpModal 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

@keyframes slideUpModal {
    from { opacity: 0; transform: translateY(40px) scale(0.95); }
    to { opacity: 1; transform: translateY(0) scale(1); }
}

/* --- Bouton fermer --- */
.modal-niveau-close {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: none;
    background: #f5f5f5;
    color: #333;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
}

.modal-niveau-close:hover {
    background: #ff6b35;
    color: #fff;
    transform: rotate(90deg);
}

/* --- Header du modal --- */
.modal-niveau-header {
    text-align: center;
    padding: 50px 30px 30px;
    background: linear-gradient(135deg, #fff8f5 0%, #fff 100%);
    border-bottom: 1px solid #f0f0f0;
}

.modal-niveau-icon {
    width: 70px;
    height: 70px;
    border-radius: 20px;
    background: linear-gradient(135deg, #ff6b35, #ff8c5a);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 1.8rem;
    color: #fff;
    box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3);
}

.modal-niveau-header h2 {
    font-size: 1.6rem;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 8px;
}

.modal-niveau-header p {
    color: #666;
    font-size: 0.95rem;
}

/* --- Body du modal (les boutons) --- */
.modal-niveau-body {
    padding: 30px;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* --- Boutons de sous-catégories --- */
.niveau-btn {
    display: flex;
    align-items: center;
    gap: 18px;
    padding: 22px 25px;
    border-radius: 16px;
    border: 2px solid #f0f0f0;
    background: #fff;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.niveau-btn::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 4px;
    background: #ff6b35;
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

.niveau-btn:hover {
    border-color: #ff6b35;
    background: #fff8f5;
    transform: translateX(5px);
    box-shadow: 0 8px 25px rgba(255, 107, 53, 0.15);
}

.niveau-btn:hover::before {
    transform: scaleY(1);
}

.niveau-btn-icon {
    width: 50px;
    height: 50px;
    min-width: 50px;
    border-radius: 14px;
    background: linear-gradient(135deg, #ff6b35, #ff8c5a);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: #fff;
    transition: all 0.3s ease;
}

.niveau-btn:hover .niveau-btn-icon {
    transform: scale(1.1) rotate(-5deg);
    box-shadow: 0 8px 20px rgba(255, 107, 53, 0.3);
}

.niveau-btn-content {
    flex: 1;
    text-align: left;
}

.niveau-btn-content h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 4px;
}

.niveau-btn-content p {
    font-size: 0.85rem;
    color: #888;
    margin: 0;
}

.niveau-btn-arrow {
    color: #ccc;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.niveau-btn:hover .niveau-btn-arrow {
    color: #ff6b35;
    transform: translateX(5px);
}

/* --- Responsive --- */
@media (max-width: 576px) {
    .modal-niveau-container {
        border-radius: 20px;
        margin: 10px;
    }

    .modal-niveau-header {
        padding: 40px 20px 25px;
    }

    .modal-niveau-body {
        padding: 20px;
    }

    .niveau-btn {
        padding: 18px 20px;
    }

    .niveau-btn-icon {
        width: 45px;
        height: 45px;
        min-width: 45px;
    }
}
.modal-activites-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.65);
    backdrop-filter: blur(10px);
    z-index: 9999;
    justify-content: center;
    align-items: center;
    padding: 20px;
    animation: fadeInActivitesOverlay 0.3s ease;
}

.modal-activites-overlay.active {
    display: flex;
}

@keyframes fadeInActivitesOverlay {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* --- Container --- */
.modal-activites-container {
    background: #fff;
    border-radius: 28px;
    width: 100%;
    max-width: 900px;
    max-height: 90vh;
    overflow-y: auto;
    position: relative;
    box-shadow: 0 30px 100px rgba(0,0,0,0.3);
    animation: slideUpActivitesModal 0.45s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

@keyframes slideUpActivitesModal {
    from { opacity: 0; transform: translateY(50px) scale(0.92); }
    to { opacity: 1; transform: translateY(0) scale(1); }
}

/* --- Bouton fermer --- */
.modal-activites-close {
    position: absolute;
    top: 22px;
    right: 22px;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: none;
    background: #f5f5f5;
    color: #333;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
}

.modal-activites-close:hover {
    background: #ff6b35;
    color: #fff;
    transform: rotate(90deg) scale(1.1);
}

/* --- Header --- */
.modal-activites-header {
    text-align: center;
    padding: 55px 30px 35px;
    background: linear-gradient(135deg, #fff8f5 0%, #fff 60%, #fff8f5 100%);
    border-bottom: 1px solid #f0e6e0;
    position: relative;
    overflow: hidden;
}

.modal-activites-header::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,107,53,0.05) 0%, transparent 70%);
    pointer-events: none;
}

.modal-activites-icon {
    width: 75px;
    height: 75px;
    border-radius: 22px;
    background: linear-gradient(135deg, #ff6b35, #ff8c5a, #ffa07a);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 22px;
    font-size: 2rem;
    color: #fff;
    box-shadow: 0 12px 35px rgba(255, 107, 53, 0.35);
    position: relative;
}

.modal-activites-icon::after {
    content: '';
    position: absolute;
    inset: -4px;
    border-radius: 26px;
    border: 2px solid rgba(255, 107, 53, 0.2);
    animation: pulseIcon 2s infinite;
}

@keyframes pulseIcon {
    0%, 100% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.05); opacity: 0.5; }
}

.modal-activites-header h2 {
    font-size: 1.8rem;
    font-weight: 800;
    color: #1a1a2e;
    margin-bottom: 10px;
    position: relative;
}

.modal-activites-header p {
    color: #777;
    font-size: 1rem;
    max-width: 400px;
    margin: 0 auto;
    position: relative;
}

/* --- Body --- */
.modal-activites-body {
    padding: 35px;
}

/* --- Catégorie section --- */
.activite-categorie {
    margin-bottom: 30px;
}

.activite-categorie:last-child {
    margin-bottom: 0;
}

.activite-categorie-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 18px;
    padding-bottom: 12px;
    border-bottom: 2px solid #f5f5f5;
}

.activite-categorie-icon {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    background: linear-gradient(135deg, #ff6b35, #ff8c5a);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    color: #fff;
}

.activite-categorie-header h3 {
    font-size: 1.15rem;
    font-weight: 700;
    color: #1a1a2e;
    margin: 0;
}

.activite-categorie-header span {
    font-size: 0.85rem;
    color: #999;
    font-weight: 500;
}

/* --- Grid des activités --- */
.activites-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 14px;
}

/* --- Bouton activité --- */
.activite-btn {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 16px 18px;
    border-radius: 16px;
    border: 2px solid #f0f0f0;
    background: #fff;
    text-decoration: none;
    color: inherit;
    transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.activite-btn::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 0;
    background: linear-gradient(90deg, #ff6b35, transparent);
    opacity: 0.08;
    transition: width 0.4s ease;
}

.activite-btn:hover {
    border-color: #ff6b35;
    background: #fff8f5;
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 12px 30px rgba(255, 107, 53, 0.15);
}

.activite-btn:hover::before {
    width: 100%;
}

.activite-btn-icon {
    width: 42px;
    height: 42px;
    min-width: 42px;
    border-radius: 12px;
    background: linear-gradient(135deg, #ff6b35, #ff8c5a);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    color: #fff;
    transition: all 0.3s ease;
    position: relative;
    z-index: 1;
}

.activite-btn:hover .activite-btn-icon {
    transform: scale(1.15) rotate(-8deg);
    box-shadow: 0 8px 20px rgba(255, 107, 53, 0.3);
}

.activite-btn-content {
    flex: 1;
    position: relative;
    z-index: 1;
}

.activite-btn-content h4 {
    font-size: 0.95rem;
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 3px;
    line-height: 1.3;
}

.activite-btn-content p {
    font-size: 0.78rem;
    color: #999;
    margin: 0;
}

.activite-btn-arrow {
    color: #ddd;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    position: relative;
    z-index: 1;
}

.activite-btn:hover .activite-btn-arrow {
    color: #ff6b35;
    transform: translateX(6px);
}

/* --- Responsive --- */
@media (max-width: 768px) {
    .modal-activites-container {
        border-radius: 22px;
        max-height: 95vh;
    }

    .modal-activites-header {
        padding: 45px 20px 25px;
    }

    .modal-activites-header h2 {
        font-size: 1.5rem;
    }

    .modal-activites-body {
        padding: 25px 20px;
    }

    .activites-grid {
        grid-template-columns: 1fr;
    }

    .activite-btn {
        padding: 14px 16px;
    }
}

@media (max-width: 480px) {
    .modal-activites-overlay {
        padding: 10px;
    }

    .modal-activites-container {
        border-radius: 18px;
    }

    .activite-btn-content h4 {
        font-size: 0.9rem;
    }
}
</style>
<body>

@include('partials.header')

<!-- ============================================
     HERO - NOUVEAU
     ============================================ -->
<section class="hero-nouveau">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content-nouveau">
                <div class="hero-label"><i class="fas fa-star"></i> Leader de l'accompagnement éducatif en Côte d'Ivoire</div>
                <h1 class="hero-title-nouveau">Réussir à l'école, <span class="highlight-orange">révéler ses talents</span>, développer ses compétences.</h1>
                <p class="hero-subtitle-nouveau">Soutien scolaire, activités éducatives et formations professionnelles pour accompagner chaque apprenant vers la réussite.</p>

                <div class="hero-buttons-nouveau">
                    <a href="#solutions" class="btn-hero-nouveau btn-orange"><i class="fas fa-book"></i> Nos cours</a>
                    <a href="#activites" class="btn-hero-nouveau btn-outline"><i class="fas fa-palette"></i> Nos activités</a>
                    <a href="{{ url('/formations') }}" class="btn-hero-nouveau btn-outline"><i class="fas fa-graduation-cap"></i> Nos formations</a>
                </div>

                <button type="button" class="hero-rappel" id="openRappelModal">
                    <i class="fas fa-phone-alt"></i>
                    <span>Être rappelé gratuitement</span>
                </button>
            </div>

            <div class="hero-image-collage d-none d-lg-block">
                <div class="collage-main">
                    <img src="asset/img/enfnoi.jpeg" alt="Enfant en cours">
                </div>
                <div class="collage-secondary">
                    <img src="asset/img/deux.jpg" alt="Formation adulte">
                </div>
                <div class="collage-tertiary">
                    <img src="asset/img/ligne.jpeg" alt="Activité créative">
                </div>
                <div class="collage-badge"><i class="fas fa-check-circle"></i> 5000+ familles accompagnées </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     MODAL RAPPEL - PLACÉ EN DEHORS DU HERO
     ============================================ -->
<div class="rappel-modal-overlay" id="rappelModal">
    <div class="rappel-modal-box">
        <button class="rappel-close" id="closeRappelModal" type="button">&times;</button>

        <div class="rappel-modal-header">
            <div class="rappel-icon">
                <i class="fas fa-phone-alt"></i>
            </div>
            <h3>Être rappelé gratuitement</h3>
            <p>Laissez votre nom et votre numéro, nous vous recontacterons rapidement.</p>
        </div>

        <form id="rappelForm">
            @csrf

            <div class="rappel-form-group">
                <label for="nom">Nom complet</label>
                <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" autocomplete="name">
                <small class="error-text" id="error-nom"></small>
            </div>

            <div class="rappel-form-group">
                <label for="telephone">Numéro de téléphone</label>
                <input type="tel" id="telephone" name="telephone" placeholder="Ex: 0700000000" autocomplete="tel">
                <small class="error-text" id="error-telephone"></small>
            </div>

            <button type="submit" class="rappel-submit-btn" id="submitRappelBtn">
                Envoyer ma demande
            </button>

            <div class="rappel-success-message" id="rappelSuccessMessage"></div>
        </form>
    </div>
</div>

<!-- ============================================
     NOS SOLUTIONS - VERSION INTERACTIVE MODALE
     ============================================ -->
<section id="solutions" class="solutions-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Nos solutions</div>
            <h2 class="section-title-big">Un accompagnement pour chaque étape de la vie</h2>
            <p class="section-subtitle">Des solutions adaptées à chaque profil et chaque objectif</p>
        </div>

        <div class="solutions-grid">
            <!-- PRIMAIRE -->
            <div class="solution-card animate-scroll" onclick="openNiveauModal('primaire')">
                <div class="solution-icon-wrap"><i class="fas fa-child"></i></div>
                <h3>🎒 Primaire</h3>
                <p>Construire de bonnes bases pour réussir durablement</p>
                <div class="solution-cta"><span>Explorer <i class="fas fa-arrow-right"></i></span></div>
            </div>

            <!-- COLLÈGE -->
            <div class="solution-card animate-scroll" onclick="openNiveauModal('college')">
                <div class="solution-icon-wrap"><i class="fas fa-school"></i></div>
                <h3>📚 Collège</h3>
                <p>Renforcer les connaissances et développer la confiance</p>
                <div class="solution-cta"><span>Explorer <i class="fas fa-arrow-right"></i></span></div>
            </div>

            <!-- LYCÉE -->
            <div class="solution-card animate-scroll" onclick="openNiveauModal('lycee')">
                <div class="solution-icon-wrap"><i class="fas fa-university"></i></div>
                <h3>🎓 Lycée</h3>
                <p>Préparer efficacement les grandes échéances</p>
                <div class="solution-cta"><span>Explorer <i class="fas fa-arrow-right"></i></span></div>
            </div>

            <!-- SUPÉRIEUR -->
            <div class="solution-card animate-scroll" onclick="openNiveauModal('superieur')">
                <div class="solution-icon-wrap"><i class="fas fa-user-graduate"></i></div>
                <h3>🎓 Enseignement supérieur</h3>
                <p>Réussir ses études et développer son autonomie</p>
                <div class="solution-cta"><span>Explorer <i class="fas fa-arrow-right"></i></span></div>
            </div>

            <!-- ADULTES -->
            <div class="solution-card animate-scroll" onclick="openNiveauModal('adultes')">
                <div class="solution-icon-wrap"><i class="fas fa-users"></i></div>
                <h3>🚀 Adultes et professionnels</h3>
                <p>Développer les compétences qui ouvrent de nouvelles opportunités</p>
                <div class="solution-cta"><span>Explorer <i class="fas fa-arrow-right"></i></span></div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     MODAL NIVEAUX
     ============================================ -->
<div id="modalNiveau" class="modal-niveau-overlay">
    <div class="modal-niveau-container">
        <button class="modal-niveau-close" onclick="closeNiveauModal()">
            <i class="fas fa-times"></i>
        </button>

        <div class="modal-niveau-header">
            <div class="modal-niveau-icon" id="modalIcon"></div>
            <h2 id="modalTitle">Titre</h2>
            <p id="modalSubtitle">Sous-titre</p>
        </div>

        <div class="modal-niveau-body" id="modalBody">
            <!-- Les boutons seront injectés ici par JS -->
        </div>
    </div>
</div>

<!-- ============================================
     NOS COURS
     ============================================ -->
<section class="cours-section section-padding">
    <div class="container">
        <div class="cours-slider-global" id="coursGlobalSlider">

            <!-- SLIDE 1 : DCG / DSCG -->
            <div class="cours-slide-item active">
                <div class="cours-layout">
                    <div class="animate-scroll cours-text-content">
                        <div class="section-label-orange">Nos cours</div>
                        <h2 class="section-title-big">
                            Réussissez votre <span style="color: var(--orange);">DCG & DSCG</span> avec un accompagnement <span style="color: var(--orange);">structuré</span>
                        </h2>
                        <p class="section-subtitle" style="margin-bottom: 35px;">
                            Des cours complets et un suivi sérieux pour progresser efficacement en comptabilité, gestion et finance.
                        </p>

                        <div class="cours-list">
                            <div class="cours-item"><div class="cours-check"><i class="fas fa-check"></i></div><span>Préparation complète DSCG</span></div>
                            <div class="cours-item"><div class="cours-check"><i class="fas fa-check"></i></div><span>Cours en ligne accessibles partout</span></div>
                            <div class="cours-item"><div class="cours-check"><i class="fas fa-check"></i></div><span>Exercices, méthodologie et annales</span></div>
                            <div class="cours-item"><div class="cours-check"><i class="fas fa-check"></i></div><span>Suivi personnalisé de la progression</span></div>
                        </div>

                        <div class="cours-cta">
                            <a href="{{ url('/reponse') }}" class="btn-hero-nouveau btn-orange">
                                Découvrir tous nos cours <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="cours-image-wrap animate-scroll">
                        <img src="asset/img/ok2.jpeg" alt="DCG DSCG">
                        <div class="cours-image-badge">
                            <i class="fas fa-graduation-cap"></i> DCG & DSCG en ligne
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 2 : SOUTIEN SCOLAIRE -->
            <div class="cours-slide-item">
                <div class="cours-layout">
                    <div class="animate-scroll cours-text-content">
                        <div class="section-label-orange">Nos cours</div>
                        <h2 class="section-title-big">
                            Un <span style="color: var(--orange);">soutien scolaire</span> sur mesure pour reprendre <span style="color: var(--orange);">confiance</span>
                        </h2>
                        <p class="section-subtitle" style="margin-bottom: 35px;">
                            Un accompagnement adapté au rythme de chaque apprenant pour consolider les bases, améliorer les résultats et retrouver de la méthode.
                        </p>

                        <div class="cours-list">
                            <div class="cours-item"><div class="cours-check"><i class="fas fa-check"></i></div><span>Soutien scolaire toutes matières</span></div>
                            <div class="cours-item"><div class="cours-check"><i class="fas fa-check"></i></div><span>Aide aux devoirs et révisions</span></div>
                            <div class="cours-item"><div class="cours-check"><i class="fas fa-check"></i></div><span>Préparation aux examens et concours</span></div>
                            <div class="cours-item"><div class="cours-check"><i class="fas fa-check"></i></div><span>Accompagnement des apprenants DYS</span></div>
                            <div class="cours-item"><div class="cours-check"><i class="fas fa-check"></i></div><span>Coaching méthodologique</span></div>
                        </div>

                        <div class="cours-cta">
                            <a href="{{ url('/reponse') }}" class="btn-hero-nouveau btn-orange">
                                Découvrir tous nos cours <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="cours-image-wrap animate-scroll">
                        <img src="asset/img/souta.jpeg" alt="Soutien scolaire">
                        <div class="cours-image-badge">
                            <i class="fas fa-book-open"></i> Soutien scolaire
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 3 : FORMATIONS -->
            <div class="cours-slide-item">
                <div class="cours-layout">
                    <div class="animate-scroll cours-text-content">
                        <div class="section-label-orange">Nos cours</div>
                        <h2 class="section-title-big">
                            Développez vos compétences avec nos <span style="color: var(--orange);">formations professionnelles</span>
                        </h2>
                        <p class="section-subtitle" style="margin-bottom: 35px;">
                            Des formations pratiques et ciblées pour renforcer vos compétences, évoluer professionnellement et répondre aux exigences du marché.
                        </p>

                        <div class="cours-list">
                            <div class="cours-item"><div class="cours-check"><i class="fas fa-check"></i></div><span>Formations professionnelles certifiantes</span></div>
                            <div class="cours-item"><div class="cours-check"><i class="fas fa-check"></i></div><span>Comptabilité, gestion et outils métier</span></div>
                            <div class="cours-item"><div class="cours-check"><i class="fas fa-check"></i></div><span>Sessions adaptées aux besoins des apprenants</span></div>
                            <div class="cours-item"><div class="cours-check"><i class="fas fa-check"></i></div><span>Approche concrète et opérationnelle</span></div>
                            <div class="cours-item"><div class="cours-check"><i class="fas fa-check"></i></div><span>Accompagnement vers la montée en compétence</span></div>
                        </div>

                        <div class="cours-cta">
                            <a href="{{ url('/reponse') }}" class="btn-hero-nouveau btn-orange">
                                Découvrir tous nos cours <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="cours-image-wrap animate-scroll">
                        <img src="asset/img/formata.jpeg" alt="Formations professionnelles">
                        <div class="cours-image-badge">
                            <i class="fas fa-briefcase"></i> Formations professionnelles
                        </div>
                    </div>
                </div>
            </div>

            <!-- Indicateurs -->
            <div class="cours-slider-dots">
                <button class="cours-dot active" data-slide="0" type="button" aria-label="Slide 1"></button>
                <button class="cours-dot" data-slide="1" type="button" aria-label="Slide 2"></button>
                <button class="cours-dot" data-slide="2" type="button" aria-label="Slide 3"></button>
            </div>

        </div>
    </div>
</section>

<!-- ============================================
     NOS ACTIVITÉS
     ============================================ -->
<section id="activites" class="activites-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Nos activités</div>
            <h2 class="section-title-big">Développer les talents, stimuler la <span style="color: var(--orange-light);">créativité</span></h2>
            <p class="section-subtitle">L'apprentissage ne se limite pas aux salles de classe. Nous proposons des activités permettant aux enfants et aux jeunes de développer leurs passions, leur créativité et leurs compétences.</p>
        </div>

        <div class="activites-grid">
            <div class="activite-card animate-scroll">
                <div class="activite-icon"><i class="fas fa-music"></i></div>
                <h4>🎵 Musique et chant</h4>
            </div>
            <div class="activite-card animate-scroll">
                <div class="activite-icon"><i class="fas fa-robot"></i></div>
                <h4>🤖 Robotique et codage</h4>
            </div>
            <div class="activite-card animate-scroll">
                <div class="activite-icon"><i class="fas fa-language"></i></div>
                <h4>🌍 Les petits bilingues</h4>
            </div>
            <div class="activite-card animate-scroll">
                                <div class="activite-icon"><i class="fas fa-book-reader"></i></div>
                <h4>📚 Ma cabine à livres</h4>
            </div>
            <div class="activite-card animate-scroll">
                <div class="activite-icon"><i class="fas fa-running"></i></div>
                <h4>⚽ Sport à domicile</h4>
            </div>
            <div class="activite-card animate-scroll">
                <div class="activite-icon"><i class="fas fa-briefcase"></i></div>
                <h4>👩‍🍳 Mini métiers</h4>
            </div>
            <div class="activite-card animate-scroll">
                <div class="activite-icon"><i class="fas fa-spell-check"></i></div>
                <h4>✍️ Bouge ta grammaire et ton orthographe</h4>
            </div>
            <div class="activite-card animate-scroll">
                <div class="activite-icon"><i class="fas fa-palette"></i></div>
                <h4>🎨 Ateliers créatifs</h4>
            </div>
        </div>

        <!-- ============================================
     BOUTON CTA - DÉCOUVRIR NOS ACTIVITÉS
     ============================================ -->
<div class="activite-cta animate-scroll">
    <button class="btn-hero-nouveau btn-orange" onclick="openActivitesModal()">
        Découvrir nos activités <i class="fas fa-arrow-right"></i>
    </button>
</div>

<!-- ============================================
     MODAL NOS ACTIVITÉS
     ============================================ -->
<div id="modalActivites" class="modal-activites-overlay">
    <div class="modal-activites-container">
        <button class="modal-activites-close" onclick="closeActivitesModal()">
            <i class="fas fa-times"></i>
        </button>

        <div class="modal-activites-header">
            <div class="modal-activites-icon">
                <i class="fas fa-star"></i>
            </div>
            <h2>🎯 Nos activités</h2>
            <p>Des activités enrichissantes pour tous les âges et tous les niveaux</p>
        </div>

        <div class="modal-activites-body" id="activitesBody">
            <!-- Les catégories seront injectées ici par JS -->
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
        <div class="pourquoi-layout">
            <div class="animate-scroll">
                <div class="section-label-orange">Pourquoi nous ?</div>
                <h2 class="section-title-big">Une approche centrée sur la <span style="color: var(--orange);">réussite</span> de chaque apprenant</h2>
                <p class="section-subtitle" style="margin-bottom: 35px;">Nous ne proposons pas seulement des cours. Nous construisons un véritable parcours d'accompagnement.</p>

                <div class="pourquoi-features">
                    <div class="pourquoi-feature">
                        <i class="fas fa-user-check"></i>
                        <h4>👨‍🏫 Des enseignants rigoureusement sélectionnés</h4>
                        <p>Nos professeurs et formateurs sont choisis selon leurs compétences, leur expérience et leur capacité pédagogique.</p>
                    </div>
                    <div class="pourquoi-feature">
                        <i class="fas fa-home"></i>
                        <h4>🏠 Des cours flexibles</h4>
                        <p>À domicile, en centre ou en ligne : nous adaptons nos solutions à vos contraintes.</p>
                    </div>
                    <div class="pourquoi-feature">
                        <i class="fas fa-user-friends"></i>
                        <h4>🎯 Un accompagnement personnalisé</h4>
                        <p>Chaque apprenant bénéficie d'un programme adapté à son niveau, ses objectifs et son rythme.</p>
                    </div>
                    <div class="pourquoi-feature">
                        <i class="fas fa-chart-line"></i>
                        <h4>📈 Un suivi régulier des progrès</h4>
                        <p>Nous évaluons l'évolution de chaque apprenant afin d'améliorer continuellement son parcours.</p>
                    </div>
                    <div class="pourquoi-feature">
                        <i class="fas fa-heart"></i>
                        <h4>🤝 Une équipe proche et disponible</h4>
                        <p>Nous restons à l'écoute des familles, des apprenants et des partenaires.</p>
                    </div>
                    <div class="pourquoi-feature">
                        <i class="fas fa-lightbulb"></i>
                        <h4>💡 Une pédagogie moderne</h4>
                        <p>Nous utilisons des méthodes adaptées aux profils actuels d'apprentissage.</p>
                    </div>
                </div>
            </div>

            <div class="pourquoi-image animate-scroll">
                <img src="asset/img/deux.jpg" alt="Notre approche">
                <div class="pourquoi-stats-float">
                    <div class="number">100%</div>
                    <div class="label">Flexible - À domicile, en centre ou en ligne</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     NOTRE APPROCHE
     ============================================ -->
<section class="steps-section section-padding" style="background: var(--cream);">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Notre approche</div>
            <h2 class="section-title-big">Un accompagnement <span style="color: var(--orange);">100 % flexible</span></h2>
        </div>

        <div class="steps-grid">
            <div class="step-card animate-scroll">
                <div class="step-number"><i class="fas fa-home"></i></div>
                <h3>À domicile</h3>
            </div>
            <div class="step-card animate-scroll">
                <div class="step-number"><i class="fas fa-building"></i></div>
                <h3>En centre</h3>
            </div>
            <div class="step-card animate-scroll">
                <div class="step-number"><i class="fas fa-laptop"></i></div>
                <h3>En ligne</h3>
            </div>
            <div class="step-card animate-scroll">
                <div class="step-number"><i class="fas fa-bullseye"></i></div>
                <h3>Selon vos objectifs et votre disponibilité</h3>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     COMMENT ÇA MARCHE - STEPS
     ============================================ -->
<section class="steps-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Processus</div>
            <h2 class="section-title-big">Trouver un professeur ou une activité en <span style="color: var(--orange);">3 étapes simples</span></h2>
        </div>

        <div class="steps-grid">
            <div class="step-card animate-scroll">
                <div class="step-number">1</div>
                <h3>Choisissez votre parcours</h3>
                <p>Sélectionnez votre profil : Primaire • Collège • Lycée • Supérieur • Adultes</p>
            </div>
            <div class="step-card animate-scroll">
                <div class="step-number">2</div>
                <h3>Choisissez votre accompagnement</h3>
                <p>Découvrez nos cours, formations et activités adaptés à vos besoins.</p>
            </div>
            <div class="step-card animate-scroll">
                <div class="step-number">3</div>
                <h3>Commencez votre parcours vers la réussite</h3>
                <p>Nous vous accompagnons avec un professeur ou un formateur adapté à vos objectifs.</p>
            </div>
        </div>

        <div class="step-cta animate-scroll">
            <a href="{{ url('/formations') }}" class="btn-hero-nouveau btn-orange">Faire une demande <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>

<!-- ============================================
     TÉMOIGNAGES
     ============================================ -->
<section class="testimonials-nouveau section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Témoignages</div>
            <h2 class="section-title-big">Ils nous font <span style="color: var(--orange);">confiance</span></h2>
            <p class="section-subtitle">Des familles satisfaites et des apprenants accompagnés vers la réussite</p>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card-nouveau animate-scroll">
                <div class="testimonial-stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text-nouveau">"Mon fils a gagné en confiance et ses résultats ont nettement progressé. L'accompagnement est vraiment personnalisé et les professeurs sont très impliqués."</p>
                <div class="testimonial-author-nouveau">
                    <div class="testimonial-avatar-nouveau">N</div>
                    <div>
                        <div class="name">Nadine Guede</div>
                        <div class="role">Parent satisfaite</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card-nouveau animate-scroll">
                <div class="testimonial-stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text-nouveau">"Une équipe réactive et très professionnelle. Le suivi pédagogique est impeccable et la direction est toujours à l'écoute des parents comme des élèves."</p>
                <div class="testimonial-author-nouveau">
                    <div class="testimonial-avatar-nouveau">M</div>
                    <div>
                        <div class="name">Maguy Angoran</div>
                        <div class="role">Parent fidèle</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card-nouveau animate-scroll">
                <div class="testimonial-stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text-nouveau">"Excellente préparation au BAC. Ma fille a obtenu une mention Très Bien grâce au soutien constant et à la méthodologie enseignée."</p>
                <div class="testimonial-author-nouveau">
                    <div class="testimonial-avatar-nouveau">J</div>
                    <div>
                        <div class="name">J.B Neme</div>
                        <div class="role">Parent comblé</div>
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
            <h2 class="section-title-big" style="color: white;">MONPROFCHEZMOI CI en quelques <span style="color: #FFD700;">chiffres</span></h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.85);">Notre impact en quelques données</p>
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
                <div class="number">2000+</div>
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
            <h2 class="section-title-big">Donnez-vous toutes les chances de <span style="color: var(--orange);">réussir</span></h2>
            <p class="section-subtitle">Un soutien scolaire, une formation ou une activité éducative adaptée à vos besoins. Notre équipe vous accompagne pour trouver la meilleure solution selon votre objectif.</p>

            <div class="cta-buttons-final">
                <a href="{{ url('/formations') }}" class="btn-cta-final btn-blue"><i class="fas fa-graduation-cap"></i> 🔵 Demander une formation</a>
                <a href="tel:+2250153751544" class="btn-cta-final btn-outline-light"><i class="fas fa-phone-alt"></i> 📞 Nous contacter</a>
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
<a href="#" class="back-to-top-moderne" id="backToTop" aria-label="Retour en haut"><i class="fas fa-arrow-up"></i></a>

<!-- ============================================
     SCRIPTS
     ============================================ -->
     <script>
        const activitesData = [
    {
        niveau: 'Primaire',
        niveauDesc: 'De la maternelle au CM2',
        icon: '<i class="fas fa-child"></i>',
        items: [
            { icon: '<i class="fas fa-briefcase"></i>', title: 'Mini métiers', desc: 'Découvrir les métiers', url: "{{ url('/minimetier') }}" },
            { icon: '<i class="fas fa-robot"></i>', title: 'Robotique et ateliers créatifs', desc: 'Codage et création', url: "{{ url('/codage') }}" },
            { icon: '<i class="fas fa-language"></i>', title: 'Les petits bilingues', desc: 'Langues étrangères', url: "{{ url('/petit') }}" },
            { icon: '<i class="fas fa-music"></i>', title: 'Musique et chant', desc: 'Éveil musical', url: "{{ url('/musique') }}" },
            { icon: '<i class="fas fa-spell-check"></i>', title: 'Bouge ta grammaire', desc: 'Français ludique', url: "{{ url('/bouge') }}" },
            { icon: '<i class="fas fa-book-reader"></i>', title: 'Ma cabine à livres', desc: 'Lecture et imagination', url: "{{ url('/cabine') }}" },
            { icon: '<i class="fas fa-running"></i>', title: 'Sport enfant', desc: 'Activités physiques', url: "{{ url('/sportenf') }}" }
        ]
    },
    {
        niveau: 'Collège',
        niveauDesc: 'De la 6ème à la 3ème',
        icon: '<i class="fas fa-school"></i>',
        items: [
            { icon: '<i class="fas fa-graduation-cap"></i>', title: 'Coaching scolaire', desc: 'Accompagnement personnalisé', url: "{{ url('/coaching') }}" },
            { icon: '<i class="fas fa-briefcase"></i>', title: 'Mini métiers', desc: 'Découvrir les métiers', url: "{{ url('/minimetier') }}" },
            { icon: '<i class="fas fa-robot"></i>', title: 'Robotique', desc: 'Technologie et création', url: "{{ url('/college-competence') }}" },
            { icon: '<i class="fas fa-language"></i>', title: 'Les petits bilingues', desc: 'Langues étrangères', url: "{{ url('/petit') }}" },
            { icon: '<i class="fas fa-music"></i>', title: 'Musique et chant', desc: 'Éveil musical', url: "{{ url('/musique') }}" },
            { icon: '<i class="fas fa-spell-check"></i>', title: 'Bouge ta grammaire', desc: 'Français ludique', url: "{{ url('/bouge') }}" },
            { icon: '<i class="fas fa-book-reader"></i>', title: 'Ma cabine à livres', desc: 'Lecture et imagination', url: "{{ url('/cabine') }}" },
            { icon: '<i class="fas fa-running"></i>', title: 'Sport enfant', desc: 'Activités physiques', url: "{{ url('/sportenf') }}" }
        ]
    },
    {
        niveau: 'Lycée',
        niveauDesc: 'De la Seconde à la Terminale',
        icon: '<i class="fas fa-university"></i>',
        items: [
            { icon: '<i class="fas fa-briefcase"></i>', title: 'Mini métiers', desc: 'Découvrir les métiers', url: "{{ url('/minimetier') }}" },
            { icon: '<i class="fas fa-robot"></i>', title: 'Robotique', desc: 'Technologie et création', url: "{{ url('/college-competence') }}" },
            { icon: '<i class="fas fa-language"></i>', title: 'Les petits bilingues', desc: 'Langues étrangères', url: "{{ url('/petit') }}" },
            { icon: '<i class="fas fa-music"></i>', title: 'Musique et chant', desc: 'Éveil musical', url: "{{ url('/musique') }}" },
            { icon: '<i class="fas fa-spell-check"></i>', title: 'Bouge ta grammaire', desc: 'Français ludique', url: "{{ url('/bouge') }}" },
            { icon: '<i class="fas fa-book-reader"></i>', title: 'Ma cabine à livres', desc: 'Lecture et imagination', url: "{{ url('/cabine') }}" }
        ]
    },
    {
        niveau: 'Supérieur',
        niveauDesc: 'De la licence au master',
        icon: '<i class="fas fa-user-graduate"></i>',
        items: [
            { icon: '<i class="fas fa-microphone"></i>', title: 'Préparation aux oraux', desc: 'Confiance et expression', url: "{{ url('/musique') }}" },
            { icon: '<i class="fas fa-compass"></i>', title: 'Accompagnement à la réorientation', desc: 'Changer de voie', url: "{{ url('/musique') }}" },
            { icon: '<i class="fas fa-music"></i>', title: 'Musique et chant', desc: 'Éveil musical', url: "{{ url('/musique') }}" }
        ]
    },
    {
        niveau: 'Adultes',
        niveauDesc: 'Formations et activités',
        icon: '<i class="fas fa-users"></i>',
        items: [
            { icon: '<i class="fas fa-dumbbell"></i>', title: 'Sports à domicile pour adultes', desc: 'Bien-être physique', url: "{{ url('/musique') }}" },
            { icon: '<i class="fas fa-music"></i>', title: 'Musique et chant', desc: 'Éveil musical', url: "{{ url('/musique') }}" }
        ]
    }
];

function openActivitesModal() {
    const body = document.getElementById('activitesBody');

    // Générer les catégories d'activités
    body.innerHTML = activitesData.map(categorie => `
        <div class="activite-categorie">
            <div class="activite-categorie-header">
                <div class="activite-categorie-icon">${categorie.icon}</div>
                <div>
                    <h3>${categorie.niveau}</h3>
                    <span>${categorie.niveauDesc}</span>
                </div>
            </div>
            <div class="activites-grid">
                ${categorie.items.map(item => `
                    <a href="${item.url}" class="activite-btn">
                        <div class="activite-btn-icon">${item.icon}</div>
                        <div class="activite-btn-content">
                            <h4>${item.title}</h4>
                            <p>${item.desc}</p>
                        </div>
                        <div class="activite-btn-arrow"><i class="fas fa-chevron-right"></i></div>
                    </a>
                `).join('')}
            </div>
        </div>
    `).join('');

    // Afficher le modal
    document.getElementById('modalActivites').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeActivitesModal() {
    document.getElementById('modalActivites').classList.remove('active');
    document.body.style.overflow = '';
}

// Fermer en cliquant sur l'overlay
document.getElementById('modalActivites').addEventListener('click', function(e) {
    if (e.target === this) {
        closeActivitesModal();
    }
});

// Fermer avec la touche Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeActivitesModal();
    }
});
</script>
     <script>
        const niveauxData = {
    primaire: {
        icon: '<i class="fas fa-child"></i>',
        title: '🎒 Primaire',
        subtitle: 'De la maternelle au CM2',
        items: [
            {
                icon: '<i class="fas fa-book"></i>',
                title: 'Soutien scolaire toutes matières',
                desc: 'Accompagnement personnalisé dans toutes les disciplines',
                url: "{{ url('/primaire') }}"
            },
            {
                icon: '<i class="fas fa-puzzle-piece"></i>',
                title: 'Accompagnement DYS',
                desc: 'Méthodes adaptées pour les troubles d\'apprentissage',
                url: "{{ url('/accompagnement') }}"
            },
            {
                icon: '<i class="fas fa-tasks"></i>',
                title: 'Méthodologie et organisation',
                desc: 'Apprendre à apprendre efficacement',
                url: "{{ url('/methode') }}"
            }
        ]
    },
    college: {
        icon: '<i class="fas fa-school"></i>',
        title: '📚 Collège',
        subtitle: 'De la 6ème à la 3ème',
        items: [
            {
                icon: '<i class="fas fa-book"></i>',
                title: 'Soutien scolaire toutes matières',
                desc: 'Renforcement dans toutes les matières du collège',
                url: "{{ url('/soutien-collège') }}"
            },
            {
                icon: '<i class="fas fa-certificate"></i>',
                title: 'Préparation Brevet',
                desc: 'Préparation ciblée pour réussir le Diplôme National',
                url: "{{ url('/soutien-brevet') }}"
            },
            {
                icon: '<i class="fas fa-user-graduate"></i>',
                title: 'Méthodologie et autonomie',
                desc: 'Développer son travail personnel et sa confiance',
                url: "{{ url('/college-methode') }}"
            }
        ]
    },
    lycee: {
        icon: '<i class="fas fa-university"></i>',
        title: '🎓 Lycée',
        subtitle: 'De la Seconde à la Terminale',
        items: [
            {
                icon: '<i class="fas fa-book"></i>',
                title: 'Soutien scolaire toutes matières',
                desc: 'Accompagnement dans toutes les spécialités',
                url: "{{ url('/lycee-sous') }}"
            },
            {
                icon: '<i class="fas fa-award"></i>',
                title: 'Préparation Bac',
                desc: 'Révision intensive et méthodologie pour le Bac',
                url: "{{ url('/lycee-preparation') }}"
            },
            {
                icon: '<i class="fas fa-star"></i>',
                title: 'Coaching méthodologique',
                desc: 'Stratégies de travail et gestion du stress',
                url: "{{ url('/lycee-coaching') }}"
            }
        ]
    },
    superieur: {
        icon: '<i class="fas fa-user-graduate"></i>',
        title: '🎓 Enseignement supérieur',
        subtitle: 'De la licence au master',
        items: [
            {
                icon: '<i class="fas fa-compass"></i>',
                title: 'Soutien aux études supérieures',
                desc: 'Accompagnement dans vos cursus universitaires',
                url: "{{ url('/soutien-superieur') }}"
            },
            {
                icon: '<i class="fas fa-compass"></i>',
                title: 'Orientation aux études supérieures',
                desc: 'Choix de filière et de parcours',
                url: "{{ url('/orientation-superieur') }}"
            },
            {
                icon: '<i class="fas fa-calculator"></i>',
                title: 'Préparation DCG / DSCG',
                desc: 'Préparation aux diplômes de comptabilité',
                url: "{{ url('/groupe') }}"
            }
        ]
    },
    adultes: {
        icon: '<i class="fas fa-users"></i>',
        title: '🚀 Adultes et professionnels',
        subtitle: 'Formations et activités',
        items: [
            {
                icon: '<i class="fas fa-chalkboard-teacher"></i>',
                title: 'Toutes les formations professionnelles',
                desc: 'Développez vos compétences pour votre carrière',
                url: "{{ url('/formations') }}"
            },
            {
                icon: '<i class="fas fa-gift"></i>',
                title: 'Nos bons cadeaux',
                desc: 'Offrez une formation à vos proches',
                url: "{{ route('gift-vouchers.index') }}"
            }
        ]
    }
};

function openNiveauModal(niveauKey) {
    const data = niveauxData[niveauKey];
    if (!data) return;

    // Remplir le header
    document.getElementById('modalIcon').innerHTML = data.icon;
    document.getElementById('modalTitle').textContent = data.title;
    document.getElementById('modalSubtitle').textContent = data.subtitle;

    // Générer les boutons
    const body = document.getElementById('modalBody');
    body.innerHTML = data.items.map(item => `
        <a href="${item.url}" class="niveau-btn">
            <div class="niveau-btn-icon">${item.icon}</div>
            <div class="niveau-btn-content">
                <h4>${item.title}</h4>
                <p>${item.desc}</p>
            </div>
            <div class="niveau-btn-arrow"><i class="fas fa-chevron-right"></i></div>
        </a>
    `).join('');

    // Afficher le modal
    document.getElementById('modalNiveau').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeNiveauModal() {
    document.getElementById('modalNiveau').classList.remove('active');
    document.body.style.overflow = '';
}

// Fermer en cliquant sur l'overlay
document.getElementById('modalNiveau').addEventListener('click', function(e) {
    if (e.target === this) {
        closeNiveauModal();
    }
});

// Fermer avec la touche Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeNiveauModal();
    }
});
</script>
     <script>
document.addEventListener('DOMContentLoaded', function () {
    const openBtn = document.getElementById('openRappelModal');
    const closeBtn = document.getElementById('closeRappelModal');
    const modal = document.getElementById('rappelModal');
    const form = document.getElementById('rappelForm');
    const submitBtn = document.getElementById('submitRappelBtn');
    const successBox = document.getElementById('rappelSuccessMessage');

    const errorNom = document.getElementById('error-nom');
    const errorTelephone = document.getElementById('error-telephone');

    // Ouvrir le modal
    openBtn.addEventListener('click', function (e) {
        e.preventDefault();
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    // Fermer le modal
    closeBtn.addEventListener('click', function () {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    });

    // Fermer si on clique en dehors
    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    });

    // Fermer avec Echap
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    });

    // Envoi AJAX
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        errorNom.textContent = '';
        errorTelephone.textContent = '';
        successBox.textContent = '';
        successBox.style.color = '#10B981';

        submitBtn.classList.add('loading');
        submitBtn.textContent = 'Envoi en cours...';

        const formData = new FormData(form);

        fetch("{{ route('rappel.store') }}", {
            method: "POST",
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: formData
        })
        .then(async response => {
            const data = await response.json();

            if (!response.ok) {
                throw { status: response.status, data: data };
            }

            return data;
        })
        .then(data => {
            successBox.textContent = data.message;
            form.reset();

            setTimeout(() => {
                modal.classList.remove('active');
                document.body.style.overflow = '';
                successBox.textContent = '';
            }, 1800);
        })
        .catch(error => {
            if (error.status === 422 && error.data.errors) {
                if (error.data.errors.nom) {
                    errorNom.textContent = error.data.errors.nom[0];
                }

                if (error.data.errors.telephone) {
                    errorTelephone.textContent = error.data.errors.telephone[0];
                }
            } else {
                successBox.style.color = '#EF4444';
                successBox.textContent = "Une erreur est survenue. Veuillez réessayer.";
            }
        })
        .finally(() => {
            submitBtn.classList.remove('loading');
            submitBtn.textContent = 'Envoyer ma demande';
        });
    });
});
</script>
<script>
// Scroll Progress
window.addEventListener('scroll', function() {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    document.getElementById('scrollProgress').style.width = (scrollTop / scrollHeight * 100) + '%';

    // Navbar
    const navbar = document.querySelector('.navbar-moderne');
    if (window.scrollY > 50) navbar.classList.add('scrolled');
    else navbar.classList.remove('scrolled');

    // Back to top
    const backToTop = document.getElementById('backToTop');
    if (window.scrollY > 500) backToTop.classList.add('visible');
    else backToTop.classList.remove('visible');
});

// Spinner
window.addEventListener('load', function() {
    setTimeout(() => {
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
document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('#coursGlobalSlider .cours-slide-item');
    const dots = document.querySelectorAll('#coursGlobalSlider .cours-dot');
    let current = 0;
    let interval;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });

        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });

        current = index;
    }

    function nextSlide() {
        let next = (current + 1) % slides.length;
        showSlide(next);
    }

    function startSlider() {
        interval = setInterval(nextSlide, 5000);
    }

    function resetSlider() {
        clearInterval(interval);
        startSlider();
    }

    dots.forEach(dot => {
        dot.addEventListener('click', function () {
            const index = parseInt(this.getAttribute('data-slide'));
            showSlide(index);
            resetSlider();
        });
    });

    showSlide(0);
    startSlider();
});
</script>

<!-- Diagnostic Personnalisé Adaptatif Modal -->
@include('components.diagnostic-modal')

<!-- Chatbot Widget -->
@include('components.chatbot')

<!-- Newsletter Popup -->
@include('components.newsletter-popup')

<!-- Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
