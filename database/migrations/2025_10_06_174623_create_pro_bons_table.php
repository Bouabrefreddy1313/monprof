<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Table importée depuis le site 2 : ne rien faire si elle existe déjà
        if (Schema::hasTable('pro_bons')) {
            return;
        }

        Schema::create('pro_bons', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->decimal('montant', 10, 2);
            $table->string('code_unique')->unique();
            $table->enum('statut', ['actif', 'inactif'])->default('actif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pro_bons');
    }
};
