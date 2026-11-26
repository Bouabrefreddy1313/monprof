<!-- resources/views/formations/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Ajouter une formation</title>
    <link rel="stylesheet" href="/asset/css/vue.css">
</head>
<body>
@include('partials.header')

    <h1>Ajouter une formation</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('particuliers.formations.store') }}" method="POST">
        @csrf
        <div>
            <label for="titre">Titre de la formation :</label>
            <input type="text" name="titre" id="titre" value="{{ old('titre') }}">
        </div>
        <div>
            <label for="pourquoi">pour quoi :</label>
            <textarea name="pourquoi" id="pourquoi">{{ old('pourquoi') }}</textarea>
        </div>
        <div>
            <label for="qui">qui :</label>
            <textarea name="qui" id="qui">{{ old('qui') }}</textarea>
        </div>
        <div>
            <label for="importance">importance :</label>
            <textarea name="importance" id="importance">{{ old('importance') }}</textarea>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label>Groupe de thématiques :</label>
            <div>
                <label><input type="checkbox" name="categorie[]" value="transversale" {{ in_array('transversale', old('categorie', [])) ? 'checked' : '' }}> Formations transversales</label>
            </div>
            <div>
                <label><input type="checkbox" name="categorie[]" value="metier" {{ in_array('metier', old('categorie', [])) ? 'checked' : '' }}> Formations métiers et techniques</label>
            </div>
        </div>
        <button type="submit">Ajouter la formation</button>
    </form>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>

