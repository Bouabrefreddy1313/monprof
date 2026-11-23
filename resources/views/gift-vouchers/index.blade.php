<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Bons de Formation Virtuelle - Offrez de nouvelles compétences</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('partials.responsive-assets')
</head>
<style>
/* ============================================
   MONPROFCHEZMOI - DESIGN SYSTEM 2024
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
   SPINNER
   ============================================ */
.spinner-moderne {
    width: 45px; height: 45px;
    border: 3px solid rgba(255,107,53,0.15);
    border-top-color: var(--orange);
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
}
@keyframes spin { to { transform: rotate(360deg); } }

/* ============================================
   HERO - BONS DE FORMATION
   ============================================ */
.hero-bons {
    min-height: 85vh;
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
    font-size: clamp(2.2rem, 4.5vw, 3.5rem);
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
    font-size: 1.05rem;
}
.hero-feature-item i {
    width: 32px; height: 32px;
    border-radius: 8px;
    background: rgba(255,107,53,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--orange);
    font-size: 0.9rem;
}
.hero-buttons-bons {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 25px;
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
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: rgba(255,255,255,0.8);
    font-size: 0.95rem;
    animation: fadeInUp 0.8s ease 0.5s both;
}
.hero-price-tag i {
    color: var(--orange);
}

/* Hero Voucher Mockup */
.hero-voucher-wrap {
    position: relative;
    height: 450px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.voucher-mockup-moderne {
    perspective: 1000px;
    transform-style: preserve-3d;
    animation: tilt 6s ease-in-out infinite;
}
@keyframes tilt {
    0%, 100% { transform: rotateY(5deg) rotateX(5deg); }
    50% { transform: rotateY(-5deg) rotateX(-5deg); }
}
.voucher-card-moderne {
    background: linear-gradient(135deg, #ffffff 0%, var(--cream) 100%);
    border-radius: 24px;
    padding: 2.5rem;
    box-shadow: var(--shadow-xl);
    color: var(--gray-800);
    max-width: 340px;
    position: relative;
    overflow: hidden;
    border: 1px solid var(--gray-100);
}
.voucher-card-moderne::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 5px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light));
}
.voucher-header-moderne {
    text-align: center;
    margin-bottom: 1.5rem;
    border-bottom: 2px dashed var(--gray-200);
    padding-bottom: 1rem;
}
.voucher-header-moderne h3 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 0.5rem;
}
.voucher-value-moderne {
    font-size: 2.8rem;
    font-weight: 800;
    color: var(--orange);
}
.voucher-code-moderne {
    background: var(--gray-50);
    border: 2px dashed var(--orange);
    border-radius: 12px;
    padding: 1rem;
    font-family: 'Courier New', monospace;
    font-weight: bold;
    font-size: 1.1rem;
    color: var(--orange);
    margin: 1rem 0;
    letter-spacing: 3px;
    text-align: center;
}
.voucher-expiry-moderne {
    font-size: 0.85rem;
    color: var(--gray-400);
    text-align: center;
    margin-top: 0.5rem;
}
.voucher-stamp {
    position: absolute;
    bottom: -10px; right: -10px;
    width: 80px; height: 80px;
    border: 3px solid var(--orange);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--orange);
    font-weight: 800;
    font-size: 0.7rem;
    text-transform: uppercase;
    transform: rotate(-15deg);
    opacity: 0.3;
}

/* Floating elements */
.float-elements {
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    pointer-events: none;
}
.float-icon {
    position: absolute;
    width: 55px; height: 55px;
    border-radius: 16px;
    background: rgba(255,107,53,0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    color: var(--orange);
    animation: float-icon 8s ease-in-out infinite;
}
.float-icon.icon-1 { top: 10%; right: 15%; animation-delay: 0s; }
.float-icon.icon-2 { bottom: 20%; left: 5%; animation-delay: -2s; background: rgba(59,130,246,0.15); color: var(--blue-accent); }
.float-icon.icon-3 { top: 55%; right: 5%; animation-delay: -4s; }
@keyframes float-icon {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
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
.step-card-moderne {
    text-align: center;
    position: relative;
    z-index: 2;
}
.step-number-moderne {
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
.step-number-moderne::after {
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
.step-card-moderne h3 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 10px;
}
.step-card-moderne p {
    font-size: 0.95rem;
    color: var(--gray-600);
    line-height: 1.7;
}
.step-icon-moderne {
    font-size: 2rem;
    margin-bottom: 8px;
}

/* ============================================
   VOUCHERS GRID - CARDS MODERNES
   ============================================ */
.vouchers-section {
    background: var(--white);
    position: relative;
    overflow: hidden;
}
.vouchers-section::before {
    content: '';
    position: absolute;
    top: -100px; right: -100px;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(255,107,53,0.05), transparent 70%);
}
.vouchers-grid-moderne {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
}
.voucher-card-item {
    background: var(--white);
    border-radius: 24px;
    overflow: hidden;
    border: 1px solid var(--gray-100);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    height: 100%;
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
    box-shadow: var(--shadow-orange);
}
.voucher-card-item.featured:hover {
    transform: scale(1.03) translateY(-12px);
}
.voucher-badge-moderne {
    position: absolute;
    top: 20px; right: -35px;
    background: var(--orange);
    color: white;
    padding: 6px 45px;
    font-size: 0.75rem;
    font-weight: 700;
    transform: rotate(45deg);
    text-transform: uppercase;
    letter-spacing: 1px;
    z-index: 2;
    box-shadow: var(--shadow-sm);
}
.voucher-card-header {
    padding: 30px 28px 20px;
    text-align: center;
    border-bottom: 2px dashed var(--gray-100);
}
.voucher-card-header h4 {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 8px;
}
.voucher-card-header .voucher-price-tag {
    font-size: 2.8rem;
    font-weight: 800;
    color: var(--orange);
    line-height: 1;
}
.voucher-card-header .voucher-price-tag span {
    font-size: 1rem;
    font-weight: 600;
    color: var(--gray-400);
}
.voucher-card-body {
    padding: 24px 28px;
    flex: 1;
}
.voucher-card-body p {
    color: var(--gray-600);
    font-size: 0.95rem;
    line-height: 1.7;
    margin-bottom: 20px;
}
.voucher-features-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.voucher-feature {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.9rem;
    color: var(--gray-800);
}
.voucher-feature i {
    width: 24px; height: 24px;
    border-radius: 6px;
    background: rgba(16,185,129,0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #10B981;
    font-size: 0.75rem;
}
.voucher-card-footer {
    padding: 0 28px 28px;
}
.btn-voucher-moderne {
    width: 100%;
    padding: 14px 24px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 0.95rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.3s ease;
    border: none;
    background: var(--orange);
    color: white;
    box-shadow: 0 4px 16px rgba(255,107,53,0.25);
}
.btn-voucher-moderne:hover {
    background: var(--orange-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(255,107,53,0.35);
    color: white;
}

/* ============================================
   INFO SECTION - FEATURES
   ============================================ */
.info-section {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
    position: relative;
    overflow: hidden;
}
.info-section::before {
    content: '';
    position: absolute;
    top: -100px; right: -100px;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(255,107,53,0.1), transparent 70%);
}
.info-section .section-title-big,
.info-section .section-subtitle {
    color: white;
}
.info-section .section-label-orange {
    color: var(--orange-light);
}
.info-section .section-label-orange::before {
    background: var(--orange-light);
}
.info-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}
.info-card {
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 20px;
    padding: 40px 28px;
    text-align: center;
    transition: all 0.4s ease;
}
.info-card:hover {
    background: rgba(255,255,255,0.12);
    transform: translateY(-8px);
    border-color: rgba(255,107,53,0.3);
}
.info-icon {
    width: 70px; height: 70px;
    border-radius: 18px;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 1.8rem;
    color: white;
    box-shadow: 0 10px 25px rgba(255,107,53,0.3);
    transition: all 0.4s ease;
}
.info-card:hover .info-icon {
    transform: rotate(10deg) scale(1.1);
}
.info-card h4 {
    font-size: 1.15rem;
    font-weight: 700;
    color: white;
    margin-bottom: 12px;
}
.info-card p {
    font-size: 0.9rem;
    color: rgba(255,255,255,0.7);
    line-height: 1.7;
    margin: 0;
}

/* ============================================
   CTA FINAL
   ============================================ */
.cta-final {
    background: var(--cream);
    text-align: center;
}
.cta-final .section-title-big {
    color: var(--blue);
}
.cta-final .section-subtitle {
    color: var(--gray-600);
}
.cta-buttons-final {
    display: flex;
    justify-content: center;
    gap: 16px;
    flex-wrap: wrap;
    margin-top: 40px;
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
    box-shadow: 0 8px 24px rgba(255,107,53,0.3);
}
.btn-cta-final.btn-orange:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(255,107,53,0.4);
}
.btn-cta-final.btn-outline {
    background: transparent;
    color: var(--blue);
    border: 2px solid var(--gray-200);
}
.btn-cta-final.btn-outline:hover {
    background: var(--blue);
    color: white;
    border-color: var(--blue);
}

/* ============================================
   EMPTY STATE
   ============================================ */
.empty-state {
    text-align: center;
    padding: 60px 20px;
}
.empty-state-icon {
    width: 100px; height: 100px;
    border-radius: 50%;
    background: var(--gray-50);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    font-size: 2.5rem;
    color: var(--gray-400);
}
.empty-state h4 {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 8px;
}
.empty-state p {
    color: var(--gray-600);
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

/* ============================================
   BACK TO TOP
   ============================================ */
.back-to-top-moderne {
    position: fixed;
    bottom: 30px; right: 30px;
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
    color: white;
}

/* ============================================
   RESPONSIVE
   ============================================ */
@media (max-width: 991px) {
    .hero-grid { grid-template-columns: 1fr; }
    .hero-voucher-wrap { display: none; }
    .steps-grid { grid-template-columns: 1fr; }
    .steps-grid::before { display: none; }
    .info-grid { grid-template-columns: 1fr; }
    .vouchers-grid-moderne { grid-template-columns: 1fr; }
    .section-padding { padding: 60px 0; }
}

@media (max-width: 767px) {
    .hero-content-bons { padding: 60px 0; }
    .hero-title-bons { font-size: 2rem; }
    .hero-buttons-bons { flex-direction: column; }
    .btn-hero-nouveau { width: 100%; justify-content: center; }
    .cta-buttons-final { flex-direction: column; }
    .btn-cta-final { width: 100%; justify-content: center; }
}
</style>
<body>

<!-- Scroll Progress -->
<div class="scroll-progress" id="scrollProgress"></div>



<!-- ============================================
     HERO SECTION
     ============================================ -->
<section class="hero-bons">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content-bons">
                <div class="hero-label"><i class="fas fa-gift"></i> Offrez l'avenir</div>
                <h1 class="hero-title-bons">🎁 Nos bons cadeaux <span class="highlight-orange">disponibles</span></h1>
                <p class="hero-subtitle-bons">Choisissez le bon cadeau parfait pour offrir une formation de qualité. Un cadeau utile, mémorable et qui change des vies.</p>

                <div class="hero-features-bons">
                    <div class="hero-feature-item">
                        <i class="fas fa-clock"></i>
                        <span>Valables 12 mois à partir de l'achat</span>
                    </div>
                    <div class="hero-feature-item">
                        <i class="fas fa-envelope"></i>
                        <span>Envoi immédiat par email personnalisé</span>
                    </div>
                    <div class="hero-feature-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Paiement sécurisé et garantie satisfait</span>
                    </div>
                    <div class="hero-feature-item">
                        <i class="fas fa-infinity"></i>
                        <span>Utilisable sur toutes nos formations</span>
                    </div>
                </div>

                <div class="hero-buttons-bons">
                    <a href="#vouchers-section" class="btn-hero-nouveau btn-orange">
                        <i class="fas fa-shopping-cart"></i> Voir les bons disponibles
                    </a>
                    <a href="/formations" class="btn-hero-nouveau btn-outline">
                        <i class="fas fa-graduation-cap"></i> Découvrir les formations
                    </a>
                </div>

                <div class="hero-price-tag">
                    <i class="fas fa-tag"></i>
                    <span>À partir de 50 000 FCFA</span>
                </div>
            </div>

            <div class="hero-voucher-wrap d-none d-lg-block">
                <div class="voucher-mockup-moderne">
                    <div class="voucher-card-moderne">
                        <div class="voucher-header-moderne">
                            <h3><i class="fas fa-gift"></i> Bon Cadeau Formation</h3>
                            <div class="voucher-value-moderne">25 000 FCFA</div>
                        </div>
                        <div class="voucher-body">
                            <div class="voucher-code-moderne">MPM-GIFT-2024</div>
                            <div class="voucher-expiry-moderne">
                                <i class="fas fa-calendar-alt"></i> Valable jusqu'au 31/12/2025
                            </div>
                        </div>
                        <div class="voucher-stamp">VALIDÉ</div>
                    </div>
                </div>
                <div class="float-elements">
                    <div class="float-icon icon-1"><i class="fas fa-graduation-cap"></i></div>
                    <div class="float-icon icon-2"><i class="fas fa-book"></i></div>
                    <div class="float-icon icon-3"><i class="fas fa-star"></i></div>
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
            <h2 class="section-title-big">Offrir un bon en <span style="color: var(--orange);">3 étapes simples</span></h2>
            <p class="section-subtitle">Un processus rapide, sécurisé et entièrement en ligne</p>
        </div>

        <div class="steps-grid">
            <div class="step-card-moderne animate-scroll">
                <div class="step-number-moderne">
                    <div class="step-icon-moderne"><i class="fas fa-mouse-pointer"></i></div>
                </div>
                <h3>1. Choisissez votre bon</h3>
                <p>Sélectionnez le montant qui correspond à votre budget et à vos envies parmi nos différentes offres.</p>
            </div>
            <div class="step-card-moderne animate-scroll">
                <div class="step-number-moderne">
                    <div class="step-icon-moderne"><i class="fas fa-credit-card"></i></div>
                </div>
                <h3>2. Payez en ligne</h3>
                <p>Effectuez votre paiement de manière sécurisée. Vous recevrez immédiatement une confirmation.</p>
            </div>
            <div class="step-card-moderne animate-scroll">
                <div class="step-number-moderne">
                    <div class="step-icon-moderne"><i class="fas fa-paper-plane"></i></div>
                </div>
                <h3>3. Offrez par email</h3>
                <p>Transférez le bon à la personne de votre choix. Elle pourra l'utiliser sur toutes nos formations.</p>
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
            <h2 class="section-title-big">Choisissez selon vos <span style="color: var(--orange);">besoins</span> et votre <span style="color: var(--orange);">budget</span></h2>
            <p class="section-subtitle">Des bons adaptés à tous les profils, du petit coup de pouce à la formation complète</p>
        </div>

        <div class="vouchers-grid-moderne" id="vouchers-container">
            @forelse($vouchers as $index => $voucher)
                <div class="voucher-card-item {{ $index === 1 ? 'featured' : '' }} animate-scroll" data-price="{{ $voucher->amount }}">
                    @if($index === 1)
                        <div class="voucher-badge-moderne">Populaire</div>
                    @endif

                    <div class="voucher-card-header">
                        <h4><i class="fas fa-gift" style="color: var(--orange); margin-right: 8px;"></i> {{ $voucher->title }}</h4>
                        <div class="voucher-price-tag">
                            {{ number_format($voucher->amount, 0, ',', ' ') }} <span>FCFA</span>
                        </div>
                    </div>

                    <div class="voucher-card-body">
                        <p>{{ $voucher->description }}</p>
                        <div class="voucher-features-list">
                            <div class="voucher-feature">
                                <i class="fas fa-check"></i>
                                <span>Accès formations en ligne</span>
                            </div>
                            <div class="voucher-feature">
                                <i class="fas fa-check"></i>
                                <span>Support pédagogique inclus</span>
                            </div>
                            <div class="voucher-feature">
                                <i class="fas fa-check"></i>
                                <span>Certificat de fin de formation</span>
                            </div>
                            <div class="voucher-feature">
                                <i class="fas fa-check"></i>
                                <span>Valable 12 mois</span>
                            </div>
                        </div>
                    </div>

                    <div class="voucher-card-footer">
                        <a href="{{ route('voucher-orders.create', $voucher->id) }}" class="btn-voucher-moderne">
                            <i class="fas fa-shopping-cart"></i> Acheter maintenant
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state animate-scroll">
                        <div class="empty-state-icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <h4>Aucun bon disponible pour le moment</h4>
                        <p>Revenez bientôt, de nouvelles offres arrivent prochainement !</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ============================================
     INFO / AVANTAGES
     ============================================ -->
<section class="info-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Avantages</div>
            <h2 class="section-title-big">Pourquoi offrir un <span style="color: var(--orange-light);">bon cadeau</span> ?</h2>
            <p class="section-subtitle">Un cadeau unique qui fait la différence</p>
        </div>

        <div class="info-grid">
            <div class="info-card animate-scroll">
                <div class="info-icon"><i class="fas fa-gift"></i></div>
                <h4>Comment offrir ?</h4>
                <p>Achetez votre bon, recevez-le par email et transférez-le à la personne de votre choix en quelques clics.</p>
            </div>
            <div class="info-card animate-scroll">
                <div class="info-icon"><i class="fas fa-clock"></i></div>
                <h4>Validité 12 mois</h4>
                <p>Tous nos bons sont valables 12 mois à partir de la date d'achat. Pas de pression, le temps de choisir.</p>
            </div>
            <div class="info-card animate-scroll">
                <div class="info-icon"><i class="fas fa-headset"></i></div>
                <h4>Support 7j/7</h4>
                <p>Notre équipe est disponible tous les jours pour vous accompagner dans l'utilisation de votre bon.</p>
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
            <div class="section-label-orange">Contact</div>
            <h2 class="section-title-big">Besoin d'aide pour <span style="color: var(--orange);">choisir</span> ?</h2>
            <p class="section-subtitle">Notre équipe est là pour vous conseiller et vous aider à trouver le bon cadeau parfait selon vos besoins et votre budget.</p>

            <div class="cta-buttons-final">
                <a href="tel:+2250153751544" class="btn-cta-final btn-orange">
                    <i class="fas fa-phone-alt"></i> Nous appeler
                </a>
                <a href="/contact" class="btn-cta-final btn-outline">
                    <i class="fas fa-envelope"></i> Nous contacter
                </a>
                <a href="/formations" class="btn-cta-final btn-outline">
                    <i class="fas fa-graduation-cap"></i> Voir les formations
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Back to Top -->
<a href="#" class="back-to-top-moderne" id="backToTop"><i class="fas fa-arrow-up"></i></a>

<!-- ============================================
     SCRIPTS
     ============================================ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Scroll Progress + Navbar + BackToTop
window.addEventListener('scroll', function() {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    document.getElementById('scrollProgress').style.width = (scrollTop / scrollHeight * 100) + '%';

    const backToTop = document.getElementById('backToTop');
    if (window.scrollY > 500) backToTop.classList.add('visible');
    else backToTop.classList.remove('visible');
});

// Spinner
window.addEventListener('load', function() {
    setTimeout(() => {
        const spinner = document.getElementById('spinner');
        if (spinner) spinner.classList.remove('show');
    }, 500);
});

// Scroll Animations (IntersectionObserver)
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

// Voucher card hover effects
document.querySelectorAll('.voucher-card-item').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.zIndex = '10';
    });
    card.addEventListener('mouseleave', function() {
        this.style.zIndex = '1';
    });
});
</script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
