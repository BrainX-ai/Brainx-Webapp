<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;
    public $message;
    public $job_id;
    public $receiver_id;
    public $photo;
    public $messageType;

    public function __construct($username, $message, $job_id, $receiver_id, $photo, $messageType)
    {
        $this->job_id = $job_id;
        $this->username = $username;
        $this->message = $message;
        $this->receiver_id = $receiver_id;
        $this->photo = $photo;
        $this->messageType = $messageType;
    }

   
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chat');
    }

    public function broadcastAs()
    {
        return 'chatmessage';
    }
}
