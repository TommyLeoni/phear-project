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

    public function getIDByEmail($email)
    {
        $users = $this->readAll();
        $userID;

        foreach ($users as $user) {
            if ($user->email == $email) {
                $userID = $user->id;
                break;
            }
        }

        return $userID;
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

    public function verifyPassword($uid, $password)
    {
        $user = $this->readById($uid);
        if ($user->passwort == $password) {
            return true;
        } else {
            return false;
        }
    }

    public function fillInData()
    {
        $entry = $this->readById($_SESSION['userID']);
        $_SESSION['bio'] = $entry->bio; 
        $_SESSION['name'] = $entry->name;
        $_SESSION['username'] = $entry->username;
        $_SESSION['gebDat'] = $entry->geburtsdatum;
    }
}