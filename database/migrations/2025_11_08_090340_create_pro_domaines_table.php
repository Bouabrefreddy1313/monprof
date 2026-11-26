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
        // Table importée depuis le site 2 : ne rien faire si elle existe déjà
        if (Schema::hasTable('pro_domaines')) {
            return;
        }

        Schema::create('pro_domaines', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pro_domaines');
    }
};
