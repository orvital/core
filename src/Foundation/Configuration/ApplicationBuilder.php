<?php

namespace Orvital\Core\Foundation\Configuration;

use Illuminate\Foundation\Configuration\ApplicationBuilder as BaseApplicationBuilder;

class ApplicationBuilder extends BaseApplicationBuilder
{
    public function withCommands(array $commands = [])
    {
        if (empty($commands)) {
            $commands = [$this->app->path('Commands')];
        }

        return parent::withCommands($commands);
    }
}
