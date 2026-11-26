<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Table importée depuis le site 2 : ne rien faire si elle existe déjà
        if (Schema::hasTable('pro_commandes')) {
            return;
        }

        Schema::create('pro_commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bon_id')->constrained('pro_bons')->onDelete('cascade');
            $table->string('telephone');
            $table->decimal('montant', 10, 2);
            $table->string('email');
            $table->enum('statut', ['en attente', 'validée', 'rejetée'])->default('en attente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pro_commandes');
    }
};
