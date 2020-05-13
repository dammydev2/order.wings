<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'orderID',
        'customer_id',
        'pickup_address',
        'delivery_address',
        'receiver_name',
        'receiver_phone',
        'distance',
        'weight',
        'item',
        'quantity',
    ];
}
