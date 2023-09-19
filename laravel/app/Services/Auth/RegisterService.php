<?php

namespace App\Services\Auth;

use App\Contracts\UserRepositoryInterface;
use App\Http\Resources\UserResource;

class RegisterService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function createUser($request)
    {
        $user = $this->userRepository->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        return new UserResource($user);
    }
}
