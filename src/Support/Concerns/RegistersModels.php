<?php

namespace Orvital\Core\Support\Concerns;

use Illuminate\Database\Eloquent\Relations\Relation;

trait RegistersModels
{
    /**
     * The models array.
     */
    public function models(): array
    {
        return [];
    }

    /**
     * Register models.
     */
    public function registerModels(): void
    {
        foreach ($this->models() as $model) {
            Relation::morphMap([$model::getMorphAlias() => $model]);
        }
    }
}
