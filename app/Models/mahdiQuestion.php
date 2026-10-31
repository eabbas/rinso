<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mahdiQuestion extends Model
{
    protected $table = 'mahdi_questions';
    protected $fillable = [
        'title',
        'description',
        'mahdiTest_id',
    ];

    public function test(){
        return $this->belongsTo(mahdiTest::class, 'mahdiTest_id');
    }

    public function options(){
        return $this->hasMany(mahdiQuestion_option::class, 'mahdiQuestion_id');
    }
}
