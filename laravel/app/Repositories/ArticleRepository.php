<?php

namespace App\Repositories;

use App\Contracts\ArticleRepositoryInterface;
use App\Http\Resources\ArticleResource;
use App\Models\Article;

/**
 * Class ArticleRepository
 * @package App\Repositories
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
        return $this->article->with('source')->get();
    }

    public function getAllElasticData()
    {
        $items = $this->article->search('*')->get();

        return ArticleResource::collection($items);
    }
}
