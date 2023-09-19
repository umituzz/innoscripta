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

                $article = Article::firstOrCreate([
                    'resource_id' => $resourceId,
                    'title' => $item->title,
                    'category' => $item->category ?? 'General',
                    'url' => $item->url,
                    'image' => 'https://placehold.co/400x300',
                    'published_at' => $item->publishedAt,
                ]);

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
