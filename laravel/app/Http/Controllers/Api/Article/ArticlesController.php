<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Api\BaseController;
use App\Services\Article\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class ArticlesController
 * @package App\Http\Controllers\Api\Article
 */
class ArticlesController extends BaseController
{
    private ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index(Request $request)
    {
        $items = $this->articleService->getAllElasticData($request);

        return $this->ok($items, Response::HTTP_OK, __('Article List'));
    }
}
