<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Preferenceable
 * @package App\Models
 */
class Preferenceable extends BaseModel
{
    protected $fillable = [
        'user_id',
        'preferenceable_type',
        'preferenceable_id'
    ];

    /**
     * @return MorphTo
     */
    public function preferenceable(): MorphTo
    {
        return $this->morphTo();
    }
}
