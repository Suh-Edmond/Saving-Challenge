<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    //passing mail data
    public function __construct($data)
    {
        $this->notification_message = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('smtp.mailtrap.io', 'suhedmond25@yahoo.com')->subject("Saving Challenge Consistency check")->markdown('Mails.notification', ['mail_data' => $this->notification_message]);
    }
}
