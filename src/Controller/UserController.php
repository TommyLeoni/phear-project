<?php

namespace App\Controller;

use App\View\View;
use App\Repository\UserRepository;

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        echo 'User index';
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
