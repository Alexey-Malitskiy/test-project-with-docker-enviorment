<?php

namespace App\Repositories;

use App\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param $userProfessions
     * @return false
     */
    public function getByUserRoles($userProfessions)
    {
        $user = User::where('profession', $userProfessions)->first();
        $userSkills = !empty($user) ? $user->roles()->get() : false;

        return $userSkills;
    }

}
