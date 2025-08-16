<?php

namespace App\Providers;

use App\Models\Subscribe;
use App\Observers\SubscribeObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Subscribe::observe(SubscribeObserver::class);
    }
}
