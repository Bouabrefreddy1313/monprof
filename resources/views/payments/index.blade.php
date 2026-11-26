<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/asset/css/voir.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste des Paiements</title>
</head>
<body>
<style>
body {
    user-select: none; /* Désactive la sélection de texte */
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}
/* Modern Dashboard Styles */
:root {
    --primary: #6366f1;
    --primary-dark: #4f46e5;
    --danger: #ef4444;
    --success: #22c55e;
    --warning: #f59e0b;
    --text-primary: #1f2937;
    --text-secondary: #6b7280;
    --bg-primary: #f3f4f6;
    --bg-secondary: #ffffff;
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
}

/* Base Styles */
body {
    background-color: var(--bg-primary);
    color: var(--text-primary);
    font-family: 'Inter', system-ui, sans-serif;
}

.dashboard {
    max-width: 1440px;
    margin: 0 auto;
    padding: 2rem;
}

/* Header Styles */
.dashboard-header {
    background: var(--bg-secondary);
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-lg);
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.title-group {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.header-icon {
    width: 2.5rem;
    height: 2.5rem;
    color: var(--primary);
    animation: pulse 2s infinite;
}

.header-actions {
    display: flex;
    gap: 1rem;
}

.search-box {
    position: relative;
}

.search-box input {
    width: 300px;
    padding: 0.75rem 1rem 0.75rem 2.5rem;
    border-radius: 0.75rem;
    border: 2px solid #e5e7eb;
    background: var(--bg-secondary);
    transition: all 0.3s ease;
}

.search-icon {
    position: absolute;
    left: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-secondary);
    width: 1.25rem;
    height: 1.25rem;
}

.view-toggle {
    display: flex;
    gap: 0.5rem;
}

.toggle-btn {
    padding: 0.5rem;
    border-radius: 0.5rem;
    border: none;
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
}

.toggle-btn.active {
    background: var(--primary);
    color: white;
}

.stats-bar {
    display: flex;
    gap: 2rem;
    padding-top: 1.5rem;
    border-top: 1px solid #e5e7eb;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.stat-icon {
    width: 2rem;
    height: 2rem;
    color: var(--primary);
}

.stat-info {
    display: flex;
    flex-direction: column;
}

.stat-value {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-primary);
}

.stat-label {
    font-size: 0.875rem;
    color: var(--text-secondary);
}

/* Grid Layout */
.commands-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 1.5rem;
}

/* Card Styles */
.command-card {
    background: var(--bg-secondary);
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.command-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.card-header {
    padding: 1.5rem;
    background: linear-gradient(to right, var(--primary), var(--primary-dark));
    color: white;
}

.student-info {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.avatar {
    width: 3rem;
    height: 3rem;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

.name-group h3 {
    margin: 0;
    font-size: 1.25rem;
}

.level-badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 1rem;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.date-chip {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 2rem;
    font-size: 0.875rem;
}

.card-content {
    padding: 1.5rem;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.info-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.info-icon {
    width: 1.5rem;
    height: 1.5rem;
    color: var(--primary);
    margin-bottom: 0.5rem;
}

.info-label {
    font-size: 0.75rem;
    color: var(--text-secondary);
    margin-bottom: 0.25rem;
}

.info-value {
    font-weight: 500;
}

.info-value.highlight {
    color: var(--primary);
    font-weight: 600;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
}

.contact-link {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-secondary);
    text-decoration: none;
    transition: color 0.3s ease;
}

.contact-link:hover {
    color: var(--primary);
}

.comment-box {
    background: var(--bg-primary);
    padding: 1rem;
    border-radius: 0.75rem;
    display: flex;
    gap: 0.75rem;
    align-items: flex-start;
}

.comment-icon {
    width: 1.25rem;
    height: 1.25rem;
    color: var(--text-secondary);
    flex-shrink: 0;
}

.comment-text {
    margin: 0;
    font-size: 0.875rem;
    color: var(--text-secondary);
}

.card-actions {
    padding: 1.5rem;
    border-top: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.input-with-button {
    display: flex;
    gap: 0.5rem;
    flex: 1;
}

.input-with-button input {
    flex: 1;
    padding: 0.625rem 1rem;
    border-radius: 0.5rem;
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
}

.action-btn {
    padding: 0.625rem;
    border-radius: 0.5rem;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.comment-btn {
    background: var(--primary);
    color: white;
}

.delete-btn {
    background: var(--danger);
    color: white;
}

.btn-icon {
    width: 1.25rem;
    height: 1.25rem;
}

/* Animations */
@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .dashboard {
        padding: 1rem;
    }

    .header-content {
        flex-direction: column;
        gap: 1rem;
    }

    .search-box input {
        width: 100%;
    }

    .stats-bar {
        flex-direction: column;
        gap: 1rem;
    }

    .commands-grid {
        grid-template-columns: 1fr;
    }
}

/* Loading Animation */
.command-card {
    animation: fadeInUp 0.5s ease-out forwards;
    opacity: 0;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
/* Modal Styles */
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    visibility: hidden;
    opacity: 0;
    transition: visibility 0s, opacity 0.2s ease-in-out;
}

.modal-content {
    background: white;
    padding: 20px;
    border-radius: 10px;
    width: 90%;
    max-width: 600px;
    max-height: 80vh;
    overflow-y: auto;
    position: relative;
}

.hidden {
    visibility: hidden;
    opacity: 0;
}

.modal .close-btn {
    position: absolute;
    top: 10px;
    right: 20px;
    font-size: 24px;
    cursor: pointer;
}
/* Grille principale */
/* Grille principale */
.info-grid {
    display: flex;
    justify-content: space-between; /* Sépare uniformément les colonnes */
}

/* Items individuels : Aligner les enfants verticalement */
.info-grid, .info-item, .info-icon, .info-label, .info-value {
    all: unset; /* Supprime tous les styles hérités */
    display: block;
}

/* Réappliquez ensuite vos styles */
.info-item {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}


/* Icônes */
.info-icon {
    font-size: 2rem; /* Taille de l'icône */
    margin-bottom: 0.5rem; /* Espace sous l'icône */
}

/* Labels */
.info-label {
    font-weight: bold;
    font-size: 1rem;
    margin-bottom: 0.2rem; /* Petit espacement */
}

/* Valeurs */
.info-value {
    font-size: 0.9rem;
    color: #333;
}

.button-container {
    display: flex; /* Aligner les éléments horizontalement */
    gap: 10px; /* Espacement entre les boutons */
    align-items: center; /* Centrer verticalement si nécessaire */
}

.button-container form {
    margin: 0; /* Retirer les marges par défaut des formulaires */
}

/* Staggered Animation */
.command-card:nth-child(1) { animation-delay: 0.1s; }
.command-card:nth-child(2) { animation-delay: 0.2s; }
.command-card:nth-child(3) { animation-delay: 0.3s; }
.command-card:nth-child(4) { animation-delay: 0.4s; }
.command-card:nth-child(5) { animation-delay: 0.5s; }

#showTermineesBtn {
    background-color: #007bff; /* Couleur de fond bleue */
    color: #fff; /* Couleur du texte blanche */
    font-size: 16px; /* Taille de la police */
    padding: 12px 24px; /* Espacement autour du texte */
    border-radius: 8px; /* Coins arrondis */
    border: none; /* Supprimer la bordure par défaut */
    cursor: pointer; /* Curseur pointer pour indiquer que c'est cliquable */
    transition: all 0.3s ease; /* Transition douce pour les effets au survol */
    box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3); /* Ombre autour du bouton */
}

#showTermineesBtn:hover {
    background-color: #0056b3; /* Changer la couleur de fond au survol */
    box-shadow: 0 6px 12px rgba(0, 123, 255, 0.4); /* Ombre plus grande au survol */
}

#showTermineesBtn:focus {
    outline: none; /* Enlever le contour au focus */
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.5); /* Ajouter un contour bleu lumineux au focus */
}

#showTermineesBtn:active {
    background-color: #004085; /* Couleur du fond lorsque le bouton est enfoncé */
    transform: scale(0.98); /* Réduire légèrement la taille du bouton lorsqu'il est cliqué */
}

</style>

<header class="dashboard-header">
    <div class="header-content">
        <div class="title-group">
            <i data-lucide="book-open" class="header-icon"></i>
            <h1>Liste des Paiements</h1>
        </div>
        <div class="header-actions">
            <div class="search-box">
                <i data-lucide="search" class="search-icon"></i>
                <input type="text" placeholder="Rechercher des paiements...">
            </div>
        </div>
    </div>
</header>

<div class="dashboard">
    <div class="commands-grid">
        @foreach($payments as $payment)
            <div class="command-card">
                <div class="card-header">
                    <div class="student-info">
                        <div class="avatar">{{ strtoupper(substr($payment->customer_name, 0, 1)) }}{{ strtoupper(substr($payment->customer_surname, 0, 1)) }}</div>
                        <div class="name-group">
                            <h3>{{ $payment->customer_name }} {{ $payment->customer_surname }}</h3>
                        </div>
                    </div>
                    <div class="date-chip">
                        <i data-lucide="calendar" class="chip-icon"></i>
                        {{ $payment->created_at->format('d M Y') }}
                    </div>
                </div>
                
                <div class="card-content">
                    <div>
                        <strong>Montant:</strong> {{ $payment->amount }} {{ $payment->currency }}<br>
                        <strong>Status:</strong> {{ $payment->status }}<br>
                        <strong>Email:</strong> {{ $payment->customer_email }}<br>
                        <strong>Téléphone:</strong> {{ $payment->customer_phone_number }}<br>
                    </div>
                </div>
                <!-- Nouveau bloc pour actions -->
                <div class="card-actions" style="padding: 1rem; border-top: 1px solid #e5e7eb; display: flex; justify-content: flex-end;">
                    <form action="{{ route('particuliers.payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn delete-btn">
                            <i data-lucide="trash-2" class="btn-icon"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>