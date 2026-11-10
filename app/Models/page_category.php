<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class page_category extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description',
    ];

    public function pages(){
        return $this->belongsToMany(pages::class, 'page_category_pages', 'page_category_id', 'page_id');
    }
}
