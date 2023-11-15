<?php

namespace Orvital\Core\Contracts\Auth;

interface Authorizable
{
    /**
     * Determine if the entity has all the given abilities.
     *
     * @param  iterable|string  $abilities
     * @param  array|mixed  $arguments
     * @return bool
     */
    public function can($abilities, $arguments = []);
}
