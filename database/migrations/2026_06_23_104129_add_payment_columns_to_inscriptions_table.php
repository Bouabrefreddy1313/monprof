<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->string('token', 191)->unique()->after('id');
            $table->string('transaction_id')->nullable()->after('statut');
            $table->string('mode_paiement_final')->nullable()->after('transaction_id');
            $table->timestamp('date_paiement')->nullable()->after('notes_admin');
        });
    }

    public function down(): void
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->dropColumn(['token', 'transaction_id', 'mode_paiement_final', 'date_paiement']);
        });
    }
};
