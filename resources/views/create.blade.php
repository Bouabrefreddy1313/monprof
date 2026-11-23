<!-- resources/views/cours/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Ajouter une formation</title>
    <link rel="stylesheet" href="asset/css/vue.css">
</head>
<body>
@include('partials.header')

<form action="{{ route('cours.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf
    <div>
        <label for="titre">Titre du cours :</label>
        <input type="text" name="titre" id="titre">
    </div>
    <div>
        <label for="formation_id">Formation :</label>
        <select name="formation_id" id="formation_id">
            @foreach($formations as $formation)
                <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="sous_formation_id">Sous-formation :</label>
        <select name="sous_formation_id" id="sous_formation_id">
            @foreach($sousFormations as $sousFormation)
                <option value="{{ $sousFormation->id }}">{{ $sousFormation->titre }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="heure">heure :</label>
        <textarea name="heure" id="heure"></textarea>
    </div>
    <div>
        <label for="description">Description :</label>
        <textarea name="description" id="description"></textarea>
    </div>
    <div>
        <label for="lieu">Lieu :</label>
        <input type="text" name="lieu" id="lieu">
    </div>
    <div>
        <label for="prix">Prix :</label>
        <input type="texte" name="prix" id="prix" step="0.01">
    </div>
    <div>
        <label for="programme">Programme :</label>
        <textarea name="programme" id="programme"></textarea>
    </div>
    <div>
        <label for="objectif">Objectif :</label>
        <textarea name="objectif" id="objectif"></textarea>
    </div>
    <div>
    <label for="prerequis">Prérequis :</label>
    <textarea name="prerequis" id="prerequis"></textarea>
</div>

<div>
    <label for="formateur">Formateur :</label>
    <input type="text" name="formateur" id="formateur">
</div>

<div>
    <label for="methodes_pedagogiques">Méthodes pédagogiques :</label>
    <input type="text" name="methodes_pedagogiques" id="methodes_pedagogiques">
</div>

<div>
    <label for="evaluation">Évaluation :</label>
    <input type="text" name="evaluation" id="evaluation">
</div>

    <div>
        <label for="cible">Cible :</label>
        <input type="text" name="cible" id="cible">
    </div>
    <div>
        <label for="image">image :</label>
        <input type="file" name="image" id="image">
    </div>
    <button type="submit">Ajouter le cours</button>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#formation_id').change(function() {
            var formationId = $(this).val();
            $('#sous_formation_id').empty(); // Vider le select des sous-formations

            if (formationId) {
                $.ajax({
                    url: '/getSousFormations/' + formationId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#sous_formation_id').append('<option value="">Sélectionnez une sous-formation</option>');
                        $.each(data, function(key, sousFormation) {
                            $('#sous_formation_id').append('<option value="'+ sousFormation.id +'">'+ sousFormation.titre +'</option>');
                        });
                    }
                });
            }
        });
    });
</script>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>


