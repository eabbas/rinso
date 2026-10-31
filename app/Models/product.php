<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable=[
        'title' ,
        'description' ,
        'price' ,
        'discount' , 
        'show_in_home' ,
        'cat_id'
    ];

    public function medias()
    {
        return $this->hasMany(media::class);
    }
}
