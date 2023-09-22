<?php

namespace App\Jobs\Elasticsearch;

use App\Services\Elasticsearch\ElasticsearchService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class SyncArticleElasticsearchJob
 * @package App\Jobs\Elasticsearch
 */
class SyncArticleElasticsearchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $items;

    /**
     * Create a new job instance.
     */
    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * Execute the job.
     */
    public function handle(ElasticsearchService $elasticsearchService): void
    {
        $client = $elasticsearchService->getClient();

        $this->items->map(function ($item) use ($client) {
            $params = [
                'index' => 'articles',
                'id' => $item->id,
                'timeout' => '5s',
                'client' => [
                    'timeout' => 6,
                    'connect_timeout' => 1
                ],
                'body' => $item->getAttributes()
            ];

            $client->index($params);
        });
    }
}
