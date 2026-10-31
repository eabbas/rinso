<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class social_address extends Model
{
    protected $fillable=[
        'socialMedia_id',
        'user_id' , 
        'username' ,
        'page_id'
    ];
     public function socialMedia()
    {
        return $this->belongsTo(socialMedia::class, 'socialMedia_id');
    }

    public function page(){
        return $this->belongsTo(pages::class , 'page_id');
    }
}
