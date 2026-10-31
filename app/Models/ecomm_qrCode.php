<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ecomm_qrCode extends Model
{
    protected $fillable = [
        'qr_path',
        'user_id',
        'ecomm_id',
        'slug'
    ];

    public function ecomm()
    {
        return $this->belongsTo(ecomm::class);
    }
}
