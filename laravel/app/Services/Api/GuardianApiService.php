<?php

namespace App\Services\Api;

use App\Contracts\ApiServiceInterface;
use Exception;
use App\Models\Article;

/**
 * Class GuardianApiService
 * @package App\Services\Api
 */
class GuardianApiService extends BaseApiService implements ApiServiceInterface
{
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return env('GUARDIAN_API_URL') . '/search?api-key=' . env('GUARDIAN_API_KEY');
    }

    /**
     * @param $resourceId
     * @return string[]|void
     */
    public function getData($resourceId)
    {
        try {
            $url = $this->getUrl();
            $items = $this->httpService->getResult($url)->response->results;

            foreach ($items as $item) {

                $article = Article::firstOrCreate([
                    'resource_id' => $resourceId,
                    'title' => $item->webTitle,
                    'category' => $item->sectionName ?? 'General',
                    'url' => $item->webUrl,
                    'image' => 'https://placehold.co/400x300',
                    'published_at' => $item->webPublicationDate,
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
