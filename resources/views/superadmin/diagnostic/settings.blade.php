<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres Diagnostic — SuperAdmin</title>
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
        padding: 28px;
        box-shadow: var(--shadow-sm);
        margin-bottom: 24px;
        border: 1px solid var(--gray-100);
        max-width: 800px;
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
                <a href="{{ route('superadmin.dashboard') }}" class="sidebar-nav-link">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard Ventes</span>
                </a>
            </li>
            <li class="sidebar-section-label">Module Diagnostic</li>
            <li class="sidebar-nav-item">
                <a href="{{ route('superadmin.diagnostic.analytics') }}" class="sidebar-nav-link">
                    <i class="fas fa-chart-pie"></i> <span>Entonnoir & Stats</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('superadmin.diagnostic.questions') }}" class="sidebar-nav-link">
                    <i class="fas fa-question-circle"></i> <span>Questionnaire No-Code</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('superadmin.diagnostic.courses') }}" class="sidebar-nav-link">
                    <i class="fas fa-tags"></i> <span>Cours & Tags Matching</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('superadmin.diagnostic.settings') }}" class="sidebar-nav-link active">
                    <i class="fas fa-sliders-h"></i> <span>Configuration Module</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{ route('admin.leads.index') }}" class="sidebar-nav-link">
                    <i class="fas fa-users"></i> <span>Liste des Leads</span>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="mb-4">
            <h1 class="h3 fw-bold text-dark mb-1">
                <i class="fas fa-sliders-h text-warning me-2"></i> Configuration Globale du Diagnostic
            </h1>
            <p class="text-muted mb-0">Paramétrez le comportement du questionnaire, les canaux de notification et les délais.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card-custom">
            <form action="{{ route('superadmin.diagnostic.settings.update') }}" method="POST">
                @csrf

                <!-- Activation générale -->
                <div class="mb-4 pb-3 border-bottom">
                    <div class="form-check form-switch fs-5">
                        <input class="form-check-input" type="checkbox" name="module_actif" id="moduleActif" value="1"
                               {{ \App\Models\DiagnosticConfig::get('module_actif', true) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="moduleActif">
                            Activer le module Diagnostic sur le site public
                        </label>
                    </div>
                    <small class="text-muted d-block mt-1">Si désactivé, ni le pop-up automatique ni le bouton flottant n'apparaîtront pour les visiteurs.</small>
                </div>

                <!-- Textes & Accroche -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Titre d'accroche du modal</label>
                    <textarea name="titre_accroche" class="form-control" rows="3" required>{{ \App\Models\DiagnosticConfig::get('titre_accroche') }}</textarea>
                    <small class="text-muted">Texte d'invitation affiché en en-tête du questionnaire.</small>
                </div>

                <!-- Délais d'affichage -->
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Délai avant ré-affichage automatique (jours)</label>
                        <input type="number" name="delai_reaffichage_jours" class="form-control" min="1" max="60"
                               value="{{ \App\Models\DiagnosticConfig::get('delai_reaffichage_jours', 7) }}" required>
                        <small class="text-muted">Si le visiteur clique sur « Plus tard ».</small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Indicatif téléphonique par défaut</label>
                        <input type="text" name="indicatif_pays_defaut" class="form-control"
                               value="{{ \App\Models\DiagnosticConfig::get('indicatif_pays_defaut', '+225') }}" required>
                        <small class="text-muted">Exemple : +225 (Côte d'Ivoire), +33 (France)...</small>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Numéro WhatsApp de contact direct</label>
                        <input type="text" name="whatsapp_contact_number" class="form-control"
                               value="{{ \App\Models\DiagnosticConfig::get('whatsapp_contact_number', '2250700000000') }}" required>
                        <small class="text-muted">Format international sans espaces ni symboles (+).</small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Seuil minimum de matching</label>
                        <input type="number" name="score_minimum_recommandation" class="form-control" min="5" max="100"
                               value="{{ \App\Models\DiagnosticConfig::get('score_minimum_recommandation', 25) }}" required>
                        <small class="text-muted">En dessous, le lead est marqué « aucune correspondance ».</small>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Message WhatsApp par défaut</label>
                        <textarea name="whatsapp_default_message" class="form-control" rows="2">{{ \App\Models\DiagnosticConfig::get('whatsapp_default_message') }}</textarea>
                    </div>
                </div>

                <!-- Notifications Emails -->
                <div class="mb-4">
                    <label class="form-label fw-bold">E-mails de notification des nouveaux leads</label>
                    <input type="text" name="emails_notification" class="form-control"
                           value="{{ \App\Models\DiagnosticConfig::get('emails_notification') }}" placeholder="contact@monprofchezmoi-ci.com, admin@monprofchezmoi-ci.com">
                    <small class="text-muted">Séparez plusieurs adresses e-mails par des virgules.</small>
                </div>

                <div class="text-end pt-3 border-top">
                    <button type="submit" class="btn btn-warning text-white fw-bold px-4 py-2">
                        <i class="fas fa-save me-1"></i> Sauvegarder les paramètres
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
