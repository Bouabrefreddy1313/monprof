<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Bons de Formation - Monprofchezmoi-ci.com</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Bons de formation, cadeaux, formations professionnelles" name="keywords">
    <meta content="Offrez de nouvelles compétences avec nos bons de formation virtuels" name="description">

    <link href="/asset/img/favicon.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/asset/css/courscss/bootstrap.min.css" rel="stylesheet">
    <link href="/asset/css/courscss/style.css" rel="stylesheet">
</head>

<style>
/* ============================================
   MONPROFCHEZMOI - BONS DE FORMATION
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

/* Spinner */
.spinner-moderne {
    width: 45px; height: 45px;
    border: 3px solid rgba(255,107,53,0.15);
    border-top-color: var(--orange);
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
}
@keyframes spin { to { transform: rotate(360deg); } }

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
.mega-header-moderne h4 i { color: var(--orange); }
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

@media (max-width: 991px) {
    .nav-menu-moderne { flex-direction: column; padding: 16px; }
    .nav-menu-moderne .nav-link-moderne { padding: 14px 16px; width: 100%; }
    .mega-menu-moderne {
        position: static; transform: none; min-width: auto;
        box-shadow: none; border: none; opacity: 1; visibility: visible;
        display: none; margin-top: 8px;
    }
    .nav-item-moderne.active .mega-menu-moderne { display: block; }
    .mega-body-moderne { grid-template-columns: 1fr; }
}

/* ============================================
   HERO BONS - NOUVEAU
   ============================================ */
.hero-bons {
    min-height: 100vh;
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 50%, #1a365d 100%);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
}
.hero-bons::before {
    content: '';
    position: absolute;
    top: -20%; right: -10%;
    width: 600px; height: 600px;
    background: radial-gradient(circle, rgba(255,107,53,0.15), transparent 70%);
    border-radius: 50%;
    animation: float-hero 8s ease-in-out infinite;
}
.hero-bons::after {
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
.hero-content-bons {
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
.hero-title-bons {
    font-size: clamp(2.2rem, 4.5vw, 3.8rem);
    font-weight: 800;
    color: white;
    line-height: 1.15;
    margin-bottom: 20px;
    animation: fadeInUp 0.8s ease 0.1s both;
}
.hero-title-bons .highlight-orange {
    color: var(--orange);
    position: relative;
}
.hero-title-bons .highlight-orange::after {
    content: '';
    position: absolute;
    bottom: -4px; left: 0;
    width: 100%; height: 4px;
    background: var(--orange);
    border-radius: 2px;
    opacity: 0.6;
}
.hero-subtitle-bons {
    font-size: 1.15rem;
    color: rgba(255,255,255,0.75);
    line-height: 1.8;
    margin-bottom: 35px;
    max-width: 520px;
    animation: fadeInUp 0.8s ease 0.2s both;
}
.hero-features-bons {
    display: flex;
    flex-direction: column;
    gap: 14px;
    margin-bottom: 35px;
    animation: fadeInUp 0.8s ease 0.3s both;
}
.hero-feature-item {
    display: flex;
    align-items: center;
    gap: 12px;
    color: rgba(255,255,255,0.85);
    font-size: 1rem;
}
.hero-feature-item i {
    width: 28px; height: 28px;
    border-radius: 50%;
    background: rgba(255,107,53,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--orange);
    font-size: 0.85rem;
}
.hero-buttons-bons {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 20px;
    animation: fadeInUp 0.8s ease 0.4s both;
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
.hero-price-tag {
    color: rgba(255,255,255,0.7);
    font-size: 1rem;
    animation: fadeInUp 0.8s ease 0.5s both;
}
.hero-price-tag strong {
    color: var(--orange);
    font-size: 1.3rem;
}

/* Voucher Mockup 3D */
.voucher-mockup-bons {
    position: relative;
    height: 500px;
    display: flex;
    align-items: center;
    justify-content: center;
    perspective: 1000px;
}
.voucher-card-3d {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border-radius: 24px;
    padding: 2.5rem;
    box-shadow: var(--shadow-xl);
    color: var(--gray-800);
    transform: rotateY(-8deg) rotateX(5deg);
    max-width: 380px;
    width: 100%;
    border: 1px solid var(--gray-100);
    animation: tilt-voucher 6s ease-in-out infinite;
    position: relative;
    overflow: hidden;
}
.voucher-card-3d::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 5px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light));
}
@keyframes tilt-voucher {
    0%, 100% { transform: rotateY(-8deg) rotateX(5deg); }
    50% { transform: rotateY(8deg) rotateX(-3deg); }
}
.voucher-header-3d {
    text-align: center;
    margin-bottom: 1.5rem;
    border-bottom: 2px dashed var(--gray-200);
    padding-bottom: 1.5rem;
}
.voucher-header-3d h3 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 2px;
}
.voucher-value-3d {
    font-size: 3rem;
    font-weight: 800;
    color: var(--orange);
}
.voucher-value-3d span {
    font-size: 1rem;
    color: var(--gray-600);
    font-weight: 600;
}
.voucher-body-3d {
    text-align: center;
}
.voucher-body-3d p {
    color: var(--gray-600);
    margin-bottom: 1rem;
    font-size: 0.95rem;
}
.voucher-code-3d {
    background: var(--cream);
    border: 2px dashed var(--orange);
    border-radius: 12px;
    padding: 1rem;
    font-family: 'Courier New', monospace;
    font-weight: bold;
    font-size: 1.2rem;
    color: var(--orange);
    margin: 1rem 0;
    letter-spacing: 3px;
}
.voucher-expiry-3d {
    font-size: 0.85rem;
    color: var(--gray-400);
    margin-top: 1rem;
}
.voucher-stamp {
    position: absolute;
    top: 20px; right: 20px;
    width: 60px; height: 60px;
    border: 3px solid var(--orange);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--orange);
    font-size: 0.7rem;
    font-weight: 800;
    text-transform: uppercase;
    transform: rotate(-15deg);
    opacity: 0.8;
}

/* Floating Icons */
.float-icon-bons {
    position: absolute;
    width: 50px; height: 50px;
    border-radius: 14px;
    background: rgba(255,107,53,0.15);
    backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    color: var(--orange);
    animation: float-icon-bons 6s ease-in-out infinite;
}
.float-icon-bons.icon-1 { top: 10%; right: 10%; animation-delay: 0s; }
.float-icon-bons.icon-2 { bottom: 20%; left: 5%; animation-delay: -2s; background: rgba(59,130,246,0.15); color: var(--blue-accent); }
.float-icon-bons.icon-3 { top: 50%; right: 0; animation-delay: -4s; }
@keyframes float-icon-bons {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(10deg); }
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
   COMMENT ÇA MARCHE - STEPS
   ============================================ */
.steps-section {
    background: var(--cream);
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
    background: var(--white);
    border-radius: 20px;
    padding: 40px 28px;
    box-shadow: var(--shadow-sm);
    transition: all 0.4s ease;
    border: 1px solid var(--gray-100);
}
.step-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-lg);
    border-color: rgba(255,107,53,0.2);
}
.step-number {
    width: 60px; height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 1.5rem;
    font-weight: 800;
    color: white;
    box-shadow: var(--shadow-orange);
    position: relative;
}
.step-number::after {
    content: '';
    position: absolute;
    inset: -6px;
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
.step-icon-wrap {
    width: 70px; height: 70px;
    border-radius: 18px;
    background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
    font-size: 1.8rem;
    color: var(--orange);
    transition: all 0.4s ease;
}
.step-card:hover .step-icon-wrap {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    color: white;
    transform: scale(1.1) rotate(-5deg);
    box-shadow: var(--shadow-orange);
}

/* ============================================
   VOUCHERS CARDS
   ============================================ */
.vouchers-section {
    background: var(--white);
    position: relative;
}
.vouchers-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}
.voucher-card-item {
    background: var(--white);
    border-radius: 20px;
    box-shadow: var(--shadow-sm);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
    border: 2px solid transparent;
    display: flex;
    flex-direction: column;
}
.voucher-card-item::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light));
    transform: scaleX(0);
    transition: transform 0.4s ease;
}
.voucher-card-item:hover::before {
    transform: scaleX(1);
}
.voucher-card-item:hover {
    transform: translateY(-12px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.voucher-card-item.featured {
    border-color: var(--orange);
    transform: scale(1.03);
}
.voucher-card-item.featured:hover {
    transform: scale(1.03) translateY(-12px);
}
.voucher-badge {
    position: absolute;
    top: 20px; right: -35px;
    background: var(--orange);
    color: white;
    padding: 6px 40px;
    font-size: 0.75rem;
    font-weight: 700;
    transform: rotate(45deg);
    text-transform: uppercase;
    letter-spacing: 1px;
    z-index: 2;
    box-shadow: var(--shadow-sm);
}
.voucher-card-content {
    padding: 35px 28px;
    text-align: center;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.voucher-icon-top {
    width: 70px; height: 70px;
    border-radius: 18px;
    background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 1.8rem;
    color: var(--orange);
    transition: all 0.4s ease;
}
.voucher-card-item:hover .voucher-icon-top {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    color: white;
    transform: scale(1.1) rotate(-5deg);
    box-shadow: var(--shadow-orange);
}
.voucher-card-item h4 {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 12px;
}
.voucher-description {
    color: var(--gray-600);
    font-size: 0.92rem;
    line-height: 1.7;
    margin-bottom: 20px;
    flex: 1;
}
.voucher-price {
    margin-bottom: 20px;
}
.price-amount {
    font-size: 2.8rem;
    font-weight: 800;
    color: var(--orange);
    line-height: 1;
}
.price-amount span {
    font-size: 1rem;
    color: var(--gray-600);
    font-weight: 600;
}
.voucher-features-list {
    text-align: left;
    margin-bottom: 28px;
}
.voucher-feature {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
    font-size: 0.9rem;
    color: var(--gray-600);
}
.voucher-feature i {
    color: var(--orange);
    width: 18px;
    font-size: 0.85rem;
}
.btn-voucher-buy {
    width: 100%;
    padding: 14px 24px;
    font-weight: 700;
    font-size: 0.95rem;
    border-radius: 12px;
    transition: all 0.3s ease;
    border: none;
    background: var(--orange);
    color: white;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    cursor: pointer;
}
.btn-voucher-buy:hover {
    background: var(--orange-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-orange);
    color: white;
}

/* ============================================
   FAQ SECTION
   ============================================ */
.faq-section {
    background: var(--cream);
}
.faq-grid {
    max-width: 800px;
    margin: 0 auto;
}
.faq-item {
    background: var(--white);
    border-radius: 16px;
    margin-bottom: 16px;
    box-shadow: var(--shadow-sm);
    overflow: hidden;
    border: 1px solid var(--gray-100);
    transition: all 0.3s ease;
}
.faq-item:hover {
    box-shadow: var(--shadow-md);
}
.faq-question {
    padding: 20px 28px;
    font-weight: 700;
    color: var(--blue);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    transition: all 0.3s ease;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    font-size: 1rem;
}
.faq-question:hover {
    color: var(--orange);
}
.faq-question i {
    color: var(--orange);
    transition: transform 0.3s ease;
    font-size: 0.9rem;
}
.faq-item.active .faq-question i {
    transform: rotate(180deg);
}
.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s ease, padding 0.4s ease;
    padding: 0 28px;
}
.faq-item.active .faq-answer {
    max-height: 300px;
    padding: 0 28px 20px 28px;
}
.faq-answer p {
    color: var(--gray-600);
    line-height: 1.7;
    font-size: 0.95rem;
    margin: 0;
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
.btn-cta-final.btn-orange {
    background: var(--orange);
    color: white;
    box-shadow: var(--shadow-orange);
}
.btn-cta-final.btn-orange:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(255,107,53,0.4);
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
.security-badges {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-top: 40px;
    flex-wrap: wrap;
}
.badge-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: rgba(255,255,255,0.6);
    font-size: 0.9rem;
}
.badge-item i {
    color: var(--orange);
    font-size: 1.1rem;
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

/* Responsive */
@media (max-width: 1199px) {
    .vouchers-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 991px) {
    .hero-grid { grid-template-columns: 1fr; }
    .voucher-mockup-bons { display: none; }
    .steps-grid { grid-template-columns: 1fr; }
    .steps-grid::before { display: none; }
    .footer-grid { grid-template-columns: 1fr 1fr; }
    .vouchers-grid { grid-template-columns: 1fr; }
    .voucher-card-item.featured { transform: none; }
    .voucher-card-item.featured:hover { transform: translateY(-12px); }
}
@media (max-width: 767px) {
    .section-padding { padding: 60px 0; }
    .footer-grid { grid-template-columns: 1fr; }
    .hero-title-bons { font-size: 2rem; }
    .cta-buttons-final { flex-direction: column; }
    .cta-buttons-final .btn-cta-final { width: 100%; justify-content: center; }
}
</style>

<body>

<!-- Scroll Progress -->
<div class="scroll-progress" id="scrollProgress"></div>

<!-- Spinner -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center" style="z-index: 9999;">
    <div class="spinner-moderne"></div>
</div>

<!-- ============================================
     TOPBAR
     ============================================ -->
<div class="topbar-minimal">
    <div class="container">
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
<nav class="navbar navbar-expand-lg navbar-moderne">
    <div class="container">
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
                                <a href="{{ url('/particuliers/soutien-brevet') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-certificate"></i></div><span>Préparation Brevet</span></a>
                                <a href="{{ url('/particuliers/college-methode') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-user-graduate"></i></div><span>Méthodologie et autonomie</span></a>
                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/particuliers/coaching') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-graduation-cap"></i></div><span>Coaching scolaire</span></a>
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
                                <a href="{{ url('/particuliers/terminale') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Orientation</span></a>
                                <a href="{{ url('/particuliers/coaching') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-graduation-cap"></i></div><span>Coaching scolaire</span></a>
                                <a href="{{ url('/particuliers/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
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
<a href="{{ url('/particuliers/seconde') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Orientation en seconde</span></a>
                                <a href="{{ url('/particuliers/premiere') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Orientation en premiere</span></a>
                                <a href="{{ url('/particuliers/groupe') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-calculator"></i></div><span>Préparation DCG / DSCG</span></a>

                            </div>
                            <div>
                                <div class="mega-col-title">Nos activités</div>
                                <a href="{{ url('/particuliers/reussir') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-microphone"></i></div><span>Réussir ses oraux</span></a>
                                <a href="{{ url('/particuliers/terminale') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-compass"></i></div><span>Orientation en terminal</span></a>

                                <a href="{{ url('/particuliers/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item-moderne">
                    <a href="#" class="nav-link-moderne">Adultes <i class="fas fa-chevron-down chevron"></i></a>
                    <div class="mega-menu-moderne">
                        <div class="mega-header-moderne">
                            <h4><i class="fas fa-users"></i> Adultes</h4>
                            <p>Formations et activités</p>
                        </div>
                        <div class="mega-body-moderne" style="grid-template-columns: 1fr;">
                            <div>
                                <div class="mega-col-title">Nos services</div>
                                <a href="{{ url('/particuliers/formations') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-chalkboard-teacher"></i></div><span>Toutes les formations professionnelles</span></a>
                                <a href="{{ url('/particuliers/sportif') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-running"></i></div><span>Sport à domicile</span></a>
                                <a href="{{ url('/particuliers/musique') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-music"></i></div><span>Musique et chant</span></a>
                                <a href="{{ url('/particuliers/bons/client') }}" class="mega-link-moderne"><div class="mega-link-icon"><i class="fas fa-gift"></i></div><span>Bons cadeaux</span></a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item-moderne"><a href="{{ route('profil.choisir', ['profil' => 'entreprise']) }}" class="nav-link-moderne" title="Changer d'espace"><i class="fas fa-exchange-alt" aria-hidden="true"></i> Espace entreprises</a></li>

                <li class="nav-item-moderne"><a href="#about" class="nav-link-moderne">À propos</a></li>
                <li class="nav-item-moderne"><a href="/particuliers/contact" class="nav-link-moderne">Contact</a></li>
            </ul>

            <div class="ms-lg-3 mt-3 mt-lg-0">
                @auth
                    <div class="user-connected">
                        <a href="{{ route('particuliers.dashboard') }}" class="d-flex align-items-center text-decoration-none">
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
     HERO BONS
     ============================================ -->
<section class="hero-bons">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content-bons">
                <div class="hero-label"><i class="fas fa-gift"></i> Bons de formation virtuels</div>
                <h1 class="hero-title-bons">Offrez de nouvelles <span class="highlight-orange">compétences</span> à vos proches</h1>
                <p class="hero-subtitle-bons">Grâce à nos bons de formation virtuels, permettez à vos proches, collaborateurs ou à vous-même de suivre la formation de votre choix, en ligne et à votre rythme.</p>

                <div class="hero-features-bons">
                    <div class="hero-feature-item"><i class="fas fa-check"></i> Valables 12 mois</div>
                    <div class="hero-feature-item"><i class="fas fa-check"></i> Utilisables sur toutes nos formations</div>
                    <div class="hero-feature-item"><i class="fas fa-check"></i> Envoi immédiat par email</div>
                </div>

                <div class="hero-buttons-bons">
                    <a href="#vouchers-section" class="btn-hero-nouveau btn-orange"><i class="fas fa-gift"></i> Acheter un bon maintenant</a>
                    <a href="{{ url('/particuliers/formations') }}" class="btn-hero-nouveau btn-outline"><i class="fas fa-graduation-cap"></i> Voir les formations</a>
                </div>

                <p class="hero-price-tag">À partir de <strong>50.000 FCFA</strong> — Paiement sécurisé</p>
            </div>

            <div class="voucher-mockup-bons d-none d-lg-block">
                <div class="float-icon-bons icon-1"><i class="fas fa-gift"></i></div>
                <div class="float-icon-bons icon-2"><i class="fas fa-graduation-cap"></i></div>
                <div class="float-icon-bons icon-3"><i class="fas fa-star"></i></div>

                <div class="voucher-card-3d">
                    <div class="voucher-stamp">VALIDE</div>
                    <div class="voucher-header-3d">
                        <h3>BON DE FORMATION</h3>
                        <div class="voucher-value-3d">50.000 <span>FCFA</span></div>
                    </div>
                    <div class="voucher-body-3d">
                        <p>Valable pour toute formation en ligne</p>
                        <div class="voucher-code-3d">MPCHZ-2024-CI</div>
                        <p class="voucher-expiry-3d">Valide jusqu'au 31/12/2025</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     COMMENT ÇA MARCHE
     ============================================ -->
<section class="steps-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Processus</div>
            <h2 class="section-title-big">Comment ça marche ?</h2>
            <p class="section-subtitle">Un processus simple et efficace en 3 étapes</p>
        </div>

        <div class="steps-grid">
            <div class="step-card animate-scroll">
                <div class="step-number">1</div>
                <div class="step-icon-wrap"><i class="fas fa-credit-card"></i></div>
                <h3>Achetez votre bon</h3>
                <p>Choisissez le montant et procédez au paiement sécurisé. Possibilité d'offrir à quelqu'un d'autre.</p>
            </div>
            <div class="step-card animate-scroll">
                <div class="step-number">2</div>
                <div class="step-icon-wrap"><i class="fas fa-envelope"></i></div>
                <h3>Recevez votre code</h3>
                <p>Un code unique vous est envoyé immédiatement par email avec votre bon au format PDF.</p>
            </div>
            <div class="step-card animate-scroll">
                <div class="step-number">3</div>
                <div class="step-icon-wrap"><i class="fas fa-play-circle"></i></div>
                <h3>Utilisez votre bon</h3>
                <p>Inscrivez-vous à la formation de votre choix en utilisant votre code unique.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     NOS BONS DISPONIBLES
     ============================================ -->
<section id="vouchers-section" class="vouchers-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Nos offres</div>
            <h2 class="section-title-big">🎁 Nos bons de formation disponibles</h2>
            <p class="section-subtitle">Choisissez le bon qui correspond à vos besoins</p>
        </div>

        <div class="vouchers-grid">
            @forelse($vouchers as $voucher)
            <div class="voucher-card-item animate-scroll" data-price="{{ $voucher->amount }}">
                <div class="voucher-card-content">
                    <div class="voucher-icon-top"><i class="fas fa-gift"></i></div>
                    <h4>{{ $voucher->title }}</h4>
                    <p class="voucher-description">{{ $voucher->description }}</p>
                    <div class="voucher-price">
                        <div class="price-amount">{{ number_format($voucher->amount, 0, ',', ' ') }} <span>FCFA</span></div>
                    </div>
                    <div class="voucher-features-list">
                        <div class="voucher-feature"><i class="fas fa-check"></i> Accès formations en ligne</div>
                        <div class="voucher-feature"><i class="fas fa-check"></i> Support inclus</div>
                        <div class="voucher-feature"><i class="fas fa-check"></i> Certificat de fin</div>
                    </div>
                    <a href="{{ route('particuliers.voucher-orders.create', $voucher->id) }}" class="btn-voucher-buy">
                        <i class="fas fa-shopping-cart"></i> Acheter maintenant
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center animate-scroll">
                <div style="padding: 60px; text-align: center;">
                    <div style="width: 80px; height: 80px; border-radius: 20px; background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05)); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 2rem; color: var(--orange);">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h3 style="color: var(--blue); font-weight: 700; margin-bottom: 10px;">Aucun bon disponible</h3>
                    <p style="color: var(--gray-600);">Revenez bientôt pour découvrir nos nouvelles offres !</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ============================================
     FAQ
     ============================================ -->
<section class="faq-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">FAQ</div>
            <h2 class="section-title-big">Questions fréquentes</h2>
            <p class="section-subtitle">Trouvez les réponses à vos questions</p>
        </div>

        <div class="faq-grid">
            <div class="faq-item animate-scroll active">
                <button class="faq-question">
                    <span>Combien de temps sont valables les bons ?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Tous nos bons de formation sont valables 12 mois à partir de la date d'achat. Vous disposez ainsi d'un an entier pour choisir la formation qui vous convient.</p>
                </div>
            </div>
            <div class="faq-item animate-scroll">
                <button class="faq-question">
                    <span>Puis-je utiliser mon bon pour plusieurs formations ?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Oui ! Vous pouvez utiliser la valeur de votre bon pour une ou plusieurs formations, tant que le montant total ne dépasse pas la valeur du bon. Le solde reste utilisable sur d'autres formations.</p>
                </div>
            </div>
            <div class="faq-item animate-scroll">
                <button class="faq-question">
                    <span>Comment offrir un bon à quelqu'un ?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Lors de l'achat, il vous suffit de renseigner l'email du bénéficiaire au lieu du vôtre. Le bon sera envoyé directement à la personne de votre choix avec un message personnalisé.</p>
                </div>
            </div>
            <div class="faq-item animate-scroll">
                <button class="faq-question">
                    <span>Le paiement est-il sécurisé ?</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Absolument. Tous nos paiements sont sécurisés via des plateformes de paiement certifiées. Vos données bancaires ne sont jamais stockées sur nos serveurs.</p>
                </div>
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
            <h2 class="section-title-big">Offrez le cadeau de l'apprentissage</h2>
            <p class="section-subtitle">Un bon de formation est le cadeau parfait pour faire progresser ceux que vous aimez. Simple, rapide et utile.</p>

            <div class="cta-buttons-final">
                <a href="#vouchers-section" class="btn-cta-final btn-orange"><i class="fas fa-gift"></i> Choisir un bon maintenant</a>
                <a href="tel:+2250153751544" class="btn-cta-final btn-outline-light"><i class="fas fa-phone-alt"></i> Nous contacter</a>
            </div>

            <div class="security-badges">
                <div class="badge-item"><i class="fas fa-shield-alt"></i> Paiement sécurisé</div>
                <div class="badge-item"><i class="fas fa-envelope"></i> Envoi immédiat</div>
                <div class="badge-item"><i class="fas fa-undo"></i> Satisfait ou remboursé</div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// ============================================
// SCROLL PROGRESS + NAVBAR + BACK TO TOP
// ============================================
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

// ============================================
// SPINNER
// ============================================
window.addEventListener('load', function() {
    setTimeout(() => {
        document.getElementById('spinner').classList.remove('show');
    }, 500);
});

// ============================================
// MOBILE MEGA MENU
// ============================================
document.querySelectorAll('.nav-item-moderne').forEach(item => {
    const link = item.querySelector('.nav-link-moderne');
    if (link && item.querySelector('.mega-menu-moderne')) {
        link.addEventListener('click', function(e) {
            if (window.innerWidth < 992) {
                e.preventDefault();
                item.classList.toggle('active');
            }
        });
    }
});

// ============================================
// SCROLL ANIMATIONS (Intersection Observer)
// ============================================
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

// ============================================
// SMOOTH SCROLL
// ============================================
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

// ============================================
// FAQ ACCORDION
// ============================================
document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', function() {
        const item = this.parentElement;
        const isActive = item.classList.contains('active');

        document.querySelectorAll('.faq-item').forEach(faq => {
            faq.classList.remove('active');
        });

        if (!isActive) {
            item.classList.add('active');
        }
    });
});

// ============================================
// VOUCHER CARDS ANIMATION
// ============================================
document.querySelectorAll('.voucher-card-item').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = this.classList.contains('featured')
            ? 'scale(1.03) translateY(-12px)'
            : 'translateY(-12px)';
    });

    card.addEventListener('mouseleave', function() {
        this.style.transform = this.classList.contains('featured')
            ? 'scale(1.03)'
            : 'translateY(0)';
    });
});

// ============================================
// FLOATING ICONS PARALLAX
// ============================================
let ticking = false;
window.addEventListener('scroll', function() {
    if (!ticking) {
        requestAnimationFrame(function() {
            const scrolled = window.pageYOffset;
            document.querySelectorAll('.float-icon-bons').forEach((icon, index) => {
                const speed = 0.3 + (index * 0.1);
                icon.style.transform = `translateY(${scrolled * speed * 0.5}px) rotate(${scrolled * 0.02}deg)`;
            });
            ticking = false;
        });
        ticking = true;
    }
});

// ============================================
// VOUCHER 3D TILT ON MOUSE MOVE (desktop)
// ============================================
const voucher3D = document.querySelector('.voucher-card-3d');
if (voucher3D && window.innerWidth > 991) {
    document.querySelector('.voucher-mockup-bons').addEventListener('mousemove', function(e) {
        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        const rotateX = (y - centerY) / 20;
        const rotateY = (centerX - x) / 20;

        voucher3D.style.animation = 'none';
        voucher3D.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
    });

    document.querySelector('.voucher-mockup-bons').addEventListener('mouseleave', function() {
        voucher3D.style.animation = 'tilt-voucher 6s ease-in-out infinite';
    });
}

// ============================================
// BUTTON RIPPLE EFFECT
// ============================================
document.querySelectorAll('.btn-hero-nouveau, .btn-voucher-buy, .btn-cta-final').forEach(btn => {
    btn.addEventListener('click', function(e) {
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;

        ripple.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            left: ${x}px;
            top: ${y}px;
            background: rgba(255,255,255,0.3);
            border-radius: 50%;
            transform: scale(0);
            animation: ripple 0.6s ease-out;
            pointer-events: none;
        `;

        this.style.position = 'relative';
        this.style.overflow = 'hidden';
        this.appendChild(ripple);

        setTimeout(() => ripple.remove(), 600);
    });
});

// Add ripple keyframe
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to { transform: scale(4); opacity: 0; }
    }
`;
document.head.appendChild(style);

// ============================================
// COUNT UP ANIMATION FOR PRICES
// ============================================
function animateValue(obj, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const value = Math.floor(progress * (end - start) + start);
        obj.innerHTML = value.toLocaleString('fr-FR') + ' <span>FCFA</span>';
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}

const vouchersObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            document.querySelectorAll('.price-amount').forEach(price => {
                const text = price.textContent.replace(/[^0-9]/g, '');
                const value = parseInt(text);
                if (!isNaN(value) && value > 0) {
                    animateValue(price, 0, value, 1500);
                }
            });
            vouchersObserver.disconnect();
        }
    });
}, { threshold: 0.3 });

const vouchersSection = document.getElementById('vouchers-section');
if (vouchersSection) vouchersObserver.observe(vouchersSection);

// ============================================
// PERFORMANCE MONITORING
// ============================================
if ('performance' in window) {
    window.addEventListener('load', function() {
        const loadTime = performance.now();
        console.log(`Page Bons de Formation chargée en ${loadTime.toFixed(2)}ms`);
    });
}

// ============================================
// ERROR HANDLING
// ============================================
window.addEventListener('error', function(e) {
    console.error('Erreur JavaScript:', e.error);
});
</script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
