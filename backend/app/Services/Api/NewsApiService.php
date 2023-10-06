<?php

namespace App\Services\Api;

use App\Contracts\ApiServiceInterface;
use App\Enums\AuthorEnums;
use Exception;
use Illuminate\Support\Str;

/**
 * Class NewsApiService
 */
class NewsApiService extends BaseApiService implements ApiServiceInterface
{
    public function getUrl(): string
    {
        return config('services.newsApi.api_url').'/top-headlines?country=us&apiKey='.config('services.newsApi.api_key');
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

            $items = $response->articles;

            if (empty($items)) {
                $this->logInfo(__('No data available in the API response'));

                return false;
            }

            collect($items)->map(function ($item) use ($sourceId) {

                if (! empty($item->author)) {
                    $fistAuthor = explode(',', $item->author)[0];
                }

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
                    'slug' => Str::slug($item->title),
                    'description' => $item->description,
                    'url' => $item->url,
                    'image' => $item->urlToImage ?? $this->defaultImage(),
                    'published_at' => $item->publishedAt,
                ]);

            });

            $this->logInfo(__('News API data inserted successfully!'));

            return true;
        } catch (Exception $exception) {
            $this->logError($exception);

            return false;
        }
    }
}
