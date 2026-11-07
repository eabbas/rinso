<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mahdiQuestion_option extends Model
{
    protected $table = 'mahdi_question_options';
    protected $fillable = [
        'mahdiQuestion_id',
        'option',
        'right_answer',
    ];

    public function question(){
        return $this->belongsTo(mahdiQuestion::class, 'mahdiQuestion_id');
    }
}
