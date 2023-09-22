<?php

namespace App\Services\Article;

use App\Contracts\ArticleRepositoryInterface;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;

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

    public function getList()
    {
        $items = $this->articleRepository->getWith();

        return ArticleResource::collection($items);
    }

    public function getAllElasticData($request)
    {
        $searchTerm = '*';

        if ($request->has('sourceId') ) {
            $searchTerm = "source_id:({$request->input('sourceId')})";
        }

        if ($request->has('searchTerm')) {
            $searchTerm =  "title:({$request->input('searchTerm')})";
        }

        $items = $this->articleRepository->getElasticsearchData($searchTerm);

        return new ArticleCollection($items);
    }

    public function firstOrCreate($key, $data)
    {
        return $this->articleRepository->firstOrCreate($key, $data);
    }
}
