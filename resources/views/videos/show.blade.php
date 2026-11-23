<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>{{ $video->titre }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="asset/img/favicon.png" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: #0A1628;
            min-height: 100vh;
        }
        .video-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        .video-wrapper {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            background: #000;
        }
        .video-wrapper video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .video-info {
            padding: 30px;
        }
        .badge-premium {
            background: linear-gradient(135deg, #FF6B35, #FF8C5A);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
        }
        .btn-acheter {
            background: linear-gradient(135deg, #FF6B35, #FF8C5A);
            color: white;
            border: none;
            padding: 16px 32px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        .btn-acheter:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(255,107,53,0.4);
            color: white;
        }
        .lock-icon {
            font-size: 4rem;
            color: #FF6B35;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <a href="{{ url('/groupe') }}" class="btn btn-outline-light mb-4">
            <i class="fas fa-arrow-left"></i> Retour aux formations
        </a>

        <div class="video-container">
            <div class="video-wrapper">
                @if($hasAccess)
                    <video controls autoplay>
                        <source src="{{ route('video.stream', $video->id) }}" type="video/mp4">
                        Votre navigateur ne supporte pas la lecture vidéo.
                    </video>
                @else
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="text-center text-white">
                            <i class="fas fa-lock lock-icon"></i>
                            <h3 class="mt-3">Vidéo verrouillée</h3>
                            <p>Achetez cette vidéo pour y accéder</p>
                        </div>
                    </div>
                @endif
            </div>

            <div class="video-info">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge badge-premium">
                        {{ ucfirst($video->formation_type) }} - Niveau {{ $video->niveau ?? '1' }}
                    </span>
                    @if($hasAccess)
                        <span class="badge bg-success">
                            <i class="fas fa-check"></i> Accès accordé
                        </span>
                    @endif
                </div>

                <h2 class="fw-bold mb-3">{{ $video->titre }}</h2>
                <p class="text-muted mb-4">{{ $video->description }}</p>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <span class="text-muted">
                        <i class="fas fa-clock"></i> Durée: {{ $video->duree ?? '45:00' }}
                    </span>
                    <span class="badge bg-success fs-6">
                        {{ number_format($video->prix) }} FCFA
                    </span>
                </div>

                @if(!$hasAccess)
                    <form action="{{ route('video.init_payment', $video->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <button type="submit" class="btn btn-acheter w-100">
                            <i class="fas fa-shopping-cart"></i> Acheter cette vidéo
                        </button>
                    </form>
                    <p class="text-center text-muted mt-3 small">
                        <i class="fas fa-lock"></i> Paiement sécurisé via GeniusPay
                    </p>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
