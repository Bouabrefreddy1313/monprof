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
        Schema::create('payement_gateways', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id'); // Utilisation de 'bigInteger' pour correspondre à 'admins.id'
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->string('api_key');
            $table->string('site_id');
            $table->string('secret_key'); // Correction de 'seret_key' en 'secret_key'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payement_gateways');
    }
};
