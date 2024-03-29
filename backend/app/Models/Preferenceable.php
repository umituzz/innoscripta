<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Preferenceable
 */
class Preferenceable extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'preferenceable_type',
        'preferenceable_id',
    ];

    public function preferenceable(): MorphTo
    {
        return $this->morphTo();
    }
}
