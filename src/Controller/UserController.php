<?php

namespace App\Controller;

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
        require_once("C:\dev\phear-project\phear-project\src\html\home.html");
    }

    public function delete()
    {
        echo "<h1> Alter du hast gelöscht !! </h1>";
    }
}
