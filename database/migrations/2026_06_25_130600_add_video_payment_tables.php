<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Ajouter les colonnes manquantes à formation_videos si elles n'existent pas
        Schema::table('formation_videos', function (Blueprint $table) {
            if (!Schema::hasColumn('formation_videos', 'niveau')) {
                $table->string('niveau')->nullable()->after('formation_type');
            }
            if (!Schema::hasColumn('formation_videos', 'matiere')) {
                $table->string('matiere')->nullable()->after('niveau');
            }
            if (!Schema::hasColumn('formation_videos', 'ordre')) {
                $table->integer('ordre')->default(0)->after('matiere');
            }
            if (!Schema::hasColumn('formation_videos', 'prix')) {
                $table->integer('prix')->default(0)->after('ordre');
            }
            if (!Schema::hasColumn('formation_videos', 'duree')) {
                $table->string('duree')->nullable()->after('prix');
            }
            if (!Schema::hasColumn('formation_videos', 'thumbnail')) {
                $table->string('thumbnail')->nullable()->after('duree');
            }
        });

        // Créer la table paiement_videos si elle n'existe pas
        if (!Schema::hasTable('paiement_videos')) {
            Schema::create('paiement_videos', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->foreignId('video_id')->constrained()->cascadeOnDelete();
                $table->string('transaction_id', 100)->nullable();
                $table->integer('montant');
                $table->string('methode_paiement')->default('cinetpay');
                $table->string('statut')->default('en_attente');
                $table->timestamp('date_paiement')->nullable();
                $table->timestamps();
            });
        }

        // Créer la table user_video_access si elle n'existe pas
        if (!Schema::hasTable('user_video_access')) {
            Schema::create('user_video_access', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->foreignId('video_id')->constrained()->cascadeOnDelete();
                $table->foreignId('paiement_video_id')->constrained('paiement_videos')->cascadeOnDelete();
                $table->timestamp('acces_jusquau');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('user_video_access');
        Schema::dropIfExists('paiement_videos');
    }
};
