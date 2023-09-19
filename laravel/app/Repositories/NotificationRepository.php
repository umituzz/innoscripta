<?php

namespace App\Repositories;

use App\Contracts\NotificationRepositoryInterface;
use App\Http\Resources\NotificationResource;

/**
 * Class NotificationRepository
 * @package App\Models
 */
class NotificationRepository implements NotificationRepositoryInterface
{
    public function getNotifications()
    {
        $notifications = auth()->user()->notifications;

        return NotificationResource::collection($notifications)->toArray(request());
    }

    public function delete($id)
    {
        return auth()->user()->notifications()->where('id', $id)->delete();
    }

    public function find($id)
    {
        return auth()->user()->notifications()->where('id', $id)->first();
    }
}
