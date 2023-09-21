<?php

namespace App\Services\Elasticsearch;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use Elastic\Elasticsearch\Exception\AuthenticationException;

/**
 * Class ElasticsearchService
 * @package App\Services\Elasticsearch
 */
class ElasticsearchService
{
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
}
