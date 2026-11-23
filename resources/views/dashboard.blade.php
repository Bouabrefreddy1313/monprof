<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
.container {
    background-color: #f8f9fa;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card {
    border: none;
    border-radius: 8px;
}

.card-img-top {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.card-body {
    padding: 15px;
}

.card-title {
    font-weight: bold;
    font-size: 1.25rem;
}

.card-text {
    font-size: 0.9rem;
    color: #6c757d;
}

.alert {
    font-size: 1rem;
}
</style>
<div class="container mt-5">
    <h1 class="text-center mb-4">Mon Dashboard</h1>
    
    <h2 class="text-center mb-4">Vidéos Accédées</h2>
    <div class="row">
        @if(Auth::check())
            @php $payments = Auth::user()->payments; @endphp
            @if($payments->isEmpty())
                <div class="col-12">
                    <div class="alert alert-info text-center" role="alert">
                        Vous n'avez pas encore acheté de vidéos.
                    </div>
                </div>
            @else
                @foreach ($payments as $payment)
                    @if($payment->status === 'completed') <!-- Vérifiez que le paiement est complété -->
                        @foreach ($payment->lecons as $lecon)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('path/to/thumbnail.jpg') }}" class="card-img-top" alt="{{ $lecon->titre }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $lecon->titre }}</h5>
                                        <p class="card-text">{{ $lecon->contenu }}</p>
                                        <video class="w-100" controls>
                                            <source src="{{ Storage::url($lecon->video_url) }}" type="video/mp4">
                                            Votre navigateur ne supporte pas la lecture de vidéo.
                                        </video>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            @endif
        @else
            <div class="col-12">
                <div class="alert alert-warning text-center" role="alert">
                    Veuillez vous connecter pour voir vos vidéos.
                </div>
            </div>
        @endif
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    // Exemple de fonction pour les vidéos
    $('video').on('play', function() {
        // Pause les autres vidéos si une est jouée
        $('video').not(this).each(function() {
            this.pause();
        });
    });
});
</script>