<?php

namespace App\Listeners;

use App\Events\BuyItems;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ListOfItemsToBuy;

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
        //sending mail to user with content
        $User_Email = $event->user->email;
        //dd($User_Email);
        

        \Mail::to($User_Email)->send(new ListOfItemsToBuy(
            $event->user,
            $event->items_in_cart,
            $event->cart
        ));
    }
}
