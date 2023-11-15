<?php

namespace Orvital\Core\Routing;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Orvital\Core\Auth\Concerns\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests;
    use ValidatesRequests;
}
