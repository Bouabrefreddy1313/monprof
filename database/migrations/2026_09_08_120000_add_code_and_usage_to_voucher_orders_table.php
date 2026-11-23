<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('voucher_orders', function (Blueprint $table) {
            if (!Schema::hasColumn('voucher_orders', 'code')) {
                $table->string('code')->nullable()->unique()->after('email');
            }
            if (!Schema::hasColumn('voucher_orders', 'is_used')) {
                $table->boolean('is_used')->default(false)->after('status');
            }
            if (!Schema::hasColumn('voucher_orders', 'used_at')) {
                $table->timestamp('used_at')->nullable()->after('is_used');
            }
            if (!Schema::hasColumn('voucher_orders', 'formation_id')) {
                $table->unsignedBigInteger('formation_id')->nullable()->after('used_at');
                $table->foreign('formation_id')->references('id')->on('formations')->nullOnDelete();
            }
            if (!Schema::hasColumn('voucher_orders', 'notes')) {
                $table->text('notes')->nullable()->after('formation_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('voucher_orders', function (Blueprint $table) {
            if (Schema::hasColumn('voucher_orders', 'formation_id')) {
                $table->dropForeign(['formation_id']);
                $table->dropColumn('formation_id');
            }
            $columnsToDrop = [];
            foreach (['code', 'is_used', 'used_at', 'notes'] as $col) {
                if (Schema::hasColumn('voucher_orders', $col)) {
                    $columnsToDrop[] = $col;
                }
            }
            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};
