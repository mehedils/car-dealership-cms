<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (file_exists(app_path('helpers.php'))) {
            require_once app_path('helpers.php');
        }

        // Ensure Filament password reset emails send immediately without requiring a queue worker
        $this->app->bind(\Filament\Notifications\Auth\ResetPassword::class, function ($app, array $parameters) {
            return new class($parameters['token']) extends \Illuminate\Auth\Notifications\ResetPassword {
                public string $url;

                protected function resetUrl($notifiable): string
                {
                    return $this->url;
                }
            };
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
