<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\BaseController;
use App\Services\Redis\RedisService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class PreferencesController
 * @package App\Http\Controllers\User
 */
class PreferencesController extends BaseController
{
    private RedisService $redisService;

    public function __construct(RedisService $redisService)
    {
        $this->redisService = $redisService;
    }

    public function index(Request $request)
    {
        $data['sources'] = $this->redisService->get('sources');
        $data['authors'] = $this->redisService->get('authors');
        $data['categories'] = $this->redisService->get('categories');

        return $this->ok($data, Response::HTTP_OK, __('Preferences List'));
    }
}
