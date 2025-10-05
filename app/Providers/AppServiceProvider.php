<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
   use App\Services\WhatsappService;
use App\Models\Administrador;
use Illuminate\Support\Facades\URL;

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

    public function boot()
    {
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

        view()->composer('*', function ($view) {
            $superadmin = Administrador::with('persona')
                ->where('nivel_acceso', 'superadmin')
                ->first();
            $view->with('superadmin', $superadmin);
        });

         view()->composer('*', function ($view) {
        $superadmin = Administrador::with(['persona', 'user'])
            ->where('nivel_acceso', 'superadmin')
            ->first();
        $view->with('superadmin', $superadmin);
    });
    }





}
