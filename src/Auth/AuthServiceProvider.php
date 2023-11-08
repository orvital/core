<?php

namespace Orvital\Core\Auth;

use Illuminate\Auth\AuthServiceProvider as BaseAuthServiceProvider;
use Illuminate\Validation\Rules\Password;

/**
 * @property-read \Orvital\Core\Foundation\Application $app
 */
class AuthServiceProvider extends BaseAuthServiceProvider
{
    public function boot()
    {
        Password::defaults(function () {
            $rule = Password::min(8);

            if ($this->app->isProduction()) {
                $rule = $rule->mixedCase()->numbers()->symbols()->uncompromised();
            }

            return $rule;
        });
    }
}
