<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class careerCategory extends Model
{
    protected $fillable = [
        'title',
        'description',
        'show_in_home',
        'main_image'
    ];

    public function careers()
    {
        return $this->hasMany(career::class, 'career_category_id')->chaperone();
    }
}
