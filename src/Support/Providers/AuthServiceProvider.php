<?php

namespace Orvital\Core\Support\Providers;

use Illuminate\Support\ServiceProvider;
use Orvital\Core\Support\Concerns\RegistersPolicies;

/**
 * @property-read \Orvital\Core\Foundation\Application $app
 */
class AuthServiceProvider extends ServiceProvider
{
    use RegistersPolicies;

    /**
     * Register the application's policies.
     *
     * @return void
     */
    public function register()
    {
        $this->booting(function () {
            $this->registerPolicies();
        });
    }
}
