<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cours', function (Blueprint $table) {
            if (!Schema::hasColumn('cours', 'duree')) {
                $table->string('duree')->nullable()->after('image');
            }
            if (!Schema::hasColumn('cours', 'prix_individuel')) {
                $table->string('prix_individuel')->nullable()->after('duree');
            }
            if (!Schema::hasColumn('cours', 'prix_groupe')) {
                $table->string('prix_groupe')->nullable()->after('prix_individuel');
            }
            if (!Schema::hasColumn('cours', 'public_concerne')) {
                $table->string('public_concerne')->nullable()->after('prix_groupe');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cours', function (Blueprint $table) {
            $table->dropColumn(['duree', 'prix_individuel', 'prix_groupe', 'public_concerne']);
        });
    }
};
