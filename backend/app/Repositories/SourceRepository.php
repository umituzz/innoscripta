<?php

namespace App\Repositories;

use App\Contracts\SourceRepositoryInterface;
use App\Models\Source;

/**
 * Class SourceRepository
 */
class SourceRepository extends BaseRepository implements SourceRepositoryInterface
{
    private Source $source;

    public function __construct(Source $source)
    {
        parent::__construct($source);

        $this->source = $source;
    }
}
