<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Ajouter la colonne cours_id
            $table->unsignedBigInteger('cours_id')->nullable()->after('cours');
            
            // Créer l'index de clé étrangère
            $table->foreign('cours_id')->references('id')->on('cours')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['cours_id']);
            $table->dropColumn('cours_id');
        });
    }
};
