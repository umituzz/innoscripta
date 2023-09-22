<?php

namespace App\Http\Controllers\User;

use App\Contracts\NotificationRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;

/**
 * Class NotificationsController
 * @package App\Http\Controllers\User
 */
class NotificationsController extends Controller
{
    private NotificationRepositoryInterface $notificationRepository;

    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function index()
    {
        $notifications = $this->notificationRepository->getNotifications();

        return view('notification.index', [
            'notifications' => $notifications
        ]);
    }

    public function show($id)
    {
        $notification = $this->notificationRepository->find($id);
        $notification->update(['read_at' => now()]);

        $notification = (new NotificationResource($notification))->toArray(request());

        return view('notification.show', [
            'notification' => $notification
        ]);
    }

    public function destroy($id)
    {
        $this->notificationRepository->delete($id);

        return redirect()->back();
    }
}
