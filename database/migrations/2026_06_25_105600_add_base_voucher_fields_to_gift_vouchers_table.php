<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('gift_vouchers', function (Blueprint $table) {
            $table->unsignedBigInteger('purchaser_id')->nullable()->after('id');
            $table->string('purchaser_email')->nullable()->after('purchaser_id');
            $table->string('beneficiary_email')->nullable()->after('purchaser_email');
            $table->text('message')->nullable()->after('beneficiary_email');
            $table->timestamp('expires_at')->nullable()->after('message');
            $table->string('token', 64)->nullable()->unique()->after('expires_at');
            $table->string('transaction_id')->nullable()->after('token');
            $table->timestamp('date_paiement')->nullable()->after('transaction_id');
            $table->string('pdf_path')->nullable()->after('date_paiement');
        });
    }

    public function down(): void
    {
        Schema::table('gift_vouchers', function (Blueprint $table) {
            $table->dropColumn([
                'purchaser_id',
                'purchaser_email',
                'beneficiary_email',
                'message',
                'expires_at',
                'token',
                'transaction_id',
                'date_paiement',
                'pdf_path'
            ]);
        });
    }
};
