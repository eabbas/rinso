<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu_custom_ingredients extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'menu_item_id',
        'image',
        'ingredients_id'
    ];
    public function menu_item(){
        return $this->belongsTo(menu_item::class);
    }
}
