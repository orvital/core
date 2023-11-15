<?php

namespace Orvital\Core\Auth\Concerns;

use Orvital\Core\Auth\Concerns\Authenticatable;
use Orvital\Core\Auth\Concerns\CanResetPassword;
use Orvital\Core\Auth\Concerns\MustVerifyEmail;

trait Authenticable
{
    use Authenticatable;
    use CanResetPassword;
    use MustVerifyEmail;
}
