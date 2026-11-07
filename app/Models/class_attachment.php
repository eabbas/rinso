<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class class_attachment extends Model
{
   protected $fillable = [
    'title',
    'description',
    'image',
    'file_path',
    'type',
    'lesson_class_id',
   ];

   public function lesson_class()
{
    return $this->belongsTo(lesson_class::class , 'lesson_class_id');
}

}
