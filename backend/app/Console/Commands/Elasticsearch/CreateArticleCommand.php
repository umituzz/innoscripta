<?php

namespace App\Console\Commands\Elasticsearch;

use Exception;
use App\Services\Elasticsearch\ElasticsearchService;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Exception\AuthenticationException;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Illuminate\Console\Command;
use Illuminate\Http\Response;

/**
 * Class CreateArticleCommand
 * @package App\Console\Commands\Elasticsearch
 */
class CreateArticleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elasticsearch:create-articles-index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create articles index to elasticsearch';

    private Client $client;

    /**
     * @param ElasticsearchService $elasticsearchService
     * @throws AuthenticationException
     */
    public function __construct(ElasticsearchService $elasticsearchService)
    {
        parent::__construct();

        $this->client = $elasticsearchService->getClient();
    }

    /**
     * @return void
     * @throws ClientResponseException
     * @throws MissingParameterException
     * @throws ServerResponseException
     */
    public function handle()
    {
        if ($this->client->indices()->exists(["index" => 'articles'])->getStatusCode() === 404) {

            try {
                $params = [
                    'index' => 'articles',
                    'body' => $this->getStructure()
                ];

                $result = $this->client->indices()->create($params);

                if ($result->getStatusCode() === Response::HTTP_OK) {
                    echo "articles created successfully!";
                }

            } catch (Exception $exception) {
                echo $exception->getMessage();
            }
        } else {
            echo "articles already exists";
        }
    }

    private function getStructure()
    {
        return [
            'settings' => [
                'number_of_shards' => 3,
                'number_of_replicas' => 2,
                'max_terms_count' => 655360,
            ],
            'mappings' => [
                '_source' => [
                    'enabled' => true
                ],
                'properties' => [
                    'id' => [
                        'type' => 'long'
                    ],
                    'source_id' => [
                        'type' => 'long'
                    ],
                    'title' => [
                        'type' => 'keyword'
                    ],
                    'category' => [
                        'type' => 'keyword'
                    ],
                    'image' => [
                        'type' => 'keyword'
                    ],
                    'url' => [
                        'type' => 'keyword'
                    ],
                    'published_at' => [
                        'type' => 'keyword'
                    ],

                ]
            ]
        ];
    }
}
