<?php

namespace App\Services\User;

use App\Models\Author;
use App\Models\Category;
use App\Models\Source;
use App\Models\User;
use App\Services\Redis\RedisService;
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
    private RedisService $redisService;

    public function __construct(
        PreferenceRepositoryInterface $preferenceRepository,
        RedisService $redisService
    )
    {
        $this->preferenceRepository = $preferenceRepository;
        $this->redisService = $redisService;
    }

    public function findUserPreferences()
    {
        $user = request()->user();

        return  $user->preferences->groupBy('preferenceable_type');
    }

    public function getUserPreferences(Request $request)
    {
       $preferences = $this->findUserPreferences();

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

        $this->preferenceRepository->delete('preferenceable_type', $type);

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

    public function checkUserPreferences()
    {
        if (auth()->check()) {
            $preferences = $this->findUserPreferences();

            $data = [
                'sources' => $this->getPreferenceIds($preferences, Source::class),
                'categories' => $this->getPreferenceIds($preferences, Category::class),
                'authors' => $this->getPreferenceIds($preferences, Author::class),
            ];

            $data['sources'] = $this->redisService->getByIds('sources', $data['sources']);
            $data['categories'] = $this->redisService->getByIds('categories', $data['categories']);
            $data['authors'] = $this->redisService->getByIds('authors', $data['authors']);

        } else {
            $data['sources'] = $this->redisService->get('sources');
            $data['authors'] = $this->redisService->get('authors');
            $data['categories'] = $this->redisService->get('categories');
        }

        return $data;
    }
}
