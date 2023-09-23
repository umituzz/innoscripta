<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\BaseController;
use App\Services\User\PreferenceService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class PreferencesController
 * @package App\Http\Controllers\User
 */
class PreferencesController extends BaseController
{
    private PreferenceService $preferenceService;

    public function __construct(PreferenceService $preferenceService)
    {
        $this->preferenceService = $preferenceService;
    }

    public function sourcePreferences(Request $request)
    {
//        @todo
//        $this->preferenceService->sourcePreferences($request);

        return $this->ok([], Response::HTTP_OK, __('Source Preferences Added'));
    }
}
