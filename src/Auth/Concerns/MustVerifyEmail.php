<?php

namespace Orvital\Core\Auth\Concerns;

use Illuminate\Support\Facades\Notification;
use Orvital\Core\Auth\Notifications\VerifyEmail;

/**
 * @see \Illuminate\Contracts\Auth\MustVerifyEmail
 */
trait MustVerifyEmail
{
    /**
     * The name of the "verified at" column.
     *
     * @var string|null
     */
    const VERIFIED_AT = 'verified_at';

    /**
     * Determine if the user has verified their email address.
     *
     * @return bool
     */
    public function hasVerifiedEmail()
    {
        return ! is_null($this->{$this->getVerifiedAtColumn()});
    }

    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markEmailAsVerified()
    {
        return $this->forceFill([$this->getVerifiedAtColumn() => $this->freshTimestamp()])->save();
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        Notification::send($this, new VerifyEmail());
    }

    /**
     * Get the email address that should be used for verification.
     *
     * @return string
     */
    public function getEmailForVerification()
    {
        return $this->email;
    }

    /**
     * Get the name of the "verified at" column.
     *
     * @return string|null
     */
    public function getVerifiedAtColumn()
    {
        return static::VERIFIED_AT;
    }
}
