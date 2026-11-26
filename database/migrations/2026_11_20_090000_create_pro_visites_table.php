<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Table importée depuis le site 2 : ne rien faire si elle existe déjà
        if (Schema::hasTable('pro_visites')) {
            return;
        }

        Schema::create('pro_visites', function (Blueprint $table) {
            $table->id();
            // Empreinte anonyme du visiteur (IP + navigateur hachés) : aucune IP stockée en clair
            $table->char('visiteur', 64);
            $table->string('page', 255);
            $table->date('jour');
            $table->timestamp('created_at')->useCurrent();

            $table->index('jour');
            $table->index(['jour', 'visiteur']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pro_visites');
    }
};
