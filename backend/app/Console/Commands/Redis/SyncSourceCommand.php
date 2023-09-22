<?php

namespace App\Console\Commands\Redis;

use App\Http\Resources\SourceResource;
use App\Services\Redis\RedisService;
use App\Services\Source\SourceService;
use Exception;
use Illuminate\Console\Command;

/**
 * Class SyncSourceCommand
 * @package App\Console\Commands\Redis
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
    )
    {
        parent::__construct();

        $this->redisService = $redisService;
        $this->sourceService = $sourceService;
    }

    public function handle()
    {
        try {
            $data = $this->sourceService->getList();
            $currencies = SourceResource::collection($data);
            $this->redisService->set('sources', $currencies);

            return Command::SUCCESS;
        } catch (Exception $exception) {
            return Command::FAILURE;
        }
    }
}
