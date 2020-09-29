<?php

namespace App\Listeners;

use App\Events\VoteStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendVoteStatusNotification
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
     * @param  VoteStatus  $event
     * @return void
     */
    public function handle(VoteStatus $event)
    {
        //
    }
}
