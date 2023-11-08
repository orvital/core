<?php

namespace Orvital\Core\Database;

use Carbon\CarbonImmutable;
use Illuminate\Database\DatabaseServiceProvider as BaseDatabaseServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Date;

/**
 * @property-read \Orvital\Core\Foundation\Application $app
 */
class DatabaseServiceProvider extends BaseDatabaseServiceProvider
{
    public function boot()
    {
        Model::setConnectionResolver($this->app['db']);

        Model::setEventDispatcher($this->app['events']);

        Model::shouldBeStrict(! $this->app->isProduction());

        Builder::defaultStringLength(192);

        Builder::defaultMorphKeyType('ulid');

        Relation::requireMorphMap();

        Date::use(CarbonImmutable::class);
    }
}
