<?php

namespace App\Console\Commands\Elasticsearch;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * Class ScoutArticleCommand
 * @package App\Console\Commands\Elasticsearch
 */
class ScoutArticleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elasticsearch:scout-articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush and import index data to elasticsearch';

    public function handle()
    {
        Artisan::call('scout:flush "App\\\Models\\\Article"');
        Artisan::call('scout:import App\\\Models\\\Article');
    }

}
