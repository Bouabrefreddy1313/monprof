<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->foreignId('formation_id')->constrained()->after('titre');
            $table->foreignId('sous_formation_id')->constrained()->after('formation_id');
            $table->string('heure')->nullable();
            $table->string('lieu')->nullable();
            $table->text('description')->nullable();
            $table->text('programme')->nullable();
            $table->text('objectif')->nullable();
            $table->string('prix')->nullable();
            $table->string('cible')->nullable();
            $table->string('image')->nullable();
            $table->string('duree')->nullable();
            $table->string('prix_individuel')->nullable();
            $table->string('prix_groupe')->nullable();
            $table->string('public_concerne')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};
