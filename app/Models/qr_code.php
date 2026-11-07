<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class qr_code extends Model
{
    protected $fillable=[
        'qr_path',
        'user_id',
        'description',
        'career_id',
        'slug',
        'page_path',
    ];
    public function carts()
    {
        return $this->hasMany(cart::class);
    }
    public function orders()
    {
        return $this->hasMany(order::class);
    }
    public function career(){
        return $this->belongsTo(career::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}