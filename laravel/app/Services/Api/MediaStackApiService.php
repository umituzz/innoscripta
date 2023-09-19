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
                    $article = new Article();
                    $article->resource_id = $resourceId;
                    $article->source_id = $item->source ?? 'Unknown';
                    $article->source_name = $item->source ?? 'Unknown';
                    $article->api = 'Media Stack';
                    $article->author = $item->author ?? NULL;
                    $article->title = $item->title;
                    $article->description = $item->description ?? NULL;
                    $article->category = $item->category ?? 'General';
                    $article->url = $item->url;
                    $article->image = 'https://placehold.co/400x300';
                    $article->published_at = $item->published_at;
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
