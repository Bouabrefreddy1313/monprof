<?php

namespace App\Providers;

use App\Services\ContentIndexerService;
use App\Services\EnhancedChatbotService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register ContentIndexerService as singleton
        $this->app->singleton(ContentIndexerService::class, function ($app) {
            return new ContentIndexerService();
        });

        // Register EnhancedChatbotService as singleton
        $this->app->singleton(EnhancedChatbotService::class, function ($app) {
            return new EnhancedChatbotService($app->make(ContentIndexerService::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
    }
}
