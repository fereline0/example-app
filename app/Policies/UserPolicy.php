<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function beOwnerOfThePage(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    /**
     * Check if the authenticated user is the same as the model user.
     */
    public function edit(User $user, User $model)
    {
        return $this->beOwnerOfThePage($user, $model) || $user->role === 'admin';
    }
}