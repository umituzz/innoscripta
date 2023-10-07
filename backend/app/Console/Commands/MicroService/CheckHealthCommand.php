<?php

namespace App\Console\Commands\MicroService;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * Class CheckHealthCommand
 */
class CheckHealthCommand extends Command
{
    protected $signature = 'microservice:check-health';

    protected $description = 'Check microservices if they are running';

    public function handle()
    {
        Artisan::call('microservice:check-golang-health');
        Artisan::call('microservice:check-nodejs-health');
        Artisan::call('microservice:check-python-health');
    }
}
