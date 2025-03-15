<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;



class CommentNotifiction implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels ;

    public $post_title;
    public $user_name;
    public $user_image;
    public $post;
    public $date ;
    /**
     * Create a new event instance.
     */
    public function __construct($data = [])
    {
        $this->post_title = $data['post_title'];
        $this->user_name = $data['user_name'];
        $this->user_image = $data['user_image'];
        $this->post = $data['post'];
        $this->date = Carbon::now()->diffForHumans();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): Channel
    {
        return new PrivateChannel('real_not.'.$this->post->user_id);
    }
    public function broadcastAs()
    {
      return 'CommentNotifiction';
    }
}