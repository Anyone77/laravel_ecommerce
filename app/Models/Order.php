<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    use Notifiable;

    public function product()
    {
        return $this->belongsTo('App\Models\Products', 'product_id');
    }
}
