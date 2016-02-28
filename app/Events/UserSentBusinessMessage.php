<?php

namespace Toilets\Events;

use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Toilets\Models\Business;
use Toilets\Models\Message;
use Toilets\Models\User;

class UserSentBusinessMessage extends Event
{
    use SerializesModels;

    /**
     * @var Business
     */
    public $business;
    /**4
     * @var Message
     */
    public $message;
    /**
     * @var Request
     */
    public $request;

    /**
     * Create a new event instance.
     *
     * @param Business $business
     * @param Message $message
     * @param Request $request
     */
    public function __construct(Business $business, Message $message, Request $request)
    {
        $this->business = $business;
        $this->message = $message;
        $this->request = $request;
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
