<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon Panier - Formations Vidéo</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/asset/img/favicon.png" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    /* ============================================
       MONPROFCHEZMOI - PANIER DESIGN SYSTEM
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
        --success: #10B981;
        --success-light: #D1FAE5;
        --danger: #EF4444;
        --danger-light: #FEE2E2;
        --warning: #F59E0B;
        --warning-light: #FEF3C7;
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
        background: linear-gradient(135deg, var(--cream) 0%, #eef2f7 100%);
        overflow-x: hidden;
        line-height: 1.6;
        min-height: 100vh;
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
       NAVBAR
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
    .btn-back-moderne {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
        color: var(--gray-600);
        border: 1.5px solid var(--gray-200);
        background: transparent;
        transition: all 0.3s ease;
    }
    .btn-back-moderne:hover {
        background: var(--orange);
        color: white;
        border-color: var(--orange);
        transform: translateY(-2px);
        box-shadow: var(--shadow-orange);
    }

    /* ============================================
       HERO PANIER
       ============================================ */
    .hero-panier {
        background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 50%, #1a365d 100%);
        position: relative;
        overflow: hidden;
        padding: 60px 0 80px;
    }
    .hero-panier::before {
        content: '';
        position: absolute;
        top: -20%; right: -10%;
        width: 500px; height: 500px;
        background: radial-gradient(circle, rgba(255,107,53,0.12), transparent 70%);
        border-radius: 50%;
        animation: float-hero 8s ease-in-out infinite;
    }
    .hero-panier::after {
        content: '';
        position: absolute;
        bottom: -10%; left: -5%;
        width: 350px; height: 350px;
        background: radial-gradient(circle, rgba(59,130,246,0.08), transparent 70%);
        border-radius: 50%;
        animation: float-hero 10s ease-in-out infinite reverse;
    }
    @keyframes float-hero {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(-30px, -20px); }
    }
    .hero-panier-content {
        position: relative;
        z-index: 2;
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
    .hero-title {
        font-size: clamp(2rem, 4.5vw, 3rem);
        font-weight: 800;
        color: white;
        line-height: 1.15;
        margin-bottom: 12px;
        animation: fadeInUp 0.8s ease 0.1s both;
    }
    .hero-title .highlight {
        color: var(--orange);
        position: relative;
    }
    .hero-subtitle {
        font-size: 1.1rem;
        color: rgba(255,255,255,0.7);
        max-width: 500px;
        margin: 0 auto;
        animation: fadeInUp 0.8s ease 0.2s both;
    }
    .cart-icon-float {
        position: absolute;
        top: 50%; right: 15%;
        transform: translateY(-50%);
        font-size: 8rem;
        color: rgba(255,255,255,0.03);
        animation: cart-float 6s ease-in-out infinite;
    }
    @keyframes cart-float {
        0%, 100% { transform: translateY(-50%) rotate(0deg); }
        50% { transform: translateY(-60%) rotate(5deg); }
    }

    /* ============================================
       ALERTS MODERNES
       ============================================ */
    .alert-moderne {
        border: none;
        border-radius: 16px;
        padding: 20px 24px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 14px;
        animation: slideInRight 0.5s ease;
        position: relative;
        overflow: hidden;
    }
    .alert-moderne::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 4px; height: 100%;
    }
    .alert-moderne.alert-success {
        background: var(--success-light);
        color: #065F46;
    }
    .alert-moderne.alert-success::before {
        background: var(--success);
    }
    .alert-moderne.alert-danger {
        background: var(--danger-light);
        color: #991B1B;
    }
    .alert-moderne.alert-danger::before {
        background: var(--danger);
    }
    .alert-moderne i {
        font-size: 1.3rem;
        flex-shrink: 0;
    }
    .alert-moderne .btn-close {
        position: absolute;
        top: 16px; right: 16px;
        opacity: 0.5;
        transition: all 0.2s ease;
    }
    .alert-moderne .btn-close:hover {
        opacity: 1;
        transform: rotate(90deg);
    }

    /* ============================================
       SECTION HEADER
       ============================================ */
    .section-header-panier {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 28px;
        flex-wrap: wrap;
        gap: 12px;
    }
    .section-title-panier {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--blue);
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .section-title-panier i {
        color: var(--orange);
        font-size: 1.3rem;
    }
    .badge-count {
        background: linear-gradient(135deg, var(--orange), var(--orange-light));
        color: white;
        padding: 6px 18px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 700;
        box-shadow: var(--shadow-orange);
    }

    /* ============================================
       CART ITEMS
       ============================================ */
    .cart-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .cart-item-moderne {
        background: var(--white);
        border-radius: 20px;
        padding: 24px;
        border: 1px solid var(--gray-100);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        gap: 20px;
        animation: fadeInUp 0.6s ease both;
    }
    .cart-item-moderne:nth-child(1) { animation-delay: 0.1s; }
    .cart-item-moderne:nth-child(2) { animation-delay: 0.2s; }
    .cart-item-moderne:nth-child(3) { animation-delay: 0.3s; }
    .cart-item-moderne::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 4px; height: 100%;
        background: linear-gradient(180deg, var(--orange), var(--orange-light));
        transform: scaleY(0);
        transition: transform 0.4s ease;
    }
    .cart-item-moderne:hover::before {
        transform: scaleY(1);
    }
    .cart-item-moderne:hover {
        transform: translateX(8px);
        box-shadow: var(--shadow-lg);
        border-color: transparent;
    }
    .cart-thumb {
        width: 120px; height: 80px;
        border-radius: 12px;
        background-size: cover;
        background-position: center;
        flex-shrink: 0;
        position: relative;
        overflow: hidden;
    }
    .cart-thumb::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(135deg, rgba(10,22,40,0.3), transparent);
    }
    .cart-thumb-placeholder {
        width: 120px; height: 80px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--gray-100), var(--cream));
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border: 2px dashed var(--gray-200);
    }
    .cart-thumb-placeholder i {
        font-size: 1.8rem;
        color: var(--gray-400);
    }
    .cart-info {
        flex: 1;
        min-width: 0;
    }
    .cart-info h6 {
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--blue);
        margin-bottom: 6px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .cart-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }
    .cart-meta span {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.85rem;
        color: var(--gray-600);
    }
    .cart-meta span i {
        color: var(--orange);
        font-size: 0.8rem;
    }
    .cart-price {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--orange);
        white-space: nowrap;
    }
    .btn-remove {
        width: 44px; height: 44px;
        border-radius: 12px;
        background: var(--danger-light);
        color: var(--danger);
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }
    .btn-remove:hover {
        background: var(--danger);
        color: white;
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 4px 16px rgba(239,68,68,0.3);
    }

    /* ============================================
       SUMMARY CARD
       ============================================ */
    .summary-card-moderne {
        background: var(--white);
        border-radius: 24px;
        padding: 32px;
        border: 1px solid var(--gray-100);
        box-shadow: var(--shadow-md);
        position: sticky;
        top: 100px;
        animation: fadeInUp 0.8s ease 0.3s both;
    }
    .summary-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 24px;
        padding-bottom: 20px;
        border-bottom: 2px solid var(--gray-100);
    }
    .summary-header i {
        width: 48px; height: 48px;
        border-radius: 14px;
        background: linear-gradient(135deg, var(--orange), var(--orange-light));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        box-shadow: var(--shadow-orange);
    }
    .summary-header h4 {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--blue);
        margin: 0;
    }
    .summary-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid var(--gray-50);
    }
    .summary-item:last-of-type {
        border-bottom: none;
    }
    .summary-item-name {
        font-size: 0.9rem;
        color: var(--gray-600);
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .summary-item-price {
        font-weight: 700;
        color: var(--gray-800);
        font-size: 0.9rem;
    }
    .summary-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 0;
        margin: 20px 0;
        border-top: 2px solid var(--gray-100);
        border-bottom: 2px solid var(--gray-100);
    }
    .summary-total-label {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--blue);
    }
    .summary-total-value {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--orange);
    }
    .btn-checkout {
        width: 100%;
        padding: 18px 24px;
        border-radius: 14px;
        font-weight: 700;
        font-size: 1rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: none;
        background: linear-gradient(135deg, var(--orange), var(--orange-dark));
        color: white;
        box-shadow: var(--shadow-orange);
        font-family: 'Nunito', sans-serif;
        position: relative;
        overflow: hidden;
    }
    .btn-checkout::before {
        content: '';
        position: absolute;
        top: 0; left: -100%;
        width: 100%; height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.6s ease;
    }
    .btn-checkout:hover::before {
        left: 100%;
    }
    .btn-checkout:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 40px rgba(255,107,53,0.45);
    }
    .btn-checkout i {
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }
    .btn-checkout:hover i {
        transform: translateX(4px);
    }
    .security-note {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-top: 16px;
        color: var(--gray-400);
        font-size: 0.85rem;
    }
    .security-note i {
        color: var(--success);
    }

    /* ============================================
       EMPTY STATE
       ============================================ */
    .empty-state-panier {
        text-align: center;
        padding: 80px 20px;
        background: var(--white);
        border-radius: 24px;
        border: 2px dashed var(--gray-200);
        animation: fadeInUp 0.8s ease;
    }
    .empty-icon-panier {
        width: 120px; height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--cream), var(--gray-50));
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        font-size: 3rem;
        color: var(--gray-300);
        border: 3px dashed var(--gray-200);
        animation: empty-float 3s ease-in-out infinite;
    }
    @keyframes empty-float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-12px); }
    }
    .empty-state-panier h3 {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--blue);
        margin-bottom: 8px;
    }
    .empty-state-panier p {
        color: var(--gray-600);
        margin-bottom: 28px;
        font-size: 1.05rem;
    }
    .empty-actions {
        display: flex;
        justify-content: center;
        gap: 16px;
        flex-wrap: wrap;
    }
    .btn-empty-primary {
        padding: 14px 28px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.95rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, var(--orange), var(--orange-dark));
        color: white;
        box-shadow: var(--shadow-orange);
        transition: all 0.3s ease;
    }
    .btn-empty-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(255,107,53,0.4);
        color: white;
    }
    .btn-empty-outline {
        padding: 14px 28px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.95rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        color: var(--blue);
        border: 2px solid var(--gray-200);
        transition: all 0.3s ease;
    }
    .btn-empty-outline:hover {
        background: var(--blue);
        color: white;
        border-color: var(--blue);
        transform: translateY(-2px);
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
    @keyframes slideInRight {
        from { opacity: 0; transform: translateX(30px); }
        to { opacity: 1; transform: translateX(0); }
    }

    /* Responsive */
    @media (max-width: 991px) {
        .cart-item-moderne { flex-direction: column; align-items: flex-start; gap: 16px; }
        .cart-price { align-self: flex-end; }
        .summary-card-moderne { position: static; margin-top: 32px; }
    }
    @media (max-width: 767px) {
        .hero-panier { padding: 40px 0 60px; }
        .section-header-panier { flex-direction: column; align-items: flex-start; }
        .empty-actions { flex-direction: column; }
        .btn-empty-primary, .btn-empty-outline { width: 100%; justify-content: center; }
    }
    </style>
</head>
<body>

@include('partials.header')

<!-- Scroll Progress -->
<div class="scroll-progress" id="scrollProgress"></div>



<!-- ============================================
     NAVBAR
     ============================================ -->
<!-- ============================================
     HERO
     ============================================ -->
<section class="hero-panier">
    <div class="container">
        <div class="hero-panier-content">
            <div class="hero-label"><i class="fas fa-shopping-cart"></i> Votre Panier</div>
            <h1 class="hero-title">Finalisez votre <span class="highlight">commande</span></h1>
            <p class="hero-subtitle">Vos formations sélectionnées vous attendent. Procédez au paiement sécurisé pour y accéder immédiatement.</p>
        </div>
    </div>
    <i class="fas fa-shopping-cart cart-icon-float d-none d-lg-block"></i>
</section>

<!-- ============================================
     CONTENT
     ============================================ -->
<div class="container" style="margin-top: -40px; position: relative; z-index: 3; padding-bottom: 80px;">
    <div class="row">
        <div class="col-lg-8">

            <!-- Alerts -->
            @if(session('success'))
                <div class="alert-moderne alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert-moderne alert-danger alert-dismissible fade show">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>{{ session('error') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="section-header-panier">
                <h2 class="section-title-panier">
                    <i class="fas fa-shopping-basket"></i>
                    Articles sélectionnés
                </h2>
                @if($items->count() > 0)
                    <span class="badge-count">{{ $items->count() }} article(s)</span>
                @endif
            </div>

            @if($items->count() > 0)
                <div class="cart-list">
                    @foreach($items as $item)
                        <div class="cart-item-moderne">
                            @if($item->video->thumbnail)
                                <div class="cart-thumb" style="background-image: url('{{ asset('storage/' . $item->video->thumbnail) }}');"></div>
                            @else
                                <div class="cart-thumb-placeholder">
                                    <i class="fas fa-video"></i>
                                </div>
                            @endif
                            <div class="cart-info">
                                <h6>{{ $item->video->titre }}</h6>
                                <div class="cart-meta">
                                    <span><i class="fas fa-clock"></i> {{ $item->video->duree ?? '45:00' }}</span>
                                    <span><i class="fas fa-tag"></i> {{ ucfirst($item->video->formation_type) }}</span>
                                </div>
                            </div>
                            <div class="cart-price">
                                {{ number_format($item->video->prix) }} FCFA
                            </div>
                            <a href="{{ route('particuliers.panier.remove', $item->video_id) }}"
                               class="btn-remove"
                               onclick="return confirm('Retirer cette vidéo du panier ?')"
                               title="Retirer du panier">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state-panier">
                    <div class="empty-icon-panier">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>Votre panier est vide</h3>
                    <p>Ajoutez des vidéos depuis nos formations DCG ou DSCG pour commencer</p>
                    <div class="empty-actions">
                        <a href="{{ route('particuliers.dcg.index') }}" class="btn-empty-primary">
                            <i class="fas fa-graduation-cap"></i> Formations DCG
                        </a>
                        <a href="{{ route('particuliers.dscg.index') }}" class="btn-empty-outline">
                            <i class="fas fa-university"></i> Formations DSCG
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-lg-4">
            @if($items->count() > 0)
                <div class="summary-card-moderne">
                    <div class="summary-header">
                        <i class="fas fa-receipt"></i>
                        <h4>Résumé de la commande</h4>
                    </div>

                    @foreach($items as $item)
                        <div class="summary-item">
                            <span class="summary-item-name">{{ Str::limit($item->video->titre, 30) }}</span>
                            <span class="summary-item-price">{{ number_format($item->video->prix) }} FCFA</span>
                        </div>
                    @endforeach

                    <div class="summary-total">
                        <span class="summary-total-label">Total</span>
                        <span class="summary-total-value">{{ number_format($total) }} FCFA</span>
                    </div>

                    <form action="{{ route('particuliers.panier.checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-checkout">
                            <i class="fas fa-credit-card"></i> Paiement groupé GeniusPay
                        </button>
                    </form>

                    <div class="security-note">
                        <i class="fas fa-lock"></i>
                        <span>Paiement sécurisé via GeniusPay</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- ============================================
     SCRIPTS
     ============================================ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Scroll Progress
window.addEventListener('scroll', function() {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    document.getElementById('scrollProgress').style.width = (scrollTop / scrollHeight * 100) + '%';
});

// Spinner
window.addEventListener('load', function() {
    setTimeout(() => {
        const spinner = document.getElementById('spinner');
        if (spinner) spinner.classList.remove('show');
    }, 500);
});

// Auto-dismiss alerts
document.querySelectorAll('.alert-moderne').forEach(alert => {
    setTimeout(() => {
        const closeBtn = alert.querySelector('.btn-close');
        if (closeBtn) closeBtn.click();
    }, 6000);
});
</script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
