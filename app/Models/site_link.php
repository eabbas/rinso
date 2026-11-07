<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class site_link extends Model
{
    protected $fillable=[
        'address',
        'user_id' , 
        'title' ,
        // 'icon_path',
        'page_id',
    ];

    public function page(){
        return $this->belongsTo(pages::class , 'page_id');
    }
}
