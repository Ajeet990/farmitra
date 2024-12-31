<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class FarmitraFarm extends Model
{
    use HasFactory;
    protected $fillable = ['farmer_id', 'name','banner', 'location', 'size'];

    public function farmer()
    {
        return $this->belongsTo(User::class);
    }
}
