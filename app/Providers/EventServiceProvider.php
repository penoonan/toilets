<?php

namespace Toilets\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use Toilets\Events\BusinessWasFlagged;
use Toilets\Events\UserSentBusinessMessage;

use Toilets\Listeners\Activity\LogBusinessFlaggedActivity;
use Toilets\Listeners\Email\Admin\BusinessFlaggedNotification;
use Toilets\Listeners\Activity\LogUserSentBusinessMessage;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        BusinessWasFlagged::class => [
            LogBusinessFlaggedActivity::class,
            BusinessFlaggedNotification::class
        ],
        UserSentBusinessMessage::class => [
            LogUserSentBusinessMessage::class
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
