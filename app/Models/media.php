<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    protected $fillable=[
        'type' , 
        'path' ,
        'is_main' ,
        'product_id'
    ];

    public function products()
    {
        return $this->belongsTo(product::class);
    }
}
