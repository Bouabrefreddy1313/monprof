<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('diagnostic_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('session_token', 64)->unique()->index();
            $table->enum('statut', ['en_cours', 'termine', 'abandonne'])->default('en_cours')->index();
            $table->string('parcours_choisi', 50)->nullable()->index();
            $table->timestamp('date_debut')->useCurrent();
            $table->timestamp('date_fin')->nullable();
            $table->string('derniere_question_atteinte', 100)->nullable();
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('page_entree')->nullable();
            $table->text('referrer')->nullable();
            $table->string('appareil', 30)->nullable(); // mobile, desktop, tablette
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diagnostic_sessions');
    }
};
