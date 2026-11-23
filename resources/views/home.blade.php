@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="mt-4">
                        <h2>Choisissez une catégorie de vidéos :</h2>
                        <button class="btn btn-primary" onclick="initiatePayment(100, 'DSCG')">DSCG</button>
                        <button class="btn btn-primary" onclick="initiatePayment(50, 'DCG')">DCG</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function initiatePayment(amount, category) {
        fetch('/payment/initiate', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ amount: amount, category: category })
        })
        .then(response => response.json())
        .then(data => {
            if (data.payment_url) {
                window.location.href = data.payment_url; // Redirige vers la page de paiement
            } else {
                alert('Erreur lors de l\'initiation du paiement.');
            }
        })
        .catch(error => console.error('Erreur:', error));
    }
</script>
@endsection
