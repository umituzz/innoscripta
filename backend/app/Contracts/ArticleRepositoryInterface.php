<?php

namespace App\Contracts;

/**
 * Interface ArticleRepositoryInterface
 * @package App\Contracts
 */
interface ArticleRepositoryInterface
{
    public function getWith();

    public function getElasticsearchData($searchTerm);
}
