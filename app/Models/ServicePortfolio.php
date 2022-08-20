<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePortfolio extends Model
{
    use HasFactory;

    protected $fillable = ['service_category_id', 'id', 'name', 'thumbnail'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['serviceCategory'] ?? false, function ($query, $serviceCategory) {
            return $query->whereHas('serviceCategory', function ($query) use ($serviceCategory) {
                $query->where('id', $serviceCategory);
            });
        });
    }

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}
