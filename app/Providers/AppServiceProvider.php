<?php

namespace App\Providers;

use App\Services\ContentIndexerService;
use App\Models\Entreprises\User as EntrepriseUser;
use App\Services\EnhancedChatbotService;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
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

        // Composants Blade de l'espace entreprises : <x-entreprises::text-input>, <x-entreprises::app-layout>...
        // (isolés des composants du site particuliers, qui portent les mêmes noms)
        Blade::componentNamespace('App\\View\\Components\\Entreprises', 'entreprises');
        Blade::anonymousComponentPath(resource_path('views/entreprises/components'), 'entreprises');

        // Les routes d'authentification sont préfixées par espace : "password.reset" et
        // "verification.verify" n'existent plus sans préfixe.
        ResetPassword::createUrlUsing(function ($user, string $token) {
            $espace = $user instanceof EntrepriseUser ? 'entreprises' : 'particuliers';

            return route($espace . '.password.reset', [
                'token' => $token,
                'email' => $user->getEmailForPasswordReset(),
            ]);
        });

        VerifyEmail::createUrlUsing(function ($user) {
            $espace = $user instanceof EntrepriseUser ? 'entreprises' : 'particuliers';

            return URL::temporarySignedRoute(
                $espace . '.verification.verify',
                now()->addMinutes(config('auth.verification.expire', 60)),
                ['id' => $user->getKey(), 'hash' => sha1($user->getEmailForVerification())]
            );
        });
    }
}
