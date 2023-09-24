<?php

namespace App\Services\Api;

use App\Contracts\ApiServiceInterface;
use App\Enums\AuthorEnums;
use App\Enums\SourceEnums;
use Exception;
use Illuminate\Support\Str;

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
            $response = $this->httpService->getResult($url);

            if (!$response) {
                return __('No data received from the API.');
            }

            $items = $response->articles;

            if (empty($items)) {
                return __('No data available in the API response.');
            }

            collect($items)->map(function ($item) use ($sourceId) {

                $fistAuthor = explode(',', $item->author)[0] ?? AuthorEnums::NEWS_AUTHOR;

                $author = $this->authorService->firstOrCreate('name', [
                    'name' => $fistAuthor ?? AuthorEnums::NEWS_AUTHOR,
                ]);

                $categoryName = 'General';
                $category = $this->categoryService->firstOrCreate('name', [
                    'name' => $categoryName,
                    'slug' => Str::slug($categoryName),
                ]);

                $this->articleService->firstOrCreate('title', [
                    'source_id' => $sourceId,
                    'author_id' => $author->id,
                    'category_id' => $category->id,
                    'title' => $item->title,
                    'description' => $item->description,
                    'url' => $item->url,
                    'image' => $item->urlToImage ?? SourceEnums::DEFAULT_IMAGE,
                    'published_at' => $item->publishedAt,
                ]);

            });

            return __('Data inserted successfully');
        } catch (Exception $exception) {
            $this->logError($exception);

            return __('An error occurred while processing the data.');
        }
    }

}
