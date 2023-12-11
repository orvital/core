<?php

namespace Orvital\Core\Support;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * @property-read \Orvital\Core\Foundation\Application $app
 */
abstract class ServiceProvider extends BaseServiceProvider
{
    public static function defaultProviders()
    {
        return parent::defaultProviders()->replace([
            \Illuminate\Auth\AuthServiceProvider::class => \Orvital\Core\Auth\AuthServiceProvider::class,
            \Illuminate\Database\DatabaseServiceProvider::class => \Orvital\Core\Database\DatabaseServiceProvider::class,
            \Illuminate\Session\SessionServiceProvider::class => \Orvital\Core\Session\SessionServiceProvider::class,
            \Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class => \Orvital\Core\Foundation\Providers\ConsoleSupportServiceProvider::class,
            \Illuminate\Foundation\Providers\FoundationServiceProvider::class => \Orvital\Core\Foundation\Providers\FoundationServiceProvider::class,
            \Illuminate\Notifications\NotificationServiceProvider::class => \Orvital\Core\Notifications\NotificationServiceProvider::class,
        ]);
    }
}
