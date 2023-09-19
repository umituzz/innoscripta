<?php

namespace App\Console\Commands\Api;

use App\Contracts\SourceRepositoryInterface;
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
    private SourceRepositoryInterface $resourceRepository;

    public function __construct(
        GuardianApiService $guardianApiService,
        SourceRepositoryInterface $resourceRepository
    )
    {
        parent::__construct();

        $this->guardianApiService = $guardianApiService;
        $this->resourceRepository = $resourceRepository;
    }


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $item = $this->resourceRepository->findBy('name', 'Guardian API');

        if ($item) {

            return Command::SUCCESS;
        }

        return Command::FAILURE;
    }
}
