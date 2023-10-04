<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

/**
 * Class Article
 */
class Article extends BaseModel
{
    use Searchable;

    protected $primaryKey = 'id';

    protected $fillable = [
        'source_id',
        'author_id',
        'category_id',
        'title',
        'slug',
        'description',
        'url',
        'image',
        'published_at',
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

    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
