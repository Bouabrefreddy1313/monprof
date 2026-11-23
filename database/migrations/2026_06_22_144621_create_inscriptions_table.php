<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('nom_parent');
            $table->string('nom_enfant');
            $table->integer('age_enfant');
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->string('activite'); // Nom de la formule choisie
            $table->date('date_debut')->nullable();
            $table->enum('lieu', ['domicile', 'en_ligne', 'centre']);
            $table->json('jours'); // Tableau des jours disponibles
            $table->string('horaire')->nullable();
            $table->enum('type_paiement', ['unique', 'seance', 'abonnement']);
            $table->enum('mode_paiement', ['mobile_money', 'virement']);
            $table->decimal('frais_reservation', 10, 2)->default(10000);
            $table->decimal('prix_formule', 10, 2);
            $table->enum('statut', ['en_attente', 'contacte', 'confirme', 'annule'])->default('en_attente');
            $table->text('notes_admin')->nullable(); // Notes pour l'équipe
            $table->timestamp('date_contact')->nullable(); // Quand l'équipe a contacté
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
