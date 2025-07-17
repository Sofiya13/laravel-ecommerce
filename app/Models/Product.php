<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
        'product_name',
        'type',
        'price',
        'offer_price',
        'description',
        'images'
    ];

    protected $casts = [
        'images' => 'array', 
    ];
}
