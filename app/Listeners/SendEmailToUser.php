<?php

namespace App\Listeners;

use App\Events\SignUpUser;
use App\Mail\SendRegisterUser;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendEmailToUser
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
     * @param  SignUpUser  $event
     * @return void
     */
    public function handle(SignUpUser $event)
    {
        if (isset($event->user->email)) {
            Mail::to($event->user->email)->send(new SendRegisterUser($event->user));
        }
    }
}
