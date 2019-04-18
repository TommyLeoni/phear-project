<?php

namespace App\View;

class View
{
    private $viewfile;
    private $properties = array();

    public function __construct($viewfile)
    {
        $this->viewfile = "./../templates/$viewfile.php";
    }

    public function __set($key, $value)
    {
        if (!isset($this->$key)) {
            $this->properties[$key] = $value;
        }
    }

    public function __get($key)
    {
        return isset($this->properties[$key]) ? $this->properties[$key] : 'No value at key';
    }

    public function display()
    {
        extract($this->properties);
        require './../templates/partial/header.php';
        require $this->viewfile;
        require './../templates/partial/footer.php';
    }
}
