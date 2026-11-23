<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gift_vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();   // code unique du bon
            $table->string('title');            // titre du bon
            $table->integer('amount');          // montant du bon
            $table->string('description')->nullable(); // description
            $table->enum('status', ['active', 'used', 'expired', 'cancelled'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gift_vouchers');
    }
};
