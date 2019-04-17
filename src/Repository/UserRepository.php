<?php

namespace App\Repository;

class UserRepository extends Repository
{
    protected $tableName = 'users';

    public function userExistsByUsername($username)
    {
        $users = $this->readAll();
        $userFound = false;

        foreach ($users as $user) {
            if ($user->username == $username) {
                $userFound = true;
                break;
            }
        }

        return $userFound;
    }

    public function userExistsByEmail($email)
    {
        $users = $this->readAll();
        $userFound = false;

        foreach ($users as $user) {
            if ($user->email == $email) {
                $userFound = true;
                break;
            }
        }

        return $userFound;
    }

    public function getIDByUsername($username)
    {
        $users = $this->readAll();
        $userID;

        foreach ($users as $user) {
            if ($user->username == $username) {
                $userID = $user->id;
                break;
            }
        }

        return $userID;
    }
}