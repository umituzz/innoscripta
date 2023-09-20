<?php

namespace App\Services\Category;

use App\Contracts\CategoryRepositoryInterface;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class CategoryService
 * @package App\Services\Category
 */
class CategoryService
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function getList()
    {
        $items = $this->categoryRepository->get();

        return CategoryResource::collection($items);
    }
}
