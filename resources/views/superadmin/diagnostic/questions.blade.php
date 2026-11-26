<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire No-Code — SuperAdmin</title>
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
        --gray-100: #F1F3F4;
        --gray-200: #E8EAED;
        --gray-600: #5F6368;
        --gray-800: #3C4043;
        --shadow-sm: 0 2px 8px rgba(10,22,40,0.06);
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
    .question-row {
        background: #F8F9FA;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 16px;
        border-left: 4px solid var(--orange);
    }
    .opt-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: white;
        border: 1px solid var(--gray-200);
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.82rem;
        margin: 4px 4px 4px 0;
    }
    .btn-delete-opt {
        background: none;
        border: none;
        color: #EF4444;
        cursor: pointer;
        padding: 0;
        font-size: 0.75rem;
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
                <a href="{{ route('particuliers.superadmin.diagnostic.analytics') }}" class="sidebar-nav-link">
                    <i class="fas fa-chart-pie"></i> <span>Entonnoir & Stats</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('particuliers.superadmin.diagnostic.questions') }}" class="sidebar-nav-link active">
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
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h1 class="h3 fw-bold text-dark mb-1">
                    <i class="fas fa-edit text-warning me-2"></i> Gestion No-Code du Questionnaire
                </h1>
                <p class="text-muted mb-0">Créez, modifiez ou réordonnez les questions et options sans toucher au code.</p>
            </div>
            <div>
                <button type="button" class="btn btn-warning btn-sm text-white fw-bold" data-bs-toggle="modal" data-bs-target="#newQuestionModal">
                    <i class="fas fa-plus me-1"></i> Nouvelle Question
                </button>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Filter by Parcours -->
        <div class="card-custom py-3">
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <span class="small fw-bold text-muted me-2">Filtrer par parcours :</span>
                <a href="{{ route('particuliers.superadmin.diagnostic.questions', ['parcours' => 'all']) }}" class="btn btn-sm {{ $parcoursFilter === 'all' ? 'btn-dark' : 'btn-outline-secondary' }}">Tous</a>
                <a href="{{ route('particuliers.superadmin.diagnostic.questions', ['parcours' => 'commun']) }}" class="btn btn-sm {{ $parcoursFilter === 'commun' ? 'btn-dark' : 'btn-outline-secondary' }}">Commun</a>
                <a href="{{ route('particuliers.superadmin.diagnostic.questions', ['parcours' => 'scolaire']) }}" class="btn btn-sm {{ $parcoursFilter === 'scolaire' ? 'btn-dark' : 'btn-outline-secondary' }}">Scolaire</a>
                <a href="{{ route('particuliers.superadmin.diagnostic.questions', ['parcours' => 'formation']) }}" class="btn btn-sm {{ $parcoursFilter === 'formation' ? 'btn-dark' : 'btn-outline-secondary' }}">Formation</a>
                <a href="{{ route('particuliers.superadmin.diagnostic.questions', ['parcours' => 'activite_enfant']) }}" class="btn btn-sm {{ $parcoursFilter === 'activite_enfant' ? 'btn-dark' : 'btn-outline-secondary' }}">Activité Enfant</a>
                <a href="{{ route('particuliers.superadmin.diagnostic.questions', ['parcours' => 'activite_adulte']) }}" class="btn btn-sm {{ $parcoursFilter === 'activite_adulte' ? 'btn-dark' : 'btn-outline-secondary' }}">Activité Adulte</a>
                <a href="{{ route('particuliers.superadmin.diagnostic.questions', ['parcours' => 'indecis']) }}" class="btn btn-sm {{ $parcoursFilter === 'indecis' ? 'btn-dark' : 'btn-outline-secondary' }}">Indécis</a>
            </div>
        </div>

        <!-- Questions List -->
        @foreach($questions as $q)
            <div class="question-row">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                    <div>
                        <span class="badge bg-secondary text-uppercase me-2">{{ $q->parcours }}</span>
                        <span class="badge bg-light text-dark border">Ordre : {{ $q->ordre }}</span>
                        <span class="badge bg-info-subtle text-info-emphasis ms-1">{{ $q->type_champ }}</span>
                        @if($q->est_actif)
                            <span class="badge bg-success-subtle text-success ms-1"><i class="fas fa-check"></i> Actif</span>
                        @else
                            <span class="badge bg-danger-subtle text-danger ms-1">Désactivé</span>
                        @endif
                        <h4 class="fw-bold mt-2 mb-1" style="font-size: 1.15rem; color: var(--blue);">{{ $q->titre }}</h4>
                        <small class="text-muted">{{ $q->description ?: 'Pas de description additionnelle' }}</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editQuestionModal{{ $q->id }}">
                            <i class="fas fa-edit"></i> Modifier
                        </button>
                        <button type="button" class="btn btn-warning btn-sm text-white fw-bold" data-bs-toggle="modal" data-bs-target="#addOptionModal{{ $q->id }}">
                            <i class="fas fa-plus"></i> Option
                        </button>
                    </div>
                </div>

                <!-- Options List -->
                <div class="mt-3 pt-2 border-top">
                    <small class="fw-bold text-muted d-block mb-1">Choix & Réponses possibles :</small>
                    @if($q->type_champ === 'dynamic_domain')
                        <span class="badge bg-warning-subtle text-dark border p-2">
                            <i class="fas fa-sync-alt me-1"></i> Domaine dynamique généré automatiquement depuis les formations réelles en BDD.
                        </span>
                    @else
                        @forelse($q->options as $opt)
                            <div class="opt-chip">
                                @if($opt->icone)<i class="{{ $opt->icone }} text-warning"></i>@endif
                                <strong>{{ $opt->label }}</strong>
                                <small class="text-muted">({{ $opt->valeur }})</small>
                                <form action="{{ route('particuliers.superadmin.diagnostic.options.destroy', $opt->id) }}" method="POST" class="d-inline ms-1" onsubmit="return confirm('Supprimer cette option ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete-opt" title="Supprimer">&times;</button>
                                </form>
                            </div>
                        @empty
                            <small class="text-muted fst-italic">Aucune option configurée.</small>
                        @endforelse
                    @endif
                </div>
            </div>

            <!-- Modal Modifier Question -->
            <div class="modal fade" id="editQuestionModal{{ $q->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('particuliers.superadmin.diagnostic.questions.update', $q->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">Modifier la Question</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Titre de la question</label>
                                    <input type="text" name="titre" class="form-control" value="{{ $q->titre }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Sous-titre / Description</label>
                                    <textarea name="description" class="form-control" rows="2">{{ $q->description }}</textarea>
                                </div>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <label class="form-label small fw-bold">Ordre d'affichage</label>
                                        <input type="number" name="ordre" class="form-control" value="{{ $q->ordre }}" required>
                                    </div>
                                    <div class="col-6 d-flex align-items-center mt-4">
                                        <div class="form-check">
                                            <input type="checkbox" name="est_actif" value="1" class="form-check-input" id="actif{{ $q->id }}" {{ $q->est_actif ? 'checked' : '' }}>
                                            <label class="form-check-label small fw-bold" for="actif{{ $q->id }}">Question active</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-warning btn-sm text-white fw-bold">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Ajouter Option -->
            <div class="modal fade" id="addOptionModal{{ $q->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('particuliers.superadmin.diagnostic.options.store', $q->id) }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">Ajouter une option à la question</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Libellé visible par le visiteur</label>
                                    <input type="text" name="label" class="form-control" placeholder="Ex: Mathématiques" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Valeur technique</label>
                                    <input type="text" name="valeur" class="form-control" placeholder="Ex: Mathématiques" required>
                                </div>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <label class="form-label small fw-bold">Type de Tag associé</label>
                                        <select name="tag_type" class="form-select form-select-sm">
                                            <option value="">Aucun</option>
                                            <option value="matiere">matiere</option>
                                            <option value="niveau">niveau</option>
                                            <option value="format">format</option>
                                            <option value="disponibilite">disponibilite</option>
                                            <option value="tranche_age">tranche_age</option>
                                            <option value="centre_interet">centre_interet</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label small fw-bold">Icône FontAwesome</label>
                                        <input type="text" name="icone" class="form-control form-control-sm" placeholder="fas fa-check">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-warning btn-sm text-white fw-bold">Ajouter l'option</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </main>
</div>

<!-- Modal Nouvelle Question -->
<div class="modal fade" id="newQuestionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('particuliers.superadmin.diagnostic.questions.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Nouvelle Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Parcours</label>
                        <select name="parcours" class="form-select" required>
                            <option value="commun">Commun (Question 1)</option>
                            <option value="scolaire">Parcours A : Accompagnement scolaire</option>
                            <option value="formation">Parcours B : Formation adulte</option>
                            <option value="activite_enfant">Parcours C : Activité enfant</option>
                            <option value="activite_adulte">Parcours D : Activité adulte</option>
                            <option value="indecis">Parcours E : Indécis / Aiguillage</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Code identifiant unique</label>
                        <input type="text" name="code_identifiant" class="form-control" placeholder="ex: q_scolaire_matiere_extra" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Titre affiché</label>
                        <input type="text" name="titre" class="form-control" placeholder="Titre de la question" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Type de champ</label>
                        <select name="type_champ" class="form-select" required>
                            <option value="single_choice">Choix unique (avance auto)</option>
                            <option value="multiple_choice">Choix multiple</option>
                            <option value="dynamic_domain">Domaine dynamique (Formations BDD)</option>
                            <option value="text">Texte libre</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Ordre</label>
                        <input type="number" name="ordre" class="form-control" value="10">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-warning btn-sm text-white fw-bold">Créer la question</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
