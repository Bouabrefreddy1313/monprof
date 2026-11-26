<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Gestion des inscriptions - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --orange: #FF6B35;
            --orange-dark: #E85A2B;
            --blue: #0A1628;
            --blue-light: #1E3A5F;
            --white: #FFFFFF;
            --gray-50: #F8F9FA;
            --gray-100: #F1F3F4;
            --gray-200: #E8EAED;
            --gray-400: #9AA0A6;
            --gray-600: #5F6368;
            --gray-800: #3C4043;
            --green: #22c55e;
            --yellow: #f59e0b;
            --red: #ef4444;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Nunito', sans-serif; background: var(--gray-50); color: var(--gray-800); }

        /* Header */
        .admin-header {
            background: linear-gradient(135deg, var(--blue), var(--blue-light));
            padding: 30px;
            color: white;
        }
        .admin-header h1 { font-size: 1.8rem; font-weight: 800; }
        .admin-header p { opacity: 0.8; margin-top: 5px; }

        /* Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 30px;
            margin-top: -20px;
        }
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(10,22,40,0.06);
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .stat-icon {
            width: 50px; height: 50px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.3rem;
        }
        .stat-icon.blue { background: rgba(59,130,246,0.1); color: #3B82F6; }
        .stat-icon.orange { background: rgba(255,107,53,0.1); color: var(--orange); }
        .stat-icon.green { background: rgba(34,197,94,0.1); color: var(--green); }
        .stat-icon.yellow { background: rgba(245,158,11,0.1); color: var(--yellow); }
        .stat-value { font-size: 1.8rem; font-weight: 800; color: var(--blue); }
        .stat-label { font-size: 0.85rem; color: var(--gray-600); }

        /* Table */
        .content-area { padding: 0 30px 30px; }
        .table-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(10,22,40,0.06);
            overflow: hidden;
        }
        .table-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--gray-100);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .table-header h2 { font-size: 1.1rem; color: var(--blue); }
        .filter-btn {
            padding: 8px 16px;
            border-radius: 8px;
            border: 1px solid var(--gray-200);
            background: white;
            font-family: 'Nunito', sans-serif;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        .filter-btn:hover, .filter-btn.active {
            background: var(--orange);
            color: white;
            border-color: var(--orange);
        }

        table { width: 100%; border-collapse: collapse; }
        th {
            background: var(--gray-50);
            padding: 14px 20px;
            text-align: left;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--gray-600);
        }
        td {
            padding: 16px 20px;
            border-bottom: 1px solid var(--gray-100);
            font-size: 0.9rem;
        }
        tr:hover { background: var(--gray-50); }
        tr:last-child td { border-bottom: none; }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .badge-en_attente { background: rgba(245,158,11,0.1); color: var(--yellow); }
        .badge-contacte { background: rgba(59,130,246,0.1); color: #3B82F6; }
        .badge-confirme { background: rgba(34,197,94,0.1); color: var(--green); }
        .badge-annule { background: rgba(239,68,68,0.1); color: var(--red); }

        .actions { display: flex; gap: 8px; }
        .btn-action {
            width: 32px; height: 32px;
            border-radius: 8px;
            border: none;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            font-size: 0.8rem;
            transition: all 0.2s;
        }
        .btn-view { background: rgba(59,130,246,0.1); color: #3B82F6; }
        .btn-view:hover { background: #3B82F6; color: white; }
        .btn-contact { background: rgba(255,107,53,0.1); color: var(--orange); }
        .btn-contact:hover { background: var(--orange); color: white; }
        .btn-confirm { background: rgba(34,197,94,0.1); color: var(--green); }
        .btn-confirm:hover { background: var(--green); color: white; }
        .btn-cancel { background: rgba(239,68,68,0.1); color: var(--red); }
        .btn-cancel:hover { background: var(--red); color: white; }

        .parent-name { font-weight: 700; color: var(--blue); }
        .child-info { font-size: 0.85rem; color: var(--gray-600); }
        .phone { color: var(--orange); font-weight: 600; }

        .pagination {
            padding: 20px 24px;
            border-top: 1px solid var(--gray-100);
            display: flex;
            justify-content: center;
        }
        .pagination a, .pagination span {
            padding: 8px 14px;
            margin: 0 4px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.9rem;
            color: var(--gray-600);
        }
        .pagination a:hover { background: var(--gray-100); }
        .pagination .active { background: var(--orange); color: white; }

        .alert {
            padding: 16px 24px;
            border-radius: 12px;
            margin: 0 30px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .alert-success { background: rgba(34,197,94,0.1); color: var(--green); }
        .alert i { font-size: 1.2rem; }

        @media (max-width: 991px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            table { display: block; overflow-x: auto; }
        }
        @media (max-width: 767px) {
            .stats-grid { grid-template-columns: 1fr; padding: 20px; }
            .content-area { padding: 0 20px 20px; }
        }
    </style>
</head>
<body>

<div class="admin-header">
    <h1><i class="fas fa-clipboard-list"></i> Gestion des inscriptions</h1>
    <p>Tableau de bord des inscriptions au soutien scolaire</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue"><i class="fas fa-users"></i></div>
        <div>
            <div class="stat-value">{{ $stats['total'] }}</div>
            <div class="stat-label">Total inscriptions</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon orange"><i class="fas fa-clock"></i></div>
        <div>
            <div class="stat-value">{{ $stats['en_attente'] }}</div>
            <div class="stat-label">En attente</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon yellow"><i class="fas fa-phone"></i></div>
        <div>
            <div class="stat-value">{{ $stats['contactes'] }}</div>
            <div class="stat-label">Contactés</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-check-circle"></i></div>
        <div>
            <div class="stat-value">{{ $stats['confirmes'] }}</div>
            <div class="stat-label">Confirmés</div>
        </div>
    </div>
</div>

<div class="content-area">
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="table-card">
        <div class="table-header">
            <h2><i class="fas fa-list"></i> Liste des inscriptions</h2>
            <div>
                <a href="{{ route('particuliers.admin.inscriptions.index') }}" class="filter-btn {{ !request('statut') ? 'active' : '' }}">Tous</a>
                <a href="?statut=en_attente" class="filter-btn {{ request('statut') == 'en_attente' ? 'active' : '' }}">En attente</a>
                <a href="?statut=contacte" class="filter-btn {{ request('statut') == 'contacte' ? 'active' : '' }}">Contactés</a>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Parent / Enfant</th>
                    <th>Contact</th>
                    <th>Activité</th>
                    <th>Frais</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inscriptions as $inscription)
                <tr>
                    <td>
                        <div class="parent-name">{{ $inscription->nom_parent }}</div>
                        <div class="child-info">{{ $inscription->nom_enfant }}, {{ $inscription->age_enfant }} ans</div>
                    </td>
                    <td>
                        <div class="phone"><i class="fas fa-phone"></i> {{ $inscription->telephone }}</div>
                        @if($inscription->email)
                            <div class="child-info">{{ $inscription->email }}</div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $inscription->activite }}</strong>
                        <div class="child-info">{{ $inscription->lieu_label }}</div>
                    </td>
                    <td>
                        <strong>{{ number_format($inscription->frais_reservation, 0, ',', ' ') }} FCFA</strong>
                        <div class="child-info">{{ $inscription->type_paiement_label }}</div>
                    </td>
                    <td>
                        {{ $inscription->created_at->format('d/m/Y') }}
                        <div class="child-info">{{ $inscription->created_at->format('H:i') }}</div>
                    </td>
                    <td>
                        <span class="badge badge-{{ $inscription->statut }}">
                            <i class="fas fa-circle" style="font-size: 6px;"></i>
                            {{ $inscription->statut_label }}
                        </span>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('particuliers.admin.inscriptions.show', $inscription) }}" class="btn-action btn-view" title="Voir détails"><i class="fas fa-eye"></i></a>

                            @if($inscription->statut == 'en_attente')
                                <form action="{{ route('particuliers.admin.inscriptions.contacte', $inscription) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn-action btn-contact" title="Marquer comme contacté"><i class="fas fa-phone"></i></button>
                                </form>
                            @endif

                            @if($inscription->statut == 'contacte')
                                <form action="{{ route('particuliers.admin.inscriptions.confirme', $inscription) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn-action btn-confirm" title="Confirmer"><i class="fas fa-check"></i></button>
                                </form>
                            @endif

                            @if(!in_array($inscription->statut, ['annule']))
                                <form action="{{ route('particuliers.admin.inscriptions.annuler', $inscription) }}" method="POST" style="display:inline;" onsubmit="return confirm('Annuler cette inscription ?')">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn-action btn-cancel" title="Annuler"><i class="fas fa-times"></i></button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 40px; color: var(--gray-400);">
                        <i class="fas fa-inbox" style="font-size: 2rem; margin-bottom: 10px; display: block;"></i>
                        Aucune inscription trouvée
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">
            {{ $inscriptions->links() }}
        </div>
    </div>
</div>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
