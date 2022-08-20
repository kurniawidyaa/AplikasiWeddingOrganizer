<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'identifier'];

    public function Service()
    {
        return $this->hasMany(Service::class);
    }

    public function servicePortfolio()
    {
        return $this->hasMany(ServicePortfolio::class);
    }
}
