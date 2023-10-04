<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * Class SetupCommand
 */
class SetupCommand extends Command
{
    protected $signature = 'setup';

    protected $description = 'Setup data for project';

    public function handle()
    {
        Artisan::call('migrate:fresh --seed');

        Artisan::call('redis:flush-db');

        Artisan::call('api:guardian');
        Artisan::call('api:news');
        Artisan::call('api:mediaStack');
        Artisan::call('api:newyorkTimes');

        Artisan::call('scout:import "App\\\Models\\\Article"');
    }
}
