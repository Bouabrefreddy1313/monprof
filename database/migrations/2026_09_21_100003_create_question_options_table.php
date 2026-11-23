<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('question_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade');
            $table->string('label');
            $table->string('valeur');
            $table->string('tag_type', 50)->nullable(); // parcours, niveau, matiere, objectif, difficulte, format, disponibilite, tranche_age, centre_interet, public
            $table->string('tag_valeur')->nullable();
            $table->string('next_parcours', 50)->nullable(); // Pour la question 1 : scolaire, formation, activite_enfant, activite_adulte, indecis
            $table->string('icone', 50)->nullable(); // FontAwesome icon class
            $table->integer('ordre')->default(0);
            $table->boolean('est_actif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('question_options');
    }
};
