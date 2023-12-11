<?php

namespace Orvital\Core\Support\Providers;

use Orvital\Core\Support\Concerns\RegistersPolicies;
use Orvital\Core\Support\ServiceProvider;

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
