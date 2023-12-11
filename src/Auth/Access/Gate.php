<?php

namespace Orvital\Core\Auth\Access;

use Illuminate\Auth\Access\Gate as BaseGate;

class Gate extends BaseGate
{
    public function resource($name, $class, ?array $abilities = null)
    {
        $abilities = $abilities ?: [
            'list' => 'list',
            'view' => 'view',
            'create' => 'create',
            'update' => 'update',
            'delete' => 'delete',
        ];

        foreach ($abilities as $ability => $method) {
            $this->define($name.'.'.$ability, $class.'@'.$method);
        }

        return $this;
    }
}
