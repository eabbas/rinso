<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_institute extends Model
{
    protected $fillable = [
        'user_id',
        'institute_id',
    ];
}
