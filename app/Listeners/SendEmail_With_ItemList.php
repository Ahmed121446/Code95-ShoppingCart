<?php

namespace App\Listeners;

use App\Events\BuyItems;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail_With_ItemList
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
     * @param  BuyItems  $event
     * @return void
     */
    public function handle(BuyItems $event)
    {
        //
    }
}
