<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Voir les colonnes de Formation
$f = App\Models\Formation::first();
echo "=== FORMATION ===\n";
echo "Colonnes: " . json_encode(array_keys($f->getAttributes()), JSON_PRETTY_PRINT) . "\n";
echo "Titre: " . $f->titre . "\n";
echo "Prix: " . var_export($f->prix, true) . "\n";

// Voir les colonnes de Cours
$c = App\Models\Cours::first();
echo "\n=== COURS ===\n";
echo "Colonnes: " . json_encode(array_keys($c->getAttributes()), JSON_PRETTY_PRINT) . "\n";
echo "Prix: " . var_export($c->prix, true) . "\n";

// Lister tous les formations avec leurs prix
echo "\n=== TOUTES LES FORMATIONS AVEC PRIX ===\n";
$formations = App\Models\Formation::all();
foreach ($formations as $f) {
    echo "- " . $f->titre . " | prix=" . var_export($f->prix, true) . " | duree=" . var_export($f->duree, true) . "\n";
}
