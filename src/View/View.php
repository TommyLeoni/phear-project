<?php

namespace App\View;

class View
{
    # deklariert Pfad & werte für die folgende vieqw
    private $viewfile;
    private $properties = array();

    # Ruft die zu konstruierende Seite aufgrund des angegeben Pfads auf
    public function __construct($viewfile)
    {
        $this->viewfile = "./../templates/$viewfile.php";
    }

    # Fügte jegliche Parameter den Werten der View hinzu
    public function __set($key, $value)
    {
        if (!isset($this->$key)) {
            $this->properties[$key] = $value;
        }
    }

    # Getter für Werte der View
    public function __get($key)
    {
        return isset($this->properties[$key]) ? $this->properties[$key] : 'No value at key';
    }

    # Stellt die View schlussendlich dar
    public function display()
    {
        extract($this->properties);
        require './../templates/partial/header.php';
        require $this->viewfile;
        require './../templates/partial/footer.php';
    }
}
