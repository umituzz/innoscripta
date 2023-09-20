<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\BaseController;
use App\Services\User\SettingService;
use Illuminate\Http\Response;

/**
 * Class SettingsController
 * @package App\Http\Controllers\Api\User
 */
class SettingsController extends BaseController
{
    private SettingService $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index()
    {
        $items = $this->settingService->getList(auth()->id());

        return $this->ok($items, Response::HTTP_OK, __('User Setting'));
    }
}
