<?php

namespace Orvital\Core\Support;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * @property-read \Orvital\Core\Foundation\Application $app
 */
abstract class ServiceProvider extends BaseServiceProvider
{
    /**
     * Get the extended default providers for the application.
     *
     * @return \Illuminate\Support\DefaultProviders
     */
    public static function extendedProviders()
    {
        $providers = [
            \Orvital\Core\Foundation\Providers\ConsoleSupportServiceProvider::class,
            \Orvital\Core\Database\DatabaseServiceProvider::class,
            \Orvital\Core\Foundation\Providers\FoundationServiceProvider::class,
            \Orvital\Core\Notifications\NotificationServiceProvider::class,
        ];

        $keyed = collect($providers)->keyBy(fn ($class) => get_parent_class($class))->all();

        return static::defaultProviders()->replace($keyed);
    }
}
