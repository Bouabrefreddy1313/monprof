<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('matieres', function (Blueprint $table) {
            $table->string('image')->nullable(); // Ajouter la colonne image
        });
    }

    public function down()
    {
        Schema::table('matieres', function (Blueprint $table) {
            $table->dropColumn('image'); // Supprimer la colonne image si besoin
        });
    }
};
