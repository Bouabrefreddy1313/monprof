<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('parcours', 50)->default('commun')->index(); // commun, A (scolaire), B (formation), C (activite_enfant), D (activite_adulte), E (indecis)
            $table->string('code_identifiant', 60)->unique(); // ex: q_parcours, q_scolaire_niveau, q_formation_domaine...
            $table->string('titre');
            $table->text('description')->nullable();
            $table->string('type_champ', 30)->default('single_choice'); // single_choice, multiple_choice, dynamic_domain, text
            $table->boolean('est_obligatoire')->default(true);
            $table->integer('ordre')->default(0)->index();
            $table->boolean('est_actif')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
