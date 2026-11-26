<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Commander un cours - Monprofchezmoi-ci.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta content="Cours en ligne" name="keywords">
    <meta content="Soutien Scolaire" name="description">


    <!-- Favicon -->
    <link href="/asset/img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->

    <link href="/asset/css/courscss/bootstrap.min.css" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="/asset/css/courscss/style.css" rel="stylesheet">
</head>

<body>
@include('partials.header')


<!-- Spinner Start -->

    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Riviera 4 Synacassi 1, Abidjan, Cote d'Ivoire</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+225 01 53 75 15 44</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@monprofchezmoi-ci.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://lc.cx/bI7TWa"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://lc.cx/bRCp37"><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://lc.cx/apXwPN"><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="https://youtube.com/@Monprofchezmoi?si=WSQ8aWFEjLJJvLfO"><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    
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
                        <a href="{{ url('/particuliers/orientation/gauche') }}" class="list-group-item list-group-item-action">Vous êtes lycéen : 2nd , 1ère, Terminale</a>
                        <a href="{{ url('/particuliers/orientation/droite') }}" class="list-group-item list-group-item-action">Vous avez entamé des études supérieures</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Commander le cours: <span class="text-primary">{{ $cours->titre }}</span></h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oups !</strong> Il y a eu un problème avec vos informations :<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    <form action="{{ route('particuliers.order.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control @error('nom') is-invalid @enderror"
               id="nom" name="nom" value="{{ old('nom') }}" placeholder="Votre nom" required>
        @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror"
               id="email" name="email" value="{{ old('email') }}" placeholder="Votre email" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="numero" class="form-label">Numéro</label>
        <input type="text" class="form-control @error('numero') is-invalid @enderror"
               id="numero" name="numero" value="{{ old('numero') }}" placeholder="Votre numéro de téléphone" required>
        @error('numero')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="commune" class="form-label">Commune</label>
        <input type="text" class="form-control @error('commune') is-invalid @enderror"
               id="commune" name="commune" value="{{ old('commune') }}" placeholder="Votre commune" required>
        @error('commune')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cours" class="form-label">Cours</label>
        <input type="text" class="form-control @error('cours') is-invalid @enderror"
               id="cours" name="cours" value="{{ $cours->titre }}" readonly>
        @error('cours')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

   <div class="mb-3">
    <label for="prix" class="form-label">Prix</label>
    <input type="text" class="form-control @error('prix') is-invalid @enderror"
           id="prix" name="prix" value="{{ $cours->prix ?? '' }}" readonly>
    @error('prix')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


    <div class="mb-3">
        <label for="duree" class="form-label">Durée</label>
        <input type="text" class="form-control @error('duree') is-invalid @enderror"
               id="duree" name="duree" value="{{ $cours->heure }}" readonly>
        @error('duree')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="mode_de_formation" class="form-label">Mode de formation</label>
        <select class="form-control @error('mode_de_formation') is-invalid @enderror"
                id="mode_de_formation" name="mode_de_formation" required>
            <option value="" disabled selected>Choisissez un mode de formation</option>
            <option value="En ligne" {{ old('mode_de_formation') == 'En ligne' ? 'selected' : '' }}>En ligne</option>
            <option value="Présentiel" {{ old('mode_de_formation') == 'Présentiel' ? 'selected' : '' }}>En Présentiel</option>
        </select>
        @error('mode_de_formation')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 p-3 rounded" style="background: #FFF5F0; border: 1px solid #FFE0D1;">
        <div class="d-flex align-items-center justify-content-between mb-2 flex-wrap gap-2">
            <span class="fw-bold" style="font-size: 0.9rem; color: #0A1628;">
                <i class="fas fa-file-pdf text-danger me-2"></i> Conditions Générales de Vente (Formations)
            </span>
            <a href="{{ asset('asset/fichier/CGVF.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-warning" style="font-size: 0.8rem; border-radius: 20px;">
                <i class="fas fa-external-link-alt me-1"></i> Lire le PDF
            </a>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="accept_cgv" name="accept_cgv" required style="accent-color: #FF6B35; width: 17px; height: 17px; cursor: pointer;">
            <label class="form-check-label ms-1" for="accept_cgv" style="font-size: 0.88rem; cursor: pointer;">
                J'ai lu et j'accepte les <a href="{{ asset('asset/fichier/CGVF.pdf') }}" target="_blank" rel="noopener noreferrer" class="text-primary text-decoration-underline fw-bold">Conditions Générales de Vente (CGV)</a>.
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100">Valider la commande</button>
</form>

                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


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
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <script src="/lib/wow/wow.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/counterup/counterup.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/asset/js/cours/main.js"></script>
    <script src="/asset/js/main.js"></script>
    <script src="/asset/js/jquery.min.js"></script>
    <script src="/asset/js/popper.js"></script>
    <script src="/asset/js/bootstrap.min.js"></script>
    <script src="/asset/js/main.js"></script>
    <script src="/asset/js/video.js"></script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>

</html>

