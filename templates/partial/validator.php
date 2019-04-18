<?php

# Validiert, ob bereits eine Session am Laufen ist.
# Dies kommt am Anfang jeder View, damit auf keinen Teil ohne Anmeldung zugegriffen werden kann.
if (!isset($_SESSION['isLoggedIn'])) {
    header('Location: /user/login');
}
?>