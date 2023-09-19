<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\LoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class LoginController
 * @package App\Http\Controllers\Api\Auth
 */
class LoginController extends BaseController
{
    private LoginService $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $data = $this->loginService->login($request);

        return array_key_exists('token', $data) ?
            $this->ok($data, Response::HTTP_OK, __('User Logged In')) :
            $this->error($data['errors'], $data['message'], $data['statusCode']);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        $result = $this->loginService->logout($request);

        $this->ok($result, Response::HTTP_OK, __('Logout successful'));
    }
}
