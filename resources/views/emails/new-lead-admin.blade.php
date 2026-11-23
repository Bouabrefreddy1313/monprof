<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau Lead Qualifié</title>
</head>
<body style="font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #FAFBFC; color: #0A1628; margin: 0; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(10,22,40,0.08); border: 1px solid #E8EAED;">
        <div style="background: linear-gradient(135deg, #0A1628, #1E3A5F); padding: 25px 30px; text-align: center;">
            <h1 style="color: #FF6B35; font-size: 22px; margin: 0; font-weight: 800;">🎯 NOUVEAU LEAD QUALIFIÉ</h1>
            <p style="color: #ffffff; opacity: 0.85; margin: 5px 0 0 0; font-size: 14px;">Diagnostic Personnalisé MonProfChezMoi</p>
        </div>

        <div style="padding: 30px;">
            <div style="background: #FFF7ED; border-left: 4px solid #FF6B35; padding: 15px 20px; border-radius: 8px; margin-bottom: 25px;">
                <p style="margin: 0; font-size: 15px; color: #9A3412; font-weight: 600;">
                    Le visiteur <strong>{{ $lead->prenom }}</strong> a complété le questionnaire et souhaite être recontacté !
                </p>
            </div>

            <h3 style="font-size: 16px; color: #0A1628; border-bottom: 2px solid #F1F3F4; padding-bottom: 8px; margin-top: 0;">Coordonnées du prospect</h3>
            <table style="width: 100%; border-collapse: collapse; font-size: 14px; margin-bottom: 25px;">
                <tr>
                    <td style="padding: 8px 0; color: #5F6368; width: 40%;">Prénom :</td>
                    <td style="padding: 8px 0; font-weight: bold; color: #0A1628;">{{ $lead->prenom }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #5F6368;">Téléphone :</td>
                    <td style="padding: 8px 0; font-weight: bold; color: #0A1628;">
                        <a href="tel:{{ $lead->telephone }}" style="color: #FF6B35; text-decoration: none;">{{ $lead->telephone }}</a>
                    </td>
                </tr>
                @if($lead->email)
                <tr>
                    <td style="padding: 8px 0; color: #5F6368;">Email :</td>
                    <td style="padding: 8px 0; font-weight: bold; color: #0A1628;">{{ $lead->email }}</td>
                </tr>
                @endif
                <tr>
                    <td style="padding: 8px 0; color: #5F6368;">Canal souhaité :</td>
                    <td style="padding: 8px 0; font-weight: bold; color: #0A1628; text-transform: uppercase;">{{ $lead->moyen_contact_prefere }}</td>
                </tr>
                @if($lead->creneau_rappel)
                <tr>
                    <td style="padding: 8px 0; color: #5F6368;">Meilleur créneau :</td>
                    <td style="padding: 8px 0; font-weight: bold; color: #0A1628;">{{ $lead->creneau_rappel }}</td>
                </tr>
                @endif
            </table>

            <h3 style="font-size: 16px; color: #0A1628; border-bottom: 2px solid #F1F3F4; padding-bottom: 8px;">Recommandation générée</h3>
            <div style="background: #F8F9FA; border-radius: 12px; padding: 15px; margin-bottom: 25px;">
                <p style="margin: 0 0 10px 0; font-size: 15px; font-weight: 700; color: #0A1628;">
                    {{ $lead->titre_recommandation ?: 'Orientation personnalisée requise' }}
                </p>
                @if($lead->url_page_recommandee)
                <p style="margin: 0 0 10px 0; font-size: 13px;">
                    <a href="{{ $lead->url_page_recommandee }}" style="color: #FF6B35; font-weight: bold; text-decoration: none;">Ouvrir la page conseillée &rarr;</a>
                </p>
                @endif
                @if($lead->titre_cours_recommande && $lead->titre_cours_recommande !== $lead->titre_recommandation)
                <p style="margin: 0; font-size: 13px; color: #5F6368;">
                    Cours associé : <strong>{{ $lead->titre_cours_recommande }}</strong>
                </p>
                @endif
                <p style="margin: 0; font-size: 13px; color: #5F6368; line-height: 1.5;">
                    {{ $lead->texte_recommandation }}
                </p>
            </div>

            <div style="text-align: center; margin-top: 30px;">
                <a href="{{ route('admin.leads.show', $lead->id) }}" style="display: inline-block; background: #FF6B35; color: #ffffff; text-decoration: none; padding: 14px 28px; border-radius: 10px; font-weight: bold; font-size: 15px; box-shadow: 0 4px 12px rgba(255,107,53,0.3);">
                    Voir la fiche complète dans le Dashboard Admin &rarr;
                </a>
            </div>
        </div>

        <div style="background: #F1F3F4; padding: 15px 30px; text-align: center; font-size: 12px; color: #5F6368;">
            Cet email a été envoyé automatiquement par le module de Diagnostic MonProfChezMoi.
        </div>
    </div>
</body>
</html>
