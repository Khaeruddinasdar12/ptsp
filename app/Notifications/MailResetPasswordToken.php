<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailResetPasswordToken extends Notification
{
    use Queueable;
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
    }
    public function via($notifiable)
    {
        return ['mail'];
    }
    public function toMail($notifiable)
    {
       return (new MailMessage)
       ->subject('PTSP - Reset Password')
       ->greeting('Hello')
       ->line('Anda menerima email ini karena kami menerima permintaan reset password untuk akun anda.')
       ->action('Reset Password', url(config('app.url').route('password.reset', $this->token, false)))
       ->line('Jika anda tidak mengirimkan permintaan untuk reset password, abaikan email ini.')
       ->salutation('Terima Kasih,')
       ->salutation('PTSP Makassar');
   }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
