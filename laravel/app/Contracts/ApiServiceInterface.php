<?php

namespace App\Contracts;

/**
 * Interface BaseApiServiceInterface
 * @package App\Contracts
 */
interface ApiServiceInterface
{
    /**
     * @return string[]
     */
    public function getData($sourceId);

    /**
     * @return string
     */
    public function getUrl(): string;
}
