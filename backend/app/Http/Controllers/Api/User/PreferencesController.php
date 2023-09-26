<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\BaseController;
use App\Models\Author;
use App\Models\Category;
use App\Models\Source;
use App\Services\Redis\RedisService;
use App\Services\User\PreferenceService;
use Illuminate\Http\Request;

/**
 * Class PreferencesController
 * @package App\Http\Controllers\User
 */
class PreferencesController extends BaseController
{
    private RedisService $redisService;
    private PreferenceService $preferenceService;

    public function __construct(
        RedisService $redisService,
        PreferenceService $preferenceService
    )
    {
        $this->redisService = $redisService;
        $this->preferenceService = $preferenceService;
    }

    public function index()
    {
        $data['sources'] = $this->redisService->get('sources');
        $data['authors'] = $this->redisService->get('authors');
        $data['categories'] = $this->redisService->get('categories');

        return $this->ok($data, __('Preferences List'));
    }

    public function userPreferences(Request $request)
    {
        $preferences = $this->preferenceService->getUserPreferences($request);

        return $this->ok($preferences, __('User Preferences List'));
    }

    public function saveSource(Request $request)
    {
        $result = $this->preferenceService->savePreferences($request, 'sourceIds', Source::class);

        return $this->ok($result, __('Source Preferences Saved'));
    }

    public function saveCategory(Request $request)
    {
        $this->preferenceService->savePreferences($request, 'categoryIds', Category::class);

        return $this->ok([], __('Category Preferences Saved'));
    }

    public function saveAuthor(Request $request)
    {
        $this->preferenceService->savePreferences($request, 'authorIds', Author::class);

        return $this->ok([], __('Author Preferences Saved'));
    }
}
