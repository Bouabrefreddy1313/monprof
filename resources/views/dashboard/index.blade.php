<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Bienvenue, {{ Auth::user()->name }}</h1>

        <h2>Mes Matières</h2>
        <div class="row">
            @foreach($matieres as $matiere)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $matiere->nom }}</h5>
                            <a href="{{ route('particuliers.lecons.show', ['id' => $matiere->id]) }}" class="btn btn-primary">Voir les lecons</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
