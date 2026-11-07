<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class custom_product extends Model
{
    protected $fillable=[
        'title' , 
        'description' ,
        'image' ,
        'material_limit' , 
        'career_id'
    ];

    public function custom_product_materials()
    {
        return $this->hasMany(custom_product_material::class);
    }
    public function custom_product_variants()
    {
        return $this->hasMany(custom_product_variant::class);
    }
    public function career()
    {
        return $this->belongsTo(career::class);
    }
   public function customCategories()
   {
    return $this->hasMany(customCategory::class , 'custom_pro_id');
   }
}
