<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RegisterNotification extends ServiceProvider
{


    protected $listen = [

        UserRegistered::class => [

            SendWelcomeEmail::class,
        ],
        
            'App\Events\UserLoggedIn' => [
                'App\Listeners\SendUserLoginNotification',
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
