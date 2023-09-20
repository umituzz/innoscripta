<?php

namespace App\Repositories;

use App\Contracts\SettingRepositoryInterface;
use App\Models\Setting;

/**
 * Class UserRepository
 * @package App\Models
 */
class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    private Setting $setting;

    public function __construct(Setting $setting)
    {
        parent::__construct($setting);

        $this->setting = $setting;
    }

    public function getUserSetting($userId)
    {
        return $this->setting->where('user_id', $userId)->first();
    }
}
