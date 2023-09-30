<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StockEpuise extends Notification
{
    use Queueable;
    public $item;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function via($notifiable)
    {
        return ['database'];
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'item_id' => $this->item->id,
            'message' => 'Le stock de l\'article ' . $this->item->name . ' est épuisé.',
        ];
    }
}
