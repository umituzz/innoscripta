<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * Class Category
 * @package App\Models
 */
class Category extends BaseModel
{
    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * @return MorphToMany
     */
    public function users(): MorphToMany
    {
        return $this->morphToMany(  User::class, 'preferenceable')->withTimestamps();
    }
}
