<?php

namespace App\Services\Api;

use App\Services\Article\ArticleService;
use App\Services\Article\AuthorService;
use App\Services\Article\CategoryService;
use App\Services\Http\HttpService;
use App\Traits\Logger;

/**
 * Class BaseService
 * @package App\Services
 */
class BaseApiService
{
    use Logger;

    protected HttpService $httpService;
    protected ArticleService $articleService;
    protected CategoryService $categoryService;
    protected AuthorService $authorService;

    public function __construct(
        HttpService $httpService,
        CategoryService $categoryService,
        AuthorService $authorService,
        ArticleService $articleService,
    )
    {
        $this->httpService = $httpService;
        $this->categoryService = $categoryService;
        $this->authorService = $authorService;
        $this->articleService = $articleService;
    }
}
