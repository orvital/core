<?php

namespace Orvital\Core\Database;

use Illuminate\Database\DatabaseServiceProvider as BaseDatabaseServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;

/**
 * @property-read \Illuminate\Foundation\Application $app
 */
class DatabaseServiceProvider extends BaseDatabaseServiceProvider
{
    public function boot()
    {
        parent::boot();

        Model::shouldBeStrict(! $this->app->isProduction());

        Builder::defaultStringLength(192);

        Builder::defaultMorphKeyType('ulid');
    }
}
