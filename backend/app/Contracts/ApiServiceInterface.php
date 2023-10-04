<?php

namespace App\Contracts;

/**
 * Interface BaseApiServiceInterface
 */
interface ApiServiceInterface
{
    /**
     * @return string[]
     */
    public function getData($sourceId);

    public function getUrl(): string;
}
