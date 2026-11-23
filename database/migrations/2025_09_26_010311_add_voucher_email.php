<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('voucher_orders', function (Blueprint $table) {
            $table->string('email')->after('amount_paid'); // ajoute le champ email après amount_paid
        });
    }

    public function down(): void
    {
        Schema::table('voucher_orders', function (Blueprint $table) {
            $table->dropColumn('email'); // supprime le champ si rollback
        });
    }
};
