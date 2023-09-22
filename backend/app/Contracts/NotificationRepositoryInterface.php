<?php

namespace App\Contracts;

/**
 * Interface NotificationRepositoryInterface
 * @package App\Contracts
 */
interface NotificationRepositoryInterface
{
    public function getNotifications();

    public function delete($id);

    public function find($id);

}
