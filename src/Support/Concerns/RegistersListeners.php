<?php

namespace Orvital\Core\Support\Concerns;

use Illuminate\Support\Facades\Event;

trait RegistersListeners
{
    /**
     * The listeners array.
     */
    public function listeners(): array
    {
        return [];
    }

    /**
     * The events proxy.
     */
    public function events(): array
    {
        return $this->listeners();
    }

    /**
     * Register listeners.
     */
    public function registerListeners(): void
    {
        foreach ($this->events() as $event => $listeners) {
            foreach (array_unique($listeners, SORT_REGULAR) as $listener) {
                Event::listen($event, $listener);
            }
        }
    }
}
