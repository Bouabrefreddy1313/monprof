<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            // Recommandation de PAGE du site (DiagnosticPageRecommendationService) :
            // c'est elle que le visiteur voit réellement dans le modal du diagnostic.
            $table->json('page_recommandee')->nullable()->after('titre_cours_recommande');
            // True quand l'admin a remplacé manuellement le cours recommandé
            // (auquel cas son choix prime à l'affichage).
            $table->boolean('recommandation_manuelle')->default(false)->after('aucune_correspondance');
        });

        // Backfill des leads existants : la page était concaténée en texte libre
        // « Page conseillée : {titre} ({type_label} — {url}) » en fin de texte.
        $leads = DB::table('leads')
            ->whereNotNull('texte_recommandation')
            ->whereNull('page_recommandee')
            ->get(['id', 'texte_recommandation']);

        foreach ($leads as $lead) {
            $matches = [];
            if (!preg_match('/Page conseillée\s*:\s*(.+)\s+\((.+?)\s+—\s+(.+?)\)\s*$/u', $lead->texte_recommandation, $matches)) {
                continue;
            }

            $typeLabel = trim($matches[2]);
            $type = match (true) {
                str_contains(mb_strtolower($typeLabel), 'soutien') => 'soutien',
                str_contains(mb_strtolower($typeLabel), 'activit') => 'activite',
                default => 'formation',
            };

            DB::table('leads')->where('id', $lead->id)->update([
                'page_recommandee' => json_encode([
                    'key' => '',
                    'titre' => trim($matches[1]),
                    'type' => $type,
                    'type_label' => $typeLabel,
                    'url' => trim($matches[3]),
                    'icone' => null,
                    'description' => '',
                    'score' => 0,
                ]),
            ]);
        }
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn(['page_recommandee', 'recommandation_manuelle']);
        });
    }
};