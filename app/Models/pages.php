<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pages extends Model
{
  protected $fillable = [
    'logo_path',
    'user_id',
    'category_id',
    'cover_path',
    'title',
    'subTitle',
    'description',
    'active',
    'show_in_home',
    'count',
    'user_name',
    'is_private'
  ];

  public function socialMedia()
  {
    return $this->belongsToMany(socialMedia::class, 'social_addresses', 'page_id', 'socialMedia_id');
  }

  public function socialAddresses()
  {
    return $this->hasMany(social_address::class, 'page_id');
  }

  public function siteLinks()
  {
    return $this->hasMany(site_link::class, 'page_id');
  }

  public function social_qr_codes()
  {
    return $this->hasOne(social_qr_codes::class, 'page_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function FAQs()
  {
    return $this->hasMany(FAQ::class, 'page_id');
  }

  public function page_blocks()
  {
    return $this->hasMany(page_blocks::class, 'page_id');
  }

  public function introCats()
  {
    return $this->hasMany(intro_category::class, 'page_id');
  }

  public function introPros()
  {
    return $this->hasMany(intro_product::class, 'page_id');
  }

  public function specialUsers()
  {
    return $this->belongsToMany(User::class, 'special_users', 'page_id', 'user_id');
  }

  public function page_contactuses()
  {
    return $this->hasMany(page_contactus::class, 'page_id');
  }

  public function category(){
    return $this->belongsTo(page_category::class, 'category_id');
  }
}
