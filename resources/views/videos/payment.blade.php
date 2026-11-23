<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Paiement - {{ $video->titre }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="asset/img/favicon.png" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .payment-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
            max-width: 500px;
            width: 100%;
        }
        .btn-geniuspay {
            background: linear-gradient(135deg, #FF6B35, #FF8C5A);
            color: white;
            border: none;
            padding: 16px 32px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        .btn-geniuspay:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(255,107,53,0.4);
            color: white;
        }
    </style>
</head>
<body>
    <div class="payment-card">
        <div class="text-center mb-4">
            <i class="fas fa-lock" style="font-size: 3rem; color: #FF6B35;"></i>
            <h2 class="fw-bold mt-3">Paiement sécurisé</h2>
            <p class="text-muted">Vous allez payer pour accéder à cette vidéo</p>
        </div>

        <div class="bg-light p-3 rounded mb-4">
            <h5 class="fw-bold">{{ $video->titre }}</h5>
            <p class="text-muted small">{{ Str::limit($video->description, 100) }}</p>
            <div class="d-flex justify-content-between">
                <span>Type:</span>
                <span class="badge bg-primary">{{ ucfirst($video->formation_type) }}</span>
            </div>
            <div class="d-flex justify-content-between mt-2">
                <span>Montant:</span>
                <span class="fw-bold text-success">{{ number_format($video->prix) }} FCFA</span>
            </div>
        </div>

        <form action="{{ route('video.init_payment', $video->id) }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <button type="submit" class="btn btn-geniuspay w-100">
                <i class="fas fa-credit-card"></i> Payer avec GeniusPay
            </button>
        </form>

        <p class="text-center text-muted mt-3 small">
            <i class="fas fa-shield-alt"></i> Transaction sécurisée et cryptée
        </p>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
