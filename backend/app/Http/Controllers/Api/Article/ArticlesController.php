<?php

namespace App\Http\Controllers\Api\Article;

use App\Http\Controllers\Api\BaseController;
use App\Services\Article\ArticleService;
use Illuminate\Http\Request;

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

        return $this->ok($items,  __('Article List'));
    }

    public function detail($slug)
    {
        $item = $this->articleService->findBy('slug', $slug);

        if (!$item) {
            return $this->notFound();
        }

        return $this->ok($item,  __('Article Detail'));
    }
}
