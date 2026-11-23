<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta content="Cours en ligne" name="keywords">
    <meta content="Soutien Scolaire" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

<link rel="stylesheet" href="asset/js/nav/icomoon/style.css">

<link rel="stylesheet" href="asset/js/nav/owl.carousel.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="asset/js/nav/bootstrap.min.css">

    <title>Soutien scolaire - Monprofchezmoi</title>
    <!-- css file link-->
    <link rel="stylesheet" href="asset/js/soutien/index.css">
    <!-- Favicon -->
    <link href="asset/img/favicon.png" rel="icon">
</head>
<body>
@include('partials.header')

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
          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
           
    </header>

   <!-- Carrousel -->
<div class="carousel">
    <div class="carousel-images">
        <div class="carousel-image" style="background-image: url('/asset/img/bb.jpeg');"></div>
        <div class="carousel-image" style="background-image: url('/asset/img/bibi.jpeg');"></div>
        <div class="carousel-image" style="background-image: url('/asset/img/bobo.jpeg');"></div>
    </div>
    <div class="carousel-text">
        <h1>COURS À DOMICILE, EN CENTRE OU EN LIGNE, TROUVONS ENSEMBLE LA MEILLEURE SOLUTION EN FONCTION DE VOS OBJECTIFS.</h1>
        <p>Vous cherchez un meilleur accompagnement pour votre enfant ? MONPROFCHEZMOI, c'est du 100% sur mesure.</p>
        <a href="#chatbot" class="btn btn-warning">commencer le tchat</a>
    </div>
</div>



<div class="chat-container" id="chatbot">
        <div id="status-bar">
            
            
        </div>
        <div id="chat-box">
            
        </div>
        <div class="footer">
            <span>Nous sommes à votre écoute au 01 53 75 15 44</span>
        </div>
    </div>
    <script src="asset/js/soutien/index.js"></script> 
    <script src="asset/js/nav/jquery-3.3.1.min.js"></script>
    <script src="asset/js/nav/popper.min.js"></script>
    <script src="asset/js/nav/bootstrap.min.js"></script>
    <script src="asset/js/nav/jquery.sticky.js"></script>
    <script src="asset/js/nav/main.js"></script>
    <script src="asset/js/nav/defile.js"></script>
    @include('components.chatbot')
    @include('components.newsletter-popup')
</body>
</html>
