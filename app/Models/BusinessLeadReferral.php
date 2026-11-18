<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessLeadReferral extends Model
{
    protected $guarded = [];

    public function businessLead(): BelongsTo
    {
        return $this->belongsTo(BusinessLead::class);
    }
}