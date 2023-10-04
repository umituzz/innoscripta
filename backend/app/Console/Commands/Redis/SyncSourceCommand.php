<?php

namespace App\Console\Commands\Redis;

use App\Http\Resources\SourceResource;
use App\Services\Article\SourceService;
use App\Services\Redis\RedisService;
use Exception;
use Illuminate\Console\Command;

/**
 * Class SyncSourceCommand
 */
class SyncSourceCommand extends Command
{
    protected $signature = 'redis:sync-sources';

    protected $description = 'Sync sources with redis';

    private RedisService $redisService;

    private SourceService $sourceService;

    public function __construct(
        RedisService $redisService,
        SourceService $sourceService
    ) {
        parent::__construct();

        $this->redisService = $redisService;
        $this->sourceService = $sourceService;
    }

    public function handle()
    {
        try {
            $data = $this->sourceService->getList();
            $sources = SourceResource::collection($data);
            $this->redisService->set('sources', $sources);

            return Command::SUCCESS;
        } catch (Exception $exception) {
            return Command::FAILURE;
        }
    }
}
