<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Matière</title>
    <!-- Inclure Bootstrap pour un style plus agréable -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Ajouter une Matière</h1>
        <form action="{{ route('particuliers.matieres.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" name="nom" id="nom" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" name="image" id="image" accept="image/*">
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-control" name="type" id="type" required>
                    <option value="">-- Sélectionnez un type --</option>
                    <option value="DCG">DCG</option>
                    <option value="DSCG">DSCG</option>
                </select>
            </div>
               <!-- Ajout du sélecteur pour l'administrateur -->
               <div class="form-group">
                <label for="admin_id">Administrateur:</label>
                <select class="form-control" name="admin_id" id="admin_id" required>
                    <option value="">-- Sélectionnez un administrateur --</option>
                    @foreach($admins as $admin)
                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="prix">Prix:</label>
                <input type="number" step="0.01" class="form-control" name="prix" id="prix" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <!-- Inclure les scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
