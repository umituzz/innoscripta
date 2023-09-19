<?php

namespace App\Services\Article;

use App\Contracts\ArticleRepositoryInterface;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class ArticleService
 * @package App\Services\Article
 */
class ArticleService
{
    private ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function getList()
    {
        $items = $this->articleRepository->get();

        return ArticleResource::collection($items);
    }
}
