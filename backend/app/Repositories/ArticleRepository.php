<?php

namespace App\Repositories;

use App\Contracts\ArticleRepositoryInterface;
use App\Enums\ArticleEnums;
use App\Models\Article;

/**
 * Class ArticleRepository
 */
class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    private Article $article;

    public function __construct(Article $article)
    {
        parent::__construct($article);

        $this->article = $article;
    }

    public function getWith()
    {
        return $this->article->with('source', 'author', 'category')->paginate(10);
    }

    public function getElasticsearchData($searchTerm)
    {
        return $this->article
            ->search($searchTerm)
            ->orderBy('id', 'desc')
            ->paginate(ArticleEnums::DEFAULT_PAGINATION);
    }
}
