<?php

namespace Toilets\Listeners\Email\Admin;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;
use Toilets\Events\BusinessWasFlagged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BusinessFlaggedNotification
{
    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * Create the event listener.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  BusinessWasFlagged  $event
     * @return void
     */
    public function handle(BusinessWasFlagged $event)
    {
        $data = [
            'user' => $event->user,
            'business' => $event->business
        ];

        $this->mailer->queue('emails.admin.business.flagged', $data, function(Message $message) {

            $message->to(env('APP_EMAIL_SENDER', 'Toilets for Trans Folk'));
            $message->from(env('APP_EMAIL_SENDER', 'TFTF Web App'));

        });
    }
}
