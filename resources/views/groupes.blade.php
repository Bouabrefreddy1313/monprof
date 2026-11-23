<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Cours en ligne DCG & DSCG - Monprofchezmoi-ci.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="asset/img/favicon.png" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Owl Carousel -->
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
    box-shadow: var(--shadow-sm);
}
.navbar-moderne.scrolled {
    box-shadow: var(--shadow-md);
}
.navbar-brand-moderne {
    font-weight: 800;
    font-size: 1.3rem;
    color: var(--blue) !important;
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
}
.navbar-brand-moderne img {
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
    padding: 24px 14px;
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
    left: 14px;
    right: 14px;
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

/* Dropdown Moderne */
.dropdown-menu-moderne {
    border: none;
    border-radius: 16px;
    box-shadow: var(--shadow-xl);
    padding: 12px;
    animation: dropdownFade 0.3s ease;
    border: 1px solid var(--gray-100);
    margin-top: 8px;
}
.dropdown-item-moderne {
    padding: 10px 16px;
    border-radius: 10px;
    transition: all 0.2s ease;
    color: var(--gray-800);
    font-weight: 500;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 10px;
}
.dropdown-item-moderne:hover {
    background: rgba(255,107,53,0.08);
    color: var(--orange);
    transform: translateX(4px);
}
.dropdown-item-moderne i {
    color: var(--orange);
    font-size: 0.85rem;
}

/* Bouton CTA */
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

@keyframes dropdownFade {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Mobile */
@media (max-width: 991px) {
    .nav-menu-moderne { flex-direction: column; padding: 16px; }
    .nav-menu-moderne .nav-link-moderne { padding: 14px 16px; width: 100%; }
}

/* ============================================
   HERO CAROUSEL
   ============================================ */
.hero-carousel {
    position: relative;
    overflow: hidden;
}
.hero-carousel .carousel-item {
    min-height: 450px;
    position: relative;
}
.hero-carousel .carousel-item img {
    width: 100%;
    height: 450px;
    object-fit: cover;
    object-position: center top;
}
.carousel-overlay {
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: linear-gradient(135deg, rgba(10,22,40,0.85) 0%, rgba(10,22,40,0.6) 50%, rgba(255,107,53,0.15) 100%);
}
.carousel-caption-moderne {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    width: 100%;
    max-width: 900px;
    padding: 0 20px;
    z-index: 2;
}
.carousel-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,107,53,0.2);
    border: 1px solid rgba(255,107,53,0.4);
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
.carousel-title {
    font-size: clamp(2rem, 4vw, 3.5rem);
    font-weight: 800;
    color: white;
    line-height: 1.15;
    margin-bottom: 20px;
    animation: fadeInUp 0.8s ease 0.1s both;
}
.carousel-title .highlight {
    color: var(--orange);
    position: relative;
}
.carousel-title .highlight::after {
    content: '';
    position: absolute;
    bottom: -4px; left: 0;
    width: 100%; height: 4px;
    background: var(--orange);
    border-radius: 2px;
    opacity: 0.6;
}
.carousel-subtitle {
    font-size: 1.15rem;
    color: rgba(255,255,255,0.8);
    margin-bottom: 35px;
    animation: fadeInUp 0.8s ease 0.2s both;
}
.carousel-buttons {
    display: flex;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
    animation: fadeInUp 0.8s ease 0.3s both;
}
.btn-carousel {
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
}
.btn-carousel.btn-orange {
    background: var(--orange);
    color: white;
    box-shadow: 0 8px 24px rgba(255,107,53,0.3);
}
.btn-carousel.btn-orange:hover {
    background: var(--orange-dark);
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(255,107,53,0.4);
}
.btn-carousel.btn-outline {
    background: rgba(255,255,255,0.08);
    color: white;
    border: 1.5px solid rgba(255,255,255,0.2);
}
.btn-carousel.btn-outline:hover {
    background: rgba(255,255,255,0.15);
    border-color: rgba(255,255,255,0.4);
}

/* Carousel Controls */
.carousel-control-moderne {
    width: 50px; height: 50px;
    border-radius: 50%;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
    justify-content: center;
    top: 50%;
    transform: translateY(-50%);
    opacity: 0;
    transition: all 0.3s ease;
    border: 1px solid rgba(255,255,255,0.2);
}
.hero-carousel:hover .carousel-control-moderne {
    opacity: 1;
}
.carousel-control-moderne:hover {
    background: var(--orange);
    border-color: var(--orange);
}
.carousel-indicators-moderne {
    bottom: 30px;
}
.carousel-indicators-moderne button {
    width: 12px; height: 12px;
    border-radius: 50%;
    background: rgba(255,255,255,0.4);
    border: none;
    margin: 0 6px;
    transition: all 0.3s ease;
}
.carousel-indicators-moderne button.active {
    width: 30px;
    border-radius: 6px;
    background: var(--orange);
}

@media (max-width: 768px) {
    .hero-carousel .carousel-item { min-height: 400px; }
    .hero-carousel .carousel-item img { height: 100%; }
    .carousel-title { font-size: 1.8rem; }
    .carousel-buttons { flex-direction: column; }
    .btn-carousel { width: 100%; justify-content: center; }
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
   FACTS / STATS
   ============================================ */
.facts-section {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
    position: relative;
    overflow: hidden;
}
.facts-section::before {
    content: '';
    position: absolute;
    top: -50%; left: -10%;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(255,107,53,0.1), transparent 70%);
    animation: float-hero 10s ease-in-out infinite;
}
.facts-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}
.fact-card {
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 20px;
    padding: 35px 28px;
    display: flex;
    align-items: center;
    gap: 20px;
    transition: all 0.4s ease;
    animation: fadeInUp 0.8s ease both;
}
.fact-card:nth-child(1) { animation-delay: 0.1s; }
.fact-card:nth-child(2) { animation-delay: 0.3s; }
.fact-card:nth-child(3) { animation-delay: 0.5s; }
.fact-card:hover {
    background: rgba(255,255,255,0.12);
    transform: translateY(-8px);
    border-color: rgba(255,107,53,0.3);
}
.fact-icon {
    width: 60px; height: 60px;
    border-radius: 16px;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    box-shadow: var(--shadow-orange);
    flex-shrink: 0;
    transition: all 0.3s ease;
}
.fact-card:hover .fact-icon {
    transform: rotate(10deg) scale(1.1);
}
.fact-content h3 {
    font-size: 1.6rem;
    font-weight: 800;
    color: white;
    margin-bottom: 4px;
    line-height: 1.2;
}
.fact-content p {
    font-size: 0.9rem;
    color: rgba(255,255,255,0.7);
    margin: 0;
}

@media (max-width: 991px) {
    .facts-grid { grid-template-columns: 1fr; }
}

/* ============================================
   SERVICES / FEATURES
   ============================================ */
.services-section {
    background: var(--cream);
}
.services-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}
.service-card-moderne {
    background: var(--white);
    border-radius: 24px;
    padding: 40px 30px;
    text-align: center;
    border: 1px solid var(--gray-100);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
}
.service-card-moderne::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light));
    transform: scaleX(0);
    transition: transform 0.4s ease;
}
.service-card-moderne:hover::before {
    transform: scaleX(1);
}
.service-card-moderne:hover {
    transform: translateY(-12px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.service-icon-moderne {
    width: 80px; height: 80px;
    border-radius: 20px;
    background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    transition: all 0.4s ease;
}
.service-icon-moderne img {
    width: 36px; height: 36px;
    transition: all 0.3s ease;
}
.service-card-moderne:hover .service-icon-moderne {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    box-shadow: var(--shadow-orange);
    transform: scale(1.1) rotate(-5deg);
}
.service-card-moderne:hover .service-icon-moderne img {
    filter: brightness(0) invert(1);
    transform: scale(1.2);
}
.service-card-moderne h4 {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--blue);
    margin-bottom: 16px;
}
.service-card-moderne p {
    font-size: 0.95rem;
    color: var(--gray-600);
    line-height: 1.7;
    flex: 1;
    margin-bottom: 20px;
}
.service-btn {
    width: 50px; height: 50px;
    border-radius: 14px;
    background: var(--orange);
    color: white;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
    margin: 0 auto;
    opacity: 0;
    transform: translateY(20px);
}
.service-card-moderne:hover .service-btn {
    opacity: 1;
    transform: translateY(0);
}
.service-btn:hover {
    background: var(--orange-dark);
    transform: translateY(-3px) scale(1.05);
    color: white;
}

@media (max-width: 991px) {
    .services-grid { grid-template-columns: 1fr; }
}

/* ============================================
   REGISTRATION / CTA SECTION
   ============================================ */
.registration-section {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
    position: relative;
    overflow: hidden;
}
.registration-section::before {
    content: '';
    position: absolute;
    top: -20%; right: -10%;
    width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(255,107,53,0.1), transparent 70%);
    animation: float-hero 8s ease-in-out infinite;
}
.registration-section::after {
    content: '';
    position: absolute;
    bottom: -10%; left: -5%;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(59,130,246,0.08), transparent 70%);
    animation: float-hero 10s ease-in-out infinite reverse;
}
.registration-grid {
    display: grid;
    grid-template-columns: 1.2fr 0.8fr;
    gap: 60px;
    align-items: center;
    position: relative;
    z-index: 2;
}
.registration-label {
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
}
.registration-title {
    font-size: clamp(1.8rem, 3.5vw, 2.6rem);
    font-weight: 800;
    color: white;
    line-height: 1.2;
    margin-bottom: 20px;
}
.registration-title .highlight {
    color: var(--orange);
}
.registration-subtitle {
    font-size: 1.15rem;
    color: rgba(255,255,255,0.8);
    margin-bottom: 30px;
    line-height: 1.7;
}
.registration-features {
    display: flex;
    flex-direction: column;
    gap: 14px;
    margin-bottom: 30px;
}
.reg-feature {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    color: rgba(255,255,255,0.85);
    font-size: 1rem;
    line-height: 1.6;
}
.reg-feature i {
    width: 28px; height: 28px;
    border-radius: 8px;
    background: rgba(255,107,53,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--orange);
    font-size: 0.8rem;
    flex-shrink: 0;
    margin-top: 2px;
}
.registration-buttons {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
}
.btn-reg {
    padding: 16px 32px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
    border: none;
}
.btn-reg.btn-orange {
    background: var(--orange);
    color: white;
    box-shadow: 0 8px 24px rgba(255,107,53,0.3);
}
.btn-reg.btn-orange:hover {
    background: var(--orange-dark);
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(255,107,53,0.4);
}
.btn-reg.btn-outline {
    background: rgba(255,255,255,0.08);
    color: white;
    border: 1.5px solid rgba(255,255,255,0.2);
}
.btn-reg.btn-outline:hover {
    background: rgba(255,255,255,0.15);
    border-color: rgba(255,255,255,0.4);
}

@media (max-width: 991px) {
    .registration-grid { grid-template-columns: 1fr; }
    .registration-buttons { flex-direction: column; }
    .btn-reg { width: 100%; justify-content: center; }
}

/* ============================================
   TESTIMONIALS
   ============================================ */
.testimonials-section {
    background: var(--cream);
    position: relative;
    overflow: hidden;
}
.testimonials-section::before {
    content: '';
    position: absolute;
    top: -100px; right: -100px;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(255,107,53,0.05), transparent 70%);
}
.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}
.testimonial-card-moderne {
    background: var(--white);
    border-radius: 24px;
    padding: 40px 30px;
    text-align: center;
    border: 1px solid var(--gray-100);
    transition: all 0.4s ease;
    position: relative;
}
.testimonial-card-moderne:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.testimonial-quote {
    font-size: 2.5rem;
    color: var(--orange);
    opacity: 0.3;
    margin-bottom: 20px;
    transition: all 0.3s ease;
    display: inline-block;
}
.testimonial-card-moderne:hover .testimonial-quote {
    opacity: 0.6;
    transform: scale(1.1) rotate(-10deg);
}
.testimonial-text {
    font-size: 1.05rem;
    color: var(--gray-600);
    line-height: 1.8;
    font-style: italic;
    margin-bottom: 0;
}

@media (max-width: 991px) {
    .testimonials-grid { grid-template-columns: 1fr; }
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
   ANIMATIONS
   ============================================ */
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes float-hero {
    0%, 100% { transform: translate(0, 0); }
    50% { transform: translate(-30px, -20px); }
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
</style>

<body>
@include('partials.header')


<!-- Orientation Modal -->
<div class="modal fade" id="orientationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 24px; border: none; box-shadow: var(--shadow-xl);">
            <div class="modal-header" style="border-bottom: 2px solid var(--gray-100); padding: 24px 28px;">
                <h5 class="modal-title fw-bold" style="color: var(--blue);"><i class="fas fa-compass me-2" style="color: var(--orange);"></i> Orientation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding: 24px 28px;">
                <div class="list-group" style="border-radius: 16px; overflow: hidden;">
                    <a href="{{ url('/terminale') }}" class="list-group-item list-group-item-action" style="padding: 16px 20px; border: none; border-bottom: 1px solid var(--gray-100); transition: all 0.2s;">
                        <i class="fas fa-school me-2" style="color: var(--orange);"></i> Vous êtes lycéen : 2nd, 1ère, Terminale
                    </a>
                    <a href="{{ url('/superieur') }}" class="list-group-item list-group-item-action" style="padding: 16px 20px; border: none; transition: all 0.2s;">
                        <i class="fas fa-university me-2" style="color: var(--orange);"></i> Vous avez entamé des études supérieures
                    </a>
                </div>
            </div>
            <div class="modal-footer" style="border-top: 2px solid var(--gray-100); padding: 20px 28px;">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background: var(--gray-100); color: var(--gray-800); border-radius: 10px; font-weight: 600; padding: 10px 24px;">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- ============================================
     HERO CAROUSEL
     ============================================ -->
<section class="hero-carousel">
    <div id="headerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators carousel-indicators-moderne">
            <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="asset/img/SUP.jpg" alt="DCG DSCG">
                <div class="carousel-overlay"></div>
                <div class="carousel-caption-moderne">
                    <div class="carousel-label"><i class="fas fa-star"></i> Meilleurs cours en ligne</div>
                    <h1 class="carousel-title">Validez votre <span class="highlight">DCG</span> ou votre <span class="highlight">DSCG</span> en le préparant à distance</h1>
                    <p class="carousel-subtitle">Des cours en ligne complets, des fiches de révision et des examens blancs corrigés pour réussir haut la main.</p>
                    <div class="carousel-buttons">
                        <a href="{{ url('/dcg') }}" class="btn-carousel btn-orange"><i class="fas fa-book"></i> Je suis en DCG</a>
                        <a href="{{ url('/dscg') }}" class="btn-carousel btn-outline"><i class="fas fa-graduation-cap"></i> Je suis en DSCG</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img loading="lazy" decoding="async" src="asset/img/don2.jpeg" alt="DCG DSCG">
                <div class="carousel-overlay"></div>
                <div class="carousel-caption-moderne">
                    <div class="carousel-label"><i class="fas fa-trophy"></i> Taux de réussite élevé</div>
                    <h1 class="carousel-title">Validez votre DCG ou votre DSCG <span class="highlight">dès la prochaine session</span></h1>
                    <p class="carousel-subtitle">Une méthode éprouvée, des professeurs experts et un suivi personnalisé pour garantir votre réussite.</p>
                    <div class="carousel-buttons">
                        <a href="{{ url('/matieres') }}" class="btn-carousel btn-orange"><i class="fas fa-book"></i> Je suis en DCG</a>
                        <a href="{{ url('/dscg') }}" class="btn-carousel btn-outline"><i class="fas fa-graduation-cap"></i> Je suis en DSCG</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img loading="lazy" decoding="async" src="asset/img/don3.jpeg" alt="DCG DSCG">
                <div class="carousel-overlay"></div>
                <div class="carousel-caption-moderne">
                    <div class="carousel-label"><i class="fas fa-rocket"></i> Formation accélérée</div>
                    <h1 class="carousel-title">Préparez-vous à distance avec nos <span class="highlight">cours en ligne</span></h1>
                    <p class="carousel-subtitle">Accédez à vos cours partout, à tout moment. Une flexibilité totale pour concilier travail et études.</p>
                    <div class="carousel-buttons">
                        <a href="{{ url('/matieres') }}" class="btn-carousel btn-orange"><i class="fas fa-book"></i> Je suis en DCG</a>
                        <a href="{{ url('/dscg') }}" class="btn-carousel btn-outline"><i class="fas fa-graduation-cap"></i> Je suis en DSCG</a>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev carousel-control-moderne" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="carousel-control-next carousel-control-moderne" type="button" data-bs-target="#headerCarousel" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</section>

<!-- ============================================
     FACTS / STATS
     ============================================ -->
<section class="facts-section section-padding">
    <div class="container">
        <div class="facts-grid">
            <div class="fact-card animate-scroll">
                <div class="fact-icon"><i class="fas fa-users"></i></div>
                <div class="fact-content">
                    <h3>4.7 / 5</h3>
                    <p>Excellent 4.5 sur 5</p>
                </div>
            </div>
            <div class="fact-card animate-scroll">
                <div class="fact-icon"><i class="fas fa-chart-line"></i></div>
                <div class="fact-content">
                    <h3>+ 20 %</h3>
                    <p>sur vos notes par rapport à la moyenne nationale</p>
                </div>
            </div>
            <div class="fact-card animate-scroll">
                <div class="fact-icon"><i class="fas fa-award"></i></div>
                <div class="fact-content">
                    <h3>+5 000</h3>
                    <p>étudiants inscrits</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     SERVICES / FEATURES
     ============================================ -->
<section id="service" class="services-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Notre méthode</div>
            <h2 class="section-title-big">Qu'est-ce qui vous <span style="color: var(--orange);">attend</span> ?</h2>
            <p class="section-subtitle">Un parcours structuré de la première inscription jusqu'à l'obtention du diplôme</p>
        </div>

        <div class="services-grid">
            <div class="service-card-moderne animate-scroll">
                <div class="service-icon-moderne">
                    <img loading="lazy" decoding="async" src="asset/img/intello.png" alt="Structure">
                </div>
                <h4>On vous structure 🤓</h4>
                <p>Dès votre inscription, vous apprendrez à aborder chaque matière du diplôme de manière efficace et méthodique grâce à des cours spécifiques : Mental, Concentration, Organisation, Mémorisation, Attentes du Jury... Dès le premier jour, vous aurez un plan clair et une grande confiance en vous.</p>
                <a href="#" class="service-btn"><i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="service-card-moderne animate-scroll">
                <div class="service-icon-moderne">
                    <img loading="lazy" decoding="async" src="asset/img/fort.png" alt="Formation">
                </div>
                <h4>Nous vous formons pour devenir des champions, tout simplement. 🙌</h4>
                <p>Vous bénéficiez de cours en vidéo efficaces et faciles à comprendre, couvrant chaque aspect des programmes, avec des points essentiels à retenir, des cas pratiques corrigés disponibles en vidéo et en PDF téléchargeables, pour renforcer vos connaissances.</p>
                <a href="#" class="service-btn"><i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="service-card-moderne animate-scroll">
                <div class="service-icon-moderne">
                    <img loading="lazy" decoding="async" src="asset/img/fete.png" alt="Diplômé">
                </div>
                <h4>Vous êtes heureux diplômés 🥳</h4>
                <p>En suivant nos cours à la lettre, vous serez parfaitement préparé pour réussir vos examens avec brio et vous présenter le jour J avec assurance et détermination. Une fois votre diplôme en main, vous deviendrez l'un des candidats les plus recherchés par les recruteurs dans le domaine de l'expertise comptable.</p>
                <a href="#" class="service-btn"><i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     REGISTRATION / CTA
     ============================================ -->
<section class="registration-section section-padding">
    <div class="container">
        <div class="registration-grid">
            <div>
                <div class="registration-label"><i class="fas fa-star"></i> Une fois chez MONPROFCHEZMOI</div>
                <h2 class="registration-title">Vous avez accès à vos UE avec : <span class="highlight">📚 cours vidéo, fiches PDF, essentiels et examens blancs corrigés</span></h2>
                <p class="registration-subtitle">50% de nos étudiants sont en formation initiale ou des candidats libres. Ils s'inscrivent chez nous pour :</p>

                <div class="registration-features">
                    <div class="reg-feature">
                        <i class="fas fa-check"></i>
                        <span>Comprendre les cours qu'ils n'arrivent pas à saisir dans leur école (chapitres, programmes entiers ou seulement certains points)</span>
                    </div>
                    <div class="reg-feature">
                        <i class="fas fa-check"></i>
                        <span>Rattraper le retard accumulé</span>
                    </div>
                    <div class="reg-feature">
                        <i class="fas fa-check"></i>
                        <span>Reprendre confiance en eux</span>
                    </div>
                    <div class="reg-feature">
                        <i class="fas fa-check"></i>
                        <span>Avoir une méthode plus simple à suivre et une pédagogie qui sort du système scolaire</span>
                    </div>
                    <div class="reg-feature">
                        <i class="fas fa-check"></i>
                        <span>Bénéficier d'un tarif flexible et attractif</span>
                    </div>
                    <div class="reg-feature">
                        <i class="fas fa-check"></i>
                        <span>Toutes les mises à jour conformes au programme officiel</span>
                    </div>
                </div>

                <div class="registration-buttons">
                    <a href="{{ url('/matieres') }}" class="btn-reg btn-orange"><i class="fas fa-book"></i> DCG</a>
                    <a href="{{ url('/dscg') }}" class="btn-reg btn-outline"><i class="fas fa-graduation-cap"></i> DSCG</a>
                </div>
            </div>

            <!-- Espace visuel droite (optionnel, peut être remplacé par une image) -->
            <div class="d-none d-lg-block text-center">
                <div style="position: relative; display: inline-block;">
                    <div style="width: 280px; height: 280px; border-radius: 50%; background: linear-gradient(135deg, rgba(255,107,53,0.2), rgba(59,130,246,0.1)); display: flex; align-items: center; justify-content: center; animation: float-hero 6s ease-in-out infinite;">
                        <i class="fas fa-graduation-cap" style="font-size: 6rem; color: rgba(255,255,255,0.3);"></i>
                    </div>
                    <div style="position: absolute; bottom: -10px; right: -10px; width: 80px; height: 80px; border-radius: 50%; background: var(--orange); display: flex; align-items: center; justify-content: center; color: white; font-weight: 800; font-size: 1.2rem; box-shadow: var(--shadow-orange); animation: float-hero 4s ease-in-out infinite reverse;">
                        100%
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     TESTIMONIALS
     ============================================ -->
<section class="testimonials-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Témoignages</div>
            <h2 class="section-title-big">La vérité sort de la bouche de nos <span style="color: var(--orange);">élèves</span> ❤️</h2>
            <p class="section-subtitle">En gros, cela donne ça :</p>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card-moderne animate-scroll">
                <div class="testimonial-quote"><i class="fas fa-quote-left"></i></div>
                <p class="testimonial-text">"Des cours simples, clairs, compréhensibles et qui donnent envie d'apprendre."</p>
            </div>
            <div class="testimonial-card-moderne animate-scroll">
                <div class="testimonial-quote"><i class="fas fa-quote-left"></i></div>
                <p class="testimonial-text">"Le prix est à défier toute concurrence : rapport qualité prix imbattable sur le marché. Le DCG devient plus simple."</p>
            </div>
            <div class="testimonial-card-moderne animate-scroll">
                <div class="testimonial-quote"><i class="fas fa-quote-left"></i></div>
                <p class="testimonial-text">"J'ai pu décrocher des notes inespérées aux derniers examens"</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     FOOTER
     ============================================ -->
<footer class="footer-moderne">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand-moderne">
                <img loading="lazy" decoding="async" src="asset/img/logo.png" alt="Monprofchezmoi">
                <p>Chez MONPROFCHEZMOI CI, nous croyons que chaque personne possède un potentiel unique. Notre mission est de révéler ce potentiel grâce à un accompagnement personnalisé.</p>
                <div class="footer-social-moderne">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div>
                <h4 class="footer-col-title">Quick Links</h4>
                <div class="footer-links-moderne">
                    <a href="{{ url('/') }}">Accueil</a>
                    <a href="{{ url('/reponse') }}">Soutien</a>
                    <a href="{{ url('/formations') }}">Formation</a>
                    <a href="#">DCG & DSCG</a>
                    <a href="#">Extrascolaire</a>
                </div>
            </div>

            <div>
                <h4 class="footer-col-title">Liens Populaires</h4>
                <div class="footer-links-moderne">
                    <a href="#">Formation Anglais</a>
                    <a href="#">Musique</a>
                    <a href="#">DCG</a>
                    <a href="#">Danse</a>
                    <a href="#">Art</a>
                </div>
            </div>

            <div>
                <h4 class="footer-col-title">Contact</h4>
                <div class="footer-links-moderne">
                    <a href="#"><i class="fas fa-map-marker-alt"></i> Riviera 4 Synacassi 1, Abidjan</a>
                    <a href="tel:+2250153751544"><i class="fas fa-phone-alt"></i> +225 01 53 75 15 44</a>
                    <a href="mailto:info@monprofchezmoi-ci.com"><i class="fas fa-envelope"></i> info@monprofchezmoi-ci.com</a>
                </div>
            </div>
        </div>

        <div class="footer-bottom-moderne">
            <p>&copy; <a href="#">Monprofchezmoi-ci.com</a>. All Rights Reserved. Designed by <a href="#">FreeLance ADG</a></p>
        </div>
    </div>
</footer>

<!-- Back to Top -->
<a href="#" class="back-to-top-moderne" id="backToTop"><i class="fas fa-arrow-up"></i></a>

<!-- ============================================
     SCRIPTS
     ============================================ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Scroll Progress + BackToTop + Navbar
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

// Spinner
window.addEventListener('load', function() {
    setTimeout(() => {
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

// Back to top click
document.getElementById('backToTop').addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
});
</script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>


