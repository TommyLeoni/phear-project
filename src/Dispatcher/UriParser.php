<?php

namespace App\Dispatcher;

class UriParser
{
    /**
     * Diese Methode wertet die Request URI aus und gibt den Controllername zurück.
     */
    public static function getControllerName()
    {
		$uriFragments = self::getUriFragments();
		// TODO: Methode um den "Controller"-Teil der URI zurückzugeben
        
        // http://my-project.local/default/index    ->      "default"
        // http://my-project.local/user/create      ->      "user"
        // http://my-project.local                  ->      "default"

        return array_key_exists(0, $uriFragments) && $uriFragments[0] != '' ? $uriFragments[0] : 'Default';
    }

    /**
     * Diese Methode wertet die Request URI aus und gibt den Actionname (Action = Methode im Controller) zurück.
     */
    public static function getMethodName()
    {
        $uriFragments = self::getUriFragments();
		// TODO: Methode um den "Action"-Teil der URI zurückzugeben
        
        // http://my-project.local/default/index    ->      "index"
        // http://my-project.local/user/create      ->      "create"
        // http://my-project.local                  ->      "index"

        return array_key_exists(1, $uriFragments) && $uriFragments[1] != '' ? $uriFragments[1] : 'index';
    }

    private static function getUriFragments()
    {
        // Die URI wird aus dem $_SERVER Array ausgelesen und in ihre
        // Einzelteile zerlegt.
        // /user/index/foo --> ['user', 'index', 'foo']
        $uri = $_SERVER['REQUEST_URI'];
        $uri = strtok($uri, '?'); // Erstes ? und alles danach abschneiden
        $uri = trim($uri, '/'); // Alle / am Anfang und am Ende der URI abschneiden
        $uriFragments = explode('/', $uri); // In Einzelteile zerlegen
        
        return $uriFragments;
    }
}
