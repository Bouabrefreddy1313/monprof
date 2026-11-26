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
        if (! Schema::hasTable('pro_telechargements_pdf') || Schema::hasColumn('pro_telechargements_pdf', 'telephone')) {
            return;
        }

         Schema::table('pro_telechargements_pdf', function (Blueprint $table) {
        $table->string('telephone')->after('email_entreprise');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pro_telechargements_pdf', function (Blueprint $table) {
        $table->dropColumn('telephone');
    });
    }
};
