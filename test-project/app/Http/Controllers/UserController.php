<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $userProfessions
     * @return array
     */
    public function userRoles($userProfessions)
    {
        $userSkills = $this->userRepository->getByUserRoles($userProfessions);
        $skills = [];
        if(!empty($userSkills)) {
            foreach ($userSkills as $userSkill) {
                array_push($skills, $userSkill->skill);
            }
        }
        return $skills;
    }

    /**
     * @param $userProfessions
     * @param $userSkill
     * @return bool|null
     */
    public function checkUserRoles($userProfessions, $userSkill)
    {
        $userSkills = $this->userRepository->getByUserRoles($userProfessions);
        $checkSkill = false;
        if(!empty($userSkills)) {
            foreach ($userSkills as $skills) {
                if ($userSkill == $skills->skill) {

                    return $checkSkill = true;
                }
            }

            return $checkSkill;
        }

        return null;
    }
}
