<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lesson extends Model
{
    protected $fillable = [
    'title',
    'description',
    'image',
    'video',
    'price',
    'discount',
    'duration',
    'field_id',
   ];

   
   public function field()
{
    return $this->belongsTo(field::class , 'field_id');
}

public function lesson_classes()
{
    return $this->hasMany(lesson_class::class);
}

public function institute(){
    return $this->hasOneThrough(
        lesson::class,
        field::class,
        'institute_id',
        'field_id',
        'id',
        'id',
    );
}
}
