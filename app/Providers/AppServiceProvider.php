<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TMDBService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TMDBService::class, function ($app) {
            return new TMDBService();
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
