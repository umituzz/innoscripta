<?php

namespace App\Console\Commands\Elasticsearch;

use App\Jobs\Elasticsearch\SyncArticleElasticsearchJob;
use App\Services\Article\ArticleService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

/**
 * Class SyncArticleCommand
 * @package App\Console\Commands\Elasticsearch
 */
class SyncArticleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elasticsearch:sync-articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add articles data to elasticsearch';

    private ArticleService $articleService;

    /**
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService       $articleService)
    {
        parent::__construct();

        $this->articleService = $articleService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $items = $this->articleService->getList();

        if ($items) {

            Artisan::call('elasticsearch:scout-articles');

            SyncArticleElasticsearchJob::dispatch($items);

            return Command::SUCCESS;
        }

        return Command::FAILURE;
    }
}
