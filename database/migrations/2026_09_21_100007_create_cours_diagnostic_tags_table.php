<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cours_diagnostic_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cours_id')->index();
            $table->foreign('cours_id')->references('id')->on('cours')->onDelete('cascade');
            $table->string('type_tag', 50)->index(); // parcours, matiere, domaine, niveau, tranche_age, objectif, difficulte, format, disponibilite, centre_interet, public
            $table->string('valeur')->index();
            $table->boolean('est_suggere')->default(false)->index();
            $table->boolean('est_valide')->default(true)->index();
            $table->timestamps();

            $table->index(['cours_id', 'type_tag', 'valeur']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cours_diagnostic_tags');
    }
};
