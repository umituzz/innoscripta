<?php

namespace App\Services\Api;

use App\Contracts\ApiServiceInterface;
use App\Enums\AuthorEnums;
use App\Enums\SourceEnums;
use Exception;

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

            if (!$items) {
                return;
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
                    'description' => NULL, // no description field in api
                    'url' => $item->webUrl,
                    'image' => SourceEnums::DEFAULT_IMAGE,
                    'published_at' => $item->webPublicationDate,
                ]);
            });

            return __('Data inserted successfully');
        } catch (Exception $exception) {
            $this->logError($exception);
        }
    }
}
