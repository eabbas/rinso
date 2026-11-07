<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class item_quantity extends Model
{
    protected $fillable = [
        'order_id',
        'menu_item_id',
        'quantity',
        'date',
    ];
}
