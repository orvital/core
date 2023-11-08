<?php

namespace Orvital\Core\Session;

use Illuminate\Session\Store as BaseStore;
use Illuminate\Support\Str;

class Store extends BaseStore
{
    public function isValidId($id)
    {
        return Str::isUlid($id);
    }

    protected function generateSessionId()
    {
        return (string) Str::ulid();
    }
}
