<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Article
 * @package App\Models
 */
class Article extends BaseModel
{
    protected $fillable = [
        'resource_id',
        'title',
        'category',
        'url',
        'image',
        'published_at'
    ];

    /**
     * @return BelongsTo
     */
    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);
    }

}
