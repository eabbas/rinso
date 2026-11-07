<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lesson_class extends Model
{
    protected $fillable = [
    'title',
    'description',
    'image',
    'assignment',
    'user_id',
    'master_id',
    'lesson_id',
   ];

   public function lesson()
{
    return $this->belongsTo(lesson::class , 'lesson_id');
}

public function class_attachments()
{
    return $this->hasMany(class_attachment::class);
}

public function class_comments()
{
    return $this->hasMany(class_comment::class);
}

public function master(){
    return $this->belongsTo(User::class , 'master_id');
}

public function masters(){
    return $this->belongsToMany(User::class , 'master_class' , 'class_id' , 'master_id');
}

public function students(){
    return $this->belongsToMany(User::class , 'class_students' , 'class_id' , 'student_id');
}


}
