<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mahdiTest extends Model
{
    protected $table = 'mahdi_tests';
    protected $fillable = [
        'title',
        'description',
        'duration',
        'educational_base_id',
    ];

    public function base(){
        return $this->belongsTo(educational_base::class, 'educational_base_id');
    }

    public function questions(){
        return $this->hasMany(mahdiQuestion::class, 'mahdiTest_id');
    }
}
