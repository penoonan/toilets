<?php

namespace Toilets\Events;

use Illuminate\Http\Request;
use Toilets\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Toilets\Models\Business;
use Toilets\Models\User;

class BusinessWasFlagged extends Event
{
    use SerializesModels;
    
    /**
     * @var Business
     */
    public $business;
    /**
     * @var User
     */
    public $user;
    /**
     * @var Request
     */
    public $request;

    /**
     * Create a new event instance.
     *
     * @param Business $business
     * @param User $user
     * @param Request $request
     */
    public function __construct(Business $business, User $user, Request $request)
    {
        $this->business = $business;
        $this->user = $user;
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
