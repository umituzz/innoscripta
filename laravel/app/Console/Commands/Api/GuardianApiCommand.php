<?php

namespace App\Console\Commands\Api;

use App\Services\Api\GuardianApiService;
use Illuminate\Console\Command;

/**
 * Class GuardianApiCommand
 * @package App\Console\Commands\Api
 */
class GuardianApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:guardian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get api data from Guardian';

    private GuardianApiService $guardianApiService;

    public function __construct(GuardianApiService $guardianApiService)
    {
        parent::__construct();

        $this->guardianApiService = $guardianApiService;
    }


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->guardianApiService->getData();
    }
}
