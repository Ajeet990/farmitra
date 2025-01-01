<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\SubCrop;
use App\Models\FarmitraCrop;

class CropDiagnosis extends Model
{
    protected $table = 'crop_diagnosis';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function crop()
    {
        return $this->belongsTo(SubCrop::class, 'crop_id', 'id');
    }
    
    public function cropCategory()
    {
        return $this->belongsTo(FarmitraCrop::class, 'crop_category_id', 'id');
    }

}
