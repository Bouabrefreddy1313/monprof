<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
    {
        Schema::create('lecon_payment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_id'); // Doit être unsigned big integer
            $table->unsignedBigInteger('lecon_id');   // Doit être unsigned big integer

            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
            $table->foreign('lecon_id')->references('id')->on('lecons')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lecon_payment');
    }
};
