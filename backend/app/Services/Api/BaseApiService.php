<?php

namespace App\Services\Api;

use App\Services\Article\ArticleService;
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

    public function __construct(
        HttpService $httpService,
        NotificationService $notificationService,
        ArticleService $articleService
    )
    {
        $this->httpService = $httpService;
        $this->notificationService = $notificationService;
        $this->articleService = $articleService;
    }
}
