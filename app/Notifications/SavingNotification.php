<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SavingNotification extends Notification
{
    use Queueable;
    private  $saving_notification;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($saving_notification)
    {
        $this->saving_notification = $saving_notification;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = "/saving/get/challenges";
        return (new MailMessage)
            ->from('suhedmond25@yahoo.com', 'Saving Challenge')
            ->greeting("Hello")
            ->line($this->saving_notification['body'])
            ->action('Notification Action', $url)
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'id' => $this->saving_notification['id']
        ];
    }
}
