<?php

namespace App\Mail;

use App\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Mail\StockInsufficientNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class StockInsufficientNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function checkStockAndNotify($item, $quantity_needed) {
        $item = Item::find($item_id);
    
        if ($product && $product->quantity < $quantity_needed) {
            // Envoi d'une notification par e-mail
            Mail::to('votre@email.com')->send(new StockInsufficientNotification($item));
    
            // Vous pouvez également enregistrer un journal, envoyer une notification en base de données, etc.
    
            return false; // Stock insuffisant
        }
    
        return true; // Stock suffisant
    }
    
    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name');
    }
}

