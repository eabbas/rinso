<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class province_cities extends Model
{
    protected $fillable = [
        'parent',
        'title'
    ];

    public function career(){
        return $this->hasMany(career::class, 'city_id');
    }
    public function ecomm(){
        return $this->hasMany(career::class, 'city_id');
    }

    public function province(){
        return $this->belongsTo(province_cities::class, 'parent');
    }
    public function institute(){
        return $this->hasMany(institute::class, 'city_id');
    }
}
