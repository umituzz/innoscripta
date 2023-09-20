<?php

namespace App\Console\Commands\Elasticsearch;

use App\Enums\ArticleEnums;
use App\Enums\ElasticsearchEnums;
use App\Services\Article\ArticleService;
use App\Services\Elasticsearch\ElasticsearchService;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Exception\AuthenticationException;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Illuminate\Console\Command;

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

    private Client $client;
    private ArticleService $articleService;

    /**
     * @throws AuthenticationException
     */
    public function __construct(
        ElasticsearchService $elasticsearchService,
        ArticleService       $articleService
    )
    {
        parent::__construct();

        $this->client = $elasticsearchService->getClient();
        $this->articleService = $articleService;
    }

    /**
     * Execute the console command.
     *
     * @throws ClientResponseException
     * @throws MissingParameterException
     * @throws ServerResponseException
     */
    public function handle()
    {
        $indexName = ArticleEnums::ELASTICSEARCH_INDEX_NAME;
        $defaultTimeout = ElasticsearchEnums::DEFAULT_TIMEOUT;
        $items = $this->articleService->getList();

        $items->map(function ($item) use ($indexName, $defaultTimeout) {
            $params = [
                'index' => $indexName,
                'id' => $item->id,
                'timeout' => $defaultTimeout,
                'client' => [
                    'timeout' => 6,
                    'connect_timeout' => 1
                ],
                'body' => $item->getAttributes()
            ];

            $this->client->index($params);
        });
    }
}
