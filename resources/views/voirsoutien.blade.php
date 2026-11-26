<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Soutien Scolaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <link rel="stylesheet" href="https://unpkg.com/lucide@latest/font/lucide.css"/>
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --danger: #ef4444;
            --success: #10b981;
            --warning: #f59e0b;
            --text-primary: #111827;
            --text-secondary: #6b7280;
            --bg-primary: #f9fafb;
            --bg-secondary: #ffffff;
            --border: #e5e7eb;
            --shadow: 0 10px 15px -3px rgba(0,0,0,0.05);
            --radius: 16px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', system-ui, sans-serif;
        }

        body {
            background: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.6;
        }

        .dashboard {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* ---------- HEADER ---------- */
        .dashboard-header {
            background: var(--bg-secondary);
            border-radius: var(--radius);
            padding: 2rem;
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
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
        }

        .search-box {
            position: relative;
            width: 100%;
            max-width: 400px;
        }

        .search-box input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--bg-primary);
            transition: var(--transition);
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
        }

        /* ---------- STATS ---------- */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .stat-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            background: var(--bg-secondary);
            border-radius: var(--radius);
            border-left: 5px solid;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .stat-pending { border-left-color: var(--warning); }
        .stat-confirmed { border-left-color: var(--primary); }
        .stat-sold { border-left-color: var(--success); }
        .stat-cancelled { border-left-color: var(--danger); }

        .stat-icon-box {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-pending .stat-icon-box { background: rgba(249, 115, 22, 0.1); color: var(--warning); }
        .stat-confirmed .stat-icon-box { background: rgba(99, 102, 241, 0.1); color: var(--primary); }
        .stat-sold .stat-icon-box { background: rgba(16, 185, 129, 0.1); color: var(--success); }
        .stat-cancelled .stat-icon-box { background: rgba(239, 68, 68, 0.1); color: var(--danger); }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .stat-label {
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        /* ---------- FILTRES ---------- */
        .filter-tabs {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .filter-tab {
            padding: 0.75rem 1.5rem;
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: 12px;
            cursor: pointer;
            font-weight: 500;
            color: var(--text-secondary);
            transition: var(--transition);
        }

        .filter-tab:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .filter-tab.active {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
            box-shadow: 0 4px 14px rgba(99, 102, 241, 0.4);
        }

        /* ---------- LISTE HORIZONTALE (NOUVEAU DESIGN) ---------- */
        .commands-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .command-row {
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .command-row::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            transition: var(--transition);
        }

        .command-row:hover {
            transform: translateX(4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            border-color: var(--primary);
        }

        .command-row[data-status="pending"]::before { background: var(--warning); }
        .command-row[data-status="sold"]::before { background: var(--success); }
        .command-row[data-status="cancelled"]::before { background: var(--danger); }
        .command-row[data-status="confirmed"]::before { background: var(--primary); }

        /* Ligne principale */
        .row-main {
            display: grid;
            grid-template-columns: auto 1fr auto auto;
            align-items: center;
            gap: 1.5rem;
            padding: 1.25rem 1.5rem;
            position: relative;
        }

        /* Badge status en haut à droite */
        .status-top-right {
            position: absolute;
            top: 1rem;
            right: 1rem;
            z-index: 10;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            white-space: nowrap;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .status-pending { background: rgba(249, 115, 22, 0.1); color: var(--warning); }
        .status-confirmed { background: rgba(99, 102, 241, 0.1); color: var(--primary); }
        .status-sold { background: rgba(16, 185, 129, 0.1); color: var(--success); }
        .status-cancelled { background: rgba(239, 68, 68, 0.1); color: var(--danger); }

        /* Section Élève */
        .student-section {
            display: flex;
            align-items: center;
            gap: 1rem;
            min-width: 200px;
        }

        .avatar {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .student-details h3 {
            font-size: 1rem;
            margin-bottom: 0.25rem;
            white-space: nowrap;
        }

        .level-badge {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            background: var(--bg-primary);
            border-radius: 9999px;
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        /* Section Infos Cours */
        .course-info {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .info-pill {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: var(--bg-primary);
            border-radius: 9999px;
            font-size: 0.875rem;
        }

        .info-pill i {
            width: 1rem;
            height: 1rem;
            color: var(--primary);
        }

        .info-pill .label {
            color: var(--text-secondary);
            font-size: 0.75rem;
        }

        .info-pill .value {
            font-weight: 600;
            color: var(--text-primary);
        }

        /* Section Contact */
        .contact-section {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            font-size: 0.875rem;
        }

        .contact-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
            text-decoration: none;
            transition: var(--transition);
            white-space: nowrap;
        }

        .contact-link:hover {
            color: var(--primary);
        }

        .contact-link i {
            width: 1rem;
            height: 1rem;
        }

        /* Section Actions */
        .actions-section {
            display: flex;
            gap: 0.5rem;
            flex-wrap: nowrap;
        }

        .action-btn {
            padding: 0.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            background: transparent;
        }

        .action-btn:hover {
            transform: scale(1.1);
        }

        .btn-sell { color: var(--success); background: rgba(16, 185, 129, 0.1); }
        .btn-sell:hover { background: var(--success); color: white; }

        .btn-cancel { color: var(--warning); background: rgba(249, 115, 22, 0.1); }
        .btn-cancel:hover { background: var(--warning); color: white; }

        .btn-delete { color: var(--danger); background: rgba(239, 68, 68, 0.1); }
        .btn-delete:hover { background: var(--danger); color: white; }

        .btn-comment { color: var(--primary); background: rgba(99, 102, 241, 0.1); }
        .btn-comment:hover { background: var(--primary); color: white; }

        /* Détails expansibles */
        .row-details {
            padding: 0 1.5rem 1.25rem 1.5rem;
            display: none;
            border-top: 1px solid var(--border);
            margin-top: 0;
        }

        .row-details.expanded {
            display: block;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            padding-top: 1rem;
        }

        .detail-box {
            background: var(--bg-primary);
            padding: 1rem;
            border-radius: 12px;
        }

        .detail-box h4 {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .comment-form-row {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .comment-input-row {
            flex: 1;
            padding: 0.5rem 1rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--bg-secondary);
            font-size: 0.875rem;
        }

        .btn-send-small {
            padding: 0.5rem 1rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.875rem;
        }

        /* ---------- BOUTON RETOUR ---------- */
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            margin-top: 2rem;
            transition: var(--transition);
        }

        .btn-back:hover {
            transform: translateX(-4px);
            color: var(--primary-dark);
        }

        /* ---------- VIDE ---------- */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--bg-secondary);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--text-secondary);
            margin-bottom: 1rem;
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 1024px) {
            .row-main {
                grid-template-columns: 1fr 1fr auto;
                gap: 1rem;
                padding-top: 3rem; /* Espace pour le badge */
            }
            
            .student-section { grid-column: 1; }
            .course-info { grid-column: 1 / -1; order: 3; }
            .contact-section { grid-column: 2; }
            .actions-section { grid-column: 3; }
            
            .status-top-right {
                top: 0.75rem;
                right: 0.75rem;
            }
        }

        @media (max-width: 768px) {
            .dashboard {
                padding: 1rem;
            }

            .header-content {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-box {
                width: 100%;
            }

            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .row-main {
                grid-template-columns: 1fr;
                gap: 0.75rem;
                padding-top: 3.5rem;
            }

            .course-info {
                flex-direction: column;
                gap: 0.5rem;
                align-items: flex-start;
            }

            .actions-section {
                justify-content: flex-start;
                width: 100%;
                border-top: 1px solid var(--border);
                padding-top: 0.75rem;
                margin-top: 0.5rem;
            }
            
            .contact-section {
                flex-direction: row;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
@include('partials.header')


<div class="dashboard">
    <!-- ---------- HEADER ---------- -->
    <header class="dashboard-header">
        <div class="header-content">
            <div class="title-group">
                <i data-lucide="book-open" class="header-icon"></i>
                <h1>Dashboard Soutien Scolaire</h1>
            </div>
            <div class="search-box">
                <i data-lucide="search" class="search-icon"></i>
                <input type="text" id="searchInput" placeholder="Rechercher une commande...">
            </div>
        </div>

        <div class="stats-container">
            <div class="stat-card stat-pending">
                <div class="stat-icon-box"><i data-lucide="clock"></i></div>
                <div class="stat-details">
                    <span class="stat-value">{{ $countNonTerminees }}</span>
                    <span class="stat-label">En attente</span>
                </div>
            </div>
            
            <div class="stat-card stat-sold">
                <div class="stat-icon-box"><i data-lucide="check-circle-2"></i></div>
                <div class="stat-details">
                    <span class="stat-value">{{ $countVendus }}</span>
                    <span class="stat-label">Vendues</span>
                </div>
            </div>
            <div class="stat-card stat-cancelled">
                <div class="stat-icon-box"><i data-lucide="x-circle"></i></div>
                <div class="stat-details">
                    <span class="stat-value">{{ $countAnnules }}</span>
                    <span class="stat-label">Annulées</span>
                </div>
            </div>
        </div>
    </header>

    <!-- ---------- FILTRES ---------- -->
    <div class="filter-tabs">
        <button class="filter-tab active" data-filter="pending">En attente</button>
        <button class="filter-tab" data-filter="sold">Vendues</button>
        <button class="filter-tab" data-filter="cancelled">Annulées</button>
        <button class="filter-tab" data-filter="all">Toutes</button>
    </div>

    <!-- ---------- LISTE HORIZONTALE ---------- -->
    <div class="commands-list" id="commandsList">
        @php
            $allCommands = collect($commandesNonTerminees)
                           ->merge($commandesTerminees)
                           ->sortByDesc('created_at');
        @endphp
        @foreach($allCommands as $reponse)
        <div class="command-row"
             data-status="{{
                $reponse->statut == 0 ? 'pending' :
                ($reponse->etat === 'vendu' ? 'sold' :
                ($reponse->etat === 'annule' ? 'cancelled' : 'confirmed'))
             }}"
             data-search="{{ strtolower($reponse->prenom.' '.$reponse->nom.' '.$reponse->email) }}">
            
            <!-- BADGE STATUS EN HAUT À DROITE -->
            <div class="status-top-right">
                @if($reponse->statut == 0)
                    <span class="status-badge status-pending"><i data-lucide="clock"></i> En attente</span>
                @elseif($reponse->etat === 'annule')
                    <span class="status-badge status-cancelled"><i data-lucide="x-circle"></i> Annulé</span>
                @else
                    <span class="status-badge status-sold"><i data-lucide="check-circle-2"></i> Vendu</span>
                @endif
            </div>

            <!-- LIGNE PRINCIPALE -->
            <div class="row-main">
                
                <!-- SECTION ÉLÈVE -->
                <div class="student-section">
                    <div class="info-pill">
                        <i data-lucide="clock"></i>
                        <span class="label">Date</span>
                        <span class="value">{{ $reponse->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="avatar">
                        {{ strtoupper(substr($reponse->prenom,0,1)) }}{{ strtoupper(substr($reponse->nom,0,1)) }}
                    </div>
                    <div class="student-details">
                        <h3>{{ $reponse->prenom }} {{ $reponse->nom }}</h3>
                        <span class="level-badge">{{ $reponse->niveau_scolaire }}</span>
                         <a href="tel:{{ $reponse->telephone }}" class="contact-link">
                        <i data-lucide="phone"></i>
                        <span>{{ $reponse->telephone }}</span>
                    </a>
                     <a href="mailto:{{ $reponse->email }}" class="contact-link" title="{{ $reponse->email }}">
                        <i data-lucide="mail"></i>
                        <span>{{ Str::limit($reponse->email, 20) }}</span>
                    </a>
                    </div>
                </div>

                <!-- SECTION INFOS COURS -->
                <div class="course-info">
                    <div class="info-pill">
                        <i data-lucide="book"></i>
                        <span class="label">Cours</span>
                        <span class="value">{{ Str::limit($reponse->cours, 250) }}</span>
                    </div>
                    <div class="info-pill">
                        <i data-lucide="check-circle"></i>
                        <span class="label">Choix</span>
                        <span class="value">{{ Str::limit($reponse->choix, 150) }}</span>
                    </div>
                    <div class="info-pill">
                        <i data-lucide="calendar"></i>
                        <span class="label">Jour</span>
                        <span class="value">{{ $reponse->jour }}</span>
                    </div>
                    
                </div>

                <!-- SECTION CONTACT -->
               

                <!-- SECTION ACTIONS -->
                <div class="actions-section">
                     <button type="button" class="action-btn btn-comment" onclick="toggleDetails(this)" title="Voir détails">
                        <i data-lucide="message-square"></i>
                    </button>
                    @if($reponse->statut == 0)
                        <form method="POST" action="{{ route('particuliers.reponse.vendu', $reponse->id) }}" style="display:inline;">
                            @csrf @method('PUT')
                            <button type="submit" class="action-btn btn-sell" title="Marquer comme vendu">
                                <i data-lucide="check-circle-2"></i>
                            </button>
                        </form>
                        <form method="POST" action="{{ route('particuliers.reponse.annuler', $reponse->id) }}" style="display:inline;">
                            @csrf @method('PUT')
                            <button type="submit" class="action-btn btn-cancel" title="Annuler">
                                <i data-lucide="x"></i>
                            </button>
                        </form>
                       
                        <form method="POST" action="{{ route('particuliers.reponse.supprimer', $reponse->id) }}"
                              onsubmit="return confirm('Supprimer ?');" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="action-btn btn-delete" title="Supprimer">
                                <i data-lucide="trash-2"></i>
                            </button>
                        </form>
                    @endif
                    
                </div>
            </div>

            <!-- DÉTAILS EXPANSIBLES -->
            <div class="row-details">
                <div class="details-grid">
                    @if($reponse->commentaire)
                    <div class="detail-box">
                        <h4>Commentaire</h4>
                        <p>{{ $reponse->commentaire }}</p>
                    </div>
                    @endif
                    @if($reponse->message)
                    <div class="detail-box">
                        <h4>Message</h4>
                        <p>{{ $reponse->message }}</p>
                    </div>
                    @endif
                    <div class="detail-box" style="grid-column: 1 / -1;">
                        <h4>Ajouter un commentaire</h4>
                        <form action="{{ route('particuliers.ajouterCommentaire', $reponse->id) }}" method="POST">
                            @csrf
                            <div class="comment-form-row">
                                <input type="text" name="commentaire" placeholder="Écrire un commentaire..." class="comment-input-row" required>
                                <button type="submit" class="btn-send-small">
                                    <i data-lucide="send" style="width: 1rem; height: 1rem;"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($allCommands->isEmpty())
        <div class="empty-state">
            <i data-lucide="inbox"></i>
            <h3>Aucune commande</h3>
            <p>Créez votre première commande pour démarrer</p>
        </div>
    @endif

    <a href="{{ url('/particuliers/voirsoutien') }}" class="btn-back"><i data-lucide="arrow-left"></i> Retour</a>
</div>

<!-- ---------- SCRIPTS ---------- -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();

    const searchInput  = document.getElementById('searchInput');
    const filterTabs   = document.querySelectorAll('.filter-tab');
    const commandRows = document.querySelectorAll('.command-row');
    let activeFilter   = 'pending';

    /* ---- onglets ---- */
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            filterTabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            activeFilter = tab.dataset.filter;
            filterRows();
        });
    });

    /* ---- recherche ---- */
    searchInput.addEventListener('input', filterRows);

    /* ---- fonction de filtre ---- */
    function filterRows() {
        const searchTerm = searchInput.value.toLowerCase();
        commandRows.forEach(row => {
            const status = row.dataset.status;
            const searchData = row.dataset.search;
            const matchFilter = activeFilter === 'all' || status === activeFilter;
            const matchSearch = searchData.includes(searchTerm);
            row.style.display = (matchFilter && matchSearch) ? 'flex' : 'none';
        });
    }

    /* ---- toggle détails ---- */
    function toggleDetails(btn) {
        const row = btn.closest('.command-row');
        const details = row.querySelector('.row-details');
        details.classList.toggle('expanded');
        
        const icon = btn.querySelector('i');
        if (details.classList.contains('expanded')) {
            btn.style.background = 'var(--primary)';
            btn.style.color = 'white';
        } else {
            btn.style.background = 'rgba(99, 102, 241, 0.1)';
            btn.style.color = 'var(--primary)';
        }
    }

    /* ---- initialise ---- */
    filterRows();
</script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
