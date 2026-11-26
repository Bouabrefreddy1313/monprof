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
        if (! Schema::hasTable('pro_cours') || Schema::hasColumn('pro_cours', 'certifiante')) {
            return;
        }

        Schema::table('pro_cours', function (Blueprint $table) {
        $table->boolean('certifiante')->default(false)->after('eligible');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pro_cours', function (Blueprint $table) {
            //
        });
    }
};
