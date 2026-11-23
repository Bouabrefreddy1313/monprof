<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Commandes</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 40px;
            animation: fadeInDown 0.8s ease-out;
        }

        .page-title {
            color: white;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .page-subtitle {
            color: rgba(255,255,255,0.8);
            font-size: 1.1rem;
            font-weight: 300;
        }

        .success-alert {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            border: none;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);
            animation: slideInRight 0.6s ease-out;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out;
            backdrop-filter: blur(10px);
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .table-header {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: white;
        }

        .table-header th {
            padding: 20px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 3px solid #3498db;
            position: relative;
        }

        .table-header th:first-child {
            border-top-left-radius: 20px;
        }

        .table-header th:last-child {
            border-top-right-radius: 20px;
        }

        .table-row {
            transition: all 0.3s ease;
            border-bottom: 1px solid #f0f0f0;
            animation: fadeInRow 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .table-row:hover {
            background: linear-gradient(135deg, #f8f9ff, #e3f2fd);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .table-row td {
            padding: 18px 15px;
            vertical-align: middle;
            border-right: 1px solid #f0f0f0;
        }

        .table-row td:last-child {
            border-right: none;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            animation: pulse 2s infinite;
        }

        .status-pending {
            background: linear-gradient(135deg, #ff9800, #f57c00);
            color: white;
            box-shadow: 0 2px 8px rgba(255, 152, 0, 0.3);
        }

        .status-verified {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            box-shadow: 0 2px 8px rgba(76, 175, 80, 0.3);
        }

        .status-rejected {
            background: linear-gradient(135deg, #f44336, #d32f2f);
            color: white;
            box-shadow: 0 2px 8px rgba(244, 67, 54, 0.3);
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
        }

        .btn-success {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            box-shadow: 0 2px 8px rgba(76, 175, 80, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.4);
        }

        .btn-danger {
            background: linear-gradient(135deg, #f44336, #d32f2f);
            color: white;
            box-shadow: 0 2px 8px rgba(244, 67, 54, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(244, 67, 54, 0.4);
        }

        .amount {
            font-weight: 700;
            color: #2c3e50;
            font-size: 14px;
        }

        .date-time {
            color: #7f8c8d;
            font-size: 13px;
        }

        .voucher-info {
            font-weight: 600;
            color: #3498db;
        }

        .code-unique {
            font-family: 'Courier New', monospace;
            background: #f8f9fa;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            color: #495057;
            border: 1px solid #dee2e6;
        }

        .contact-info {
            color: #6c757d;
            font-size: 13px;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #7f8c8d;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .loading-spinner {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRow {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }
            
            .table-container {
                border-radius: 15px;
            }
            
            .orders-table {
                font-size: 12px;
            }
            
            .table-header th,
            .table-row td {
                padding: 12px 8px;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 4px;
            }
            
            .btn {
                padding: 6px 12px;
                font-size: 11px;
            }
        }
        
        .page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #fff;
    padding: 15px 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}

.page-title {
    font-size: 22px;
    margin: 0;
    color: #333;
}

.page-subtitle {
    margin: 0;
    font-size: 14px;
    color: #777;
}

.header-actions .btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 14px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-primary:hover {
    background-color: #0069d9;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

.success-alert {
    background-color: #d4edda;
    color: #155724;
    padding: 10px 15px;
    border-radius: 6px;
    margin-top: 10px;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
    <div class="header-left">
        <h1 class="page-title">
            <i class="fas fa-clipboard-list"></i>
            Gestion des Commandes
        </h1>
        <p class="page-subtitle">Suivi et validation des commandes de bons</p>
    </div>

    <div class="header-actions">
        <a href="{{ route('vouchers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Ajouter un bon
        </a>

        <a href="{{ route('vouchers.index') }}" class="btn btn-secondary">
            <i class="fas fa-list"></i> Voir la liste des bons
        </a>
    </div>
</div>

@if(session('success'))
    <div class="success-alert">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
@endif


        <div class="table-container">
            <div class="table-wrapper">
                <table class="orders-table">
                    <thead class="table-header">
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-ticket-alt"></i> Bon</th>
                            <th><i class="fas fa-code"></i> Code unique</th>
                            <th><i class="fas fa-money-bill-wave"></i> Montant payé</th>
                            <th><i class="fas fa-phone"></i> Téléphone</th>
                            <th><i class="fas fa-envelope"></i> Email</th>
                            <th><i class="fas fa-flag"></i> Statut</th>
                            <th><i class="fas fa-calendar"></i> Date</th>
                            <th><i class="fas fa-cogs"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($orders as $index => $order)
                        <tr class="table-row" style="animation-delay: {{ $index * 0.1 }}s">
                            <td><strong>{{ $order->id }}</strong></td>
                            <td class="voucher-info">{{ $order->voucher->title ?? 'N/A' }}</td>
                            <td><span class="code-unique">{{ $order->voucher->code ?? 'N/A' }}</span></td>
                            <td class="amount">{{ number_format($order->amount_paid) }} FCFA</td>
                            <td class="contact-info">
                                <i class="fas fa-phone-alt"></i>
                                {{ $order->phone }}
                            </td>
                            <td class="contact-info">
                                <i class="fas fa-at"></i>
                                {{ $order->email ?? 'N/A' }}
                            </td>
                            <td>
                                @if($order->status === 'pending')
                                    <span class="status-badge status-pending">
                                        <i class="fas fa-clock"></i>
                                        En attente
                                    </span>
                                @elseif($order->status === 'verified')
                                    <span class="status-badge status-verified">
                                        <i class="fas fa-check"></i>
                                        Validée
                                    </span>
                                @else
                                    <span class="status-badge status-rejected">
                                        <i class="fas fa-times"></i>
                                        Rejetée
                                    </span>
                                @endif
                            </td>
                            <td class="date-time">
                                <i class="fas fa-calendar-alt"></i>
                                {{ $order->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td>
                                @if($order->status === 'pending')
                                    <div class="action-buttons">
                                        <form action="{{ route('admin.orders.validate', $order) }}" method="POST" class="validate-form">
                                            @csrf
                                            <button class="btn btn-success" type="submit">
                                                <i class="fas fa-check"></i>
                                                Valider
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.orders.reject', $order) }}" method="POST" class="reject-form">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">
                                                <i class="fas fa-times"></i>
                                                Rejeter
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <em style="color: #95a5a6;">
                                        <i class="fas fa-check-double"></i>
                                        Action terminée
                                    </em>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="empty-state">
                                <i class="fas fa-inbox"></i>
                                <h3>Aucune commande trouvée</h3>
                                <p>Il n'y a actuellement aucune commande à afficher.</p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation des lignes du tableau
            const rows = document.querySelectorAll('.table-row');
            rows.forEach((row, index) => {
                setTimeout(() => {
                    row.style.opacity = '1';
                    row.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Gestion des formulaires avec animation de chargement
            const forms = document.querySelectorAll('.validate-form, .reject-form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = this.querySelector('button');
                    const originalText = button.innerHTML;
                    
                    // Animation de chargement
                    button.innerHTML = '<span class="loading-spinner"></span> Traitement...';
                    button.disabled = true;
                    
                    // Simulation du délai (vous pouvez retirer ceci en production)
                    setTimeout(() => {
                        // Le formulaire sera soumis normalement
                    }, 500);
                });
            });

            // Animation au survol des badges de statut
            const badges = document.querySelectorAll('.status-badge');
            badges.forEach(badge => {
                badge.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.1)';
                });
                
                badge.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            });

            // Animation de l'alerte de succès
            const successAlert = document.querySelector('.success-alert');
            if (successAlert) {
                setTimeout(() => {
                    successAlert.style.opacity = '0';
                    successAlert.style.transform = 'translateX(100%)';
                    setTimeout(() => {
                        successAlert.remove();
                    }, 500);
                }, 5000);
            }

            // Effet de parallaxe léger sur le fond
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const parallax = document.body;
                const speed = scrolled * 0.5;
                parallax.style.backgroundPosition = `center ${speed}px`;
            });
        });
    </script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>