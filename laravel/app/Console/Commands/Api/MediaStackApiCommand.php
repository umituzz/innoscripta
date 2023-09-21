<?php

namespace App\Console\Commands\Api;

use App\Enums\SourceEnums;
use App\Jobs\Api\GetMediaStackApiJob;
use App\Services\Source\SourceService;
use Illuminate\Console\Command;

/**
 * Class MediaStackApiCommand
 * @package App\Console\Commands\Api
 */
class MediaStackApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:mediaStack';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get api data from MediaStack';
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
        $item = $this->sourceService->findBy('name', SourceEnums::MEDIA_STACK);

        if ($item) {
            GetMediaStackApiJob::dispatch($item->id);

            return Command::SUCCESS;
        }

        return Command::FAILURE;

    }
}
