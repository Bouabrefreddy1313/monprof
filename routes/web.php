<?php

use App\Http\Controllers\ProfilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\HttpException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Le site réunit deux espaces :
|   - /particuliers  (routes/particuliers.php, noms "particuliers.*")
|   - /entreprises   (routes/entreprises.php,  noms "entreprises.*")
|
| La racine "/" demande au visiteur s'il est une entreprise ou un particulier.
| Le choix est mémorisé 30 jours dans le cookie "profil".
|
*/

// ===== CHOIX DU PROFIL =====
Route::get('/', [ProfilController::class, 'index'])->name('profil.index');
Route::get('/choisir-profil', [ProfilController::class, 'choisir'])->name('profil.choisir');
Route::post('/choisir-profil', [ProfilController::class, 'enregistrer'])->name('profil.enregistrer');

// ===== ESPACE PARTICULIERS (site 1) =====
Route::prefix('particuliers')
    ->name('particuliers.')
    ->group(base_path('routes/particuliers.php'));

// ===== ESPACE ENTREPRISES (site 2) =====
Route::prefix('entreprises')
    ->name('entreprises.')
    ->middleware(['espace.entreprise', 'entreprises.visite'])
    ->group(base_path('routes/entreprises.php'));

// Dans un groupe name('xxx.'), Laravel nomme "xxx." les routes qui n'ont pas de nom :
// ce nom partagé ferait échouer `php artisan route:cache`. On le retire.
foreach (Route::getRoutes()->getRoutes() as $route) {
    if (in_array($route->getName(), ['particuliers.', 'entreprises.'], true)) {
        $action = $route->getAction();
        unset($action['as']);
        $route->setAction($action);
    }
}
Route::getRoutes()->refreshNameLookups();

// ===== ANCIENNES URL DU SITE PARTICULIERS =====
// Les liens existants (moteurs de recherche, favoris, e-mails déjà envoyés) pointent
// vers l'ancienne racine : on les redirige en 301 vers /particuliers/... si la page existe.
Route::fallback(function (Request $request) {
    $chemin = ltrim($request->path(), '/');

    if (($request->isMethod('GET') || $request->isMethod('HEAD'))
        && ! preg_match('#^(particuliers|entreprises)(/|$)#', $chemin)) {
        $cible = '/particuliers/' . $chemin;

        try {
            $route = app('router')->getRoutes()->match(Request::create($cible, 'GET'));

            if (! $route->isFallback) {
                $query = $request->getQueryString();

                return redirect($cible . ($query ? '?' . $query : ''), 301);
            }
        } catch (HttpException $e) {
            // Aucune page équivalente : on renvoie une 404 normale.
        }
    }

    abort(404);
});
