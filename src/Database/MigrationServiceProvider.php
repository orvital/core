<?php

namespace Orvital\Core\Database;

use Illuminate\Database\Migrations\Migrator;
use Illuminate\Database\MigrationServiceProvider as BaseMigrationServiceProvider;
use Orvital\Core\Database\Migrations\DatabaseMigrationRepository;
use Orvital\Core\Database\Migrations\MigrationCreator;

/**
 * @property-read \Illuminate\Foundation\Application $app
 */
class MigrationServiceProvider extends BaseMigrationServiceProvider
{
    protected function registerRepository()
    {
        $this->app->singleton('migration.repository', function ($app) {
            $migrations = $app['config']['database.migrations'];

            $table = is_array($migrations) ? ($migrations['table'] ?? null) : $migrations;

            return new DatabaseMigrationRepository($app['db'], $table);
        });
    }

    protected function registerMigrator()
    {
        $this->app->singleton('migrator', function ($app) {
            $migrator = new Migrator($app['migration.repository'], $app['db'], $app['files'], $app['events']);

            $paths = $migrator->getFilesystem()->directories($app->databasePath('migrations'));

            foreach ($paths as $path) {
                $migrator->path($path);
            }

            return $migrator;
        });
    }

    protected function registerCreator()
    {
        $this->app->singleton('migration.creator', function ($app) {
            return new MigrationCreator($app['files'], $app->basePath('stubs'));
        });
    }
}
