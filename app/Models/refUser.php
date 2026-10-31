<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class refUser extends Model
{
    protected $fillable = [
        'user_id',
        'invited_user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
