<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class page_blocks extends Model
{
    protected $fillable=[
    'title',
    'page_id',
    'type'
    ];

    public function FAQs()
    {
    return $this->hasMany(FAQ::class,'block_id');
    }
    public function page(){
        return $this->belongsTo(pages::class , 'page_id');
    }
    public function page_contactuses()
    {
        return $this->hasMany(page_contactus::class,'block_id');
    }
    public function page_descriptions()
    {
        return $this->hasMany(page_description::class,'block_id');
    }
}
