<?php

namespace App\Services\Api;

use App\Contracts\ApiServiceInterface;
use Exception;
use Illuminate\Support\Str;

/**
 * Class NewyorkTimesApiService
 */
class NewyorkTimesApiService extends BaseApiService implements ApiServiceInterface
{
    public function getUrl(): string
    {
        return config('services.newyorkTimesApi.api_url').'/1.json?api-key='.config('services.newyorkTimesApi.api_key');
    }

    public function getData($sourceId)
    {
        try {
            $url = $this->getUrl();
            $response = $this->httpService->getResult($url);

            if (! $response) {
                $this->logInfo(__('No data received from the API'));

                return false;
            }

            $items = $response->results;

            if (empty($items)) {
                $this->logInfo(__('No data available in the API response'));

                return false;
            }

            collect($items)->map(function ($item) use ($sourceId) {
                $author = $this->authorService->firstOrCreate('name', [
                    'name' => $item->byline,
                ]);

                $category = $this->categoryService->firstOrCreate('name', [
                    'name' => $item->section,
                    'slug' => Str::slug($item->section),
                ]);

                $this->articleService->firstOrCreate('title', [
                    'source_id' => $sourceId,
                    'author_id' => $author->id,
                    'category_id' => $category->id,
                    'title' => $item->title,
                    'slug' => Str::slug($item->title),
                    'description' => $this->defaultDescription(),
                    'url' => $item->url,
                    'image' => $this->defaultImage(),
                    'published_at' => $item->published_date,
                ]);

            });

            $this->logInfo(__('Newyork Times API data inserted successfully!'));

            return true;
        } catch (Exception $exception) {
            $this->logError($exception);

            return false;
        }
    }
}
