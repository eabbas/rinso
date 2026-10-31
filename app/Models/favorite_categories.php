<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class favorite_categories extends Model
{
    protected $fillable =
    [
        'title',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
