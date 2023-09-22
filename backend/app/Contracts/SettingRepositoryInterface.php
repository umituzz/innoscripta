<?php

namespace App\Contracts;

/**
 * Interface SettingRepositoryInterface
 * @package App\Contracts
 */
interface SettingRepositoryInterface
{
    public function getUserSetting($userId);
}
