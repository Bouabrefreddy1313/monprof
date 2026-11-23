<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la commande</title>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <style>
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            margin: 2rem 0;
        }
        
        .info-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #007bff;
        }
        
        .info-icon {
            margin-right: 0.75rem;
            color: #007bff;
            width: 20px;
            height: 20px;
        }
        
        .info-label {
            font-weight: 600;
            margin-right: 0.5rem;
            color: #495057;
        }
        
        .info-value {
            color: #212529;
            flex: 1;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #212529;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 class="card-title">Informations de la commande</h2>
            
            <div class="info-grid">
                <div class="info-item">
                    <i data-lucide="user" class="info-icon"></i>
                    <span class="info-label">Nom :</span>
                    <span class="info-value">{{ $order->nom ?? '-' }}</span>
                </div>
                
                <div class="info-item">
                    <i data-lucide="mail" class="info-icon"></i>
                    <span class="info-label">Email :</span>
                    <span class="info-value">{{ $order->email ?? '-' }}</span>
                </div>
                
                <div class="info-item">
                    <i data-lucide="phone" class="info-icon"></i>
                    <span class="info-label">Numéro :</span>
                    <span class="info-value">{{ $order->numero ?? '-' }}</span>
                </div>
                
                <div class="info-item">
                    <i data-lucide="map-pin" class="info-icon"></i>
                    <span class="info-label">Commune :</span>
                    <span class="info-value">{{ $order->commune ?? '-' }}</span>
                </div>
            </div>
        </div>

        @if($order->coursRelation)
        <div class="card">
            <h2 class="card-title">Informations du cours</h2>
            
            <div class="info-grid">
                <div class="info-item">
                    <i data-lucide="book" class="info-icon"></i>
                    <span class="info-label">Cours :</span>
                    <span class="info-value">{{ $order->coursRelation->titre ?? '-' }}</span>
                </div>
                
                <div class="info-item">
                    <i data-lucide="map-pin" class="info-icon"></i>
                    <span class="info-label">Lieu :</span>
                    <span class="info-value">{{ $order->coursRelation->lieu ?? '-' }}</span>
                </div>

                <div class="info-item">
                    <i data-lucide="clock" class="info-icon"></i>
                    <span class="info-label">Heure :</span>
                    <span class="info-value">{{ $order->coursRelation->heure ?? '-' }}</span>
                </div>

                <div class="info-item">
                    <i data-lucide="timer" class="info-icon"></i>
                    <span class="info-label">Durée :</span>
                    <span class="info-value">{{ $order->coursRelation->duree ?? '-' }}</span>
                </div>

                @if($order->coursRelation->sousFormation)
                <div class="info-item">
                    <i data-lucide="layers" class="info-icon"></i>
                    <span class="info-label">Sous-Formation :</span>
                    <span class="info-value">{{ $order->coursRelation->sousFormation->titre ?? '-' }}</span>
                </div>

                @if($order->coursRelation->sousFormation->formation)
                <div class="info-item">
                    <i data-lucide="award" class="info-icon"></i>
                    <span class="info-label">Formation :</span>
                    <span class="info-value">{{ $order->coursRelation->sousFormation->formation->titre ?? '-' }}</span>
                </div>
                @endif
                @endif
            </div>
        </div>
        @else
        <div class="card">
            <p>Aucun cours associé à cette commande.</p>
        </div>
        @endif
    </div>

    <script>
        lucide.createIcons();
    </script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>