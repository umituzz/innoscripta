<?php

namespace App\Models;

/**
 * Class Setting
 * @package App\Models
 */
class Setting extends BaseModel
{
    protected $fillable = [
        'user_id',
        'type',
        'name'
    ];
}
