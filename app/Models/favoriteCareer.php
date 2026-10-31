<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class favoriteCareer extends Model
{
    protected $fillable=[
        'user_id',
        'career_id'
    ];
}
