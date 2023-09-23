<?php

namespace App\Services\Article;

use App\Contracts\CategoryRepositoryInterface;
use App\Http\Resources\CategoryResource;

/**
 * Class CategoryService
 * @package App\Services\Article
 */
class CategoryService
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function firstOrCreate($key, $data)
    {
        return $this->categoryRepository->firstOrCreate($key, $data);
    }

    public function getList()
    {
        $items = $this->categoryRepository->get();

        return CategoryResource::collection($items);
    }
}
