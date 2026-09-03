<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->role?->code === 'ADM';
    }

    public function view(User $user, User $model): bool
    {
        return $user->role?->code === 'ADM';
    }

    public function create(User $user): bool
    {
        return $user->role?->code === 'ADM';
    }

    public function update(User $user, User $model): bool
    {
        return $user->role?->code === 'ADM';
    }

    public function delete(User $user, User $model): bool
    {
        if ($user->id === $model->id) {
            return false;
        }

        return $user->role?->code === 'ADM';
    }
}