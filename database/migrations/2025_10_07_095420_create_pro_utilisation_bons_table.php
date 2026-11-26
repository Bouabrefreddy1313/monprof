<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Table importée depuis le site 2 : ne rien faire si elle existe déjà
        if (Schema::hasTable('pro_utilisation_bons')) {
            return;
        }

        Schema::create('pro_utilisation_bons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bon_id')->constrained('pro_bons')->onDelete('cascade');
            $table->string('nom_client');
            $table->string('formation');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pro_utilisation_bons');
    }
};
