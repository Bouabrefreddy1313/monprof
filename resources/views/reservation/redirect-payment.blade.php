<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Redirection vers le paiement...</title>
    <meta http-equiv="refresh" content="3;url={{ route('particuliers.reservation.confirmation', ['token' => $token]) }}">
</head>
<body style="font-family: 'Nunito', sans-serif; background: #f8f9fa; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0;">
    <div style="text-align: center; padding: 40px;">
        <div style="width: 50px; height: 50px; border: 4px solid rgba(255,107,53,0.2); border-top-color: #FF6B35; border-radius: 50%; animation: spin 0.8s linear infinite; margin: 0 auto 24px;"></div>
        <style>
            @keyframes spin { to { transform: rotate(360deg); } }
        </style>
        <h2 style="color: #0A1628; font-weight: 700; margin-bottom: 12px;">Préparation du paiement sécurisé</h2>
        <p style="color: #5F6368; font-size: 0.95rem; margin-bottom: 24px;">Vous allez être redirigé vers GeniusPay dans un instant...</p>
        <div id="error-message" style="color: #EF4444; display: none;"></div>
        <a href="{{ route('particuliers.reservation.confirmation', ['token' => $token]) }}" style="color: #FF6B35; text-decoration: none; font-weight: 600;">Cliquez ici si la redirection ne fonctionne pas</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const token = '{{ $token }}';

            // Appeler l'API pour initier le paiement
            fetch('{{ route("particuliers.payment.initiate") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    reservation_token: token,
                    type: 'reservation'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.payment_url) {
                    // Redirection vers GeniusPay
                    window.location.href = data.payment_url;
                } else {
                    document.getElementById('error-message').style.display = 'block';
                    document.getElementById('error-message').textContent = data.message || 'Erreur lors de l\'initialisation du paiement.';
                }
            })
            .catch(error => {
                document.getElementById('error-message').style.display = 'block';
                document.getElementById('error-message').textContent = 'Erreur de connexion. Veuillez réessayer.';
                console.error('Error:', error);
            });
        });
    </script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
