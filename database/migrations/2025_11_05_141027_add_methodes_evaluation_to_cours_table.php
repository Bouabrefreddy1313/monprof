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
    Schema::table('cours', function (Blueprint $table) {
        $table->text('methodes_pedagogiques')->nullable();
        $table->text('evaluation')->nullable();
    });
}

public function down()
{
    Schema::table('cours', function (Blueprint $table) {
        $table->dropColumn('methodes_pedagogiques');
        $table->dropColumn('evaluation');
    });
}

};
