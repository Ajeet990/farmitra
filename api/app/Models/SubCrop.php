<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SubCrop extends Model
{
    protected $fillable = ['farmitra_crop_id','name', 'banner'];

    public function crop()
    {
        return $this->belongsTo(FarmitraCrop::class,'farmitra_crop_id','id');
    }

    public function timelines(){
        return $this->hasMany(CropTimeline::class,'crop_id','id');
    }
    public function advisory(){
        return $this->hasMany(CropAdvisory::class,'crop_id','id');
    }

    public function protection(){
        return $this->hasMany(CropProtection::class,'crop_id','id');
    }
}
