<?php

namespace App\Services\Article;

use App\Contracts\AuthorRepositoryInterface;
use App\Http\Resources\AuthorResource;

/**
 * Class AuthorService
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

    public function getList()
    {
        $items = $this->authorRepository->get();

        return AuthorResource::collection($items);
    }
}
