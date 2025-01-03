<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    protected $fillable = [
        'message',
        'file',
        'line',
        'created_at',
        'updated_at'
    ];
}
