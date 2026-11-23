<?php

namespace App\Console\Commands;

use App\Models\Lead;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class RemindUncontactedLeadsCommand extends Command
{
    protected $signature = 'diagnostic:remind-uncontacted-leads';

    protected $description = 'Vérifie les leads restés au statut "nouveau" depuis plus de 24h et envoie un rappel.';

    public function handle(): int
    {
        $cutoff = Carbon::now()->subHours(24);

        $uncontactedLeads = Lead::where('statut', 'nouveau')
            ->where('created_at', '<=', $cutoff)
            ->get();

        if ($uncontactedLeads->isEmpty()) {
            $this->info("Aucun lead en attente de rappel.");
            return Command::SUCCESS;
        }

        $count = $uncontactedLeads->count();
        $this->warn("{$count} lead(s) sont restés non contactés depuis plus de 24h !");

        foreach ($uncontactedLeads as $lead) {
            Notification::create([
                'type' => 'lead_reminder',
                'message' => "Rappel : Le lead #{$lead->id} ({$lead->prenom} - {$lead->telephone}) attend d'être contacté depuis plus de 24h.",
                'data' => [
                    'lead_id' => $lead->id,
                    'prenom' => $lead->prenom,
                    'telephone' => $lead->telephone,
                    'url' => route('admin.leads.show', $lead->id),
                ],
            ]);

            Log::warning("Diagnostic Lead Reminder: Lead #{$lead->id} ({$lead->prenom}) sans contact depuis 24h.");
        }

        $this->info("Notifications de rappel générées.");
        return Command::SUCCESS;
    }
}
