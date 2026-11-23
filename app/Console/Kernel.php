<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Send newsletter campaigns. La commande tourne chaque jour à 9h00,
        // mais le scope `needsCampaign` (Subscriber) garantit qu'un abonné ne
        // reçoit un nouvel email que si le dernier envoi date de plus de 10 jours.
        $schedule->command('newsletter:send-campaigns')->dailyAt('09:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
