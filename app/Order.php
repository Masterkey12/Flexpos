<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'customer_id',
        'proof_of_payment'
    ];

public function item() {
    return $this->belongsTo('App\Item', 'item_id', 'id');
}

public function customer() {
    return $this->belongsTo('App\Customer', 'customer_id' , 'id');
}


}
