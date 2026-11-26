<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Leçons de {{ $matiere->nom }}</title>
 <!-- Favicon -->
 <link href="/asset/img/favicon.png" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="/asset/css/formationcss/cssform/style.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar Start -->
<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="d-flex align-items-center justify-content-between bg-secondary w-100 text-decoration-none" data-toggle="collapse" href="#navbar-vertical" style="height: 67px; padding: 0 30px;">
                <h5 class="text-primary m-0"><i class="fa fa-book-open mr-2"></i>MONPROFCHEZMOI</h5>
            </a>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0"><span class="text-primary">MONPROF</span>CHEZMOI</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav py-0">
                        <a href="{{ url('/particuliers') }}" class="nav-item nav-link">Accueil</a>
                        <a href="{{ url('/particuliers/reponse') }}" class="nav-item nav-link">Soutien</a>
                        <a href="{{ url('/particuliers/formations') }}" class="nav-item nav-link">Formation</a>
                        <a href="{{ url('/particuliers/groupe') }}" class="nav-item nav-link">Cours en ligne DCG & DSCG</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Extrascolaire</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orientationModal">Orientation</a>
                                <li><a class="dropdown-item" href="{{ url('/particuliers/reussir') }}">Reussir mes oraux</a></li>
                                <li><a class="dropdown-item" href="{{ url('/particuliers/coaching') }}">Coaching scolaire</a></li>
                                <li><a class="dropdown-item" href="{{ url('/particuliers/musique') }}">Cours de musique et de chant</a></li>
                                <li><a class="dropdown-item" href="{{ url('/particuliers/sportif') }}">Coaching sportif à domicile</a></li>
                            </div>
                        </div>
                    </div>
                    @auth
                        <div class="d-flex align-items-center ms-auto">
                            <span class="me-3">{{ Auth::user()->name }}</span>
                            <a href="{{ route('particuliers.logout') }}" class="btn btn-outline-primary btn-sm py-1 px-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                            <form id="logout-form" action="{{ route('particuliers.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @else
                        <a class="btn btn-primary py-2 px-4 ms-auto d-none d-lg-block" href="{{ url('/particuliers/login') }}">Connexion</a>
                    @endauth
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->




<!-- Courses Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">MATIERE</h5>
            <h1>{{ $matiere->nom }}</h1>
            <a href="{{ route('particuliers.order.matiere', $matiere->id) }}" class="btn btn-primary btn-lg mt-4">Souscrire à la matière</a>
        </div>
        <div class="row">
            @foreach ($lecons as $index => $lecon)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="rounded overflow-hidden mb-2">
                        @if($index == 0)
                            <video width="320" height="240" controls>
                                <source src="{{ Storage::url($lecon->video_url) }}" type="video/mp4">
                                Votre navigateur ne supporte pas la lecture de vidéo.
                            </video>
                        @else
                            <div class="locked-video" style="position: relative;">
                                <video width="320" height="240" style="opacity: 0.5;">
                                    <source src="{{ Storage::url($lecon->video_url) }}" type="video/mp4">
                                    Votre navigateur ne supporte pas la lecture de vidéo.
                                </video>
                                <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); color: white; display: flex; align-items: center; justify-content: center;">
                                    <p>Cette leçon est verrouillée. Veuillez vous abonner.</p>
                                </div>
                            </div>
                        @endif

                        <div class="bg-secondary p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>25 Students</small>
                                <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>01h 30m</small>
                            </div>
                            <a class="h5" href="">{{ $lecon->titre }}</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                    <h5 class="m-0">{{ $lecon->contenu }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Courses End -->





    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                    <img src="/asset/img/logo.png" alt="" width="150px">                        </a>
                    
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


<!-- JavaScript -->
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let videos = document.querySelectorAll('video');

        // Désactiver tous les lecteurs de vidéo sauf le premier
        videos.forEach((video, index) => {
            if (index !== 0) {
                video.addEventListener('click', function(e) {
                    e.preventDefault();
                    alert("Cette leçon est verrouillée. Veillez vous abonnez.");
                });
            }
        });
    });
</script>
@endsection
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="/assset/mail/jqBootstrapValidation.min.js"></script>
    <script src="/assset/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/asset/js/main.js"></script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
