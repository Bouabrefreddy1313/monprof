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
    Schema::table('reponses', function (Blueprint $table) {
        $table->string('etat')->nullable()->after('statut'); // "vendu" ou "annule"
    });
}

public function down()
{
    Schema::table('reponses', function (Blueprint $table) {
        $table->dropColumn('etat');
    });
}

};
