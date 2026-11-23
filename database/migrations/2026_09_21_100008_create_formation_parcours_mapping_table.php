<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('formation_parcours_mapping', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formation_id')->index();
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');
            $table->unsignedBigInteger('sous_formation_id')->nullable()->index();
            $table->foreign('sous_formation_id')->references('id')->on('sous_formations')->onDelete('cascade');
            $table->string('parcours', 50)->index(); // scolaire, formation, activite_enfant, activite_adulte
            $table->timestamps();

            $table->unique(['formation_id', 'sous_formation_id', 'parcours'], 'form_sous_form_parcours_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('formation_parcours_mapping');
    }
};
