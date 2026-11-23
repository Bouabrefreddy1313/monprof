<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MONPROFCHEZMOI-CI.COM - cours</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="asset/img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->

    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    @include('partials.responsive-assets')
</head>

<style>
body {
    user-select: none; /* Désactive la sélection de texte */
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}
  /********** Template CSS **********/
:root {
    --primary:#ffa137;
    --secondary: #FF6922;
    --light: #EFFDF5;
    --dark: #0E2E50;
     --accent: #06b6d4;
    --background: #f8fafc;
    --text: #1e293b;
    --transition: 0.3s ease-in-out;
}
html, body {
    font-family: 'Poppins', sans-serif;
    background: var(--background);
    color: var(--text);
    overflow-x: hidden;
    height: 100%;
    margin: 0;
}

/* Navigation Styles */
.nav-container {
    padding: 2rem 0;
    background: linear-gradient(135deg, #fff 0%, #f1f5f9 100%);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.button-group {
    display: flex;
    justify-content: center;
    gap: 1rem;
    padding: 0.5rem;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 1rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.nav-btn {
    position: relative;
    padding: 1rem 2rem;
    border: none;
    background: transparent;
    color: var(--text);
    font-weight: 500;
    font-size: 1.1rem;
    cursor: pointer;
    overflow: hidden;
    transition: var(--transition);
    border-radius: 0.5rem;
}

.nav-btn .btn-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #ffa137;
    opacity: 0;
    transition: var(--transition);
    z-index: 1;
    border-radius: 0.5rem;
}

.nav-btn .btn-text {
    position: relative;
    z-index: 2;
}

.nav-btn:hover .btn-background,
.nav-btn.active .btn-background {
    opacity: 1;
}

.nav-btn:hover .btn-text,
.nav-btn.active .btn-text {
    color: white;
}

/* Content Sections */
.content-section {
    display: none;
    padding: 4rem 0;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.5s ease-out;
}

.content-section.active {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

/* Image Styles */
.image-wrapper {
    position: relative;
    margin-top: -50px; /* Déplace l'image vers le haut */
    padding: 1rem;
}

.image-card {
    position: relative;
    border-radius: 1rem;
    overflow: hidden;
    transform: perspective(1000px) rotateY(0deg);
    transition: transform 0.5s ease-out;
}

.image-card:hover {
    transform: perspective(1000px) rotateY(5deg);
}

.main-image {
    width: 100%;
    height: 500px;
    object-fit: cover;
    transition: transform 0.5s ease-out;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(37, 99, 235, 0.2) 0%, rgba(6, 182, 212, 0.2) 100%);
    opacity: 0;
    transition: var(--transition);
}

.image-card:hover .image-overlay {
    opacity: 1;
}

/* Content Styles */
.content-box {
    padding: 2rem;
    background: white;
    border-radius: 1rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    transform: translateY(0);
    transition: transform 0.3s ease-out;
}

.content-box:hover {
    transform: translateY(-5px);
}

.title-animated {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 2rem;
    background: #ffa137;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: titleAnimation 2s ease-in-out infinite;
}

@keyframes titleAnimation {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-5px);
    }
}

.highlight {
    display: inline-block;
    padding: 0.25rem 1rem;
    background: #ffa137;
    color: white;
    border-radius: 2rem;
    font-weight: 500;
}

.objective-card {
    background: #f8fafc;
    padding: 1.5rem;
    border-radius: 0.5rem;
    margin: 2rem 0;
    border-left: 4px solid #ffa137;
    transition: var(--transition);
}

.service-card:hover, .objective-card:hover {
    transform: translateX(5px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card-title {
    color: #ffa137;
    font-size: 1.25rem;
    margin-bottom: 1rem;
}

.service-card {
    background: #f8fafc;
    padding: 1.5rem;
    border-radius: 0.5rem;
    margin: 2rem 0;
    border-left: 4px solid #ffa137;
    transition: var(--transition);
}

.service-list {
    list-style: none;
    padding: 0;
    margin: 1.5rem 0;
}

.service-item {
    display: flex; /* Flexbox pour aligner les icônes et le texte */
    align-items: center; /* Aligne verticalement les éléments */
    padding: 0.5rem 0;
    font-size: 1rem;
    color: #333;
    border-bottom: 1px solid #e5e7eb; /* Ligne discrète entre les items */
}

.service-item i {
    font-size: 1.5rem; /* Taille des icônes */
    color: #3478f7; /* Couleur des icônes */
    margin-right: 1rem; /* Espacement entre l'icône et le texte */
}

.service-item:last-child {
    border-bottom: none; /* Retire la bordure pour le dernier élément */
}

.service-item:hover i {
    color: #ffa137; /* Change la couleur de l'icône au survol */
}


.highlight-text {
    color: #3478f7;
    font-weight: 500;
}

.accent-text {
    color:  #3478f7;
    font-weight: 500;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 4 colonnes égales */
    gap: 1rem; /* Espacement entre les éléments */
    margin: 1rem 0;
    align-items: center; /* Centrer verticalement le contenu des colonnes */
}

.info-item {
    text-align: center; /* Centrer le texte à l'intérieur de chaque élément */
    padding: 0.5rem; /* Espacement interne */
    background: #f9f9f9; /* Couleur d'arrière-plan légère */
    border-radius: 8px; /* Coins arrondis */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Légère ombre */
    font-size: 0.9rem; /* Taille du texte */
    display: flex;
    flex-direction: column; /* Aligner l'icône et le texte verticalement */
    align-items: center; /* Centrer horizontalement l'icône et le texte */
}

.info-item i {
    font-size: 1.5rem; /* Taille de l'icône */
    color: #3478f7; /* Couleur de l'icône */
    margin-bottom: 0.5rem; /* Espacement sous l'icône */
}



.info-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}



.contact-btn-container {
    display: flex;
    justify-content: center; /* Centre horizontalement */
    align-items: center; /* Centre verticalement */
    height: 10vh; /* Occupe toute la hauteur de la fenêtre */
}

.contact-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 2rem;
    background: #ffa137;
    color: white;
    border: none;
    border-radius: 2rem;
    font-weight: 500;
    cursor: pointer;
    transition: var(--transition);
    box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
}


.contact-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 8px rgba(37, 99, 235, 0.3);
}

.contact-btn i {
    transition: var(--transition);
}

.contact-btn:hover i {
    transform: translateX(5px);
}

.animated-text {
    line-height: 1.8;
    margin-bottom: 2rem;
    opacity: 0;
    animation: fadeIn 1s ease-out forwards;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .button-group {
        flex-direction: column;
    }

    .info-grid {
        grid-template-columns: 1fr;
    }

    .image-wrapper {
        padding: 1rem;
    }

    .main-image {
        height: 300px;
    }

    .title-animated {
        font-size: 2rem;
    }

    .content-box {
        padding: 1.5rem;
    }

    .service-card, .objective-card {
        margin: 1rem 0;
    }
}

.steps-card {
    background: #f8fafc;
    padding: 1.5rem;
    border-radius: 0.5rem;
    margin: 2rem 0;
    border-left: 4px solid var(--secondary);
    transition: var(--transition);
}

.steps-card:hover {
    transform: translateX(5px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.steps-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.steps-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
    padding: 0.5rem;
    border-radius: 0.25rem;
    transition: var(--transition);
}

.steps-item:hover {
    background: rgba(6, 182, 212, 0.1);
}

.steps-item i {
    color: var(--secondary);
    font-size: 1.25rem;
}
#reorientation {
    display: block !important; /* Forcer l'affichage */
}






.animated-text:hover {
    color: #00B98E; /* Change la couleur au survol */
    transition: color 0.3s ease-in-out;
}
/* Navigation Styles */
.nav-container {
    background: var(--white);
    padding: 1rem 0;
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }

  .button-group {
    display: flex;
    justify-content: center;
    gap: 1rem;
  }

  .nav-btn {
    position: relative;
    padding: 0.75rem 1.5rem;
    border: none;
    background: transparent;
    cursor: pointer;
    overflow: hidden;
    transition: var(--transition);
  }

  .btn-text {
    position: relative;
    z-index: 2;
    color: var(--secondary);
    font-weight: 600;
    transition: var(--transition);
  }

  .btn-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #3478f7;
    transform: translateY(100%);
    transition: var(--transition);
  }

  .nav-btn:hover .btn-background,
  .nav-btn.active .btn-background {
    transform: translateY(0);
  }

  .nav-btn:hover .btn-text,
  .nav-btn.active .btn-text {
    color: var(--white);
  }

  @media (max-width: 768px) {
    .button-group {
      flex-direction: column;
      padding: 0 1rem;
    }

    .nav-btn {
      width: 100%;
      text-align: center;
    }
  }
  /* Section Styles */
.content-section {
    display: none;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
  }

  .content-section.active {
    display: block;
    opacity: 1;
  }




/* Par défaut, cacher toutes les sections */
.content-section {
    display: none;
}

/* Quand une section est active, elle est affichée */
.content-section.active {
    display: block;
}


.back-to-top {
    position: fixed;
    display: none;
    right: 45px;
    bottom: 45px;
    z-index: 99;
}


