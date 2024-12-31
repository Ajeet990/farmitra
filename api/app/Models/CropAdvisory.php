<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CropAdvisory extends Model
{

    protected $fillable = ['crop_category','crop_sub_category','title','duration_title','from','to'];
    public function crop(){
        return $this->belongsTo(SubCrop::class,'crop_id','id');
    }

    public function advisory_details(){
        return $this->hasMany(CropAdvisoryDetails::class,'crop_advisory_id','id')->select(['id', 'crop_advisory_id', 'title','banner']);
    }
}
