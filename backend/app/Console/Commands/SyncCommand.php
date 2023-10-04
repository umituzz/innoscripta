<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * Class SyncCommand
 */
class SyncCommand extends Command
{
    protected $signature = 'sync';

    protected $description = 'Sync data with redis and elasticsearch via database';

    public function handle()
    {
        Artisan::call('redis:set-total-articles');
        Artisan::call('redis:sync-sources');
        Artisan::call('redis:sync-authors');
        Artisan::call('redis:sync-categories');
        Artisan::call('elasticsearch:sync-articles');

    }
}
