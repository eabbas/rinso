<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_logs extends Model
{
    protected $fillable = [
        'user_id',
        'ip',
        'is_mobile',
        'browser',
        'platform',
        'page_id',
    ];
}
