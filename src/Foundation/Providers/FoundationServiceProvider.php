<?php

namespace Orvital\Core\Foundation\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Foundation\Providers\FoundationServiceProvider as BaseFoundationServiceProvider;
use Illuminate\Support\Facades\Date;
use Illuminate\Testing\ParallelTestingServiceProvider;
use Orvital\Core\Foundation\Providers\FormRequestServiceProvider;

class FoundationServiceProvider extends BaseFoundationServiceProvider
{
    protected $providers = [
        FormRequestServiceProvider::class,
        ParallelTestingServiceProvider::class,
    ];

    public function boot()
    {
        parent::boot();

        Date::use(CarbonImmutable::class);
    }
}
