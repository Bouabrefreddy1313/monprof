<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recommendation_rules', function (Blueprint $table) {
            $table->id();
            $table->string('nom_critere');
            $table->string('type_critere', 50)->unique(); // parcours, domaine_matiere, niveau, disponibilite, format, objectif, mots_cles
            $table->integer('poids')->default(10);
            $table->boolean('est_obligatoire')->default(false);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recommendation_rules');
    }
};
