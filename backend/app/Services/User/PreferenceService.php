<?php

namespace App\Services\User;

use App\Contracts\PreferenceRepositoryInterface;
use App\Models\Source;
use App\Services\Notification\NotificationService;
use Exception;

/**
 * Class PreferenceService
 * @package App\Services\User
 */
class PreferenceService
{
    private PreferenceRepositoryInterface $preferenceRepository;
    private NotificationService $notificationService;

    public function __construct(
        NotificationService           $notificationService,
        PreferenceRepositoryInterface $preferenceRepository
    )
    {
        $this->preferenceRepository = $preferenceRepository;
        $this->notificationService = $notificationService;
    }

    public function savePreferences($request, $key, $type)
    {
        $user = $request->user();
        $ids = $request->has($key) ? $request->input($key) : [];

        collect($ids)->map(function ($id) use ($user, $type) {

            try {
                $this->preferenceRepository->create([
                    'user_id' => $user->id,
                    'preferenceable_id' => $id,
                    'preferenceable_type' => $type
                ]);
            } catch (Exception $exception) {
                $this->notificationService->error($exception);

                return false;
            }

        });

        return true;

    }
}
