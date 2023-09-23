<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\BaseController;
use App\Services\Redis\RedisService;
use App\Services\User\UserService;
use Illuminate\Http\Response;

/**
 * Class UserController
 * @package App\Http\Controllers\User
 */
class UserController extends BaseController
{
    private UserService $userService;
    private RedisService $redisService;

    public function __construct(UserService $userService, RedisService $redisService)
    {
        $this->userService = $userService;
        $this->redisService = $redisService;
    }

    public function index()
    {
        $data['user'] = $this->userService->authUser();
        $data['sources'] = $this->redisService->get('sources');
        $data['authors'] = $this->redisService->get('authors');
        $data['categories'] = $this->redisService->get('categories');

        return $this->ok($data, Response::HTTP_OK, __('User Preferences'));
    }
}
