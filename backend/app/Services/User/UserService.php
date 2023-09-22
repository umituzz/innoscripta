<?php

namespace App\Services\User;

use App\Contracts\UserRepositoryInterface;

/**
 * Class UserService
 * @package App\Services\User
 */
class UserService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function update($userId, $request)
    {
        return $this->userRepository->update($userId, [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
    }
}
