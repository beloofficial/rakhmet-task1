<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Check user as Admin
     *
     * @param User $user
     * @return Boolean
     */
   public function check(User $user)
   {
        return $user->role == 1;
   }
}
