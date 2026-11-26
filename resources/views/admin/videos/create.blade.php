<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une vidéo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('particuliers.admin.dashboard') }}">Admin Dashboard</a>
            <div class="navbar-nav ml-auto">
                <a href="{{ route('particuliers.admin.videos.index') }}" class="btn btn-outline-light btn-sm mr-2">Retour</a>
                <form action="{{ route('particuliers.admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="h3 mb-4">Ajouter une vidéo DCG/DSCG</h1>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('particuliers.admin.videos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Titre *</label>
                                <input type="text" name="titre" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Type *</label>
                                <select name="formation_type" class="form-control" required>
                                    <option value="dcg">DCG</option>
                                    <option value="dscg">DSCG</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Niveau *</label>
                                <input type="text" name="niveau" class="form-control" placeholder="ex: 1" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description *</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Matière</label>
                                <input type="text" name="matiere" class="form-control" placeholder="ex: Comptabilité">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Prix (FCFA) *</label>
                                <input type="number" name="prix" class="form-control" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Durée</label>
                                <input type="text" name="duree" class="form-control" placeholder="ex: 45:30">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Fichier vidéo * (MP4 - max 200MB)</label>
                        <input type="file" name="video" class="form-control-file" accept="video/*" required>
                    </div>

                    <div class="form-group">
                        <label>Image miniature (optionnelle)</label>
                        <input type="file" name="thumbnail" class="form-control-file" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                    <a href="{{ route('particuliers.admin.videos.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
