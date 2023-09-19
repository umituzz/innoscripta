<?php

namespace App\Console\Commands\Api;

use App\Services\Api\MediaStackApiService;
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

    public function __construct(MediaStackApiService $mediaStackApiService)
    {
        parent::__construct();

        $this->mediaStackApiService = $mediaStackApiService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->mediaStackApiService->getData();
    }
}
