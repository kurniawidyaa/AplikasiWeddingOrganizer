<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePromo extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'starting_price',
        'final_price',
        'percent_discount',
        'nominal_discount',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
