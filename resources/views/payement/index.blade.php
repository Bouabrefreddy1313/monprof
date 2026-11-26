<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiements</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Liste des Paiements</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du Client</th>
                    <th>Montant</th>
                    <th>Statut</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
    @foreach($payments as $payment)
        <tr>
            <td>{{ $payment->id }}</td>
            <td>{{ $payment->customer_name }} {{ $payment->customer_surname }}</td>
            <td>{{ $payment->amount }} {{ $payment->currency }}</td>
            <td>{{ $payment->status }}</td>
            <td>{{ $payment->created_at->format('d/m/Y H:i') }}</td>
            <td>
                <form action="{{ route('particuliers.payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
        </table>
    </div>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>