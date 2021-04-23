<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MakeMove implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $move;
    public $repeat;
    public $end;
    public $result;
    public $time;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($move, $repeat, $end, $result, $time)
    {
        $this->move = $move;
        $this->repeat = $repeat;
        $this->end = $end;
        $this->results = $result;
        $this->time = $time;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chess');
    }
}
