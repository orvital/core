<?php

namespace Orvital\Core\Database;

use Carbon\CarbonImmutable;
use Illuminate\Database\DatabaseServiceProvider as BaseDatabaseServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

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

        $this->bootFactoryCallbacks();
    }

    protected function bootFactoryCallbacks()
    {
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            $modelBase = class_basename($modelName);
            $factoryBase = Str::finish($modelBase, 'Factory');

            foreach ([
                Str::replaceLast($modelBase, $factoryBase, $modelName),
                Str::replaceLast($modelBase, 'Factories\\'.$factoryBase, $modelName),
            ] as $factoryName) {
                if (class_exists($factoryName)) {
                    return $factoryName;
                }
            }

            return Str::start($factoryBase, Factory::$namespace);
        });

        Factory::guessModelNamesUsing(function (Factory $factory) {
            $modelName = Str::of(get_class($factory))
                ->between(Factory::$namespace, 'Factory')
                ->start($this->app->getNamespace())
                ->toString();

            if (class_exists($modelName)) {
                return $modelName;
            }

            return $this->app->getNamespace().'Models\\'.class_basename($modelName);
        });
    }
}
