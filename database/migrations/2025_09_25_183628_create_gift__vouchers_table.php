<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftVouchersTable extends Migration
{
    public function up()
    {
        Schema::create('gift_vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // code du bon
            $table->unsignedInteger('amount')->comment('Montant en centimes ou en unité selon ta monnaie');
            $table->string('currency', 10)->default('XOF');

            // Relation avec l’acheteur
            $table->foreignId('purchaser_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('purchaser_email')->nullable();
            $table->string('beneficiary_email')->nullable(); // email du bénéficiaire
            $table->text('message')->nullable(); // message cadeau
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('used_at')->nullable();

            // Relation avec l’utilisateur du bon
            $table->foreignId('used_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('status')->default('active'); // active, used, cancelled, expired
            $table->string('pdf_path')->nullable(); // chemin si tu veux stocker le PDF
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gift_vouchers');
    }
}

