<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

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
        $userID = null;

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
        $userID = null;

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
        if (password_verify($password, $user->passwort)) {
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
        $_SESSION['email'] = $entry->email;
        $_SESSION['password'] = ($entry->passwort);
    }

    public function update($username, $name, $email, $geburtstag, $bio, $passwort, $userID)
    {
        $connection=ConnectionHandler::getConnection();
        $query = "UPDATE users set username=?, name=?, email=?, geburtsdatum=?, bio=?, passwort=? where id=?";
        $statement = $connection->prepare($query); // can fail because of syntax errors, missing privileges
        if (false === $statement) {
            throw new Exception($connection->error);
        }
        // can fail because the number of parameter doesn't match the placeholders or type conflict
        $rc = $statement->bind_param('ssssssi', $username, $name, $email, $geburtstag, $bio, $passwort, $userID);
        if (false === $rc) {
            throw new Exception($statement->error);
        }
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

    public function updateWithoutPassword($username, $name, $email, $geburtstag, $bio, $userID)
    {
        $connection=ConnectionHandler::getConnection();
        $query = "UPDATE users set username=?, name=?, email=?, geburtsdatum=?, bio=? where id=?";
        $statement = $connection->prepare($query); // can fail because of syntax errors, missing privileges
        if (false === $statement) {
            throw new Exception($connection->error);
        }
        // can fail because the number of parameter doesn't match the placeholders or type conflict
        $rc = $statement->bind_param('sssssi', $username, $name, $email, $geburtstag, $bio, $userID);
        if (false === $rc) {
            throw new Exception($statement->error);
        }
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

    public function create($username, $name, $email, $geburtstag, $passwort)
    {
        $connection = ConnectionHandler::getConnection();
        $query = "INSERT INTO users(username, email, geburtsdatum, bio, passwort, name) VALUES(?, ?, ?, 'Click on the edit-button to edit your bio and everything else about your profile.', ?, ?);";
        $statement = $connection->prepare($query); // can fail because of syntax errors, missing privileges
        if (false === $statement) {
            throw new Exception($connection->error);
        }
        // can fail because the number of parameter doesn't match the placeholders or type conflict
        $rc = $statement->bind_param('sssss', $username, $email, $geburtstag, $passwort, $name);
        if (false === $rc) {
            throw new Exception($statement->error);
        }
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

    public function delete($uid)
    {
        $connection=ConnectionHandler::getConnection();
        $query = "DELETE from users where id=?";
        $statement = $connection->prepare($query); // can fail because of syntax errors, missing privileges
        if (false === $statement) {
            throw new Exception($connection->error);
        } // can fail because the number of parameter doesn't match the placeholders or type conflict
        $rc = $statement->bind_param('i', $uid);
        if (false === $rc) {
            throw new Exception($statement->error);
        }
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
}
