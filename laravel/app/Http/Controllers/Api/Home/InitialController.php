<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Api\BaseController;
use App\Services\Redis\RedisService;
use Illuminate\Http\Response;

/**
 * Class InitialController
 * @package App\Http\Controllers\Home
 */
class InitialController extends BaseController
{
    private RedisService $redisService;

    public function __construct(RedisService $redisService)
    {
        $this->redisService = $redisService;
    }

    public function index()
    {
        $sources = $this->redisService->get('sources');

        return $this->ok([
            'sources' => $sources,
        ], Response::HTTP_OK, __('Initial Data'));
    }
}
