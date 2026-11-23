<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Formation - Monprofchezmoi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta content="Cours en ligne" name="keywords">
    <meta content="Soutien Scolaire" name="description">

    <!-- Favicon -->
    <link href="{{ asset('asset/img/favicon.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
/* ============================================
   MONPROFCHEZMOI - DESIGN FORMATION DÉTAIL 2024
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
   NAVBAR MODERNE
   ============================================ */
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
    min-width: 320px;
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
.mega-body-moderne {
    padding: 20px 28px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}
.mega-link-moderne {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 0;
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

/* Mobile */
@media (max-width: 991px) {
    .nav-menu-moderne {
        flex-direction: column;
        padding: 16px;
    }
    .nav-menu-moderne .nav-link-moderne {
        padding: 14px 16px;
        width: 100%;
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
    }
    .nav-item-moderne.active .mega-menu-moderne {
        display: block;
    }
}

/* ============================================
   HERO FORMATION
   ============================================ */
.hero-formation {
    min-height: 45vh;
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 50%, #1a365d 100%);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
}
.hero-formation::before {
    content: '';
    position: absolute;
    top: -20%; right: -10%;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(255,107,53,0.15), transparent 70%);
    border-radius: 50%;
    animation: float-hero 8s ease-in-out infinite;
}
.hero-formation::after {
    content: '';
    position: absolute;
    bottom: -10%; left: -5%;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(59,130,246,0.1), transparent 70%);
    border-radius: 50%;
    animation: float-hero 10s ease-in-out infinite reverse;
}
@keyframes float-hero {
    0%, 100% { transform: translate(0, 0); }
    50% { transform: translate(-30px, -20px); }
}
.hero-formation-content {
    position: relative;
    z-index: 2;
    padding: 60px 0;
    text-align: center;
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
    margin-bottom: 20px;
    animation: fadeInUp 0.6s ease;
}
.hero-title-nouveau {
    font-size: clamp(2rem, 4vw, 3.2rem);
    font-weight: 800;
    color: white;
    line-height: 1.2;
    margin-bottom: 16px;
    animation: fadeInUp 0.8s ease 0.1s both;
}
.hero-title-nouveau .highlight-orange {
    color: var(--orange);
    position: relative;
}
.hero-subtitle-nouveau {
    font-size: 1.1rem;
    color: rgba(255,255,255,0.75);
    line-height: 1.8;
    max-width: 600px;
    margin: 0 auto;
    animation: fadeInUp 0.8s ease 0.2s both;
}

/* ============================================
   SECTIONS COMMUNES
   ============================================ */
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
    font-size: clamp(1.6rem, 3vw, 2.4rem);
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
   FILTRE LATÉRAL
   ============================================ */
.filter-section {
    background: var(--white);
    border-radius: 20px;
    padding: 28px;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--gray-100);
    position: sticky;
    top: 100px;
    max-height: 85vh;
    overflow-y: auto;
}
.filter-section::-webkit-scrollbar {
    width: 5px;
}
.filter-section::-webkit-scrollbar-thumb {
    background: var(--gray-200);
    border-radius: 10px;
}
.filter-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 24px;
    padding-bottom: 12px;
    border-bottom: 2px solid var(--orange);
    display: flex;
    align-items: center;
    gap: 10px;
}
.filter-title i {
    color: var(--orange);
}
.filter-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid var(--gray-100);
    cursor: pointer;
    transition: all 0.3s ease;
}
.filter-item:last-child {
    border-bottom: none;
}
.filter-item:hover {
    transform: translateX(5px);
}
.filter-item input[type="checkbox"] {
    width: 20px;
    height: 20px;
    border-radius: 6px;
    border: 2px solid var(--gray-200);
    appearance: none;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}
.filter-item input[type="checkbox"]:checked {
    background: var(--orange);
    border-color: var(--orange);
}
.filter-item input[type="checkbox"]:checked::after {
    content: '\2713';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 0.75rem;
    font-weight: 700;
}
.filter-item label {
    flex: 1;
    font-size: 0.9rem;
    color: var(--gray-800);
    cursor: pointer;
    margin: 0;
    font-weight: 500;
}
.filter-badge {
    background: var(--cream);
    color: var(--orange);
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 700;
}

/* ============================================
   CARTES COURS
   ============================================ */
.cours-section {
    background: var(--cream);
}
.cours-card {
    background: var(--white);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: 1px solid var(--gray-100);
    position: relative;
    margin-bottom: 24px;
}
.cours-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light));
    transform: scaleX(0);
    transition: transform 0.4s ease;
}
.cours-card:hover::before {
    transform: scaleX(1);
}
.cours-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.cours-card-body {
    padding: 28px;
}
.cours-card-header {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 20px;
}
.cours-icon {
    width: 56px; height: 56px;
    min-width: 56px;
    border-radius: 16px;
    background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    color: var(--orange);
    transition: all 0.4s ease;
}
.cours-card:hover .cours-icon {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    color: white;
    transform: scale(1.1) rotate(-5deg);
    box-shadow: var(--shadow-orange);
}
.cours-card h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--blue);
    margin: 0;
    line-height: 1.3;
    transition: color 0.3s ease;
}
.cours-card:hover h3 {
    color: var(--orange);
}
.cours-subtitle {
    font-size: 0.85rem;
    color: var(--gray-400);
    margin-bottom: 16px;
    font-weight: 500;
}
/* Étiquette rouge "Flash 3h Chrono" */
.cours-flash-label {
    position: absolute;
    top: 14px;
    right: 14px;
    z-index: 2;
    background: linear-gradient(135deg, #E53935, #FF5252);
    color: #fff;
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 5px 12px;
    border-radius: 30px;
    box-shadow: 0 4px 12px rgba(229,57,53,0.35);
    display: inline-flex;
    align-items: center;
    gap: 6px;
    animation: flashLabelPulse 2s infinite;
    white-space: nowrap;
}
.cours-flash-label i {
    font-size: 0.7rem;
}
@keyframes flashLabelPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.06); }
}
.cours-details {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 20px;
    padding: 16px;
    background: var(--cream);
    border-radius: 12px;
    border-left: 3px solid var(--orange);
}
.cours-detail-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 0.9rem;
    color: var(--gray-600);
    line-height: 1.5;
}
.cours-detail-item i {
    color: var(--orange);
    margin-top: 3px;
    font-size: 0.9rem;
    min-width: 16px;
}
.cours-detail-item .formatted-text {
    flex: 1;
}
.cours-description {
    font-size: 0.9rem;
    color: var(--gray-600);
    line-height: 1.7;
    margin-bottom: 20px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.cours-btn {
    display: block;
    width: 100%;
    padding: 14px 20px;
    background: var(--orange);
    color: white;
    text-align: center;
    border-radius: 12px;
    font-weight: 700;
    font-size: 0.95rem;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
}
.cours-btn:hover {
    background: var(--orange-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-orange);
    color: white;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 80px 20px;
}
.empty-state i {
    font-size: 4rem;
    color: var(--gray-200);
    margin-bottom: 24px;
}
.empty-state h3 {
    color: var(--blue);
    font-weight: 700;
    margin-bottom: 12px;
}
.empty-state p {
    color: var(--gray-600);
    max-width: 400px;
    margin: 0 auto;
}

/* Pagination */
.pagination-moderne {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 40px;
}
.pagination-moderne a,
.pagination-moderne button,
.pagination-moderne span {
    min-width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    text-decoration: none;
    border: none;
}
.pagination-moderne .page-active {
    background: var(--orange);
    color: white;
    box-shadow: var(--shadow-orange);
}
.pagination-moderne .page-link {
    background: var(--white);
    color: var(--gray-800);
    border: 1px solid var(--gray-200);
}
.pagination-moderne .page-link:hover {
    background: var(--orange);
    color: white;
    border-color: var(--orange);
    transform: translateY(-2px);
}
.pagination-moderne .page-disabled {
    background: var(--gray-100);
    color: var(--gray-400);
    cursor: not-allowed;
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
@media (max-width: 991px) {
    .footer-grid { grid-template-columns: 1fr 1fr; }
    .hero-formation { min-height: 35vh; }
    .filter-section {
        position: relative;
        top: 0;
        margin-bottom: 30px;
    }
}
@media (max-width: 767px) {
    .section-padding { padding: 60px 0; }
    .footer-grid { grid-template-columns: 1fr; }
    .topbar-info-minimal { display: none; }
    .cours-card { margin-bottom: 20px; }
    .hero-formation-content { padding: 40px 0; }
}
</style>
</head>
<body>

@include('partials.header')

<!-- ============================================
     HERO FORMATION
     ============================================ -->
<section class="hero-formation">
    <div class="container">
        <div class="hero-formation-content">
            <div class="hero-label"><i class="fas fa-graduation-cap"></i> Formations Professionnelles</div>
            <h1 class="hero-title-nouveau">{{ $formation->titre ?? 'Toutes les formations' }}</h1>
            <p class="hero-subtitle-nouveau">{{ $formation->description ?? 'Explorez nos formations et développez vos compétences avec nos experts.' }}</p>
        </div>
    </div>
</section>

<!-- ============================================
     CONTENU PRINCIPAL : FILTRE + COURS
     ============================================ -->
<section class="cours-section section-padding">
    <div class="container">
        <div class="row">
            <!-- Colonne Filtre -->
            <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
                <div class="filter-section animate-scroll">
                    <form method="GET" action="{{ route('filtrer_sous_formation', ['formationId' => $formation->id]) }}" id="filterForm">
                        <div class="filter-title">
                            <i class="fas fa-filter"></i> Filtrer par thématique
                        </div>

                        @foreach($sousFormations as $sousFormationOption)
                            <div class="filter-item">
                                <input type="checkbox"
                                       class="filter-checkbox"
                                       name="sousFormation[]"
                                       value="{{ $sousFormationOption->id }}"
                                       id="sousFormation_{{ $sousFormationOption->id }}"
                                       {{ in_array($sousFormationOption->id, $sousFormationIds ?? []) ? 'checked' : '' }}>
                                <label for="sousFormation_{{ $sousFormationOption->id }}">
                                    {{ $sousFormationOption->titre }}
                                </label>
                                <span class="filter-badge">{{ $sousFormationOption->cours->count() }}</span>
                            </div>
                        @endforeach
                    </form>
                </div>
            </div>

            <!-- Colonne Cours -->
            <div class="col-lg-9 col-md-8">
                <div class="section-header-center animate-scroll" style="text-align: left; margin-left: 0;">
                    <div class="section-label-orange">Nos cours</div>
                    <h2 class="section-title-big">{{ $formation->titre }}</h2>
                </div>

                @if($cours->isEmpty())
                    <div class="empty-state animate-scroll">
                        <i class="fas fa-inbox"></i>
                        <h3>Aucun cours disponible</h3>
                        <p>Aucun cours ne correspond à cette sélection pour le moment.</p>
                    </div>
                @else
                    <div class="row">
                        @foreach($cours as $coursItem)
                            @php
                                // Étiquette "Flash 3h Chrono" : titre contenant "chrono" + "3h"/"3 heures"
                                $isFlashChrono = (bool) preg_match('/chrono/i', $coursItem->titre)
                                              && (bool) preg_match('/3\s*h(?:eures?)?/i', $coursItem->titre);
                            @endphp
                            <div class="col-12 animate-scroll">
                                <div class="cours-card">
                                    @if($isFlashChrono)
                                        <span class="cours-flash-label"><i class="fas fa-bolt"></i> Flash 3h Chrono</span>
                                    @endif
                                    <div class="cours-card-body">
                                        <div class="cours-card-header">
                                            <div class="cours-icon">
                                                <i class="fas fa-book-open"></i>
                                            </div>
                                            <div>
                                                <h3>{{ $coursItem->titre }}</h3>
                                                <div class="cours-subtitle">Monprofchezmoi | Formation Adulte</div>
                                            </div>
                                        </div>

                                        <div class="cours-details">
                                            <div class="cours-detail-item">
                                                <i class="far fa-clock"></i>
                                                <span class="formatted-text">{!! nl2br(e($coursItem->heure)) !!}</span>
                                            </div>
                                            <div class="cours-detail-item">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span class="formatted-text">{!! nl2br(e($coursItem->lieu)) !!}</span>
                                            </div>
                                            <div class="cours-detail-item">
                                                <i class="fas fa-users"></i>
                                                <span class="formatted-text">{!! nl2br(e($coursItem->cible)) !!}</span>
                                            </div>
                                        </div>

                                        <p class="cours-description">
                                            {{ \Illuminate\Support\Str::limit($coursItem->description, 150) }}
                                        </p>

                                        <a href="{{ route('cours', ['id' => $coursItem->id]) }}" class="cours-btn">
                                            <i class="fas fa-info-circle me-2"></i>Je m'informe gratuitement
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-moderne">
                        @if (method_exists($cours, 'onFirstPage') && !$cours->onFirstPage())
                            <a href="{{ $cours->previousPageUrl() }}" class="page-link"><i class="fas fa-chevron-left"></i></a>
                        @else
                            <span class="page-disabled"><i class="fas fa-chevron-left"></i></span>
                        @endif

                        @if (method_exists($cours, 'getUrlRange'))
                            @foreach ($cours->getUrlRange(1, $cours->lastPage()) as $page => $url)
                                @if ($page == $cours->currentPage())
                                    <span class="page-active">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif

                        @if (method_exists($cours, 'hasMorePages') && $cours->hasMorePages())
                            <a href="{{ $cours->nextPageUrl() }}" class="page-link"><i class="fas fa-chevron-right"></i></a>
                        @else
                            <span class="page-disabled"><i class="fas fa-chevron-right"></i></span>
                        @endif
                    </div>
                @endif
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
                <img src="{{ asset('asset/img/logo.png') }}" alt="Monprofchezmoi">
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
<a href="#" class="back-to-top-moderne" id="backToTop"><i class="fas fa-arrow-up"></i></a>

<!-- ============================================
     SCRIPTS
     ============================================ -->
<script>
