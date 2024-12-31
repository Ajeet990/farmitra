<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class FarmerFarmCrop extends Model
{
    use HasFactory;

    protected $fillable = ['farmer_id', 'crop_id', 'farm_id', 'banner','field_area','variety','is_sowing','sowing_date','unit','sowing_type'];

    // Relationships
    public function farmer()
    {
        return $this->belongsTo(User::class);
    }

    public function crop()
    {
        return $this->belongsTo(SubCrop::class);
    }

    public function farm()
    {
        return $this->belongsTo(FarmitraFarm::class);
    }
    
   
    
    // 'farm_crop'=>\App\Models\FarmerFarmCrop::where('id',$farm_crop_id)->first()
}
