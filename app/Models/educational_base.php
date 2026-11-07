<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class educational_base extends Model
{
    protected $table = 'educational_base';
    protected $fillable=[
        'title',
    ];

    public function tests(){
        return $this->hasMany(mahdiTest::class, 'educational_base_id');
    }
}
