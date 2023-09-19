<?php

namespace App\Repositories;

use App\Contracts\SourceRepositoryInterface;
use App\Models\Source;

/**
 * Class ArticleRepository
 * @package App\Models
 */
class SourceRepository extends BaseRepository implements SourceRepositoryInterface
{
    private Source $resource;

    public function __construct(Source $resource)
    {
        parent::__construct($resource);

        $this->resource = $resource;
    }
}
