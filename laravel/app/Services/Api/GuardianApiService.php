<?php

namespace App\Services\Api;

use Exception;
use App\Models\Article;

/**
 * Class GuardianApiService
 * @package App\Services\Api
 */
class GuardianApiService extends BaseApiService
{
    const API_URL = 'https://content.guardianapis.com/search?api-key=';

    const API_KEY = 'test';

    /**
     * Get data from the guardian resource
     *
     * @return string[]
     */
    public function getData($resourceId)
    {
        try {
            $url = self::API_URL . self::API_KEY;
            $items = $this->httpService->getResult($url)->response->results;

            foreach ($items as $item) {
                $article = new Article();
                $article->resource_id = $resourceId;
                $article->source_id = $item->id ?? NULL;
                $article->source_name = 'The Guardian';
                $article->api = 'The Guardian';
                $article->author = 'Guardian';
                $article->title = $item->webTitle;
                $article->description = $item->webTitle;
                $article->category = $item->sectionName;
                $article->url = $item->webUrl;
                $article->image = 'api/guardian-300x201.png';
                $article->published_at = $item->webPublicationDate;
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
