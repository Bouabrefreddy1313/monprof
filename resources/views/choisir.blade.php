<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Accueil</title>
    <link rel="stylesheet" href="asset/css/choisir.css">
</head>
<body>
@include('partials.header')

    <h1>Bienvenue sur la page d'accueil</h1>

    <div>
        <a href="{{ url ('/formcreate') }}"><button>Ajouter une formation</button></a>
        <a href="{{ url ('/create') }}"><button>Ajouter un cours</button></a>
        <a href="{{ url ('/souscreate') }}"><button>Ajouter une sous-formation</button></a>
        <a href="{{ url ('/liste') }}"><button>voir les ajouts</button></a>
        <a href="{{ url ('/cours') }}"><button>mettre a jour lcourses </button></a>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>

