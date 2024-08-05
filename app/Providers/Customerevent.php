<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class Customerevent extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }
    protected $listen = [
        'App\Events\customermrp' => [
            'App\Listeners\Customerevent',
        ],
    ];
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
