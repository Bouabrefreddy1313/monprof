<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border: none; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .notification-unread {
            border-left: 4px solid #FF6B35;
            background-color: #fff8f5;
        }
        .notification-read {
            border-left: 4px solid #6c757d;
            opacity: 0.8;
        }
        .badge-unread {
            background: #FF6B35;
            color: white;
            font-size: 0.7rem;
            padding: 4px 8px;
            border-radius: 20px;
        }
        .timestamp {
            font-size: 0.8rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>
                <i class="fas fa-bell" style="color: #FF6B35;"></i>
                Notifications
                @if($unreadCount > 0)
                    <span class="badge badge-pill badge-danger ml-2">{{ $unreadCount }} non lue(s)</span>
                @endif
            </h1>
            <div>
                <a href="{{ route('particuliers.admin.dashboard') }}" class="btn btn-outline-secondary mr-2">
                    <i class="fas fa-arrow-left"></i> Dashboard
                </a>
                @if($unreadCount > 0)
                    <form action="{{ route('particuliers.admin.notifications.readAll') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-check-double"></i> Tout marquer comme lu
                        </button>
                    </form>
                @endif
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        <div class="card">
            <div class="card-body p-0">
                @if($notifications->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($notifications as $notification)
                            <div class="list-group-item p-4 {{ $notification->est_non_lue ? 'notification-unread' : 'notification-read' }}">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-center mb-2">
                                            @if($notification->type === 'achat_video')
                                                <i class="fas fa-shopping-cart text-success mr-2"></i>
                                            @elseif($notification->type === 'nouvel_utilisateur')
                                                <i class="fas fa-user-plus text-primary mr-2"></i>
                                            @elseif($notification->type === 'paiement')
                                                <i class="fas fa-credit-card text-info mr-2"></i>
                                            @else
                                                <i class="fas fa-bell text-warning mr-2"></i>
                                            @endif
                                            <strong>{{ $notification->message }}</strong>
                                            @if($notification->est_non_lue)
                                                <span class="badge badge-pill badge-warning ml-2" style="font-size: 0.75rem;">Nouveau</span>
                                            @endif
                                        </div>
                                        <div class="timestamp">
                                            <i class="far fa-clock"></i> {{ $notification->created_at->format('d/m/Y H:i') }}
                                        </div>
                                        @if($notification->data)
                                            <div class="mt-2">
                                                <small class="text-muted">
                                                    @php $data = $notification->data; @endphp
                                                    @if(isset($data['montant']))
                                                        Montant: <strong>{{ number_format($data['montant']) }} FCFA</strong>
                                                    @endif
                                                    @if(isset($data['user_id']))
                                                        · Utilisateur #{{ $data['user_id'] }}
                                                    @endif
                                                    @if(isset($data['video_id']))
                                                        · Vidéo #{{ $data['video_id'] }}
                                                    @endif
                                                </small>
                                            </div>
                                        @endif
                                    </div>
                                    @if($notification->est_non_lue)
                                        <form action="{{ route('particuliers.admin.notifications.read', $notification->id) }}" method="POST" class="ml-3">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-check"></i> Marquer lue
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-muted small ml-3">
                                            <i class="fas fa-check-circle text-success"></i> Lue
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-bell-slash" style="font-size: 4rem; color: #ddd;"></i>
                        <h4 class="mt-3 text-muted">Aucune notification</h4>
                        <p class="text-muted">Vous n'avez aucune notification pour le moment.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
