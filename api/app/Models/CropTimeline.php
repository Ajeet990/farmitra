<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CropTimeline extends Model
{
    protected $fillable =['crop_id','name'];

    public function crop(){
        return $this->belongsTo(SubCrop::class,'crop_id','id');
    }
}
