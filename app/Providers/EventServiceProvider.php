<?php

namespace Toilets\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Toilets\Events\BusinessWasFlagged;
use Toilets\Listeners\Activity\LogBusinessFlaggedActivity;
use Toilets\Listeners\Email\Admin\BusinessFlaggedNotification;

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
