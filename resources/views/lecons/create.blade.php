<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Leçon</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Ajouter une Leçon</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('particuliers.lecons.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="titre">Titre de la Leçon:</label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez le titre de la leçon" required>
                    </div>

                    <div class="form-group">
                        <label for="matiere_id">Matière:</label>
                        <select class="form-control" id="matiere_id" name="matiere_id" required>
                            <option value="" disabled selected>Choisissez une matière</option>
                            @foreach($matieres as $matiere)
                                <option value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="contenu">Contenu:</label>
                        <textarea class="form-control" id="contenu" name="contenu" rows="5" placeholder="Décrivez le contenu de la leçon" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="video">Télécharger la Vidéo:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="video" name="video" accept="video/*" required>
                            <label class="custom-file-label" for="video">Choisissez une vidéo</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Ajouter la Leçon</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Inclure les scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script pour afficher le nom du fichier sélectionné -->
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
