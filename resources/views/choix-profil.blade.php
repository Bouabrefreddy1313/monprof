<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - MonProfChezMoi</title>
    <meta name="description" content="MonProfChezMoi : soutien scolaire et activités pour les particuliers, formations professionnelles pour les entreprises.">
    <link rel="icon" href="{{ asset('asset/img/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --bleu: #0A1628;
            --bleu-clair: #1E3A5F;
            --orange: #FF6B35;
            --orange-fonce: #E85A2B;
            --bleu-pro: #2563EB;
            --creme: #FAFBFC;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
            background: var(--creme);
            color: var(--bleu);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .logo { width: 72px; height: 72px; margin-bottom: 20px; }

        h1 {
            font-size: clamp(1.6rem, 4vw, 2.4rem);
            font-weight: 800;
            text-align: center;
            margin-bottom: 10px;
        }

        .sous-titre {
            color: var(--bleu-clair);
            text-align: center;
            margin-bottom: 40px;
            font-size: 1.05rem;
        }

        form.choix {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 340px));
            gap: 24px;
            width: 100%;
            justify-content: center;
        }

        .carte {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 14px;
            width: 100%;
            padding: 32px 28px;
            background: #fff;
            border: 2px solid #E5E9F0;
            border-radius: 18px;
            font: inherit;
            color: inherit;
            text-align: left;
            cursor: pointer;
            transition: transform .2s ease, border-color .2s ease, box-shadow .2s ease;
        }

        .carte:hover, .carte:focus-visible {
            transform: translateY(-4px);
            box-shadow: 0 14px 30px rgba(10, 22, 40, .10);
            outline: none;
        }

        .carte.particulier:hover, .carte.particulier:focus-visible { border-color: var(--orange); }
        .carte.entreprise:hover, .carte.entreprise:focus-visible { border-color: var(--bleu-pro); }

        .carte .icone {
            width: 56px; height: 56px;
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem; color: #fff;
        }

        .particulier .icone { background: var(--orange); }
        .entreprise .icone { background: var(--bleu-pro); }

        .carte strong { font-size: 1.35rem; font-weight: 800; }
        .carte span.desc { color: var(--bleu-clair); line-height: 1.5; }
        .carte .accroche { display: block; font-weight: 700; color: var(--bleu); margin-bottom: 2px; }
        .carte .slogan { display: block; margin-bottom: 8px; }

        .carte .fleche {
            margin-top: auto;
            font-weight: 700;
            display: inline-flex; align-items: center; gap: 8px;
        }

        .particulier .fleche { color: var(--orange-fonce); }
        .entreprise .fleche { color: var(--bleu-pro); }

        .badge-actuel {
            position: absolute; top: 16px; right: 16px;
            font-size: .75rem; font-weight: 700;
            padding: 4px 10px; border-radius: 999px;
            background: #EEF2F7; color: var(--bleu-clair);
        }

        .note {
            margin-top: 32px;
            font-size: .85rem;
            color: #6B7A90;
            text-align: center;
        }

        @media (max-width: 720px) {
            form.choix { grid-template-columns: minmax(0, 420px); }
        }
    </style>
</head>
<body>
    <img src="{{ asset('asset/img/logo.png') }}" alt="MonProfChezMoi" class="logo" width="72" height="72">

    <h1>Vous êtes une entreprise ou un particulier ?</h1>
    <p class="sous-titre">Choisissez votre espace pour accéder aux offres qui vous correspondent.</p>

    @error('profil')
        <p class="sous-titre" role="alert" style="color:#C0392B">{{ $message }}</p>
    @enderror

    <form method="POST" action="{{ route('profil.enregistrer') }}" class="choix">
        @csrf

        <button type="submit" name="profil" value="particulier" class="carte particulier">
            @if($profilActuel === 'particulier')
                <span class="badge-actuel">Votre espace actuel</span>
            @endif
            <span class="icone" aria-hidden="true"><i class="fas fa-user-graduate"></i></span>
            <strong>Particulier</strong>
            <span class="desc">
                <span class="accroche">Une offre pour toute la famille</span>
                <em class="slogan">Un accompagnement adapté à vos besoins !</em>
                Soutien scolaire, activités extrascolaires et accompagnement personnalisé pour les enfants, les adolescents et les adultes.
            </span>
            <span class="fleche">Accéder à l'espace particuliers <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
        </button>

        <button type="submit" name="profil" value="entreprise" class="carte entreprise">
            @if($profilActuel === 'entreprise')
                <span class="badge-actuel">Votre espace actuel</span>
            @endif
            <span class="icone" aria-hidden="true"><i class="fas fa-building"></i></span>
            <strong>Entreprise</strong>
            <span class="desc">Formations professionnelles, catalogues, bons de formation et demandes de devis pour vos équipes.</span>
            <span class="fleche">Accéder à l'espace entreprises <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
        </button>
    </form>

    <p class="note">Votre choix est mémorisé pendant 30 jours. Vous pourrez changer d'espace à tout moment depuis le menu.</p>
</body>
</html>
