<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function update(Notification $notification)
    {
        $notification->markAsRead();

        return;
    }
}
