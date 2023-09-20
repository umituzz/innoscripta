<?php

namespace App\Services\Elasticsearch;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use Elastic\Elasticsearch\Exception\AuthenticationException;
use GuzzleHttp\Client as HttpClient;

/**
 * Class ElasticsearchService
 * @package App\Services\Elasticsearch
 */
class ElasticsearchService
{
    /**
     * @return array
     */
    public function getHosts(): array
    {
        return [
            "host" => env("ELASTIC_SEARCH_HOSTNAME"),
            "port" => env("ELASTIC_SEARCH_PORT")
        ];
    }

    /**
     * @return Client
     * @throws AuthenticationException
     */
    public function getClient(): Client
    {
        return ClientBuilder::create()
            ->setHosts([env('ELASTICSEARCH_HOST')])
            ->setSSLVerification(env('ELASTICSEARCH_SSL'))
            ->build();
    }

    /**
     * @return void
     */
    public function enableErrorLogConfigurations(): void
    {
        ini_set('max_execution_time', 0);
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    }

    public function createIndice($params)
    {
        return $this->client->indices()->create($params);
    }
}
