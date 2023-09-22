<?php

namespace App\Services\Source;

use App\Contracts\SourceRepositoryInterface;
use App\Http\Resources\SourceResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class SourceService
 * @package App\Services\Source
 */
class SourceService
{
    private SourceRepositoryInterface $sourceRepository;

    public function __construct(SourceRepositoryInterface $sourceRepository)
    {
        $this->sourceRepository = $sourceRepository;
    }

    /**
     * @return AnonymousResourceCollection
     */
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
