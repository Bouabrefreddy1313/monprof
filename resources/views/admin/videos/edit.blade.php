<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la vidéo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
            <div class="navbar-nav ml-auto">
                <a href="{{ route('admin.videos.index') }}" class="btn btn-outline-light btn-sm mr-2">Retour</a>
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="h3 mb-4">Modifier la vidéo</h1>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('admin.videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Titre *</label>
                                <input type="text" name="titre" class="form-control" value="{{ $video->titre }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Type *</label>
                                <select name="formation_type" class="form-control" required>
                                    <option value="dcg" {{ $video->formation_type == 'dcg' ? 'selected' : '' }}>DCG</option>
                                    <option value="dscg" {{ $video->formation_type == 'dscg' ? 'selected' : '' }}>DSCG</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Niveau *</label>
                                <input type="text" name="niveau" class="form-control" value="{{ $video->niveau }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description *</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ $video->description }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Matière</label>
                                <input type="text" name="matiere" class="form-control" value="{{ $video->matiere }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Prix (FCFA) *</label>
                                <input type="number" name="prix" class="form-control" value="{{ $video->prix }}" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Durée</label>
                                <input type="text" name="duree" class="form-control" value="{{ $video->duree }}" placeholder="ex: 45:30">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nouveau fichier vidéo (laisser vide pour garder l'actuelle)</label>
                        <input type="file" name="video" class="form-control-file" accept="video/*">
                        <small class="text-muted">Vidéo actuelle: {{ $video->video_path }}</small>
                    </div>

                    <div class="form-group">
                        <label>Nouvelle image miniature (laisser vide pour garder l'actuelle)</label>
                        <input type="file" name="thumbnail" class="form-control-file" accept="image/*">
                        @if($video->thumbnail)
                            <br><small class="text-muted">Image actuelle: <a href="{{ asset('storage/' . $video->thumbnail) }}" target="_blank">Voir</a></small>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Mettre à jour
                    </button>
                    <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
