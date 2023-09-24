<?php

namespace App\Services\User;

use App\Models\Author;
use App\Models\Category;
use App\Models\Source;
use App\Traits\Logger;
use Exception;
use App\Contracts\PreferenceRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class PreferenceService
 * @package App\Services\User
 */
class PreferenceService
{
    use Logger;

    private PreferenceRepositoryInterface $preferenceRepository;

    public function __construct(PreferenceRepositoryInterface $preferenceRepository)
    {
        $this->preferenceRepository = $preferenceRepository;
    }

    public function getUserPreferences(Request $request)
    {
        $user = $request->user();
        $preferences = $user->preferences->groupBy('preferenceable_type');

        return [
            'sources' => $this->getPreferenceIds($preferences, Source::class),
            'categories' => $this->getPreferenceIds($preferences, Category::class),
            'authors' => $this->getPreferenceIds($preferences, Author::class),
        ];
    }

    public function savePreferences(Request $request, $key, $type)
    {
        $user = $request->user();
        $ids = $request->input($key, []);

        try {
            foreach ($ids as $id) {
                $this->preferenceRepository->create([
                    'user_id' => $user->id,
                    'preferenceable_id' => $id,
                    'preferenceable_type' => $type
                ]);
            }

            return true;
        } catch (Exception $exception) {
            $this->logError($exception);

            return false;
        }
    }

    private function getPreferenceIds($preferences, $type)
    {
        $preferenceType = $preferences->get($type);

        if ($preferenceType) {
            return $preferenceType->pluck('preferenceable_id')->toArray();
        }

        return [];
    }
}
