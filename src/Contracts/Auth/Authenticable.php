<?php

namespace Orvital\Core\Contracts\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;

interface Authenticable extends Authenticatable, CanResetPassword, MustVerifyEmail
{
}
