<?php

namespace Orvital\Core\Support\Concerns;

use Illuminate\Support\Facades\Gate;

trait RegistersPolicies
{
    /**
     * The policies array.
     */
    public function policies(): array
    {
        return [];
    }

    /**
     * Register policies.
     */
    public function registerPolicies(): void
    {
        foreach ($this->policies() as $model => $policy) {
            Gate::policy($model, $policy);
        }
    }
}
