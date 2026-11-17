<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BusinessLead extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'has_store' => 'boolean',
            'has_website' => 'boolean',
            'stores_customer_data' => 'boolean',
            'repeat_purchase_unknown' => 'boolean',
            'repeat_purchase_percent' => 'integer',
        ];
    }

    public function socials(): HasMany
    {
        return $this->hasMany(BusinessLeadSocial::class);
    }

    public function sellers(): HasMany
    {
        return $this->hasMany(BusinessLeadSeller::class);
    }

    public function valuePropositions(): HasMany
    {
        return $this->hasMany(BusinessLeadValueProposition::class);
    }

    public function salesProblems(): HasMany
    {
        return $this->hasMany(BusinessLeadSalesProblem::class);
    }

    public function cooperations(): HasMany
    {
        return $this->hasMany(BusinessLeadCooperation::class);
    }
}
