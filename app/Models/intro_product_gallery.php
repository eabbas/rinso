<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class intro_product_gallery extends Model
{
    protected $fillable = [
        'image', 
        'intro_product_id'
    ];

    public function product(){
        return $this->belongsTo(intro_product::class);
    }
}
