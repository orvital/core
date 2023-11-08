<?php

namespace Orvital\Core\Session;

use Illuminate\Session\SessionServiceProvider as BaseSessionServiceProvider;
use Orvital\Core\Session\SessionManager;

class SessionServiceProvider extends BaseSessionServiceProvider
{
    protected function registerSessionManager()
    {
        $this->app->singleton('session', function ($app) {
            return new SessionManager($app);
        });
    }
}
