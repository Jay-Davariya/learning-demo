<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserLoggedIn;
use App\Mail\UserLoginNotification;
use Illuminate\Support\Facades\Mail;


class SendLoginNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        // Mail::to($event->customer->email)->send(new UserLoginNotification($event->message));
    }

    /**
     * Handle the event.
     */
    public function handle(UserLoggedIn $event)
    {
        Mail::to($event->customer->email)->send(new UserLoginNotification($event->customer));
    }
}
