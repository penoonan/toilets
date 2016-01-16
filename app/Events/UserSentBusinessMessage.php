<?php

namespace Toilets\Events;

use Toilets\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Toilets\Models\Business;
use Toilets\Models\Message;
use Toilets\Models\User;

class UserSentBusinessMessage extends Event
{
    use SerializesModels;
    /**
     * @var User
     */
    public $user;
    /**
     * @var Business
     */
    public $business;
    /**
     * @var Message
     */
    public $message;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param Business $business
     * @param Message $message
     */
    public function __construct(User $user, Business $business, Message $message)
    {
        //
        $this->user = $user;
        $this->business = $business;
        $this->message = $message;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
