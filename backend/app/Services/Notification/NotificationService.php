<?php

namespace App\Services\Notification;

use App\Models\User;
use App\Notifications\InformErrorNotification;
use Illuminate\Support\Facades\Notification;

/**
 * Class NotificationService
 * @package App\Services
 */
class NotificationService
{
    public function error($error)
    {
        Notification::send(
            User::find(1),
            new InformErrorNotification([
                'error' => $error
            ])
        );
    }
}
