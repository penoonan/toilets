<?php

namespace Toilets\Listeners\Activity;

use Toilets\Events\UserSentBusinessMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Toilets\Models\Activity;

class LogUserSentBusinessMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserSentBusinessMessage  $event
     * @return void
     */
    public function handle(UserSentBusinessMessage $event)
    {
        $activity_data = [
            'data' => [
                'user' => auth()->user()->getKey(),
                'business' => $event->business->getKey(),
                'message' => $event->message->getKey(),
                'input' => $event->request->except('_token'),
            ],
            'ip' => $event->request->ip()
        ];

        $biz_activity = new Activity($activity_data);
        $biz_activity->description = Activity::business_was_sent_user_message;
        $event->business->activity()->save($biz_activity);

        $user_activity = new Activity($activity_data);
        $user_activity->description = Activity::user_sent_business_message;
        auth()->user()->activity()->save($user_activity);
    }
}
