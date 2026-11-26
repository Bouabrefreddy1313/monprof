<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail du bon</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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
    --shadow-green: 0 8px 32px rgba(16,185,129,0.25);
}

* { margin: 0; padding: 0; box-sizing: border-box; }

html { scroll-behavior: smooth; }

body {
    font-family: 'Nunito', sans-serif;
    color: var(--gray-800);
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 50%, #1a365d 100%);
    min-height: 100vh;
    position: relative;
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
   BACKGROUND PARTICLES
   ============================================ */
.bg-particles {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    pointer-events: none;
    z-index: 1;
    overflow: hidden;
}
.particle {
    position: absolute;
    border-radius: 50%;
    background: rgba(255,107,53,0.08);
    animation: particle-float 15s ease-in-out infinite;
}
.particle:nth-child(1) { width: 80px; height: 80px; top: 10%; left: 10%; animation-delay: 0s; }
.particle:nth-child(2) { width: 60px; height: 60px; top: 70%; right: 15%; animation-delay: -3s; background: rgba(59,130,246,0.08); }
.particle:nth-child(3) { width: 100px; height: 100px; bottom: 20%; left: 20%; animation-delay: -6s; }
.particle:nth-child(4) { width: 50px; height: 50px; top: 40%; right: 25%; animation-delay: -9s; background: rgba(255,107,53,0.06); }
.particle:nth-child(5) { width: 70px; height: 70px; top: 20%; right: 40%; animation-delay: -12s; background: rgba(59,130,246,0.06); }
.particle:nth-child(6) { width: 40px; height: 40px; bottom: 40%; left: 50%; animation-delay: -5s; }

@keyframes particle-float {
    0%, 100% { transform: translate(0, 0) scale(1); }
    25% { transform: translate(30px, -40px) scale(1.1); }
    50% { transform: translate(-20px, -60px) scale(0.9); }
    75% { transform: translate(40px, -20px) scale(1.05); }
}

/* Floating icons */
.float-icon-bg {
    position: absolute;
    color: rgba(255,255,255,0.04);
    animation: float-icon-bg 10s ease-in-out infinite;
    z-index: 1;
}
.float-icon-bg:nth-child(1) { top: 15%; left: 8%; font-size: 4rem; animation-delay: 0s; }
.float-icon-bg:nth-child(2) { top: 65%; right: 12%; font-size: 3rem; animation-delay: -3s; }
.float-icon-bg:nth-child(3) { bottom: 25%; left: 15%; font-size: 2.5rem; animation-delay: -6s; }
.float-icon-bg:nth-child(4) { top: 45%; right: 20%; font-size: 3.5rem; animation-delay: -2s; }

@keyframes float-icon-bg {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-30px) rotate(180deg); }
}

/* ============================================
   CONTAINER
   ============================================ */
.container {
    max-width: 900px;
    margin: 0 auto;
    padding: 40px 20px;
    position: relative;
    z-index: 2;
}

/* ============================================
   PAGE HEADER
   ============================================ */
.page-header {
    text-align: center;
    margin-bottom: 50px;
    animation: fadeInDown 0.8s ease-out;
}
.page-label {
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
.page-title {
    color: white;
    font-size: clamp(2rem, 5vw, 3.2rem);
    font-weight: 800;
    margin-bottom: 15px;
    line-height: 1.2;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    flex-wrap: wrap;
}
.page-title i {
    color: var(--orange);
    animation: gift-bounce 2s ease-in-out infinite;
}
@keyframes gift-bounce {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    25% { transform: translateY(-8px) rotate(-5deg); }
    75% { transform: translateY(-4px) rotate(5deg); }
}
.page-subtitle {
    color: rgba(255,255,255,0.7);
    font-size: 1.15rem;
    font-weight: 400;
    max-width: 500px;
    margin: 0 auto;
    line-height: 1.7;
}

/* ============================================
   SUCCESS ALERT
   ============================================ */
.success-alert {
    background: linear-gradient(135deg, #10B981, #059669);
    color: white;
    padding: 20px 28px;
    border-radius: 16px;
    margin-bottom: 40px;
    border: none;
    box-shadow: var(--shadow-green);
    animation: slideInRight 0.6s ease-out, alert-pulse 2s ease-in-out infinite;
    display: flex;
    align-items: center;
    gap: 15px;
    font-weight: 600;
    backdrop-filter: blur(10px);
    position: relative;
    overflow: hidden;
}
.success-alert::before {
    content: '';
    position: absolute;
    top: 0; left: -100%;
    width: 100%; height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    animation: alert-shimmer 2s infinite;
}
@keyframes alert-shimmer {
    0% { left: -100%; }
    100% { left: 100%; }
}
@keyframes alert-pulse {
    0%, 100% { box-shadow: 0 8px 25px rgba(16,185,129,0.3); }
    50% { box-shadow: 0 8px 35px rgba(16,185,129,0.5); }
}
.success-alert i {
    font-size: 1.5rem;
    animation: check-bounce 2s infinite;
    position: relative;
    z-index: 2;
}
@keyframes check-bounce {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.2); }
}

/* ============================================
   VOUCHER CARD
   ============================================ */
.voucher-card-moderne {
    background: rgba(255, 255, 255, 0.97);
    backdrop-filter: blur(20px);
    border-radius: 28px;
    box-shadow: var(--shadow-xl);
    overflow: hidden;
    animation: fadeInUp 0.8s ease-out 0.2s both;
    border: 1px solid rgba(255,255,255,0.2);
    position: relative;
}
.voucher-card-moderne::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 5px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light), var(--blue-accent), var(--orange));
    background-size: 300% 100%;
    animation: gradientShift 4s ease-in-out infinite;
}

/* Card Header */
.card-header-moderne {
    background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 100%);
    color: white;
    padding: 50px 40px;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.card-header-moderne::before {
    content: '';
    position: absolute;
    top: -50%; left: -50%;
    width: 200%; height: 200%;
    background: radial-gradient(circle, rgba(255,107,53,0.1), transparent 60%);
    animation: header-glow 8s ease-in-out infinite;
}
@keyframes header-glow {
    0%, 100% { transform: translate(0, 0); }
    50% { transform: translate(-30px, -20px); }
}
.card-header-moderne::after {
    content: '';
    position: absolute;
    top: 0; left: -100%;
    width: 100%; height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.08), transparent);
    animation: shimmer 3s infinite;
}
.voucher-icon-wrap {
    width: 90px; height: 90px;
    border-radius: 24px;
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    font-size: 2.5rem;
    color: white;
    box-shadow: var(--shadow-orange);
    position: relative;
    z-index: 2;
    animation: icon-float 3s ease-in-out infinite;
}
@keyframes icon-float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-10px) rotate(5deg); }
}
.voucher-title {
    font-size: clamp(1.6rem, 4vw, 2.5rem);
    font-weight: 800;
    margin-bottom: 10px;
    position: relative;
    z-index: 2;
    text-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

/* Card Body */
.card-body-moderne {
    padding: 50px 40px;
}
.voucher-description {
    font-size: 1.15rem;
    line-height: 1.8;
    color: var(--gray-600);
    margin-bottom: 40px;
    text-align: center;
    font-weight: 500;
    animation: fadeInUp 0.8s ease-out 0.4s both;
}

/* Voucher Details */
.voucher-details-moderne {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
    margin-bottom: 50px;
}
.detail-item-moderne {
    background: linear-gradient(135deg, var(--cream) 0%, var(--white) 100%);
    padding: 32px 28px;
    border-radius: 20px;
    text-align: center;
    box-shadow: var(--shadow-sm);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    animation: slideInUp 0.8s ease-out both;
    position: relative;
    overflow: hidden;
    border: 1px solid var(--gray-100);
}
.detail-item-moderne:nth-child(1) { animation-delay: 0.3s; }
.detail-item-moderne:nth-child(2) { animation-delay: 0.5s; }
.detail-item-moderne::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light));
    transform: scaleX(0);
    transition: transform 0.4s ease;
}
.detail-item-moderne:hover::before {
    transform: scaleX(1);
}
.detail-item-moderne:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: var(--shadow-lg);
    border-color: transparent;
}
.detail-icon-moderne {
    width: 60px; height: 60px;
    border-radius: 16px;
    background: linear-gradient(135deg, rgba(255,107,53,0.1), rgba(255,107,53,0.05));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    font-size: 1.6rem;
    color: var(--orange);
    transition: all 0.3s ease;
}
.detail-item-moderne:hover .detail-icon-moderne {
    background: linear-gradient(135deg, var(--orange), var(--orange-light));
    color: white;
    transform: rotate(10deg) scale(1.1);
    box-shadow: var(--shadow-orange);
}
.detail-label-moderne {
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--gray-400);
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 10px;
}
.detail-value-moderne {
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--blue);
}
.amount-value {
    color: var(--orange);
    font-size: 2.2rem;
}

/* Status Badge */
.status-badge-moderne {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    animation: status-pulse 2s ease-in-out infinite;
}
@keyframes status-pulse {
    0%, 100% { transform: scale(1); box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
    50% { transform: scale(1.05); box-shadow: 0 6px 20px rgba(0,0,0,0.15); }
}
.status-active {
    background: linear-gradient(135deg, #10B981, #059669);
    color: white;
    box-shadow: 0 4px 15px rgba(16,185,129,0.3);
}
.status-inactive {
    background: linear-gradient(135deg, #EF4444, #DC2626);
    color: white;
    box-shadow: 0 4px 15px rgba(239,68,68,0.3);
}
.status-pending {
    background: linear-gradient(135deg, #F59E0B, #D97706);
    color: white;
    box-shadow: 0 4px 15px rgba(245,158,11,0.3);
}

/* ============================================
   PURCHASE SECTION
   ============================================ */
.purchase-section-moderne {
    text-align: center;
    animation: slideInUp 0.8s ease-out 0.6s both;
}
.purchase-btn-moderne {
    background: linear-gradient(135deg, var(--orange), var(--orange-dark));
    color: white;
    border: none;
    padding: 20px 50px;
    border-radius: 16px;
    font-size: 1.1rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: var(--shadow-orange);
    position: relative;
    overflow: hidden;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 12px;
    font-family: 'Nunito', sans-serif;
}
.purchase-btn-moderne::before {
    content: '';
    position: absolute;
    top: 0; left: -100%;
    width: 100%; height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.25), transparent);
    transition: left 0.6s ease;
}
.purchase-btn-moderne:hover::before {
    left: 100%;
}
.purchase-btn-moderne:hover {
    transform: translateY(-4px) scale(1.03);
    box-shadow: 0 16px 40px rgba(255,107,53,0.45);
}
.purchase-btn-moderne:active {
    transform: translateY(-1px) scale(1.01);
}
.purchase-btn-moderne i {
    font-size: 1.3rem;
    animation: cart-bounce 2s infinite;
}
@keyframes cart-bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-4px); }
}

.purchase-security {
    margin-top: 20px;
    color: var(--gray-400);
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
.purchase-security i {
    color: var(--orange);
}

/* Unavailable message */
.unavailable-message {
    background: linear-gradient(135deg, var(--gray-50), var(--cream));
    border: 2px dashed var(--gray-200);
    border-radius: 20px;
    padding: 40px;
    text-align: center;
    animation: slideInUp 0.8s ease-out 0.6s both;
}
.unavailable-message i {
    font-size: 3rem;
    color: var(--gray-400);
    margin-bottom: 16px;
    display: block;
}
.unavailable-message p {
    color: var(--gray-600);
    font-weight: 600;
    font-size: 1.1rem;
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
   ANIMATIONS GLOBALES
   ============================================ */
@keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes slideInRight {
    from { opacity: 0; transform: translateX(30px); }
    to { opacity: 1; transform: translateX(0); }
}
@keyframes slideInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}
@keyframes gradientShift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

/* ============================================
   RESPONSIVE
   ============================================ */
@media (max-width: 768px) {
    .container { padding: 20px 15px; }
    .page-title { font-size: 2rem; }
    .card-header-moderne { padding: 35px 25px; }
    .card-body-moderne { padding: 35px 25px; }
    .voucher-details-moderne { grid-template-columns: 1fr; gap: 16px; }
    .detail-item-moderne { padding: 24px 20px; }
    .detail-value-moderne { font-size: 1.5rem; }
    .amount-value { font-size: 1.8rem; }
    .purchase-btn-moderne { padding: 16px 35px; font-size: 1rem; width: 100%; justify-content: center; }
    .success-alert { padding: 16px 20px; font-size: 0.9rem; }
}

@media (max-width: 480px) {
    .page-title { font-size: 1.6rem; gap: 10px; }
    .voucher-icon-wrap { width: 70px; height: 70px; font-size: 2rem; }
    .voucher-title { font-size: 1.4rem; }
    .voucher-description { font-size: 1rem; }
    .detail-value-moderne { font-size: 1.3rem; }
    .amount-value { font-size: 1.6rem; }
}
</style>
<body>

<!-- Scroll Progress -->
<div class="scroll-progress" id="scrollProgress"></div>

<!-- Background Particles -->
<div class="bg-particles">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="float-icon-bg"><i class="fas fa-gift"></i></div>
    <div class="float-icon-bg"><i class="fas fa-ticket-alt"></i></div>
    <div class="float-icon-bg"><i class="fas fa-star"></i></div>
    <div class="float-icon-bg"><i class="fas fa-coins"></i></div>
</div>

<div class="container">

    <!-- Page Header -->
    <div class="page-header">
        <div class="page-label"><i class="fas fa-ticket-alt"></i> Bon Cadeau Formation</div>
        <h1 class="page-title">
            <i class="fas fa-gift"></i>
            Détail du Bon
        </h1>
        <p class="page-subtitle">Découvrez tous les détails de ce bon exceptionnel et offrez l'avenir</p>
    </div>

    @if(session('success'))
        <div class="success-alert" id="successAlert">
            <i class="fas fa-check-circle"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    <!-- Voucher Card -->
    <div class="voucher-card-moderne">
        <div class="card-header-moderne">
            <div class="voucher-icon-wrap">
                <i class="fas fa-gift"></i>
            </div>
            <h1 class="voucher-title">{{ $voucher->title }}</h1>
        </div>

        <div class="card-body-moderne">
            <p class="voucher-description">{{ $voucher->description }}</p>

            <div class="voucher-details-moderne">
                <div class="detail-item-moderne">
                    <div class="detail-icon-moderne">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="detail-label-moderne">Montant</div>
                    <div class="detail-value-moderne amount-value">{{ number_format($voucher->amount) }} FCFA</div>
                </div>

                <div class="detail-item-moderne">
                    <div class="detail-icon-moderne">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="detail-label-moderne">Statut</div>
                    <div class="detail-value-moderne">
                        @if($voucher->status === 'active')
                            <span class="status-badge-moderne status-active">
                                <i class="fas fa-check-circle"></i>
                                {{ $voucher->status }}
                            </span>
                        @elseif($voucher->status === 'inactive')
                            <span class="status-badge-moderne status-inactive">
                                <i class="fas fa-times-circle"></i>
                                {{ $voucher->status }}
                            </span>
                        @else
                            <span class="status-badge-moderne status-pending">
                                <i class="fas fa-clock"></i>
                                {{ $voucher->status }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            @if($voucher->status === 'active')
                <div class="purchase-section-moderne">
                    <form action="{{ route('particuliers.bons.purchase', $voucher) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="purchase-btn-moderne">
                            <i class="fas fa-shopping-cart"></i>
                            Acheter ce bon
                        </button>
                    </form>
                    <div class="purchase-security">
                        <i class="fas fa-lock"></i>
                        <span>Paiement sécurisé via GeniusPay</span>
                    </div>
                </div>
            @else
                <div class="unavailable-message">
                    <i class="fas fa-ban"></i>
                    <p>Ce bon n'est pas disponible à l'achat pour le moment.</p>
                </div>
            @endif

        </div>
    </div>

</div>

<!-- Back to Top -->
<a href="#" class="back-to-top-moderne" id="backToTop"><i class="fas fa-arrow-up"></i></a>

<!-- ============================================
     SCRIPTS
     ============================================ -->
<script>
// Scroll Progress + BackToTop
window.addEventListener('scroll', function() {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    document.getElementById('scrollProgress').style.width = (scrollTop / scrollHeight * 100) + '%';

    const backToTop = document.getElementById('backToTop');
    if (window.scrollY > 300) backToTop.classList.add('visible');
    else backToTop.classList.remove('visible');
});

// Success Alert auto-dismiss
const successAlert = document.getElementById('successAlert');
if (successAlert) {
    setTimeout(() => {
        successAlert.style.transition = 'all 0.6s ease';
        successAlert.style.opacity = '0';
        successAlert.style.transform = 'translateX(100%)';
        setTimeout(() => successAlert.remove(), 600);
    }, 6000);
}

// Smooth scroll for back-to-top
document.getElementById('backToTop').addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// Parallax effect on particles
window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const particles = document.querySelectorAll('.particle');
    particles.forEach((particle, index) => {
        const speed = (index + 1) * 0.3;
        particle.style.transform = `translateY(${scrolled * speed}px)`;
    });
});

// Detail items hover enhancement
document.querySelectorAll('.detail-item-moderne').forEach(item => {
    item.addEventListener('mouseenter', function() {
        this.style.zIndex = '10';
    });
    item.addEventListener('mouseleave', function() {
        this.style.zIndex = '1';
    });
});

// Purchase button ripple effect
document.querySelector('.purchase-btn-moderne')?.addEventListener('click', function(e) {
    const btn = this;
    const rect = btn.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    const ripple = document.createElement('span');
    ripple.style.cssText = `
        position: absolute;
        background: rgba(255,255,255,0.4);
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 0.6s linear;
        pointer-events: none;
        width: 100px;
        height: 100px;
        left: ${x - 50}px;
        top: ${y - 50}px;
    `;

    btn.appendChild(ripple);
    setTimeout(() => ripple.remove(), 600);
});

// Add ripple keyframe
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to { transform: scale(4); opacity: 0; }
    }
`;
document.head.appendChild(style);
</script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
