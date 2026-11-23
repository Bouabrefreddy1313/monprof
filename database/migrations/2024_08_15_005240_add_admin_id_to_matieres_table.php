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
            $table->bigInteger('admin_id'); // Utilisation de 'bigInteger' pour correspondre à 'admins.id'
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('matieres', function (Blueprint $table) {
            // Supprimer la clé étrangère si elle a été ajoutée
            $table->dropForeign(['admin_id']);
            
            // Supprimer la colonne admin_id
            $table->dropColumn('admin_id');
        });
    }
};
