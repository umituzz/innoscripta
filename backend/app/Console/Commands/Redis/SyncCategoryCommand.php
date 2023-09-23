<?php

namespace App\Console\Commands\Redis;

use App\Http\Resources\CategoryResource;
use Exception;
use App\Services\Article\CategoryService;
use App\Services\Redis\RedisService;
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
            $categories = CategoryResource::collection($data);
            $this->redisService->set('categories', $categories);

            return Command::SUCCESS;
        } catch (Exception $exception) {
            return Command::FAILURE;
        }
    }
}
