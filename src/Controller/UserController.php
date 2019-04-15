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
        echo '<h1> Geeditiert !! </h1>';
    }

    public function delete()
    {
        echo "<h1> Alter du hast gelöscht !! </h1>";
    }
}
