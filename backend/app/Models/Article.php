<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

/**
 * Class Article
 * @package App\Models
 */
class Article extends BaseModel
{
    use Searchable;

    protected $primaryKey = 'id';

    protected $fillable = [
        'source_id',
        'title',
        'url',
        'image',
        'published_at'
    ];

    public function searchableAs(): string
    {
        return 'articles';
    }

    public function toSearchableArray()
    {
        $with = [
            'source',
        ];

        $this->loadMissing($with);

        return $this->toArray();
    }

    /**
     * @return BelongsTo
     */
    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);
    }
}
