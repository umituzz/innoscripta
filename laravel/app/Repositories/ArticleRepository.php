<?php

namespace App\Repositories;

use App\Contracts\ArticleRepositoryInterface;
use App\Models\Article;

/**
 * Class ArticleRepository
 * @package App\Models
 */
class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    private Article $article;

    public function __construct(Article $article)
    {
        parent::__construct($article);

        $this->article = $article;
    }
}
