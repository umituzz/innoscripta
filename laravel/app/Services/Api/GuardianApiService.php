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
        return env('GUARDIAN_API_URL') . '/search?api_key=' . env('GUARDIAN_API_KEY');
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
                $article = new Article();
                $article->resource_id = $resourceId;
                $article->title = $item->webTitle;
                $article->url = $item->webUrl;
                $article->category = $item->sectionName;
                $article->published_at = $item->webPublicationDate;

                $article->source_id = $item->id ?? NULL;
                $article->source_name = 'The Guardian';
                $article->api = 'The Guardian';
                $article->author = 'Guardian';
                $article->description = $item->webTitle;

                $article->image = 'api/guardian-300x201.png';
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
