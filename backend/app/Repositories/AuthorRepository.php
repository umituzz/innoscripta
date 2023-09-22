<?php

namespace App\Repositories;

use App\Contracts\AuthorRepositoryInterface;
use App\Models\Author;

/**
 * Class AuthorRepository
 * @package App\Repositories
 */
class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{
    private Author $author;

    public function __construct(Author $author)
    {
        parent::__construct($author);

        $this->author = $author;
    }
}
