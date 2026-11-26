<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Ma Cabine à Livres - Monprofchezmoi-ci.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Bibliothèque enfants, livres, lecture, contes" name="keywords">
    <meta content="Donnez le goût de la lecture à vos enfants avec notre bibliothèque de 60 livres pour les 3-15 ans." name="description">

    <!-- Favicon -->
    <link href="/asset/img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->

    <!-- Bootstrap -->
    <link href="/asset/css/courscss/bootstrap.min.css" rel="stylesheet">
    <link href="/asset/css/courscss/style.css" rel="stylesheet">
</head>

<body>
@include('partials.header')


<!-- ============================================
     PAGE HERO
     ============================================ -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content animate-scroll">
            <div class="page-hero-label"><i class="fas fa-book-reader"></i> Activité Extrascolaire</div>
            <h1 class="page-hero-title">Donner le goût de <span class="highlight-orange">la lecture</span></h1>
            <p class="page-hero-subtitle">Un accès illimité à 60 livres enfants sur 12 mois. À emprunter, à lire, à rendre, à échanger contre un autre livre.</p>
            <div class="page-hero-badge"><i class="fas fa-child"></i> De la lecture sans limite pour les 3 - 15 ans</div>
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
        <a href="{{ url('/particuliers/cabine') }}">Extrascolaire</a>
        <i class="fas fa-chevron-right"></i>
        <span class="current">Ma cabine à livres</span>
    </div>
</div>

<!-- ============================================
     INTRODUCTION
     ============================================ -->
<section class="intro-section section-padding">
    <div class="container">
        <div class="intro-layout">
            <div class="intro-content animate-scroll">
                <div class="section-label-orange">Notre bibliothèque</div>
                <h2>Des livres et contes pour enfants de <span>3 à 15 ans</span></h2>
                <p class="intro-text">
                    Permet aux enfants un divertissement, un apprentissage et une certaine éducation. Outre l'accès à des livres en libre service, les enfants peuvent être accompagnés par des <strong>conteurs de livres</strong> de MONPROFCHEZMOI.
                </p>
                <p class="intro-text">
                    Ce programme de lecture accompagnée vise à aider les enfants à apprendre à lire et à prendre plaisir à la lecture. Il permet également à votre enfant de se familiariser avec la structure des phrases et d'apprendre à utiliser les mots correctement.
                </p>
                <p class="intro-text">
                    Inscrivez vos enfants dès maintenant afin de les aider à développer <strong>l'amour de la lecture</strong> et à exceller dans leur parcours éducatif.
                </p>
                <a href="#tarifs" class="btn-cta-orange" style="margin-top: 10px;"><i class="fas fa-tag"></i> Voir les formules</a>
            </div>
            <div class="intro-image-wrap animate-scroll">
                <img src="/asset/img/cabine.jpg" alt="Ma cabine à livres">
                <div class="intro-image-badge">
                    <i class="fas fa-book-open"></i> 60+ livres disponibles
                </div>
            </div>
        </div>

        <div class="intro-stats animate-scroll" style="margin-top: 60px;">
            <div class="intro-stat">
                <div class="number">60+</div>
                <div class="label">Livres disponibles</div>
            </div>
            <div class="intro-stat">
                <div class="number">12</div>
                <div class="label">Mois d'abonnement</div>
            </div>
            <div class="intro-stat">
                <div class="number">4</div>
                <div class="label">Tranches d'âge</div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
     AGE TABS & BOOKS
     ============================================ -->
<section class="age-tabs-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Bibliothèque</div>
            <h2 class="section-title-big">Choisissez l'âge de <span style="color: var(--orange);">votre enfant</span></h2>
            <p class="section-subtitle">Des livres adaptés à chaque étape du développement de votre enfant.</p>
        </div>

        <!-- Tabs -->
        <ul class="age-tabs animate-scroll">
            <li class="age-tab active" onclick="showAge('3-5-ans', this)">
                               <i class="fas fa-baby"></i> 3-5 ans
            </li>
            <li class="age-tab" onclick="showAge('6-8-ans', this)">
                <i class="fas fa-child"></i> 6-8 ans
            </li>
            <li class="age-tab" onclick="showAge('9-12-ans', this)">
                <i class="fas fa-user-graduate"></i> 9-12 ans
            </li>
            <li class="age-tab" onclick="showAge('13-15-ans', this)">
                <i class="fas fa-user"></i> 13-15 ans
            </li>
        </ul>

        <!-- 3-5 ans -->
        <section id="3-5-ans" class="age-section active">
            <div class="book-section-header">
                <h3>Histoires pour les enfants de 3 à 5 ans</h3>
                <p>MONPROFCHEZMOI propose une large gamme d'histoires pour les petits et les tout-petits : des contes et classiques, des imagiers, des documentaires, des récits sur les animaux, des comptines et des chansons, ainsi que des histoires de héros.</p>
            </div>
            <div class="book-grid">
                <div class="book-card animate-scroll">
                    <div class="book-card-image">
                        <img loading="lazy" decoding="async" src="/asset/img/fusa.jpg" alt="La princesse Violette">
                        <span class="book-card-age">Dès 3 ans</span>
                    </div>
                    <div class="book-card-content">
                        <h4>La princesse Violette</h4>
                        <p>La princesse Violette souhaite apprendre l'équitation et le combat à l'épée, à l'instar de ses trois frères. Déterminée à ne pas se plier aux traditions, elle voit arriver un mystérieux chevalier sans nom...</p>
                    </div>
                </div>
                <div class="book-card animate-scroll">
                    <div class="book-card-image">
                        <img loading="lazy" decoding="async" src="/asset/img/mys.jpg" alt="Mystère aux Etats-Unis">
                        <span class="book-card-age">3-6 ans</span>
                    </div>
                    <div class="book-card-content">
                        <h4>Mystère aux Etats-Unis</h4>
                        <p>Qui a volé la recette du topsoda ? Le sergent Mac Logan appelle Alex et son suricate Kaki au secours pour retrouver la recette d'une célèbre boisson volée dans l'usine Topsoda.</p>
                    </div>
                </div>
                <div class="book-card animate-scroll">
                    <div class="book-card-image">
                        <img loading="lazy" decoding="async" src="/asset/img/roi.jpg" alt="Le Roi Lion">
                        <span class="book-card-age">Dès 3 ans</span>
                    </div>
                    <div class="book-card-content">
                        <h4>Le Roi Lion</h4>
                        <p>Le lion Mufasa règne sur la Terre des Lions. Son fils Simba devra lui succéder, mais Scar, le frère jaloux, est bien décidé à accéder au trône à sa place avec l'aide des hyènes.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6-8 ans -->
        <section id="6-8-ans" class="age-section">
            <div class="book-section-header">
                <h3>Livres pour enfants de 6 à 8 ans</h3>
                <p>Offrez à votre enfant le plaisir de la lecture grâce à nos livres spécialement conçus pour les jeunes lecteurs. La lecture est une belle occasion de partager des moments riches en émotions tout en favorisant le calme.</p>
            </div>
            <div class="book-grid">
                <div class="book-card animate-scroll">
                    <div class="book-card-image">
                        <img loading="lazy" decoding="async" src="/asset/img/amandine.jpeg" alt="Amandine Malabul">
                        <span class="book-card-age">6-8 ans</span>
                    </div>
                    <div class="book-card-content">
                        <h4>Amandine Malabul</h4>
                        <p>Amandine découvre qu'elle possède des pouvoirs magiques. Entre l'école de sorcellerie, les sorts imprévus et les créatures magiques, elle doit apprendre à maîtriser ses pouvoirs.</p>
                    </div>
                </div>
                <div class="book-card animate-scroll">
                    <div class="book-card-image">
                        <img loading="lazy" decoding="async" src="/asset/img/james.jpeg" alt="Emma James">
                        <span class="book-card-age">Dès 6 ans</span>
                    </div>
                    <div class="book-card-content">
                        <h4>Emma James, espionne</h4>
                        <p>Emma James est une jeune espionne brillante et audacieuse. Elle doit utiliser ses talents pour résoudre des énigmes complexes et déjouer des complots.</p>
                    </div>
                </div>
                <div class="book-card animate-scroll">
                    <div class="book-card-image">
                        <img loading="lazy" decoding="async" src="/asset/img/bibliomys.jpeg" alt="Bibliomystère">
                        <span class="book-card-age">Dès 8 ans</span>
                    </div>
                    <div class="book-card-content">
                        <h4>Bibliomystère</h4>
                        <p>Un groupe d'amis découvre un livre ancien dans une bibliothèque abandonnée. Ils devront résoudre des énigmes et surmonter des obstacles pour percer le mystère.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 9-12 ans -->
        <section id="9-12-ans" class="age-section">
            <div class="book-section-header">
                <h3>Livres pour enfants de 9 à 12 ans</h3>
                <p>Une vaste sélection de livres destinés aux jeunes lecteurs autonomes. Des ouvrages variés avec des thématiques telles que les voyages, l'écologie, la nature et les émotions.</p>
            </div>
            <div class="book-grid">
                <div class="book-card animate-scroll">
                    <div class="book-card-image">
                        <img loading="lazy" decoding="async" src="/asset/img/licorne.jpg" alt="Skandar">
                        <span class="book-card-age">9-12 ans</span>
                    </div>
                    <div class="book-card-content">
                        <h4>Skandar et la licorne</h4>
                        <p>Skandar est passionné par les licornes. Lorsqu'une licorne est volée dans son île, il se lance dans une aventure palpitante pour la retrouver.</p>
                    </div>
                </div>
                <div class="book-card animate-scroll">
                    <div class="book-card-image">
                        <img loading="lazy" decoding="async" src="/asset/img/disparu.jpeg" alt="La Joconde disparue">
                        <span class="book-card-age">Dès 9 ans</span>
                    </div>
                    <div class="book-card-content">
                        <h4>La Joconde disparue</h4>
                        <p>Le célèbre tableau de Léonard de Vinci disparaît mystérieusement du Louvre. Le détective Lucien découvre un complot bien plus vaste qu'il ne l'imaginait.</p>
                    </div>
                </div>
                <div class="book-card animate-scroll">
                    <div class="book-card-image">
                        <img loading="lazy" decoding="async" src="/asset/img/naitre.jpeg" alt="Naître fille">
                        <span class="book-card-age">10-12 ans</span>
                    </div>
                    <div class="book-card-content">
                        <h4>Naître fille</h4>
                        <p>Un récit émouvant qui explore la question de l'identité féminine à travers les yeux de l'auteure Alice Dussutour.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 13-15 ans -->
        <section id="13-15-ans" class="age-section">
            <div class="book-section-header">
                <h3>Livres pour adolescents de 13 à 15 ans</h3>
                <p>Des récits captivants et des thèmes plus profonds pour les jeunes lecteurs : romans d'aventure, science-fiction, thrillers et livres sur les émotions.</p>
            </div>
            <div class="book-grid">
                <div class="book-card animate-scroll">
                    <div class="book-card-image">
                        <img loading="lazy" decoding="async" src="/asset/img/guerre.jpg" alt="La Guerre des Deux Lunes">
                        <span class="book-card-age">13-14 ans</span>
                    </div>
                    <div class="book-card-content">
                        <h4>La Guerre des Deux Lunes</h4>
                        <p>Deux royaumes en guerre pour contrôler un artefact mystérieux. Un groupe de jeunes héros devra surmonter leurs différences pour empêcher la destruction totale.</p>
                    </div>
                </div>
                <div class="book-card animate-scroll">
                    <div class="book-card-image">
                        <img loading="lazy" decoding="async" src="/asset/img/sem.jpeg" alt="Sem">
                        <span class="book-card-age">Dès 15 ans</span>
                    </div>
                    <div class="book-card-content">
                        <h4>Sem</h4>
                        <p>Un jeune aventurier part à la recherche d'un artefact légendaire. Son courage et sa sagesse seront mis à l'épreuve dans une quête épique.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

<!-- ============================================
     TARIFS
     ============================================ -->
<section id="tarifs" class="pricing-section section-padding">
    <div class="container">
        <div class="section-header-center animate-scroll">
            <div class="section-label-orange">Tarification</div>
            <h2 class="section-title-big">Nos <span style="color: var(--orange);">formules</span></h2>
            <p class="section-subtitle">Choisissez la formule adaptée à l'âge et aux besoins de votre enfant.</p>
        </div>

        <div class="pricing-grid">
            <!-- Mini Lecteur -->
            <div class="pricing-card age-3-5 animate-scroll">
                <div class="pricing-card-icon"><i class="fas fa-baby"></i></div>
                <h3>Mini Lecteur</h3>
                <div class="price-tag">3 000 <span style="font-size:1rem; color: var(--gray-600);">FCFA/mois</span></div>
                <div class="price-period">Pour les 3-5 ans</div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> 2 livres à la fois</li>
                    <li><i class="fas fa-check"></i> Échange 2 fois / mois</li>
                    <li><i class="fas fa-check"></i> Retour obligatoire</li>
                </ul>
                <div class="pricing-highlight">👉 4 à 6 livres / mois</div>
                <button class="btn-pricing" onclick="openInscriptionModal('Cabine - Mini Lecteur 3-5 ans', '15000', 'Abonnement 3-5 ans')">
    Choisir cette formule
</button>
            </div>

            <!-- Lecteur Régulier -->
            <div class="pricing-card age-6-8 populaire animate-scroll">
                <div class="pricing-card-icon"><i class="fas fa-child"></i></div>
                <h3>Lecteur Régulier</h3>
                <div class="price-tag">5 000 <span style="font-size:1rem; color: var(--gray-600);">FCFA/mois</span></div>
                <div class="price-period">Pour les 6-8 ans</div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> 3 à 4 livres simultanés</li>
                    <li><i class="fas fa-check"></i> Échange illimité dans le mois</li>
                    <li><i class="fas fa-check"></i> 8 à 12 livres / mois</li>
                    <li><i class="fas fa-check"></i> Accès contes collectifs</li>
                </ul>
                <div class="pricing-highlight">👉 C'est la formule cœur du modèle</div>
                <button class="btn-pricing" onclick="openInscriptionModal('Cabine - Lecteur Regulier 6-8 ans', '25000', 'Abonnement 6-8 ans')">
    Choisir cette formule
</button>
            </div>

            <!-- Grand Lecteur -->
            <div class="pricing-card age-9-12 animate-scroll">
                <div class="pricing-card-icon"><i class="fas fa-user-graduate"></i></div>
                <h3>Grand Lecteur</h3>
                <div class="price-tag">7 500 - 10 000 <span style="font-size:1rem; color: var(--gray-600);">FCFA/mois</span></div>
                <div class="price-period">Pour les 9-12 ans</div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> 5 à 8 livres simultanés</li>
                    <li><i class="fas fa-check"></i> 12 à 20 livres / mois</li>
                    <li><i class="fas fa-check"></i> Priorité sur nouveautés</li>
                    <li><i class="fas fa-check"></i> 1 atelier conte inclus</li>
                </ul>
                <div class="pricing-highlight">👉 Pour enfants très motivés</div>
               <button class="btn-pricing" onclick="openInscriptionModal('Cabine - Grand Lecteur 9-12 ans', '35000', 'Abonnement 9-12 ans')">
    Choisir cette formule
</button>
            </div>

            <!-- Famille -->
            <div class="pricing-card age-13-15 animate-scroll">
                <div class="pricing-card-icon"><i class="fas fa-users"></i></div>
                <h3>Famille</h3>
                <div class="price-tag">10 000 - 15 000 <span style="font-size:1rem; color: var(--gray-600);">FCFA/mois</span></div>
                <div class="price-period">Pour les 13-15 ans / Fratrie</div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> 2 à 3 enfants</li>
                    <li><i class="fas fa-check"></i> 10 à 20 livres total</li>
                    <li><i class="fas fa-check"></i> Suivi lecture global</li>
                    <li><i class="fas fa-check"></i> Ateliers inclus</li>
                </ul>
                <div class="pricing-highlight">👉 Idéal pour les fratries</div>
               <button class="btn-pricing" onclick="openInscriptionModal('Cabine - Famille 13-15 ans', '50000', 'Abonnement Famille')">
    Choisir cette formule
</button>

            </div>
        </div>
    </div>
</section>

<!-- ============================================
     CTA
     ============================================ -->
<section class="cta-section section-padding">
    <div class="container">
        <div class="animate-scroll">
            <h2 class="section-title-big">Prêt à <span style="color: var(--orange);">donner le goût de la lecture</span> ?</h2>
            <p class="section-subtitle">Inscrivez vos enfants dès maintenant et ouvrez-leur les portes d'un univers littéraire riche et passionnant.</p>
           <button class="btn-cta-outline" onclick="openInscriptionModal('Cabine - Mini Lecteur 3-5 ans', '15000', 'Abonnement 3-5 ans')">
    <i class="fas fa-book-reader"></i> Ça m'intéresse
</button>
        </div>
    </div>
</section>

<!-- ============================================
     MODAL D'INSCRIPTION
     ============================================ -->
<div class="modal-inscription-overlay" id="modalInscription">
    <div class="modal-inscription">
        <button class="modal-close" onclick="closeInscriptionModal()"><i class="fas fa-times"></i></button>

        <div class="modal-header">
            <div class="modal-icon"><i class="fas fa-clipboard-check"></i></div>
            <h3>Formulaire d'inscription</h3>
            <p>Remplissez ce formulaire, notre équipe vous contactera rapidement.</p>
        </div>

        <form id="formInscription" onsubmit="submitInscription(event)">
            <!-- Informations du participant -->
            <div class="modal-section">
                <h4><i class="fas fa-user"></i> Informations du participant</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label>Nom complet du parent *</label>
                        <input type="text" name="nom_parent" required placeholder="Ex: KOUAME Jean">
                    </div>
                    <div class="form-group">
                        <label>Nom complet de l'enfant *</label>
                        <input type="text" name="nom_enfant" required placeholder="Ex: KOUAME Marie">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Âge de l'enfant *</label>
                        <input type="number" name="age_enfant" required min="3" max="18" placeholder="Ex: 8">
                    </div>
                    <div class="form-group">
                        <label>Téléphone *</label>
                        <input type="tel" name="telephone" required placeholder="Ex: 01 53 75 15 44">
                    </div>
                </div>
                <div class="form-group">
                    <label>Email (optionnel)</label>
                    <input type="email" name="email" placeholder="Ex: contact@email.com">
                </div>
            </div>

            <!-- Formule choisie -->
            <div class="modal-section">
                <h4><i class="fas fa-bullseye"></i> Formule choisie</h4>
                <div class="form-group">
                    <label>Nom de la formule *</label>
                    <input type="text" name="activite" id="modalActivite" readonly>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Date de début souhaitée</label>
                        <input type="date" name="date_debut">
                    </div>
                    <div class="form-group">
                        <label>Lieu préféré *</label>
                        <div class="radio-group">
                            <label class="radio-label"><input type="radio" name="lieu" value="domicile" checked> <span>À domicile</span></label>
                            <label class="radio-label"><input type="radio" name="lieu" value="en_ligne"> <span>En ligne</span></label>
                            <label class="radio-label"><input type="radio" name="lieu" value="centre"> <span>Au centre</span></label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Disponibilités -->
            <div class="modal-section">
                <h4><i class="fas fa-clock"></i> Disponibilités</h4>
                <div class="form-group">
                    <label>Jours disponibles *</label>
                    <div class="checkbox-days">
                        <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Lundi"> <span>Lundi</span></label>
                        <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Mardi"> <span>Mardi</span></label>
                        <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Mercredi"> <span>Mercredi</span></label>
                        <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Jeudi"> <span>Jeudi</span></label>
                        <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Vendredi"> <span>Vendredi</span></label>
                        <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Samedi"> <span>Samedi</span></label>
                        <label class="day-checkbox"><input type="checkbox" name="jours[]" value="Dimanche"> <span>Dimanche</span></label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Horaire préféré</label>
                    <input type="text" name="horaire" placeholder="Ex: 16h00 - 18h00">
                </div>
            </div>

            <!-- Paiement -->
            <div class="modal-section">
                <h4><i class="fas fa-credit-card"></i> Paiement</h4>

                <div class="frais-reservation">
                    <label class="checkbox-frais">
                        <input type="checkbox" checked disabled>
                        <span><strong>Frais de réservation obligatoires : 10 000 FCFA</strong></span>
                    </label>
                    <p class="frais-desc">Ces frais servent à réserver votre place. L'inscription est validée après paiement.</p>
                </div>

                <div class="form-group">
                    <label>Type de paiement *</label>
                    <div class="radio-group">
                        <label class="radio-label"><input type="radio" name="type_paiement" value="unique" checked> <span>Paiement unique</span></label>
                        <label class="radio-label"><input type="radio" name="type_paiement" value="seance"> <span>Par séance</span></label>
                        <label class="radio-label"><input type="radio" name="type_paiement" value="abonnement"> <span>Abonnement mensuel</span></label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Mode de paiement préféré *</label>
                    <div class="radio-group">
                        <label class="radio-label"><input type="radio" name="mode_paiement" value="mobile_money" checked> <span>Mobile Money</span></label>
                        <label class="radio-label"><input type="radio" name="mode_paiement" value="virement"> <span>Virement bancaire</span></label>
                    </div>
                </div>
            </div>

            <!-- Récapitulatif -->
            <div class="modal-section recap-section">
                <h4><i class="fas fa-receipt"></i> Récapitulatif</h4>
                <div class="recap-box">
                    <div class="recap-line">
                        <span>Formule choisie :</span>
                        <strong id="recapFormule">-</strong>
                    </div>
                    <div class="recap-line">
                        <span>Prix de la formule :</span>
                        <strong id="recapPrix">-</strong>
                    </div>
                    <div class="recap-line highlight">
                        <span>Frais de réservation (à payer maintenant) :</span>
                        <strong>10 000 FCFA</strong>
                    </div>
                    <div class="recap-line">
                        <span>Statut :</span>
                        <span class="status-badge">En attente de confirmation</span>
                    </div>
                </div>
                <div class="info-importante">
                    <i class="fas fa-info-circle"></i>
                    <p>Un message de confirmation vous sera envoyé après validation de votre inscription par notre équipe.</p>
                </div>
            </div>

            <!-- Conditions Générales de Vente -->
            <div class="modal-section cgv-section" style="padding: 16px 20px; background: #fff8f5; border: 1px solid #ffe2d1; border-radius: 12px; margin-bottom: 20px;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px; flex-wrap: wrap; gap: 8px;">
                    <span style="font-weight: 700; font-size: 13px; color: #1E3A5F; display: flex; align-items: center; gap: 8px;">
                        <i class="fas fa-file-pdf" style="color: #e53e3e; font-size: 18px;"></i> Conditions Générales de Vente - Activités Extrascolaires
                    </span>
                    <a href="{{ asset('asset/fichier/CGVAE.pdf') }}" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; gap: 6px; font-size: 12px; color: #FF6B35; font-weight: 700; text-decoration: none; padding: 5px 12px; border: 1.5px solid #FF6B35; border-radius: 20px; background: #fff; transition: all 0.2s ease;">
                        <i class="fas fa-external-link-alt"></i> Lire le PDF
                    </a>
                </div>
                <label style="display: flex; align-items: flex-start; gap: 10px; font-size: 13px; color: #374151; cursor: pointer; margin: 0; line-height: 1.4;">
                    <input type="checkbox" name="accept_cgv" required style="margin-top: 2px; accent-color: #FF6B35; width: 17px; height: 17px; cursor: pointer; flex-shrink: 0;">
                    <span>J'ai lu et j'accepte les <a href="{{ asset('asset/fichier/CGVAE.pdf') }}" target="_blank" rel="noopener noreferrer" style="color: #FF6B35; font-weight: 700; text-decoration: underline;">Conditions Générales de Vente (CGV)</a>.</span>
                </label>
            </div>

            <button type="submit" class="btn-confirm-inscription" id="btnConfirmInscription">
    <i class="fas fa-check-circle"></i> Confirmer l'inscription
</button>
        </form>
    </div>
</div>

<!-- ============================================
     FOOTER
     ============================================ -->
<footer id="contact" class="footer-moderne">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand-moderne">
                <img loading="lazy" decoding="async" src="/asset/img/logo.png" alt="Monprofchezmoi">
                <p>Leader de l'accompagnement éducatif en Côte d'Ivoire. Depuis 2019, nous accompagnons près de 500 familles chaque année avec une approche pédagogique personnalisée et innovante.</p>
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
     SCRIPTS
     ============================================ -->
<script>
// ========== MODAL D'INSCRIPTION ==========
let currentFormule = '';
let currentPrix = '';

function openInscriptionModal(formule, prix, detail) {
    currentFormule = formule;
    currentPrix = prix + ' FCFA (' + detail + ')';

    document.getElementById('modalActivite').value = formule;
    document.getElementById('recapFormule').textContent = formule;
    document.getElementById('recapPrix').textContent = currentPrix;

    document.getElementById('modalInscription').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeInscriptionModal() {
    document.getElementById('modalInscription').classList.remove('active');
    document.body.style.overflow = '';
    resetForm();
}

function resetForm() {
    document.getElementById('formInscription').reset();
    document.getElementById('modalActivite').value = currentFormule;
    document.getElementById('recapFormule').textContent = currentFormule;
    document.getElementById('recapPrix').textContent = currentPrix;
}

// REMPLACER TOUTE LA FONCTION submitInscription PAR :

function submitInscription(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    // Récupérer les jours sélectionnés
    const jours = [];
    document.querySelectorAll('input[name="jours[]"]:checked').forEach(cb => {
        jours.push(cb.value);
    });

    formData.append('jours', JSON.stringify(jours));
    formData.append('formule', currentFormule);
    formData.append('prix_formule', currentPrix);
    formData.append('frais_reservation', '10000');

    const btn = document.querySelector('.btn-confirm-inscription');
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement...';
    }

    // Étape 1 : Créer l'inscription
    fetch('/particuliers/inscription', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        },
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        if (result.success && result.token) {
            // Étape 2 : Redirection vers le système de paiement
            const paymentForm = document.createElement('form');
            paymentForm.method = 'POST';
            paymentForm.action = '/particuliers/payment/initiate';

            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = document.querySelector('meta[name="csrf-token"]')?.content || '';

            const tokenInput = document.createElement('input');
            tokenInput.type = 'hidden';
            tokenInput.name = 'reservation_token';
            tokenInput.value = result.token;

            const typeInput = document.createElement('input');
            typeInput.type = 'hidden';
            typeInput.name = 'type';
            typeInput.value = 'inscription';

            paymentForm.appendChild(csrfInput);
            paymentForm.appendChild(tokenInput);
            paymentForm.appendChild(typeInput);

            document.body.appendChild(paymentForm);
            paymentForm.submit();

        } else {
            alert(result.message || 'Une erreur est survenue.');
            if (btn) {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-check-circle"></i> Confirmer l\'inscription';
            }
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        alert('Erreur de connexion. Veuillez réessayer.');
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-check-circle"></i> Confirmer l\'inscription';
        }
    });
}

function showSuccessMessage() {
    const modal = document.querySelector('.modal-inscription');
    const parentName = document.querySelector('input[name="nom_parent"]')?.value || '';
    const phone = document.querySelector('input[name="telephone"]')?.value || '';

    modal.innerHTML = `
        <div class="modal-success">
            <div class="modal-success-icon"><i class="fas fa-check"></i></div>
            <h3>Inscription envoyée !</h3>
            <p>Merci ${parentName}. Notre équipe vous contactera très prochainement au <strong>${phone}</strong> pour finaliser votre inscription.</p>
            <button class="btn-success-close" onclick="closeInscriptionModal()">Fermer</button>
        </div>
    `;
}

// Fermer le modal en cliquant sur l'overlay
document.getElementById('modalInscription').addEventListener('click', function(e) {
    if (e.target === this) {
        closeInscriptionModal();
    }
});

// Fermer avec Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeInscriptionModal();
    }
});

// ========== ANCIENNE FONCTION (gardée pour compatibilité) ==========
function redirectToContact(part, prix = null) {
    console.log('Ancienne redirection désactivée - utiliser openInscriptionModal()');
}

// ========== SCROLL PROGRESS & NAVBAR ==========
window.addEventListener('scroll', function() {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const progress = document.getElementById('scrollProgress');
    if (progress) {
        progress.style.width = (scrollTop / scrollHeight * 100) + '%';
    }

    const navbar = document.querySelector('.navbar-moderne');
    if (navbar) {
        if (window.scrollY > 50) navbar.classList.add('scrolled');
        else navbar.classList.remove('scrolled');
    }

    const backToTop = document.getElementById('backToTop');
    if (backToTop) {
        if (window.scrollY > 500) backToTop.classList.add('visible');
        else backToTop.classList.remove('visible');
    }
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

// ========== SCROLL ANIMATIONS ==========
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

// ========== SMOOTH SCROLL ==========
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

// ========== AGE TABS ==========
function showAge(ageId, clickedTab) {
    // Hide all sections
    const allSections = document.querySelectorAll('.age-section');
    allSections.forEach(section => {
        section.classList.remove('active');
    });

    // Remove active class from all tabs
    const allTabs = document.querySelectorAll('.age-tab');
    allTabs.forEach(tab => {
        tab.classList.remove('active');
    });

    // Show selected section
    document.getElementById(ageId).classList.add('active');

    // Add active class to clicked tab
    clickedTab.classList.add('active');

    // Re-trigger animations for new section
    document.querySelectorAll('.age-section.active .animate-scroll').forEach(el => {
        el.classList.remove('visible');
        observer.observe(el);
    });
}
</script>

<!-- Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>


