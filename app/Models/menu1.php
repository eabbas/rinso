<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $fillable = ['page_data', 'qr_num', 'career_id'];

    public $timestamps = true;

    public function career()
    {
        return $this->belongsTo(career::class);
    }

    public function qr_codes()
    {
        return $this->hasMany(qr_code::class)->chaperone();
    }
}
