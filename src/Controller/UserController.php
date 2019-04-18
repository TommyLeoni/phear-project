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
        $view->posts = $postRepository->readPosts();
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
    public function register()
    {
        $view = new View('user/register');
        $view->title = 'Benutzer Registration';
        $view->heading = 'Benutzer Registration';
        $view->display();
    }

    public function doRegistration()
    {
        $userRepository = new UserRepository();

        if ($_POST['email'] != '' && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['falseEmail'] = true;
            header('Location: /user/register');
        } elseif ($_POST['username'] == '') {
            $_SESSION['emptyUsername'] = true;
            header('Location: /user/register');
        } elseif ($_POST['email'] != '' && $userRepository->getIDByEmail($_POST['email']) != null) {
            $_SESSION['falseEmail'] = true;
            header('Location: /user/register');
        } elseif ($userRepository->getIDByUsername($_POST['username']) != null) {
            $_SESSION['usernameTaken'] = true;
            $this->register();
        } elseif (!isset($_SESSION['falseEmail']) && !isset($_SESSION['usernameTaken'])) {
            if ($_POST['name'] == '') {
                $_POST['name'] = $_POST['username'];
            }

            $hashedPW = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $userRepository->create($_POST['username'], $_POST['name'], $_POST['email'], $_POST['bday'], $hashedPW);
            $_SESSION['userID'] = $userRepository->getIDByUsername($_POST['username']);
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['sessionID'] = session_id();
            $userRepository->fillInData();
            header('Location: /user/index');
        }
    }

    public function doLogin()
    {
        $userVerifier = new UserRepository();
        $identifier = $_POST['identifier'];
        $password = $_POST['password'];

        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            $email = $identifier;

            if ($userVerifier->userExistsByEmail($email)) {
                $this->currentUserId = $userVerifier->getIDByEmail($email);

                if ($userVerifier->verifyPassword($this->currentUserId, $password)) {
                    $_SESSION['isLoggedIn'] = true;
                    $_SESSION['wrongLogin'] = false;
                    $_SESSION['wrongPassword'] = false;
                    $_SESSION['userID'] = $userVerifier->getIDByEmail($email);
                    $_SESSION['sessionID'] = session_id();
                    $userVerifier->fillInData();
                    header('Location: /user/index');
                } else {
                    $_SESSION['wrongPassword'] = true;
                    header('Location: /user/login');
                }
            } else {
                $_SESSION['wrongLogin'] = true;
                header('Location: /user/login');
            }
        } else {
            $username = $identifier;

            if ($userVerifier->userExistsByUsername($username)) {
                $currentUserId = $userVerifier->getIDByUsername($username);
                $currentUser = $userVerifier->readById($currentUserId);

                if (password_verify($password, $currentUser->passwort)) {
                    $_SESSION['isLoggedIn'] = true;
                    $_SESSION['wrongLogin'] = false;
                    $_SESSION['wrongPassword'] = false;
                    $_SESSION['userID'] = $currentUserId;
                    $_SESSION['sessionID'] = session_id();
                    $userVerifier->fillInData();
                    header('Location: /user/index');
                } else {
                    $_SESSION['wrongPassword'] = true;
                    header('Location: /user/login');
                }
            } else {
                $_SESSION['wrongLogin'] = true;
                header('Location: /user/login');
            }
        }
    }

    public function logout()
    {
        $_SESSION['isLoggedIn'] = false;
        session_destroy();
        header('Location: /user/login');
    }

    public function edit()
    {
        $UserRepository = new UserRepository();
        
        $view = new View('user/edit');
        $view->title = 'Benutzer Edit';
        $view->heading = 'Benutzer Edit';
        $view->user= $UserRepository->readById($_SESSION['userID']);
        
        $view->display();
    }

    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->delete($_SESSION['userID']);
        session_destroy();
        header('Location: login');
    }
    public function update()
    {
        $userRepository = new UserRepository();
        $user = $userRepository->readById($_SESSION['userID']);
        if ($_POST['passwort'] == '') {
            $_SESSION['cannotEdit'] = true;
            $this->edit();
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['falseEmail'] = true;
            $this->edit();
        } else {
            $userRepository->update($_POST['username'], $_POST['name'], $_POST['email'], $_POST['gebDat'], $_POST['bio'], $_POST['passwort'], $_SESSION['userID']);
            $userRepository->fillInData();
            header('Location: /user/index');
        }
    }
    public function newpost()
    {
        $postRepository = new PostRepository();
        $postRepository->newpost($_POST['post'], $_SESSION['userID']);
        header('Location: /user/index');
    }
    public function deletePost()
    {
        $postRepository = new PostRepository();
        $postRepository->deletePost($_POST['postid']);
        header('Location: /user/index');
    }
}
