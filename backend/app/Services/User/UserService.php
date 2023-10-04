<?php

namespace App\Services\User;

use App\Contracts\UserRepositoryInterface;
use App\Http\Resources\UserResource;

/**
 * Class UserService
 */
class UserService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function authUser()
    {
        $user = auth()->user();

        return new UserResource($user);
    }

    public function update($userId, $request)
    {
        return $this->userRepository->update($userId, [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
    }
}
