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
        // Table importée depuis le site 2 : ne rien faire si la colonne existe déjà
        if (! Schema::hasTable('pro_formations') || Schema::hasColumn('pro_formations', 'domaine_id')) {
            return;
        }

        Schema::table('pro_formations', function (Blueprint $table) {
            $table->foreignId('domaine_id')->nullable()->constrained('pro_domaines')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('pro_formations', function (Blueprint $table) {
            $table->dropForeign(['domaine_id']);
            $table->dropColumn('domaine_id');
        });
    }
};
