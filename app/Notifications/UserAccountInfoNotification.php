<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserAccountInfoNotification extends Notification
{
    use Queueable;

    private $name;

    private $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->name = $data[0];
        $this->password = $data[1];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('https://leagueadmin.net/dashboard');

        return (new MailMessage)
                    ->greeting('Hi! '.$this->name)
                    ->line('Welcome to LeagueAdmin!')
                    ->line('Your account has been created.')
                    ->line('Your password: '.$this->password)
                    ->action('Login', $url);
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
            //
        ];
    }
}
