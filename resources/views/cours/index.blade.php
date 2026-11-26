<div class="container">
    <h2>Liste des cours</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Formation</th>
                <th>Sous-formation</th>
                <th>Formateur</th>
                <th>Prérequis</th>
                <th>Durée</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cours as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->titre }}</td>
                    <td>{{ $c->formation->titre ?? '-' }}</td>
                    <td>{{ $c->sousFormation->titre ?? '-' }}</td>
                    <td>{{ $c->formateur ?? '-' }}</td>
                    <td>{{ $c->prerequis ?? '-' }}</td>
                    <td>{{ $c->heure ?? '-' }}</td>
                    <td>{{ $c->prix !== null && $c->prix !== '' ? number_format((float)$c->prix, 0, ',', ' ') . ' XOF' : '-' }}</td>
                    <td>
                        <a href="{{ route('particuliers.cours.edit', $c->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
