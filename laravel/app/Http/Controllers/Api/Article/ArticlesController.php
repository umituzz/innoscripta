<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Api\BaseController;
use App\Services\Article\CategoryService;
use Illuminate\Http\Response;

/**
 * Class ArticlesController
 * @package App\Http\Controllers\Api\Article
 */
class ArticlesController extends BaseController
{
    private CategoryService $articleService;

    public function __construct(CategoryService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index()
    {
        $items = $this->articleService->getList();

        return $this->ok($items, Response::HTTP_OK, __('Article List'));
    }
}
