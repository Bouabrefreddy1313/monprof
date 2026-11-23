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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('mode_de_formation')->nullable(); // Ajoutez cette ligne
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('mode_de_formation'); // Assurez-vous de supprimer la colonne si nécessaire
        });
    }
};
