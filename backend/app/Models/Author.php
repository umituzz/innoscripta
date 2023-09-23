<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * Class Author
 * @package App\Models
 */
class Author extends BaseModel
{
    protected $fillable = [
        'source_id',
        'name'
    ];

    /**
     * @return MorphToMany
     */
    public function users(): MorphToMany
    {
        return $this->morphToMany(  User::class, 'preferenceable')->withTimestamps();
    }
}
