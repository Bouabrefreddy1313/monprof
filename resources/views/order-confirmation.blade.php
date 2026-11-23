<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Contact</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('partials.header')

    <div class="container mt-5">
        <div class="alert alert-success text-center">
            <h2>Votre demande a été envoyée avec succès !</h2>
            <p>Un conseiller vous contactera sous peu.</p>
        </div>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>

