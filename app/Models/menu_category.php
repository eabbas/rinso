<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu_category extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'menu_id'
    ];
    public function menu(){
        return $this->belongsTo(menu::class);
    }
    public function menu_items(){
        return $this->hasMany(menu_item::class);
    }
}
