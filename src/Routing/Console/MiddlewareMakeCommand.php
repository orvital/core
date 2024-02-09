<?php

namespace Orvital\Core\Routing\Console;

use Illuminate\Routing\Console\MiddlewareMakeCommand as BaseMiddlewareMakeCommand;

class MiddlewareMakeCommand extends BaseMiddlewareMakeCommand
{
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Middlewares';
    }
}
