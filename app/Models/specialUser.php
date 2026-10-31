<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class specialUser extends Model
{
    protected $fillable = [
        'page_id',
        'user_id',
        'type'
    ];
}
