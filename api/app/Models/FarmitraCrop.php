<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmitraCrop extends Model
{
    protected $fillable = [
        'name',
        'season',
        'soil_type',
        'seed_type',
        'region',
        'water_requirement',
        'banner', // Add banner here
    ];
}
