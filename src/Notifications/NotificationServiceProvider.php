<?php

namespace Orvital\Core\Notifications;

use Illuminate\Notifications\ChannelManager;
use Illuminate\Notifications\NotificationServiceProvider as BaseNotificationServiceProvider;
use Illuminate\Contracts\Notifications\Dispatcher as DispatcherContract;
use Illuminate\Contracts\Notifications\Factory as FactoryContract;

/**
 * @property-read \Illuminate\Foundation\Application $app
 */
class NotificationServiceProvider extends BaseNotificationServiceProvider
{
    public function register()
    {
        $this->app->singleton('notification', fn ($app) => new ChannelManager($app));

        $this->app->alias('notification', DispatcherContract::class);

        $this->app->alias('notification', FactoryContract::class);
    }
}
