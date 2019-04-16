<?php

namespace App\Controller;

use App\View\View;

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
        echo 'User erstellen';
    }

    public function edit()
    {
        $view = new View('user/edit');

        $view->title = 'Benutzer Edit';
        $view->heading = 'Benutzer Edit';

        $view->display();
    }

    public function delete()
    {
        echo "<h1> Alter du hast gelöscht !! </h1>";
    }
}
