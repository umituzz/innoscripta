<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;

/**
 * Class UserRepository
 * @package App\Models
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    private User $user;

    public function __construct(User $user)
    {
        parent::__construct($user);

        $this->user = $user;
    }
}
