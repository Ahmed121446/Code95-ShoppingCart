<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListOfItemsToBuy extends Mailable
{
    use Queueable, SerializesModels;

     public $user ;

    public $ShoppingCartItems ;
    public $CardPrice_and_Quantity ;


    public function __construct($user,$ShoppingCartItems,$CardPrice_and_Quantity)
    {
        $this->user = $user ;
        $this->ShoppingCartItems = $ShoppingCartItems ;

        $this->CardPrice_and_Quantity = $CardPrice_and_Quantity ;
       
       //dd($CardPrice_and_Quantity,$ShoppingCartItems);
    }
    
    public function build()
    {
        return $this->markdown('email.MailToBuyItems');
    }
}
