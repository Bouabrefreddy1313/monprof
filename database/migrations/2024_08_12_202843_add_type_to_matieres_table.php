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
        Schema::table('matieres', function (Blueprint $table) {
            $table->string('type')->nullable(); // Ajouter la colonne image
        });
    }

    public function down()
    {
        Schema::table('matieres', function (Blueprint $table) {
            $table->dropColumn('type'); // Supprimer la colonne image si besoin
        });
    }
};
