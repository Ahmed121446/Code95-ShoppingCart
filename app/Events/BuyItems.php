<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\User;

class BuyItems
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $items_in_cart;
    public $cart;
    public function __construct(User $user , $items_in_cart,$cart)
    {
        $this->user = $user;
        $this->items_in_cart = $items_in_cart;
        $this->cart = $cart;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
