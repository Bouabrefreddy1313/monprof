<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cours_diagnostic_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cours_id')->unique();
            $table->foreign('cours_id')->references('id')->on('cours')->onDelete('cascade');
            $table->boolean('actif_diagnostic')->default(false)->index();
            $table->integer('priorite')->default(0);
            $table->text('message_recommandation')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cours_diagnostic_settings');
    }
};
