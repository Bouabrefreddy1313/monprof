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
       Schema::create('voucher_orders', function (Blueprint $table) {
    $table->id();
    $table->foreignId('voucher_id')->constrained('gift_vouchers')->onDelete('cascade');
    $table->string('phone'); // numéro mobile money du client
    $table->integer('amount_paid'); // montant payé
    $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher_orders');
    }
};
