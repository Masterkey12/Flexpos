<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    public function order() {
        return $this->belongsTo('App\Order', 'order_id' , 'id');
    }
}
