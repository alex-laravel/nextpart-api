<?php

namespace App\Notifications\Auth;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmailNotification extends VerifyEmail
{
    /**
     * @param string $url
     * @return MailMessage
     */
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject(trans('notifications.auth.verify.subject'))
            ->line(trans('notifications.auth.verify.header'))
            ->action(trans('notifications.auth.verify.action'), $url)
            ->line(trans('notifications.auth.verify.footer'));
    }
}
