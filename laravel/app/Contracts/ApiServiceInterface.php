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
    public function getData($resourceId);

    /**
     * @return string
     */
    public function getUrl(): string;
}
