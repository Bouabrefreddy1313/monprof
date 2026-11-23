<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cours_id')->constrained()->onDelete('cascade');
            $table->string('token', 64)->unique(); // Token sécurisé pour le suivi
            $table->string('nom');
            $table->string('telephone');
            $table->string('email');
            $table->string('ville');
            $table->text('message')->nullable();
            $table->enum('formule', ['individuel', 'groupe'])->default('individuel');
            $table->decimal('montant_total', 12, 0);
            $table->decimal('acompte', 12, 0);
            $table->decimal('solde', 12, 0);
            $table->enum('statut', ['en_attente', 'acompte_paye', 'paye', 'annule'])->default('en_attente');
            $table->string('transaction_id')->nullable();
            $table->integer('places_reservees')->default(1);
            $table->timestamp('date_paiement_acompte')->nullable();
            $table->timestamp('date_paiement_solde')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
