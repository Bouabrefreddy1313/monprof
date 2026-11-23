<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\NewsletterCampaignService;

class SendNewsletterCampaigns extends Command
{
    protected $signature = 'newsletter:send-campaigns
                            {--force : Ignorer le délai de 10 jours et envoyer à tous les abonnés actifs}
                            {--dry-run : Simuler l\'envoi sans réellement envoyer les emails}';

    protected $description = 'Envoie les campagnes de formations à chaque abonné (un nouvel email tous les 10 jours)';

    public function handle(NewsletterCampaignService $campaignService)
    {
        $force = (bool) $this->option('force');
        $dryRun = (bool) $this->option('dry-run');

        $this->info('Starting newsletter campaign...');

        $result = $campaignService->sendCampaigns($force, $dryRun);

        $mode = $dryRun ? 'DRY-RUN (aucun email envoyé)' : 'completed';
        $this->info("Campaign {$mode}!");
        $this->info("Sent: {$result['sent']}/{$result['total']}");

        if (!empty($result['errors'])) {
            $this->error('Errors:');
            foreach ($result['errors'] as $error) {
                $this->error("  - $error");
            }
        }

        return 0;
    }
}
