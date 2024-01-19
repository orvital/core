<?php

namespace Orvital\Core\Support;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * @property-read \Orvital\Core\Foundation\Application $app
 */
abstract class ServiceProvider extends BaseServiceProvider
{
    public static function extendedProviders()
    {
        $providers = [
            \Orvital\Core\Auth\AuthServiceProvider::class,
            \Orvital\Core\Foundation\Providers\ConsoleSupportServiceProvider::class,
            \Orvital\Core\Database\DatabaseServiceProvider::class,
            \Orvital\Core\Foundation\Providers\FoundationServiceProvider::class,
            \Orvital\Core\Notifications\NotificationServiceProvider::class,
            \Orvital\Core\Session\SessionServiceProvider::class,
        ];

        $keyed = collect($providers)->keyBy(fn ($class) => get_parent_class($class))->all();

        return static::defaultProviders()->replace($keyed);
    }
}
