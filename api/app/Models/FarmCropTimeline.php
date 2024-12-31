<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmCropTimeline extends Model
{
    protected $fillable = ['crop_timeline_id','farm_crop_id','is_completed','is_completed_date'];
    public function crop_timeline(){
        return $this->belongsTo(CropTimeline::class,'crop_timeline_id','id')->select(['id','crop_id','name']);
    }
    public function farm_crop(){
        return $this->belongsTo(FarmerFarmCrop::class,'farm_crop_id','id');
    }
}
