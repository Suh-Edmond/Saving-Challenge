<?php

namespace App\Http\Controllers;

use App\Notifications\SavingNotification;
use Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function SendNotification()
    {
        $data = User::first();
        $saving_notification_data = [
            'name' => '#007 Bill',
            'body' => 'You have received a new saving notification.',
            'url' => url('/notifications'),
            'id' => 30061
        ];
        Notification::send($data, new SavingNotification($saving_notification_data));

        dd('Notification has been sent');
    }
}
