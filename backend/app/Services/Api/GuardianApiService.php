<?php

namespace App\Services\Api;

use App\Contracts\ApiServiceInterface;
use App\Enums\AuthorEnums;
use App\Enums\SourceEnums;
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
        return env('GUARDIAN_API_URL') . '/search?api-key=' . env('GUARDIAN_API_KEY');
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
                    'description' => $this->getDescription(), // no description field in api, that's why default description added
                    'url' => $item->webUrl,
                    'image' => SourceEnums::DEFAULT_IMAGE,
                    'published_at' => $item->webPublicationDate,
                ]);
            });

            return __('Data inserted successfully');
        } catch (Exception $exception) {
            $this->logError($exception);

            return __('An error occurred while processing the data.');
        }
    }

    private function getDescription()
    {
        return "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum";
    }
}
