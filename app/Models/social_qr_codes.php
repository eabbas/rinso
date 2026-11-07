<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class social_qr_codes extends Model
{
  protected $fillable = [
    'page_id',
    'qr_path',
    'slug',
    'page_path',
  ];

  public function pages()
  {
    return $this->belongsTo(pages::class , 'page_id');
  }
}
