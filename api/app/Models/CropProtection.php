<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CropProtection extends Model
{
    protected $fillable = ['crop_id','title','banner','banners','content','audio','video','recommended_product_filter'];

    public function crop(){
        return $this->belongsTo(SubCrop::class,'crop_id','id');
    }
}
