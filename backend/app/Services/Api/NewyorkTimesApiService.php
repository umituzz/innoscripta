<?php

namespace App\Services\Api;

use App\Contracts\ApiServiceInterface;
use Exception;
use Illuminate\Support\Str;

/**
 * Class NewyorkTimesApiService
 * @package App\Services
 */
class NewyorkTimesApiService extends BaseApiService implements ApiServiceInterface
{
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return config('services.newyorkTimesApi.api_url') . '/1.json?api-key=' . config('services.newyorkTimesApi.api_key');
    }

    /**
     * @param $sourceId
     * @return string[]|void
     */
    public function getData($sourceId)
    {
        try {
            $url = $this->getUrl();
            $response = $this->httpService->getResult($url);

            if (!$response) {
                return __('No data received from the API.');
            }

            $items = $response->results;

            if (empty($items)) {
                return __('No data available in the API response.');
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

            return __('Data inserted successfully');
        } catch (Exception $exception) {
            $this->logError($exception);

            return __('An error occurred while processing the data.');
        }
    }

}
