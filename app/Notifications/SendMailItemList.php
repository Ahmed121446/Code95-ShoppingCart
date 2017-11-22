<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendMailItemList extends Notification
{
    use Queueable;

    public $user;
    public $ItemList;
    public $Item_Price_and_Quantity;

    public function __construct($user,$ItemList,$Item_Price_and_Quantity)
    {
        $this->user                         = $user;
        $this->ItemList                     = $ItemList;
        $this->Item_Price_and_Quantity      = $Item_Price_and_Quantity;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        
        return (new MailMessage)->markdown('email.ShoppingCartList',[
            'user'                      => $this->user,
            'ItemList'                  => $this->ItemList,
            'Item_Price_and_Quantity'   => $this->Item_Price_and_Quantity

        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
