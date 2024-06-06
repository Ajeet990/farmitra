<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [

        'category_id', 'sub_category_id', 'brand_id', 'store_id', 'name', 'is_variant', 'is_active', 'product_details'
    ];
}
