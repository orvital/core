<?php

namespace Orvital\Core\Support\Providers;

use Orvital\Core\Support\Concerns\RegistersListeners;
use Orvital\Core\Support\Concerns\RegistersObservers;
use Orvital\Core\Support\Concerns\RegistersSubscribers;
use Orvital\Core\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    use RegistersListeners;
    use RegistersObservers;
    use RegistersSubscribers;

    public function register(): void
    {
        $this->booting(function () {
            $this->registerListeners();
            $this->registerSubscribers();
            $this->registerObservers();
        });
    }

    public function events(): array
    {
        if ($this->app->eventsAreCached()) {
            $cache = require $this->app->getCachedEventsPath();

            return $cache[get_class($this)] ?? [];
        } else {
            return $this->listeners();
        }
    }
}
