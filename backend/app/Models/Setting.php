<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Setting
 * @package App\Models
 */
class Setting extends BaseModel
{
    protected $fillable = [
        'user_id',
        'type',
        'name'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
