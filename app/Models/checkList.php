<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class checkList extends Model
{
    protected $fillable = [
        'programming_time',
        'programming_description',
        'english_time',
        'english_description',
        'reading_time',
        'reading_description',
        'user_id',
        'description',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
