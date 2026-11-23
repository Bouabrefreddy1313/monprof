<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>{{ ucfirst($type) }} - Formations Vidéo</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="asset/img/favicon.png" rel="icon">

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
        background: var(--cream);
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
       HERO SECTION
       ============================================ */
    .hero-videos {
        background: linear-gradient(135deg, var(--blue) 0%, var(--blue-light) 50%, #1a365d 100%);
        position: relative;
        overflow: hidden;
        padding: 80px 0 100px;
    }
    .hero-videos::before {
        content: '';
        position: absolute;
        top: -20%; right: -10%;
        width: 500px; height: 500px;
        background: radial-gradient(circle, rgba(255,107,53,0.12), transparent 70%);
        border-radius: 50%;
        animation: float-hero 8s ease-in-out infinite;
    }
    .hero-videos::after {
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
    .hero-videos-content {
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
        margin-bottom: 24px;
        animation: fadeInUp 0.6s ease;
    }
    .hero-title {
        font-size: clamp(2rem, 4.5vw, 3.2rem);
        font-weight: 800;
        color: white;
        line-height: 1.15;
        margin-bottom: 16px;
        animation: fadeInUp 0.8s ease 0.1s both;
    }
    .hero-title .highlight {
        color: var(--orange);
        position: relative;
    }
    .hero-title .highlight::after {
        content: '';
        position: absolute;
        bottom: -4px; left: 0;
        width: 100%; height: 4px;
        background: var(--orange);
        border-radius: 2px;
        opacity: 0.6;
    }
    .hero-subtitle {
        font-size: 1.15rem;
        color: rgba(255,255,255,0.7);
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
        margin-bottom: 12px;
    }
    .section-subtitle {
        font-size: 1.05rem;
        color: var(--gray-600);
        line-height: 1.8;
    }

    /* ============================================
       VIDEO CARDS
       ============================================ */
    .videos-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 30px;
    }
    .video-card-moderne {
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
    .video-card-moderne::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--orange), var(--orange-light));
        transform: scaleX(0);
        transition: transform 0.4s ease;
        z-index: 2;
    }
    .video-card-moderne:hover::before {
        transform: scaleX(1);
    }
    .video-card-moderne:hover {
        transform: translateY(-12px);
        box-shadow: var(--shadow-lg);
        border-color: transparent;
    }
    .video-thumbnail-moderne {
        position: relative;
        height: 220px;
        background-size: cover;
        background-position: center;
        overflow: hidden;
    }
    .video-thumbnail-moderne::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(to top, rgba(10,22,40,0.6) 0%, transparent 50%);
        transition: all 0.3s ease;
    }
    .video-thumbnail-moderne.no-thumb {
        background: linear-gradient(135deg, #1E3A5F 0%, #0A1628 50%, #2d1b69 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .video-thumbnail-moderne.no-thumb .thumb-icon {
        font-size: 4rem;
        color: rgba(255,107,53,0.4);
        z-index: 3;
        position: relative;
    }
    .video-thumbnail-moderne.no-thumb .thumb-icon::after {
        content: '';
        position: absolute;
        inset: -20px;
        border: 2px dashed rgba(255,107,53,0.2);
        border-radius: 20px;
        animation: float-hero 4s ease-in-out infinite;
    }
    .video-card-moderne:hover .video-thumbnail-moderne::after {
        background: linear-gradient(to top, rgba(10,22,40,0.7) 0%, rgba(255,107,53,0.1) 100%);
    }
    .play-btn-moderne {
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%) scale(1);
        width: 70px; height: 70px;
        background: linear-gradient(135deg, var(--orange), var(--orange-dark));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.4rem;
        box-shadow: var(--shadow-orange);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        z-index: 3;
        cursor: pointer;
    }
    .video-card-moderne:hover .play-btn-moderne {
        transform: translate(-50%, -50%) scale(1.15);
        box-shadow: 0 12px 40px rgba(255,107,53,0.5);
    }
    .play-btn-moderne::before {
        content: '';
        position: absolute;
        inset: -8px;
        border-radius: 50%;
        border: 2px solid rgba(255,107,53,0.3);
        animation: play-pulse 2s ease-in-out infinite;
    }
    @keyframes play-pulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.2); opacity: 0; }
    }
    .badge-niveau-moderne {
        position: absolute;
        top: 16px; right: 16px;
        background: linear-gradient(135deg, var(--orange), var(--orange-light));
        color: white;
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        z-index: 3;
        box-shadow: var(--shadow-orange);
    }
    .video-card-body {
        padding: 28px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .video-card-body h5 {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--blue);
        margin-bottom: 10px;
        line-height: 1.4;
    }
    .video-card-body p {
        font-size: 0.9rem;
        color: var(--gray-600);
        line-height: 1.7;
        margin-bottom: 20px;
        flex: 1;
    }
    .video-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 1px solid var(--gray-100);
    }
    .meta-duree {
        display: flex;
        align-items: center;
        gap: 6px;
        color: var(--blue-accent);
        font-weight: 700;
        font-size: 0.9rem;
    }
    .meta-duree i {
        font-size: 0.85rem;
    }
    .meta-prix {
        background: linear-gradient(135deg, #10B981, #059669);
        color: white;
        padding: 6px 14px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.85rem;
        box-shadow: 0 4px 12px rgba(16,185,129,0.25);
    }
    .btn-video-moderne {
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
        font-family: 'Nunito', sans-serif;
    }
    .btn-video-moderne:hover {
        background: var(--orange-dark);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(255,107,53,0.35);
        color: white;
    }
    .btn-video-moderne i {
        transition: transform 0.3s ease;
    }
    .btn-video-moderne:hover i {
        transform: translateX(3px);
    }

    /* ============================================
       EMPTY STATE
       ============================================ */
    .empty-state-moderne {
        text-align: center;
        padding: 80px 20px;
        animation: fadeInUp 0.8s ease;
    }
    .empty-icon {
        width: 120px; height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--gray-50), var(--cream));
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 28px;
        font-size: 3rem;
        color: var(--gray-400);
        box-shadow: var(--shadow-sm);
        border: 2px dashed var(--gray-200);
    }
    .empty-state-moderne h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--blue);
        margin-bottom: 8px;
    }
    .empty-state-moderne p {
        color: var(--gray-600);
        font-size: 1.05rem;
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
    @media (max-width: 767px) {
        .videos-grid { grid-template-columns: 1fr; }
        .hero-videos { padding: 60px 0 80px; }
        .section-padding { padding: 60px 0; }
    }
    </style>
</head>
<body>

<!-- Topbar -->
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

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-moderne">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand-moderne">
            <img src="asset/img/logo.png" alt="Monprofchezmoi" height="45">
        </a>
        <div style="display: flex; align-items: center; gap: 10px;">
            @auth
                <a href="{{ route('panier.index') }}" class="btn-cart-moderne" style="position: relative; display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; border-radius: 10px; font-weight: 600; font-size: 0.9rem; color: #FF6B35; border: 1.5px solid #FF6B35; text-decoration: none; transition: all 0.3s ease;">
                    <i class="fas fa-shopping-cart"></i> Panier
                    @php
                        $cartCount = \App\Models\PanierVideo::where('user_id', Auth::id())->count();
                    @endphp
                    @if($cartCount > 0)
                        <span style="position: absolute; top: -6px; right: -6px; background: #dc3545; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 0.65rem; font-weight: 700;">{{ $cartCount }}</span>
                    @endif
                </a>
            @endauth
            <a href="{{ url('/groupe') }}" class="btn-back-moderne">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>
    </div>
</nav>

<!-- ============================================
     HERO
     ============================================ -->
<section class="hero-videos">
    <div class="container">
        <div class="hero-videos-content">
            <div class="hero-label"><i class="fas fa-video"></i> Formations en ligne</div>
            <h1 class="hero-title">
                Formations <span class="highlight">{{ ucfirst($type) }}</span>
            </h1>
            <p class="hero-subtitle">Choisissez une vidéo pour commencer votre formation et développez vos compétences à votre rythme</p>
        </div>
    </div>
</section>

<!-- ============================================
     VIDEOS GRID
     ============================================ -->
<section class="section-padding" style="margin-top: -40px; position: relative; z-index: 3;">
    <div class="container">
        @if($videos->count() > 0)
            <div class="videos-grid">
                @foreach($videos as $video)
                    <div class="video-card-moderne animate-scroll">
                        <div class="video-thumbnail-moderne @if(!$video->thumbnail) no-thumb @endif" @if($video->thumbnail) style="background-image: url('{{ asset('storage/' . $video->thumbnail) }}');" @endif>
                            @if(!$video->thumbnail)
                                <div class="thumb-icon">
                                    <i class="fas fa-video"></i>
                                </div>
                            @endif
                            <div class="play-btn-moderne">
                                <i class="fas fa-play"></i>
                            </div>
                            <span class="badge-niveau-moderne">
                                {{ $type }} - Niveau {{ $video->niveau ?? '1' }}
                            </span>
                        </div>
                        <div class="video-card-body">
                            <h5>{{ $video->titre }}</h5>
                            <p>{{ Str::limit($video->description, 100) }}</p>
                            <div class="video-meta">
                                <span class="meta-duree">
                                    <i class="fas fa-clock"></i> {{ $video->duree ?? '45:00' }}
                                </span>
                                <span class="meta-prix">
                                    {{ number_format($video->prix) }} FCFA
                                </span>
                            </div>
                            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                                <a href="{{ route('video.show', $video->id) }}" class="btn-video-moderne" style="flex: 1;">
                                    <i class="fas fa-play-circle"></i> Voir
                                </a>
                                @auth
                                    <button onclick="ajouterPanier({{ $video->id }}, this)" class="btn-video-moderne" style="flex: 0.8; background: #10B981; box-shadow: 0 4px 16px rgba(16,185,129,0.25);">
                                        <i class="fas fa-cart-plus"></i> Panier
                                    </button>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state-moderne">
                <div class="empty-icon">
                    <i class="fas fa-film"></i>
                </div>
                <h3>Aucune vidéo disponible pour le moment</h3>
                <p>Revenez bientôt pour découvrir nos formations</p>
            </div>
        @endif
    </div>
</section>

<!-- Back to Top -->
<a href="#" class="back-to-top-moderne" id="backToTop"><i class="fas fa-arrow-up"></i></a>

<!-- ============================================
     SCRIPTS
     ============================================ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Fonction AJAX pour ajouter au panier
function ajouterPanier(videoId, btn) {
    const token = document.querySelector('meta[name="csrf-token"]').content;
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

    fetch('/panier/ajouter/' + videoId, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': token,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success || data.info) {
            btn.innerHTML = '<i class="fas fa-check"></i> Ajouté';
            btn.style.background = '#059669';
            // Mettre à jour le compteur panier dans la navbar
            if (data.count !== undefined) {
                const cartBadge = document.querySelector('.btn-cart-moderne span');
                if (cartBadge) {
                    cartBadge.textContent = data.count;
                } else if (data.count > 0) {
                    const cartLink = document.querySelector('.btn-cart-moderne');
                    const badge = document.createElement('span');
                    badge.style.cssText = 'position: absolute; top: -6px; right: -6px; background: #dc3545; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 0.65rem; font-weight: 700;';
                    badge.textContent = data.count;
                    cartLink.appendChild(badge);
                }
            }
        } else {
            btn.innerHTML = '<i class="fas fa-cart-plus"></i> Panier';
            btn.disabled = false;
            alert(data.error || 'Erreur');
        }
    })
    .catch(err => {
        if (err.status === 401) {
            window.location.href = '/login';
        }
        btn.innerHTML = '<i class="fas fa-cart-plus"></i> Panier';
        btn.disabled = false;
    });
}

// Scroll Progress + Navbar + BackToTop
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
document.getElementById('backToTop').addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
});
</script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
