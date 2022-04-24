<?php

namespace App\Notifications\Auth;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends ResetPassword
{
    /**
     * @param string $url
     * @return MailMessage
     */
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject(trans('notifications.auth.reset_password.subject'))
            ->line(trans('notifications.auth.reset_password.header'))
            ->action(trans('notifications.auth.reset_password.action'), $url)
            ->line(trans('notifications.auth.reset_password.body', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
            ->line(trans('notifications.auth.reset_password.footer'));
    }
}
