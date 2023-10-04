<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * Class Category
 */
class Category extends BaseModel
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function users(): MorphToMany
    {
        return $this->morphToMany(User::class, 'preferenceable');
    }
}
