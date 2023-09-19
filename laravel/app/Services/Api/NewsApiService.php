<?php

namespace App\Services\Api;

use App\Models\Article;
use Exception;

/**
 * Class NewsApiService
 * @package App\Services
 */
class NewsApiService extends BaseApiService
{
    const API_URL = 'https://newsapi.org/v2/top-headlines?country=us&apiKey=';

    const API_KEY = 'c95ec738abe74b708871b99d6673cc85';

    /**
     * @param $resourceId
     * @return string[]|void
     */
    public function getData($resourceId)
    {
        try {
            $url = self::API_URL . self::API_KEY;
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
