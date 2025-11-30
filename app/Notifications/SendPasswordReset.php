<?php

namespace Pterodactyl\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendPasswordReset extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $token)
    {
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(mixed $notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject('パスワードをリセット')
            ->line('アカウントのパスワードリセットリクエストを受け取ったため、このメールを受信して​​います。')
            ->action('パスワードをリセット', url('/auth/password/reset/' . $this->token . '?email=' . urlencode($notifiable->email)))
            ->line('パスワードのリセットをリクエストしていない場合は、これ以上の操作は必要ありません。');
    }
}
