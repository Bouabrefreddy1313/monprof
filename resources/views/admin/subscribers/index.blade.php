@extends('layouts.admin')

@section('title', 'Abonnés Newsletter')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">📧 Abonnés Newsletter</h1>
        <a href="{{ route('admin.subscribers.campaign') }}" class="btn btn-warning">
            📨 Envoyer une campagne
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <h5>Total</h5>
                    <h2>{{ $total }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h5>Actifs</h5>
                    <h2>{{ $active }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-white">
                <div class="card-body text-center">
                    <h5>Inactifs</h5>
                    <h2>{{ $total - $active }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Nom</th>
                            <th>Statut</th>
                            <th>Inscrit le</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subscribers as $sub)
                        <tr>
                            <td>{{ $sub->id }}</td>
                            <td>{{ $sub->email }}</td>
                            <td>{{ $sub->nom ?? '-' }}</td>
                            <td>
                                @if($sub->is_active)
                                    <span class="badge bg-success">Actif</span>
                                @else
                                    <span class="badge bg-secondary">Inactif</span>
                                @endif
                            </td>
                            <td>{{ $sub->subscribed_at ? $sub->subscribed_at->format('d/m/Y H:i') : '-' }}</td>
                            <td>
                                <form action="{{ route('admin.subscribers.destroy', $sub->id) }}" method="POST"
                                      onsubmit="return confirm('Supprimer cet abonné ?')" style="display:inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="text-center">Aucun abonné</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $subscribers->links() }}
        </div>
    </div>
</div>
@endsection
