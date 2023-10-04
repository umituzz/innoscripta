<?php

namespace App\Contracts;

/**
 * Interface SettingRepositoryInterface
 */
interface SettingRepositoryInterface
{
    public function getUserSetting($userId);
}
