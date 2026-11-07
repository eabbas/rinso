<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ecomm extends Model
{
  protected $fillable = [
    'logo',
    'banner', 
    'description',
    'title',
    'address', 
    'user_id',
    'email',
    'social_media',
    'city_id',
    'active',
    'show_in_home',

  ];

  public $timestamps = true;

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function ecomm_category()
  {
    return $this->hasMany(ecomm_category::class)->chaperOne();
  }

  public function ecomm_product()
  {
    return $this->hasMany(ecomm_product::class)->chaperOne();
  }

  public function ecomm_qrCode()
  {
    return $this->hasOne(ecomm_qrCode::class);
  }
    public function province_city(){
    return $this->belongsTo(province_cities::class, 'city_id');
  }
}
