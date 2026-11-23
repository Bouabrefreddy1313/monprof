<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('formation_videos', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->string('video_path');
            $table->string('formation_type'); // 'dcg' ou 'dscg'
            $table->string('niveau')->nullable(); // '1', '2', '3'
            $table->string('matiere')->nullable();
            $table->integer('ordre')->default(0);
            $table->integer('prix')->default(0); // en FCFA
            $table->string('duree')->nullable(); // ex: "45:30"
            $table->string('thumbnail')->nullable();
            $table->timestamps();
        });

        Schema::create('paiement_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('video_id')->constrained('formation_videos')->cascadeOnDelete();
            $table->string('transaction_id', 100)->unique();
            $table->integer('montant');
            $table->string('methode_paiement')->default('cinetpay');
            $table->string('statut')->default('en_attente'); // en_attente, complete, echec
            $table->timestamp('date_paiement')->nullable();
            $table->timestamps();
        });

        Schema::create('user_video_access', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('video_id')->constrained('formation_videos')->cascadeOnDelete();
            $table->foreignId('paiement_video_id')->constrained('paiement_videos')->cascadeOnDelete();
            $table->timestamp('acces_jusquau');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_video_access');
        Schema::dropIfExists('paiement_videos');
        Schema::dropIfExists('formation_videos');
    }
};
