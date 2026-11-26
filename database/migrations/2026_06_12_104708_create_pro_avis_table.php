<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Table importée depuis le site 2 : ne rien faire si elle existe déjà
        if (Schema::hasTable('pro_avis')) {
            return;
        }

        Schema::create('pro_avis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cours_id')
                  ->constrained('pro_cours')
                  ->onDelete('cascade');

            $table->string('nom');
            $table->tinyInteger('etoiles');
            $table->text('commentaire');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pro_avis');
    }
};