<?php

namespace App\Listeners;

use App\Events\WelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class WelcomeMailFired
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
     * @param  WelcomeMail  $event
     * @return void
     */
    public function handle(WelcomeMail $event)
    {
        // fetch user details
        $user = User::find($event->user_id)->toArray();
        
        // send email to the user
        Mail::send('welcome_email', $user, function($message) use ($user) {
            $message->to($user['email']);
            $message->subject('Welcome to the assignment.');
        });
    }
}
