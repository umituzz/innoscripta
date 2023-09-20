<?php

namespace App\Repositories;

use App\Contracts\CategoryRepositoryInterface;
use App\Models\Category;

/**
 * Class CategoryRepository
 * @package App\Repositories
 */
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    private Category $category;

    public function __construct(Category $category)
    {
        parent::__construct($category);

        $this->category = $category;
    }
}
