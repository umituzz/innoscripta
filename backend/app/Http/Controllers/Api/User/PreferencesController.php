<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\BaseController;
use App\Models\Author;
use App\Models\Category;
use App\Models\Source;
use App\Services\User\PreferenceService;
use Illuminate\Http\Request;

/**
 * Class PreferencesController
 */
class PreferencesController extends BaseController
{
    private PreferenceService $preferenceService;

    public function __construct(PreferenceService $preferenceService)
    {
        $this->preferenceService = $preferenceService;
    }

    public function index()
    {
        $data = $this->preferenceService->checkUserPreferences();

        return $this->ok($data, __('Preferences List'));
    }

    public function userPreferences()
    {
        $preferences = $this->preferenceService->getUserPreferences();

        return $this->ok($preferences, __('User Preferences List'));
    }

    public function saveSource(Request $request)
    {
        $result = $this->preferenceService->savePreferences($request, 'sourceIds', Source::class);

        return $this->ok($result, __('Source Preferences Saved'));
    }

    public function saveCategory(Request $request)
    {
        $result = $this->preferenceService->savePreferences($request, 'categoryIds', Category::class);

        return $this->ok($result, __('Category Preferences Saved'));
    }

    public function saveAuthor(Request $request)
    {
        $result = $this->preferenceService->savePreferences($request, 'authorIds', Author::class);

        return $this->ok($result, __('Author Preferences Saved'));
    }
}
