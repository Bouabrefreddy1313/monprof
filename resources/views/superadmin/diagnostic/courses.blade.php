<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correspondance Cours & Tags — SuperAdmin</title>
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
    .tag-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: #F1F3F4;
        border: 1px solid var(--gray-200);
        padding: 3px 8px;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 700;
        margin: 2px;
    }
    .tag-badge.suggested {
        border-style: dashed;
        background: #FEF3C7;
        color: #92400E;
    }
    .form-check-input:checked {
        background-color: var(--orange);
        border-color: var(--orange);
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
                <a href="{{ route('particuliers.superadmin.diagnostic.questions') }}" class="sidebar-nav-link">
                    <i class="fas fa-question-circle"></i> <span>Questionnaire No-Code</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('particuliers.superadmin.diagnostic.courses') }}" class="sidebar-nav-link active">
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
                    <i class="fas fa-tags text-warning me-2"></i> Correspondance Diagnostic & Tags des Cours
                </h1>
                <p class="text-muted mb-0">Activez les cours recommandables, gérez leurs tags et ajustez les pondérations de l'algorithme.</p>
            </div>
            <div>
                <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#rulesModal">
                    <i class="fas fa-sliders-h me-1"></i> Pondérations de Scoring
                </button>
                <button type="button" class="btn btn-warning btn-sm text-white fw-bold ms-2" data-bs-toggle="modal" data-bs-target="#mappingModal">
                    <i class="fas fa-sitemap me-1"></i> Mapping Formations
                </button>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Filter Card -->
        <div class="card-custom py-3">
            <form action="{{ route('particuliers.superadmin.diagnostic.courses') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Rechercher par titre de cours..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="filter_active" class="form-select form-select-sm">
                        <option value="">Tous les statuts d'activation</option>
                        <option value="1" {{ request('filter_active') === '1' ? 'selected' : '' }}>Recommandables (Actif = Oui)</option>
                        <option value="0" {{ request('filter_active') === '0' ? 'selected' : '' }}>En attente de validation (Actif = Non)</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="filter_without_tags" class="form-select form-select-sm">
                        <option value="">Tous les cours</option>
                        <option value="1" {{ request('filter_without_tags') === '1' ? 'selected' : '' }}>⚠️ Cours sans tags (Jamais recommandés)</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-warning btn-sm text-white fw-bold w-100"><i class="fas fa-filter"></i></button>
                    <a href="{{ route('particuliers.superadmin.diagnostic.courses') }}" class="btn btn-light btn-sm text-secondary">Reset</a>
                </div>
            </form>
        </div>

        <!-- Courses Table -->
        <div class="card-custom">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th style="width: 70px;">ID</th>
                            <th>Cours / Formation</th>
                            <th style="width: 140px;">Recommandable</th>
                            <th>Tags Structurés</th>
                            <th style="width: 80px;">Priorité</th>
                            <th class="text-end" style="width: 160px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $c)
                            @php
                                $setting = $c->diagnosticSetting;
                                $isActive = $setting?->actif_diagnostic ?? false;
                                $tagsCount = $c->diagnosticTags->count();
                            @endphp
                            <tr>
                                <td><strong>#{{ $c->id }}</strong></td>
                                <td>
                                    <strong class="text-dark d-block">{{ $c->titre }}</strong>
                                    <small class="text-muted">{{ $c->formation?->titre ?? 'Sans formation' }} &bull; {{ $c->prix ?: 'Prix sur devis' }}</small>
                                    @if($tagsCount === 0)
                                        <span class="badge bg-danger-subtle text-danger ms-1" title="Ce cours n'a aucun tag et ne pourra jamais être matché !">
                                            <i class="fas fa-exclamation-triangle"></i> Sans tag
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="activeSwitch{{ $c->id }}"
                                               {{ $isActive ? 'checked' : '' }}
                                               onchange="toggleCourseActive({{ $c->id }})">
                                        <label class="form-check-label small fw-bold" for="activeSwitch{{ $c->id }}">
                                            <span id="activeLabel{{ $c->id }}">{{ $isActive ? 'Oui' : 'Non' }}</span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap align-items-center">
                                        @forelse($c->diagnosticTags as $tag)
                                            <span class="tag-badge {{ $tag->est_suggere && !$tag->est_valide ? 'suggested' : '' }}">
                                                <strong>{{ $tag->type_tag }}:</strong> {{ $tag->valeur }}
                                                <form action="{{ route('particuliers.superadmin.diagnostic.tags.destroy', $tag->id) }}" method="POST" class="d-inline ms-1" onsubmit="return confirm('Supprimer ce tag ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background:none;border:none;color:#EF4444;padding:0;font-size:0.7rem;">&times;</button>
                                                </form>
                                            </span>
                                        @empty
                                            <small class="text-muted fst-italic">Aucun tag pour ce cours.</small>
                                        @endforelse
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">{{ $setting?->priorite ?? 0 }}</span>
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editCourseModal{{ $c->id }}" title="Modifier tags et priorités">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        @if($c->diagnosticTags->where('est_valide', false)->count() > 0)
                                            <form action="{{ route('particuliers.superadmin.diagnostic.courses.validate-tags', $c->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-success btn-sm" title="Valider les tags suggérés">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <a href="{{ route('particuliers.cours', $c->id) }}" target="_blank" class="btn btn-light btn-sm border" title="Voir la fiche">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Édition Tags & Détails Cours -->
                            <div class="modal fade" id="editCourseModal{{ $c->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('particuliers.superadmin.diagnostic.courses.update', $c->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold">Paramètres Diagnostic : {{ Str::limit($c->titre, 40) }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label small fw-bold">Priorité de recommandation</label>
                                                        <input type="number" name="priorite" class="form-control" value="{{ $setting?->priorite ?? 0 }}">
                                                        <small class="text-muted">Pour départager à score égal (plus élevé = prioritaire).</small>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center mt-4">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="actif_diagnostic" value="1" class="form-check-input" id="actCheck{{ $c->id }}" {{ $isActive ? 'checked' : '' }}>
                                                            <label class="form-check-label fw-bold" for="actCheck{{ $c->id }}">Actif pour les recommandations</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label small fw-bold">Message de recommandation personnalisé (Optionnel)</label>
                                                        <textarea name="message_recommandation" class="form-control" rows="2" placeholder="Ce message remplacera le texte automatique si ce cours est sélectionné.">{{ $setting?->message_recommandation }}</textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <hr>
                                                        <h6 class="fw-bold"><i class="fas fa-plus-circle text-warning me-1"></i> Ajouter un Tag à ce cours</h6>
                                                        <div class="row g-2">
                                                            <div class="col-md-5">
                                                                <select name="new_tag_type" class="form-select form-select-sm">
                                                                    <option value="">Sélectionner type</option>
                                                                    <option value="parcours">parcours (scolaire, formation, activite_enfant, activite_adulte)</option>
                                                                    <option value="matiere">matiere (Mathématiques, Français...)</option>
                                                                    <option value="niveau">niveau (primaire, collège, lycée, débutant...)</option>
                                                                    <option value="format">format (en ligne, à domicile, en centre)</option>
                                                                    <option value="disponibilite">disponibilite (mercredi, samedi, soir...)</option>
                                                                    <option value="objectif">objectif</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <input type="text" name="new_tag_value" class="form-control form-control-sm" placeholder="Valeur du tag">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-warning btn-sm text-white fw-bold">Enregistrer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">Aucun cours trouvé avec ces filtres.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $courses->links() }}
            </div>
        </div>
    </main>
</div>

<!-- Modal Pondérations Scoring -->
<div class="modal fade" id="rulesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('particuliers.superadmin.diagnostic.rules.update') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"><i class="fas fa-sliders-h text-warning me-2"></i> Pondérations de l'Algorithme</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="small text-muted mb-3">Définissez l'importance de chaque critère dans le score global attribué aux cours.</p>
                    @foreach($rules as $rule)
                        <div class="mb-3">
                            <label class="form-label small fw-bold d-flex justify-content-between">
                                <span>{{ $rule->nom_critere }}</span>
                                <span class="badge bg-warning text-dark">{{ $rule->poids }} pts</span>
                            </label>
                            <input type="number" name="poids[{{ $rule->id }}]" class="form-control form-control-sm" value="{{ $rule->poids }}" min="0" max="100">
                            <small class="text-muted">{{ $rule->description }}</small>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-warning btn-sm text-white fw-bold">Sauvegarder les règles</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Mapping Formations -> Parcours -->
<div class="modal fade" id="mappingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('particuliers.superadmin.diagnostic.mapping.update') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"><i class="fas fa-sitemap text-warning me-2"></i> Mapping Formations &rarr; Parcours</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="max-height: 65vh; overflow-y: auto;">
                    <p class="small text-muted mb-3">Associez chaque formation de votre base à un parcours du questionnaire :</p>
                    <table class="table table-sm align-middle">
                        <thead>
                            <tr>
                                <th>Formation</th>
                                <th style="width: 250px;">Parcours Assigné</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($formations as $f)
                                @php
                                    $cur = $mappings->where('formation_id', $f->id)->first()?->parcours ?? 'formation';
                                @endphp
                                <tr>
                                    <td><strong>{{ $f->titre }}</strong></td>
                                    <td>
                                        <select name="mapping[{{ $f->id }}]" class="form-select form-select-sm">
                                            <option value="scolaire" {{ $cur === 'scolaire' ? 'selected' : '' }}>Scolaire</option>
                                            <option value="formation" {{ $cur === 'formation' ? 'selected' : '' }}>Formation Adulte</option>
                                            <option value="activite_enfant" {{ $cur === 'activite_enfant' ? 'selected' : '' }}>Activité Enfant</option>
                                            <option value="activite_adulte" {{ $cur === 'activite_adulte' ? 'selected' : '' }}>Activité Adulte</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-warning btn-sm text-white fw-bold">Sauvegarder le mapping</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
async function toggleCourseActive(courseId) {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    try {
        const res = await fetch(`/particuliers/superadmin/diagnostic/courses/${courseId}/toggle-active`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
            }
        });
        const data = await res.json();
        if (data.success) {
            document.getElementById(`activeLabel${courseId}`).textContent = data.actif_diagnostic ? 'Oui' : 'Non';
        }
    } catch (e) {
        alert('Erreur lors de la modification du statut');
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
