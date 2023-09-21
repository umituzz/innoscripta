<?php

namespace App\Services\Api;

use App\Contracts\ApiServiceInterface;
use App\Models\Article;
use App\Models\Category;
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
     * @param $sourceId
     * @return string[]|void
     */
    public function getData($sourceId)
    {
        try {
            $url = $this->getUrl();
            $items = $this->httpService->getResult($url)->articles;

            collect($items)->map(function ($item) use ($sourceId) {

                $category = Category::firstOrCreate([
                    'name' => 'General',
                    'slug' => 'general'
                ]);

                Article::create([
                    'source_id' => $sourceId,
                    'category_id' => $category->id,
                    'title' => $item->title,
                    'url' => $item->url,
                    'image' => 'https://placehold.co/400x300',
                    'published_at' => $item->publishedAt,
                ]);

            });

            return __('Data inserted successfully');
        } catch (Exception $exception) {
            dd($exception->getMessage());
            $this->notificationService->error($exception->getMessage());
        }
    }

}
