<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModeratorPolicy
{
    use HandlesAuthorization;

    public function check(User $user)
    {
            return $user->role == 2;
    }
}
