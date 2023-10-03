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

    public function findBy($key, $value)
    {
        $item = $this->articleRepository->findBy($key, $value);

        if ($item) {
            $item->load('source', 'category', 'author');

            return new ArticleResource($item);
        }

        return NULL;
    }

    /**
     * @return ArticleCollection
     */
    public function getList(): ArticleCollection
    {
        $items = $this->articleRepository->getWith();

        return new ArticleCollection($items);
    }

    /**
     * @param $request
     * @return ArticleCollection
     */
    public function getAllElasticData($request): ArticleCollection
    {
        $searchTerm = '*';

        if ($request->has('sourceId') ) {
            $searchTerm = "source_id:({$request->input('sourceId')})";
        }

        if ($request->has('categoryId') ) {
            $searchTerm = "category_id:({$request->input('categoryId')})";
        }

        if ($request->has('authorId') ) {
            $searchTerm = "author_id:({$request->input('authorId')})";
        }

        if ($request->has('searchTerm')) {
            $searchTerm =  "title:({$request->input('searchTerm')})";
        }

        $items = $this->articleRepository->getElasticsearchData($searchTerm);

        return new ArticleCollection($items);
    }

    /**
     * @param $key
     * @param $data
     * @return mixed
     */
    public function firstOrCreate($key, $data)
    {
        return $this->articleRepository->firstOrCreate($key, $data);
    }
}
