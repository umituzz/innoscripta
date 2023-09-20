<?php

namespace App\Console\Commands\Redis;

use App\Http\Resources\CategoryResource;
use App\Services\Category\CategoryService;
use App\Services\Redis\RedisService;
use Exception;
use Illuminate\Console\Command;

/**
 * Class SyncCategoryCommand
 * @package App\Console\Commands\Redis
 */
class SyncCategoryCommand extends Command
{
    protected $signature = 'redis:sync-categories';

    protected $description = 'Sync categories with redis';
    private RedisService $redisService;
    private CategoryService $categoryService;

    public function __construct(
        RedisService $redisService,
        CategoryService $categoryService
    )
    {
        parent::__construct();

        $this->redisService = $redisService;
        $this->categoryService = $categoryService;
    }

    public function handle()
    {
        try {
            $data = $this->categoryService->getList();
            $currencies = CategoryResource::collection($data);
            $this->redisService->set('categories', $currencies);

            return Command::SUCCESS;
        } catch (Exception $exception) {
            return Command::FAILURE;
        }
    }
}
