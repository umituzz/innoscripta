<?php

namespace App\Console\Commands\Redis;

use App\Contracts\UserRepositoryInterface;
use App\Services\Redis\RedisService;
use Illuminate\Console\Command;

/**
 * Class SetTotalUserCommand
 * @package App\Console\Commands\Redis
 */
class SetTotalUserCommand extends Command
{
    protected $signature = 'redis:set-total-users';

    protected $description = 'Set total users count to redis';
    private UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        parent::__construct();

        $this->userRepository = $userRepository;
    }

    public function handle()
    {
        $count = $this->userRepository->total();

        RedisService::set('total_users', $count);
    }
}
