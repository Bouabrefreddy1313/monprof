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
    <link href="asset/style.css" rel="stylesheet">
</head>

<body>
@include('partials.header')

             <!-- Orientation Modal -->
    <div class="modal fade" id="orientationModal" tabindex="-1" aria-labelledby="orientationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orientationModalLabel">Orientation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="list-group">
                        <a href="{{ url('/terminale')  }}" class="list-group-item list-group-item-action">Vous êtes lycéen : 2nd , 1ère, Terminale</a>
                        <a href="{{url('/superieur') }}" class="list-group-item list-group-item-action">Vous avez entamé des études supérieures</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>  
        </div>
        
         <!-- Vacances Scolaires Modal -->
<div class="modal fade" id="vacancesScolairesModal" tabindex="-1" aria-labelledby="vacancesScolairesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vacancesScolairesModalLabel">Vacances Scolaires</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    <a href="{{ url('/bouge') }}" class="list-group-item list-group-item-action">Bouge ta grammaire et ton orthographe</a>
                    <a href="{{ url('/codage') }}" class="list-group-item list-group-item-action">Codage informatique pour 8-14 ans</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
        <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><br>Vous avez entamé des <span class="text-primary">études supérieures?</h1>
                    
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="asset/img/tl.jpg" alt="">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
<!-- Accompagnement pour une réorientation Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img loading="lazy" decoding="async" class="img-fluid w-100" src="asset/img/SUP.jpg" alt="Image">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn text-content" data-wow-delay="0.5s">
                <h1 class="mb-4">Accompagnement pour une <span class="highlight">réorientation</span></h1>
                <p class="mb-4 animated-text animate__animated animate__fadeInUp">
                    Notre accompagnement pour une réorientation professionnelle ou académique commence par une analyse détaillée de votre parcours jusqu'à présent. Nous examinons les choix que vous avez faits, les motivations et les objectifs qui les ont guidés, ainsi que les enseignements que vous en avez retirés. Nous cherchons à comprendre ce qui vous pousse à vouloir changer de voie et quelles sont vos attentes pour ce nouveau départ.
                </p>
                <p class="mb-4 animate__animated animate__fadeInUp">
                    Notre accompagnement personnalisé pour une réorientation se déroule en <span class="important-text">7 étapes clés :</span>
                </p>
                <ol class="steps-list animate__animated animate__fadeInUp">
                    <li>Nous effectuons un bilan de votre parcours académique ou professionnel précédent.</li>
                    <li>Nous vous aidons à mieux vous connaître en identifiant vos attentes, vos intérêts, vos motivations et vos aptitudes.</li>
                    <li>Nous vous aidons à mieux vous connaître en identifiant vos attentes, vos centres d'intérêt, vos motivations et vos compétences.</li>
                    <li>Nous vous aidons également à définir votre emploi idéal en explorant les domaines d'activité professionnelle pertinents pour votre profil.</li>
                    <li>Nous validons ensemble un projet professionnel réaliste et réalisable, et identifions les formations les plus adaptées à votre projet et à votre dossier.</li>
                </ol>
                <p class="animate__animated animate__fadeInUp">
                    Objectif : Réorientation, recherche de Master, changement d’établissement, départ à l’étranger
                </p>
                <p class="mb-4 animate__animated animate__fadeInUp">
                    "Nous vous aidons à définir un nouveau projet professionnel ou académique et à élaborer la meilleure stratégie pour le réaliser. Nous vous accompagnons dans la recherche d'informations sur les formations disponibles en Côte d'Ivoire et à l'étranger, ainsi que sur les procédures d'accès. Nous vous assistons également dans la préparation de dossiers d'admission pour des études à l'étranger, notamment au <span class="important-text">Canada, en France</span>, ou dans d'autres pays, et dans des établissements tels que des universités, des écoles de commerce, ou des instituts d'études politiques. Enfin, nous vous préparons aux tests d'admission tels que le <span class="important-text">TOEFL, l'IELTS, le GMAT ou le GRE</span> pour maximiser vos chances de réussite.
                </p>
                <p class="animate__animated animate__fadeInUp">
                    Durée : Notre coaching d'orientation est organisé en séances individuelles d'une heure, espacées de deux semaines. En moyenne, <span class="important-text">cinq séances</span> sont suffisantes pour atteindre l'objectif visé.
                </p>
                <p class="animate__animated animate__fadeInUp">
                    À l'issue de notre coaching d'orientation, nous organiserons un échange avec les parents pour leur présenter le projet d'orientation identifié par l'élève. Nous leur remettrons également un dossier personnel complet présentant les métiers sélectionnés par l'élève et les formations associées.
                </p>
                <p class="animate__animated animate__fadeInUp">
                    <i class="fas fa-dollar-sign"></i> Tarif : <span class="important-text">Nous contacter</span>
                </p>
                <div class="col">
            <button id="terminale-btn" class="btn btn-lg btn-custom btn-inactive" onclick="redirectToContact('superieur')">Je commande</button>
        </div>                    </div>
        </div>
    </div>
</div>
<!-- Accompagnement pour une réorientation End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                    <img loading="lazy" decoding="async" src="asset/img/logo.png" alt="" width="150px">                        </a>
                    
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Riviera 4 Synacassi 1, Abidjan, Cote d'Ivoire</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+225 01 53 75 15 44</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@monprofchezmoi-ci.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Acceuil</a><br>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Soutien</a><br>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Formation</a><br>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Cours en ligne DCG & DSCG</a><br>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Extrascolaire</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Liens Populaires</h5>
                        <div class="row g-2 pt-2">
                        <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Formation Anglais</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Musique</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>DCG</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Danse</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Art</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p></p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">Monprofchezmoi-ci.com</a>. All Rights Reserved.

<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
Designed by <a class="text-white border-bottom" href="">FreeLance ADG</a></p>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script>
function redirectToContact(part) {
    // Redirige vers la page de contact avec le paramètre 'part'
    window.location.href = '/contact?part=' + encodeURIComponent(part);
}
</script>
 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="asset/form/lib/wow/wow.min.js"></script>
    <script src="asset/form/lib/easing/easing.min.js"></script>
    <script src="asset/form/lib/waypoints/waypoints.min.js"></script>
    <script src="asset/form/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="asset/form/lib/wow/wow.min.js"></script>
    <script src="asset/form/lib/easing/easing.min.js"></script>
    <script src="asset/form/lib/waypoints/waypoints.min.js"></script>
    <script src="asset/form/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="asset/main.js"></script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>

</html>
