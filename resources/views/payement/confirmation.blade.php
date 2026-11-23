<!-- resources/views/payment/confirmation.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Paiement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body text-center">
                @if(session('error'))
                    <h1 class="text-danger">Paiement Échoué</h1>
                    <p class="lead">{{ session('error') }}</p>
                @else
                    <h1 class="text-success">Paiement Réussi</h1>
                    <p class="lead">Merci, votre paiement a été traité avec succès.</p>
                @endif

                <a href="{{ route('home') }}" class="btn btn-primary mt-3">Retour à l'accueil</a>
            </div>
        </div>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
