<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class samples extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'intro_product_id',
    ];

    public function product(){
        return $this->belongsTo(intro_product::class);
    }
}
