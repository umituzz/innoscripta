<?php

namespace App\Contracts;

/**
 * Interface NotificationRepositoryInterface
 */
interface NotificationRepositoryInterface
{
    public function getNotifications();

    public function delete($id);

    public function find($id);
}
