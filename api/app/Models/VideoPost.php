<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoPost extends Model
{
    protected $fillable =['user_id','location','tags','video_link','content'];
     public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->select(['id','name','profile_picture']);
    }
}
