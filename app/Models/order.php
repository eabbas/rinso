<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'address_id',
        'user_id',
        'qr_code_id',
        'career_id',
        'order_status_id',
        'order_code',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function career(){
        return $this->belongsTo(career::class);
    }

    public function address(){
        return $this->belongsTo(address::class);
    }
    public function qr_code(){
        return $this->belongsTo(qr_code::class);
    }

    public function carts(){
        return $this->hasMany(cart::class);
    }

    public function status(){
        return $this->belongsTo(order_status::class, 'order_status_id');
    }
}
