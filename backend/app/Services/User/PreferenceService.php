<?php

namespace App\Services\User;

use App\Contracts\PreferenceRepositoryInterface;
use App\Models\Author;
use App\Models\Category;
use App\Models\Source;
use App\Models\User;
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

    public function getUserPreferences($request)
    {
        $user = $request->user() ?? User::find(1);
        $preferences = $user->preferences;
        $sources = $preferences->where('preferenceable_type', Source::class)->pluck('preferenceable_id')->toArray();
        $categories = $preferences->where('preferenceable_type', Category::class)->pluck('preferenceable_id')->toArray();
        $authors = $preferences->where('preferenceable_type', Author::class)->pluck('preferenceable_id')->toArray();

        return [
            'sources' => $sources,
            'categories' => $categories,
            'authors' => $authors,
        ];
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
