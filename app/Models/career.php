<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class career extends Model
{
    protected $fillable = [
        'logo',
        'banner',
        'title',
        'city_id',
        'address',
        'email',
        'description',
        'user_id',
        'career_category_id',
        'qr_count',
        'page_id',
        'show_in_home',
        'phone',
        'active',
        'count'
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menus()
    {
        return $this->hasMany(menu::class)->chaperOne();
    }

//    public function carts()
//    {
//        return $this->hasMany(cart::class);
//    }

    public function careerCategory()
    {
        return $this->belongsTo(careerCategory::class);
    }

    // public function menu_categories()
    // {
    //     return $this->hasMany(menu_category::class)->chaperone();
    // }
   

    public function custom_product()
    {
        return $this->hasMany(custom_product::class)->chaperone();
    }
    // public function custom_product_variant()
    // {
    //   return $this->hasMany(custom_product_variant::class)->chaperone();
    // }
    public function custom_product_variant()
    {
        return $this->hasManyThrough(
            custom_product_material::class,
            custom_product::class,
            'career_id',
            'custom_product_id'
        );
    }

    public function qr_codes()
    {
        return $this->hasMany(qr_code::class);
    }

    public function province_city()
    {
        return $this->belongsTo(province_cities::class, 'city_id');
    }

    public function orders()
    {
        return $this->hasMany(order::class);
    }

    public function favorites()
    {
        return $this->hasMany(favorites::class, 'item_id');
    }
   
}
