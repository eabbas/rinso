<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class page_category extends Model
{
    protected $fillable = [
        'fa_title',
        'en_title',
        'parent_id',
        'description',
    ];

    public function pages(){
        return $this->belongsToMany(pages::class, 'page_category_page');
    }
}
