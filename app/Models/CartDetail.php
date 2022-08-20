<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'cart_id',
        'cart_detail_qty',
        'cart_detail_price',
        'cart_detail_discount',
        'cart_detail_subtotal',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function updateDetail($detailitem, $qty, $price, $discount)
    {
        $this->attributes['cart_detail_qty'] = $detailitem->cart_detail_qty + $qty;
        $this->attributes['cart_detail_subtotal'] = $detailitem->cart_detail_subtotal + ($qty * ($price - $discount));
        self::save();
    }
}
