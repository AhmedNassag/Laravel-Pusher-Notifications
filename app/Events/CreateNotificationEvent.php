<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateNotificationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public $notifilable_id;
    public $content;
    public $created_at;

    public function __construct($data)
    {
        $this->id             = $data['ID'];
        $this->notifilable_id = $data['NotifilableId'];
        $this->content        = $data['Content'];
        $this->creaded_at     = date('Y-m-d H:i:s');
    }



    public function broadcastOn()
    {
        return new PrivateChannel('notification-channel', $this->notifilable_id);
        // return ['notification-channel'];
    }



    public function broadcastAs()
    {
        return 'notification-channel';
    }
}
