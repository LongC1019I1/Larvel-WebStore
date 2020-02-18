<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'productName',
        'productQty',
        'productPrice',
        'status'
    ];
}
