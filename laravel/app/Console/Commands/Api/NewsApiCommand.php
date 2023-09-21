<?php

namespace App\Console\Commands\Api;

use App\Services\Api\NewsApiService;
use App\Services\Source\SourceService;
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
    private SourceService $sourceService;

    public function __construct(
        NewsApiService $newsApiService,
        SourceService $sourceService
    )
    {
        parent::__construct();

        $this->newsApiService = $newsApiService;
        $this->sourceService = $sourceService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $item = $this->sourceService->findBy('name', 'News API');

        if ($item) {
            $result = $this->newsApiService->getData($item->id);

            echo $result;

            return Command::SUCCESS;
        }

        return Command::FAILURE;
    }
}
