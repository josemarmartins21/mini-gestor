<?php

namespace App\Providers;

use App\proxy\VendaProxy;
use App\services\contracts\VendaCrud;
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
        $this->app->bind(VendaCrud::class, VendaService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
