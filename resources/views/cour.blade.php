<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cours - Monprofchezmoi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <m<meta content="Cours en ligne" name="keywords">
    <meta content="Soutien Scolaire" name="description">


    <!-- Favicon -->
    <link href="/asset/img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Font Awesome -->

    <!-- Libraries Stylesheet -->

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/asset/css/formationcss/cssform/style.css" rel="stylesheet">
</head>

<body>
@include('partials.header')



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
                    <a href="{{ url('/particuliers/bouge') }}" class="list-group-item list-group-item-action">Bouge ta grammaire et ton orthographe</a>
                    <a href="{{ url('/particuliers/codage') }}" class="list-group-item list-group-item-action">Codage informatique pour 8-14 ans</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
        <!-- Navbar End -->

        </div>
    </div>
    <!-- Navbar End -->
<!-- Bannière de la Sous-Formation -->
<div class="container-fluid page-header" style="padding: 20px; min-height: 200px; margin-bottom: 0;">
    @foreach($cours as $cours)
        <h3 class="display-5 text-white text-uppercase">{{ $cours->titre }}</h3>
        <div class="container"></div>
    @endforeach
</div>
<!-- Détail Start -->
<div class="container-fluid py-5" style="padding-top: 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Contenu principal du cours -->
                <div class="mb-5">
                    <h1 style="font-size: 24px;" class="mb-5">Description</h1>
                    <div class="w-100">
                        <p class="text-break">{!! nl2br(e($cours->description)) !!}</p>
                    </div>
                    <hr class="my-4">
                    <h2 style="font-size: 24px;" class="mb-4">Objectif</h2>
                    <div class="w-100">
                        <p class="text-break">{!! nl2br(e($cours->objectif)) !!}</p>
                    </div>
                    <hr class="my-4">
                    <h2 style="font-size: 24px;" class="mb-4">Programme</h2>
                    <div class="w-100">
                        <p class="text-break">{!! nl2br(e($cours->programme)) !!}</p>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ url('/particuliers/contact') }}" class="btn btn-primary">Nous contacter</a>
                </div>
            </div>
            <div class="col-lg-4 sticky-section">
                <div class="mb-5">
                    <div class="card bg-secondary text-white">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-clock text-info mr-2"></i>
                                        <p class="card-text text-dark m-0"><strong>Durée:</strong> {{ $cours->heure }}</p>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-map-marker-alt text-success mr-2"></i>
                                        <p class="card-text text-dark m-0"><strong>Lieu:</strong> {{ $cours->lieu }}</p>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-tag text-warning mr-2"></i>
                                        <p class="card-text text-dark m-0"><strong>Prix:</strong> NOUS CONTACTER</p>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-check text-primary mr-2"></i>
                                        <p class="card-text text-dark m-0"><strong>POINTS FORTS DE LA FORMATION:</strong> Encadrement d’un formateur expérimenté (maîtrise de l’ensemble des niveaux – Initial à Expert)</p>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-certificate text-secondary mr-2"></i>
                                        <p class="card-text text-dark m-0"><strong>CERTIFICATION:</strong> ATTESTATION DE FORMATION</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="rating">
                                        <!-- 4 étoiles pleines -->
                                        <i class="fa fa-star checked"></i>
                                        <i class="fa fa-star checked"></i>
                                        <i class="fa fa-star checked"></i>
                                        <i class="fa fa-star checked"></i>
                                        <!-- 1 étoile à moitié -->
                                        <i class="fa fa-star-half-alt checked"></i>
                                        <span class="text-dark">4.5</span>
                                    </div>
                                    <div class="text-center mt-4">
    <a href="{{ route('particuliers.order.form', ['id' => $cours->id]) }}" class="btn btn-primary" target="_blank">Je commande</a>
</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div> <!-- container-fluid -->
<!-- Détail End -->

<!-- Détail End -->
   <!-- Footer Start -->
   <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="/index.html" class="navbar-brand">
                            <img src="/asset/img/logo.png" alt="" width="150px">                        </a>
                        <p class="mt-3 mb-4">Leader de l’accompagnement éducatif en Côte d’Ivoire, groupe  éducatif expérimenté et innovant, Monprofchezmoi est avant tout  une entreprise à taille humaine, capable de répondre au plus près  de chez vous à chacun de vos besoins.
Depuis 2019, Monprofchezmoi accompagne près de 500 familles  chaque année. Nous avons développé une approche pédagogique  qui permet de prendre en compte les besoins individuels de nos  élèves, avec le souci permanent d’atteindre l’objectif de chacun.
</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control border-white p-3" placeholder="Votre Email">
                                <button class="btn btn-dark">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Contactez-Nous</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">Riviera 4 Synacassi 1, Abidjan, Cote d'Ivoire</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0">info@monprofchezmoi-ci.com</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">+225 01 53 75 15 44</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Nos Liens</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Acceuil</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Soutien</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Formation</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Cours en ligne DCG & DSCG</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Extrascolaire</a>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Liens Populaires</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Formation Anglais</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Musique</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>DCG</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Danse</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Art</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">Monprofchezmoi-ci.com</a>. All Rights Reserved.

						<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
						Designed by <a class="text-white border-bottom" href="">FreeLance ADG</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->




    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="/asset/js/formationjs/js/main.js"></script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>

</html>

