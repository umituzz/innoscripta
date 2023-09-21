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
     * @param $sourceId
     * @return string[]|void
     */
    public function getData($sourceId)
    {
        try {
            $url = $this->getUrl();
            $items = $this->httpService->getResult($url)->data;

            collect($items)->map(function ($item) use($sourceId){

                $article = Article::firstOrCreate([
                    'source_id' => $sourceId,
                    'title' => $item->title,
                    'category' => $item->category ?? 'General',
                    'url' => $item->url,
                    'image' => 'https://placehold.co/400x300',
                    'published_at' => $item->published_at,
                ]);

            });

            return __('Data inserted successfully');
        } catch (Exception $exception) {
            $this->notificationService->error($exception->getMessage());
        }
    }
}
