<?php

namespace App\Repositories;

use App\Contracts\ResourceRepositoryInterface;
use App\Models\Resource;

/**
 * Class ArticleRepository
 * @package App\Models
 */
class ResourceRepository extends BaseRepository implements ResourceRepositoryInterface
{
    private Resource $resource;

    public function __construct(Resource $resource)
    {
        parent::__construct($resource);

        $this->resource = $resource;
    }
}
