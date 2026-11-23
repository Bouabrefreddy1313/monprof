<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('gift_vouchers', function (Blueprint $table) {
            // Modifier le ENUM pour inclure 'pending_payment'
            $table->enum('status', ['active', 'inactive', 'pending_payment'])->change();
        });
    }

    public function down(): void
    {
        Schema::table('gift_vouchers', function (Blueprint $table) {
            // Revenir à l'ancien ENUM (ajustez selon vos valeurs originales)
            $table->enum('status', ['active', 'inactive', 'pending'])->change();
        });
    }
};
