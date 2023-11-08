<?php

namespace Orvital\Core\Foundation\Providers;

use Illuminate\Foundation\Providers\FoundationServiceProvider as BaseFoundationServiceProvider;
use Illuminate\Testing\ParallelTestingServiceProvider;
use Orvital\Core\Foundation\Providers\FormRequestServiceProvider;

class FoundationServiceProvider extends BaseFoundationServiceProvider
{
    protected $providers = [
        FormRequestServiceProvider::class,
        ParallelTestingServiceProvider::class,
    ];
}
