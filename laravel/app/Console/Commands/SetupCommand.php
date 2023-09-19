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
    }
}
