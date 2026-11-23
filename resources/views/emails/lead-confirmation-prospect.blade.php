<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Votre Recommandation Personnalisée</title>
</head>
<body style="font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #FAFBFC; color: #0A1628; margin: 0; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(10,22,40,0.08); border: 1px solid #E8EAED;">
        <div style="background: linear-gradient(135deg, #0A1628, #1E3A5F); padding: 30px; text-align: center;">
            <h1 style="color: #FF6B35; font-size: 24px; margin: 0; font-weight: 800;">MonProfChezMoi</h1>
            <p style="color: #ffffff; opacity: 0.9; margin: 8px 0 0 0; font-size: 15px;">Votre diagnostic personnalisé gratuit</p>
        </div>

        <div style="padding: 30px;">
            <p style="font-size: 16px; margin-top: 0;">Bonjour <strong>{{ $lead->prenom }}</strong>,</p>
            <p style="font-size: 14px; color: #5F6368; line-height: 1.6;">
                Merci d'avoir pris le temps de répondre à notre questionnaire d'orientation. Voici la synthèse de votre solution sur mesure :
            </p>

            <div style="background: #F8F9FA; border-radius: 12px; padding: 20px; border-left: 4px solid #FF6B35; margin: 25px 0;">
                <h2 style="font-size: 18px; color: #0A1628; margin: 0 0 10px 0;">
                    {{ $lead->titre_recommandation ?: 'Solution personnalisée avec un conseiller' }}
                </h2>
                <p style="font-size: 14px; color: #3C4043; line-height: 1.5; margin: 0;">
                    {{ $lead->texte_recommandation }}
                </p>
                @if($lead->coursRecommande)
                <div style="margin-top: 15px;">
                    <a href="{{ route('cours', $lead->cours_recommande_id) }}" style="display: inline-block; color: #FF6B35; font-weight: bold; font-size: 13px; text-decoration: none;">
                        Découvrir le programme complet du cours &rarr;
                    </a>
                </div>
                @endif
            </div>

            <p style="font-size: 14px; color: #5F6368; line-height: 1.6;">
                Un conseiller pédagogique de notre équipe a bien reçu votre demande et vous contactera très prochainement selon votre modalité préférée (<strong>{{ strtoupper($lead->moyen_contact_prefere) }}</strong>).
            </p>

            <div style="text-align: center; margin-top: 30px; padding: 20px; background: #ECFDF5; border-radius: 12px;">
                <p style="margin: 0 0 10px 0; font-size: 14px; color: #065F46; font-weight: 600;">
                    Besoin d'une réponse immédiate ? Contactez-nous directement sur WhatsApp :
                </p>
                @php
                    $waNumber = \App\Models\DiagnosticConfig::get('whatsapp_contact_number', '2250700000000');
                    $waMsg = urlencode("Bonjour, je suis " . $lead->prenom . ". J'ai complété le diagnostic pour : " . ($lead->titre_recommandation ?: 'un accompagnement'));
                @endphp
                <a href="https://wa.me/{{ $waNumber }}?text={{ $waMsg }}" style="display: inline-block; background: #25D366; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: bold; font-size: 14px;">
                    💬 Échanger sur WhatsApp
                </a>
            </div>
        </div>

        <div style="background: #F1F3F4; padding: 20px 30px; text-align: center; font-size: 12px; color: #5F6368;">
            MonProfChezMoi — Accompagnement scolaire & Formations certifiantes<br>
            Abidjan, Côte d'Ivoire | info@monprofchezmoi-ci.com
        </div>
    </div>
</body>
</html>
