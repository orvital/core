<?php

namespace Orvital\Core\Auth;

use Illuminate\Auth\AuthServiceProvider as BaseAuthServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Orvital\Core\Auth\Access\Gate;

/**
 * @property-read \Orvital\Core\Foundation\Application $app
 */
class AuthServiceProvider extends BaseAuthServiceProvider
{
    protected function registerAccessGate()
    {
        $this->app->singleton(GateContract::class, function ($app) {
            return new Gate($app, fn () => call_user_func($app['auth']->userResolver()));
        });
    }
}
