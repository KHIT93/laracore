<?php

namespace App\Listeners;

use App\Events\NewUserRegistered;
use App\Models\LogEntry;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserRegisteredEventListener
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
     * @param  NewUserRegistered  $event
     * @return void
     */
    public function handle(NewUserRegistered $event)
    {
        //Log the user creation
        LogEntry::create([
            'uid' => 0,
            'type' => 200,
            'url' => \Request::getRequestUri(),
            'hostname' => \Request::getClientIp(),
            'message' => 'New user has been created with the username '.$event->user->name
        ]);
        //Check if the user should recieve an email notification

        //Check if someone else should recieve an email notification

        //Send email notification
    }
}
