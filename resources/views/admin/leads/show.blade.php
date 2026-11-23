<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Lead #{{ $lead->id }} — {{ $lead->prenom }}</title>
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
        --shadow-sm: 0 2px 8px rgba(10,22,40,0.06);
        --shadow-md: 0 8px 24px rgba(10,22,40,0.1);
    }
    body {
        font-family: 'Nunito', sans-serif;
        color: var(--gray-800);
        background: linear-gradient(135deg, var(--cream) 0%, #eef2f7 100%);
        min-height: 100vh;
    }
    .main-wrap { max-width: 1100px; margin: 0 auto; padding: 30px 20px; }
    .card-custom {
        background: white;
        border-radius: 18px;
        padding: 24px;
        box-shadow: var(--shadow-sm);
        margin-bottom: 24px;
        border: 1px solid var(--gray-100);
    }
    .header-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .badge-status {
        padding: 6px 16px;
        border-radius: 50px;
        font-weight: 800;
        font-size: 0.85rem;
    }
    .badge-status.nouveau { background: #FEE2E2; color: #991B1B; }
    .badge-status.contacte { background: #DBEAFE; color: #1E40AF; }
    .badge-status.en_discussion { background: #FEF3C7; color: #92400E; }
    .badge-status.converti { background: #D1FAE5; color: #065F46; }
    .badge-status.perdu { background: #F1F3F4; color: #5F6368; }

    .action-btn-group {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    .btn-wa-action {
        background: #25D366;
        color: white;
        padding: 10px 20px;
        border-radius: 12px;
        font-weight: 800;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 12px rgba(37,211,102,0.3);
    }
    .btn-wa-action:hover { background: #1EBE5D; color: white; }
    .btn-call-action {
        background: #3B82F6;
        color: white;
        padding: 10px 20px;
        border-radius: 12px;
        font-weight: 800;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 12px rgba(59,130,246,0.3);
    }
    .btn-call-action:hover { background: #2563EB; color: white; }

    .qa-box {
        background: #F8F9FA;
        border-radius: 12px;
        padding: 14px 18px;
        margin-bottom: 10px;
        border-left: 3px solid var(--orange);
    }
    .qa-q { font-size: 0.88rem; color: var(--gray-600); font-weight: 700; margin-bottom: 4px; }
    .qa-a { font-size: 1rem; color: var(--blue); font-weight: 800; }

    .timeline {
        position: relative;
        padding-left: 24px;
    }
    .timeline::before {
        content: '';
        position: absolute;
        left: 7px;
        top: 8px;
        bottom: 8px;
        width: 2px;
        background: #E8EAED;
    }
    .timeline-item {
        position: relative;
        margin-bottom: 18px;
    }
    .timeline-dot {
        position: absolute;
        left: -24px;
        top: 4px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: var(--orange);
        border: 3px solid white;
        box-shadow: 0 0 0 2px rgba(255,107,53,0.3);
    }
    .timeline-content {
        background: #F8F9FA;
        border-radius: 10px;
        padding: 10px 14px;
        font-size: 0.88rem;
    }
    </style>
</head>
<body>

<div class="main-wrap">
    <!-- Breadcrumb & Top Navigation -->
    <div class="header-bar">
        <div>
            <a href="{{ route('admin.leads.index') }}" class="text-muted text-decoration-none small fw-bold">
                &larr; Retour à la liste des leads
            </a>
            <h1 class="h3 fw-bold mt-1 text-dark mb-0">Fiche Prospect : {{ $lead->prenom }} (#{{ $lead->id }})</h1>
        </div>
        <div>
            <span class="badge-status {{ $lead->statut }}">{{ $lead->status_label }}</span>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Call to Actions Bar -->
    <div class="card-custom">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <span class="text-muted small">Moyen de contact préféré :</span>
                <span class="badge bg-dark text-uppercase ms-1"><i class="fas fa-bullseye me-1"></i> {{ $lead->moyen_contact_prefere }}</span>
                @if($lead->creneau_rappel)
                    <span class="ms-2 text-muted small"><i class="fas fa-clock"></i> {{ $lead->creneau_rappel }}</span>
                @endif
            </div>
            <div class="action-btn-group">
                <a href="tel:{{ $lead->telephone }}" class="btn-call-action">
                    <i class="fas fa-phone-alt"></i> Appeler ({{ $lead->telephone }})
                </a>
                @php
                    $waClean = preg_replace('/[^0-9]/', '', $lead->telephone);
                    $waMsg = urlencode("Bonjour " . $lead->prenom . ", je vous contacte de la part de MonProfChezMoi suite à votre diagnostic pour : " . ($lead->titre_recommandation ?: 'votre projet'));
                @endphp
                <a href="https://wa.me/{{ $waClean }}?text={{ $waMsg }}" target="_blank" class="btn-wa-action">
                    <i class="fab fa-whatsapp"></i> Échanger sur WhatsApp
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Colonne Gauche : Données Contact & Réponses Questionnaire -->
        <div class="col-lg-7">
            <!-- Coordonnées -->
            <div class="card-custom">
                <h5 class="fw-bold mb-3"><i class="fas fa-address-card text-orange me-2"></i> Coordonnées & Informations</h5>
                <div class="row g-2">
                    <div class="col-sm-6">
                        <small class="text-muted">Prénom :</small>
                        <p class="fw-bold mb-2">{{ $lead->prenom }}</p>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted">Téléphone :</small>
                        <p class="fw-bold mb-2"><a href="tel:{{ $lead->telephone }}">{{ $lead->telephone }}</a></p>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted">Email :</small>
                        <p class="fw-bold mb-2">{{ $lead->email ?: 'Non renseigné' }}</p>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted">Date de soumission :</small>
                        <p class="fw-bold mb-2">{{ $lead->created_at->format('d/m/Y à H:i') }} ({{ $lead->created_at->diffForHumans() }})</p>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted">Consentement RGPD :</small>
                        <p class="fw-bold mb-0 text-success"><i class="fas fa-check-circle"></i> Donné le {{ $lead->consentement_date ? $lead->consentement_date->format('d/m/Y') : $lead->created_at->format('d/m/Y') }}</p>
                    </div>
                    <div class="col-sm-6">
                        <small class="text-muted">Appareil utilisé :</small>
                        <p class="fw-bold mb-0">{{ ucfirst($lead->session?->appareil ?? 'Non détecté') }}</p>
                    </div>
                </div>
            </div>

            <!-- Réponses intégrales au questionnaire -->
            <div class="card-custom">
                <h5 class="fw-bold mb-3"><i class="fas fa-clipboard-list text-primary me-2"></i> Réponses au Questionnaire</h5>
                @if($lead->session && $lead->session->answers->isNotEmpty())
                    @foreach($lead->session->answers as $ans)
                        <div class="qa-box">
                            <div class="qa-q">{{ $ans->question_label ?: $ans->question_identifier }}</div>
                            <div class="qa-a">
                                @php
                                    $parsed = $ans->parsed_reponse;
                                @endphp
                                @if(is_array($parsed))
                                    @foreach($parsed as $item)
                                        <span class="badge bg-light text-dark border me-1">{{ $item }}</span>
                                    @endforeach
                                @else
                                    {{ $parsed }}
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted">Aucune réponse spécifique enregistrée pour cette session.</p>
                @endif
            </div>

            <!-- Recommandation générée -->
            <div class="card-custom">
                <h5 class="fw-bold mb-3"><i class="fas fa-star text-warning me-2"></i> Recommandation Générée</h5>
                <div class="p-3 bg-light rounded-3 mb-3 border">
                    <h6 class="fw-bold text-dark">{{ $lead->titre_recommandation ?: 'Aucune correspondance automatique' }}</h6>
                    @if($lead->type_page_recommandee)
                        <span class="badge bg-primary-subtle text-primary mb-2"><i class="fas fa-link me-1"></i>{{ $lead->type_page_recommandee }}</span>
                    @endif
                    <p class="small text-muted mb-2">{{ $lead->texte_recommandation }}</p>
                    @if($lead->url_page_recommandee)
                        <a href="{{ $lead->url_page_recommandee }}" target="_blank" class="btn btn-outline-primary btn-sm fw-bold mb-2">
                            <i class="fas fa-external-link-alt me-1"></i> Ouvrir la page conseillée
                        </a>
                    @endif
                    @if($lead->coursRecommande)
                        <a href="{{ route('cours', $lead->cours_recommande_id) }}" target="_blank" class="btn btn-outline-warning btn-sm fw-bold">
                            <i class="fas fa-external-link-alt me-1"></i> Ouvrir la fiche du cours sur le site
                        </a>
                    @endif
                </div>

                <!-- Modification manuelle du cours -->
                <form action="{{ route('admin.leads.change-course', $lead->id) }}" method="POST" class="mt-3">
                    @csrf
                    <label class="form-label small fw-bold">Recommander manuellement un autre cours de la base :</label>
                    <div class="input-group">
                        <select name="cours_id" class="form-select form-select-sm" required>
                            @foreach($allCourses as $c)
                                <option value="{{ $c->id }}" {{ $lead->cours_recommande_id == $c->id ? 'selected' : '' }}>
                                    {{ $c->titre }} {{ $c->prix ? "({$c->prix})" : '' }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-warning btn-sm text-white fw-bold">Remplacer</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Colonne Droite : Statut, Assignation, Notes & Timeline -->
        <div class="col-lg-5">
            <!-- Gestion Statut & Assignation -->
            <div class="card-custom">
                <h5 class="fw-bold mb-3"><i class="fas fa-tasks text-success me-2"></i> Suivi du Dossier</h5>

                <!-- Form Statut -->
                <form action="{{ route('admin.leads.status', $lead->id) }}" method="POST" class="mb-3">
                    @csrf
                    <label class="form-label small fw-bold">Changer le statut :</label>
                    <div class="input-group">
                        <select name="statut" class="form-select form-select-sm">
                            <option value="nouveau" {{ $lead->statut === 'nouveau' ? 'selected' : '' }}>Nouveau</option>
                            <option value="contacte" {{ $lead->statut === 'contacte' ? 'selected' : '' }}>Contacté</option>
                            <option value="en_discussion" {{ $lead->statut === 'en_discussion' ? 'selected' : '' }}>En discussion</option>
                            <option value="converti" {{ $lead->statut === 'converti' ? 'selected' : '' }}>Converti / Inscrit</option>
                            <option value="perdu" {{ $lead->statut === 'perdu' ? 'selected' : '' }}>Perdu</option>
                        </select>
                        <button type="submit" class="btn btn-dark btn-sm">Mettre à jour</button>
                    </div>
                </form>

                <!-- Form Assignation -->
                <form action="{{ route('admin.leads.assign', $lead->id) }}" method="POST">
                    @csrf
                    <label class="form-label small fw-bold">Assigner à un responsable :</label>
                    <div class="input-group">
                        <select name="assigned_to" class="form-select form-select-sm">
                            <option value="">Non assigné</option>
                            @foreach($admins as $adm)
                                <option value="{{ $adm->id }}" {{ $lead->assigned_to == $adm->id ? 'selected' : '' }}>{{ $adm->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-dark btn-sm">Assigner</button>
                    </div>
                </form>
            </div>

            <!-- Ajouter une note -->
            <div class="card-custom">
                <h5 class="fw-bold mb-3"><i class="fas fa-comment-alt text-info me-2"></i> Ajouter une Note Interne</h5>
                <form action="{{ route('admin.leads.note', $lead->id) }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <textarea name="note" class="form-control" rows="3" placeholder="Écrire une note (ex: a confirmé un RDV mercredi 15h, rappel prévu...)" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold">Enregistrer la note</button>
                </form>
            </div>

            <!-- Historique des Activités -->
            <div class="card-custom">
                <h5 class="fw-bold mb-3"><i class="fas fa-history text-secondary me-2"></i> Historique d'Activités</h5>
                <div class="timeline">
                    @forelse($lead->activities as $act)
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <strong class="text-dark">{{ $act->auteur_nom ?: 'Système' }}</strong>
                                    <small class="text-muted">{{ $act->created_at->format('d/m H:i') }}</small>
                                </div>
                                <p class="mb-0 text-secondary">{{ $act->details }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted small">Aucune action enregistrée pour le moment.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
