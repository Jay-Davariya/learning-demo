<?php

namespace App\Listeners;

use App\Events\customermrp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Customerevent
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(customermrp $event): void
    {
        //
    }
}
