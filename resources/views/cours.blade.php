<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>{{ $cours->titre }} - Monprofchezmoi-ci.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta content="Formation professionnelle, {{ $cours->titre }}, Abidjan" name="keywords">
    <meta content="{{ $cours->description }}" name="description">

    <!-- Favicon -->
    <link href="{{ asset('asset/img/favicon.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

@include('partials.header')

<style>
/* ============================================
   MONPROFCHEZMOI - DESIGN SYSTEM 2024
   ============================================ */

:root {
    --orange: #FF6B35;
    --orange-dark: #E85A2B;
    --orange-light: #FF8C5A;
    --orange-pale: #FFF5F0;
    --blue: #0A1628;
    --blue-light: #1E3A5F;
    --blue-accent: #3B82F6;
    --white: #FFFFFF;
    --cream: #FAFBFC;
    --gray-50: #F8F9FA;
    --gray-100: #F1F3F4;
    --gray-200: #E8EAED;
    --gray-300: #DADCE0;
    --gray-400: #9AA0A6;
    --gray-500: #80868B;
    --gray-600: #5F6368;
    --gray-700: #444746;
    --gray-800: #3C4043;
    --success: #22C55E;
    --warning: #F59E0B;
    --danger: #EF4444;

    --shadow-sm: 0 2px 8px rgba(10,22,40,0.06);
    --shadow-md: 0 8px 24px rgba(10,22,40,0.10);
    --shadow-lg: 0 16px 48px rgba(10,22,40,0.12);
    --shadow-xl: 0 24px 64px rgba(10,22,40,0.16);
    --shadow-orange: 0 8px 32px rgba(255,107,53,0.25);
()
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --radius-xl: 20px;
    --radius-full: 50px;
}

* { margin: 0; padding: 0; box-sizing: border-box; }

html { scroll-behavior: smooth; }

body {
    font-family: 'Nunito', sans-serif;
    color: var(--gray-800);
    background: var(--white);
    overflow-x: hidden;
    line-height: 1.6;
    font-size: 15px;
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
   TOPBAR
   ============================================ */
.topbar-minimal {
    background: var(--blue);
    padding: 10px 0;
    position: relative;
}
.topbar-minimal .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}
.topbar-info-minimal {
    display: flex;
    gap: 24px;
    align-items: center;
    flex-wrap: wrap;
}
.topbar-info-minimal span {
    color: rgba(255,255,255,0.75);
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 500;
}
.topbar-info-minimal span i {
    color: var(--orange);
    font-size: 0.85rem;
}
.topbar-social-minimal {
    display: flex;
    gap: 8px;
}
.topbar-social-minimal a {
    width: 32px; height: 32px;
    border-radius: var(--radius-sm);
    background: rgba(255,255,255,0.08);
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255,255,255,0.6);
    font-size: 0.8rem;
    transition: all 0.3s ease;
    text-decoration: none;
}
.topbar-social-minimal a:hover {
    background: var(--orange);
    color: white;
    transform: translateY(-2px);
}

/* ============================================
   NAVBAR
   ============================================ */
.navbar-moderne {
    background: rgba(255,255,255,0.98);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
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
    font-size: 1.25rem;
    color: var(--blue) !important;
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
}
.navbar-moderne .navbar-brand img {
    height: 42px;
    width: auto;
}
.nav-menu-moderne {
    display: flex;
    align-items: center;
    gap: 2px;
    list-style: none;
    margin: 0;
    padding: 0;
}
.nav-menu-moderne .nav-item-moderne {
    position: relative;
}
.nav-menu-moderne .nav-link-moderne {
    color: var(--gray-700);
    font-weight: 600;
    font-size: 0.88rem;
    padding: 24px 14px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 5px;
    transition: all 0.3s ease;
    position: relative;
    border-radius: var(--radius-sm);
}
.nav-menu-moderne .nav-link-moderne::after {
    content: '';
    position: absolute;
    bottom: 16px;
    left: 14px;
    right: 14px;
    height: 2px;
    background: var(--orange);
    border-radius: 2px;
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
    margin-left: 2px;
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
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-xl);
    padding: 0;
    min-width: 520px;
    opacity: 0;
    visibility: hidden;
    transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
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
    font-size: 1.05rem;
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
    gap: 8px;
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
    gap: 12px;
    padding: 10px 12px;
    color: var(--gray-700);
    text-decoration: none;
    font-size: 0.88rem;
    font-weight: 500;
    transition: all 0.2s ease;
    border-radius: var(--radius-sm);
}
.mega-link-moderne:hover {
    color: var(--orange);
    background: var(--orange-pale);
    transform: translateX(4px);
}
.mega-link-icon {
    width: 34px; height: 34px;
    min-width: 34px;
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
    border-radius: var(--radius-sm);
    font-weight: 700;
    font-size: 0.85rem;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 12px rgba(255,107,53,0.2);
}
.btn-nav-cta:hover {
    background: var(--orange-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-orange);
    color: white !important;
}

/* Navbar Toggler */
.navbar-toggler {
    border: 1px solid var(--gray-200);
    padding: 8px 12px;
    border-radius: var(--radius-sm);
}
.navbar-toggler:focus {
    box-shadow: 0 0 0 3px rgba(255,107,53,0.15);
}
.navbar-toggler-icon {
    width: 1.2em;
    height: 1.2em;
}

/* ============================================
   PAGE HERO - FORMATION
   ============================================ */
.page-hero-formation {
    min-height: 420px;
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 50%, #1a365d 100%);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    padding: 60px 0;
}
.page-hero-formation::before {
    content: '';
    position: absolute;
    top: -15%; right: -5%;
    width: 350px; height: 350px;
    background: radial-gradient(circle, rgba(255,107,53,0.15), transparent 70%);
    border-radius: 50%;
    animation: float-hero 8s ease-in-out infinite;
}
.page-hero-formation::after {
    content: '';
    position: absolute;
    bottom: -10%; left: -5%;
    width: 250px; height: 250px;
    background: radial-gradient(circle, rgba(59,130,246,0.1), transparent 70%);
    border-radius: 50%;
    animation: float-hero 10s ease-in-out infinite reverse;
}
@keyframes float-hero {
    0%, 100% { transform: translate(0, 0); }
    50% { transform: translate(-30px, -20px); }
}
.page-hero-formation .container {
    position: relative;
    z-index: 2;
}
.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--orange);
    color: white;
    padding: 6px 16px;
    border-radius: var(--radius-full);
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 20px;
    box-shadow: 0 4px 12px rgba(255,107,53,0.3);
}
.hero-title {
    font-size: clamp(1.8rem, 3.5vw, 2.6rem);
    font-weight: 800;
    color: white;
    line-height: 1.2;
    margin-bottom: 20px;
}
.hero-title .highlight { color: var(--orange); }
.hero-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 24px;
}
.hero-meta-item {
    display: flex;
    align-items: center;
    gap: 10px;
    color: rgba(255,255,255,0.85);
    font-size: 0.95rem;
    font-weight: 500;
    background: rgba(255,255,255,0.08);
    padding: 8px 16px;
    border-radius: var(--radius-full);
    backdrop-filter: blur(10px);
}
.hero-meta-item i { color: var(--orange); font-size: 0.9rem; }
.hero-rating {
    display: flex;
    align-items: center;
    gap: 12px;
}
.hero-rating-stars { color: #fbbf24; font-size: 1rem; }
.hero-rating-text { color: rgba(255,255,255,0.7); font-size: 0.9rem; }

.hero-image-wrapper {
    position: relative;
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    border: 2px solid rgba(255,255,255,0.1);
}
.hero-image-wrapper img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    display: block;
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
    gap: 10px;
    font-size: 0.85rem;
    color: var(--gray-500);
    flex-wrap: wrap;
}
.breadcrumb-moderne a {
    color: var(--gray-600);
    text-decoration: none;
    transition: color 0.2s;
    font-weight: 500;
}
.breadcrumb-moderne a:hover { color: var(--orange); }
.breadcrumb-moderne i { font-size: 0.65rem; color: var(--gray-400); }
.breadcrumb-moderne .current { color: var(--orange); font-weight: 700; }

/* ============================================
   SECTIONS COMMUNES
   ============================================ */
.section-padding { padding: 70px 0; }
.section-header-center {
    text-align: center;
    max-width: 700px;
    margin: 0 auto 50px;
}
.section-label-orange {
    display: inline-flex;
    align-items: center;
    gap: 10px;
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
    font-size: clamp(1.6rem, 3vw, 2.2rem);
    font-weight: 800;
    color: var(--blue);
    line-height: 1.25;
    margin-bottom: 16px;
}
.section-subtitle {
    font-size: 1rem;
    color: var(--gray-600);
    line-height: 1.8;
}

/* ============================================
   FORMATION DETAIL - LAYOUT (3 COLONNES)
   ============================================ */
.formation-detail-section {
    background: var(--cream);
}
.formation-layout {
    display: grid;
    grid-template-columns: 1fr 360px;
    gap: 32px;
    align-items: start;
}
.formation-main {
    background: var(--white);
    border-radius: var(--radius-xl);
    padding: 36px;
    border: 1px solid var(--gray-100);
    box-shadow: var(--shadow-sm);
    order: 1;
}
.formation-sidebar-right {
    position: sticky;
    top: 90px;
    order: 2;
}

/* Content blocks */
.content-block {
    margin-bottom: 36px;
    padding-bottom: 36px;
    border-bottom: 1px solid var(--gray-100);
}
.content-block:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}
.content-block-title {
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 12px;
}
.content-block-title i {
    color: var(--orange);
    font-size: 1rem;
    width: 36px;
    height: 36px;
    background: var(--orange-pale);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.content-block-body {
    font-size: 0.95rem;
    color: var(--gray-600);
    line-height: 1.85;
    padding-left: 0; /* Supprimé le padding-left de 48px */
}
/* Paragraphe simple */
.content-block-body p {
    margin-bottom: 14px;
    color: var(--gray-600);
    line-height: 1.8;
}
.content-block-body p:last-child {
    margin-bottom: 0;
}

/* Module principal (titre + liste) */
.content-module {
    background: var(--cream);
    border-radius: var(--radius-lg);
    padding: 0;
    margin-bottom: 20px;
    border-left: 4px solid var(--orange);
    overflow: hidden;
    transition: all 0.3s ease;
}
.content-module:hover {
    box-shadow: var(--shadow-md);
    transform: translateX(4px);
}
.content-module:last-child {
    margin-bottom: 0;
}

/* Titre du module (Module 1, Module 2...) */
.content-module-title {
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--blue);
    padding: 16px 24px 14px;
    margin: 0;
    background: linear-gradient(135deg, rgba(255,107,53,0.08), rgba(255,107,53,0.02));
    border-bottom: 1px solid var(--gray-200);
    display: flex;
    align-items: center;
    gap: 10px;
}
.content-module-title::before {
    content: '';
    width: 10px;
    height: 10px;
    background: var(--orange);
    border-radius: 50%;
    display: inline-block;
    flex-shrink: 0;
}

/* Liste des items */
.content-module-list {
    list-style: none;
    padding: 12px 24px 16px;
    margin: 0;
}

/* Item normal (avec icône) */
.content-module-list li {
    padding: 10px 0 10px 32px;
    position: relative;
    color: var(--gray-600);
    font-size: 0.92rem;
    line-height: 1.7;
    border-bottom: 1px solid var(--gray-100);
}
.content-module-list li:last-child {
    border-bottom: none;
}

/* Cercle orange à gauche */
.content-module-list li::before {
    content: '';
    position: absolute;
    left: 0;
    top: 13px;
    width: 12px;
    height: 12px;
    border: 2px solid var(--orange);
    border-radius: 50%;
    background: var(--white);
    transition: all 0.2s ease;
}
.content-module-list li:hover::before {
    background: var(--orange);
}

/* Ligne verticale connectrice */
.content-module-list li::after {
    content: '';
    position: absolute;
    left: 5px;
    top: 27px;
    width: 2px;
    height: calc(100% - 8px);
    background: var(--gray-200);
    border-radius: 1px;
}
.content-module-list li:last-child::after {
    display: none;
}

/* Icône optionnelle (style image) */
.content-module-list li .item-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 18px;
    height: 18px;
    background: var(--orange);
    color: white;
    border-radius: 4px;
    font-size: 0.65rem;
    margin-right: 8px;
    vertical-align: middle;
}

/* Sous-titre de module (sans icône, juste texte) */
.content-module-list li.module-subtitle {
    padding-left: 0;
    font-weight: 600;
    color: var(--blue);
    font-size: 0.95rem;
    margin-top: 8px;
    border-bottom: none;
}
.content-module-list li.module-subtitle::before,
.content-module-list li.module-subtitle::after {
    display: none;
}

/* Paragraphe simple */
.content-module-text {
    color: var(--gray-600);
    font-size: 0.92rem;
    line-height: 1.8;
    padding: 16px 24px;
}
/* Badge de section */
.content-section-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--orange-pale);
    color: var(--orange-dark);
    padding: 4px 12px;
    border-radius: var(--radius-full);
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 12px;
}
.content-block-body p:last-child { margin-bottom: 0; }
.content-block-body strong { color: var(--gray-800); }

/* Tags */
.competence-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    padding-left: 48px;
}
.competence-tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--orange-pale);
    border: 1px solid rgba(255,107,53,0.12);
    color: var(--orange-dark);
    padding: 8px 16px;
    border-radius: var(--radius-full);
    font-size: 0.85rem;
    font-weight: 600;
    transition: all 0.2s ease;
}
.competence-tag:hover {
    background: var(--orange);
    color: white;
    transform: translateY(-2px);
}

/* ============================================
   SIDEBAR CARD
   ============================================ */
.sidebar-card {
    background: var(--white);
    border-radius: var(--radius-xl);
    overflow: hidden;
    border: 1px solid var(--gray-100);
    box-shadow: var(--shadow-md);
    margin-bottom: 24px;
    transition: box-shadow 0.3s ease;
}
.sidebar-card:hover {
    box-shadow: var(--shadow-lg);
}
.sidebar-card-header {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
    padding: 22px 24px;
    color: white;
}
.sidebar-card-header h3 {
    font-size: 1.05rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}
.sidebar-card-header h3 i { color: var(--orange); }
.sidebar-card-body {
    padding: 24px;
}

/* Info items */
.info-item {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    padding: 14px 0;
    border-bottom: 1px solid var(--gray-100);
}
.info-item:last-child { border-bottom: none; }
.info-item-icon {
    width: 40px; height: 40px;
    min-width: 40px;
    border-radius: 10px;
    background: var(--orange-pale);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--orange);
    font-size: 0.9rem;
    transition: all 0.2s ease;
}
.info-item:hover .info-item-icon {
    background: var(--orange);
    color: white;
}
.info-item-content { flex: 1; }
.info-item-label {
    font-size: 0.78rem;
    color: var(--gray-400);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 700;
    margin-bottom: 3px;
}
.info-item-value {
    font-size: 0.95rem;
    color: var(--gray-800);
    font-weight: 600;
}

/* Points forts */
.points-forts {
    background: var(--cream);
    border-radius: var(--radius-md);
    padding: 20px;
    margin: 20px 0 0;
}
.points-forts-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 8px 0;
    font-size: 0.9rem;
    color: var(--gray-700);
    font-weight: 500;
}
.points-forts-item i {
    color: var(--success);
    font-size: 1rem;
    margin-top: 2px;
    min-width: 20px;
}

/* ============================================
   QR CODE CARD
   ============================================ */
.qr-card {
    background: var(--white);
    border-radius: var(--radius-xl);
    overflow: hidden;
    border: 1px solid var(--gray-100);
    box-shadow: var(--shadow-md);
    margin-bottom: 24px;
    transition: box-shadow 0.3s ease;
    text-align: center;
}
.qr-card:hover {
    box-shadow: var(--shadow-lg);
}
.qr-card-header {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
    padding: 18px 24px;
    color: white;
}
.qr-card-header h3 {
    font-size: 1rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}
.qr-card-header h3 i { color: var(--orange); }
.qr-card-body {
    padding: 24px;
}
.qr-code-wrapper {
    background: var(--cream);
    border-radius: var(--radius-lg);
    padding: 20px;
    border: 1px solid var(--gray-100);
    display: inline-block;
    margin-bottom: 16px;
}
.qr-code-wrapper img {
    width: 180px;
    height: 180px;
    display: block;
    border-radius: var(--radius-sm);
}
.qr-card-text {
    font-size: 0.85rem;
    color: var(--gray-500);
    line-height: 1.6;
    margin: 0;
}
.qr-card-text strong {
    color: var(--gray-800);
    display: block;
    font-size: 0.9rem;
    margin-bottom: 4px;
}

/* ============================================
   ACCORDEON SIDEBAR
   ============================================ */
.accordion-sidebar {
    margin-bottom: 24px;
}
.accordion-sidebar .sidebar-card {
    margin-bottom: 0;
}
.accordion-sidebar .sidebar-card-header {
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: background 0.3s ease;
    user-select: none;
}
.accordion-sidebar .sidebar-card-header:hover {
    background: linear-gradient(135deg, var(--blue-light) 0%, var(--blue) 100%);
}
.accordion-sidebar .sidebar-card-header h3 {
    display: flex;
    align-items: center;
    gap: 10px;
}
.accordion-sidebar .accordion-chevron {
    font-size: 0.8rem;
    color: var(--orange);
    transition: transform 0.3s ease;
    margin-left: 10px;
}
.accordion-sidebar .sidebar-card-header.open .accordion-chevron {
    transform: rotate(180deg);
}
.accordion-sidebar .sidebar-card-body {
    display: none;
    padding: 24px;
}
.accordion-sidebar .sidebar-card-body.open {
    display: block;
    animation: accordionFadeIn 0.35s ease;
}
@keyframes accordionFadeIn {
    from { opacity: 0; transform: translateY(-8px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ============================================
   FORMULE CHOICE
   ============================================ */
.formule-section {
    margin: 20px 0;
}
.formule-title {
    font-size: 0.82rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--blue);
    margin-bottom: 14px;
}
.formule-option {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 16px;
    border: 2px solid var(--gray-200);
    border-radius: var(--radius-md);
    margin-bottom: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    background: var(--white);
}
.formule-option:hover {
    border-color: var(--orange-light);
    background: rgba(255,107,53,0.02);
}
.formule-option.selected {
    border-color: var(--orange);
    background: var(--orange-pale);
    box-shadow: 0 0 0 3px rgba(255,107,53,0.1);
}
.formule-option input[type="radio"] {
    width: 20px; height: 20px;
    accent-color: var(--orange);
    cursor: pointer;
    flex-shrink: 0;
}
.formule-option-content { flex: 1; }
.formule-option-name {
    font-weight: 700;
    color: var(--blue);
    font-size: 0.92rem;
    margin-bottom: 4px;
}
.formule-option-desc {
    font-size: 0.82rem;
    color: var(--gray-500);
}
.formule-option-price {
    font-size: 1.1rem;
    font-weight: 800;
    color: var(--orange);
    white-space: nowrap;
}
.formule-option-badge {
    position: absolute;
    top: -10px; right: 16px;
    background: var(--success);
    color: white;
    padding: 4px 12px;
    border-radius: var(--radius-full);
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    box-shadow: 0 2px 8px rgba(34,197,94,0.3);
}

/* Economy badge */
.economy-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, rgba(34,197,94,0.1), rgba(34,197,94,0.05));
    border: 1px solid rgba(34,197,94,0.2);
    color: var(--success);
    padding: 10px 16px;
    border-radius: var(--radius-md);
    font-size: 0.85rem;
    font-weight: 600;
    margin-bottom: 16px;
    width: 100%;
    justify-content: center;
}

/* Places limitées */
.places-alert {
    display: flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, rgba(245,158,11,0.1), rgba(245,158,11,0.05));
    border: 1px solid rgba(245,158,11,0.2);
    color: var(--warning);
    padding: 12px 16px;
    border-radius: var(--radius-md);
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 16px;
}
.places-alert i { font-size: 1.1rem; }
.places-count {
    background: var(--warning);
    color: white;
    padding: 3px 12px;
    border-radius: var(--radius-full);
    font-size: 0.78rem;
    font-weight: 700;
    margin-left: auto;
}

/* ============================================
   RECAPITULATIF
   ============================================ */
.recap-box {
    background: var(--cream);
    border-radius: var(--radius-md);
    padding: 20px;
    margin: 20px 0;
    border: 1px solid var(--gray-100);
}
.recap-line {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    font-size: 0.9rem;
    border-bottom: 1px dashed var(--gray-200);
}
.recap-line:last-child { border-bottom: none; }
.recap-line.total {
    font-size: 1.05rem;
    font-weight: 800;
    color: var(--blue);
    padding-top: 14px;
    margin-top: 10px;
    border-top: 2px solid var(--gray-200);
    border-bottom: none;
}
.recap-line.acompte {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--orange);
}
.recap-line.solde {
    color: var(--gray-500);
    font-size: 0.88rem;
}

/* ============================================
   FORMULAIRE RESERVATION
   ============================================ */
.reservation-form {
    margin-top: 20px;
}
.form-group {
    margin-bottom: 16px;
}
.form-group label {
    display: block;
    font-size: 0.85rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 8px;
}
.form-group label .required { color: var(--danger); }
.form-control-moderne {
    width: 100%;
    padding: 13px 16px;
    border: 2px solid var(--gray-200);
    border-radius: var(--radius-md);
    font-size: 0.95rem;
    font-family: 'Nunito', sans-serif;
    color: var(--gray-800);
    background: var(--white);
    transition: all 0.3s ease;
}
.form-control-moderne:focus {
    outline: none;
    border-color: var(--orange);
    box-shadow: 0 0 0 4px rgba(255,107,53,0.1);
}
.form-control-moderne::placeholder { color: var(--gray-400); }
textarea.form-control-moderne {
    min-height: 90px;
    resize: vertical;
}

/* Checkbox */
.checkbox-group {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 16px;
    background: var(--cream);
    border-radius: var(--radius-md);
    margin: 20px 0;
    border: 1px solid var(--gray-100);
}
.checkbox-group input[type="checkbox"] {
    width: 18px; height: 18px;
    accent-color: var(--orange);
    margin-top: 2px;
    cursor: pointer;
    flex-shrink: 0;
}
.checkbox-group label {
    font-size: 0.88rem;
    color: var(--gray-600);
    line-height: 1.5;
    cursor: pointer;
    margin: 0;
}
.checkbox-group label a { color: var(--orange); font-weight: 700; }

/* ============================================
   BOUTON RESERVATION
   ============================================ */
.btn-reserver {
    width: 100%;
    padding: 16px 24px;
    border-radius: var(--radius-md);
    font-weight: 800;
    font-size: 1rem;
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
    letter-spacing: 0.5px;
}
.btn-reserver:hover {
    background: var(--orange-dark);
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(255,107,53,0.4);
}
.btn-reserver i { transition: transform 0.3s ease; }
.btn-reserver:hover i { transform: translateX(4px); }

/* Acompte highlight */
.acompte-highlight {
    text-align: center;
    padding: 18px;
    background: linear-gradient(135deg, rgba(255,107,53,0.08), rgba(255,107,53,0.04));
    border-radius: var(--radius-md);
    margin-bottom: 16px;
    border: 1px solid rgba(255,107,53,0.1);
}
.acompte-highlight .label {
    font-size: 0.85rem;
    color: var(--gray-500);
    margin-bottom: 6px;
    font-weight: 600;
}
.acompte-highlight .montant {
    font-size: 1.7rem;
    font-weight: 800;
    color: var(--orange);
}

/* Security text */
.security-text {
    text-align: center;
    margin-top: 16px;
    font-size: 0.78rem;
    color: var(--gray-400);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

/* ============================================
   PARCOURS CLIENT
   ============================================ */
.parcours-section {
    background: var(--white);
}
.parcours-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 24px;
    position: relative;
}
.parcours-grid::before {
    content: '';
    position: absolute;
    top: 35px;
    left: 8%;
    right: 8%;
    height: 3px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light));
    opacity: 0.25;
    border-radius: 3px;
}
.parcours-step {
    text-align: center;
    position: relative;
    z-index: 2;
}
.parcours-number {
    width: 72px; height: 72px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--orange), var(--orange-dark));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
    font-size: 1.5rem;
    font-weight: 800;
    color: white;
    box-shadow: var(--shadow-orange);
    transition: transform 0.3s ease;
}
.parcours-step:hover .parcours-number {
    transform: scale(1.1);
}
.parcours-step h4 {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 8px;
}
.parcours-step p {
    font-size: 0.85rem;
    color: var(--gray-500);
    line-height: 1.6;
}

/* ============================================
   AVIS CLIENTS
   ============================================ */
.avis-section {
    background: var(--cream);
}
.avis-card {
    background: var(--white);
    border-radius: var(--radius-xl);
    padding: 30px;
    border: 1px solid var(--gray-100);
    transition: all 0.35s ease;
    height: 100%;
}
.avis-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-lg);
    border-color: var(--gray-200);
}
.avis-header {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 18px;
}
.avis-avatar {
    width: 50px; height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--orange), var(--orange-dark));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
    flex-shrink: 0;
}
.avis-info { flex: 1; }
.avis-name {
    font-weight: 700;
    color: var(--blue);
    font-size: 0.95rem;
}
.avis-date {
    font-size: 0.78rem;
    color: var(--gray-400);
    margin-top: 2px;
}
.avis-stars { color: #fbbf24; font-size: 0.85rem; margin-top: 4px; }
.avis-text {
    font-size: 0.9rem;
    color: var(--gray-600);
    line-height: 1.75;
    font-style: italic;
}

/* ============================================
   CONFIRMATION MODAL
   ============================================ */
.modal-moderne .modal-content {
    border-radius: var(--radius-xl);
    border: none;
    box-shadow: var(--shadow-xl);
    overflow: hidden;
}
.modal-moderne .modal-header {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
    padding: 28px;
    text-align: center;
    border: none;
}
.modal-moderne .modal-header .modal-title {
    color: white;
    font-weight: 800;
    font-size: 1.2rem;
    width: 100%;
    margin: 0;
}
.modal-moderne .modal-body {
    padding: 35px;
    text-align: center;
}
.modal-icon {
    width: 80px; height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(34,197,94,0.12), rgba(34,197,94,0.05));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    font-size: 2.2rem;
    color: var(--success);
    border: 2px solid rgba(34,197,94,0.2);
}
.modal-moderne h4 {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 12px;
}
.modal-moderne p {
    font-size: 0.95rem;
    color: var(--gray-600);
    line-height: 1.8;
    margin-bottom: 8px;
}

/* ============================================
   FOOTER
   ============================================ */
.footer-moderne {
    background: var(--blue);
    padding-top: 70px;
}
.footer-grid {
    display: grid;
    grid-template-columns: 1.5fr 1fr 1fr 1.2fr;
    gap: 40px;
    padding-bottom: 50px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}
.footer-brand-moderne img {
    height: 45px;
    margin-bottom: 20px;
    filter: brightness(0) invert(1);
    opacity: 0.9;
}
.footer-brand-moderne p {
    color: rgba(255,255,255,0.65);
    font-size: 0.9rem;
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
    margin-bottom: 22px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--orange);
    display: inline-block;
}
.footer-links-moderne {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.footer-links-moderne a {
    color: rgba(255,255,255,0.65);
    text-decoration: none;
    font-size: 0.88rem;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 4px 0;
}
.footer-links-moderne a:hover {
    color: var(--orange);
    transform: translateX(4px);
}
.footer-links-moderne a::before {
    content: '›';
    color: var(--orange);
    font-weight: 700;
    font-size: 1.1rem;
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
    font-size: 0.88rem;
}
.footer-contact-item-moderne i {
    color: var(--orange);
    margin-top: 4px;
    font-size: 0.9rem;
    min-width: 18px;
}
.footer-bottom-moderne {
    padding: 24px 0;
    text-align: center;
}
.footer-bottom-moderne p {
    color: rgba(255,255,255,0.45);
    font-size: 0.85rem;
    margin: 0;
}
.footer-bottom-moderne a {
    color: var(--orange);
    text-decoration: none;
    font-weight: 600;
}

/* Back to Top */
.back-to-top-moderne {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 48px; height: 48px;
    border-radius: 12px;
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
.animate-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
}
.animate-scroll.visible {
    opacity: 1;
    transform: translateY(0);
}

/* Stagger delays */
.animate-scroll:nth-child(1) { transition-delay: 0.05s; }
.animate-scroll:nth-child(2) { transition-delay: 0.1s; }
.animate-scroll:nth-child(3) { transition-delay: 0.15s; }
.animate-scroll:nth-child(4) { transition-delay: 0.2s; }
.animate-scroll:nth-child(5) { transition-delay: 0.25s; }

/* ============================================
   RESPONSIVE
   ============================================ */
@media (max-width: 1199px) {
    .formation-layout {
        grid-template-columns: 1fr 320px;
        gap: 24px;
    }
}

@media (max-width: 991px) {
    .topbar-info-minimal { gap: 14px; }
    .nav-menu-moderne {
        flex-direction: column;
        padding: 16px;
        gap: 4px;
    }
    .nav-menu-moderne .nav-link-moderne {
        padding: 14px 16px;
        width: 100%;
        border-radius: var(--radius-sm);
    }
    .nav-menu-moderne .nav-link-moderne::after { display: none; }
    .nav-menu-moderne .nav-link-moderne:hover,
    .nav-menu-moderne .nav-link-moderne.active {
        background: var(--orange-pale);
    }
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
        border-radius: var(--radius-md);
    }
    .nav-item-moderne.active .mega-menu-moderne { display: block; }
    .mega-body-moderne {
        grid-template-columns: 1fr;
        padding: 16px;
    }
    .mega-header-moderne { padding: 16px 20px; }

    .formation-layout {
        grid-template-columns: 1fr;
    }
    .formation-sidebar-right {
        position: static;
        max-width: 500px;
        margin: 0 auto;
    }
    .formation-main { order: 1; }
    .formation-sidebar-right { order: 2; }
    .parcours-grid {
        grid-template-columns: repeat(3, 1fr);
    }
    .parcours-grid::before { display: none; }
    .footer-grid { grid-template-columns: 1fr 1fr; }
}

@media (max-width: 767px) {
    .section-padding { padding: 50px 0; }
    .page-hero-formation {
        min-height: auto;
        padding: 50px 0;
        text-align: center;
    }
    .hero-meta { justify-content: center; }
    .hero-image-wrapper { margin-top: 30px; }
    .formation-main { padding: 24px; }
    .content-block-body { padding-left: 0; }
    .content-block-title { margin-bottom: 16px; }
    .competence-tags { padding-left: 0; }
    .parcours-grid { grid-template-columns: 1fr; }
    .parcours-grid::before { display: none; }
    .footer-grid { grid-template-columns: 1fr; gap: 30px; }
    .topbar-minimal .container { justify-content: center; }
    .back-to-top-moderne {
        width: 44px; height: 44px;
        bottom: 20px; right: 20px;
    }
}

@media (max-width: 575px) {
    .hero-meta-item { font-size: 0.85rem; padding: 6px 12px; }
    .hero-title { font-size: 1.6rem; }
    .section-title-big { font-size: 1.4rem; }
    .sidebar-card-body { padding: 20px; }
    .formation-main { padding: 20px; }
    .formule-option { padding: 14px; }
    .formule-option-price { font-size: 1rem; }
    .modal-moderne .modal-body { padding: 24px; }
}
</style>

<div class="scroll-progress" id="scrollProgress"></div>

<!-- ============================================
     PAGE HERO - FORMATION
     ============================================ -->
<section class="page-hero-formation">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 animate-scroll">
                <div class="hero-badge"><i class="fas fa-star"></i> Formation incontournable</div>
                <h1 class="hero-title">{{ $cours->titre }}</h1>
                <div class="hero-meta">
                    <div class="hero-meta-item"><i class="fas fa-clock"></i> {{ $cours->heure }}</div>
                    <div class="hero-meta-item"><i class="fas fa-signal"></i> {{ $cours->niveau }}</div>
                    <div class="hero-meta-item"><i class="fas fa-map-marker-alt"></i> {{ $cours->lieu }}</div>
                    <div class="hero-meta-item"><i class="fas fa-chalkboard-teacher"></i> {{ $cours->formateur }}</div>
                </div>
                <div class="hero-rating">
                    <div class="hero-rating-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="hero-rating-text">4.5/5 — 128 avis certifiés</span>
                </div>
            </div>
            <div class="col-lg-5 animate-scroll">
                <div class="hero-image-wrapper">
                    @if($cours->image)
                        <img src="{{ asset('storage/' . $cours->image) }}" alt="{{ $cours->titre }}">
                    @else
                        <img loading="lazy" decoding="async" src="{{ asset('asset/img/ent.jpeg') }}" alt="Formation">
                    @endif
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
        <span class="current">{{ $cours->titre }}</span>
    </div>
</div>

<!-- ============================================
     FORMATION DETAIL + RESERVATION (3 COLONNES)
     ============================================ -->
<section class="formation-detail-section section-padding">
    <div class="container">
        <div class="formation-layout">

            {{-- Helper inline pour parser le texte en modules --}}
@php
function parseContentToModules($text) {
    if (empty($text)) return '';

    // Normaliser les sauts de ligne
    $text = str_replace(["\r\n", "\r"], "\n", $text);

    // Séparer par doubles sauts de ligne (modules)
    $blocks = array_filter(explode("\n\n", $text));

    $html = '';

    foreach ($blocks as $block) {
        $block = trim($block);
        if (empty($block)) continue;

        $lines = array_filter(array_map('trim', explode("\n", $block)));
        if (empty($lines)) continue;

        $firstLine = $lines[0];

        // Détecter si c'est un module avec titre + items
        // Pattern: "Module X : Titre" ou "Titre" suivi de lignes avec - ou •
        $isModule = false;
        $title = '';
        $items = [];

        // Vérifier si la première ligne ressemble à un titre de module
        // (ne commence pas par -, et les lignes suivantes commencent par -)
        if (!preg_match('/^[-•○◦·–—]\s*/', $firstLine)) {
            $title = $firstLine;
            array_shift($lines);

            // Les lignes restantes sont des items
            foreach ($lines as $line) {
                $cleanLine = preg_replace('/^[-•○◦·–—]\s*/', '', $line);
                if (!empty($cleanLine)) {
                    $items[] = $cleanLine;
                }
            }

            if (count($items) > 0) {
                $isModule = true;
            }
        }

        if ($isModule) {
            $html .= '<div class="content-module">';
            $html .= '<h4 class="content-module-title">' . e($title) . '</h4>';
            $html .= '<ul class="content-module-list">';
            foreach ($items as $item) {
                // Détecter si c'est un sous-titre (pas d'icône, style différent)
                // Un sous-titre ne commence pas par un symbole spécial et est court
                $html .= '<li>' . e($item) . '</li>';
            }
            $html .= '</ul></div>';
        } else {
            // Bloc sans structure claire -> texte simple
            $html .= '<p>' . nl2br(e($block)) . '</p>';
        }
    }

    return $html;
}
@endphp
                        <!-- CONTENU PRINCIPAL - AU CENTRE -->
            <div class="formation-main animate-scroll">

                <!-- Description -->
                <div class="content-block">
                    <h3 class="content-block-title"><i class="fas fa-file-alt"></i> Description</h3>
                    <div class="content-block-body">
                        {!! parseContentToModules($cours->description) !!}
                    </div>
                </div>

                <!-- Objectif -->
                <div class="content-block">
                    <h3 class="content-block-title"><i class="fas fa-bullseye"></i> Objectifs</h3>
                    <div class="content-block-body">
                        {!! parseContentToModules($cours->objectif) !!}
                    </div>
                </div>

                <!-- Programme -->
                <div class="content-block">
                    <h3 class="content-block-title"><i class="fas fa-calendar-alt"></i> Programme</h3>
                    <div class="content-block-body">
                        {!! parseContentToModules($cours->programme) !!}
                    </div>
                </div>

                <!-- Méthodes pédagogiques -->
                <div class="content-block">
                    <h3 class="content-block-title"><i class="fas fa-chalkboard-teacher"></i> Méthodes pédagogiques</h3>
                    <div class="content-block-body">
                        {!! parseContentToModules($cours->methodes_pedagogiques) !!}
                    </div>
                </div>

                <!-- Évaluation -->
                <div class="content-block">
                    <h3 class="content-block-title"><i class="fas fa-clipboard-check"></i> Évaluation</h3>
                    <div class="content-block-body">
                        {!! parseContentToModules($cours->evaluation) !!}
                    </div>
                </div>

                <!-- Public cible -->
                <div class="content-block">
                    <h3 class="content-block-title"><i class="fas fa-users"></i> Public cible</h3>
                    <div class="competence-tags">
                        @foreach(explode(',', $cours->cible) as $cible)
                            <span class="competence-tag"><i class="fas fa-check"></i> {{ trim($cible) }}</span>
                        @endforeach
                    </div>
                </div>

                <!-- Prérequis -->
                <div class="content-block">
                    <h3 class="content-block-title"><i class="fas fa-list-check"></i> Prérequis</h3>
                    <div class="content-block-body">
                        {!! parseContentToModules($cours->prerequis) !!}
                    </div>
                </div>
            </div>

            @php
                $isFormation3h = preg_match('/\b3\s*(h|heures?)\b/i', $cours->heure);
            @endphp
            <!-- SIDEBAR DROITE - Réservation -->
            <div class="formation-sidebar-right animate-scroll" id="reservation">

                <!-- ACCORDEON INFORMATIONS -->
                <div class="accordion-sidebar">
                    <div class="sidebar-card">
                        <div class="sidebar-card-header" onclick="toggleAccordion(this)">
                            <h3><i class="fas fa-info-circle"></i> Informations</h3>
                            <i class="fas fa-chevron-down accordion-chevron"></i>
                        </div>
                        <div class="sidebar-card-body">
                            <div class="info-item">
                                <div class="info-item-icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="info-item-content">
                                    <div class="info-item-label">Lieu</div>
                                    <div class="info-item-value">{{ $cours->lieu }}</div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-item-icon"><i class="fas fa-user-tie"></i></div>
                                <div class="info-item-content">
                                    <div class="info-item-label">Formateur</div>
                                    <div class="info-item-value">{{ $cours->formateur }}</div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-item-icon"><i class="fas fa-clock"></i></div>
                                <div class="info-item-content">
                                    <div class="info-item-label">Durée</div>
                                    <div class="info-item-value">{{ $cours->heure }}</div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-item-icon"><i class="fas fa-certificate"></i></div>
                                <div class="info-item-content">
                                    <div class="info-item-label">Certification</div>
                                    <div class="info-item-value">Attestation de formation</div>
                                </div>
                            </div>
                            <div class="points-forts">
                                <div class="points-forts-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Encadrement d'un formateur expérimenté</span>
                                </div>
                                <div class="points-forts-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Support pédagogique inclus</span>
                                </div>
                                <div class="points-forts-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Suivi post-formation</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ACCORDEON SCAN -->
                <div class="accordion-sidebar">
                    <div class="sidebar-card">
                        <div class="sidebar-card-header" onclick="toggleAccordion(this)">
                            <h3><i class="fas fa-qrcode"></i> Scannez pour partager</h3>
                            <i class="fas fa-chevron-down accordion-chevron"></i>
                        </div>
                        <div class="sidebar-card-body">
                            <div class="qr-code-wrapper">
                                <img loading="lazy" decoding="async" src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data={{ urlencode(config('app.url') . route('particuliers.cours', $cours->id, false)) }}" alt="QR Code {{ $cours->titre }}">
                            </div>
                            <p class="qr-card-text">
                                <strong>{{ $cours->titre }}</strong>
                                Scannez ce QR code pour accéder directement à cette formation.
                            </p>
                        </div>
                    </div>
                </div>

                @php
    $prixIndividuel = $cours->prix;
    $prixGroupe = round($cours->prix * 0.5);
    $acompteIndividuel = round($prixIndividuel * 0.3);
    $acompteGroupe = round($prixGroupe * 0.3);
@endphp

<div class="sidebar-card" id="reservationCard">
    <div class="sidebar-card-header">
        <h3><i class="fas fa-calendar-check"></i> Réserver votre place</h3>
    </div>
    <div class="sidebar-card-body">

        {{-- ÉCONOMIE --}}
        <div class="economy-badge">
            <i class="fas fa-piggy-bank"></i>
            Économisez jusqu'à 50% en petit groupe
        </div>

        {{-- PLACES LIMITÉES --}}
        <div class="places-alert">
            <i class="fas fa-users"></i>
            <span>Petit groupe : 8 places max</span>
            <span class="places-count">3 restantes</span>
        </div>

        {{-- CHOIX FORMULE --}}
        <div class="formule-section">
            <div class="formule-title">Choisissez votre formule</div>

            <label class="formule-option selected" data-type="individuel" data-prix="{{ $prixIndividuel }}">
                <input type="radio" name="formule" value="individuel" checked onchange="updateFormule('individuel', {{ $prixIndividuel }})">
                <div class="formule-option-content">
                    <div class="formule-option-name">Formation individuelle</div>
                    <div class="formule-option-desc">Apprentissage personnalisé 1-to-1</div>
                </div>
                <div class="formule-option-price">{{ number_format($prixIndividuel, 0, '', ' ') }} FCFA</div>
            </label>

            <label class="formule-option" data-type="groupe" data-prix="{{ $prixGroupe }}">
                <input type="radio" name="formule" value="groupe" onchange="updateFormule('groupe', {{ $prixGroupe }})">
                <div class="formule-option-content">
                    <div class="formule-option-name">Formation en petit groupe</div>
                    <div class="formule-option-desc">2 à 8 participants maximum</div>
                </div>
                <div class="formule-option-price">{{ number_format($prixGroupe, 0, '', ' ') }} FCFA</div>
                <span class="formule-option-badge">-50%</span>
            </label>
        </div>

        {{-- RÉCAPITULATIF --}}
        <div class="recap-box">
            <div class="recap-line">
                <span>Montant total</span>
                <span id="montantTotal">{{ number_format($prixIndividuel, 0, '', ' ') }} FCFA</span>
            </div>
            <div class="recap-line acompte">
                <span><i class="fas fa-lock"></i> Acompte (30%)</span>
                <span id="acompte">{{ number_format($acompteIndividuel, 0, '', ' ') }} FCFA</span>
            </div>
            <div class="recap-line solde">
                <span>Solde restant (70%)</span>
                <span id="solde">{{ number_format($prixIndividuel - $acompteIndividuel, 0, '', ' ') }} FCFA</span>
            </div>
        </div>

        {{-- ACOMPTE À PAYER --}}
        <div class="acompte-highlight">
            <div class="label">Acompte à payer maintenant</div>
            <div class="montant" id="acomptePayer">{{ number_format($acompteIndividuel, 0, '', ' ') }} FCFA</div>
        </div>

        {{-- FORMULAIRE --}}
        <form class="reservation-form" action="{{ route('particuliers.reservation.store') }}" method="POST">
            @csrf
            <input type="hidden" name="cours_id" value="{{ $cours->id }}">
            <input type="hidden" name="formule" id="formuleInput" value="individuel">
            <input type="hidden" name="montant_total" id="montantTotalInput" value="{{ $prixIndividuel }}">
            <input type="hidden" name="acompte" id="acompteInput" value="{{ $acompteIndividuel }}">

            <div class="form-group">
                <label>Nom et Prénoms <span class="required">*</span></label>
                <input type="text" name="nom" class="form-control-moderne" placeholder="Votre nom complet" required>
            </div>

            <div class="form-group">
                <label>Téléphone <span class="required">*</span></label>
                <input type="tel" name="telephone" class="form-control-moderne" placeholder="+225 01 53 75 15 44" required>
            </div>

            <div class="form-group">
                <label>Email <span class="required">*</span></label>
                <input type="email" name="email" class="form-control-moderne" placeholder="votre@email.com" required>
            </div>

            <div class="form-group">
                <label>Ville / Commune <span class="required">*</span></label>
                <input type="text" name="ville" class="form-control-moderne" placeholder="Votre ville" required>
            </div>

            <div class="form-group">
                <label>Votre message (facultatif)</label>
                <textarea name="message" class="form-control-moderne" placeholder="Précisez vos besoins spécifiques..."></textarea>
            </div>

            <div class="cgv-card-box mb-3" style="background: rgba(255, 107, 53, 0.06); border: 1px solid rgba(255, 107, 53, 0.25); border-radius: 10px; padding: 12px 14px;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; flex-wrap: wrap; gap: 6px;">
                    <span style="font-size: 0.85rem; font-weight: 700; color: var(--blue-light); display: flex; align-items: center; gap: 6px;">
                        <i class="fas fa-file-pdf" style="color: #EF4444; font-size: 1.05rem;"></i> Conditions Générales de Vente
                    </span>
                    <a href="{{ asset('asset/fichier/CGVF.pdf') }}" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; gap: 5px; font-size: 0.78rem; font-weight: 700; color: var(--orange); background: #fff; border: 1.5px solid var(--orange); padding: 3px 10px; border-radius: 20px; text-decoration: none; transition: all 0.2s ease;">
                        <i class="fas fa-external-link-alt"></i> Lire le PDF
                    </a>
                </div>
                <div class="checkbox-group" style="margin: 0; padding: 0;">
                    <input type="checkbox" id="conditions" name="conditions" required style="accent-color: var(--orange); width: 17px; height: 17px; cursor: pointer;">
                    <label for="conditions" style="font-size: 0.84rem; color: var(--gray-700); cursor: pointer; line-height: 1.4; margin: 0;">
                        J'ai lu et j'accepte les <a href="{{ asset('asset/fichier/CGVF.pdf') }}" target="_blank" rel="noopener noreferrer" style="color: var(--orange); font-weight: 700; text-decoration: underline;">Conditions Générales de Vente (CGV)</a> et de paiement.
                    </label>
                </div>
            </div>

            <button type="submit" class="btn-reserver">
                <i class="fas fa-lock"></i> RÉSERVER MA PLACE
            </button>
        </form>

        <p class="security-text">
            <i class="fas fa-shield-alt"></i> Paiement sécurisé — Données protégées
        </p>
    </div>
</div>

            </div>

        </div>
    </div>
</section>

<!-- ============================================
     PARCOURS CLIENT
     ============================================ -->
<section class="parcours-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Comment ça marche ?</div>
            <h2 class="section-title-big">Votre <span style="color: var(--orange);">parcours</span> en 5 étapes</h2>
        </div>

        <div class="parcours-grid">
            <div class="parcours-step animate-scroll">
                <div class="parcours-number">1</div>
                <h4>Visite du site</h4>
                <p>Choisissez votre formation ou soutien scolaire parmi nos offres</p>
            </div>
            <div class="parcours-step animate-scroll">
                <div class="parcours-number">2</div>
                <h4>Choix de l'offre</h4>
                <p>Individuel, petit groupe ou soutien scolaire</p>
            </div>
            <div class="parcours-step animate-scroll">
                <div class="parcours-number">3</div>
                <h4>Paiement</h4>
                <p>Acompte de 30% ou frais d'inscription</p>
            </div>
            <div class="parcours-step animate-scroll">
                <div class="parcours-number">4</div>
                <h4>Confirmation</h4>
                <p>Email / WhatsApp automatique de validation</p>
            </div>
            <div class="parcours-step animate-scroll">
                <div class="parcours-number">5</div>
                <h4>Contact humain</h4>
                <p>Organisation de votre session ou affectation</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     AVIS CLIENTS
     ============================================ -->
<section class="avis-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Témoignages</div>
            <h2 class="section-title-big">Ce que disent nos <span style="color: var(--orange);">participants</span></h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4 animate-scroll">
                <div class="avis-card">
                    <div class="avis-header">
                        <div class="avis-avatar">MK</div>
                        <div class="avis-info">
                            <div class="avis-name">Marie K.</div>
                            <div class="avis-stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="avis-date">15 juin 2026</div>
                        </div>
                    </div>
                    <p class="avis-text">"Formation excellente ! Le formateur était très pédagogue et les supports de qualité. J'ai pu mettre en pratique immédiatement."</p>
                </div>
            </div>
            <div class="col-md-4 animate-scroll">
                <div class="avis-card">
                    <div class="avis-header">
                        <div class="avis-avatar">AD</div>
                        <div class="avis-info">
                            <div class="avis-name">Amadou D.</div>
                            <div class="avis-stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            </div>
                            <div class="avis-date">10 juin 2026</div>
                        </div>
                    </div>
                    <p class="avis-text">"La formule petit groupe est top ! On économise 50% et on apprend aussi des autres participants. Je recommande vivement."</p>
                </div>
            </div>
            <div class="col-md-4 animate-scroll">
                <div class="avis-card">
                    <div class="avis-header">
                        <div class="avis-avatar">SY</div>
                        <div class="avis-info">
                            <div class="avis-name">Sarah Y.</div>
                            <div class="avis-stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="avis-date">2 juin 2026</div>
                        </div>
                    </div>
                    <p class="avis-text">"Processus de réservation simple et rapide. L'équipe m'a contactée sous 24h pour organiser ma session. Très professionnel !"</p>
                </div>
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
                <img loading="lazy" decoding="async" src="{{ asset('asset/img/logo.png') }}" alt="Monprofchezmoi">
                                <p>Leader de l'accompagnement éducatif en Côte d'Ivoire. Depuis 2019, nous accompagnons près de 500 familles                 chaque année avec une approche pédagogique personnalisée et innovante.</p>
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
     MODAL CONFIRMATION
     ============================================ -->
<div class="modal fade modal-moderne" id="confirmationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-check-circle"></i> Réservation confirmée</h5>
            </div>
            <div class="modal-body">
                <div class="modal-icon">
                    <i class="fas fa-check"></i>
                </div>
                <h4>Merci pour votre réservation !</h4>
                <p>Votre place est pré-réservée sous réserve de validation du paiement de l'acompte.</p>
                <p>Notre équipe vous contactera dans les meilleurs délais afin d'organiser le démarrage de votre formation ou de vous communiquer les modalités de la prochaine session en petit groupe.</p>
                <button type="button" class="btn-reserver mt-3" data-bs-dismiss="modal">
                    <i class="fas fa-check"></i> J'ai compris
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ============================================
     SCRIPTS
     ============================================ -->
<script>
