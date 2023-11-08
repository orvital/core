<?php

namespace Orvital\Core\Foundation\Providers;

use Illuminate\Foundation\Providers\ConsoleSupportServiceProvider as BaseConsoleSupportServiceProvider;
use Orvital\Core\Database\MigrationServiceProvider;
use Orvital\Core\Foundation\Providers\ArtisanServiceProvider;
use Orvital\Core\Foundation\Providers\ComposerServiceProvider;

class ConsoleSupportServiceProvider extends BaseConsoleSupportServiceProvider
{
    protected $providers = [
        ArtisanServiceProvider::class,
        MigrationServiceProvider::class,
        ComposerServiceProvider::class,
    ];
}
