<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public function product()
    {
return $this->belongsTo(\App\Models\Product::class, 'product_id');    }

public function user()
{
    return $this->belongsTo(\App\Models\User::class, 'user_id');
}
}


