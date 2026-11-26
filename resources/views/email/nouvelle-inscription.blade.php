<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouvelle inscription</title>
    <style>
        body { font-family: 'Nunito', sans-serif; background: #f8f9fa; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 16px; padding: 30px; }
        .header { text-align: center; margin-bottom: 30px; }
        .header h1 { color: #0A1628; font-size: 1.5rem; }
        .header span { color: #FF6B35; }
        .info-box { background: #FAFBFC; border-radius: 12px; padding: 20px; margin-bottom: 20px; }
        .info-row { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #E8EAED; }
        .info-row:last-child { border-bottom: none; }
        .label { color: #5F6368; font-size: 0.9rem; }
        .value { color: #0A1628; font-weight: 600; font-size: 0.9rem; }
        .highlight { background: rgba(255,107,53,0.1); border: 1px solid rgba(255,107,53,0.2); border-radius: 8px; padding: 15px; text-align: center; margin: 20px 0; }
        .highlight strong { color: #FF6B35; font-size: 1.2rem; }
        .btn { display: inline-block; background: #FF6B35; color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 700; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📋 Nouvelle <span>inscription</span></h1>
            <p>Une nouvelle inscription vient d'être soumise sur le site.</p>
        </div>

        <div class="info-box">
            <div class="info-row">
                <span class="label">Parent</span>
                <span class="value">{{ $inscription->nom_parent }}</span>
            </div>
            <div class="info-row">
                <span class="label">Enfant</span>
                <span class="value">{{ $inscription->nom_enfant }} ({{ $inscription->age_enfant }} ans)</span>
            </div>
            <div class="info-row">
                <span class="label">Téléphone</span>
                <span class="value">{{ $inscription->telephone }}</span>
            </div>
            <div class="info-row">
                <span class="label">Email</span>
                <span class="value">{{ $inscription->email ?? 'Non fourni' }}</span>
            </div>
        </div>

        <div class="info-box">
            <div class="info-row">
                <span class="label">Activité</span>
                <span class="value">{{ $inscription->activite }}</span>
            </div>
            <div class="info-row">
                <span class="label">Lieu</span>
                <span class="value">{{ $inscription->lieu_label }}</span>
            </div>
            <div class="info-row">
                <span class="label">Jours</span>
                <span class="value">{{ implode(', ', $inscription->jours) }}</span>
            </div>
            <div class="info-row">
                <span class="label">Horaire</span>
                <span class="value">{{ $inscription->horaire ?? 'Non précisé' }}</span>
            </div>
        </div>

        <div class="highlight">
            <p>Frais de réservation à percevoir :</p>
            <strong>{{ number_format($inscription->frais_reservation, 0, ',', ' ') }} FCFA</strong>
        </div>

        <center>
            <a href="{{ url('/particuliers/admin/inscriptions/' . $inscription->id) }}" class="btn">Voir l'inscription</a>
        </center>
    </div>
</body>
</html>
