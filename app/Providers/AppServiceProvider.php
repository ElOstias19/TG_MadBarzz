<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
   use App\Services\WhatsappService;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(WhatsappService::class, function ($app) {
            return new WhatsappService();
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
