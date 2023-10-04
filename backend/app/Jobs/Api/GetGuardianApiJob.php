<?php

namespace App\Jobs\Api;

use App\Services\Api\GuardianApiService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class GetGuardianApiJob
 */
class GetGuardianApiJob implements ShouldQueue
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
    public function handle(GuardianApiService $guardianApiService): void
    {
        $guardianApiService->getData($this->sourceId);
    }
}
