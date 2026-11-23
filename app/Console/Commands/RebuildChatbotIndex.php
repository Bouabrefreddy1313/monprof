<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ContentIndexerService;

class RebuildChatbotIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chatbot:rebuild-index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rebuild the chatbot content index from all website data';

    /**
     * Execute the console command.
     */
    public function handle(ContentIndexerService $indexer): int
    {
        $this->info('Rebuilding chatbot content index...');

        try {
            // Clear existing index
            $indexer->clearIndex();

            // Rebuild index
            $index = $indexer->getIndex();

            $this->info('Index rebuilt successfully!');
            $this->info('Total items indexed: ' . count($index));

            // Show breakdown by type
            $types = [];
            foreach ($index as $item) {
                $type = $item['type'];
                $types[$type] = ($types[$type] ?? 0) + 1;
            }

            $this->table(
                ['Type', 'Count'],
                collect($types)->map(function ($count, $type) {
                    return [$type, $count];
                })->toArray()
            );

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Error rebuilding index: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
