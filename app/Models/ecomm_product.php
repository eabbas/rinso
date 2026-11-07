<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ecomm_product extends Model
{
  protected $fillable = [
    'title',
    'description',
    'price',
    'discount',
    'show_in_home',
    'ecomm_id',
    'image_path',
  ];

  public function ecomm_categories()
  {
    return $this->belongsToMany(ecomm_category::class, 'ecomm_product_ecomm_categories', 'ecomm_product_id', 'ecomm_category_id');
  }

  public function ecomm()
  {
    return $this->belongsTo(ecomm::class);
  }

  public function gallery(){
      return $this->hasMany(ecomm_gallery::class);
  }
}
