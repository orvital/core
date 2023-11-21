<?php

namespace Orvital\Core\Support\Concerns;

trait RegistersObservers
{
    /**
     * The observers array.
     */
    public function observers(): array
    {
        return [];
    }

    /**
     * Register observers.
     */
    public function registerObservers(): void
    {
        foreach ($this->observers() as $model => $observers) {
            $model::observe($observers);
        }
    }
}
