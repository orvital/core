<?php

namespace Orvital\Core\Support\Concerns;

use Illuminate\Support\Facades\Event;

trait RegistersSubscribers
{
    /**
     * The subscribers array.
     */
    public function subscribers(): array
    {
        return [];
    }

    /**
     * Register subscribers.
     */
    public function registerSubscribers(): void
    {
        foreach ($this->subscribers() as $subscriber) {
            Event::subscribe($subscriber);
        }
    }
}
