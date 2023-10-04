<?php

namespace App\Services\Article;

use App\Contracts\SourceRepositoryInterface;
use App\Http\Resources\SourceResource;

/**
 * Class SourceService
 */
class SourceService
{
    private SourceRepositoryInterface $sourceRepository;

    public function __construct(SourceRepositoryInterface $sourceRepository)
    {
        $this->sourceRepository = $sourceRepository;
    }

    public function getList()
    {
        $items = $this->sourceRepository->get();

        return SourceResource::collection($items);
    }

    /**
     * @return mixed
     */
    public function findBy($key, $value)
    {
        return $this->sourceRepository->findBy($key, $value);
    }
}
