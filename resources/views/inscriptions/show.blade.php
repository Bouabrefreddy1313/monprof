<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Détail inscription #{{ $inscription->id }} - Admin</title>
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
        body { font-family: 'Nunito', sans-serif; background: var(--gray-50); color: var(--gray-800); line-height: 1.6; }

        .admin-header {
            background: linear-gradient(135deg, var(--blue), var(--blue-light));
            padding: 30px;
            color: white;
        }
        .admin-header h1 { font-size: 1.6rem; font-weight: 800; }
        .back-link {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
        }
        .back-link:hover { color: white; }

        .container { max-width: 900px; margin: 0 auto; padding: 30px; }

        .detail-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 2px 8px rgba(10,22,40,0.06);
        }
        .card h2 {
            font-size: 1.1rem;
            color: var(--blue);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .card h2 i { color: var(--orange); }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid var(--gray-100);
        }
        .info-row:last-child { border-bottom: none; }
        .info-label { color: var(--gray-600); font-size: 0.9rem; }
        .info-value { color: var(--blue); font-weight: 600; font-size: 0.9rem; text-align: right; }
        .info-value.orange { color: var(--orange); }
        .info-value.green { color: var(--green); }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .badge-en_attente { background: rgba(245,158,11,0.1); color: var(--yellow); }
        .badge-contacte { background: rgba(59,130,246,0.1); color: #3B82F6; }
        .badge-confirme { background: rgba(34,197,94,0.1); color: var(--green); }
        .badge-annule { background: rgba(239,68,68,0.1); color: var(--red); }

        .actions-card {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .btn {
            padding: 14px 20px;
            border-radius: 12px;
            border: none;
            font-family: 'Nunito', sans-serif;
            font-size: 0.9rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-orange { background: var(--orange); color: white; }
        .btn-orange:hover { background: var(--orange-dark); transform: translateY(-2px); }
        .btn-green { background: var(--green); color: white; }
        .btn-green:hover { background: #16a34a; transform: translateY(-2px); }
        .btn-blue { background: #3B82F6; color: white; }
        .btn-blue:hover { background: #2563eb; transform: translateY(-2px); }
        .btn-red { background: var(--red); color: white; }
        .btn-red:hover { background: #dc2626; transform: translateY(-2px); }
        .btn-outline {
            background: white;
            border: 2px solid var(--gray-200);
            color: var(--gray-800);
        }
        .btn-outline:hover { border-color: var(--orange); color: var(--orange); }

        .notes-area {
            margin-top: 20px;
        }
        .notes-area textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            font-family: 'Nunito', sans-serif;
            font-size: 0.9rem;
            resize: vertical;
            min-height: 80px;
        }
        .notes-area textarea:focus {
            outline: none;
            border-color: var(--orange);
        }

        .jours-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }
        .jour-tag {
            background: rgba(255,107,53,0.1);
            color: var(--orange);
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .alert {
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .alert-success { background: rgba(34,197,94,0.1); color: var(--green); }

        @media (max-width: 767px) {
            .detail-grid { grid-template-columns: 1fr; }
            .container { padding: 20px; }
        }
    </style>
</head>
<body>

<div class="admin-header">
    <div class="container" style="padding: 0 30px;">
        <a href="{{ route('admin.inscriptions.index') }}" class="back-link"><i class="fas fa-arrow-left"></i> Retour à la liste</a>
        <h1><i class="fas fa-clipboard-check"></i> Inscription #{{ $inscription->id }}</h1>
    </div>
</div>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="detail-grid">
        <div>
            <!-- Informations parent/enfant -->
            <div class="card" style="margin-bottom: 24px;">
                <h2><i class="fas fa-user"></i> Informations du participant</h2>
                <div class="info-row">
                    <span class="info-label">Nom du parent</span>
                    <span class="info-value">{{ $inscription->nom_parent }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Nom de l'enfant</span>
                    <span class="info-value">{{ $inscription->nom_enfant }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Âge</span>
                    <span class="info-value">{{ $inscription->age_enfant }} ans</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Téléphone</span>
                    <span class="info-value orange"><i class="fas fa-phone"></i> {{ $inscription->telephone }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value">{{ $inscription->email ?? 'Non fourni' }}</span>
                </div>
            </div>

            <!-- Détails activité -->
            <div class="card" style="margin-bottom: 24px;">
                <h2><i class="fas fa-bullseye"></i> Détails de l'activité</h2>
                <div class="info-row">
                    <span class="info-label">Activité choisie</span>
                    <span class="info-value orange">{{ $inscription->activite }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Date de début souhaitée</span>
                    <span class="info-value">{{ $inscription->date_debut ? $inscription->date_debut->format('d/m/Y') : 'Non précisée' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Lieu</span>
                    <span class="info-value">{{ $inscription->lieu_label }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Jours disponibles</span>
                    <span class="info-value">
                        <div class="jours-tags">
                            @foreach($inscription->jours as $jour)
                                <span class="jour-tag">{{ $jour }}</span>
                            @endforeach
                        </div>
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Horaire préféré</span>
                    <span class="info-value">{{ $inscription->horaire ?? 'Non précisé' }}</span>
                </div>
            </div>

            <!-- Paiement -->
            <div class="card">
                <h2><i class="fas fa-credit-card"></i> Informations de paiement</h2>
                <div class="info-row">
                    <span class="info-label">Type de paiement</span>
                    <span class="info-value">{{ $inscription->type_paiement_label }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Mode de paiement préféré</span>
                    <span class="info-value">{{ $inscription->mode_paiement_label }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Prix de la formule</span>
                    <span class="info-value">{{ number_format($inscription->prix_formule, 0, ',', ' ') }} FCFA</span>
                </div>
                <div class="info-row" style="background: rgba(255,107,53,0.05); margin: 0 -28px; padding: 16px 28px;">
                    <span class="info-label" style="color: var(--orange);"><strong>Frais de réservation</strong></span>
                    <span class="info-value orange" style="font-size: 1.1rem;"><strong>{{ number_format($inscription->frais_reservation, 0, ',', ' ') }} FCFA</strong></span>
                </div>
            </div>
        </div>

        <!-- Sidebar actions -->
        <div>
            <div class="card actions-card">
                <h2><i class="fas fa-cog"></i> Actions</h2>

                <span class="info-label" style="margin-bottom: 8px;">Statut actuel :</span>
                <span class="badge badge-{{ $inscription->statut }}" style="margin-bottom: 20px; justify-content: center;">
                    {{ $inscription->statut_label }}
                </span>

                @if($inscription->statut == 'en_attente')
                    <form action="{{ route('admin.inscriptions.contacte', $inscription) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-blue"><i class="fas fa-phone"></i> Marquer comme contacté</button>
                    </form>
                @endif

                @if($inscription->statut == 'contacte')
                    <form action="{{ route('admin.inscriptions.confirme', $inscription) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-green"><i class="fas fa-check"></i> Confirmer l'inscription</button>
                    </form>
                @endif

                @if(!in_array($inscription->statut, ['annule']))
                    <form action="{{ route('admin.inscriptions.annuler', $inscription) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir annuler cette inscription ?')">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-red"><i class="fas fa-times"></i> Annuler l'inscription</button>
                    </form>
                @endif

                <a href="tel:{{ $inscription->telephone }}" class="btn btn-orange"><i class="fas fa-phone-alt"></i> Appeler le parent</a>
            </div>

            <!-- Notes admin -->
            <div class="card" style="margin-top: 24px;">
                <h2><i class="fas fa-sticky-note"></i> Notes</h2>
                @if($inscription->notes_admin)
                    <div style="background: var(--gray-50); padding: 16px; border-radius: 10px; margin-bottom: 16px; font-size: 0.9rem; color: var(--gray-800);">
                        {{ $inscription->notes_admin }}
                    </div>
                @endif
                <form action="{{ route('admin.inscriptions.notes', $inscription) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="notes-area">
                        <textarea name="notes_admin" placeholder="Ajouter des notes sur cette inscription...">{{ $inscription->notes_admin }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-outline" style="width: 100%; margin-top: 12px;"><i class="fas fa-save"></i> Enregistrer les notes</button>
                </form>
            </div>

            <!-- Métadonnées -->
            <div class="card" style="margin-top: 24px;">
                <h2><i class="fas fa-info-circle"></i> Informations système</h2>
                <div class="info-row">
                    <span class="info-label">ID</span>
                    <span class="info-value">#{{ $inscription->id }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Date d'inscription</span>
                    <span class="info-value">{{ $inscription->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Dernière mise à jour</span>
                    <span class="info-value">{{ $inscription->updated_at->format('d/m/Y H:i') }}</span>
                </div>
                @if($inscription->date_contact)
                <div class="info-row">
                    <span class="info-label">Date de contact</span>
                    <span class="info-value green">{{ $inscription->date_contact->format('d/m/Y H:i') }}</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>


@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>
