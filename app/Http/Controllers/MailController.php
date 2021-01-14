<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\Notification;

class MailController extends Controller
{
    public function SendMail()
    {
        #// need to run a query to get the email addresses and names of all users who have not compile to the saving challenge for the week
        $user = [
            'name' => "John Doe",
            "code" => "86348jsdfsfd"
        ];
        Mail::to("suhedmond25@yahoo.com")->send(new Notification($user));
    }
}
