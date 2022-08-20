<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
        'recipients_name',
        'phone_number',
        'address',
        'province',
        'city',
        'distric', //kecamatan
        'ward', //kelurahan
        'postal_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
