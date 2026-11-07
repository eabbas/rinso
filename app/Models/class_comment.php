<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class class_comment extends Model
{
   protected $fillable = [
    'comment',
    'user_id',
    'parent_id',
    'lesson_class_id',
   ];

   public function lesson_class()
    {
        return $this->belongsTo(Lesson_class::class);
    }

    public function user()
    {
       return $this->belongsTo(User::class , 'user_id' );
    }
}
