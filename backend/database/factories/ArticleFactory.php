<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Source;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = 'Daniel Khalife captured after he was pulled off a bicycle while riding along a towpath, police say – live';

        return [
            'source_id' => Source::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'category' => 'UK news',
            'url' => 'https://www.theguardian.com/uk-news/live/2023/sep/09/daniel-khalife-escaped-terror-suspect-caught-in-london-chiswick-wandsworth-prison',
            'image' => 'https://birn.eu.com/wp-content/uploads/2018/11/guardian-300x201.png',
            'published_at' => now(),
        ];
    }
}
