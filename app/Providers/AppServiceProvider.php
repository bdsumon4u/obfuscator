<?php

namespace App\Providers;

use App\Facades\Hotash;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Hotash::class, function () {
            return new \App\Hotash;
        });
    }
}
