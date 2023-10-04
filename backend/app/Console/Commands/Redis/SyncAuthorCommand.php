<?php

namespace App\Console\Commands\Redis;

use App\Http\Resources\AuthorResource;
use App\Services\Article\AuthorService;
use App\Services\Redis\RedisService;
use Exception;
use Illuminate\Console\Command;

/**
 * Class SyncAuthorCommand
 */
class SyncAuthorCommand extends Command
{
    protected $signature = 'redis:sync-authors';

    protected $description = 'Sync authors with redis';

    private RedisService $redisService;

    private AuthorService $authorService;

    public function __construct(
        RedisService $redisService,
        AuthorService $authorService
    ) {
        parent::__construct();

        $this->redisService = $redisService;
        $this->authorService = $authorService;
    }

    public function handle()
    {
        try {
            $data = $this->authorService->getList();
            $authors = AuthorResource::collection($data);
            $this->redisService->set('authors', $authors);

            return Command::SUCCESS;
        } catch (Exception $exception) {
            return Command::FAILURE;
        }
    }
}
