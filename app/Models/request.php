<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class request extends Model
{
    protected $fillable = [
        'user_id',
        'status'
    ];
}
