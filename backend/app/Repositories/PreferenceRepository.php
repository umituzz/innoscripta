<?php

namespace App\Repositories;

use App\Contracts\PreferenceRepositoryInterface;
use App\Models\Preferenceable;

/**
 * Class PreferenceRepository
 * @package App\Repositories
 */
class PreferenceRepository extends BaseRepository implements PreferenceRepositoryInterface
{
    private Preferenceable $preferenceable;

    public function __construct(Preferenceable $preferenceable)
    {
        parent::__construct($preferenceable);

        $this->preferenceable = $preferenceable;
    }
}
