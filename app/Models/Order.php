<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'shipping_address_id',
        'delivery_date'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function cartDetail()
    {
        return $this->hasMany(CartDetail::class);
    }

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class);
    }
}
