<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Formation - Monprofchezmoi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Cours en ligne" name="keywords">
    <meta content="Soutien Scolaire" name="description">

    <!-- Favicon -->
    <link href="asset/img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/asset/css/formationcss/cssform/style.css" rel="stylesheet">
</head>

<body>
@include('partials.header')


        
  <div class="container-fluid page-header" style="margin-bottom: 30px;"> <!-- Réduit la marge de 90px à 30px -->
    <div class="container">
        <h4 class="display-4 text-white text-uppercase" style="font-size: 28px;">{{ $sousFormation->titre ?? 'Toutes les formations' }}</h4>
        
        <div class="d-flex flex-row justify-content-center" style="min-height: 200px"> <!-- Réduit la hauteur minimale de 300px à 200px -->
        </div>

       
    </div>
</div>

</div>

<!-- Courses Start -->
<div class="container-fluid py-3"> <!-- Réduit le padding supérieur et inférieur de 5 à 3 -->
    <div class="container py-3"> <!-- Réduit le padding supérieur et inférieur de 5 à 3 -->
        <div class="text-center mb-4"> <!-- Réduit la marge inférieure de 5 à 4 -->
            <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Formations</h5>
            <h1 style="font-size: 28px;">{{ $sousFormation->titre ?? 'Toutes les Thématiques' }}</h1>
        </div>
        <div class="row">
    @foreach($cours as $cours)
        <div class="col-lg-4 col-md-6 mb-3"> <!-- Réduit la marge inférieure de 4 à 3 -->
            <div class="rounded overflow-hidden mb-2">
                <a href="{{ route('cours', ['id' => $cours->id]) }}">
                </a>
                <div class="bg-secondary p-3"> <!-- Réduit le padding intérieur de 4 à 3 -->

                    <!-- Section pour logo et titre à gauche et à droite -->
                    <div class="d-flex align-items-center mb-2"> <!-- Alignement du contenu sur la même ligne -->
                        
                        <!-- Case pour le logo à gauche -->
                        <div class="logo-container mr-3" style="width: 50px; height: 50px; background-color: white; border-radius: 5px; display: flex; align-items: center; justify-content: center;">
<img src="/asset/img/logo.png" alt="Logo" class="fixed-logo">
                       </div>
                        
<!-- Titre du cours à droite -->
<a class="h6 m-0 custom-course-title" href="{{ route('cours', ['id' => $cours->id]) }}">{{ $cours->titre }}</a>
                    </div>

                    <!-- Informations supplémentaires -->
                    <div class="border-top mt-3 pt-3"> <!-- Réduit la marge supérieure et le padding de 4 à 3 -->
                        <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>{{ $cours->heure }}</small><br>
                        <small class="m-0"><i class="fas fa-map-marker-alt text-primary mr-2"></i>{{ $cours->lieu }}</small><br>
                        <small class="m-0"><i class="fas fa-dollar-sign text-primary mr-2"></i>Nous contacter</small><br>
                        <small class="m-0"><i class="far fa-smile text-primary mr-2"></i>{{ $cours->cible }}</small>

                        <!-- Évaluation et note -->
                        <div class="d-flex justify-content-between mt-2"> <!-- Ajout d'une marge supérieure réduite -->
                            <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small></small></h6>
                        </div>
                    </div>
                     <!-- Ajout du bouton en bas du cadre avec couleur orange -->
                    <div class="text-center mt-3">
                        <a href="{{ route('cours', ['id' => $cours->id]) }}" class="btn btn-block" style="font-weight: bold; border-radius: 30px; background-color: orange; color: white;">Je m’informe gratuitement</a>
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
   <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="index.html" class="navbar-brand">
                            <img src="asset/img/logo.png" alt="" width="150px">                        </a>
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
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="asset/js/formationjs/js/main.js"></script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>

</html>
