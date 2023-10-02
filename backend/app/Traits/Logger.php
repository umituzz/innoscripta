<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

/**
 * Trait NotifyUser
 * @package App\Traits
 */
trait Logger
{
    /**
     * @param $exception
     * @return void
     */
    public function logError($exception): void
    {
        Log::error(__('Error Message: ') . $exception->getMessage());
        Log::error(__('Error Code: ') . $exception->getCode());
        Log::error(__('Error File: ') . $exception->getFile());
        Log::error(__('Error Line: ') . $exception->getLine());
    }

    /**
     * @param $message
     * @return void
     */
    public function logInfo($message): void
    {
        Log::info(__('Info Message: ') . $message);
    }
}
