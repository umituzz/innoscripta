<?php

namespace App\Services\Article;

use App\Contracts\AuthorRepositoryInterface;

/**
 * Class AuthorService
 * @package App\Services\Article
 */
class AuthorService
{
    private AuthorRepositoryInterface $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function firstOrCreate($key, $data)
    {
        return $this->authorRepository->firstOrCreate($key, $data);
    }

    public function findBy($key, $value)
    {
        return $this->authorRepository->findBy($key, $value);
    }
}
