<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class institute_request extends Model
{
   protected $fillable = [
    'user_id',
    'institute_id',
    'field_id',
    'status',
   ];

   public function institute(){
     return $this->belongsTo(institute::class , 'institute_id');
   }

}
