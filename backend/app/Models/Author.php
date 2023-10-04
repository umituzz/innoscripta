<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * Class Author
 */
class Author extends BaseModel
{
    protected $fillable = [
        'source_id',
        'name',
    ];

    public function users(): MorphToMany
    {
        return $this->morphToMany(User::class, 'preferenceable');
    }
}
