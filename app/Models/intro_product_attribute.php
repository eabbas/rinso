<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class intro_product_attribute extends Model
{
    protected $fillable = [
        'key',
        'value',
        'intro_product_id',
    ];

    public function product(){
        return $this->belongsTo(intro_product::class);
    }
}
