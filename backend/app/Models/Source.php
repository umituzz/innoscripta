<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Class Resource
 * @package App\Models
 */
class Source extends BaseModel
{
    protected $fillable = [
        'name'
    ];

    /**
     * @return HasMany
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    /**
     * @return MorphMany
     */
    public function preferences(): MorphMany
    {
        return $this->morphMany(Preferenceable::class, 'preferenceable');
    }
}
