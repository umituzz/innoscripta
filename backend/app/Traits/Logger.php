<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

/**
 * Trait NotifyUser
 * @package App\Traits
 */
trait Logger
{
    public function logError($error)
    {
        Log::error('Message: ' . $error->getMessage());
    }
}
