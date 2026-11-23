<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Cours;

class UpdateOrdersSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Début de la mise à jour des orders...');
        
        // Récupérer tous les orders qui n'ont pas encore de cours_id
        $orders = Order::whereNull('cours_id')->get();
        
        $this->command->info("Nombre d'orders à traiter: " . $orders->count());
        
        $updated = 0;
        $notFound = 0;
        
        foreach ($orders as $order) {
            if (!empty($order->cours)) {
                // Chercher le cours correspondant par son titre
                $cours = Cours::where('titre', 'LIKE', '%' . trim($order->cours) . '%')->first();
                
                if ($cours) {
                    $order->cours_id = $cours->id;
                    $order->save();
                    $updated++;
                    $this->command->info("✓ Order #{$order->id} lié au cours: {$cours->titre}");
                } else {
                    $notFound++;
                    $this->command->warn("✗ Cours non trouvé pour: '{$order->cours}' (Order #{$order->id})");
                }
            }
        }
        
        $this->command->info("Mise à jour terminée:");
        $this->command->info("- Orders mis à jour: {$updated}");
        $this->command->info("- Cours non trouvés: {$notFound}");
        
        // Afficher les cours disponibles si certains n'ont pas été trouvés
        if ($notFound > 0) {
            $this->command->info("\nCours disponibles dans la base:");
            $coursList = Cours::pluck('titre')->toArray();
            foreach ($coursList as $coursTitle) {
                $this->command->line("- {$coursTitle}");
            }
        }
    }
}