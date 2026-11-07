<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class intro_category extends Model
{
    protected $fillable = ['title', 'user_id', 'page_id'];

    public function products(){
        return $this->belongsToMany(intro_product::class, 'intro_pro_cats');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function page(){
        return $this->belongsTo(pages::class, 'page_id');
    }
}
