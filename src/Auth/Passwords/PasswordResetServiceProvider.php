<?php

namespace Orvital\Core\Auth\Passwords;

use Illuminate\Auth\Passwords\PasswordResetServiceProvider as BasePasswordResetServiceProvider;
use Orvital\Core\Auth\Passwords\PasswordBrokerManager;

/**
 * @property-read \Orvital\Core\Foundation\Application $app
 */
class PasswordResetServiceProvider extends BasePasswordResetServiceProvider
{
    protected function registerPasswordBroker()
    {
        $this->app->singleton('auth.password', function ($app) {
            return new PasswordBrokerManager($app);
        });

        $this->app->bind('auth.password.broker', function ($app) {
            return $app->make('auth.password')->broker();
        });
    }
}
