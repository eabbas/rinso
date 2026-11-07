<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Hekmatinasser\Verta\Verta;
use App\Models\Order;

class orders implements ShouldBroadcastNow
{
    use Dispatchable, SerializesModels;

    public $order_id;
    public $career_id;
    public $user_id;
    public $cart_count;
    public $order_data;
    public $is_cancelled;
    // public $is_removed;

    public function __construct($order)
    {
        $this->order_id = $order->id;
        $this->career_id = $order->career_id;
        $this->user_id = $order->user_id;

        $this->cart_count = order::where('career_id', $order->career_id)
            ->whereNotIn('order_status_id', [5, 6])
            ->count();

        $this->is_cancelled = ($order->order_status_id == 6);
        // $this->is_removed = isset($order->is_removed) ? $order->is_removed : false;

        $order->status;
        $dateTime = verta();
        $dateTime = explode(' ', $dateTime);
        $date = implode('/', explode('-', $dateTime[0]));
        $time = $dateTime[1];
        $order->date = $date;
        $order->time = $time;
        $order->carts;
        $order->qr_code;
        $this->order_data = $order;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('orderNotification' . $this->career_id),
        ];
    }
}
