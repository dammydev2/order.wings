<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable =[
        'customer_id',
        'orderID',
        'name',
        'amount',
        'reference_code'
    ];
}
