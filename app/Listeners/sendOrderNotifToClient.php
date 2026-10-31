<?php

namespace App\Listeners;

use App\Events\orders;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendOrderNotifToClient
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
    public function handle(orders $event): void
    {
        //
    }
}
