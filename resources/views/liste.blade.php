<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Liste des données</title>
    <style>
        /* Styles CSS pour améliorer l'apparence de la liste */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        select {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .actions {
            display: flex;
            gap: 5px;
        }
        .actions form {
            display: inline;
        }
        .actions button {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 12px;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .btn-edit {
            background-color: #007bff;
            color: white;
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
        .section-actions {
            margin: 20px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .section-actions h3 {
            margin-top: 0;
        }
        .section-actions form {
            display: inline-block;
            margin-right: 10px;
        }
        .section-actions button {
            padding: 8px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 13px;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .edit-form {
            margin: 20px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .edit-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .edit-form input {
            padding: 8px;
            width: 100%;
            max-width: 400px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        .edit-form button {
            padding: 8px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .edit-form button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
@include('partials.header')

<h1>Liste des données</h1>

<form action="{{ route('particuliers.liste') }}" method="GET">
    <label for="formation">Sélectionner une formation :</label>
    <select name="formation" id="formation">
        <option value="">Sélectionner une formation</option>
        @foreach($formations as $formation)
            <option value="{{ $formation->id }}" {{ request('formation') == $formation->id ? 'selected' : '' }}>{{ $formation->titre }}</option>
        @endforeach
    </select>
    <button type="submit">Afficher</button>
</form>

@if($selectedFormation)
    <h2>Sous-formations et cours de la formation {{ $selectedFormation->titre }}</h2>

    <table>
        <thead>
            <tr>
                <th>Sous-formation</th>
                <th>Cours</th>
                <th>Durée</th>
                <th>Prix individuel</th>
                
                <th>Public cible</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($selectedFormation->sousFormations as $sousFormation)
                @forelse($sousFormation->cours as $cours)
                    <tr>
                        <td>{{ $sousFormation->titre }}</td>
                        <td>{{ $cours->titre }}</td>
                        <td>{{ $cours->heure ?: '-' }}</td>
                        <td>
                            @php
                                $prixIndividuel = $cours->prix_individuel ?? $cours->prix ?? null;
                            @endphp
                            {{ $prixIndividuel !== null ? number_format((float) $prixIndividuel, 0, ',', ' ') . ' FCFA' : '-' }}
                        </td>
                        
                        <td>{{ $cours->cible ?: '-' }}</td>
                        <td>
                            <div class="actions">
                                <form action="{{ route('particuliers.cours.destroy', $cours->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>{{ $sousFormation->titre }}</td>
                        <td colspan="6">Aucun cours dans cette sous-formation.</td>
                    </tr>
                @endforelse
            @endforeach
        </tbody>
    </table>

    <!-- Actions sur la formation et les sous-formations -->
    <div class="section-actions">
        <h3>Actions sur la formation</h3>
        <form action="{{ route('particuliers.formations.destroy', $selectedFormation->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">Supprimer la formation</button>
        </form>
        @foreach($selectedFormation->sousFormations as $sousFormation)
            <form action="{{ route('particuliers.sous-formations.destroy', $sousFormation->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-warning">Supprimer Sous-formation : {{ $sousFormation->titre }}</button>
            </form>
        @endforeach
    </div>

    <!-- Formulaire pour modifier la formation -->
    <div class="edit-form">
        <h3>Modifier la formation {{ $selectedFormation->titre }}</h3>
        <form action="{{ route('particuliers.formations.update', $selectedFormation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="titre">Titre de la formation :</label>
            <input type="text" id="titre" name="titre" value="{{ $selectedFormation->titre }}">
            <label>Groupe de thématiques :</label>
            <label><input type="checkbox" name="categorie[]" value="transversale" {{ $selectedFormation->inCategory('transversale') ? 'checked' : '' }}> Formations transversales</label>
            <label><input type="checkbox" name="categorie[]" value="metier" {{ $selectedFormation->inCategory('metier') ? 'checked' : '' }}> Formations métiers et techniques</label>
            <button type="submit">Enregistrer</button>
        </form>
    </div>
@endif

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
