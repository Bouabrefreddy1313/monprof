<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des vidéos DCG/DSCG</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
            <div class="navbar-nav ml-auto">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm mr-2">Accueil</a>
                <a href="{{ route('admin.notifications.index') }}" class="btn btn-outline-warning btn-sm mr-2 position-relative">
                    <i class="fas fa-bell"></i> Notifications
                    @php $notifCount = \App\Models\Notification::unread()->count(); @endphp
                    @if($notifCount > 0)
                        <span class="badge badge-pill badge-danger position-absolute" style="top: -8px; right: -8px; font-size: 0.7rem;">
                            {{ $notifCount }}
                        </span>
                    @endif
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Gestion des vidéos</h1>
            <a href="{{ route('admin.videos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Ajouter une vidéo
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Type</th>
                                <th>Niveau</th>
                                <th>Matière</th>
                                <th>Ordre</th>
                                <th>Prix (FCFA)</th>
                                <th>Durée</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($videos as $video)
                            <tr>
                                <td>{{ $video->id }}</td>
                                <td>{{ $video->titre }}</td>
                                <td><span class="badge badge-{{ $video->formation_type == 'dcg' ? 'primary' : 'success' }}">{{ strtoupper($video->formation_type) }}</span></td>
                                <td>{{ $video->niveau ?? '-' }}</td>
                                <td>{{ $video->matiere ?? '-' }}</td>
                                <td>{{ $video->ordre }}</td>
                                <td>{{ number_format($video->prix) }}</td>
                                <td>{{ $video->duree ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
