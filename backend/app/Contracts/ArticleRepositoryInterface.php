<?php

namespace App\Contracts;

/**
 * Interface ArticleRepositoryInterface
 */
interface ArticleRepositoryInterface
{
    public function getWith();

    public function getElasticsearchData($searchTerm);
}
