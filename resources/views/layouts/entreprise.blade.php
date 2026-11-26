{{--
    Layout de l'espace ENTREPRISES.
    Usage :
        @extends('layouts.entreprise')
        @section('title', 'Titre de la page')
        @section('content') ... @endsection
    Le header (entreprises/partials/header) ouvre lui-même <html>, <head> et <body> (Bootstrap 5.3,
    Font Awesome) et contient le lien « Espace particuliers » (route profil.choisir).
--}}
@include('entreprises.partials.header', ['title' => View::yieldContent('title', 'MonProfChezMoi - Espace entreprises')])

@stack('styles')

<main class="espace-entreprises">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
