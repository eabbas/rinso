<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class page_category_page extends Model
{
    protected $fillable = [
        'page_id',
        'page_category_id',
    ];
}
