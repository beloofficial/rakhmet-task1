<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModeratorPolicy
{
    use HandlesAuthorization;

    /**
     * Check user as Moderator
     *
     * @param User $user
     * @return Boolean
     */
    public function check(User $user)
    {
            return $user->role == User::MODERATOR;
    }
}
