<div class="container">
    <h2>Modifier le cours : {{ $cours->titre }}</h2>

    <form action="{{ route('cours.update', $cours->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="prerequis">Prérequis</label>
            <textarea name="prerequis" class="form-control">{{ old('prerequis', $cours->prerequis) }}</textarea>
        </div>

        <div class="form-group">
            <label for="formateur">Formateur</label>
            <input type="text" name="formateur" class="form-control" 
                   value="{{ old('formateur', $cours->formateur) }}">
        </div>

        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" step="0.01" name="prix" class="form-control" 
                   value="{{ old('prix', $cours->prix) }}">
        </div>

        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</div>
