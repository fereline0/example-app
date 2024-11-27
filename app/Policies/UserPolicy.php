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

    /**
     * Check if the authenticated user is the same as the model user.
     */
    protected function isOwner(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function view(User $user, User $model)
    {
        return $this->isOwner($user, $model);
    }

    public function edit(User $user, User $model)
    {
        return $this->isOwner($user, $model) || $user->role === 'admin';
    }
}