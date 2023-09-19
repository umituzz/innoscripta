<?php

namespace App\Console\Commands\Api;

use App\Contracts\ResourceRepositoryInterface;
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
    private ResourceRepositoryInterface $resourceRepository;

    public function __construct(
        MediaStackApiService $mediaStackApiService,
        ResourceRepositoryInterface $resourceRepository
    )
    {
        parent::__construct();

        $this->mediaStackApiService = $mediaStackApiService;
        $this->resourceRepository = $resourceRepository;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $item = $this->resourceRepository->findBy('name', 'Media Stack API');
        $this->mediaStackApiService->getData($item->id);
    }
}