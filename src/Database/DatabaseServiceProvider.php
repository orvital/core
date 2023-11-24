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
            // "App\User\UserFactory", "App\Models\UserFactory" ...
            $factoryName = Str::finish($modelName, 'Factory');

            // Check in the same namespace
            if (class_exists($factoryName)) {
                return $factoryName;
            }

            // Return default factory namespace: "Database\Factories\UserFactory"
            return Str::start(class_basename($factoryName), Factory::$namespace);
        });

        Factory::guessModelNamesUsing(function (Factory $factory) {
            // "App\User\User" or "App/User"
            $modelName = Str::of(get_class($factory))
                ->between(Factory::$namespace, 'Factory')
                ->start($this->app->getNamespace())
                ->toString();

            // Check in the same namespace
            if (class_exists($modelName)) {
                return $modelName;
            }

            // Return default models namespace: "App\Models\User"
            return $this->app->getNamespace().'Models\\'.class_basename($modelName);
        });
    }
}
