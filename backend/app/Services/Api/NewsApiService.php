<?php

namespace App\Services\Api;

use App\Contracts\ApiServiceInterface;
use App\Enums\AuthorEnums;
use App\Enums\SourceEnums;
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

                $fistAuthor = explode(',', $item->author)[0] ?? AuthorEnums::NEWS_AUTHOR;

                $author = $this->authorService->firstOrCreate('name', [
                    'source_id' => $sourceId,
                    'name' => $fistAuthor,
                ]);

                $this->articleService->firstOrCreate('title', [
                    'source_id' => $sourceId,
                    'author_id' => $author->id,
                    'category_id' => NULL, // no field with related category
                    'title' => $item->title,
                    'description' => $item->description,
                    'url' => $item->url,
                    'image' => $item->urlToImage ?? SourceEnums::DEFAULT_IMAGE,
                    'published_at' => $item->publishedAt,
                ]);

            });

            return __('Data inserted successfully');
        } catch (Exception $exception) {
            $this->notificationService->error($exception->getMessage());
        }
    }

}
