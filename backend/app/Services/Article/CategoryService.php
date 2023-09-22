<?php

namespace App\Services\Article;

use App\Contracts\CategoryRepositoryInterface;

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
}
