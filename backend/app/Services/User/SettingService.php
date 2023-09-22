<?php

namespace App\Services\User;

use App\Contracts\SettingRepositoryInterface;
use App\Http\Resources\SettingResource;

/**
 * Class SettingService
 * @package App\Services\User
 */
class SettingService
{
    private SettingRepositoryInterface $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function getList($userId)
    {
        $setting = $this->settingRepository->getUserSetting($userId);

        return new SettingResource($setting);
    }
}
