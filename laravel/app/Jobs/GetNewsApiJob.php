<?php

namespace App\Jobs;

use App\Services\Api\NewsApiService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class GetNewsApiJob
 * @package App\Jobs
 */
class GetNewsApiJob implements ShouldQueue
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
    public function handle(NewsApiService $newsApiService): void
    {
        $newsApiService->getData($this->sourceId);
    }
}
