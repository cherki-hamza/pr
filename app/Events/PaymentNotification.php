<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentNotification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $notification = [];

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($notification)
    {
        $this->notification = $notification;
    }

    public function broadcastOn()
    {
        $channel = new Channel('payement_chanel');
        return  $channel;
    }


    public function broadcasAs(){
        return 'PaymentNotification';
    }

    public function broadcastWith(){
        return [
            'notification' => $this->notification
        ];
    }
}
