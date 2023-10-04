<?php

namespace App\Console\Commands\Api;

use App\Enums\SourceEnums;
use App\Jobs\Api\GetNewsApiJob;
use App\Services\Article\SourceService;
use Illuminate\Console\Command;

/**
 * Class NewsApiCommand
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

    private SourceService $sourceService;

    public function __construct(SourceService $sourceService)
    {
        parent::__construct();

        $this->sourceService = $sourceService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $item = $this->sourceService->findBy('name', SourceEnums::NEWS);

        if ($item) {
            GetNewsApiJob::dispatch($item->id);

            return Command::SUCCESS;
        }

        return Command::FAILURE;
    }
}
