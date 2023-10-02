<?php

namespace App\Services\Api;

use App\Contracts\ApiServiceInterface;
use App\Enums\AuthorEnums;
use Exception;
use Illuminate\Support\Str;

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
        return config('services.guardianApi.api_url') . '/search?api-key=' . config('services.guardianApi.api_key');
    }

    public function getData($sourceId)
    {
        try {
            $url = $this->getUrl();
            $response = $this->httpService->getResult($url);

            if (!$response) {
                return __('No data received from the API.');
            }

            $items = $response->response->results;

            if (empty($items)) {
                return __('No data available in the API response.');
            }

            $author = $this->authorService->findBy('name', AuthorEnums::GUARDIAN_AUTHOR);

            collect($items)->map(function ($item) use ($sourceId, $author) {

                $category = $this->categoryService->firstOrCreate('name', [
                    'name' => $item->sectionName,
                    'slug' => $item->sectionId,
                ]);

                $this->articleService->firstOrCreate('title', [
                    'source_id' => $sourceId,
                    'category_id' => $category->id,
                    'author_id' => $author->id,
                    'title' => $item->webTitle,
                    'slug' => Str::slug($item->webTitle),
                    'description' => $this->defaultDescription(),
                    'url' => $item->webUrl,
                    'image' => $this->defaultImage(),
                    'published_at' => $item->webPublicationDate,
                ]);
            });

            return __('Data inserted successfully');
        } catch (Exception $exception) {
            $this->logError($exception);

            return __('An error occurred while processing the data.');
        }
    }


}
