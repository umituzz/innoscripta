<?php

namespace App\Jobs\Api;

use App\Services\Api\MediaStackApiService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class GetMediaStackApiJob
 */
class GetMediaStackApiJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $sourceId;

    /**
     * Create a new job instance.
     */
    public function __construct($sourceId)
    {
        $this->sourceId = $sourceId;
    }

    /**
     * Execute the job.
     */
    public function handle(MediaStackApiService $mediaStackApiService): void
    {
        $mediaStackApiService->getData($this->sourceId);
    }
}
