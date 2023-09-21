<?php

namespace App\Console\Commands\Api;

use App\Contracts\SourceRepositoryInterface;
use App\Services\Api\MediaStackApiService;
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
    private MediaStackApiService $mediaStackApiService;
    private SourceService $sourceService;

    public function __construct(
        MediaStackApiService $mediaStackApiService,
        SourceService $sourceService
    )
    {
        parent::__construct();

        $this->mediaStackApiService = $mediaStackApiService;
        $this->sourceService = $sourceService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $item = $this->sourceService->findBy('name', 'Media Stack API');

        if ($item) {
            $result = $this->mediaStackApiService->getData($item->id);

            echo $result;

            return Command::SUCCESS;
        }

        return Command::FAILURE;

    }
}
