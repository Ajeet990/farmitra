<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['blog_category_id','title', 'content', 'banner','slug'];
    public static function boot()
    {
        parent::boot();

        static::saving(function ($blog) {
            if (!$blog->slug) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }
    
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->select(['id','name','profile_picture']);
    }
}
