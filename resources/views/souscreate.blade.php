<!-- resources/views/sous_formations/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Ajouter une sous-formation</title>
    
    <link rel="stylesheet" href="asset/css/vue.css">
</head>
<body>
@include('partials.header')

    <h1>Ajouter une sous-formation</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sous_formations.store') }}" method="POST">
        @csrf
        <div>
            <label for="titre">Titre de la sous-formation :</label>
            <input type="text" name="titre" id="titre" value="{{ old('titre') }}">
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label for="formation_id">Formation :</label>
            <select name="formation_id" id="formation_id">
                @foreach($formations as $formation)
                    <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Ajouter la sous-formation</button>
    </form>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>

