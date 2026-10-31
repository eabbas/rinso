<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class socialMedia extends Model
{
  protected $fillable = [
    'title',
    'link',
    'icon_path',
    'color',
  ];

  public function covers()
  {
    return $this->belongsToMany(covers::class, 'social_addresses', 'covers_id', 'socialMedia_id');
  }

  public function social_addresses()
  {
    return $this->hasMany(social_address::class, 'socialMedia_id');
  }
}
