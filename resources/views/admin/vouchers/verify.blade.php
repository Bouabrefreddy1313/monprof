<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification & Liaison des Bons Cadeaux - Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('asset/img/favicon.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap -->
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
        --success-light: #D1FAE5;
        --danger: #EF4444;
        --danger-light: #FEE2E2;
        --warning: #F59E0B;
        --warning-light: #FEF3C7;
        --shadow-sm: 0 2px 8px rgba(10,22,40,0.06);
        --shadow-md: 0 8px 24px rgba(10,22,40,0.1);
        --shadow-lg: 0 16px 48px rgba(10,22,40,0.12);
        --shadow-orange: 0 8px 32px rgba(255,107,53,0.25);
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
        font-family: 'Nunito', sans-serif;
        color: var(--gray-800);
        background: linear-gradient(135deg, var(--cream) 0%, #eef2f7 100%);
        min-height: 100vh;
        line-height: 1.6;
    }

    /* Topbar */
    .topbar {
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(20px);
        padding: 16px 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid var(--gray-100);
        position: sticky;
        top: 0;
        z-index: 100;
    }
    .topbar-title {
        font-size: 1.35rem;
        font-weight: 800;
        color: var(--blue);
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .topbar-title i {
        color: var(--orange);
    }
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 18px;
        border-radius: 10px;
        background: var(--blue);
        color: white;
        text-decoration: none;
        font-weight: 700;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    .btn-back:hover {
        background: var(--blue-light);
        color: white;
        transform: translateY(-2px);
    }

    /* Container */
    .main-container {
        max-width: 1140px;
        margin: 30px auto;
        padding: 0 20px;
    }

    /* Cards */
    .dashboard-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--gray-100);
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }
    .dashboard-card.border-orange::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 5px;
        background: linear-gradient(90deg, var(--orange), var(--orange-light), var(--blue-accent));
    }
    .dashboard-card.border-green::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 5px;
        background: linear-gradient(90deg, #10B981, #34D399, #059669);
    }

    .card-title-custom {
        font-size: 1.35rem;
        font-weight: 800;
        color: var(--blue);
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .card-subtitle-custom {
        color: var(--gray-600);
        font-size: 0.92rem;
        margin-bottom: 22px;
    }

    /* Search Input */
    .search-input-group {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }
    .search-input-wrap {
        flex: 1;
        min-width: 260px;
        position: relative;
    }
    .search-input-wrap i {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-400);
        font-size: 1.2rem;
    }
    .search-input {
        width: 100%;
        padding: 14px 20px 14px 50px;
        border-radius: 12px;
        border: 2px solid var(--gray-200);
        font-size: 1.1rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        font-family: 'Courier New', monospace;
        color: var(--blue);
        transition: all 0.3s ease;
        outline: none;
    }
    .search-input:focus {
        border-color: var(--orange);
        box-shadow: 0 0 0 4px rgba(255,107,53,0.15);
    }
    .btn-search {
        background: linear-gradient(135deg, var(--orange), var(--orange-dark));
        color: white;
        border: none;
        padding: 14px 28px;
        border-radius: 12px;
        font-weight: 800;
        font-size: 1rem;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: var(--shadow-orange);
        transition: all 0.3s ease;
    }
    .btn-search:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(255,107,53,0.35);
    }

    /* Form Fields */
    .form-label-bold {
        font-weight: 700;
        font-size: 0.95rem;
        color: var(--blue);
        margin-bottom: 8px;
        display: block;
    }
    .form-control-custom {
        width: 100%;
        padding: 14px 18px;
        border-radius: 12px;
        border: 2px solid var(--gray-200);
        font-size: 1rem;
        font-weight: 600;
        color: var(--blue);
        outline: none;
        transition: all 0.3s;
        background: white;
    }
    .form-control-custom:focus {
        border-color: #10B981;
        box-shadow: 0 0 0 4px rgba(16,185,129,0.15);
    }

    /* Action Button to Link Formation */
    .btn-submit-link {
        background: linear-gradient(135deg, #10B981, #059669);
        color: white;
        border: none;
        padding: 16px 36px;
        border-radius: 14px;
        font-weight: 800;
        font-size: 1.1rem;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        box-shadow: 0 8px 25px rgba(16,185,129,0.35);
        transition: all 0.3s ease;
        width: 100%;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .btn-submit-link:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 32px rgba(16,185,129,0.45);
        color: white;
    }

    /* Details Grid */
    .details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 16px;
        margin: 20px 0;
        background: var(--cream);
        padding: 20px;
        border-radius: 16px;
        border: 1px solid var(--gray-100);
    }
    .detail-item {
        display: flex;
        flex-direction: column;
    }
    .detail-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--gray-400);
        font-weight: 700;
        margin-bottom: 4px;
    }
    .detail-value {
        font-size: 1.05rem;
        font-weight: 800;
        color: var(--blue);
    }

    /* Tables */
    .table-modern {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        font-size: 0.92rem;
    }
    .table-modern th {
        background: var(--cream);
        color: var(--gray-600);
        font-weight: 700;
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        padding: 14px 18px;
        border-bottom: 2px solid var(--gray-100);
    }
    .table-modern td {
        padding: 14px 18px;
        border-bottom: 1px solid var(--gray-100);
        vertical-align: middle;
    }
    .code-badge {
        font-family: 'Courier New', monospace;
        font-weight: 800;
        background: #F1F5F9;
        color: #0F172A;
        padding: 5px 12px;
        border-radius: 8px;
        border: 1px solid #CBD5E1;
        font-size: 0.95rem;
        display: inline-block;
    }
    .btn-quick-fill {
        background: #EFF6FF;
        color: #2563EB;
        border: 1px solid #BFDBFE;
        padding: 6px 14px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.82rem;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .btn-quick-fill:hover {
        background: #2563EB;
        color: white;
    }
    </style>
</head>
<body>

    <!-- Topbar -->
    <header class="topbar">
        <div class="topbar-title">
            <i class="fas fa-ticket-alt"></i>
            <span>Vérification & Liaison des Bons Cadeaux</span>
        </div>
        <div>
            @php
                $dashboardUrl = Auth::guard('superadmin')->check() ? route('particuliers.superadmin.dashboard') : route('particuliers.admin.dashboard');
            @endphp
            <a href="{{ $dashboardUrl }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Retour au Tableau de Bord
            </a>
        </div>
    </header>

    <main class="main-container">

        <!-- Flash messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" style="border-radius: 16px; font-weight: 700; padding: 18px 24px; box-shadow: var(--shadow-sm);" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" style="border-radius: 16px; font-weight: 700; padding: 18px 24px; box-shadow: var(--shadow-sm);" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- SECTION 1: SEARCH BAR -->
        <section class="dashboard-card border-orange">
            <h2 class="card-title-custom">
                <i class="fas fa-search" style="color: var(--orange);"></i>
                1. Vérifier la validité d'un code
            </h2>
            <p class="card-subtitle-custom">
                Tapez le code unique communiqué par la cliente pour contrôler s'il a déjà été utilisé ou s'il est disponible.
            </p>

            <form action="{{ route('particuliers.admin.bons.rechercher') }}" method="POST">
                @csrf
                <div class="search-input-group">
                    <div class="search-input-wrap">
                        <i class="fas fa-barcode"></i>
                        <input type="text"
                               name="code"
                               id="searchInputCode"
                               class="search-input"
                               placeholder="Ex: BON-8K2P-9M4T"
                               value="{{ old('code', $searchedCode ?? '') }}"
                               autocomplete="off"
                               required
                               autofocus>
                    </div>
                    <button type="submit" class="btn-search">
                        <i class="fas fa-search"></i> Vérifier le statut du bon
                    </button>
                </div>
            </form>
        </section>

        <!-- SEARCH STATUS ALERTS (IF SEARCHED) -->
        @if(isset($hasSearched) && $hasSearched && !$searchedOrder)
            <!-- NOT FOUND -->
            <div class="alert alert-warning" style="border-radius: 18px; padding: 22px; border-left: 6px solid var(--warning); margin-bottom: 30px;">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <i class="fas fa-times-circle" style="font-size: 2.2rem; color: var(--warning);"></i>
                    <div>
                        <h4 style="margin: 0 0 4px; font-weight: 800; color: #92400E;">Code introuvable</h4>
                        <p style="margin: 0; color: #78350F;">
                            Le code <strong>« {{ $searchedCode }} »</strong> n'existe pas dans le système. Veuillez vérifier l'orthographe auprès de la cliente.
                        </p>
                    </div>
                </div>
            </div>
        @elseif($searchedOrder)

            @if($searchedOrder->is_used)
                <!-- ALREADY USED -->
                <div class="alert alert-danger" style="border-radius: 18px; padding: 25px; border-left: 6px solid var(--danger); background: white; box-shadow: var(--shadow-md); margin-bottom: 30px;">
                    <div style="display: inline-block; background: var(--danger-light); color: #991B1B; padding: 6px 14px; border-radius: 50px; font-weight: 800; font-size: 0.85rem; margin-bottom: 12px;">
                        <i class="fas fa-ban"></i> BON DÉJÀ UTILISÉ
                    </div>
                    <h3 style="font-weight: 800; color: #991B1B; margin-bottom: 8px;">
                        ⚠️ Ce bon a déjà été utilisé !
                    </h3>
                    <p style="color: var(--gray-600); margin-bottom: 15px;">
                        Ce bon ne peut pas être réutilisé car il a déjà été consommé pour une formation.
                    </p>

                    <div class="details-grid">
                        <div class="detail-item">
                            <span class="detail-label">Code du bon</span>
                            <span class="detail-value code-badge">{{ $searchedOrder->code }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Montant</span>
                            <span class="detail-value" style="color: var(--orange);">{{ number_format($searchedOrder->amount_paid, 0, ',', ' ') }} FCFA</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Formation liée</span>
                            <span class="detail-value" style="color: var(--blue);">
                                <i class="fas fa-graduation-cap me-1"></i> {{ $searchedOrder->formation->titre ?? 'Formation' }}
                            </span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Date d'utilisation</span>
                            <span class="detail-value">
                                <i class="fas fa-calendar-check me-1"></i>
                                {{ $searchedOrder->used_at ? $searchedOrder->used_at->format('d/m/Y à H:i') : '-' }}
                            </span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Client</span>
                            <span class="detail-value">{{ $searchedOrder->email }} ({{ $searchedOrder->phone }})</span>
                        </div>
                    </div>
                </div>
            @else
                <!-- VALID & AVAILABLE -->
                <div class="alert alert-success" style="border-radius: 18px; padding: 25px; border-left: 6px solid #10B981; background: white; box-shadow: var(--shadow-md); margin-bottom: 30px;">
                    <div style="display: inline-block; background: var(--success-light); color: #065F46; padding: 6px 14px; border-radius: 50px; font-weight: 800; font-size: 0.85rem; margin-bottom: 12px;">
                        <i class="fas fa-check-circle"></i> BON DISPONIBLE ET VALIDE
                    </div>
                    <h3 style="font-weight: 800; color: #065F46; margin-bottom: 8px;">
                        🎉 Ce bon est valide et prêt à être lié !
                    </h3>
                    <p style="color: var(--gray-600); margin-bottom: 15px;">
                        Le bon est prêt. Remplissez le formulaire ci-dessous pour choisir la formation désirée par la cliente et valider.
                    </p>

                    <div class="details-grid">
                        <div class="detail-item">
                            <span class="detail-label">Code du bon</span>
                            <span class="detail-value code-badge">{{ $searchedOrder->code }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Montant</span>
                            <span class="detail-value" style="color: var(--orange);">{{ number_format($searchedOrder->amount_paid, 0, ',', ' ') }} FCFA</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Client</span>
                            <span class="detail-value">{{ $searchedOrder->email }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Téléphone</span>
                            <span class="detail-value">{{ $searchedOrder->phone }}</span>
                        </div>
                    </div>
                </div>
            @endif

        @endif

        <!-- SECTION 2: PERMANENT FORM TO LINK FORMATION -->
        <section class="dashboard-card border-green" id="linkFormationSection">
            <h2 class="card-title-custom" style="color: #065F46;">
                <i class="fas fa-link" style="color: #10B981;"></i>
                2. Lier le bon à la formation désirée par la cliente
            </h2>
            <p class="card-subtitle-custom">
                Renseignez le code du bon et sélectionnez la formation dans la liste, puis cliquez sur le bouton vert pour valider.
            </p>

            <form action="{{ route('particuliers.admin.bons.lier_direct') }}" method="POST">
                @csrf

                <div class="row g-3 mb-3">
                    <!-- Code Input / Selection -->
                    <div class="col-md-6">
                        <label class="form-label-bold">
                            <i class="fas fa-barcode text-muted me-1"></i> Code du Bon Cadeau :
                        </label>
                        <input type="text"
                               name="code"
                               id="linkCodeInput"
                               class="form-control-custom"
                               placeholder="Ex: BON-8K2P-9M4T"
                               value="{{ old('code', $searchedOrder && !$searchedOrder->is_used ? $searchedOrder->code : ($searchedCode ?? '')) }}"
                               required
                               style="font-family: 'Courier New', monospace; font-weight: 800; letter-spacing: 1px; text-transform: uppercase;">

                        @if($availableVouchers->count() > 0)
                            <div class="mt-2">
                                <small class="text-muted">Ou sélectionner parmi les bons en attente :</small>
                                <select class="form-select form-select-sm mt-1" onchange="if(this.value) document.getElementById('linkCodeInput').value = this.value;">
                                    <option value="">-- Choisir un bon disponible --</option>
                                    @foreach($availableVouchers as $av)
                                        <option value="{{ $av->code }}">
                                            {{ $av->code }} — {{ number_format($av->amount_paid, 0, ',', ' ') }} F ({{ $av->email }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>

                    <!-- Formation Select -->
                    <div class="col-md-6">
                        <label class="form-label-bold">
                            <i class="fas fa-graduation-cap text-muted me-1"></i> Formation désirée par la cliente :
                        </label>
                        <select name="formation_id" class="form-control-custom" required>
                            <option value="">-- Sélectionnez la formation dans le catalogue --</option>
                            @foreach($formations as $f)
                                <option value="{{ $f->id }}">
                                    {{ $f->titre }} @if($f->categorie) ({{ $f->categorie }}) @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Notes -->
                <div class="mb-4">
                    <label class="form-label-bold">
                        <i class="fas fa-comment-dots text-muted me-1"></i> Notes / Nom de la cliente (Optionnel) :
                    </label>
                    <textarea name="notes" class="form-control-custom" rows="2" placeholder="Ex: Cliente Mme Koffi - Appel du 08/09 - Début prévu le mois prochain"></textarea>
                </div>

                <!-- SUBMIT BUTTON -->
                <button type="submit" class="btn-submit-link" onclick="return confirm('Confirmez-vous lier ce bon à cette formation ? Le bon passera au statut Utilisé.');">
                    <i class="fas fa-check-circle" style="font-size: 1.3rem;"></i>
                    Valider et lier le bon à cette formation
                </button>
            </form>
        </section>

        <!-- SECTION 3: AVAILABLE UNLINKED VOUCHERS -->
        <section class="dashboard-card">
            <h3 class="card-title-custom" style="font-size: 1.2rem;">
                <i class="fas fa-clock" style="color: var(--orange);"></i>
                Bons achetés en attente d'utilisation ({{ $availableVouchers->count() }})
            </h3>
            <p class="card-subtitle-custom">
                Liste des bons achetés qui n'ont pas encore été liés à une formation. Cliquez sur « Utiliser ce code » pour remplir le formulaire ci-dessus.
            </p>

            <div class="table-responsive">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Montant</th>
                            <th>Acheteur (Email)</th>
                            <th>Téléphone</th>
                            <th>Date d'achat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($availableVouchers as $av)
                            <tr>
                                <td><span class="code-badge">{{ $av->code ?? 'N/A' }}</span></td>
                                <td style="font-weight: 800; color: var(--orange);">{{ number_format($av->amount_paid, 0, ',', ' ') }} F</td>
                                <td>{{ $av->email }}</td>
                                <td>{{ $av->phone }}</td>
                                <td><small>{{ $av->created_at ? $av->created_at->format('d/m/Y H:i') : '-' }}</small></td>
                                <td>
                                    <button type="button"
                                            class="btn-quick-fill"
                                            onclick="document.getElementById('linkCodeInput').value = '{{ $av->code }}'; document.getElementById('linkFormationSection').scrollIntoView({behavior: 'smooth'});">
                                        <i class="fas fa-link"></i> Utiliser ce code
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 25px; color: var(--gray-400);">
                                    Aucun bon en attente d'utilisation pour le moment.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <!-- SECTION 4: RECENT VERIFIED / LINKED VOUCHERS -->
        <section class="dashboard-card">
            <h3 class="card-title-custom" style="font-size: 1.2rem;">
                <i class="fas fa-history" style="color: var(--blue-accent);"></i>
                Historique des bons vérifiés et attribués ({{ $recentVerified->count() }})
            </h3>
            <p class="card-subtitle-custom">
                Bons qui ont été validés et liés avec succès à une formation.
            </p>

            <div class="table-responsive">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Montant</th>
                            <th>Client</th>
                            <th>Formation liée</th>
                            <th>Date d'utilisation</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentVerified as $item)
                            <tr>
                                <td><span class="code-badge">{{ $item->code }}</span></td>
                                <td style="font-weight: 800; color: var(--orange);">{{ number_format($item->amount_paid, 0, ',', ' ') }} F</td>
                                <td>
                                    <strong>{{ $item->email }}</strong><br>
                                    <small style="color: var(--gray-400);">{{ $item->phone }}</small>
                                </td>
                                <td>
                                    <strong style="color: var(--blue);">
                                        <i class="fas fa-graduation-cap me-1" style="color: var(--blue-accent);"></i>
                                        {{ $item->formation->titre ?? 'Formation liée' }}
                                    </strong>
                                    @if($item->notes)
                                        <br><small style="color: var(--gray-600); font-style: italic;">{{ Str::limit($item->notes, 40) }}</small>
                                    @endif
                                </td>
                                <td>
                                    <small>{{ $item->used_at ? $item->used_at->format('d/m/Y H:i') : '-' }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-success" style="border-radius: 50px; padding: 6px 14px; font-weight: 700;">
                                        <i class="fas fa-check"></i> Utilisé
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 25px; color: var(--gray-400);">
                                    Aucun bon n'a encore été utilisé.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

    </main>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
