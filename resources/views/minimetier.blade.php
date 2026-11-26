<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Mini-Métiers - Des ateliers ludiques pour révéler les talents de votre enfant</title>
    <meta name="description" content="Découvrez nos ateliers Mini-Métiers pendant les vacances scolaires. Cuisinier, Scientifique, Artiste, Détective, Médecin... Chaque semaine, une nouvelle aventure pour enfants de 4 à 10 ans.">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'brand-orange': '#FF6B35',
                        'brand-yellow': '#F7931E',
                        'brand-blue': '#2E5BFF',
                        'brand-green': '#00C853',
                        'brand-purple': '#7C3AED',
                        'brand-pink': '#EC4899',
                    }
                }
            }
        }
    </script>

    <style>
        .gradient-text {
            background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .icon-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .pulse-btn {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(255, 107, 53, 0.7); }
            70% { box-shadow: 0 0 0 20px rgba(255, 107, 53, 0); }
        }

        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .metier-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9ff 100%);
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .metier-card:hover {
            border-color: #FF6B35;
            transform: scale(1.02);
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -8px;
            top: 0;
            width: 16px;
            height: 16px;
            background: #FF6B35;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0 0 3px #FF6B35;
        }

        .price-card {
            background: linear-gradient(135deg, #ffffff 0%, #fff5f0 100%);
            border: 2px solid #FF6B35;
        }

        .price-card.featured {
            background: linear-gradient(135deg, #FF6B35 0%, #F7931E 100%);
            color: white;
            transform: scale(1.05);
        }

        /* Modal d'inscription */
        .modal-inscription-overlay {
            position: fixed;
            inset: 0;
            background: rgba(10, 22, 40, 0.6);
            backdrop-filter: blur(8px);
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        .modal-inscription-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        .modal-inscription {
            background: #fff;
            border-radius: 24px;
            width: 100%;
            max-width: 700px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 24px 64px rgba(10,22,40,0.16);
            transform: translateY(30px) scale(0.95);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .modal-inscription-overlay.active .modal-inscription {
            transform: translateY(0) scale(1);
        }
        .modal-close {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: #F1F3F4;
            border: none;
            color: #5F6368;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }
        .modal-close:hover {
            background: #FF6B35;
            color: white;
            transform: rotate(90deg);
        }
        .modal-header {
            text-align: center;
            padding: 40px 30px 20px;
            border-bottom: 1px solid var(--gray-100, #F1F3F4);
        }
        .modal-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            background: linear-gradient(135deg, #FF6B35, #FF8C5A);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 1.8rem;
            color: white;
        }
        .modal-header h3 {
            font-size: 1.4rem;
            font-weight: 800;
            color: #0A1628;
            margin-bottom: 6px;
        }
        .modal-header p {
            font-size: 0.9rem;
            color: #5F6368;
            margin: 0;
        }
        .modal-section {
            padding: 24px 30px;
            border-bottom: 1px solid #F1F3F4;
        }
        .modal-section:last-of-type {
            border-bottom: none;
        }
        .modal-section h4 {
            font-size: 0.95rem;
            font-weight: 700;
            color: #0A1628;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .modal-section h4 i {
            color: #FF6B35;
            font-size: 1rem;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        .form-group {
            margin-bottom: 16px;
        }
        .form-group:last-child {
            margin-bottom: 0;
        }
        .form-group label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #3C4043;
            margin-bottom: 6px;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group input[type="number"],
        .form-group input[type="date"],
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border: 2px solid #E8EAED;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            color: #3C4043;
            transition: all 0.2s ease;
            background: white;
        }
        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #FF6B35;
        }
        .form-group input::placeholder {
            color: #9AA0A6;
        }
        .form-group input[readonly] {
            background: #F8F9FA;
            color: #FF6B35;
            font-weight: 700;
        }
        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .radio-label {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            border: 2px solid #E8EAED;
            border-radius: 10px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 600;
            color: #3C4043;
            transition: all 0.2s ease;
        }
        .radio-label input[type="radio"] {
            accent-color: #FF6B35;
            width: 16px;
            height: 16px;
        }
        .radio-label:has(input:checked) {
            border-color: #FF6B35;
            background: rgba(255, 107, 53, 0.05);
            color: #FF6B35;
        }
        .checkbox-days {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .day-checkbox {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 8px 12px;
            border: 2px solid #E8EAED;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 600;
            color: #3C4043;
            transition: all 0.2s ease;
        }
        .day-checkbox input[type="checkbox"] {
            accent-color: #FF6B35;
            width: 16px;
            height: 16px;
        }
        .day-checkbox:has(input:checked) {
            border-color: #FF6B35;
            background: rgba(255, 107, 53, 0.05);
            color: #FF6B35;
        }
        .frais-reservation {
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.08), rgba(255, 107, 53, 0.03));
            border: 2px solid rgba(255, 107, 53, 0.2);
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 16px;
        }
        .checkbox-frais {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: default;
        }
        .checkbox-frais input {
            accent-color: #FF6B35;
            width: 20px;
            height: 20px;
        }
        .checkbox-frais span {
            font-size: 0.95rem;
            color: #FF6B35;
        }
        .frais-desc {
            font-size: 0.82rem;
            color: #5F6368;
            margin: 8px 0 0 30px;
            line-height: 1.5;
        }
        .recap-section {
            background: #F8F9FA;
        }
        .recap-box {
            background: white;
            border-radius: 12px;
            padding: 16px;
            border: 1px solid #E8EAED;
        }
        .recap-line {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #F1F3F4;
            font-size: 0.9rem;
        }
        .recap-line:last-child {
            border-bottom: none;
        }
        .recap-line span {
            color: #5F6368;
        }
        .recap-line strong {
            color: #0A1628;
            font-weight: 700;
        }
        .recap-line.highlight {
            background: rgba(255, 107, 53, 0.05);
            margin: 0 -16px;
            padding: 12px 16px;
            border-bottom: none;
        }
        .recap-line.highlight span,
        .recap-line.highlight strong {
            color: #FF6B35;
        }
        .status-badge {
            background: #E8EAED;
            color: #5F6368;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .info-importante {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 16px;
            padding: 12px;
            background: rgba(59, 130, 246, 0.05);
            border-radius: 10px;
            border: 1px solid rgba(59, 130, 246, 0.15);
        }
        .info-importante i {
            color: #3B82F6;
            margin-top: 2px;
        }
        .info-importante p {
            font-size: 0.82rem;
            color: #5F6368;
            margin: 0;
            line-height: 1.5;
        }
        .btn-confirm-inscription {
            width: calc(100% - 60px);
            margin: 0 30px 30px;
            padding: 16px 24px;
            border-radius: 12px;
            background: linear-gradient(135deg, #FF6B35, #FF8C5A);
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
        }
        .btn-confirm-inscription:hover {
            background: linear-gradient(135deg, #E85A2B, #FF6B35);
            transform: translateY(-2px);
        }
        .modal-success {
            text-align: center;
            padding: 60px 30px;
        }
        .modal-success-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #22c55e, #16a34a);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2.5rem;
            color: white;
        }
        .modal-success h3 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #0A1628;
            margin-bottom: 10px;
        }
        .modal-success p {
            font-size: 1rem;
            color: #5F6368;
            margin-bottom: 24px;
        }
        .btn-success-close {
            padding: 12px 32px;
            border-radius: 10px;
            background: #FF6B35;
            color: white;
            font-weight: 700;
            border: none;
            cursor: pointer;
        }
        .btn-success-close:hover {
            background: #E85A2B;
        }
        @media (max-width: 767px) {
            .form-row { grid-template-columns: 1fr; }
            .modal-inscription { max-height: 95vh; border-radius: 16px; }
            .modal-section { padding: 20px; }
            .day-checkbox { padding: 6px 10px; font-size: 0.8rem; }
        }
    </style>
    @include('partials.responsive-assets')
</head>
<body class="font-poppins bg-gray-50 overflow-x-hidden">

    <!-- Navigation -->
   <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-md shadow-lg transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/particuliers') }}" class="text-2xl font-bold gradient-text">
                        <i class="fas fa-briefcase mr-2"></i>Mini-Métiers
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="/particuliers" class="text-gray-700 hover:text-brand-orange px-3 py-2 rounded-md text-sm font-medium transition-colors">Acceuil</a>
                        <a href="/particuliers/reponse" class="text-gray-700 hover:text-brand-orange px-3 py-2 rounded-md text-sm font-medium transition-colors">Soutien</a>
                        <a href="/particuliers/formations" class="text-gray-700 hover:text-brand-orange px-3 py-2 rounded-md text-sm font-medium transition-colors">Formation</a>
                        <a href="/particuliers/groupe" class="text-gray-700 hover:text-brand-orange px-3 py-2 rounded-md text-sm font-medium transition-colors">Cours en ligne DCG & DSCG</a>

                    </div>
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-gray-700 hover:text-brand-orange focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden hidden bg-white border-t" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/particuliers" class="block text-gray-700 hover:text-brand-orange px-3 py-2 rounded-md text-base font-medium">Acceuil</a>
                <a href="/particuliers/reponse" class="block text-gray-700 hover:text-brand-orange px-3 py-2 rounded-md text-base font-medium">Soutien</a>
                <a href="/particuliers/formations" class="block text-gray-700 hover:text-brand-orange px-3 py-2 rounded-md text-base font-medium">Formation</a>
                <a href="/particuliers/groupe" class="block text-gray-700 hover:text-brand-orange px-3 py-2 rounded-md text-base font-medium">Cours en ligne DCG & DSCG</a>

            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden">
        <div class="absolute inset-0 hero-gradient opacity-90"></div>
        <div class="absolute inset-0 bg-pattern opacity-30"></div>

        <!-- Animated shapes -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full icon-float" style="animation-delay: 0s;"></div>
        <div class="absolute bottom-20 right-10 w-32 h-32 bg-white/10 rounded-full icon-float" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-yellow-400/20 rounded-full icon-float" style="animation-delay: 0.5s;"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div data-aos="fade-down" data-aos-duration="1000">
                <span class="inline-block bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full text-sm font-semibold mb-6 border border-white/30">
                    <i class="fas fa-star mr-2 text-yellow-300"></i>Spécial Vacances Scolaires
                </span>
            </div>

            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 leading-tight" data-aos="fade-up" data-aos-delay="100">
                Mini-Métiers
                <span class="block text-3xl md:text-4xl font-light mt-4 text-yellow-300">
                    Des ateliers ludiques pour révéler les talents de votre enfant
                </span>
            </h1>

            <p class="text-xl md:text-2xl text-white/90 mb-10 max-w-3xl mx-auto font-light" data-aos="fade-up" data-aos-delay="200">
                Et si votre enfant découvrait ses talents en s'amusant ? Des ateliers uniques où les enfants explorent différents métiers à travers des activités créatives, pratiques et amusantes.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center" data-aos="fade-up" data-aos-delay="300">
                <button onclick="openInscriptionModal('Mini-Métiers - Réservation', '0')" class="bg-white text-brand-orange px-8 py-4 rounded-full text-lg font-bold hover:bg-gray-100 transition-all transform hover:scale-105 shadow-2xl pulse-btn">
                    <i class="fas fa-calendar-check mr-2"></i>Je réserve une place
                </button>
                <a href="#presentation" class="border-2 border-white text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:text-brand-orange transition-all">
                    <i class="fas fa-play-circle mr-2"></i>Découvrir
                </a>
            </div>

            <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 text-white border border-white/20">
                    <i class="fas fa-child text-3xl mb-2 text-yellow-300"></i>
                    <p class="font-bold text-2xl">4-10 ans</p>
                    <p class="text-sm opacity-80">Tous niveaux</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 text-white border border-white/20">
                    <i class="fas fa-users text-3xl mb-2 text-green-300"></i>
                    <p class="font-bold text-2xl">6-12</p>
                    <p class="text-sm opacity-80">Enfants/groupe</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 text-white border border-white/20">
                    <i class="fas fa-clock text-3xl mb-2 text-pink-300"></i>
                    <p class="font-bold text-2xl">1h30-2h</p>
                    <p class="text-sm opacity-80">Par séance</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 text-white border border-white/20">
                    <i class="fas fa-map-marker-alt text-3xl mb-2 text-blue-300"></i>
                    <p class="font-bold text-2xl">En centre</p>
                    <p class="text-sm opacity-80">Sécurisé</p>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#F9FAFB"/>
            </svg>
        </div>
    </section>

    <!-- Les Métiers Section -->
    <section id="metiers" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-brand-orange font-semibold text-lg uppercase tracking-wider">Nos Ateliers</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2 mb-4">
                    👩‍🍳 Découvrez nos <span class="gradient-text">Mini-Métiers</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Chaque semaine, une nouvelle aventure ! Votre enfant explore différents univers professionnels de manière ludique.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Cuisinier -->
                <div class="metier-card rounded-3xl p-8 shadow-lg card-hover" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-20 h-20 bg-orange-100 rounded-2xl flex items-center justify-center mb-6 icon-float">
                        <i class="fas fa-utensils text-4xl text-orange-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">👩‍🍳 Cuisinier</h3>
                    <p class="text-gray-600 mb-4">Apprentissage des bases de la cuisine, préparation de recettes simples et dégustation des créations.</p>
                    <ul class="space-y-2 text-sm text-gray-500">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Hygiène alimentaire</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Préparation de goûters</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Découverte des saveurs</li>
                    </ul>
                </div>

                <!-- Scientifique -->
                <div class="metier-card rounded-3xl p-8 shadow-lg card-hover" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-20 h-20 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 icon-float" style="animation-delay: 0.2s;">
                        <i class="fas fa-flask text-4xl text-blue-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">🔬 Scientifique</h3>
                    <p class="text-gray-600 mb-4">Expériences scientifiques amusantes, découverte des phénomènes naturels et expérimentations sécurisées.</p>
                    <ul class="space-y-2 text-sm text-gray-500">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Expériences magiques</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Observation nature</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Approche ludique</li>
                    </ul>
                </div>

                <!-- Artiste -->
                <div class="metier-card rounded-3xl p-8 shadow-lg card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-20 h-20 bg-pink-100 rounded-2xl flex items-center justify-center mb-6 icon-float" style="animation-delay: 0.4s;">
                        <i class="fas fa-palette text-4xl text-pink-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">🎨 Artiste</h3>
                    <p class="text-gray-600 mb-4">Expression créative à travers la peinture, le dessin, la sculpture et les arts plastiques variés.</p>
                    <ul class="space-y-2 text-sm text-gray-500">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Peinture & dessin</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Arts manuels</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Créations à emporter</li>
                    </ul>
                </div>

                <!-- Détective -->
                <div class="metier-card rounded-3xl p-8 shadow-lg card-hover" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-20 h-20 bg-purple-100 rounded-2xl flex items-center justify-center mb-6 icon-float" style="animation-delay: 0.6s;">
                        <i class="fas fa-search text-4xl text-purple-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">🚓 Détective</h3>
                    <p class="text-gray-600 mb-4">Enquêtes passionnantes, résolution d'énigmes et développement de la logique et de l'observation.</p>
                    <ul class="space-y-2 text-sm text-gray-500">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Jeux d'enquête</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Logique & déduction</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Travail d'équipe</li>
                    </ul>
                </div>

                <!-- Médecin -->
                <div class="metier-card rounded-3xl p-8 shadow-lg card-hover" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-20 h-20 bg-red-100 rounded-2xl flex items-center justify-center mb-6 icon-float" style="animation-delay: 0.8s;">
                        <i class="fas fa-user-md text-4xl text-red-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">🏥 Médecin</h3>
                    <p class="text-gray-600 mb-4">Découverte du corps humain, soin des peluches, apprentissage des gestes de premiers secours adaptés.</p>
                    <ul class="space-y-2 text-sm text-gray-500">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Soin des peluches</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Hygiène dentaire</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Corps humain</li>
                    </ul>
                </div>

                <!-- Surprise -->
                <div class="metier-card rounded-3xl p-8 shadow-lg card-hover border-2 border-dashed border-brand-orange" data-aos="fade-up" data-aos-delay="500">
                    <div class="w-20 h-20 bg-yellow-100 rounded-2xl flex items-center justify-center mb-6 icon-float" style="animation-delay: 1s;">
                        <i class="fas fa-gift text-4xl text-yellow-500"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">🎁 Et bien plus !</h3>
                    <p class="text-gray-600 mb-4">Chaque semaine découvrez de nouveaux métiers : pompier, astronaute, vétérinaire, architecte...</p>
                    <ul class="space-y-2 text-sm text-gray-500">
                        <li><i class="fas fa-star text-yellow-500 mr-2"></i>Nouveautés régulières</li>
                        <li><i class="fas fa-star text-yellow-500 mr-2"></i>Selon les saisons</li>
                        <li><i class="fas fa-star text-yellow-500 mr-2"></i>À la demande</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Tarifs Section -->
    <section id="tarifs" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-brand-orange font-semibold text-lg uppercase tracking-wider">Nos Tarifs</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2 mb-4">
                    💰 Des formules adaptées aux <span class="gradient-text">parents</span>
                </h2>
                <p class="text-xl text-gray-600">Matériel inclus dans tous les ateliers</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Séance unique -->
                <div class="price-card rounded-3xl p-8 shadow-lg card-hover" data-aos="fade-up" data-aos-delay="0">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-ticket-alt text-2xl text-brand-orange"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">1 Séance</h3>
                        <p class="text-gray-500 mt-2">Découverte</p>
                    </div>
                    <div class="text-center mb-6">
                        <span class="text-5xl font-bold text-gray-900">7 500</span>
                        <span class="text-xl text-gray-600"> FCFA</span>
                    </div>
                    <ul class="space-y-3 mb-8 text-gray-600">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i>1h30 à 2h d'atelier</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i>Matériel inclus</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i>1 métier découvert</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i>Création à emporter</li>
                    </ul>
                    <button onclick="openInscriptionModal('Mini-Métiers - 1 Séance', '5000')" class="block w-full text-center bg-gray-100 text-gray-800 py-4 rounded-xl font-bold hover:bg-brand-orange hover:text-white transition-colors">
                        Je réserve une place
                    </button>
                </div>

                <!-- Forfait semaine -->
                <div class="price-card featured rounded-3xl p-8 shadow-2xl card-hover relative" data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute top-0 right-0 bg-yellow-400 text-gray-900 text-xs font-bold px-4 py-1 rounded-bl-xl rounded-tr-3xl">
                        POPULAIRE
                    </div>
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calendar-week text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white">Forfait Semaine</h3>
                        <p class="text-white/80 mt-2">5 jours d'aventure</p>
                    </div>
                    <div class="text-center mb-6">
                        <span class="text-5xl font-bold text-white">22 500</span>
                        <span class="text-xl text-white/80"> FCFA</span>
                    </div>
                    <ul class="space-y-3 mb-8 text-white/90">
                        <li class="flex items-center"><i class="fas fa-check text-yellow-300 mr-3"></i>5 ateliers (1 semaine)</li>
                        <li class="flex items-center"><i class="fas fa-check text-yellow-300 mr-3"></i>5 métiers différents</li>
                        <li class="flex items-center"><i class="fas fa-check text-yellow-300 mr-3"></i>Matériel inclus</li>
                        <li class="flex items-center"><i class="fas fa-check text-yellow-300 mr-3"></i>Passeport des métiers</li>
                        <li class="flex items-center"><i class="fas fa-check text-yellow-300 mr-3"></i>Photos souvenirs</li>
                    </ul>
                    <button onclick="openInscriptionModal('Mini-Métiers - Forfait Semaine', '20000')" class="block w-full text-center bg-white text-brand-orange py-4 rounded-xl font-bold hover:bg-gray-100 transition-colors pulse-btn">
                        Je réserve une place
                    </button>
                </div>

                <!-- Programme complet -->
                <div class="price-card rounded-3xl p-8 shadow-lg card-hover" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-crown text-2xl text-purple-600"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Programme Complet</h3>
                        <p class="text-gray-500 mt-2">2 semaines</p>
                    </div>
                    <div class="text-center mb-6">
                        <span class="text-5xl font-bold text-gray-900">37 500</span>
                        <span class="text-xl text-gray-600"> FCFA</span>
                    </div>
                    <ul class="space-y-3 mb-8 text-gray-600">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i>10 ateliers (2 semaines)</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i>10 métiers découverts</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i>Tous les bonus</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i>Diplôme officiel</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3"></i>Exposition finale</li>
                    </ul>
                    <div class="bg-yellow-100 rounded-lg p-3 mb-4 text-center">
                        <span class="text-yellow-800 font-semibold text-sm">🎁 Meilleur rapport qualité-prix</span>
                    </div>
                    <button onclick="openInscriptionModal('Mini-Métiers - Programme Complet', '35000')" class="block w-full text-center bg-gray-100 text-gray-800 py-4 rounded-xl font-bold hover:bg-brand-orange hover:text-white transition-colors">
                        Je réserve une place
                    </button>
                </div>
            </div>

            <div class="mt-12 text-center" data-aos="fade-up">
                <div class="inline-flex items-center bg-gray-50 rounded-full px-6 py-3 shadow-lg border border-gray-100">
                    <i class="fas fa-percentage text-brand-orange mr-2"></i>
                    <span class="text-gray-700 font-semibold">Réductions : Fratrie (-10%) • Inscription anticipée</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Pourquoi Section -->
    <section id="presentation" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <span class="text-brand-orange font-semibold text-lg uppercase tracking-wider">Pourquoi Mini-Métiers ?</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2 mb-6">
                        💡 Apprendre en jouant, c'est la clé pour développer <span class="gradient-text">confiance et curiosité</span>
                    </h2>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-shield-alt text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-1">Cadre sécurisé et bienveillant</h4>
                                <p class="text-gray-600">Encadrement professionnel, matériel adapté et respect du rythme de chaque enfant.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-brain text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-1">Développement complet</h4>
                                <p class="text-gray-600">Créativité, motricité fine, autonomie et travail en groupe au programme.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-mobile-alt text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-1">Alternative aux écrans</h4>
                                <p class="text-gray-600">Des activités manuelles et intellectuelles pour occuper intelligemment votre enfant.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-smile-beam text-orange-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-1">Confiance en soi</h4>
                                <p class="text-gray-600">Votre enfant découvre ses centres d'intérêt et développe son estime de soi.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative" data-aos="fade-left">
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-orange to-brand-yellow rounded-3xl transform rotate-3 opacity-20"></div>
                    <div class="relative bg-white rounded-3xl shadow-2xl p-8 border border-gray-100">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-orange-50 rounded-2xl p-6 text-center">
                                <i class="fas fa-calendar-alt text-4xl text-brand-orange mb-3"></i>
                                <p class="font-bold text-gray-900">Vacances scolaires</p>
                                <p class="text-sm text-gray-600">Uniquement pendant les vacances</p>
                            </div>
                            <div class="bg-blue-50 rounded-2xl p-6 text-center">
                                <i class="fas fa-clock text-4xl text-blue-500 mb-3"></i>
                                <p class="font-bold text-gray-900">1 fois/semaine</p>
                                <p class="text-sm text-gray-600">1h30 à 2h par séance</p>
                            </div>
                            <div class="bg-green-50 rounded-2xl p-6 text-center">
                                <i class="fas fa-users text-4xl text-green-500 mb-3"></i>
                                <p class="font-bold text-gray-900">Petits groupes</p>
                                <p class="text-sm text-gray-600">6 à 12 enfants maximum</p>
                            </div>
                            <div class="bg-purple-50 rounded-2xl p-6 text-center">
                                <i class="fas fa-award text-4xl text-purple-500 mb-3"></i>
                                <p class="font-bold text-gray-900">Diplôme</p>
                                <p class="text-sm text-gray-600">Passeport des métiers</p>
                            </div>
                        </div>

                        <div class="mt-6 bg-gray-50 rounded-2xl p-6">
                            <h4 class="font-bold text-gray-900 mb-3"><i class="fas fa-heart text-red-500 mr-2"></i>Les parents adorent :</h4>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i>"Mon fils attend chaque semaine avec impatience !"</li>
                                <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i>"Une super alternative aux écrans, très éducatif."</li>
                                <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i>"Activités variées et très bien encadrées."</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programme Section -->
    <section id="programme" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-brand-orange font-semibold text-lg uppercase tracking-wider">Déroulement</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2 mb-4">
                    🗓️ Une séance type chez <span class="gradient-text">Mini-Métiers</span>
                </h2>
                <p class="text-xl text-gray-600">Chaque atelier est pensé pour captiver les enfants</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="space-y-8" data-aos="fade-right">
                    <div class="relative pl-8 border-l-4 border-brand-orange timeline-item">
                        <div class="bg-white rounded-2xl shadow-lg p-6 ml-4">
                            <div class="flex items-center mb-3">
                                <span class="bg-brand-orange text-white w-8 h-8 rounded-full flex items-center justify-center font-bold mr-3">1</span>
                                <h4 class="text-xl font-bold text-gray-900">Découverte du métier</h4>
                            </div>
                            <p class="text-gray-600">Présentation ludique du métier du jour à travers des histoires, vidéos ou interventions.</p>
                        </div>
                    </div>

                    <div class="relative pl-8 border-l-4 border-blue-500 timeline-item">
                        <div class="bg-white rounded-2xl shadow-lg p-6 ml-4">
                            <div class="flex items-center mb-3">
                                <span class="bg-blue-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold mr-3">2</span>
                                <h4 class="text-xl font-bold text-gray-900">Activité pratique</h4>
                            </div>
                            <p class="text-gray-600">Mise en situation réelle : votre enfant endosse le rôle et manipule, expérimente, crée.</p>
                        </div>
                    </div>

                    <div class="relative pl-8 border-l-4 border-green-500 timeline-item">
                        <div class="bg-white rounded-2xl shadow-lg p-6 ml-4">
                            <div class="flex items-center mb-3">
                                <span class="bg-green-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold mr-3">3</span>
                                <h4 class="text-xl font-bold text-gray-900">Jeu ou défi</h4>
                            </div>
                            <p class="text-gray-600">Consolidation des apprentissages par le jeu en équipe ou défis individuels amusants.</p>
                        </div>
                    </div>

                    <div class="relative pl-8 border-l-4 border-purple-500 timeline-item">
                        <div class="bg-white rounded-2xl shadow-lg p-6 ml-4">
                            <div class="flex items-center mb-3">
                                <span class="bg-purple-500 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold mr-3">4</span>
                                <h4 class="text-xl font-bold text-gray-900">Présentation des créations</h4>
                            </div>
                            <p class="text-gray-600">Chaque enfant présente son travail, développant ainsi sa confiance en soi et ses capacités d'expression.</p>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-left">
                    <div class="bg-gradient-to-br from-brand-orange to-brand-yellow rounded-3xl p-8 text-white shadow-2xl">
                        <h3 class="text-3xl font-bold mb-6">🎁 Bonus pour les enfants</h3>
                        <div class="space-y-4">
                            <div class="flex items-center bg-white/10 rounded-xl p-4">
                                <i class="fas fa-passport text-3xl mr-4 text-yellow-300"></i>
                                <div>
                                    <h4 class="font-bold text-lg">Passeport des métiers</h4>
                                    <p class="text-white/80 text-sm">Collection des métiers découverts</p>
                                </div>
                            </div>

                            <div class="flex items-center bg-white/10 rounded-xl p-4">
                                <i class="fas fa-certificate text-3xl mr-4 text-yellow-300"></i>
                                <div>
                                    <h4 class="font-bold text-lg">Diplôme en fin de programme</h4>
                                    <p class="text-white/80 text-sm">Certificat de participation officiel</p>
                                </div>
                            </div>

                            <div class="flex items-center bg-white/10 rounded-xl p-4">
                                <i class="fas fa-camera text-3xl mr-4 text-yellow-300"></i>
                                <div>
                                    <h4 class="font-bold text-lg">Photos souvenirs</h4>
                                    <p class="text-white/80 text-sm">Immortalisation des moments forts</p>
                                </div>
                            </div>

                            <div class="flex items-center bg-white/10 rounded-xl p-4">
                                <i class="fas fa-palette text-3xl mr-4 text-yellow-300"></i>
                                <div>
                                    <h4 class="font-bold text-lg">Créations à ramener</h4>
                                    <p class="text-white/80 text-sm">Tous les projets réalisés rentrent à la maison</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 p-4 bg-white/20 rounded-xl border border-white/30">
                            <p class="text-center font-semibold">
                                <i class="fas fa-star mr-2"></i>
                                Résultat : un enfant fier de ce qu'il a créé !
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Exemple d'atelier Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden" data-aos="fade-up">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <div class="p-12 flex flex-col justify-center">
                        <span class="text-brand-orange font-semibold text-lg uppercase tracking-wider mb-2">Exemple concret</span>
                        <h2 class="text-4xl font-bold text-gray-900 mb-6">🏥 Atelier Métiers de la santé</h2>

                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                    <i class="fas fa-user-md text-red-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">Médecin</h4>
                                    <p class="text-gray-600">Soigner des peluches, apprendre les gestes simples de premier secours adaptés aux enfants.</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                    <i class="fas fa-tooth text-blue-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">Dentiste</h4>
                                    <p class="text-gray-600">Atelier sur l'hygiène dentaire avec maquettes et apprentissage du brossage correct.</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                    <i class="fas fa-pills text-green-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">Pharmacien</h4>
                                    <p class="text-gray-600">Jeu de préparation de "remèdes" fictifs (eau colorée) dans un contexte sécurisé et éducatif.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-red-500 to-pink-600 p-12 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-pattern opacity-20"></div>
                        <div class="relative text-center text-white">
                            <i class="fas fa-heartbeat text-8xl mb-6 icon-float"></i>
                            <h3 class="text-3xl font-bold mb-4">Une exposition finale</h3>
                            <p class="text-xl text-white/90">Pour valoriser le travail de votre enfant et célébrer ses découvertes !</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact" class="py-20 bg-gradient-to-r from-brand-orange to-brand-yellow relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern opacity-20"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="zoom-in">
            <i class="fas fa-rocket text-6xl text-white mb-6 icon-float"></i>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                🚀 Places limitées !
            </h2>
            <p class="text-xl text-white/90 mb-8">
                Les groupes sont volontairement petits pour garantir la qualité.<br>
                Réservez dès maintenant pour garantir une place à votre enfant.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <button onclick="openInscriptionModal('Mini-Métiers - Réservation rapide', '0')" class="bg-white text-brand-orange px-10 py-5 rounded-full text-xl font-bold hover:bg-gray-100 transition-all transform hover:scale-105 shadow-2xl pulse-btn">
                    <i class="fas fa-calendar-check mr-2"></i>Je réserve maintenant
                </button>
                <a href="tel:+22500000000" class="bg-transparent border-2 border-white text-white px-10 py-5 rounded-full text-xl font-bold hover:bg-white hover:text-brand-orange transition-all transform hover:scale-105">
                    <i class="fas fa-phone mr-2"></i>Appeler
                </a>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 text-white">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                    <i class="fas fa-map-marker-alt text-3xl mb-3"></i>
                    <p class="font-semibold">En centre</p>
                    <p class="text-sm opacity-80">Lieu sécurisé et adapté</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                    <i class="fas fa-phone text-3xl mb-3"></i>
                    <p class="font-semibold">Contact rapide</p>
                    <p class="text-sm opacity-80">Réponse sous 24h</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                    <i class="fas fa-shield-alt text-3xl mb-3"></i>
                    <p class="font-semibold">Sécurité garantie</p>
                    <p class="text-sm opacity-80">Encadrement professionnel</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal d'inscription -->
    @include('partials.modal-inscription')

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold mb-4 flex items-center">
                        <i class="fas fa-briefcase mr-2 text-brand-orange"></i>
                        Mini-Métiers
                    </h3>
                    <p class="text-gray-400 mb-4">
                        Des ateliers ludiques pour révéler les talents de votre enfant pendant les vacances scolaires.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-brand-orange transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-brand-orange transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-brand-orange transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4 text-brand-orange">Liens rapides</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#presentation" class="hover:text-white transition-colors">Présentation</a></li>
                        <li><a href="#metiers" class="hover:text-white transition-colors">Les Métiers</a></li>
                        <li><a href="#tarifs" class="hover:text-white transition-colors">Tarifs</a></li>
                        <li><a href="#programme" class="hover:text-white transition-colors">Programme</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4 text-brand-orange">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-phone mr-2"></i>+225 XX XX XX XX</li>
                        <li><i class="fas fa-envelope mr-2"></i>contact@minimetiers.ci</li>
                        <li><i class="fas fa-map-marker-alt mr-2"></i>Abidjan, Côte d'Ivoire</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center text-gray-500">
                <p>&copy; 2024 Mini-Métiers. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // ========== MODAL D'INSCRIPTION ==========
        let currentFormule = '';
        let currentPrix = '';

        function openInscriptionModal(formule, prix) {
            currentFormule = formule;
            currentPrix = prix + ' FCFA';

            const modalActivite = document.getElementById('modalActivite');
            const recapFormule = document.getElementById('recapFormule');
            const recapPrix = document.getElementById('recapPrix');
            const modal = document.getElementById('modalInscription');

            if (modalActivite) modalActivite.value = formule;
            if (recapFormule) recapFormule.textContent = formule;
            if (recapPrix) recapPrix.textContent = currentPrix;
            updateAvailableDays();
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
            resetForm();
        }

        function resetForm() {
            const form = document.getElementById('formInscription');
            if (form) form.reset();
            const modalActivite = document.getElementById('modalActivite');
            const recapFormule = document.getElementById('recapFormule');
            const recapPrix = document.getElementById('recapPrix');
            if (modalActivite) modalActivite.value = currentFormule;
            if (recapFormule) recapFormule.textContent = currentFormule;
            if (recapPrix) recapPrix.textContent = currentPrix;
            updateAvailableDays('domicile');
        }

        function updateAvailableDays(lieu) {
            if (!lieu) {
                const checkedLieu = document.querySelector('input[name="lieu"]:checked');
                lieu = checkedLieu ? checkedLieu.value : 'domicile';
            }

            const dayLabels = document.querySelectorAll('.checkbox-days .day-checkbox');
            const hint = document.getElementById('joursHint');

            if (lieu === 'centre') {
                if (hint) hint.style.display = 'inline';
                dayLabels.forEach(label => {
                    const cb = label.querySelector('input[name="jours[]"]');
                    const day = label.getAttribute('data-day') || (cb ? cb.value : '');
                    if (day === 'Mercredi' || day === 'Samedi') {
                        label.style.display = '';
                        if (cb) cb.disabled = false;
                    } else {
                        label.style.display = 'none';
                        if (cb) {
                            cb.checked = false;
                            cb.disabled = true;
                        }
                    }
                });
            } else {
                if (hint) hint.style.display = 'none';
                dayLabels.forEach(label => {
                    label.style.display = '';
                    const cb = label.querySelector('input[name="jours[]"]');
                    if (cb) cb.disabled = false;
                });
            }
        }

        function submitInscription(e) {
            e.preventDefault();
            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData);
            const jours = [];
            document.querySelectorAll('input[name="jours[]"]:checked').forEach(cb => {
                jours.push(cb.value);
            });
            data.jours = jours;
            data.formule = currentFormule;
            data.prix_formule = currentPrix;
            data.frais_reservation = '10000';

            fetch('/particuliers/inscription', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) showSuccessMessage();
                else alert('Une erreur est survenue.');
            })
            .catch(error => {
                console.error('Erreur:', error);
                showSuccessMessage();
            });
        }

        function showSuccessMessage() {
            const modal = document.querySelector('.modal-inscription');
            const parentName = document.querySelector('input[name="nom_parent"]')?.value || '';
            const phone = document.querySelector('input[name="telephone"]')?.value || '';
            if (modal) {
                modal.innerHTML = `
                    <div class="modal-success">
                        <div class="modal-success-icon"><i class="fas fa-check"></i></div>
                        <h3>Inscription envoyée !</h3>
                        <p>Merci ${parentName}. Notre équipe vous contactera au <strong>${phone}</strong>.</p>
                        <button class="btn-success-close" onclick="closeInscriptionModal()">Fermer</button>
                    </div>
                `;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const modalInscription = document.getElementById('modalInscription');
            if (modalInscription) {
                modalInscription.addEventListener('click', function(e) {
                    if (e.target === this) closeInscriptionModal();
                });
            }

            document.querySelectorAll('input[name="lieu"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    updateAvailableDays(this.value);
                });
            });

            updateAvailableDays();
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeInscriptionModal();
        });

        // Function to redirect to contact page with parameters
        function redirectToContact(part, prix = null) {
            let url = `/particuliers/contact?part=${encodeURIComponent(part)}`;
            if (prix) {
                url += `&prix=${encodeURIComponent(prix)}`;
            }
            window.location.href = url;
        }

        // Initialize AOS animation
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        // Mobile menu toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-lg');
            } else {
                navbar.classList.remove('shadow-lg');
            }
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Close mobile menu if open
                    menu.classList.add('hidden');
                }
            });
        });
    </script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
