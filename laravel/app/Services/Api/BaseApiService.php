<?php

namespace App\Services\Api;

use App\Enums\ArticleEnums;
use App\Services\Http\HttpService;
use App\Services\Notification\NotificationService;
use App\Services\Redis\RedisService;

/**
 * Class BaseService
 * @package App\Services
 */
class BaseApiService
{
    protected $redisData = [];
    protected $redisKey = ArticleEnums::REDIS_KEY;
    protected HttpService $httpService;
    protected RedisService $redisService;
    protected NotificationService $notificationService;

    public function __construct(
        HttpService $httpService,
        RedisService $redisService,
        NotificationService $notificationService)
    {
        $this->httpService = $httpService;
        $this->redisService = $redisService;
        $this->notificationService = $notificationService;
    }
}
