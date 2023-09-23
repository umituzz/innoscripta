<?php

namespace App\Services\User;

use App\Contracts\SourceRepositoryInterface;

/**
 * Class PreferenceService
 * @package App\Services\User
 */
class PreferenceService
{
    private SourceRepositoryInterface $sourceRepository;

    public function __construct(SourceRepositoryInterface $sourceRepository)
    {
        $this->sourceRepository = $sourceRepository;
    }

    public function sourcePreferences($request)
    {
        $user = $request->user();
        $sourceIds = $request->has('sourceIds') ? $request->input('sourceIds') : [];

        $this->sourceRepository->attachRecords($sourceIds, $user->id);
    }
}
