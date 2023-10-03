<?php

namespace Http\Controllers\Api\Article;

use App\Http\Resources\ArticleCollection;
use App\Models\Article;
use App\Services\Article\ArticleService;
use Tests\Feature\IntegrationBaseTestCase;

/**
 * Class ArticlesControllerTest
 * @package Tests\Feature\Http\Controllers\Api\Article
 * @coversDefaultClass \App\Http\Controllers\Api\Article\ArticlesController
 */
class ArticlesControllerTest extends IntegrationBaseTestCase
{
    public function test_articles_list()
    {
        $articles = Article::factory(2)->create();
        $mockedData = new ArticleCollection($articles);

        $this->mock(ArticleService::class)
            ->shouldReceive('getAllElasticData')
            ->andReturn($mockedData);

        $response = $this->get('/api/articles');

        $response
            ->assertStatus(200)
            ->assertJson(['message' => 'Article List']);
    }

    public function test_detail_existing_article()
    {
        $article = Article::factory()->create();
        $slug = $article->slug;

        $this->mock(ArticleService::class)
            ->shouldReceive('findBy')
            ->with('slug', $slug)
            ->andReturn($article);

        $response = $this->get('/api/articles/' . $slug);

        $response
            ->assertStatus(200)
            ->assertJson(['message' => 'Article Detail']);
    }

    public function test_detail_nonexistent_article()
    {
        $slug = 'non-existent-slug';

        $this->mock(ArticleService::class)
            ->shouldReceive('findBy')
            ->with('slug', $slug)
            ->andReturn(null);

        $response = $this->get('/api/articles/'.$slug);

        $response
            ->assertStatus(404)
            ->assertJson(['message' => 'Not Found']);
    }

}
