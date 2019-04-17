<?php

namespace App\Controller;

use App\View\View;
use App\Repository\UserRepository;
use App\Repository\PostRepository;

/**
 * Der Controller ist der Ort an dem es für jede Seite, welche der Benutzer
 * anfordern kann eine Methode gibt, welche die dazugehörende Businesslogik
 * beherbergt.
 *
 * Welche Controller und Funktionen muss ich erstellen?
 *   Es macht sinn, zusammengehörende Funktionen (z.B: User anzeigen, erstellen,
 *   bearbeiten & löschen) gemeinsam in einem passend benannten Controller (z.B:
 *   UserController) zu implementieren. Nicht zusammengehörende Features sollten
 *   jeweils auf unterschiedliche Controller aufgeteilt werden.
 *
 * Was passiert in einer Controllerfunktion?
 *   Die Anforderungen an die einzelnen Funktionen sind sehr unterschiedlich.
 *   Folgend die gängigsten:
 *     - Dafür sorgen, dass dem Benutzer eine View (HTML, CSS & JavaScript)
 *         gesendet wird.
 *     - Daten von einem Model (Verbindungsstück zur Datenbank) anfordern und
 *         der View übergeben, damit diese Daten dann für den Benutzer in HTML
 *         Code umgewandelt werden können.
 *     - Daten welche z.B. von einem Formular kommen validieren und dem Model
 *         übergeben, damit sie in der Datenbank persistiert werden können.
 */
class DefaultController
{
    /**
     * Die index Funktion des DefaultControllers sollte in jedem Projekt
     * existieren, da diese ausgeführt wird, falls die URI des Requests leer
     * ist. (z.B. http://my-project.local/). Weshalb das so ist, ist und wann
     * welcher Controller und welche Methode aufgerufen wird, ist im Dispatcher
     * beschrieben.
     */
    public function index()
    {
        $userRepository = new UserRepository();
        $postRepository = new PostRepository();

        $view = new View('user/index');

        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->name = 'Name des Benutzers';
        $view->username = 'Username';
        $view->bday = "29.09.2002";
        $view->post = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has
        been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
        galley of type and scrambled it to make a type specimen book.";
        $view->users = $userRepository->readAll();
        $view->posts = $postRepository->readAll();

        $view->display();
    }
}
