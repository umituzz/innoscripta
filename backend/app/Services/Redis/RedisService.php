<?php

namespace App\Services\Redis;

use Illuminate\Support\Facades\Redis;

/**
 * Class RedisService
 */
class RedisService
{
    public static function set($key, $value)
    {
        return Redis::set($key, json_encode($value));
    }

    public function get($key)
    {
        return json_decode(Redis::get($key));
    }

    public static function delete($key)
    {
        return Redis::del($key);
    }

    public function flushDB()
    {
        return Redis::flushDB();
    }

    public static function keys($keys = '*')
    {
        return Redis::keys($keys);
    }

    public function getByIds($key, $ids, $redisColumn = 'id')
    {
        $data = $this->get($key);

        $data = collect($data)->whereIn($redisColumn, $ids);

        return array_values($data->toArray());
    }
}
