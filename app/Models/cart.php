<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable=[
        'career_id',
        'qr_code_id',
        'menu_item_id',
        'user_id',
        'quantity',
        'order_id',
    ];
    public function careers()
    {
        return $this->belongsTo(career::class);
    }
    public function qr_code()
    {
        return $this->belongsTo(qr_code::class);
    }
    public function menu_item()
    {
        return $this->belongsTo(menu_item::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsTo(order::class);
    }
}
