<?php

namespace Orvital\Core\Auth;

use Orvital\Core\Contracts\Auth\Authenticable;
use Orvital\Core\Database\Eloquent\Model;

abstract class Policy
{
    /**
     * Create a new policy instance.
     */
    public function __construct(
    ) {
    }

    /**
     * Method executed before all authorization checks, unless the policy method is not defined.
     * Return `true|false` to allow/deny authorization or `null` to fall through to the intended policy method.
     */
    public function before(Authenticable $user, string $ability, ...$arguments): ?bool
    {
        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Authenticable $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the given model.
     */
    public function view(Authenticable $user, Model $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Authenticable $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the given model.
     */
    public function update(Authenticable $user, Model $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the given model.
     */
    public function delete(Authenticable $user, Model $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the given model.
     */
    public function restore(Authenticable $user, Model $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the given model.
     */
    public function forceDelete(Authenticable $user, Model $model): bool
    {
        return true;
    }
}
