<?php

namespace App\Controller;

use App\View\View;
use App\Repository\UserRepository;
use App\Repository\PostRepository;

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    protected $currentUserId;
    protected $currentSessionID;

    public function index()
    {
        $userRepository = new UserRepository();
        $postRepository = new PostRepository();

        $view = new View('user/index');

        $currentUser = $userRepository->readById($this->currentUserId);

        $view->user = $currentUser;
        $view->posts = $postRepository->readAll();
        $view->title = 'Home';
        $view->heading = 'Home';
        $view->name = $currentUser->name;
        $view->username = $currentUser->username;
        $view->bday = $currentUser->geburtsdatum;
        $view->bio = $currentUser->bio;

        $view->display();
    }

    public function create()
    {
        $view = new View('user/create');
        $view->title = 'Benutzer Create';
        $view->heading = 'Benutzer Create';
        $view->display();
    }

    public function login() 
    {
        $view = new View('user/login');
        $view->title = 'Benutzer Login';
        $view->heading = 'Benutzer Login';
        $view->display();
    }

    public function doLogin()
    {
        $userVerifier = new UserRepository();
        $identifier = $_POST['identifier'];
        $password = $_POST['password'];

        if (preg_match("^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}^", $identifier))
        {
            $email = $identifier;

            if($userVerifier->userExistsByEmail($email))
            {
                echo "is da" . "<br />";
            }
            else
            {
                echo "is ned da" . "<br />";
            }

            echo $email;
        }
        else
        {
            $username = $identifier;

            if($userVerifier->userExistsByUsername($username))
            {
                session_start();
                $this->currentSessionID = session_id();
                $this->currentUserId = $userVerifier->getIDByUsername($username);
                $this->index();
            }
            else
            {
                echo "is ned da" . "<br />";
            }
            echo $username;
        }
    }

    public function logout()
    {
        session_destroy($this->currentSessionID);
        $this->login();
    }

    public function edit()
    {
        $UserRepository = new UserRepository();
        
        $view = new View('user/edit');

        $view->title = 'Benutzer Edit';
        $view->heading = 'Benutzer Edit';
        $view->users= $UserRepository->readbyid($_GET['id']);
        
        $view->display();


    }

    public function delete()
    {
        echo "<h1> Alter du hast gelöscht !! </h1>";
    }
}
