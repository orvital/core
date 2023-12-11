<?php

namespace Orvital\Core\Auth\Contracts;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;

interface Authenticable extends Authenticatable, CanResetPassword, MustVerifyEmail
{
}
