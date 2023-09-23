<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\BaseController;
use App\Services\User\UserService;
use Illuminate\Http\Response;

/**
 * Class UserController
 * @package App\Http\Controllers\User
 */
class UserController extends BaseController
{
    private UserService $userService;

    public function __construct(UserService $userService,)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $user = $this->userService->authUser();

        return $this->ok($user, Response::HTTP_OK, __('User Details'));
    }
}
