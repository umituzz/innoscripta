<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Services\Article\ArticleService;

/**
 * Class ArticlesController
 * @package App\Http\Controllers\Article
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
