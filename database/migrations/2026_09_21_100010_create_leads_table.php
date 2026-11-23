<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')->nullable()->constrained('diagnostic_sessions')->onDelete('set null');
            $table->string('prenom');
            $table->string('telephone')->index();
            $table->string('email')->nullable()->index();
            $table->string('moyen_contact_prefere', 30)->default('whatsapp'); // appel, whatsapp, sms, email
            $table->string('creneau_rappel')->nullable();
            $table->boolean('consentement')->default(false);
            $table->timestamp('consentement_date')->nullable();
            $table->text('texte_recommandation')->nullable();
            $table->unsignedBigInteger('cours_recommande_id')->nullable()->index();
            $table->foreign('cours_recommande_id')->references('id')->on('cours')->onDelete('set null');
            $table->string('titre_cours_recommande')->nullable(); // copie pour historique
            $table->json('cours_alternatifs')->nullable();
            $table->boolean('aucune_correspondance')->default(false)->index();
            $table->enum('statut', ['nouveau', 'contacte', 'en_discussion', 'converti', 'perdu'])->default('nouveau')->index();
            $table->unsignedBigInteger('assigned_to')->nullable()->index();
            $table->foreign('assigned_to')->references('id')->on('admins')->onDelete('set null');
            $table->text('notes_internes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
