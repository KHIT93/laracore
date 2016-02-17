<?php

namespace App\Listeners;

use App\Events\UserAccountActivated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserAccountActivatedEventListener
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
     * @param  UserAccountActivated  $event
     * @return void
     */
    public function handle(UserAccountActivated $event)
    {
        //Log the user activation
        LogEntry::create([
            'uid' => ((auth()->check()) ? \Auth::user()->uid : 0),
            'type' => 200,
            'url' => \Request::getRequestUri(),
            'hostname' => \Request::getClientIp(),
            'message' => 'New user with the username '.$event->user->name.' has been activated'
        ]);
        //Check if the user should recieve an email notification

        //Check if someone else should recieve an email notification

        //Send email notification
    }
}
