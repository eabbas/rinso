<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class custom_product_material extends Model
{
    protected $fillable=[
        'title' , 
        'description' ,
        'price_per_unit' ,
        'image' ,
        'required' , 
        'order' ,
        'max_unit_amount' ,
        'custom_product_id' ,
        'category_id'
    ];
    public function custom_product()
    {
        return $this->belongsTo(custom_product::class);
    }
    public function customCategory()
    {
        return $this->belongsTo(customCategory::class, 'category_id');
    }
}
