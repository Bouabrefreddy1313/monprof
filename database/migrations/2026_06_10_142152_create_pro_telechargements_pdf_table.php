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
        // Table importée depuis le site 2 : ne rien faire si elle existe déjà
        if (Schema::hasTable('pro_telechargements_pdf')) {
            return;
        }

        Schema::create('pro_telechargements_pdf', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cours_id')->constrained('pro_cours')->onDelete('cascade');
            $table->string('nom_entreprise');
            $table->string('email_entreprise');
            $table->string('nom_fichier_pdf');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro_telechargements_pdf');
    }
};