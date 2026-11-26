<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics & Funnel — SuperAdmin MonProfChezMoi</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('asset/img/favicon.png') }}" rel="icon">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    :root {
        --orange: #FF6B35;
        --orange-dark: #E85A2B;
        --blue: #0A1628;
        --blue-light: #1E3A5F;
        --cream: #FAFBFC;
        --gray-50: #F8F9FA;
        --gray-100: #F1F3F4;
        --gray-200: #E8EAED;
        --gray-600: #5F6368;
        --gray-800: #3C4043;
        --success: #10B981;
        --shadow-sm: 0 2px 8px rgba(10,22,40,0.06);
        --shadow-md: 0 8px 24px rgba(10,22,40,0.1);
    }
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
    .sidebar-brand span { font-weight: 800; font-size: 1.1rem; color: #FF8C5A; }
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
        font-size: 0.9rem;
        transition: all 0.25s ease;
    }
    .sidebar-nav-link:hover, .sidebar-nav-link.active {
        background: rgba(255,255,255,0.1);
        color: white;
    }
    .sidebar-nav-link.active {
        background: rgba(255,107,53,0.25);
        color: #ffffff;
        border-left: 3px solid var(--orange);
    }
    .sidebar-section-label {
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: rgba(255,255,255,0.4);
        padding: 14px 16px 6px;
        font-weight: 800;
    }

    .main-content { margin-left: 280px; flex: 1; padding: 30px; }
    .card-custom {
        background: white;
        border-radius: 18px;
        padding: 24px;
        box-shadow: var(--shadow-sm);
        margin-bottom: 24px;
        border: 1px solid var(--gray-100);
    }

    /* Funnel visual */
    .funnel-step {
        background: #F8F9FA;
        border-radius: 16px;
        padding: 20px;
        text-align: center;
        position: relative;
        border: 2px solid transparent;
        transition: all 0.2s;
    }
    .funnel-step.step-1 { border-color: #93C5FD; }
    .funnel-step.step-2 { border-color: #FCD34D; }
    .funnel-step.step-3 { border-color: #FCA5A5; }
    .funnel-step.step-4 { border-color: #86EFAC; }
    .funnel-val { font-size: 2.2rem; font-weight: 800; color: var(--blue); margin-bottom: 4px; }
    .funnel-label { font-weight: 700; font-size: 0.9rem; color: var(--gray-600); }
    .funnel-pct {
        display: inline-block;
        font-weight: 800;
        font-size: 0.82rem;
        padding: 3px 10px;
        border-radius: 50px;
        margin-top: 8px;
    }

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
            <span>SUPER ADMIN</span>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-nav-item">
                <a href="{{ route('particuliers.superadmin.dashboard') }}" class="sidebar-nav-link">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard Ventes</span>
                </a>
            </li>

            <li class="sidebar-section-label">Module Diagnostic</li>
            <li class="sidebar-nav-item">
                <a href="{{ route('particuliers.superadmin.diagnostic.analytics') }}" class="sidebar-nav-link active">
                    <i class="fas fa-chart-pie"></i> <span>Entonnoir & Stats</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('particuliers.superadmin.diagnostic.questions') }}" class="sidebar-nav-link">
                    <i class="fas fa-question-circle"></i> <span>Questionnaire No-Code</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('particuliers.superadmin.diagnostic.courses') }}" class="sidebar-nav-link">
                    <i class="fas fa-tags"></i> <span>Cours & Tags Matching</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('particuliers.superadmin.diagnostic.settings') }}" class="sidebar-nav-link">
                    <i class="fas fa-sliders-h"></i> <span>Configuration Module</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('particuliers.admin.leads.index') }}" class="sidebar-nav-link">
                    <i class="fas fa-users"></i> <span>Liste des Leads</span>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-bold text-dark mb-1">
                    <i class="fas fa-chart-line text-warning me-2"></i> Statistiques & Entonnoir de Conversion
                </h1>
                <p class="text-muted mb-0">Analysez l'efficacité commerciale du diagnostic adaptatif et la qualification des prospects.</p>
            </div>
            <div>
                <a href="{{ route('particuliers.superadmin.diagnostic.settings') }}" class="btn btn-warning btn-sm text-white fw-bold">
                    <i class="fas fa-cog me-1"></i> Paramètres
                </a>
            </div>
        </div>

        <!-- 1. ENTONNOIR DE CONVERSION -->
        <div class="card-custom">
            <h5 class="fw-bold mb-4"><i class="fas fa-filter text-orange me-2"></i> Entonnoir de Conversion Global</h5>
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="funnel-step step-1">
                        <div class="funnel-val">{{ $totalSessions }}</div>
                        <div class="funnel-label">Diagnostics Démarrés</div>
                        <span class="funnel-pct bg-primary text-white">100% (Base)</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="funnel-step step-2">
                        <div class="funnel-val text-warning">{{ $finishedSessions }}</div>
                        <div class="funnel-label">Questionnaires Terminés</div>
                        <span class="funnel-pct bg-warning text-dark">{{ $tauxCompletion }}% complétion</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="funnel-step step-3">
                        <div class="funnel-val text-danger">{{ $totalLeads }}</div>
                        <div class="funnel-label">Coordonnées Laissées</div>
                        <span class="funnel-pct bg-danger text-white">{{ $tauxCapture }}% capture</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="funnel-step step-4">
                        <div class="funnel-val text-success">{{ $convertedLeads }}</div>
                        <div class="funnel-label">Clients Convertis</div>
                        <span class="funnel-pct bg-success text-white">{{ $tauxConversion }}% conversion</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- 2. Répartition par Parcours -->
            <div class="col-md-6">
                <div class="card-custom h-100">
                    <h5 class="fw-bold mb-3"><i class="fas fa-compass text-primary me-2"></i> Répartition par Parcours</h5>
                    <div class="list-group list-group-flush">
                        @foreach($parcoursStats as $parcours => $count)
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                                <div>
                                    <strong class="text-capitalize">{{ str_replace('_', ' ', $parcours ?: 'Non qualifié') }}</strong>
                                    <div class="progress mt-1" style="height: 6px; width: 180px;">
                                        @php $pctP = $totalSessions > 0 ? round(($count / $totalSessions) * 100) : 0; @endphp
                                        <div class="progress-bar bg-warning" style="width: {{ $pctP }}%;"></div>
                                    </div>
                                </div>
                                <span class="badge bg-light text-dark border fs-6">{{ $count }} ({{ $pctP }}%)</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- 3. Taux d'abandon par question -->
            <div class="col-md-6">
                <div class="card-custom h-100">
                    <h5 class="fw-bold mb-3"><i class="fas fa-user-times text-danger me-2"></i> Points de Décrochage (Abandons)</h5>
                    <p class="small text-muted mb-3">Dernières questions atteintes lors des abandons en cours de route :</p>
                    <div class="list-group list-group-flush">
                        @forelse($dropoffQuestions as $dq)
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">
                                <span class="small fw-bold text-secondary">{{ $dq->derniere_question_atteinte }}</span>
                                <span class="badge bg-danger-subtle text-danger">{{ $dq->count }} abandons</span>
                            </div>
                        @empty
                            <p class="text-muted small">Aucun abandon spécifique identifié.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- 4. Top cours recommandés -->
            <div class="col-md-6">
                <div class="card-custom h-100">
                    <h5 class="fw-bold mb-3"><i class="fas fa-trophy text-warning me-2"></i> Cours les Plus Recommandés & Convertis</h5>
                    <div class="table-responsive">
                        <table class="table table-sm align-middle">
                            <thead>
                                <tr>
                                    <th>Cours</th>
                                    <th class="text-center">Recommandations</th>
                                    <th class="text-center">Conversions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($topCourses as $tc)
                                    <tr>
                                        <td>
                                            <strong class="small text-dark">{{ Str::limit($tc->titre_cours_recommande, 35) }}</strong>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-warning text-dark">{{ $tc->total_recommandations }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-success">{{ $tc->conversions }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="3" class="text-muted text-center">Aucune recommandation enregistrée.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 5. Besoins sans cours correspondant -->
            <div class="col-md-6">
                <div class="card-custom h-100">
                    <h5 class="fw-bold mb-2 text-danger">
                        <i class="fas fa-exclamation-circle me-2"></i> Besoins Non Couverts (Opportunités)
                    </h5>
                    <p class="small text-muted mb-3">Leads où aucun cours n'a atteint le seuil de matching. Indique les offres à créer !</p>
                    <div class="list-group list-group-flush">
                        @forelse($unmatchedLeads as $ul)
                            <div class="list-group-item px-0 py-2">
                                <div class="d-flex justify-content-between">
                                    <strong>{{ $ul->prenom }} ({{ $ul->telephone }})</strong>
                                    <small class="text-muted">{{ $ul->created_at->format('d/m/Y') }}</small>
                                </div>
                                <small class="text-muted">{{ Str::limit($ul->texte_recommandation, 90) }}</small>
                            </div>
                        @empty
                            <p class="text-success small"><i class="fas fa-check-circle"></i> Tous les prospects récents ont trouvé un cours correspondant !</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- 6. Performance par Admin & Sources UTM -->
        <div class="row mt-4">
            <div class="col-md-7">
                <div class="card-custom">
                    <h5 class="fw-bold mb-3"><i class="fas fa-user-check text-success me-2"></i> Traitement par Administrateur</h5>
                    <table class="table table-sm align-middle">
                        <thead>
                            <tr>
                                <th>Admin</th>
                                <th>Leads Assignés</th>
                                <th>Conversions Réalisées</th>
                                <th>Taux de Succès</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($adminPerf as $adm)
                                <tr>
                                    <td><strong>{{ $adm->name }}</strong></td>
                                    <td>{{ $adm->total_assigned }}</td>
                                    <td><span class="badge bg-success">{{ $adm->total_converted }}</span></td>
                                    <td>
                                        @php $rate = $adm->total_assigned > 0 ? round(($adm->total_converted / $adm->total_assigned) * 100, 1) : 0; @endphp
                                        <strong>{{ $rate }}%</strong>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card-custom">
                    <h5 class="fw-bold mb-3"><i class="fas fa-bullhorn text-info me-2"></i> Performance des Sources UTM</h5>
                    <ul class="list-group list-group-flush">
                        @forelse($sourcesUtm as $utm)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="fw-bold">{{ ucfirst($utm->utm_source) }}</span>
                                <span class="badge bg-info text-dark">{{ $utm->sessions_count }} sessions</span>
                            </li>
                        @empty
                            <li class="list-group-item px-0 text-muted small">Aucun paramètre UTM enregistré.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
