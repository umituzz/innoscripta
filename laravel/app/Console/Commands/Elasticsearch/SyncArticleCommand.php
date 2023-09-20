<?php

namespace App\Console\Commands\Elasticsearch;

use App\Models\Article;
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

    /**
     * @throws AuthenticationException
     */
    public function __construct(ElasticsearchService $elasticsearchService)
    {
        parent::__construct();

        $this->client = $elasticsearchService->getClient();
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
        $indexName = 'articles';

        $items = Article::orderByDesc('id')->get();

        foreach ($items as $item) {

            $params = [
                'index' => $indexName,
                'id' => $item->id,
                'timeout' => '5s',
                'client' => [
                    'timeout' => 6,
                    'connect_timeout' => 1
                ],
                'body' => $item->getAttributes()
            ];

            $this->client->index($params);
        }

    }
}
