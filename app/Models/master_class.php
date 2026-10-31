<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class master_class extends Model
{
     protected $fillable = [
        'class_id',
        'master_id',
        'status',
    ];
}
