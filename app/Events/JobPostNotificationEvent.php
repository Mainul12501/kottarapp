<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class JobPostNotificationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $jobPostMessage;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($jobPostMessage)
    {
        $this->jobPostMessage   = $jobPostMessage;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
//        return new PrivateChannel('channel-name');
        return new Channel('job-post-notification-channel');
    }

    /**
     * @return void
     */
    public function broadcastAs()
    {
        return 'job-post-notification-event';
    }
}
