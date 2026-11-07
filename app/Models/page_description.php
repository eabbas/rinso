<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class page_description extends Model
{
    protected $fillable =
        [
            'description',
            'style',
            'page_id',
            'block_id'
        ];
    public function page()
    {
        return $this->belongsTo(pages::class, 'page_id');
    }

    public function block()
    {
        return $this->belongsTo(page_blocks::class, 'block_id');
    }
}
