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
    public function index()
    {
        $userRepository = new UserRepository();
        $postRepository = new PostRepository();

        $view = new View('user/index');
        $view->posts = $postRepository->readAll();
        $view->title = 'Home';
        $view->heading = 'Home';

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
    public function registration() 
    {
        $view = new View('user/registaration');
        $view->title = 'Benutzer Registration';
        $view->heading = 'Benutzer Registration';
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
                $this->currentUserId = $userVerifier->getIDByUsername($username);

                if ($userVerifier->verifyPassword($this->currentUserId, $password)) {
                    $_SESSION['isLoggedIn'] = true;
                    $_SESSION['wrongLogin'] = false;
                    $_SESSION['userID'] = $userVerifier->getIDByUsername($username);
                    $_SESSION['sessionID'] = session_id();
                    $userVerifier->fillInData();
                    $this->index();
                }
                else
                {
                    $_SESSION['wrongLogin'] = true;
                    $this->login();
                }
            }
            else
            {

            }
        }
    }

    public function logout()
    { 
        $_SESSION['isLoggedIn'] = false;
        session_destroy();
        $this->login();
    }

    public function edit()
    {
        $UserRepository = new UserRepository();
        
        $view = new View('user/edit');
        $currentUser = $UserRepository->readbyid($this->currentUserId);
        $view->title = 'Benutzer Edit';
        $view->heading = 'Benutzer Edit';
        $view->user= $UserRepository->readById($_SESSION['userID']);
        
        $view->display();
    }

    public function delete()
    {
        echo "<h1> Alter du hast gelöscht !! </h1>";
    }
    public function update()
    {    
        $userRepository = new UserRepository();
        $userRepository->update($_POST['username'], $_POST['name'], $_POST['email'], $_POST['gebDat'], $_POST['bio'], $_POST['passwort'], $_SESSION['userID']);
        header('Location: /user/index');
    }
    public function newpost()
    {
        $postRepository = new PostRepository();
        $postRepository->newpost($_POST['post'], $_SESSION['userID']);
    }
}