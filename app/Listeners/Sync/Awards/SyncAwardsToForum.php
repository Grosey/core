<?php

namespace App\Listeners\Sync\Awards;

use App\Events\Mship\Award\AwardIssued;

class SyncAwardsToForum
{
    /**
     * Handle the event.
     *
     * @param  AwardIssued $event
     * @return void
     */
    public function handle(AwardIssued $event)
    {
        $account = $event->award->account;

        // Add Award To Member's Forum Account
    }
}