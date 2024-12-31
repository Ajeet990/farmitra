<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmerFarmTimeline extends Model
{
    protected $fillable = [
        'farmer_id',
        'farm_crop_id',
        'sowing_date',
        'is_sowing_completed',
        'irrigation_date',
        'is_irrigation_completed',
        'fertilizers_date',
        'is_fertilizers_completed',
        'pestisides_date',
        'is_pestisides_completed',
        'harvest_date',
        'is_harvest_completed',
        'completed_date',
        'is_completed_completed',
    ];

    public function farmer()
    {
        return $this->belongsTo(User::class, 'farmer_id');
    }
}
