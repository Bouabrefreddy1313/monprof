@extends('layouts.admin')

@section('title', 'Envoyer une campagne email')

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.subscribers.index') }}">Abonnés</a></li>
            <li class="breadcrumb-item active">Campagne</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">📨 Envoyer une campagne email</h1>
        <span class="badge bg-warning fs-6">{{ $total }} abonné(s) actif(s)</span>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.subscribers.send-campaign') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Objet de l'email <span class="text-danger">*</span></label>
                    <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                           value="{{ old('subject') }}" placeholder="Ex: Offre spéciale du mois" required>
                    @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Message <span class="text-danger">*</span></label>
                    <textarea name="message" class="form-control @error('message') is-invalid @enderror"
                              rows="12" placeholder="Écrivez votre message ici..." required>{{ old('message') }}</textarea>
                    @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <div class="form-text">
                        💡 Utilisez du texte simple. Les retours à la ligne seront conservés.
                    </div>
                </div>

                <div class="alert alert-warning">
                    <strong>⚠️ Attention :</strong> Ce message sera envoyé à <strong>{{ $total }} abonné(s)</strong>.
                    Vérifiez bien votre message avant d'envoyer.
                </div>

                <button type="submit" class="btn btn-warning btn-lg" onclick="return confirm('Envoyer cette campagne à {{ $total }} abonné(s) ?')">
                    📨 Envoyer la campagne
                </button>
                <a href="{{ route('admin.subscribers.index') }}" class="btn btn-secondary btn-lg">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection
