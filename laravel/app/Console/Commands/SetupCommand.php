<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * Class SetupCommand
 * @package App\Console\Commands
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

        Artisan::call('redis:set-total-users');
        Artisan::call('redis:set-total-articles');

        Artisan::call('redis:sync-sources');

        Artisan::call('elasticsearch:sync-articles');

    }
}
