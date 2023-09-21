<?php

namespace App\Console\Commands\Api;

use App\Services\Api\GuardianApiService;
use App\Services\Source\SourceService;
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
    private SourceService $sourceService;

    public function __construct(
        GuardianApiService $guardianApiService,
        SourceService $sourceService
    )
    {
        parent::__construct();

        $this->guardianApiService = $guardianApiService;
        $this->sourceService = $sourceService;
    }


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $item = $this->sourceService->findBy('name', 'Guardian API');

        if ($item) {
            $result = $this->guardianApiService->getData($item->id);

            echo $result;

            return Command::SUCCESS;
        }

        return Command::FAILURE;
    }
}
