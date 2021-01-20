<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    // public function __construct(){
    //     $new = AppController();
    // }
    //get number od notifications sent toa user when he/she hasnot comply with the saving challenge
    public function  emailNotifications()
    {
        $notifications_details = $this->notificationDetails()->get();
        $number_of_notifications = $this->notificationDetails()->count();
        return view('layouts.app', compact('notifications_details', 'number_of_notifications'));
        //dd($notifications_details);
    }
    //get the details for a notification
    private function notificationDetails()
    {
        $notifications = DB::table('notifications')
            ->join('users', 'users.id', '=', 'notifications.notifiable_id')
            ->where('users.id', '=', Auth::user()->id)
            ->select('notifications.created_at')
            ->orderBy('notifications.created_at', 'DESC');
        return $notifications;
    }
}
