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
     * @param $sourceId
     * @return string[]|void
     */
    public function getData($sourceId)
    {
        try {
            $url = $this->getUrl();
            $items = $this->httpService->getResult($url)->response->results;

            collect($items)->map(function ($item) use($sourceId){

                Article::firstOrCreate([
                    'source_id' => $sourceId,
                    'title' => $item->webTitle,
                    'category' => $item->sectionName ?? 'General',
                    'url' => $item->webUrl,
                    'image' => 'https://placehold.co/400x300',
                    'published_at' => $item->webPublicationDate,
                ]);

            });

            return __('Data inserted successfully');
        } catch (Exception $exception) {
            $this->notificationService->error($exception->getMessage());
        }
    }
}
