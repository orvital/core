<?php

namespace Orvital\Core\Auth;

use Illuminate\Auth\AuthServiceProvider as BaseAuthServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Orvital\Core\Contracts\Auth\Authenticable as AuthenticableContract;

/**
 * @property-read \Orvital\Core\Foundation\Application $app
 */
class AuthServiceProvider extends BaseAuthServiceProvider
{
    protected function registerUserResolver()
    {
        $this->app->bind(AuthenticableContract::class, fn ($app) => call_user_func($app['auth']->userResolver()));
    }

    public function boot()
    {
        Password::defaults(function () {
            $rule = Password::min(8);

            if ($this->app->isProduction()) {
                $rule = $rule->mixedCase()->numbers()->symbols()->uncompromised();
            }

            return $rule;
        });

        Gate::guessPolicyNamesUsing(function (string $modelName) {
            $policyName = Str::finish($modelName, 'Policy');

            if (class_exists($policyName)) {
                return $policyName;
            }

            return $this->app->getNamespace().'Policies\\'.class_basename($policyName);
        });
    }
}
