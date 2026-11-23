<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            if (!Schema::hasColumn('inscriptions', 'transaction_id')) {
                $table->string('transaction_id')->nullable()->after('statut');
            }
            if (!Schema::hasColumn('inscriptions', 'mode_paiement_final')) {
                $table->string('mode_paiement_final')->nullable()->after('transaction_id');
            }
            if (!Schema::hasColumn('inscriptions', 'date_paiement')) {
                $table->timestamp('date_paiement')->nullable()->after('notes_admin');
            }
        });
    }

    public function down(): void
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->dropColumn(['transaction_id', 'mode_paiement_final', 'date_paiement']);
        });
    }
};
