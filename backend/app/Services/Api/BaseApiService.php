<?php

namespace App\Services\Api;

use App\Services\Article\ArticleService;
use App\Services\Article\AuthorService;
use App\Services\Article\CategoryService;
use App\Services\Http\HttpService;
use App\Services\Notification\NotificationService;
use App\Services\Redis\RedisService;

/**
 * Class BaseService
 * @package App\Services
 */
class BaseApiService
{
    protected HttpService $httpService;
    protected RedisService $redisService;
    protected NotificationService $notificationService;
    protected ArticleService $articleService;
    protected CategoryService $categoryService;
    protected AuthorService $authorService;

    public function __construct(
        HttpService $httpService,
        NotificationService $notificationService,
        CategoryService $categoryService,
        AuthorService $authorService,
        ArticleService $articleService,
    )
    {
        $this->httpService = $httpService;
        $this->notificationService = $notificationService;
        $this->categoryService = $categoryService;
        $this->authorService = $authorService;
        $this->articleService = $articleService;
    }
}
