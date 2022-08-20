<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_category_id',
        'service_name',
        'identifier',
        'thumbnail',
        'feature',
        'note',
        'service_qty',
        'price',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%') //mencari kata yg ada di dalam title
                    ->orWhere('body', 'like', '%' . $search . '%'); //mencari kata yg ada di dalam body
            });
        });

        $query->when($filters['ServiceCategory'] ?? false, function ($query, $ServiceCategory) {
            return $query->whereHas('ServiceCategory', function ($query) use ($ServiceCategory) {
                $query->where('identifier', $ServiceCategory);
            });
        });
    }

    public function ServiceCategory() //nama fungsi harus sama dengan nama model
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function OrderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function servicePromo()
    {
        return $this->hasMany(ServicePromo::class);
    }
}
