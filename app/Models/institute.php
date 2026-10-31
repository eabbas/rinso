<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Function_;

class institute extends Model
{
    protected $fillable = [
    'title',
    'description',
    'logo',
    'cover_img',
    'phone',
    'website',
    'address',
    'user_id',
    'email',
    'city_id',
    'parent_id',
   ];
   
public function user()
{
   return $this->belongsTo(User::class , 'user_id');
}

   public function fields()
{
    return $this->hasMany(field::class);
}

public function lessons()
{
    return $this->hasManyThrough(
        lesson::class,
        field::class,
        'institute_id',
        'field_id',
        'id',
        'id',
    );
}

public function masters(){
   return $this->belongsToMany(User::class , 'master_institutes' , 'institute_id' , 'master_id');
}

public function students(){
    return $this->belongsToMany(User::class , 'user_institutes' , 'institute_id' , 'user_id');
}

public function province_city(){
        return $this->belongsTo(province_cities::class, 'city_id');
}

public function owner(){
    return $this->belongsTo(user::class , 'user_id');
}


public function children(){
    return $this->hasMany(institute::class , 'parent_id')->with('children');
   }

public function requests(){
    return $this->hasMany(institute_request::class);
}

public function users(){//returns requests users
      return $this->belongsToMany(User::class,"institute_requests",'institute_id',"user_id")->withPivot(['status']);
   }

   
//  public function lessons()
//     {
//           return  $this->hasManyThrough(lesson::class, field::class, 'institute_id', 'field_id'); 
        
//     }

}
