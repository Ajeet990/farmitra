<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['user_id','location','tags','image','content'];
    
     public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->select(['id','name','profile_picture']);
    }
}
