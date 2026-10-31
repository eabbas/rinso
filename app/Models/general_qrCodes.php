<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class general_qrCodes extends Model
{
    protected $fillable = [
        'link',
        'title',
        'description',
        'image_path',
        'user_id'
    ];
}
