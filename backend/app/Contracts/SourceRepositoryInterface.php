<?php

namespace App\Contracts;

/**
 * Interface ResourceRepositoryInterface
 * @package App\Contracts
 */
interface SourceRepositoryInterface
{
    public function attachRecords($sourceIds, $userId);
}
