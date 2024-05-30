<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Enregistrez les services de l'application.
     */
    public function register(): void
    {
        //
    }

    /**
     * Démarrez les services de l'application.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
