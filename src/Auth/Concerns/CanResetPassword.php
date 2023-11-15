<?php

namespace Orvital\Core\Auth\Concerns;

use Illuminate\Support\Facades\Notification;
use Orvital\Core\Auth\Notifications\ResetPassword;

/**
 * @mixin \Orvital\Core\Database\Eloquent\Model
 *
 * @see \Illuminate\Contracts\Auth\CanResetPassword
 */
trait CanResetPassword
{
    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        Notification::send($this, new ResetPassword($token));
    }
}
