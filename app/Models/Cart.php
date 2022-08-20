<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'invoice_number',
        'cart_status',
        'payment_status',
        'cart_date',
        'cart_subtotal',
        'cart_discount',
        'cart_total',
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function cartdetail()
    {
        return $this->hasMany(CartDetail::class);
    }


    // this function to update subtotal & total on cart
    // $cartitem->
    // $subtotal-> 
    public function updateTotal($cartitem, $subtotal)
    {
        $this->attributes['cart_subtotal'] = $cartitem->cart_subtotal + $subtotal;
        $this->attributes['cart_total'] = $cartitem->cart_total + $subtotal;
        self::save();
    }
}
