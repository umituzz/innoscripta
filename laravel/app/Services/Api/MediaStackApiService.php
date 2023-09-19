<?php

namespace App\Services\Api;

use App\Models\Article;
use Exception;

/**
 * Class MediaStackApiService
 * @package App\Services
 */
class MediaStackApiService extends BaseApiService
{
    const API_URL = 'http://api.mediastack.com/v1/news?access_key=';

    const API_KEY = '6490528b65c9d28894748cf10c6d0a52';

    public function getData()
    {
        try {
            $url = self::API_URL . self::API_KEY;
            $items = $this->httpService->getResult($url)->data;

            foreach ($items as $item) {
                    $article = new Article();
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

            return response([
                'message' => 'Data inserted successfully'
            ], 201);
        } catch (Exception $exception) {
            $this->notificationService->error($exception->getMessage());
        }
    }
}
