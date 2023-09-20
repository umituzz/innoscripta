<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Services\Article\CategoryService;

/**
 * Class ArticlesController
 * @package App\Http\Controllers\Article
 */
class ArticlesController extends Controller
{
    private CategoryService $articleService;

    public function __construct(CategoryService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index()
    {
        $articles = $this->articleService->getList();

        return view('article.index', [
            'articles' => $articles,
        ]);
    }
}
