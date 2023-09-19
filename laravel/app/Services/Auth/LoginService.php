<?php

namespace App\Services\Auth;

use App\Contracts\UserRepositoryInterface;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class LoginService
 * @package App\Services\Auth
 */
class LoginService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $request
     * @return JsonResponse|mixed
     */
    public function login($request)
    {
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'statusCode' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => __('The provided credentials are incorrect!'),
                'message' => __('Login Failed')
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = $this->userRepository->findBy('email', $request->input('email'));

        return new UserResource($user);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function logout($request)
    {
        return $request->user()->currentAccessToken()->delete();
    }
}
