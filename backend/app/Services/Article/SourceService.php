<?php

namespace App\Services\Article;

use App\Contracts\SourceRepositoryInterface;
use App\Http\Resources\SourceResource;

/**
 * Class SourceService
 * @package App\Services\Article
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
     * @param $key
     * @param $value
     * @return mixed
     */
    public function findBy($key, $value)
    {
        return $this->sourceRepository->findBy($key, $value);
    }
}
