<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'banner',
        'user_id',
        'career_id',
    ];

    public $timestamps = true;

    public function career()
    {
        return $this->belongsTo(career::class);
    }

    // public function menu_categories(){
    //     return $this->hasMany(menu_category::class);
    // }
    public function menu_items(){
        return $this->hasMany(menu_item::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
