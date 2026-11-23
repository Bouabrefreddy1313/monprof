<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subscribers', function (Blueprint $table) {
            if (!Schema::hasColumn('subscribers', 'last_visited_page')) {
                $table->string('last_visited_page')->nullable()->after('nom');
            }
            if (!Schema::hasColumn('subscribers', 'interest_category')) {
                $table->string('interest_category')->nullable()->after('last_visited_page');
            }
            if (!Schema::hasColumn('subscribers', 'last_campaign_sent_at')) {
                $table->timestamp('last_campaign_sent_at')->nullable()->after('subscribed_at');
            }
            if (!Schema::hasColumn('subscribers', 'campaigns_sent_count')) {
                $table->integer('campaigns_sent_count')->default(0)->after('last_campaign_sent_at');
            }
            if (!Schema::hasColumn('subscribers', 'preferences')) {
                $table->text('preferences')->nullable()->after('campaigns_sent_count');
            }
        });
    }

    public function down(): void
    {
        Schema::table('subscribers', function (Blueprint $table) {
            $table->dropColumn([
                'nom',
                'last_visited_page',
                'interest_category',
                'last_campaign_sent_at',
                'campaigns_sent_count',
                'preferences'
            ]);
        });
    }
};
