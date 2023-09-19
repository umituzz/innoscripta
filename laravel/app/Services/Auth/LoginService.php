<?php

namespace App\Services\Auth;

use App\Contracts\UserRepositoryInterface;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

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
                'errors' => 'The provided credentials are incorrect!'
            ]);
        }

        $user = $this->userRepository->findBy('email', $request->input('email'));

        return new UserResource($user);
    }
}
