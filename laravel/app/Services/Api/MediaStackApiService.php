<?php

namespace App\Services\Api;

use App\Contracts\ApiServiceInterface;
use App\Models\Article;
use Exception;

/**
 * Class MediaStackApiService
 * @package App\Services
 */
class MediaStackApiService extends BaseApiService implements ApiServiceInterface
{
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return env('MEDIA_STACK_API_URL') . '/news?access_key=' . env('MEDIA_STACK_API_KEY');
    }

    /**
     * @param $resourceId
     * @return string[]|void
     */
    public function getData($resourceId)
    {
        try {
            $url = $this->getUrl();
            $items = $this->httpService->getResult($url)->data;

            foreach ($items as $item) {

                $article = Article::firstOrCreate([
                    'resource_id' => $resourceId,
                    'title' => $item->title,
                    'category' => $item->category ?? 'General',
                    'url' => $item->url,
                    'image' => 'https://placehold.co/400x300',
                    'published_at' => $item->published_at,
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
