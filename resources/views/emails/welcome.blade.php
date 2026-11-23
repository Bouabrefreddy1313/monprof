<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <title>Bienvenue chez MonProfChezMoi</title>
    <style>
        body { margin: 0; padding: 0; width: 100% !important; }
        a { text-decoration: none; }
        @media only screen and (max-width: 620px) {
            .container { width: 100% !important; }
            .px { padding-left: 24px !important; padding-right: 24px !important; }
            .h1 { font-size: 24px !important; line-height: 32px !important; }
        }
    </style>
</head>
<body style="margin:0; padding:0; background-color:#EEF2F7;">

    {{-- Texte d'aperçu (affiché dans la boîte de réception, invisible dans l'email) --}}
    <div style="display:none; max-height:0; overflow:hidden; mso-hide:all;">
        Merci pour votre inscription ! Conseils, offres exclusives et actualités pour la réussite de votre enfant.
    </div>

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#EEF2F7;">
        <tr>
            <td align="center" style="padding:32px 12px;">

                <table role="presentation" class="container" width="600" cellspacing="0" cellpadding="0" border="0" style="width:600px; max-width:600px; background-color:#FFFFFF; border-radius:12px; overflow:hidden;">

                    {{-- Bande orange --}}
                    <tr><td style="height:6px; line-height:6px; font-size:0; background-color:#F7931E;">&nbsp;</td></tr>

                    {{-- En-tête --}}
                    <tr>
                        <td align="center" class="px" style="background-color:#0D3B66; padding:36px 40px 40px;">
                            <img src="{{ asset('asset/img/logo.png') }}" width="96" height="96" alt="MonProfChezMoi" style="display:block; width:96px; height:96px; border:0; margin:0 auto 20px;">
                            <h1 class="h1" style="margin:0 0 10px; font-family:Arial, Helvetica, sans-serif; font-size:28px; line-height:36px; font-weight:bold; color:#FFFFFF;">
                                Bienvenue dans la communauté !
                            </h1>
                            <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:16px; line-height:24px; color:#FFFFFF;">
                                Votre inscription à la newsletter est confirmée.
                            </p>
                        </td>
                    </tr>

                    {{-- Introduction --}}
                    <tr>
                        <td class="px" style="padding:40px 40px 8px; font-family:Arial, Helvetica, sans-serif;">
                            <p style="margin:0 0 16px; font-size:18px; line-height:26px; font-weight:bold; color:#0D3B66;">Bonjour,</p>
                            <p style="margin:0 0 16px; font-size:16px; line-height:26px; color:#1F2937;">
                                Merci de vous être abonné à la newsletter <strong style="color:#0D3B66;">MonProfChezMoi</strong>. Nous sommes ravis de vous compter parmi nous.
                            </p>
                            <p style="margin:0; font-size:16px; line-height:26px; color:#1F2937;">
                                Régulièrement, nous vous partagerons le meilleur de l'accompagnement scolaire en Côte d'Ivoire pour aider votre enfant à réussir.
                            </p>
                        </td>
                    </tr>

                    {{-- Ce que vous allez recevoir --}}
                    <tr>
                        <td class="px" style="padding:32px 40px 8px; font-family:Arial, Helvetica, sans-serif;">
                            <p style="margin:0 0 20px; font-size:13px; line-height:18px; font-weight:bold; letter-spacing:1px; text-transform:uppercase; color:#F7931E;">
                                Ce que vous allez recevoir
                            </p>

                            @php
                                $benefits = [
                                    ['📚', 'Conseils pédagogiques', 'Articles et astuces pour mieux travailler à la maison.'],
                                    ['🎯', 'Offres exclusives', 'Des promotions réservées à nos abonnés.'],
                                    ['💡', 'Guides pratiques', 'Méthodologie, organisation et techniques de révision.'],
                                    ['📅', 'Actualités', 'Nos nouveaux programmes, ateliers et événements.'],
                                    ['🎓', 'Témoignages', 'Comment nos élèves progressent et réussissent.'],
                                ];
                            @endphp

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                @foreach ($benefits as $i => [$icon, $title, $text])
                                <tr>
                                    <td width="52" valign="top" style="padding:14px 0; {{ $i < count($benefits) - 1 ? 'border-bottom:1px solid #E5E7EB;' : '' }}">
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td align="center" valign="middle" width="40" height="40" style="width:40px; height:40px; background-color:#FFF1E0; border-radius:8px; font-size:20px; line-height:40px;">{{ $icon }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td valign="top" style="padding:14px 0 14px 4px; {{ $i < count($benefits) - 1 ? 'border-bottom:1px solid #E5E7EB;' : '' }}">
                                        <p style="margin:0 0 4px; font-size:16px; line-height:22px; font-weight:bold; color:#0D3B66;">{{ $title }}</p>
                                        <p style="margin:0; font-size:15px; line-height:22px; color:#374151;">{{ $text }}</p>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>

                    {{-- Bouton --}}
                    <tr>
                        <td align="center" class="px" style="padding:32px 40px;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td align="center" style="background-color:#F7931E; border-radius:8px;">
                                        <a href="{{ url('/') }}" target="_blank" style="display:inline-block; padding:16px 36px; font-family:Arial, Helvetica, sans-serif; font-size:16px; line-height:20px; font-weight:bold; color:#FFFFFF; text-decoration:none; border-radius:8px;">
                                            Découvrir nos formations&nbsp;&rarr;
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Pourquoi nous faire confiance --}}
                    <tr>
                        <td class="px" style="padding:0 40px 40px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#EAF2FB; border-left:4px solid #1B75BC; border-radius:6px;">
                                <tr>
                                    <td style="padding:20px 24px; font-family:Arial, Helvetica, sans-serif;">
                                        <p style="margin:0 0 8px; font-size:16px; line-height:22px; font-weight:bold; color:#0D3B66;">Pourquoi nous faire confiance ?</p>
                                        <p style="margin:0 0 12px; font-size:15px; line-height:24px; color:#1F2937;">
                                            Depuis 2019, nous avons accompagné plus de <strong>500 familles</strong> en Côte d'Ivoire. Nos coachs scolaires sont sélectionnés pour leur expertise et leur passion de l'éducation.
                                        </p>
                                        <p style="margin:0; font-size:15px; line-height:24px; color:#1F2937;">
                                            <strong style="color:#0D3B66;">Suivi personnalisé :</strong> chaque élève bénéficie d'un accompagnement adapté à son niveau et à ses objectifs.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Pied de page --}}
                    <tr>
                        <td align="center" class="px" style="background-color:#0D3B66; padding:32px 40px; font-family:Arial, Helvetica, sans-serif;">
                            <p style="margin:0 0 16px; font-size:14px; line-height:20px;">
                                <a href="https://lc.cx/bI7TWa" target="_blank" style="color:#FFFFFF; font-weight:bold; text-decoration:none;">Facebook</a>
                                <span style="color:#7FA7CF;">&nbsp;&middot;&nbsp;</span>
                                <a href="https://lc.cx/bRCp37" target="_blank" style="color:#FFFFFF; font-weight:bold; text-decoration:none;">LinkedIn</a>
                                <span style="color:#7FA7CF;">&nbsp;&middot;&nbsp;</span>
                                <a href="https://lc.cx/apXwPN" target="_blank" style="color:#FFFFFF; font-weight:bold; text-decoration:none;">Instagram</a>
                                <span style="color:#7FA7CF;">&nbsp;&middot;&nbsp;</span>
                                <a href="https://youtube.com/@Monprofchezmoi" target="_blank" style="color:#FFFFFF; font-weight:bold; text-decoration:none;">YouTube</a>
                            </p>
                            <p style="margin:0 0 16px; font-size:14px; line-height:22px; color:#E5EDF5;">
                                <strong style="color:#FFFFFF;">MonProfChezMoi</strong><br>
                                Riviera 4 Synacassi 1, Abidjan, Côte d'Ivoire<br>
                                <a href="tel:+2250153751544" style="color:#E5EDF5; text-decoration:none;">+225 01 53 75 15 44</a>
                                &nbsp;&middot;&nbsp;
                                <a href="mailto:info@monprofchezmoi-ci.com" style="color:#E5EDF5; text-decoration:none;">info@monprofchezmoi-ci.com</a>
                            </p>
                            <p style="margin:0; font-size:13px; line-height:20px; color:#C5D4E3;">
                                Vous recevez cet email car <strong style="color:#FFFFFF;">{{ $email }}</strong> s'est inscrit sur notre site.<br>
                                <a href="{{ url('/unsubscribe?email=' . urlencode($email)) }}" style="color:#F7931E; text-decoration:underline;">Se désabonner</a>
                                &nbsp;&middot;&nbsp; © {{ date('Y') }} MonProfChezMoi-ci.com
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>
</body>
</html>
