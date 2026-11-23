<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la lecons</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $lecon->titre }}</h1>
        <p>{{ $lecon->description }}</p>

        <!-- Affichage de la vidéo -->
        <video width="600" controls>
            <source src="{{ asset('storage/' . $lecon->video) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
