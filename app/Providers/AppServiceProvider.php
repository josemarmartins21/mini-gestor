<?php

namespace App\Providers;

use App\proxy\VendaProxy;
use App\services\contracts\VendaInterface;
use App\services\VendaService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(VendaInterface::class, VendaService::class);
        $this->app->bind(VendaInterface::class, VendaProxy::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
