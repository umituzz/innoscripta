<?php

namespace App\Services\Api;

use App\Services\Article\ArticleService;
use App\Services\Article\AuthorService;
use App\Services\Article\CategoryService;
use App\Services\Http\HttpService;
use App\Traits\Logger;

/**
 * Class BaseService
 * @package App\Services\Api
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

    /**
     * @return string
     */
    public function defaultDescription(): string
    {
        return "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum";
    }

    /**
     * @return string
     */
    public function defaultImage(): string
    {
        return 'https://dummyimage.com/700x350/dee2e6/6c757d.jpg';
    }
}
