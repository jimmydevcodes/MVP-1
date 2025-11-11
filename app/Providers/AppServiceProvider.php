<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Cada usuario tiene su zona horaria, pero por defecto usamos 'America/Lima'
        Carbon::setLocale('es');
    }
}