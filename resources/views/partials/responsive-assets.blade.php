{{--
    Styles et scripts responsive communs à tout le site.
    Inclus automatiquement par partials/header ; les pages sans header
    l'incluent elles-mêmes. @once évite un double chargement.
    Le paramètre ?v= change à chaque modification du fichier (vide le cache navigateur).
--}}
@once
    <link rel="stylesheet" href="{{ asset('asset/css/responsive.css') }}?v={{ @filemtime(public_path('asset/css/responsive.css')) }}">
    <script src="{{ asset('asset/js/responsive.js') }}?v={{ @filemtime(public_path('asset/js/responsive.js')) }}" defer></script>
@endonce
