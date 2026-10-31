<?php

namespace App\Listeners;

use App\Events\orders;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;
class sendOrderNotifToRestaurant
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
        // Log::info("this is sendOrderNotifToRestaurant :: " . $event->order_id);
    }
}
