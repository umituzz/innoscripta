<?php

namespace App\Console\Commands\Api;

use App\Contracts\ResourceRepositoryInterface;
use App\Services\Api\NewsApiService;
use Illuminate\Console\Command;

/**
 * Class NewsApiCommand
 * @package App\Console\Commands\Api
 */
class NewsApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get api data from NewsAPI';

    private NewsApiService $newsApiService;
    private ResourceRepositoryInterface $resourceRepository;

    public function __construct(
        NewsApiService $newsApiService,
        ResourceRepositoryInterface $resourceRepository
    )
    {
        parent::__construct();

        $this->newsApiService = $newsApiService;
        $this->resourceRepository = $resourceRepository;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $item = $this->resourceRepository->findBy('name', 'News API');
        $this->newsApiService->getData($item->id);
    }
}
