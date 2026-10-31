<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customCategory extends Model
{
    protected $fillable=[
        'title' , 
        'required' ,
        'custom_pro_id' ,
        'max_item_amount'
    ];

    public function custom_product_material()
    {
        return $this->hasMany(custom_product_material::class, 'category_id');
    }
   public function custom_products()
   {
        return $this->belongsTo(custom_product::class , 'custom_pro_id');
   }
}
