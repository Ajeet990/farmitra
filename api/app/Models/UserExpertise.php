<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExpertise extends Model
{
    protected $table = 'user_expertise';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function crop()
    {
        return $this->belongsTo(SubCrop::class, 'crop_id', 'id');
    }
}
