<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'order_id',
        'order_detail_qty',
        'order_detail_price',
        'order_detail_discount',
        'order_detail_subtotal',
    ];

    public function Service()
    {
        return $this->belongsTo(Service::class);
    }

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}
