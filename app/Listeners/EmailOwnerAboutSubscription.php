<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use App\Models\Newsletter;
use App\Mail\UserSubscribedMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailOwnerAboutSubscription implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle(UserSubscribed $event)
    {
        Newsletter::create([
            'email' => $event->email
        ]);

        Mail::to($event->email)->send(new UserSubscribedMessage());
    }
}
