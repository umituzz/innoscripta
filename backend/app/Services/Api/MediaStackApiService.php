<?php

namespace App\Services\Api;

use App\Contracts\ApiServiceInterface;
use App\Enums\AuthorEnums;
use Exception;
use Illuminate\Support\Str;

/**
 * Class MediaStackApiService
 */
class MediaStackApiService extends BaseApiService implements ApiServiceInterface
{
    public function getUrl(): string
    {
        return config('services.mediaStackApi.api_url').'/news?access_key='.config('services.mediaStackApi.api_key');
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

            $items = $response->data;

            if (empty($items)) {
                $this->logInfo(__('No data available in the API response'));

                return false;
            }

            collect($items)->map(function ($item) use ($sourceId) {

                $author = $this->authorService->firstOrCreate('name', [
                    'name' => $item->author ?? AuthorEnums::MEDIA_STACK_AUTHOR,
                ]);

                $category = $this->categoryService->firstOrCreate('name', [
                    'name' => ucfirst($item->category),
                    'slug' => Str::slug($item->category),
                ]);

                $this->articleService->firstOrCreate('title', [
                    'source_id' => $sourceId,
                    'category_id' => $category->id,
                    'author_id' => $author->id,
                    'title' => $item->title,
                    'slug' => Str::slug($item->title),
                    'description' => $item->description,
                    'url' => $item->url,
                    'image' => $item->image ?? $this->defaultImage(),
                    'published_at' => $item->published_at,
                ]);

            });

            $this->logInfo(__('Media Stack API data inserted successfully!'));

            return true;
        } catch (Exception $exception) {
            $this->logError($exception);

            return false;
        }
    }
}
