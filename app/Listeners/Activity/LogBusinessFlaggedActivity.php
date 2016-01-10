<?php namespace Toilets\Listeners\Activity;

use Toilets\Events\BusinessWasFlagged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Toilets\Models\Activity;

class LogBusinessFlaggedActivity
{
    /**
     * Handle the event.
     *
     * @param  BusinessWasFlagged  $event
     * @return void
     */
    public function handle(BusinessWasFlagged $event)
    {
        $activity_data = [
            'data' => [
                'user' => auth()->user()->id,
                'business' => $event->business->id,
                'input' => $event->request->except('_token'),
            ],
            'ip' => $event->request->ip()
        ];

        $biz_activity = new Activity($activity_data);
        $biz_activity->description = Activity::business_was_flagged;
        $event->business->activity()->save($biz_activity);

        $user_activity = new Activity($activity_data);
        $user_activity->description = Activity::user_flagged_business;
        auth()->user()->activity()->save($user_activity);
    }
}
