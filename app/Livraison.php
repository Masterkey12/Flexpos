<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    public function sale()
    {
        return $this->belongsTo('App\Sale', 'sale_id', 'id');
    }
}
