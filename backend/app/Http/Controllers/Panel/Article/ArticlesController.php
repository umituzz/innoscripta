<?php

namespace App\Http\Controllers\Panel\Article;

use App\Http\Controllers\Controller;
use App\Services\Article\ArticleService;

/**
 * Class ArticlesController
 */
class ArticlesController extends Controller
{
    private ArticleService $articleService;

    public function __construct(ArticleService $articleService)
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
