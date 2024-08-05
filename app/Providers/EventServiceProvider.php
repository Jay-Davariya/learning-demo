<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [

        UserRegistered::class => [
            
            SendWelcomeEmail::class,
        ],
        
        'App\Events\LoginEvent' => [
            'App\Listeners\LogSuccessfulLogin',
        ],
        'App\Events\LogoutEvent' => [
            'App\Listeners\LogSuccessfulLogout',
        ],
        
    ];




    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
