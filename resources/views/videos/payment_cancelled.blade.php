<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Paiement annulé</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Nunito', sans-serif; background: #f8f9fa; min-height: 100vh; display: flex; align-items: center; }
        .cancel-card { background: white; border-radius: 20px; padding: 50px; box-shadow: 0 20px 60px rgba(0,0,0,0.1); text-align: center; max-width: 500px; margin: 0 auto; }
        .cancel-icon { width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, #EF4444, #DC2626); display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 2.5rem; }
    </style>
</head>
<body>
    <div class="container">
        <div class="cancel-card">
            <div class="cancel-icon"><i class="fas fa-times"></i></div>
            <h2 class="fw-bold mb-3">Paiement annulé</h2>
            <p class="text-muted mb-4">Le paiement a été annulé ou a échoué. Vous pouvez réessayer.</p>
            <a href="{{ url('/particuliers/groupe') }}" class="btn btn-primary btn-lg w-100">
                <i class="fas fa-video"></i> Retour aux formations
            </a>
        </div>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
