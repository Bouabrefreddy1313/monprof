<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Table importée depuis le site 2 : ne rien faire si elle existe déjà
        if (Schema::hasTable('pro_formations')) {
            return;
        }

        Schema::create('pro_formations', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('pour_entreprise');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pro_formations');
    }
};
