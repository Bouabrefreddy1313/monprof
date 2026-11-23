<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnostics & Leads — Admin MonProfChezMoi</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('asset/img/favicon.png') }}" rel="icon">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    :root {
        --orange: #FF6B35;
        --orange-dark: #E85A2B;
        --orange-light: #FF8C5A;
        --blue: #0A1628;
        --blue-light: #1E3A5F;
        --blue-accent: #3B82F6;
        --white: #FFFFFF;
        --cream: #FAFBFC;
        --gray-50: #F8F9FA;
        --gray-100: #F1F3F4;
        --gray-200: #E8EAED;
        --gray-400: #9AA0A6;
        --gray-600: #5F6368;
        --gray-800: #3C4043;
        --success: #10B981;
        --danger: #EF4444;
        --warning: #F59E0B;
        --shadow-sm: 0 2px 8px rgba(10,22,40,0.06);
        --shadow-md: 0 8px 24px rgba(10,22,40,0.1);
        --shadow-orange: 0 8px 32px rgba(255,107,53,0.25);
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
        font-family: 'Nunito', sans-serif;
        color: var(--gray-800);
        background: linear-gradient(135deg, var(--cream) 0%, #eef2f7 100%);
        min-height: 100vh;
    }
    .dashboard-wrapper { display: flex; min-height: 100vh; }
    .sidebar {
        width: 280px;
        background: linear-gradient(180deg, var(--blue) 0%, var(--blue-light) 100%);
        position: fixed;
        top: 0; left: 0;
        height: 100vh;
        z-index: 1000;
        overflow-y: auto;
    }
    .sidebar-brand {
        padding: 26px 24px;
        display: flex;
        align-items: center;
        gap: 12px;
        border-bottom: 1px solid rgba(255,255,255,0.08);
    }
    .sidebar-brand img { height: 42px; filter: brightness(0) invert(1); }
    .sidebar-brand span { font-weight: 800; font-size: 1.2rem; color: white; }
    .sidebar-nav { padding: 20px 16px; list-style: none; }
    .sidebar-nav-item { margin-bottom: 4px; }
    .sidebar-nav-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        border-radius: 12px;
        color: rgba(255,255,255,0.7);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.92rem;
        transition: all 0.25s ease;
    }
    .sidebar-nav-link:hover, .sidebar-nav-link.active {
        background: rgba(255,255,255,0.1);
        color: white;
    }
    .sidebar-nav-link.active {
        background: rgba(255,107,53,0.2);
        color: #ffffff;
        border-left: 3px solid var(--orange);
    }
    .sidebar-nav-link i { width: 22px; text-align: center; }
    .badge-count {
        margin-left: auto;
        background: var(--orange);
        color: white;
        padding: 2px 10px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 700;
    }

    .main-content {
        margin-left: 280px;
        flex: 1;
        padding: 30px;
    }
    .topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: white;
        padding: 20px 28px;
        border-radius: 16px;
        box-shadow: var(--shadow-sm);
        margin-bottom: 25px;
    }
    .topbar h1 {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--blue);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Stats Grid */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 16px;
        margin-bottom: 24px;
    }
    .stat-box {
        background: white;
        border-radius: 16px;
        padding: 18px 22px;
        box-shadow: var(--shadow-sm);
        display: flex;
        align-items: center;
        justify-content: space-between;
        text-decoration: none;
        color: inherit;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .stat-box:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
    }
    .stat-val { font-size: 1.6rem; font-weight: 800; color: var(--blue); line-height: 1; }
    .stat-lbl { font-size: 0.82rem; color: var(--gray-600); font-weight: 600; margin-top: 4px; }
    .stat-icon {
        width: 44px; height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }
    .stat-box.nouveau .stat-icon { background: #FEE2E2; color: #EF4444; }
    .stat-box.contacte .stat-icon { background: #DBEAFE; color: #3B82F6; }
    .stat-box.en_discussion .stat-icon { background: #FEF3C7; color: #F59E0B; }
    .stat-box.converti .stat-icon { background: #D1FAE5; color: #10B981; }

    /* Filters card */
    .filter-card {
        background: white;
        border-radius: 16px;
        padding: 20px 24px;
        box-shadow: var(--shadow-sm);
        margin-bottom: 24px;
    }

    /* Table */
    .table-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        box-shadow: var(--shadow-sm);
    }
    .table-moderne {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }
    .table-moderne th {
        background: #F8F9FA;
        color: var(--gray-600);
        font-size: 0.82rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 14px 16px;
        border-bottom: 2px solid var(--gray-200);
    }
    .table-moderne td {
        padding: 16px;
        border-bottom: 1px solid var(--gray-100);
        font-size: 0.9rem;
        vertical-align: middle;
    }
    .table-moderne tr:hover td {
        background: #FFFBF9;
    }

    /* Badges */
    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 0.78rem;
        font-weight: 700;
    }
    .badge-status.nouveau { background: #FEE2E2; color: #991B1B; }
    .badge-status.contacte { background: #DBEAFE; color: #1E40AF; }
    .badge-status.en_discussion { background: #FEF3C7; color: #92400E; }
    .badge-status.converti { background: #D1FAE5; color: #065F46; }
    .badge-status.perdu { background: #F1F3F4; color: #5F6368; }

    .btn-act-call {
        background: #3B82F6;
        color: white;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.82rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .btn-act-call:hover { background: #2563EB; color: white; }

    .btn-act-wa {
        background: #25D366;
        color: white;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.82rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .btn-act-wa:hover { background: #1EBE5D; color: white; }

    .btn-view-dossier {
        background: var(--orange);
        color: white;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 0.82rem;
        font-weight: 700;
        text-decoration: none;
    }
    .btn-view-dossier:hover { background: var(--orange-dark); color: white; }

    @media (max-width: 991px) {
        .sidebar { transform: translateX(-100%); }
        .main-content { margin-left: 0; padding: 16px; }
    }
    </style>
</head>
<body>

<div class="dashboard-wrapper">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('asset/img/logo.png') }}" alt="Monprofchezmoi">
            <span>ADMIN</span>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-nav-item">
                <a href="{{ url('/') }}" class="sidebar-nav-link">
                    <i class="fas fa-home"></i> <span>Accueil Site</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-nav-link">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard Ventes</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('admin.leads.index') }}" class="sidebar-nav-link active">
                    <i class="fas fa-funnel-dollar"></i> <span>Diagnostics & Leads</span>
                    @if($counts['nouveau'] > 0)
                        <span class="badge-count">{{ $counts['nouveau'] }}</span>
                    @endif
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('admin.notifications.index') }}" class="sidebar-nav-link">
                    <i class="fas fa-bell"></i> <span>Notifications</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ url('/voircours') }}" class="sidebar-nav-link">
                    <i class="fas fa-book"></i> <span>Cours & Formations</span>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <h1><i class="fas fa-funnel-dollar text-warning"></i> Gestion des Leads & Diagnostics</h1>
            <div>
                <a href="{{ route('admin.leads.export', request()->query()) }}" class="btn btn-outline-secondary btn-sm me-2">
                    <i class="fas fa-file-csv me-1"></i> Exporter CSV
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Quick Stats -->
        <div class="stats-row">
            <a href="{{ route('admin.leads.index') }}" class="stat-box">
                <div>
                    <div class="stat-val">{{ $counts['total'] }}</div>
                    <div class="stat-lbl">Total Leads</div>
                </div>
                <div class="stat-icon bg-light text-dark"><i class="fas fa-users"></i></div>
            </a>
            <a href="{{ route('admin.leads.index', ['statut' => 'nouveau']) }}" class="stat-box nouveau">
                <div>
                    <div class="stat-val text-danger">{{ $counts['nouveau'] }}</div>
                    <div class="stat-lbl">Nouveaux à traiter</div>
                </div>
                <div class="stat-icon"><i class="fas fa-bolt"></i></div>
            </a>
            <a href="{{ route('admin.leads.index', ['statut' => 'contacte']) }}" class="stat-box contacte">
                <div>
                    <div class="stat-val text-primary">{{ $counts['contacte'] }}</div>
                    <div class="stat-lbl">Contactés</div>
                </div>
                <div class="stat-icon"><i class="fas fa-phone"></i></div>
            </a>
            <a href="{{ route('admin.leads.index', ['statut' => 'en_discussion']) }}" class="stat-box en_discussion">
                <div>
                    <div class="stat-val text-warning">{{ $counts['en_discussion'] }}</div>
                    <div class="stat-lbl">En discussion</div>
                </div>
                <div class="stat-icon"><i class="fas fa-comments"></i></div>
            </a>
            <a href="{{ route('admin.leads.index', ['statut' => 'converti']) }}" class="stat-box converti">
                <div>
                    <div class="stat-val text-success">{{ $counts['converti'] }}</div>
                    <div class="stat-lbl">Convertis / Inscrits</div>
                </div>
                <div class="stat-icon"><i class="fas fa-check-double"></i></div>
            </a>
        </div>

        <!-- Filters Form -->
        <div class="filter-card">
            <form action="{{ route('admin.leads.index') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Recherche nom, tél, email..." value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <select name="statut" class="form-select form-select-sm">
                        <option value="">Tous les statuts</option>
                        <option value="nouveau" {{ request('statut') === 'nouveau' ? 'selected' : '' }}>Nouveau</option>
                        <option value="contacte" {{ request('statut') === 'contacte' ? 'selected' : '' }}>Contacté</option>
                        <option value="en_discussion" {{ request('statut') === 'en_discussion' ? 'selected' : '' }}>En discussion</option>
                        <option value="converti" {{ request('statut') === 'converti' ? 'selected' : '' }}>Converti</option>
                        <option value="perdu" {{ request('statut') === 'perdu' ? 'selected' : '' }}>Perdu</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="assigned_to" class="form-select form-select-sm">
                        <option value="">Tous les responsables</option>
                        @foreach($admins as $adm)
                            <option value="{{ $adm->id }}" {{ request('assigned_to') == $adm->id ? 'selected' : '' }}>{{ $adm->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="parcours" class="form-select form-select-sm">
                        <option value="">Tous parcours</option>
                        <option value="scolaire" {{ request('parcours') === 'scolaire' ? 'selected' : '' }}>Scolaire</option>
                        <option value="formation" {{ request('parcours') === 'formation' ? 'selected' : '' }}>Formation</option>
                        <option value="activite_enfant" {{ request('parcours') === 'activite_enfant' ? 'selected' : '' }}>Activité Enfant</option>
                        <option value="activite_adulte" {{ request('parcours') === 'activite_adulte' ? 'selected' : '' }}>Activité Adulte</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-warning btn-sm text-white fw-bold"><i class="fas fa-filter me-1"></i> Filtrer</button>
                    <a href="{{ route('admin.leads.index') }}" class="btn btn-light btn-sm text-secondary">Réinitialiser</a>
                </div>
            </form>
        </div>

        <!-- Leads Table -->
        <div class="table-card">
            @if($leads->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="fas fa-folder-open" style="font-size: 2.5rem; opacity: 0.4;"></i>
                    <p class="mt-3">Aucun lead trouvé avec ces critères de recherche.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table-moderne">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Prospect</th>
                                <th>Contact & Canal</th>
                                <th>Parcours</th>
                                <th>Cours Recommandé</th>
                                <th>Statut</th>
                                <th>Assigné à</th>
                                <th class="text-end">Actions Rapides</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leads as $l)
                                <tr>
                                    <td>
                                        <strong>{{ $l->created_at->format('d/m/Y') }}</strong><br>
                                        <small class="text-muted">{{ $l->created_at->format('H:i') }}</small>
                                    </td>
                                    <td>
                                        <strong style="color: var(--blue);">{{ $l->prenom }}</strong>
                                        @if($l->session && $l->session->appareil)
                                            <br><small class="text-muted"><i class="fas fa-{{ $l->session->appareil === 'mobile' ? 'mobile-alt' : 'desktop' }}"></i> {{ ucfirst($l->session->appareil) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <a href="tel:{{ $l->telephone }}" class="text-dark fw-bold text-decoration-none">
                                                {{ $l->telephone }}
                                            </a>
                                        </div>
                                        <small class="badge bg-light text-dark text-uppercase border">
                                            <i class="fab fa-{{ $l->moyen_contact_prefere === 'whatsapp' ? 'whatsapp text-success' : ($l->moyen_contact_prefere === 'email' ? 'envelope' : 'phone') }}"></i>
                                            {{ $l->moyen_contact_prefere }}
                                        </small>
                                        @if($l->creneau_rappel)
                                            <small class="text-muted d-block mt-1"><i class="fas fa-clock"></i> {{ $l->creneau_rappel }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $parcours = $l->session?->parcours_choisi ?? 'Autre';
                                            $badgeColors = [
                                                'scolaire' => 'bg-primary-subtle text-primary',
                                                'formation' => 'bg-warning-subtle text-warning-emphasis',
                                                'activite_enfant' => 'bg-success-subtle text-success',
                                                'activite_adulte' => 'bg-info-subtle text-info-emphasis',
                                            ];
                                        @endphp
                                        <span class="badge {{ $badgeColors[$parcours] ?? 'bg-secondary-subtle text-secondary' }} px-2 py-1">
                                            {{ ucfirst(str_replace('_', ' ', $parcours)) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($l->titre_recommandation)
                                            <strong style="font-size: 0.88rem;">{{ Str::limit($l->titre_recommandation, 35) }}</strong>
                                            @if($l->type_page_recommandee)
                                                <br><small class="text-muted">{{ $l->type_page_recommandee }}</small>
                                            @endif
                                        @else
                                            <span class="badge bg-danger-subtle text-danger"><i class="fas fa-exclamation-triangle"></i> Aucune correspondance</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge-status {{ $l->statut }}">
                                            <i class="fas fa-circle" style="font-size: 0.5rem;"></i> {{ $l->status_label }}
                                        </span>
                                    </td>
                                    <td>
                                        <small class="fw-bold">{{ $l->assignee?->name ?? 'Non assigné' }}</small>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-inline-flex gap-1">
                                            <a href="tel:{{ $l->telephone }}" class="btn-act-call" title="Appeler">
                                                <i class="fas fa-phone"></i>
                                            </a>
                                            @php
                                                $waClean = preg_replace('/[^0-9]/', '', $l->telephone);
                                                $waMsg = urlencode("Bonjour " . $l->prenom . ", je vous contacte de la part de MonProfChezMoi suite à votre diagnostic pour : " . ($l->titre_recommandation ?: 'votre projet de formation'));
                                            @endphp
                                            <a href="https://wa.me/{{ $waClean }}?text={{ $waMsg }}" target="_blank" class="btn-act-wa" title="WhatsApp">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                            <a href="{{ route('admin.leads.show', $l->id) }}" class="btn-view-dossier" title="Ouvrir le dossier">
                                                Fiche <i class="fas fa-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $leads->links() }}
                </div>
            @endif
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
