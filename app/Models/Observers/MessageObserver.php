<?php namespace Toilets\Models\Observers;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message as MailMessage;
use Toilets\Models\Message;

/**
 * Created by PhpStorm.
 * User: patricknoonan
 * Date: 1/9/16
 * Time: 12:18 PM
 */
class MessageObserver
{

    /**
     * @var Mailer
     */
    private $mailer;


    /**
     * MessageObserver constructor.
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param Message $message
     */
    public function created(Message $message)
    {
        if (!app()->runningInConsole()) {
            $this->mailer->queue('emails.business.message', ['msg' => $message], function(MailMessage $mail) use($message) {

                if ($message->anonymous) {
                    $mail->from(env('APP_EMAIL_SENDER'), 'Toilets For Transfolk');
                } else {
                    $mail->from($message->user->email, $message->user->name);
                }

                $mail->to($message->business->email, $message->business->name);
            });
        }

    }

}