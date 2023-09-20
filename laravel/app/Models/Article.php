<?php

namespace App\Models;

use App\Enums\ArticleEnums;
use App\Observers\OnlySearchableModelObserver;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;
use Laravel\Scout\SearchableScope;

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
        'category',
        'url',
        'image',
        'published_at'
    ];

    public static function bootSearchable(): void
    {
        static::addGlobalScope(new SearchableScope);
        static::observe(new OnlySearchableModelObserver());
        (new static)->registerSearchableMacros();
    }

    public function searchableAs(): string
    {
        return ArticleEnums::ELASTICSEARCH_INDEX_NAME;
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'source' => $this->source->name,
            'title' => $this->title,
            'category' => $this->category,
            'url' => $this->url,
            'image' => $this->image,
            'published_at' => $this->published_at,
        ];
    }

    /**
     * @return BelongsTo
     */
    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);
    }

}
