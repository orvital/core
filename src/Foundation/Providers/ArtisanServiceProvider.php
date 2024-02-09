<?php

namespace Orvital\Core\Foundation\Providers;

use Illuminate\Foundation\Providers\ArtisanServiceProvider as BaseArtisanServiceProvider;
use Orvital\Core\Foundation\Console\ResourceMakeCommand;
use Orvital\Core\Foundation\Console\RequestMakeCommand;
use Orvital\Core\Foundation\Console\ConsoleMakeCommand;
use Orvital\Core\Routing\Console\ControllerMakeCommand;
use Orvital\Core\Routing\Console\MiddlewareMakeCommand;
use Illuminate\Console\Signals;

class ArtisanServiceProvider extends BaseArtisanServiceProvider
{
    /**
     * Get all commands.
     */
    protected function allCommands(): array
    {
        return array_merge(
            $this->commands,
            $this->devCommands,
            [
                'ConsoleMake' => ConsoleMakeCommand::class,
                'ControllerMake' => ControllerMakeCommand::class,
                'MiddlewareMake' => MiddlewareMakeCommand::class,
                'RequestMake' => RequestMakeCommand::class,
                'ResourceMake' => ResourceMakeCommand::class,
            ]
        );
    }

    public function register()
    {
        $this->registerCommands($this->allCommands());

        Signals::resolveAvailabilityUsing(function () {
            return $this->app->runningInConsole()
                && ! $this->app->runningUnitTests()
                && extension_loaded('pcntl');
        });
    }

    protected function registerConsoleMakeCommand()
    {
        $this->app->singleton(ConsoleMakeCommand::class, function ($app) {
            return new ConsoleMakeCommand($app['files']);
        });
    }

    protected function registerControllerMakeCommand()
    {
        $this->app->singleton(ControllerMakeCommand::class, function ($app) {
            return new ControllerMakeCommand($app['files']);
        });
    }

    protected function registerMiddlewareMakeCommand()
    {
        $this->app->singleton(MiddlewareMakeCommand::class, function ($app) {
            return new MiddlewareMakeCommand($app['files']);
        });
    }

    protected function registerRequestMakeCommand()
    {
        $this->app->singleton(RequestMakeCommand::class, function ($app) {
            return new RequestMakeCommand($app['files']);
        });
    }

    protected function registerResourceMakeCommand()
    {
        $this->app->singleton(ResourceMakeCommand::class, function ($app) {
            return new ResourceMakeCommand($app['files']);
        });
    }

    public function provides()
    {
        return array_merge(array_values($this->allCommands()));
    }
}
