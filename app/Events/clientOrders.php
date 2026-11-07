<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use Hekmatinasser\Verta\Verta;

class clientOrders implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;
    public $is_cancelled;

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->is_cancelled = ($order->order_status_id == 6); 
    }

    public function broadcastOn()
    {
        return [
            new Channel('userOrderNotification' . $this->order->user_id),
        ];
    }
}
