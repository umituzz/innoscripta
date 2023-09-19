<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'source_id' => 'uk-news/live/2023/sep/09/daniel-khalife-escaped-terror-suspect-caught-in-london-chiswick-wandsworth-prison',
            'source_name' => 'The Guardian',
            'api' => 'The Guardian',
            'author' => 'Guardian Desk',
            'title' => 'Daniel Khalife captured after he was pulled off a bicycle while riding along a towpath, police say – live',
            'description' => 'test description',
            'category' => 'UK news',
            'url' => 'https://www.theguardian.com/uk-news/live/2023/sep/09/daniel-khalife-escaped-terror-suspect-caught-in-london-chiswick-wandsworth-prison',
            'url_to_image' => 'https://birn.eu.com/wp-content/uploads/2018/11/guardian-300x201.png',
            'published_at' => now(),
        ];
    }
}
