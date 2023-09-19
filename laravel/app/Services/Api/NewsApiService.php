<?php

namespace App\Services\Api;

use App\Contracts\ApiServiceInterface;
use App\Models\Article;
use Exception;

/**
 * Class NewsApiService
 * @package App\Services
 */
class NewsApiService extends BaseApiService implements ApiServiceInterface
{
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return env('NEWS_API_URL') . '/top-headlines?country=us&apiKey=' . env('NEWS_API_KEY');
    }

    /**
     * @param $resourceId
     * @return string[]|void
     */
    public function getData($resourceId)
    {
        try {
            $url = $this->getUrl();
            $items = $this->httpService->getResult($url)->articles;

            foreach ($items as $item) {

                    $article = new Article();
                    $article->resource_id = $resourceId;
                    $article->source_id = $item->source->id ?? NULL;
                    $article->source_name = $item->source->name ?? NULL;
                    $article->api = 'News API';
                    $article->author = $item->author ?? NULL;
                    $article->title = $item->title;
                    $article->description = $item->description ?? NULL;
                    $article->category = 'General';
                    $article->url = $item->url;
                    $article->image = $item->urlToImage ?? 'https://placehold.co/400x300';
                    $article->published_at = $item->publishedAt;
                    $article->save();

                    $this->redisData[] = $article;
            }

            $this->redisService->set($this->redisKey, $this->redisData);

            return [
                'message' => 'Data inserted successfully'
            ];
        } catch (Exception $exception) {
            $this->notificationService->error($exception->getMessage());
        }
    }

}
