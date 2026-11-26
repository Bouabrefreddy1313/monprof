{{--
    Layout de l'espace PARTICULIERS.
    Usage :
        @extends('layouts.particulier')
        @section('title', 'Titre de la page')
        @section('content') ... @endsection
    Le header (partials/header) contient le lien « Espace entreprises » (route profil.choisir).
--}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'MonProfChezMoi - Espace particuliers')</title>
    <meta name="description" content="@yield('description', 'Soutien scolaire, cours à domicile et activités extrascolaires à Abidjan.')">

    <link href="{{ asset('asset/img/favicon.png') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('asset/css/courscss/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/courscss/style.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body class="espace-particuliers">
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    @include('components.newsletter-popup')
    @include('components.chatbot')
    @stack('scripts')
</body>
</html>
