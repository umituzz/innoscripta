<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Class Resource
 */
class Source extends BaseModel
{
    protected $fillable = [
        'name',
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function preferences(): MorphMany
    {
        return $this->morphMany(Preferenceable::class, 'preferenceable');
    }
}
