<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ecomm_category extends Model
{
    protected $fillable = [
        'title',
        'description',
        'parent_id',
        'show_in_home',
        'image_path',
        'ecomm_id'
    ];

//    public function parent()
//    {
//        return $this->belongsTo(category::class);
//    }

    public function children()
    {
        return $this->hasMany(ecomm_category::class, 'parent_id')->with('children');
    }

//    public function grandChild()
//    {
//        return $this->children()->with('grandChild')->with('attribute');
//    }

    public function ecomm_products()
    {
        return $this->belongsToMany(ecomm_product::class, 'ecomm_product_ecomm_categories', 'ecomm_category_id', 'ecomm_product_id');
    }

    public function ecomm()
    {
        return $this->belongsTo(ecomm::class);
    }
}
