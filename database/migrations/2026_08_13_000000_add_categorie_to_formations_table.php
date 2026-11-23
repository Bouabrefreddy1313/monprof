<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Formation;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('formations', function (Blueprint $table) {
            $table->string('categorie')->nullable()->after('description');
        });

        $transversales = [
            'INFORMATIQUE',
            'LANGUES',
            'CUISINE ET TECHNIQUES CULINAIRES',
            'COMMUNICATION ÉCRITE',
            'MANAGEMENT ET LEADERSHIP',
            'DÉVELOPPEMENT PERSONNEL & SOFT SKILLS',
            'COACHING & ACCOMPAGNEMENT',
            'RESSOURCES HUMAINES (RH)',
            'GESTION DE PROJET',
            'FORMATION POUR FORMATEURS',
            'ADMINISTRATION',
            'BUREAUTIQUE ET PAO',
            'DÉVELOPPEMENT PROFESSIONNEL',
            'FRANÇAIS',
            'BILAN DE COMPÉTENCES',
            'SPORT ET LOISIRS',
        ];

        $metiers = [
            'FORMATIONS QHSE (QUALITÉ, HYGIÈNE, SÉCURITÉ, ENVIRONNEMENT)',
            'WEB & DÉVELOPPEMENT WEB',
            'FINANCE, BANQUE, AUDIT',
            'COMMERCIAL',
            'ART',
            'FORMATION EN ACHATS',
            'JURIDIQUE',
            'GRAPHISME',
            'BEAUTÉ ET SANTÉ',
            'COMPTABILITÉ ET GESTION',
            'TOURISME',
            'MARKETING & WEB MARKETING',
            'VENTE ET RELATION CLIENT',
            'DESIGN ET DÉCORATION',
            'SPORT ET LOISIRS',
        ];

        foreach (Formation::all() as $formation) {
            $titre = mb_strtoupper(trim($formation->titre));
            $categories = [];

            if (in_array($titre, array_map('mb_strtoupper', $transversales), true)) {
                $categories[] = 'transversale';
            }
            if (in_array($titre, array_map('mb_strtoupper', $metiers), true)) {
                $categories[] = 'metier';
            }

            $formation->categorie = $categories ? implode(',', $categories) : 'transversale';
            $formation->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('formations', function (Blueprint $table) {
            $table->dropColumn('categorie');
        });
    }
};
