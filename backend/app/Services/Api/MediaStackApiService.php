<?php

namespace App\Services\Api;

use App\Contracts\ApiServiceInterface;
use App\Enums\AuthorEnums;
use App\Enums\SourceEnums;
use Exception;
use Illuminate\Support\Str;

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
            $response = $this->httpService->getResult($url);

            if (!$response) {
                return __('No data received from the API.');
            }

            $items = $response->data;

            if (empty($items)) {
                return __('No data available in the API response.');
            }

            collect($items)->map(function ($item) use($sourceId){

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
                    'description' => $item->description,
                    'url' => $item->url,
                    'image' => $item->image ?? SourceEnums::DEFAULT_IMAGE,
                    'published_at' => $item->published_at,
                ]);

            });

            return __('Data inserted successfully');
        } catch (Exception $exception) {
            $this->logError($exception);

            return __('An error occurred while processing the data.');
        }
    }
}
