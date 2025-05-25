<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class SendResult implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    // public $result;
    public $token;

    public function __construct($token)
    {
        // $this->result = $result;
        $this->token = $token;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('test.' . $this->token); // ← ドット追加
    }

    public function broadcastAs()
    {
        return 'SendResult'; // ← ドットなしのイベント名
    }

    public function broadcastWith()
    {
    return ['token' => $this->token];
    }
}
