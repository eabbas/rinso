<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class field extends Model
{
    protected $fillable = [
    'title',
    'description',
    'image',
    'status',
    'institute_id',
   ];
    public function institute()
{
    return $this->belongsTo(institute::class , 'institute_id');
}

 public function lessons()
{
    return $this->hasMany(lesson::class);
}

}
